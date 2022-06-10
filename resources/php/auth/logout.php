<?php
include_once '../functions.php';
session_start();
session_destroy();
if (isset($_COOKIE['remember_token'])) {
    setcookie('remember_token', '', time() - 3600, '/');
}

header("location:../../../views/");
