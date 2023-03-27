    <div class="header">
      <div class="header-content">
        <div class="logo">
          <a href="index.php"><img class="logo-image" src="assets/images/logo.png" alt=""></a>
        </div>
        <? include 'nav.php' ?>
        <div class="buttons-block buttons-block--wide">
          <?
          if ($_SESSION['user']['role']) {
            if ($_SERVER['REQUEST_URI'] !== '/post_create.php') {
              echo '<a class="button" href="post_create.php">Создать пост</a>';
            }
            echo '
                  <a class="button" href="assets/scripts/logout.php">Выйти</a>';
          } else {
            echo '<a class="button" href="authorization.php">Войти</a>';
          }
          ?>
        </div>
      </div>
    </div>