<?
session_start();
require_once '../db_connect.php';

$sql = 'SELECT * FROM users WHERE login=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['user']]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = 'UPDATE posts SET ban=1 WHERE author=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$user['login']]);

if ($_SESSION['user']['login'] == $user['login']) {
  session_destroy();
  header('Location: ../../../');
}

$sql = 'UPDATE users SET ban=1, role="user" WHERE login=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['user']]);

header('Location: ../../../' . $_REQUEST['from']);
