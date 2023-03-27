<?php
session_start();
require_once 'assets/scripts/db.php';

if (!$_SESSION['user']['role']) {
  header('Location: /');
}

if ($_SESSION['user']['role'] == 2 || $_SESSION['user']['role'] == 3) {
  $sql = 'SELECT * FROM category';
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
} else {
  $sql = 'SELECT * FROM category WHERE value <> "news"';
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
}

$category = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = 'SELECT * FROM posts WHERE id=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['id']]);

$post = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<? include 'elements/head.php' ?>

<body>
  <div class="wrapper">
    <? include 'elements/header.php' ?>
    <div class="main">
      <form class="form" action="assets/scripts/posts/edit.php?id=<? echo $_REQUEST['id']; ?>" method="POST" enctype="multipart/form-data">
        <h1>Редактирование поста</h1>
        <input class="input" type="text" name="title" placeholder="Заголовок поста" value='<? echo ($post[0]["title"]); ?>' required>
        <select class="input" name="category" required>
          <?
          for ($i = 0; $i < count($category); $i++) {
            if ($post[0]['category'] == $category[$i]['value']) {
              echo '<option selected value="' . $category[$i]['value'] . '">' . $category[$i]['name'] . '</option>';
            } else {
              echo '<option value="' . $category[$i]['value'] . '">' . $category[$i]['name'] . '</option>';
            }
          }
          ?>
        </select>
        <textarea class="textarea" name="body" placeholder="Текст поста" style="resize: none;" required><? echo $post[0]['body']; ?></textarea>
        <img class="image preview" src="uploads/posts_images/<?echo $post[0]['image']?>" onerror='this.style.display = "none"' />
        <div class="buttons-block"> <label>
            <input class="form__input" hidden type="file" name="image" onchange="previewFile()">
            <span class="button">Изменить картинку</span>
          </label>
          <a href="assets/scripts/posts/image_delete.php?id=<? echo $post[0]['id'] ?>" class="button">Удалить картинку</a>
        </div>
        <button class="button" type="submit">Редактировать</button>
      </form>
    </div>
    <? include 'elements/footer.php' ?>
</body>
<script src="assets/js/previewImage.js"></script>

</html>