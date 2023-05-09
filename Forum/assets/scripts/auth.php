<?php
session_start();
require_once 'db.php';

$sql = 'SELECT * FROM users WHERE login=? AND password=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_POST['login'], sha1($_POST['password'])]);

$user = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($user) {
    $_SESSION['user']['email'] = $user[0]['email'];
    $_SESSION['user']['login'] = $user[0]['login'];
    $_SESSION['user']['role'] = $user[0]['role'];

    header("Location: ../../");
} else {
    $_SESSION['error'] = "Неверный логин или пароль";
    header("Location: ../../authorization.php");
}