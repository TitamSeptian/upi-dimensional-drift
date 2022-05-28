<?php
include_once '../functions.php';
if (isset($_POST['submit'])) {
    $slug = slugify($_POST['title'] ?? '');
    $description = $_POST['descriptions'] ?? '';
    $body = $_POST['body'] ?? '';
    $facilities = $_POST['facilities'] ?? [];
    $fileNameThumbnail = $_FILES['thumbnail']['name'];
    $fileNamePanorama = $_FILES['panorama']['name'];
    $newFileNameThumbnail = uniqid() . mt_rand(100000, 999999) . $fileNameThumbnail;
    $newFileNamePanorama = uniqid() . mt_rand(100000, 999999) . $fileNamePanorama;
    $thumbnailLocaltion = '../../../public/360thumbnail/' . $newFileNameThumbnail;
    $panoramaLocaltion = '../../../public/360images/' . $newFileNamePanorama;
    $result = insert('rooms', [
        'title' => $_POST['title'],
        'slug' => $slug,
        'descriptions' => $description,
        'body' => $body,
        'thumbnail' => $newFileNameThumbnail,
        'panorama_image' => $newFileNamePanorama,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
        'user_id' => 1
    ]);
    move_uploaded_file($_FILES['thumbnail']['tmp_name'], $thumbnailLocaltion);
    move_uploaded_file($_FILES['panorama']['tmp_name'], $panoramaLocaltion);
    if ($result) {
        $roomId = getLastInsertId('rooms');
        foreach ($facilities as $facility) {
            insert('room_details', [
                'room_id' => $roomId,
                'facility_id' => $facility
            ]);
        }
        redirectTo("Room Created", "/views/room/index.php");
    }
}
