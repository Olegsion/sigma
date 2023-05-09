<?
session_start();
require_once '../db_connect.php';

$sql = 'INSERT INTO boards(name, value, description, theme) VALUES(?,?,?,?)';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_POST['name'], $_POST['value'], $_POST['desc'], $_POST['theme']]);

header('Location: ../../../themes.php');
