<?
session_start();
require_once '../db_connect.php';

$sql = 'SELECT * FROM users WHERE login=? AND password=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([addslashes($_POST['login']), addslashes($_POST['password'])]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    if ($user['ban'] == 1) {
        $_SESSION['error'] = 'Данный аккаунт был заблокирован за нарушение правил форума.';
        header('Location: ../../../login.php');
    } else {
        $_SESSION['user']['login'] = $user['login'];
        $_SESSION['user']['role'] = $user['role'];
      $_SESSION['user']['email'] = $user['email'];
      $_SESSION['user']['avatar'] = $user['avatar'];
    }
    header('Location: ../../../');
} else {
    $_SESSION['error'] = 'Логин или пароль введены неверно';
    header('Location: ../../../login.php');
}
