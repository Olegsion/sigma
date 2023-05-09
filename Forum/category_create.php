<?php
session_start();
require_once 'assets/scripts/db.php';

if ($_SESSION['user']['role'] != 2 && $_SESSION['user']['role'] != 3) {
  header('Location: /');
}
?>

<!DOCTYPE html>
<html lang="ru">
<? include 'elements/head.php' ?>

<body>
  <div class="wrapper">
    <? include 'elements/header.php' ?>
    <div class="main">
      <form class="form" action="assets/scripts/category/create.php" method="POST">
        <h1>Создание категории</h1>
        <input class="input" autocomplete="off" type="text" name="value" placeholder="Значение категории(БД)" required>
        <input class="input" autocomplete="off" type="text" name="name" placeholder="Название категории" required>
        <textarea class="textarea" name="description" placeholder="Описание категории" style="resize: none;" required></textarea>
        <button class="button" type="submit">Создать</button>
      </form>
    </div>
    <? include 'elements/footer.php' ?>
</body>

</html>