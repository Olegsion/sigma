<? require_once 'vendor/components/head.php' ?>
<?
if ($_SESSION['user']['role'] != 'admin' && $_SESSION['user']['role'] != 'mastadmin') {
  header('Location: /');
}

if ($_REQUEST['board']) {
  $sql = 'SELECT * FROM boards WHERE value=?';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$_REQUEST['board']]);

  $board = $stmt->fetch(PDO::FETCH_ASSOC);

  $sql = 'SELECT * FROM themes';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([]);

  $themes = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $heading = 'Редактирование доски';
}
if ($_REQUEST['theme']) {
  $sql = 'SELECT * FROM themes WHERE value=?';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$_REQUEST['theme']]);

  $theme = $stmt->fetch(PDO::FETCH_ASSOC);

  $heading = 'Редактирование темы';
}
if (isset($_REQUEST['new_board'])) {
  $heading = 'Создание доски';

  $sql = 'SELECT * FROM themes';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([]);

  $themes = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
if (isset($_REQUEST['new_theme'])) {
  $heading = 'Создание темы';
}
?>

<body>
  <div class="wrapper">
    <? require_once 'vendor/components/header.php' ?>
    <main class="main">
      <?
      if ($_REQUEST['theme']) {
        echo '
        <form class="form" action="vendor/scripts/themes/edit.php?theme=' . $theme['value'] . '" method="POST" autocomplete="off">
        <h1 class="form-heading">' . $heading . '</h1>
        <div class="labels">
          <label class="label">
            <span class="label__desc">Название</span>
            <input class="input" name="name" type="text" placeholder="Введите название темы" autocomplete="off" required value="' . $theme['name'] . '">
          </label>
          <label class="label">
            <span class="label__desc">Значение</span>
            <input class="input" name="value" type="text" placeholder="Введите значение темы в БД" autocomplete="off" required value="' . $theme['value'] . '">
          </label>
        </div>
        <button class="button submit">Подтвердить</button>
      </form>
        ';
      }
      if (isset($_REQUEST['new_theme'])) {
        echo '
        <form class="form" action="vendor/scripts/themes/create.php" method="POST" autocomplete="off">
        <h1 class="form-heading">' . $heading . '</h1>
        <div class="labels">
          <label class="label">
            <span class="label__desc">Название</span>
            <input class="input" name="name" type="text" placeholder="Введите название темы" autocomplete="off" required>
          </label>
          <label class="label">
            <span class="label__desc">Значение</span>
            <input class="input" name="value" type="text" placeholder="Введите значение темы в БД" autocomplete="off" required>
          </label>
        </div>
        <button class="button submit">Подтвердить</button>
      </form>
        ';
      }
      if ($_REQUEST['board']) {
        echo '
        <form class="form" action="vendor/scripts/boards/edit.php?board=' . $board['value'] . '" method="POST" autocomplete="off">
        <h1 class="form-heading">' . $heading . '</h1>
        <div class="labels">
          <label class="label">
            <span class="label__desc">Название</span>
            <input class="input" name="name" type="text" placeholder="Введите название доски" autocomplete="off" required value="' . $board['name'] . '">
          </label>
          <label class="label">
            <span class="label__desc">Значение</span>
            <input class="input" name="value" type="text" placeholder="Введите значение доски в БД" autocomplete="off" required value="' . $board['value'] . '">
          </label>
          <label class="label">
            <span class="label__desc">Описание</span>
            <input class="input" name="desc" autocomplete="off" placeholder="Введите описание доски" required value="' . $board['description'] . '"/>
          </label>
          <label class="label">
            <span class="label__desc">Тема</span>
            <select class="select" name="theme" required>';
                for ($i = 0; $i < count($themes); $i++) {
                  if ($board['theme'] == $themes[$i]['value']) {
                    echo '<option selected value="' . $themes[$i]['value'] . '">' . $themes[$i]['name'] . '</option>';
                  } else {
                    echo '<option value="' . $themes[$i]['value'] . '">' . $themes[$i]['name'] . '</option>';
                  }
                }
            echo '</select>
          </label>
        </div>
        <button class="button submit">Подтвердить</button>
      </form>
        ';
      }
      if (isset($_REQUEST['new_board'])) {
        echo '
        <form class="form" action="vendor/scripts/boards/create.php" method="POST" autocomplete="off">
        <h1 class="form-heading">' . $heading . '</h1>
        <div class="labels">
          <label class="label">
            <span class="label__desc">Название</span>
            <input class="input" name="name" type="text" placeholder="Введите название доски" autocomplete="off" required>
          </label>
          <label class="label">
            <span class="label__desc">Значение</span>
            <input class="input" name="value" type="text" placeholder="Введите значение доски в БД" autocomplete="off" required>
          </label>
          <label class="label">
            <span class="label__desc">Описание</span>
            <input class="input" name="desc" placeholder="Введите описание доски" autocomplete="off" required>
          </label>
          <label class="label">
            <span class="label__desc">Тема</span>
            <select class="select" name="theme" required>
              <option selected disabled hidden value="">Выберите категорию</option>';
        for ($i = 0; $i < count($themes); $i++) {
          echo '<option value="' . $themes[$i]['value'] . '">' . $themes[$i]['name'] . '</option>';
        }
        echo '</select>
          </label>
        </div>
        <button class="button submit">Подтвердить</button>
      </form>
        ';
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