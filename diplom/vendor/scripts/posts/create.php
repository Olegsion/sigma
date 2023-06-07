<?
session_start();
require_once '../db_connect.php';

$lenght = strlen($_FILES['pic']['name']);

if ($lenght > 0) {
  $target_dir = "../../../uploads/posts_images/";
  $fileName = time() . "_" . str_replace(" ", "_", basename($_FILES["pic"]["name"]));
  $target_file = $target_dir . $fileName;
  $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

  move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file);

  $fileName = 'uploads/posts_images/' . $fileName;
} else {
  $fileName = '';
}

for ($i = 0; $i < 35; $i++) {
  $sql = 'INSERT INTO posts(board, author, body, pic, thread_id) VALUES(?,?,?,?,?)';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$_REQUEST['board'], $_SESSION['user']['login'], $_POST['body'], $fileName, $_REQUEST['thread_id']]);
}

if ($_REQUEST['from']) {
  $sql = 'SELECT * FROM posts WHERE author=? AND id=(SELECT MAX(id) FROM posts)';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$_SESSION['user']['login']]);

  $post = $stmt->fetch(PDO::FETCH_ASSOC);

  header('Location: ../../../' . $_REQUEST['from'].'#'. $post['id']);
} else {
  $sql = 'SELECT * FROM posts WHERE author=? AND id=(SELECT MAX(id) FROM posts)';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$_SESSION['user']['login']]);

  $thread = $stmt->fetch(PDO::FETCH_ASSOC);

  header('Location: ../../../thread.php?thread=' . $thread['id']);
}
