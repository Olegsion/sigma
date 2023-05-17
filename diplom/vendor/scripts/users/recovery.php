<?
session_start();
require_once '../db_connect.php';

var_dump($_POST);
var_dump($_REQUEST);

$sql = 'UPDATE users SET password=? WHERE hash=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_POST['password'], $_REQUEST['hash']]);

$_SESSION['message'] = "Пароль был успешно изменён!";

$sql = 'UPDATE users SET hash="" WHERE hash=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['hash']]);

header('Location: ../../../login.php');
