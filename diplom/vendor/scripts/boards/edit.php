<?
session_start();
require_once '../db_connect.php';

$sql = 'UPDATE boards SET name=?, value=?, description=? WHERE value=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_POST['name'], $_POST['value'], $_POST['desc'], $_REQUEST['board']]);


header('Location: ../../../themes.php');