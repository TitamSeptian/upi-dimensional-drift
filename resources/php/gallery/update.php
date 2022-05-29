<?php
    
    include_once '../functions.php';

    // var_dump($_POST);
    $id = $_POST['id'] ;
    $image = $_POST['image'];
    $path = $_POST['path'];
    $room_id = $_POST['room_id'];
    $user_id = $_POST['user_id'];
    $title = $_POST['title'];
    $body = $_POST['text_body'];

    // echo $id;
    // echo $image;
    update('gallery',[
        'image' => $image,
        'path' => $path,
        'room_id' => $room_id,
        'user_id' => $user_id,
        'title' => $title,
        'body' => $body,
    ], 'id', $id);

    redirectTo('Image Data Updated', '/views/gallery/index.php');

?>