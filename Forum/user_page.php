<?php
session_start();
require_once 'assets/scripts/db.php';

$sql = 'SELECT * FROM users WHERE `login`=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['user']]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = 'SELECT *, DATE_FORMAT(`date`, "%k:%i %d.%m.%Y") as `new_date` FROM posts WHERE `author`=? AND `status`=1 ORDER BY `date` DESC';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['user']]);

$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<? include 'elements/head.php' ?>

<body>
  <div class="wrapper">
    <? include 'elements/header.php' ?>
    <div class="main">
      <div class="profile-block">
        <div class="profile-pic-block">
          <img class="profile-pic" src="<? echo $user['avatar'] ?>" alt="">
        </div>
        <div class="profile-info">
          <h2><? echo $user['login'] ?></h2>
          <p>Роль: <b><?
                      if ($user['role'] == 3) {
                        echo 'Главный администратор';
                      } else  if ($user['role'] == 2) {
                        echo 'Администратор';
                      } else {
                        echo 'Пользователь';
                      }
                      ?></b></p>
          <?
          if ($_SESSION['user']['role'] == 2 || $_SESSION['user']['role'] == 3 || $_SESSION['user']['login'] == $user['login']) {
            echo '<a class="button" href="assets/scripts/users/delete.php?id=' . $user['id'] . '">Удалить профиль</a>';
          }
          if ($_SESSION['user']['login'] == $user['login']) {
            echo '
            <form id="form" action="assets/scripts/users/change_avatar.php?id=' . $user['id'] . '" method="POST" enctype="multipart/form-data">
              <label>
                <input id="changeAvatar" hidden type="file" name="image">
                <span  class="button">Изменить картинку профиля</span>
              </label>
            </form>';
          }
          ?>
          <script>
            const input = document.querySelector('#changeAvatar')
            const form = document.querySelector('#form')

            input.addEventListener('change', () => {
              form.submit()
            })
          </script>
        </div>
      </div>
      <div class="posts-block">
        <h2><? if ($_SESSION['user']['login'] == $user['login']) {
              echo 'Мои посты:';
            } else {
              echo 'Посты пользователя:';
            } ?></h2>
        <?php
        for ($i = 0; $i < count($posts); $i++) {
          echo '<div class="post">
                  <a class="link" href="post.php?id=' . $posts[$i]['id'] . '"><h2 class="title">' . $posts[$i]['title'] . '</h2></a>
                  <p class="date">Опубликованно: <b>' . $posts[$i]['new_date'] . '</b></p>';
          if ($posts[0]['image'] != '') {
            echo '<img class="image" src="uploads/posts_images/' . $posts[0]['image'] . '"/>';
          }
          echo '<p class="body">' . $posts[$i]['body'] . '</p>';
          if ($_SESSION['user']['role'] == 2 || $_SESSION['user']['role'] == 3 || $_SESSION['user']['login'] == $posts[$i]['author']) {
            echo '<div class="decision">
                            <a class="button" href="post_edit.php?id=' . $posts[$i]['id'] . '">Редактировать</a>
                            <a class="button" href="assets/scripts/posts/delete.php?id=' . $posts[$i]['id'] . '&from=user_page.php?user='.$_REQUEST['user'].'">Удалить</a>
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
      '<a class="button" href="assets/scripts/clear.php?from=user_page.php?user=' . $_REQUEST['user'] . '">Ладно</a>
            </div>
          </div>';
  }
  ?>
</body>

</html>