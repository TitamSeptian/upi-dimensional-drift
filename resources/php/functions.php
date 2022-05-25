<?php
include 'connections.php';

function base_url($option = null)
{
    $uri = urldecode(
        parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
    );
    $base =  sprintf(
        "%s://%s:%s",
        isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
        //SERVER PORT
        $_SERVER['SERVER_NAME'],
        $_SERVER['SERVER_PORT'],
    );
    if ($option == "full") {
        return $base . $uri;
    }
    return $base;
}

function dirFile()
{
    return __DIR__;
}

function registerAcc()
{

    $conn = connectMySQL();

    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['confirmPassword'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];

    $sql = "INSERT INTO users (email, password, first_name, last_name) VALUES ('$email', '$password', '$firstName', '$lastName')";


    //cek if email is exist
    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    if ($user) {
        // email found
        echo "<script>alert('Email already registered! Try new one')</script>";
        return false;
    } else {

        // cek password confirm
        if ($password !== $password2) {
            echo "<script>
                    alert('Password Confirmation not match!');
                </script>";
            return false;
        } else {
            $conn->exec($sql);
            echo "<script>
                alert('Registration Successful!');
            </script>";
        }
    }
}
