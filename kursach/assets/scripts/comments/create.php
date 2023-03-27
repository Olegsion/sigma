<?php
session_start();
require_once '../db.php';

$sql = 'INSERT INTO comments (`author`, `post`, `body`) VALUES(?,?,?)';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_SESSION['user']['login'], $_REQUEST['id'], addslashes($_POST['body'])]);

header('Location: ../../../post.php?id='.$_REQUEST['id'].'');