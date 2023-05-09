<?
session_start();
require_once '../db.php';

$sql = 'SELECT * FROM `posts` WHERE `id`=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['id']]);

$post = $stmt->fetch(PDO::FETCH_ASSOC);

unlink('../../../uploads/posts_images/' . $post['image']);

$sql = 'UPDATE `posts` SET `image`="" WHERE `id`=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['id']]);

// var_dump($_REQUEST['id']);

header('Location: ../../../post_edit.php?id=' . $_REQUEST['id']);
