<?php
include_once '../functions.php';

$id = $_GET['id'] ?? '';


if ($id == '') {
    redirectTo('Image Not Found', '/views/gallery/index.php');
}
$gallery = query("SELECT * FROM gallery WHERE id = $id")[0];

unlink('../../../public/gallery/' . $gallery['image']);
delete('gallery', 'id', $id);
redirectTo('Image Deleted', '/views/gallery/index.php');
