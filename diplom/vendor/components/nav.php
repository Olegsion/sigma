<?

$sql = 'SELECT * FROM themes';
$stmt = $pdo->prepare($sql);
$stmt->execute([]);

$themes = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="nav">
  <?
  if ($_SESSION['user']['role'] == 'admin' || $_SESSION['user']['role'] == 'mastadmin') {
    echo '
    <div class="admin-panel">
      <p class="section__name">Админ-панель</p>
      <a href="" class="nav__link">Темы и доски</a>
      <a href="" class="nav__link">Пользователи</a>
    </div>
    ';
  }
  ?>
  <?
  for ($i = 0; $i < count($themes); $i++) {
    echo '<div class="nav__section">
          <p class="section__name">' . $themes[$i]['name'] . '</p>';

    $sql = 'SELECT * FROM boards WHERE theme=?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$themes[$i]['value']]);

    $boards = $stmt->fetchAll(PDO::FETCH_ASSOC);
    for ($j = 0; $j < count($boards); $j++) {
      echo '<a href="board.php?board=' . $boards[$j]['value'] . '" class="nav__link">' . $boards[$j]['name'] . '</a>';
    }
    echo '</div>';
  }
  ?>
</div>