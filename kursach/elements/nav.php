<?
if ($_SESSION['user']['role'] == '3') {
  echo '
    <div class="nav">
      <a href="/" class="link">Главная</a>
      <a href="users.php" class="link">Пользователи</a>
      <a href="category.php" class="link">Категории</a>
      <a href="proposed.php" class="link">Предложка</a>
      <a href="user_page.php?user='. $_SESSION['user']['login'].'" class="link">Мой профиль</a>
    </div>';
} else if ($_SESSION['user']['role'] == '2') {
  echo '
    <div class="nav">
      <a href="/" class="link">Главная</a>
      <a href="category.php" class="link">Категории</a>
      <a href="proposed.php" class="link">Предложка</a>
      <a href="user_page.php?user='. $_SESSION['user']['login'].'" class="link">Мой профиль</a>
    </div>';
} else if ($_SESSION['user']['role'] == '1') {
  echo '
    <div class="nav">
      <a href="/" class="link">Главная</a>
      <a href="user_page.php?user='. $_SESSION['user']['login'].'" class="link">Мой профиль</a>
    </div>';
}
