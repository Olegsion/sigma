<?php
session_start();
require_once 'assets/scripts/db.php';

if ($_SESSION['user']['role'] != 3) {
  header('Location: /');
}

if ($_REQUEST['sorting']) {
  $sql = 'SELECT * FROM users WHERE role <> 3 AND role=?';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$_REQUEST['sorting']]);
} else {
  $sql = 'SELECT * FROM users WHERE role <> 3';
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
}

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<? include 'elements/head.php' ?>

<body>
  <div class="wrapper">
    <? include 'elements/header.php' ?>
    <div class="main">
      <div class="sorting">
        <h2 class="sorting__heading">Фильтрация:</h2>
        <div class="sorting__links">
          <a class="link" href="users.php">Все пользователи</a>
          <a class="link" href="users.php?sorting=2">Админы</a>
          <a class="link" href="users.php?sorting=1">Читатели</a>
        </div>
      </div>
      <div class="users-block">
        <?php
        for ($i = 0; $i < count($users); $i++) {
          echo '<div class="user">
                  <a class="link" href="user_page.php?user='. $users[$i]['login'].'"><h2 class="title">' . $users[$i]['login'] . '</h2></a>
                  <p class="login">Почта: <b>' . $users[$i]['email'] . '</b></p>
                  <p class="date">Роль: <b>'; if ($users[$i]['role'] == 2) {echo 'Админ';} else{echo 'Читатель';} echo '</b></p>
                  <p class="body">' . $users[$i]['body'] . '</p>';
          if ($users[$i]['role'] == 1) {
            echo '<div class="decision">
                            <a class="button" href="assets/scripts/users/admin.php?id=' . $users[$i]['id'] . '">Назначить админом</a>
                            <a class="button" href="assets/scripts/users/delete.php?id=' . $users[$i]['id'] . '&?from="users.php"">Удалить</a>
                          </div>';
          } else  if ($users[$i]['role'] == 2) {
            echo '<div class="decision">
                            <a class="button" href="assets/scripts/users/disadmin.php?id=' . $users[$i]['id'] . '">Лишить админки</a>
                            <a class="button" href="assets/scripts/users/delete.php?id=' . $users[$i]['id'] . '&?from="users.php"">Удалить</a>
                          </div>';
          }
          echo '</div>';
        }
        ?>
      </div>
    </div>
    <? include 'elements/footer.php' ?>
  </div>
  <?
  if ($_SESSION['message']) {
    echo '<div class="layout">
            <div class="error">
              <h1>Сообщение</h1>' .
      $_SESSION['message'] .
      '<a class="button" href="assets/scripts/clear.php?from=users.php">Ладно</a>
            </div>
          </div>';
  }
  ?>
</body>

</html>