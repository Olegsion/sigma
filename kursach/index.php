<?php
session_start();
require_once 'assets/scripts/db.php';


if ($_REQUEST['sorting']) {
  $sql = 'SELECT *, DATE_FORMAT(`date`, "%k:%i %d.%m.%Y") as `new_date` FROM posts WHERE `category`=? AND `status`=1 ORDER BY `date` DESC';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$_REQUEST['sorting']]);
} else {
  $sql = 'SELECT *, DATE_FORMAT(`date`, "%k:%i %d.%m.%Y") as `new_date` FROM posts WHERE `status`=1 ORDER BY `date` DESC';
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
}

$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = 'SELECT * FROM category';
$stmt = $pdo->prepare($sql);
$stmt->execute();

$category = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_REQUEST['sorting']) {
  $sql = 'SELECT * FROM category WHERE `value`=?';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$_REQUEST['sorting']]);
}
$sorting = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
          <a class="link" href="/">Все посты</a>
          <?
          for ($i = 0; $i < count($category); $i++) {
            echo '
            <a href="/?sorting=' . $category[$i]['value'] . '" class="link">' . $category[$i]['name'] . '</a>
        ';
          }
          ?>
        </div>
      </div>
      <div class="info-block">
        <?
        if ($_REQUEST['sorting']) {
          echo ' 
            <h2>Категория: ' . $sorting[0]['name'] . '</h2>
            <p>' . $sorting[0]['description'] . '</p>';
        }
        ?>
      </div>
      <div class="posts-block">
        <?php
        for ($i = 0; $i < count($posts); $i++) {
          echo '<div class="post">
                  <a class="link" href="post.php?id=' . $posts[$i]['id'] . '"><h2 class="title">' . $posts[$i]['title'] . '</h2></a>
                  <p class="author">Автор: <b><a class="link" href="user_page.php?user=' . $posts[$i]['author'] . '">' . $posts[$i]['author'] . '</a></b></p>
                  <p class="date">Опубликованно: <b>' . $posts[$i]['new_date'] . '</b></p>';
          if ($posts[$i]['image'] != '') {
            echo '<img class="image" src="uploads/posts_images/' . $posts[$i]['image'] . '"/>';
          }
          echo '<p class="body">' . substr($posts[$i]['body'], 0, 250) . '...</p>';
          if ($_SESSION['user']['role'] == 2 || $_SESSION['user']['role'] == 3) {
            echo '<div class="decision">
                            <a class="button" href="post_edit.php?id=' . $posts[$i]['id'] . '">Редактировать</a>
                            <a class="button" href="assets/scripts/posts/delete.php?id=' . $posts[$i]['id'] . '">Удалить</a>
                          </div>
                        </div>';
          } else {
            echo '</div>';
          }
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
      '<a class="button" href="assets/scripts/clear.php"' . NULL . '>Ладно</a>
            </div>
          </div>';
  }
  ?>
</body>

</html>