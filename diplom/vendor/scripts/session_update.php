<?
session_start();

if ($_SESSION['user']) {
  $sql = 'SELECT * FROM users WHERE login=?';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$login]);

  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($user['ban'] != 0 || $user == null) {
    session_destroy();
    $_SESSION['error'] = 'Выш аккаунт был заблокирован за нарушение правил форума.';
    header('Location: ../../../');
  } else {
    $_SESSION['user']['login'] = $user['login'];
    $_SESSION['user']['role'] = $user['role'];
      $_SESSION['user']['email'] = $user['email'];
      $_SESSION['user']['avatar'] = $user['avatar'];
  }
}
