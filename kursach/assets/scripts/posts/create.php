<?php
session_start();
require_once '../db.php';

if (isset($_FILES['image'])) {
  $target_dir = "../../../uploads/posts_images/";
  $fileName = time() . "_" . basename($_FILES["image"]["name"]);
  $target_file = $target_dir . $fileName;
  $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

  move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

  $sql = 'INSERT INTO posts (`author`, `category`, `title`, `body`, `image`) VALUES(?,?,?,?,?)';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$_SESSION['user']['login'], $_POST['category'], addslashes($_POST['title']), addslashes($_POST['body']), $fileName]);
} else {
  $sql = 'INSERT INTO posts (`author`, `category`, `title`, `body`) VALUES(?,?,?,?)';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$_SESSION['user']['login'], $_POST['category'], addslashes($_POST['title']), addslashes($_POST['body'])]);
}

$_SESSION['message'] = "Ваш пост отправлен на рассмотрение, в скором времени он будет опубликован";

header('Location: ../../../');
