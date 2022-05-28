<?php
    include_once '../functions.php';
    // var_dump($_POST);
    $conn = connectMySQL();
    $image = $_POST['image'];
    $path = $_POST['path'];
    $room_id = $_POST['room_id'];
    $user_id = $_POST['user_id'];
    $title = $_POST['title'];
    $body = $_POST['text_body'];


    $sqlCheckDuplicate = "SELECT * FROM gallery WHERE image=?";
    $stmt = $conn->prepare($sqlCheckDuplicate);
    $stmt->execute([$image]);
    $img = $stmt->fetch();

    if($img){
        redirectTo('Found same image on database! Try to upload the new one', '/views/gallery/index.php');
    }else{
        insert('gallery', [
            'image' => $image,
            'path' => $path,
            'room_id' => $room_id,
            'user_id' => $user_id,
            'title' => $title,
            'body' => $body,
        ]);
        redirectTo('New Image Added!', '/views/gallery/index.php');
    }

?>