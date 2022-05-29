<?php
include_once '../functions.php';

$id = $_GET['id'] ?? '';


if ($id == '') {
    redirectTo('Image Not Found', '/views/gallery/index.php');
}

delete('gallery', 'id', $id);
redirectTo('Image Deleted', '/views/gallery/index.php');
?>