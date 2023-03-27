<?php
session_start();
require_once '../db.php';

$sql = 'UPDATE users SET role=1 WHERE id = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['id']]);

$_SESSION['message'] = "Пользователь лишён админки";

header('Location: ../../../users.php');