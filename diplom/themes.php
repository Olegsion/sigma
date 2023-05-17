<? require_once 'vendor/components/head.php' ?>
<?
if ($_SESSION['user']['role'] != 'admin' && $_SESSION['user']['role'] != 'mastadmin') {
  header('Location: /');
}

$sql = 'SELECT * FROM themes';
$stmt = $pdo->prepare($sql);
$stmt->execute([]);

$themes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<body>
  <div class="wrapper">
    <? require_once 'vendor/components/header.php' ?><? require_once 'vendor/components/auth_modal.php' ?>
    <main class="main">
      <div class="content">
        <div class="interactive">
          <div class="info-block">
            <h1 class="board-heading">Темы</h1>
          </div>
          <div class="settings">
            <a href="tb_edit.php?new_theme" class="nav__link">Добавить тему</a>
            <a href="tb_edit.php?new_board" class="nav__link">Добавить доску</a>
          </div>
        </div>
        <div class="themes">
          <?
          if (count($themes) == 0) {
            echo '<p   style="width:85%;text-align:center;">Пока что не создано ни одной темы</p>';
          }
          for ($i = 0; $i < count($themes); $i++) {
            echo '
            <div class="theme">
              <div class="theme-info">
                <p class="theme-name">' . $themes[$i]['name'] . '</p>
                <div class="buttons-block">
                  <a href="tb_edit.php?theme=' . $themes[$i]['value'] . '"><button class="button">Редакировать</button></a>
                  <a href="vendor/scripts/themes/delete.php?theme=' . $themes[$i]['value'] . '"><button class="button">Удалить</button></a>
                </div>
              </div>';
            $sql = 'SELECT * FROM boards WHERE theme=?';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$themes[$i]['value']]);

            $boards = $stmt->fetchAll(PDO::FETCH_ASSOC);

            echo '<div class="boards">';
            if (count($boards) == 0) {
              echo '<p   style="width:100%;text-align:center;">В этой теме ещё нет досок</p>';
            }
            for ($j = 0; $j < count($boards); $j++) {
              echo '
                  <div class="board">
                    <div class="board-info">
                    <p class="board-name">' . $boards[$j]['name'] . '</p>
                    <p class="board-desc">' . $boards[$j]['description'] . '</p>
                    </div>
                    <div class="buttons-block">
                    <a href="tb_edit.php?board=' . $boards[$j]['value'] . '"><button class="button">Редакировать</button></a>
                    <a href="vendor/scripts/boards/delete.php?board=' . $boards[$j]['value'] . '"><button class="button">Удалить</button></a>
                    </div>
                  </div>
                ';
            }
            echo '</div>
            </div>';
          }
          ?>
        </div>
      </div>
      <?
      require_once 'vendor/components/nav.php';
      require_once 'vendor/components/scroll_buttons.php';
      ?>
      <script defer src="assets/js/swap_boards.js"></script>
      <script src="assets/js/scroll_buttons.js" defer></script>
    </main>
  </div>
</body>

</html>