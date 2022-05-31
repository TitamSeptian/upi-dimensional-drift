<?php
session_start();
include '../connections.php';
// include 'functions.php';

$conn = connectMySQL();
$email = $_POST['email'];
$password = $_POST['password'];
$remember = $_POST['remember-me'] ?? '';

$row = $conn->prepare("select * from users where email = ? and password = ?");
$row->execute(array($email, $password));
$count = $row->rowCount();
$hasil = $row->fetch();

if ($count > 0) {
    $_SESSION['user_id'] = $hasil['id'];
    $_SESSION['Session_email'] = $hasil['email'];
    $_SESSION['Session_firstName'] = $hasil['first_name'];
    $_SESSION['Session_lastName'] = $hasil['last_name'];
    $_SESSION['Session_status'] = "Active";
    if ($remember == '1') {
        $day = 30;
        $token = bin2hex(random_bytes(64));
        $expired_seconds = time() + 60 * 60 * 24 * $day;
        $expiry = date('Y-m-d H:i:s', $expired_seconds);
        $sql = 'INSERT INTO user_token(`user_id`, `exp`, `token`) VALUES (:user_id, :exp, :token)';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user_id', $hasil['id']);
        $stmt->bindParam(':exp', $expiry);
        $stmt->bindParam(':token', $token);
        $stmt->execute();
        setcookie('remember_token', $token, $expired_seconds, '/');
    }
    header("location:../../../views/dashboard/dashboard.php");
} else {
    $_SESSION['Session_flash'] = "Login field, please check your email and password";

    header("location:../../../views/login.php?status=Login Gagal");
}
