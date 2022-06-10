<?php
session_start();
include "../functions.php";

// include 'functions.php';

$conn = connectMySQL();
$email = $_POST['email'];
$password = $_POST['password'];
$remember = $_POST['remember-me'] ?? '';

$user = userAttempt($email, $password);
if ($user) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['Session_email'] = $user['email'];
    $_SESSION['Session_firstName'] = $user['first_name'];
    $_SESSION['Session_lastName'] = $user['last_name'];
    $_SESSION['Session_status'] = "Active";
    $_SESSION['level'] = $user['level'];
    if ($remember == '1') {
        $day = 30;
        $token = bin2hex(random_bytes(64));
        $expired_seconds = time() + 60 * 60 * 24 * $day;
        $expiry = date('Y-m-d H:i:s', $expired_seconds);
        $sql = 'INSERT INTO user_token(`user_id`, `exp`, `token`) VALUES (:user_id, :exp, :token)';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user_id', $user['id']);
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
