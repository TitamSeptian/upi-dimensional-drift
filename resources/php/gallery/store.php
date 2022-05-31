<?php
    session_start();
    include_once '../functions.php';
    // var_dump($_POST);
    $conn = connectMySQL();
    if (isset($_POST['submit'])){

        $fileNameImg = $_FILES['image']['name'];
        $tempFileName = $_FILES['image']['tmp_name'];
        $newFileName = uniqid() . mt_rand(100000, 999999) . $fileNameImg;
        $uploaderId = $_SESSION['user_id'];
        $title = $_POST['title'];
        $body = $_POST['text_body'];

        $dirUpload = '../../../public/images/gallery/'.$newFileName;
        $uploaded = move_uploaded_file($tempFileName, $dirUpload );
        // $uploaded = move_uploaded_file($tempFileName, $dirUpload );
        if($uploaded){
            $roomId = getLastInsertId('rooms');
            insert('gallery', [
                'image' => $newFileName,
                'user_id' => $uploaderId,
                'title' => $title,
                'body' => $body,
                'path' => $dirUpload,
                'room_id' => $roomId,
            ]);
            redirectTo('Image uploaded', '/views/gallery/index.php');
        }else{
            echo 'Failed';
        }
    }else{
        redirectTo('Failed to upload image', '/views/gallery/index.php');
    }

?>