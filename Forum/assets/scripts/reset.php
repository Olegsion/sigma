<?php
session_start();
require_once 'db.php';

$sql = 'UPDATE users SET password=? WHERE hash=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([sha1($_POST['password']), $_REQUEST['hash']]);

$_SESSION['message'] = "Пароль был успешно изменён!";

$sql = 'UPDATE users SET hash="" WHERE hash=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['hash']]);

header('Location: ../../authorization.php');