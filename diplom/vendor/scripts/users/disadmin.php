<?
session_start();
require_once '../db_connect.php';

$sql = 'UPDATE users SET role="user" WHERE login=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['user']]);

header('Location: ../../../users.php');
