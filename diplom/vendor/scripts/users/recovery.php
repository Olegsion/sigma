<?
session_start();
require_once '../db_connect.php';

$sql = 'SELECT * FROM users WHERE hash=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['hash']]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
  $sql = 'UPDATE users SET password=? WHERE hash=?';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([sha1($_POST['password']), $_REQUEST['hash']]);

  $_SESSION['message'] = "Пароль был успешно изменён!";

  $sql = 'UPDATE users SET hash="" WHERE hash=?';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$_REQUEST['hash']]);

  header('Location: ../../../login.php');
} else {
  $_SESSION['error'] = "Ссылка для восстановления недействительна!";
  header('Location: ../../../login.php');
}
