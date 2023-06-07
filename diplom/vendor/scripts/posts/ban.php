<?
session_start();
require_once '../db_connect.php';

$sql = 'UPDATE posts SET ban=1 WHERE id=? OR thread_id=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['id'], $_REQUEST['id']]);

if ($_REQUEST['page']) {
  header('Location: ../../../' .   $_REQUEST['from'] . '&page=' . $_REQUEST['page']);
} else {
  header('Location: ../../../' .   $_REQUEST['from']);
}
