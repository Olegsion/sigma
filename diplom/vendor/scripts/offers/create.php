<?
session_start();
require_once '../db_connect.php';

if ($_SESSION['user']['login'] != NULL) {
  $user = $_SESSION['user']['login'];
} else {
  $user = 'гость';
}

$sql = 'INSERT INTO offers(user, theme, text) VALUES(?,?,?)';
$stmt = $pdo->prepare($sql);
$stmt->execute([$user, $_POST['theme'], $_POST['text']]);

header('Location: ../../../');
