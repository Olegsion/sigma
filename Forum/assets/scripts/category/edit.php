<?
session_start();
require_once '../db.php';

$sql = 'UPDATE category SET value=?, name=?, description=? WHERE id=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([addslashes($_POST['value']), addslashes($_POST['name']), addslashes($_POST['description']), $_REQUEST['id']]);

$_SESSION['message'] = "Категория отредактирована";

header('Location: ../../../category.php');