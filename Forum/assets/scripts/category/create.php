<?php
session_start();
require_once '../db.php';

$sql = 'INSERT INTO category (`value`, `name`, `description`) VALUES(?,?,?)';
$stmt = $pdo->prepare($sql);
$stmt->execute([addslashes($_POST['value']), addslashes($_POST['name']), addslashes($_POST['description'])]);

$_SESSION['message'] = "Категория добавлена";

header('Location: ../../../category.php');