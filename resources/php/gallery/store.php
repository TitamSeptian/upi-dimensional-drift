<?php
session_start();
include_once '../functions.php';
// var_dump($_POST);
if (isset($_POST['submit'])) {

    $fileNameImg = $_FILES['image']['name'];
    $tempFileName = $_FILES['image']['tmp_name'];
    $newFileName = uniqid() . mt_rand(100000, 999999) . $fileNameImg;
    $uploaderId = $_SESSION['user_id'];
    $title = $_POST['title'];
    $body = $_POST['text_body'];
    $room = $_POST['room'] ?? null;

    $dirUpload = '../../../public/gallery/' . $newFileName;
    $path = base_url() . '/public/gallery/' . $newFileName;
    $uploaded = move_uploaded_file($tempFileName, $dirUpload);
    // $uploaded = move_uploaded_file($tempFileName, $dirUpload );
    if ($uploaded) {
        insert('gallery', [
            'image' => $newFileName,
            'user_id' => $uploaderId,
            'title' => $title,
            'body' => $body,
            'path' => $path,
            'room_id' => $room,
        ]);
        redirectTo('Image uploaded', '/views/gallery/index.php');
    } else {
        redirectTo('Image not uploaded', '/views/gallery/index.php');
    }
} else {
    redirectTo('Failed to upload image', '/views/gallery/index.php');
}
