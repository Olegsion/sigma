<?
session_start();
require_once '../db_connect.php';

$sql = 'UPDATE themes SET name=?, value=? WHERE value=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_POST['name'], $_POST['value'], $_REQUEST['theme']]);

header('Location: ../../../themes.php');