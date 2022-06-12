<?php
session_start();
include_once '../functions.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'] ?? '';
    if ($id == '') {
        redirectTo('Galery Id is invalid', '/views/gallery/index.php');
    }
    $data = [];
    $gallery = query("SELECT * FROM gallery WHERE id = $id")[0];
    $data = [
        'title' => $_POST['title'] ?? '',
        'body' => $_POST['body'] ?? '',
        'user_id' => $_SESSION['user_id'],
        'room_id' => $_POST['room'] ?? null,
    ];
    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
        unlink('../../../public/gallery/' . $gallery['image']);
        $fileName = $_FILES['image']['name'];
        $newFileName = uniqid() . mt_rand(100000, 999999) . $fileName;
        $imageLocaltion = '../../../public/gallery/' . $newFileName;
        $data['image'] = $newFileName;
        $data['path'] = base_url() . '/public/gallery/' . $newFileName;
        move_uploaded_file($_FILES['image']['tmp_name'], $imageLocaltion);
    }
    // echo $_SESSION['user_id'];
    $fileNameImg = $_FILES['image']['name'];
    $tempFileName = $_FILES['image']['tmp_name'];
    $newFileName = uniqid() . mt_rand(100000, 999999) . $fileNameImg;


    $dirUpload = '../../../public/gallery/' . $newFileName;
    $uploaded = move_uploaded_file($tempFileName, $dirUpload);
    $roomId = getLastInsertId('rooms');


    update('gallery', $data, 'id', $id);

    redirectTo('Image Data Updated', '/views/gallery/index.php');
} else {
    redirectTo('Image Data Not Updated', '/views/gallery/index.php');
}
