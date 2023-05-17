<? require_once 'vendor/components/head.php' ?>
<?
if ($_SESSION['user']) {
  header('Location: /');
}
?>

<body>
  <div class="wrapper">
    <? require_once 'vendor/components/header.php' ?><? require_once 'vendor/components/auth_modal.php' ?>
    <main class="main">
      <form class="form" action="vendor/scripts/users/reg.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <h1 class="form-heading">Регистрация</h1>
        <div class="labels">
          <label class="label">
            <span class="label__desc">Почта</span>
            <input class="input" name="email" type="email" placeholder="Введите почту" pattern="[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*" autocomplete="off" required>
          </label>
          <label class="label">
            <span class="label__desc">Логин</span>
            <input class="input" name="login" type="text" minlength="6" maxlength="25" placeholder="6-25 латинских букв или цифр" pattern="[a-zA-Z0-9]{6,25}" autocomplete="off" required>
          </label>
          <label class="label">
            <span class="label__desc">Пароль</span>
            <input class="input" name="password" type="password" minlength="6" maxlength="30" placeholder="6-30 символов" pattern=".{6,30}" autocomplete="off" required>
          </label>
          <label class="label file">
            <span class="label__desc">Картинка профиля</span>
            <img class="preview" src="" />
            <span class="button submit">Добавить</span>
            <input class="input-image" hidden type="file" accept="image/jpeg, image/jpg, image/png, image/gif" name="avatar" onchange="previewFile()">
          </label>
        </div>
        <button class="button submit">Зарегестрироваться</button>
      </form>
    </main>
    <?
    $page = basename(__FILE__);
    require_once 'vendor/components/error_form.php';
    ?>
    <script defer src="assets/js/previewImage.js"></script>
  </div>
</body>

</html>