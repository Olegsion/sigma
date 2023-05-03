<header class="header">
  <div class="logo">
    <a href="/"><img class="logo__image" src="assets/images/logo.png" alt="MooChan"></a>
  </div>

  <div class="user">
    <?php
    if ($_SESSION['user']['avatar'] != '') {
      echo '
            <img class="circle" src="' . $_SESSION['user']['avatar'] . '"></img>
            ';
    } else {
      echo '
            <img class="circle" src="assets/images/user_icon.png" alt="" class="">
            ';
    }
    ?>
  </div>
</header>

<div class="buttons">
  <?
  if ($_SESSION['user']) {
    echo '
        <a href="profile.php?user=' . $_SESSION['user']['login'] . '"><button class="button">Профиль</button></a>
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