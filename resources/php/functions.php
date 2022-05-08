<?php

function PDOConnection(){
        $dsn = 'mysql:host=localhost;dbname=upi_dimensional_drift';
        $username = 'root';
        $password = '';

        try{
            $db = new PDO($dsn, $username, $password);
            // echo "Connected successfulle";
        }catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
            exit();
    }
}


function registerAcc(){
    PDOConnection();
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "upi_dimensional_drift";

    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

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
    }else{

        // cek password confirm
        if ($password !== $password2) {
            echo "<script>
                    alert('Password Confirmation not match!');
                </script>";
            return false;
        }else{
            $conn->exec($sql);
            echo "<script>
                alert('Registration Successful!');
            </script>";
        }
    }
}

?>