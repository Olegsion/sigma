<?
if (isset($_SESSION['user'])) {
  echo '
  <div class="auth_modal">
  <h2>Вы не авторизованны</h2>
  <h3>Войдите в свой аккаунт или создайте новый</h3>
  <a href="login.php"><button class="button modal">Авторизация</button></a>
  <a href="reg.php"><button class="button modal">Регистрация</button></a>
  <span>Или войдите позже, кликнув по иконке в правом верхнем углу страницы</span>
  <img class="close-icon" src="./assets/images/close_icon.png" alt="">
  </div>
  ';
}
