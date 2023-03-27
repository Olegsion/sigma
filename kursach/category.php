<?php
session_start();
require_once 'assets/scripts/db.php';

if ($_SESSION['user']['role'] != 2 && $_SESSION['user']['role'] != 3) {
  header('Location: /');
}

$sql = 'SELECT * FROM category';
$stmt = $pdo->prepare($sql);
$stmt->execute();

$category = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<? include 'elements/head.php' ?>

<body>
  <div class="wrapper">
    <? include 'elements/header.php' ?>
    <div class="main">
      <a class="button" href="category_create.php">Добавить категорию</a>
      <div class="category-block">
        <?php
        for ($i = 0; $i < count($category); $i++) {
          echo '<div class="category">
                        <h2 class="title">' . $category[$i]['name'] . '</h2>
                        <p class="body">' . $category[$i]['description'] . '</p>
                        <div class="decision">
                            <a class="button" href="category_edit.php?id=' . $category[$i]['id'] . '">Редактировать</a>
                            <a class="button" href="assets/scripts/category/delete.php?id=' . $category[$i]['id'] . '">Удалить</a>
                        </div>
                    </div>';
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
      '<a class="button" href="assets/scripts/clear.php?from=category.php">Ладно</a>
            </div>
          </div>';
  }
  ?>
</body>

</html>