<?php
session_start();
include_once '../functions.php';

$id = $_GET['id'] ?? '';


if ($id == '') {
    redirectTo('Image Not Found', '/views/gallery/index.php');
}
$gallery = query("SELECT * FROM gallery WHERE id = $id")[0];

// trigger delete
$user_id = $_SESSION['user_id'];
$activity = "User Menghapus Foto";
$activity_date = date('Y-m-d H:i:s');

insert('user_log',[
    'user_id' => $user_id,
    'activity_text' => $activity,
    'created_at' => $activity_date,
]);

unlink('../../../public/images/gallery/' . $gallery['image']);
delete('gallery', 'id', $id);
redirectTo('Image Deleted', '/views/gallery/index.php');
?>