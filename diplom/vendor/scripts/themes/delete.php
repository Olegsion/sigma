<?
session_start();
require_once '../db_connect.php';

$sql = 'DELETE FROM themes WHERE value=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['theme']]);

header('Location: ../../../themes.php');
