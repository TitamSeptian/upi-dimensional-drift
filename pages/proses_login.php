<?php
session_start();
include '../resources/php/connections.php';

$conn = connectMySQL();
$email = $_POST['email'];
$password = $_POST['password'];

$row = $conn->prepare("select * from users where email = ? and password = ?");
$row->execute(array($email,$password));
$count = $row->rowCount();
$hasil = $row->fetch();

if ($count > 0) {
    $_SESSION['Session_email'] = $hasil['email'];
    $_SESSION['Session_firstName'] = $hasil['first_name'];
    $_SESSION['Session_lastName'] = $hasil['last_name'];
    $_SESSION['Session_status'] = "Active";
    header("location:index.php");
}else{
    header("location:login.php?status=Login Gagal");
}
?>