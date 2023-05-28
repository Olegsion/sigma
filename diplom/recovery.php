<?
require_once 'vendor/components/head.php' ?>

<body>
  <div class="wrapper">
    <? require_once 'vendor/components/header.php' ?><? require_once 'vendor/components/auth_modal.php' ?>
    <main class="main">
      <?
      if ($_REQUEST['hash'] != NULL) {
        echo '
        <form class="form" action="vendor/scripts/users/recovery.php?hash=' . $_REQUEST['hash'] . '" method="POST" autocomplete="off">
        <h1 class="form-heading">Восстановление пароля</h1>
        <div class="labels">
          <label class="label">
            <span class="label__desc">Пароль</span>
            <input class="input" name="password" type="password" pattern=".{6,30}" placeholder="Ваш новый пароль" autocomplete="off" required>
          </label>
        </div>
        <a class="nav__link" href="login.php">Авторизация</a>
        <button class="button submit">Подтвердить</button>
      </form>
        ';
      } else {
        echo '
        <form class="form" action="vendor/scripts/users/hash.php" method="POST" autocomplete="off">
        <h1 class="form-heading">Восстановление пароля</h1>
        <div class="labels">
          <label class="label">
            <span class="label__desc">Почта</span>
            <input class="input" name="email" type="email" pattern="[a-zA-Z0-9.!#$%&\'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*" placeholder="Емейл к которому привязан ваш аккаунт" autocomplete="off" required>
          </label>
        </div>
        <a class="nav__link" href="login.php">Авторизация</a>
        <button class="button submit">Подтвердить</button>
      </form>';
      }
      ?>
    </main>
    <?
    $page = basename(__FILE__);
    require_once 'vendor/components/error_form.php';
    ?>
  </div>
</body>

</html>