<?
session_start();
require_once '../db_connect.php';

$sql = 'INSERT INTO themes(name, value) VALUES(?,?)';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_POST['name'], $_POST['value']]);

header('Location: ../../../themes.php');
