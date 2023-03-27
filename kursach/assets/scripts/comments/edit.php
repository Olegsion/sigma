<?
session_start();
require_once '../db.php';

$sql = 'UPDATE comments SET title=?, body=?, status=0 WHERE id=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([addslashes($_POST['title']), addslashes($_POST['body']), $_REQUEST['id']]);

header('Location: ../../../');