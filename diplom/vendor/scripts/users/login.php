<?
session_start();
require_once '../db_connect.php';

$sql = 'SELECT * FROM users WHERE login=? AND password=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_POST['login'], $_POST['password']]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    $_SESSION['user']['login'] = $user['login'];
    $_SESSION['user']['role'] = $user['role'];
    $_SESSION['user']['avatar'] = $user['avatar'];
    header('Location: ../../../');
} else {
    $_SESSION['error'] = 'Логин или пароль введены неверно';
    header('Location: ../../../login.php');
}
