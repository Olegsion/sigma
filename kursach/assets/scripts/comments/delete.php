<?php
session_start();
require_once '../db.php';

$sql = 'SELECT * FROM comments WHERE id = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['id']]);

$comment = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = 'DELETE FROM comments WHERE id = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_REQUEST['id']]);


header('Location: ../../../post.php?id='.$comment[0]['post'].'');