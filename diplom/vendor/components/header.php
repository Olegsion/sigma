<header class="header">
  <div class="logo">
    <a href="/"><img class="logo__image" src="assets/images/logo.png" alt="MooChan"></a>
  </div>

  <div class="profile">
    <?php
    if ($_SESSION['user']['avatar']) {
      echo '
            <div class="profile__image circle" style="background: url(' . $_SESSION['user']['avatar']  . ') no-repeat center;   background-size: cover;"></div>
            ';
    } else {
      echo '
            <img src="assets/images/user_icon.png" alt="" class="profile__image">
            ';
    }
    ?>
  </div>
</header>

<div class="buttons">
  <?
  if ($_SESSION['user']) {
    echo '
        <a href="login.php"><button class="button">Профиль</button></a>
        <a href="vendor/scripts/users/logout.php"><button class="button">Выход</button></a>
        ';
  } else {
    echo '
        <a href="login.php"><button class="button">Авторизация</button></a>
        <a href="reg.php"><button class="button">Регистрация</button></a>
        ';
  }
  ?>
</div>
<div class="layout"></div>