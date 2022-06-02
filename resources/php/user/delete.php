<?php
include_once '../functions.php';

$id = $_GET['id'] ?? '';

if ($id == '') {
    redirectTo('User Not Found!', '/views/user/index.php');
}

delete('users', 'id', $id);
redirectTo('User Deleted!', '/views/user/index.php');
?>