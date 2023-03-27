<?php
session_start();
require_once '../db.php';

if (isset($_FILES['image'])) {
    $target_dir = "../../../uploads/users_images/";
    $fileName = time() . "_" . basename($_FILES["image"]["name"]);
    $target_file = $target_dir . $fileName;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $fileName = 'uploads/users_images/' . $fileName;
} else {
    $fileName = "assets/images/user_icon.png";
}

var_dump($_FILES);

$sql = 'SELECT * FROM users WHERE email=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_POST['email']]);

$user = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($user) {
    $_SESSION['error'] = 'Пользователь с такой почтой уже существует';
    header("Location: ../../register.php");
} else {
    $sql = 'SELECT * FROM `users` WHERE `login`=?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST['login']]);

    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['error'] = "Пользователь с таким логином уже существует!";
        header("Location: ../../index.php");
    } else {
        $sql = 'INSERT INTO `users` (`email`,`login`,`password`, `avatar`, `hash`) VALUES (?,?,?,?,"")';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_POST['email'], $_POST['login'], sha1($_POST['password']), $fileName]);

        $_SESSION['user']['email'] = $_POST['email'];
        $_SESSION['user']['login'] = $_POST['login'];
        $_SESSION['user']['role'] = '1';

        header('Location: ../../../');
    }
}