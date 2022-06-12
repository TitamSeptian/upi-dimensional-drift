<?php
include_once '../functions.php';
session_start();

$id = $_POST['id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$level = $_POST['level'];
$password = $_POST['password'];
$password2 = $_POST['confirmPassword'];

// cek password confirm
if ($password !== $password2) {
    redirectTo('Password Confirmation not match, Update Failed!', '/views/user/index.php');
} else {
    update('users', [
        'first_name' => $first_name,
        'last_name' => $last_name,
        'email' => $email,
        'level' => $level,
        'password' => passwordHash($password),
    ], 'id', $id);
    $_SESSION['Session_status'] = "unactive";

    redirectTo('User Data Updated!', '/views/user/index.php');
}
