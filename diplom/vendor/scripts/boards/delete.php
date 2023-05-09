<?
session_start();
require_once '../db_connect.php';

$sql = 'DELETE FROM boards WHERE value=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['board']]);

header('Location: ../../../themes.php');
