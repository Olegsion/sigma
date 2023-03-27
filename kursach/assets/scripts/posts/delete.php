<?php
session_start();
require_once '../db.php';

$sql = 'SELECT * FROM posts WHERE id = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['id']]);

$post = $stmt->fetch(PDO::FETCH_ASSOC);

unlink('../../../uploads/posts_images/' . $post['image']);

$sql = 'DELETE FROM posts WHERE id = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['id']]);

$_SESSION['message'] = "Пост удалён";

header('Location: ../../../'. $_REQUEST['from']);