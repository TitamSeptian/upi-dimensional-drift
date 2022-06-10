<?php
include_once '../functions.php';

$conn = connectMySQL();
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$level = $_POST['level'];
$password = $_POST['password'];
$password2 = $_POST['confirmPassword'];

// cek user exist or not
$sqlCheckDuplicate = "SELECT * FROM users WHERE email=?";
$stmt = $conn->prepare($sqlCheckDuplicate);
$stmt->execute([$email]);
$user = $stmt->fetch();

if ($user) {
    // user found
    redirectTo('Found same user on database! Try to upload the new one', '/views/user/index.php');
} else {

    // cek password confirm
    if ($password !== $password2) {
        redirectTo('Password Confirmation not match!', '/views/user/index.php');
    } else {
        $password = passwordHash($password);
        $insertUser = insert("users", [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'level' => $level,
            'password' => $password,
        ]);
        redirectTo('User created', '/views/user/index.php');
    }
}
