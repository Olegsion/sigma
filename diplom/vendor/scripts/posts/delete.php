<?
session_start();
require_once '../db_connect.php';

$sql = 'SELECT * FROM posts WHERE id=? OR thread_id=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['id'], $_REQUEST['id']]);

$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

for ($i = 0; $i < count($posts); $i++) {
  unlink('../../../' . $posts[$i]['pic']);
}

$sql = 'DELETE FROM posts WHERE id=? OR thread_id=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['id'], $_REQUEST['id']]);

if ($_REQUEST['page']) {
  header('Location: ../../../' .   $_REQUEST['from'] . '&page=' . $_REQUEST['page']);
} else {
  header('Location: ../../../' .   $_REQUEST['from']);
}

var_dump($_REQUEST);