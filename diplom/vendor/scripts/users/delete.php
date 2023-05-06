<?
session_start();
require_once '../db_connect.php';

$sql = 'SELECT * FROM users WHERE login=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['user']]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

unlink('../../../' . $user['avatar']);

if ($_SESSION['user']['login'] == $user['login']) {
  session_destroy();
  header('Location: ../../../');
}

$sql = 'DELETE FROM users WHERE login=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['user']]);

header('Location: ../../../' . $_REQUEST['from']);
