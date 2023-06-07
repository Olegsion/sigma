<?
require_once 'vendor/components/head.php' ?>
<?
if ($_SESSION['user']['login'] != $_REQUEST['user']) {
  header('Location: /');
}
$sql = 'SELECT * FROM users WHERE login=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['user']]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<body>
  <div class="wrapper">
    <? require_once 'vendor/components/header.php' ?>
    <? require_once 'vendor/components/auth_modal.php' ?>
    <main class="main">
      <form class="form" action="vendor/scripts/users/edit.php?user=<? echo $user['login'] ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
        <h1 class="form-heading">Редактирование профиля</h1>
        <div class="labels">
          <label class="label file">
            <span class="label__desc">Картинка профиля</span>
            <img class="preview" src="<? echo $user['avatar'] ?>" />
            <span class="button submit">Изменить</span>
            <input class="input-image" hidden type="file" accept="image/jpeg, image/jpg, image/png, image/gif" name="avatar" onchange="previewFile()">
          </label>
          <label class="label">
            <span class="label__desc">Почта</span>
            <input class="input" name="email" type="email" placeholder="Изменение почты" pattern="[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*" autocomplete="off" value="<? echo $user['email'] ?>" required>
          </label>
          <label class="label">
            <span class="label__desc">Логин</span>
            <input class="input" name="login" type="text" minlength="6" maxlength="25" placeholder="6-25 латинских букв или цифр" pattern="[a-zA-Z0-9]{6,25}" autocomplete="off" value="<? echo $user['login'] ?>" required>
          </label>
          <label class="label">
            <span class="label__desc">Пароль</span>
            <input class="input" name="password" type="password" minlength="6" maxlength="30" placeholder="Введите для подтвеждения изменений" pattern=".{6,30}" autocomplete="off" required>
          </label>
        </div>
        <a class="nav__link" href="recovery.php">Изменить пароль</a>
        <button class="button submit">Подтвердить</button>
      </form>
    </main>
    <?
    $page = basename(__FILE__) . '?user=' . $_REQUEST['user'];
    require_once 'vendor/components/error_form.php';
    ?>
    <script defer src="assets/js/previewImage.js"></script>
  </div>
</body>

</html>