<?php
session_start();
require_once '../db.php';

$sql = 'UPDATE posts SET `status`=1 WHERE id = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['id']]);

$_SESSION['message'] = "Пост опубликован";

header('Location: ../../../proposed.php');
