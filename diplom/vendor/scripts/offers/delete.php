<?
session_start();
require_once '../db_connect.php';

$sql = 'DELETE FROM offers WHERE id=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['id']]);

header('Location: ../../../offers.php');
