<?
session_start();
require_once '../db_connect.php';

$sql = 'DELETE FROM posts WHERE id=? OR thread_id=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['id'], $_REQUEST['id']]);

header('Location: ../../../' .   $_REQUEST['from']);
