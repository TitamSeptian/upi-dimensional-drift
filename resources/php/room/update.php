<?php
include_once '../functions.php';

$id = $_POST['id'] ?? '';
if ($id == '') {
    redirectTo('Room Not Found', '/views/room/index.php');
}
$room = query("SELECT * FROM rooms WHERE id = $id")[0];
$dataFacility = [];
$data = [
    'title' => $_POST['title'] ?? '',
    'slug' => slugify($_POST['title'] ?? ''),
    'descriptions' => $_POST['descriptions'] ?? '',
    'body' => $_POST['body'] ?? '',
];
// if change a thumbnail

if (is_uploaded_file($_FILES['thumbnail']['tmp_name'])) {
    unlink('../../../public/360thumbnail/' . $room['thumbnail']);
    $fileNameThumbnail = $_FILES['thumbnail']['name'];
    $newFileNameThumbnail = uniqid() . mt_rand(100000, 999999) . $fileNameThumbnail;
    $thumbnailLocaltion = '../../../public/360thumbnail/' . $newFileNameThumbnail;
    $data['thumbnail'] = $newFileNameThumbnail;
    move_uploaded_file($_FILES['thumbnail']['tmp_name'], $thumbnailLocaltion);
}
// if change a panorama
if (is_uploaded_file($_FILES['panorama']['tmp_name'])) {
    unlink('../../../public/360images/' . $room['panorama_image']);
    $fileNamePanorama = $_FILES['panorama']['name'];
    $newFileNamePanorama = uniqid() . mt_rand(100000, 999999) . $fileNamePanorama;
    $panoramaLocaltion = '../../../public/360images/' . $newFileNamePanorama;
    $data['panorama_image'] = $newFileNamePanorama;
    move_uploaded_file($_FILES['panorama']['tmp_name'], $panoramaLocaltion);
}

if (isset($_POST['facilities'])) {
    delete('room_details', 'room_id', $id);
    foreach ($_POST['facilities'] as $facility) {
        insert('room_details', [
            'room_id' => $id,
            'facility_id' => $facility
        ]);
    }
}

$result = update('rooms', $data, 'id', $id);
if ($result) {
    redirectTo('Room Updated', '/views/room/index.php');
}
