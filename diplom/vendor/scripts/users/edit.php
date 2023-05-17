<?
session_start();
require_once '../db_connect.php';

$sql = 'SELECT * FROM users WHERE login=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['user']]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = 'SELECT * FROM users WHERE email=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_POST['email']]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && $user['email'] != $_SESSION['user']['email']) {
  $_SESSION['error'] = 'Пользователь с такой почтой уже существует';
  header('Location: ../../../profile_edit.php?user=' . $_REQUEST['user']);
} else {
  $sql = 'SELECT * FROM users WHERE login=?';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$_POST['login']]);

  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($user && $user['login'] != $_SESSION['user']['login']) {
    $_SESSION['error'] = 'Пользователь с таким логином уже существует';
    header('Location: ../../../profile_edit.php?user=' . $_REQUEST['user']);
  } else {

    unlink('../../../' . $user['avatar']);

    $lenght = strlen($_FILES['avatar']['name']);

    if ($lenght > 0) {
      $target_dir = "../../../uploads/users_images/";
      $fileName = time() . "_" . str_replace(" ", "_", basename($_FILES["avatar"]["name"]));
      $target_file = $target_dir . $fileName;
      $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

      move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);

      $fileName = 'uploads/users_images/' . $fileName;
    } else {
      $fileName = "assets/images/user_icon.png";
    }

    $sql = 'UPDATE users SET login=?, email=?, avatar=? WHERE login=?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST['login'], $_POST['email'], $fileName, $_REQUEST['user']]);

    $sql = 'SELECT * FROM users WHERE login=?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST['login']]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    $_SESSION['user']['login'] = $user['login'];
    $_SESSION['user']['role'] = $user['role'];
    $_SESSION['user']['avatar'] = $user['avatar'];
    $_SESSION['user']['email'] = $user['email'];

    header('Location: ../../../profile.php?user=' . $_SESSION['user']['login']);
  }
}
