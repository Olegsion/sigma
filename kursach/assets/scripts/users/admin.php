<?php
session_start();
require_once '../db.php';

$sql = 'UPDATE users SET role=2 WHERE id = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['id']]);

$_SESSION['message'] = "Пользователь назначен админом";

header('Location: ../../../users.php');