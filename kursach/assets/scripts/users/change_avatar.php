<?
session_start();
require_once '../db.php';

$sql = 'SELECT * FROM users WHERE id = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['id']]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

unlink('../../../' . $user['avatar']);

$target_dir = "../../../uploads/users_images/";
$fileName = time() . "_" . basename($_FILES["image"]["name"]);
$target_file = $target_dir . $fileName;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

$fileName = 'uploads/users_images/' . $fileName;

$sql = 'UPDATE `users` SET `avatar`=? WHERE `id`=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$fileName, $_REQUEST['id']]);

var_dump($_FILES['image']);

header('Location: ../../../user_page.php?user=' . $user['login']);