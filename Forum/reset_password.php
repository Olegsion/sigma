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
    <form class="form" action="assets/scripts/reset.php?hash=<? echo $_REQUEST['hash'] ?>" method="POST">
      <h1>Восстановление пароля</h1>
      <p class="hint">Введите в поле ниже новый пароль для вашего аккаунта</p>
      <input class="input password" type="text" name="password" autocomplete="off" required placeholder="Введите новый пароль">
      <button class="button" type="submit" name="auth">Отправить</button>
    </form>
  </div>
</body>

</html>