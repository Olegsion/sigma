<?
require_once 'vendor/components/head.php' ?>
<?
if ($_SESSION['user']) {
  header('Location: /');
}
?>

<body>
  <div class="wrapper">
    <? require_once 'vendor/components/header.php' ?><? require_once 'vendor/components/auth_modal.php' ?>
    <main class="main">
      <form class="form" action="vendor/scripts/users/login.php" method="POST" autocomplete="off">
        <h1 class="form-heading">Авторизация</h1>
        <div class="labels">
          <label class="label">
            <span class="label__desc">Логин</span>
            <input class="input" name="login" type="text" minlength="6" maxlength="25" placeholder="Введите ваш логин" pattern="[a-zA-Z0-9]{6,25}" autocomplete="off" required>
          </label>
          <label class="label">
            <span class="label__desc">Пароль</span>
            <input class="input" name="password" type="password" minlength="6" maxlength="30" placeholder="Введите ваш пароль" pattern=".{6,30}" autocomplete="off" required>
          </label>
        </div>
        <a class="nav__link" href="recovery.php">Забыли пароль?</a>
        <button class="button submit">Войти</button>
      </form>
    </main>
    <?
    $page = basename(__FILE__);
    require_once 'vendor/components/error_form.php';
    ?>
  </div>
</body>

</html>