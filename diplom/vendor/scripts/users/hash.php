<?
session_start();
require_once '../db_connect.php';

$sql = 'SELECT * FROM users WHERE email=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_POST['email']]);

$user = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($user) {
  $sql = 'UPDATE users SET hash=? WHERE email=?';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([hash('sha256', $_POST['email']), $_POST['email']]);

  mail($user[0]['email'], 'Восстановление пароля MooChan', 'Для восстановления пароля перейдите по ссылке: http://a0828499.xsph.ru/recovery.php?hash=' . hash('sha256', $_POST['email']));

  $_SESSION['message'] = "На вашу электронную почту было отправленно письмо с ссылкой для изменения пароля. Откройте присланное письмо и перейдите по ссылке.";
} else {
  $_SESSION['error'] = "Пользователь с такой почтой не найден...";
}

header('Location: ../../../');
