<?php
session_start();
require_once 'assets/scripts/db.php';
if ($_SESSION['user']) {
  header('Location: /');
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/styles/!global.css">
  <title>BasedForum</title>
</head>

<body>
  <div class="form-wrap">
    <form class="form" action="assets/scripts/recover.php" method="POST">
      <h1>Восстановление пароля</h1>
      <p class="hint">Введите в поле ниже адрес электронной почты, к которому привязан ваш аккаунт</p>
      <input class="input login" type="text" name="email" autocomplete="off" required placeholder="Введите электронную почту">
      <button class="button" type="submit" name="auth">Отправить</button>
      <a class="link" href="authorization.php">Назад</a>
    </form>
  </div>
</body>

</html>