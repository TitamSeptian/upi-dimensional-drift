<?php
include_once '../functions.php';
session_start();

$id = $_GET['id'] ?? '';

if ($id == '') {
    redirectTo('User Not Found!', '/views/user/index.php');
}

delete('users', 'id', $id);
if($_SESSION['user_id'] == $id){
    session_destroy();
}
redirectTo('User Deleted!', '/views/user/index.php');
