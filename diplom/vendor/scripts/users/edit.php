<?
session_start();
require_once '../db_connect.php';

$sql = 'SELECT * FROM users WHERE login=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['user']]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_POST['password'] != $user['login']) {
  $_SESSION['error'] = 'Неверный пароль';
  header('Location: ../../../profile_edit.php?user=' . $_REQUEST['user']);
} else {
  $sql = 'SELECT * FROM users WHERE email=?';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([addslashes($_POST['email'])]);

  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($user && $user['email'] != $_SESSION['user']['email']) {
    $_SESSION['error'] = 'Пользователь с такой почтой уже существует';
    header('Location: ../../../profile_edit.php?user=' . $_REQUEST['user']);
  } else {
    $sql = 'SELECT * FROM users WHERE login=?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([addslashes($_POST['login'])]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $user['login'] != $_SESSION['user']['login']) {
      $_SESSION['error'] = 'Пользователь с таким логином уже существует';
      header('Location: ../../../profile_edit.php?user=' . $_REQUEST['user']);
    } else {
      $lenght = strlen($_FILES['avatar']['name']);

      if ($lenght > 0) {
        $target_dir = "../../../uploads/users_images/";
        $fileName = time() . "_" . str_replace(" ", "_", basename($_FILES["avatar"]["name"]));
        $target_file = $target_dir . $fileName;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

        move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);

        $fileName = 'uploads/users_images/' . $fileName;

        if ($_SESSION['user']['avatar'] != 'assets/images/user_icon.png') {
          unlink('../../../' . $user['avatar']);
        }
      }

      $sql = 'UPDATE users SET login=?, email=?, avatar=? WHERE login=?';
      $stmt = $pdo->prepare($sql);
      $stmt->execute([addslashes($_POST['login']), addslashes($_POST['email']), $fileName, $_REQUEST['user']]);

      $sql = 'SELECT * FROM users WHERE login=?';
      $stmt = $pdo->prepare($sql);
      $stmt->execute([addslashes($_POST['login'])]);

      $user = $stmt->fetch(PDO::FETCH_ASSOC);

      $_SESSION['user']['login'] = $user['login'];
      $_SESSION['user']['role'] = $user['role'];
      $_SESSION['user']['email'] = $user['email'];
      $_SESSION['user']['avatar'] = $user['avatar'];


      header('Location: ../../../profile.php?user=' . $_SESSION['user']['login']);
    }
  }
}
