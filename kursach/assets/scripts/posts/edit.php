<?
session_start();
require_once '../db.php';

if ($_FILES['image']['name'] != '') {
  $sql = 'SELECT * FROM posts WHERE id = ?';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$_REQUEST['id']]);

  $post = $stmt->fetch(PDO::FETCH_ASSOC);

  unlink('../../../uploads/posts_images/' . $post['image']);

  $target_dir = "../../../uploads/posts_images/";
  $fileName = time() . "_" . basename($_FILES["image"]["name"]);
  $target_file = $target_dir . $fileName;
  $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

  move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

  $sql = 'UPDATE posts SET title=?, body=?, image=?, status=0 WHERE id=?';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([addslashes($_POST['title']), addslashes($_POST['body']), $fileName, $_REQUEST['id']]);
} else {
  $sql = 'UPDATE posts SET title=?, body=?, status=0 WHERE id=?';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([addslashes($_POST['title']), addslashes($_POST['body']), $_REQUEST['id']]);
}

$_SESSION['message'] = "Пост был отредактирован, в скором времени вновь будет опубликован";

header('Location: ../../../');
