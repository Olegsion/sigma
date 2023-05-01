<?
session_start();
require_once '../db_connect.php';


if (isset($_FILES['avatar'])) {
    $target_dir = "../../../uploads/users_images/";
    $fileName = time() . "_" . basename($_FILES["avatar"]["name"]);
    $target_file = $target_dir . $fileName;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);

    $fileName = 'uploads/users_images/' . $fileName;
} else {
    $fileName = "assets/images/user_icon.png";
}

$sql = 'SELECT * FROM users WHERE email=?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_POST['email']]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);


if ($user) {
    $_SESSION['error'] = 'Пользователь с такой почтой уже существует';
    header('Location: ../../../reg.php');
} else {
    $sql = 'SELECT * FROM users WHERE login=?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST['login']]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['error'] = 'Пользователь с таким логином уже существует';
        header('Location: ../../../reg.php');
    } else {

        $sql = 'INSERT INTO users (login, avatar, email, password, hash) VALUES (?,?,?,?,"")';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_POST['login'], $fileName, $_POST['email'], $_POST['password']]);

        $sql = 'SELECT * FROM users WHERE login=? AND password=?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_POST['login'], $_POST['password']]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $_SESSION['user']['login'] = $user['login'];
        $_SESSION['user']['role'] = $user['role'];
        $_SESSION['user']['avatar'] = $user['avatar'];


        header('Location: ../../../');
    }
}
