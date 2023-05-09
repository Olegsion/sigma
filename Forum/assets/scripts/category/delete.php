<?php
session_start();
require_once '../db.php';

$sql = 'DELETE FROM category WHERE id = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['id']]);

$_SESSION['message'] = "Категория удалена";

header('Location: ../../../category.php');