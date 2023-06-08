<?
session_start();
$sql = 'SELECT * FROM themes';
$stmt = $pdo->prepare($sql);
$stmt->execute([]);

$themes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="nav">
  <?
  if ($_SESSION['user']['role'] == 'admin' || $_SESSION['user']['role'] == 'mastadmin') {
    echo '
    <div class="nav__section">
      <p class="section__name">Админ-панель</p>
      <a href="themes.php" class="nav__link">Темы</a>
      <a href="users.php" class="nav__link">Пользователи</a>
      <a href="offers.php" class="nav__link">Отзывы</a>
    </div>
    ';
  }
  ?>
  <div class="nav__section">
    <p class="section__name">Информация</p>
    <a href="/" class="nav__link">Главная</a>
    <a href="rules.php" class="nav__link">Правила форума</a>
  </div>
  <?
  for ($i = 0; $i < count($themes); $i++) {
    echo '<div class="nav__section">
          <p class="section__name">' . $themes[$i]['name'] . '</p>';

    $sql = 'SELECT * FROM boards WHERE theme=?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$themes[$i]['value']]);

    $boards = $stmt->fetchAll(PDO::FETCH_ASSOC);

    for ($j = 0; $j < count($boards); $j++) {
      echo '<a href="board.php?board=' . $boards[$j]['value'] . '&page=1" class="nav__link">' . $boards[$j]['name'] . '</a>';
    }
    echo '</div>';
  }
  ?>
</div>