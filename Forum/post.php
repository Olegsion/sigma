<?php
session_start();
require_once 'assets/scripts/db.php';

$sql = 'SELECT *, DATE_FORMAT(`date`, "%k:%i %d.%m.%Y") as `new_date` FROM posts WHERE `id`=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['id']]);

$post = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = 'SELECT *, DATE_FORMAT(`date`, "%k:%i %d.%m.%Y") as `new_date` FROM comments WHERE `post`=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['id']]);

$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<? include 'elements/head.php' ?>

<body>
  <div class="wrapper">
    <? include 'elements/header.php' ?>
    <div class="main">
      <?php
      echo '<div class="post">
                  <h2 class="title">' . $post[0]['title'] . '</h2>
                  <p class="author">Автор: <b><a class="link" href="user_page.php?user=' . $post[0]['author'] . '">' . $post[0]['author'] . '</a></b></p>
                  <p class="date">Опубликованно: <b>' . $post[0]['new_date'] . '</b></p>';
                  if ($post[0]['image'] != '') {
                    echo '<img class="image" src="uploads/posts_images/' . $post[0]['image'] . '"/>';
                  }
                  echo '<p class="body">' . $post[0]['body'] . '</p>';
      if ($_SESSION['user']['role'] == 2 || $_SESSION['user']['role'] == 3  || $_SESSION['user']['login'] == $post[0]['author']) {
        echo '<div class="decision">
                            <a class="button" href="post_edit.php?id=' . $post[0]['id'] . '">Редактировать</a>
                            <a class="button" href="assets/scripts/posts/delete.php?id=' . $post[0]['id'] . '">Удалить</a>
                          </div>
                        </div>';
      } else {
        echo '</div>';
      }
      ?>
      <div class="comments-block">
        <h2>Комментарии</h2>
        <?
        for ($i = 0; $i < count($comments); $i++) {
          echo '<div class="post">
                  <h2 class="title">' . $comments[$i]['title'] . '</h2>
                  <p class="author">Автор: <b><a class="link" href="user_page.php?user=' . $comments[$i]['author'] . '">' . $comments[$i]['author'] . '</a></b></p>
                  <p class="date">Опубликованно: <b>' . $comments[$i]['new_date'] . '</b></p>
                  <p class="body">' . $comments[$i]['body'] . '</p>';
          if ($_SESSION['user']['role'] == 2 || $_SESSION['user']['role'] == 3  || $_SESSION['user']['login'] == $comments[$i]['author'] || $_SESSION['user']['login'] == $post[0]['author']) {
            echo '<div class="decision">
                            <a class="button" href="assets/scripts/comments/delete.php?id=' . $comments[$i]['id'] .'">Удалить</a>
                          </div>
                        </div>';
          } else {
            echo '</div>';
          }
        }
        ?>
      </div>
      <?
        if($_SESSION['user']['role']) {
          echo '
          <form class="form" action="assets/scripts/comments/create.php?id='. $post[0]['id'] .'" method="POST">
            <h1>Оставить комментарий</h1>
            <textarea class="textarea" name="body" placeholder="Текст комментария" style="resize: none;" required></textarea>
          <button class="button" type="submit">Отправить</button>
        </form>';
        } else {
          echo 'Для комментирования постов и их создания <a class="link" href="autharization.php" style="text-decoration: underline;">войдите</a> в аккааунт.';
        }
      ?>
    </div>
    <? include 'elements/footer.php' ?>
  </div>
</body>

</html>