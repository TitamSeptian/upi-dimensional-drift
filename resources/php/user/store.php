<?php
    include_once '../functions.php';

    $conn = connectMySQL();
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['confirmPassword'];

    $sql = "INSERT INTO users (email, password, first_name, last_name) VALUES ('$email', '$password', '$first_name', '$last_name')";

    // cek user exist or not
    $sqlCheckDuplicate = "SELECT * FROM user WHERE email=?";
    $stmt = $conn->prepare($sqlCheckDuplicate);
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if($user){
        // user found
        redirectTo('Found same user on database! Try to upload the new one', '/views/user/index.php');
    }else{

        // cek password confirm
        if ($password !== $password2) {
            redirectTo('Password Confirmation not match!', '/views/user/index.php');
        } else {
            $conn->exec($sql);
            redirectTo('Registration Successful!', '/views/user/index.php');
        }
    }    
?>