<?php
session_start();
require_once 'assets/scripts/db.php';
?>

<!DOCTYPE html>
<html lang="ru">

<?include('elements/head.php')?>

<body>
  <div class="form-wrap">
    <form class="form" action="assets/scripts/auth.php" method="POST">
      <h1>Авторизация</h1>
      <input class="input login" type="text" name="login" autocomplete="off" required placeholder="Введите ваш логин">
      <input class="input password" type="password" name="password" autocomplete="off" required placeholder="Введите пароль">
      <button class="button" type="submit" name="auth">Войти</button>
      <a class="link" href="register.php">Я новичок</a>
      <a class="link" href="recovery.php">Забыли пароль?</a>
    </form>
    <? if ($_SESSION['error']) {
      echo '<div class="layout">
                        <div class="error">
                            <h1>Произошла ошибка!</h1>' .
        $_SESSION['error'] .
        '<a class="button" href="assets/scripts/clear.php?from=authorization.php">Ладно</a>
                        </div>
                    </div>';
    }
    if ($_SESSION['message']) {
      echo '<div class="layout">
                        <div class="error">
                            <h1>Сообщение</h1>' .
        $_SESSION['message'] .
        '<a class="button" href="assets/scripts/clear.php?from=authorization.php">Ладно</a>
                        </div>
                    </div>';
    }
    ?>
  </div>
</body>

</html>