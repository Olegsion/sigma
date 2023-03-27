<?php
session_start();
require_once '../db.php';

$sql = 'SELECT * FROM users WHERE id = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['id']]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

unlink('../../../' . $user['avatar']);

if ($_SESSION['user']['login'] == $user['login']) {
  session_destroy();
  header('Location: ../../../');
}

$sql = 'DELETE FROM users WHERE id = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['id']]);

$_SESSION['message'] = "Пользователь удалён";

header('Location: ../../../users.php');
