<?php
session_start();
require_once 'assets/scripts/db.php';

if ($_SESSION['user']['role'] != 2 && $_SESSION['user']['role'] != 3) {
  header('Location: /');
}

$sql = 'SELECT * FROM category WHERE id=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['id']]);

$category = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<? include 'elements/head.php' ?>

<body>
  <div class="wrapper">
    <? include 'elements/header.php' ?>
    <div class="main">
      <form class="form" action="assets/scripts/category/edit.php?id=<?echo $category[0]['id']?>" method="POST">
        <h1>Редактирование категории</h1>
        <input class="input" autocomplete="off" type="text" name="value" placeholder="Значение категории(БД)" value="<? echo $category[0]['value']?>" required>
        <input class="input" autocomplete="off" type="text" name="name" placeholder="Название категории" value="<?echo $category[0]['name']?>" required>
        <textarea class="textarea" name="description" placeholder="Описание категории" style="resize: none;" required><? echo $category[0]['description']?></textarea>
        <button class="button" type="submit">Редактировать</button>
      </form>
    </div>
    <? include 'elements/footer.php' ?>
</body>

</html>