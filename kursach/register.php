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
    <form class="form" action="assets/scripts/users/reg.php" method="POST" enctype="multipart/form-data">
      <h1>Регистрация</h1>
      <input class="input email" type="email" name="email" autocomplete="off" placeholder="Введите электронную почту" required>
      <input class="input login" type="text" name="login" autocomplete="off" placeholder="Придумайте логин (не меньше 6 латинских символов)" pattern=[a-zA-z\-\_]{6,} required>
      <input class="input password" type="password" name="password" autocomplete="off" placeholder="Придумайте пароль (не меньше 6 символов)" pattern=.{6,} required>
      <label>
        <input hidden type="file" name="image">
        <span class="button">Добавить картинку профиля</span>
      </label>
      <button class="button" type="submit" name="register">Зарегистрироваться</button>
      <a class="link" href="authorization.php">Уже есть аккаунт</a>
    </form>
    <? if ($_SESSION['error']) {
      echo '<div class="layout">
                        <div class="error">
                            <h1>Произошла ошибка!</h1>' .
        $_SESSION['error'] . '
                                <a class="button" href="assets/scripts/clear.php?from=register.php">Ладно</a>
                        </div>
                    </div>';
    }
    if ($_SESSION['message']) {
      echo '<div class="layout">
                        <div class="error">
                            <h1>Сообщение</h1>' .
        $_SESSION['message'] . '
                                <a class="button" href="assets/scripts/clear.php?from=register.php">Ладно</a>
                        </div>
                    </div>';
    }
    ?>
  </div>
</body>


</html>