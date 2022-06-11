<?php
    session_start();
    include_once '../functions.php';

    if(isset($_POST['update'])){
        $id = $_POST['id'] ?? '';
        $gallery = query("SELECT * FROM gallery WHERE id = $id")[0];

        unlink('../../../public/images/gallery/' . $gallery['image']);
                // echo $_SESSION['user_id'];
        $fileNameImg = $_FILES['image']['name'];
        $tempFileName = $_FILES['image']['tmp_name'];
        $newFileName = uniqid() . mt_rand(100000, 999999) . $fileNameImg;
        $id = $_POST['id'] ;
        $title = $_POST['title'];
        $body = $_POST['text_body'];
        $uploaderId = $_SESSION['user_id'];

        
        $dirUpload = '../../../public/images/gallery/'.$newFileName;
        $uploaded = move_uploaded_file($tempFileName, $dirUpload );
        $roomId = getLastInsertId('rooms');
        
    
        update('gallery',[
            'image' => $newFileName,
            'path' => $dirUpload,
            'room_id' => $roomId,
            'user_id' => $uploaderId,
            'title' => $title,
            'body' => $body,
        ], 'id', $id);
        redirectTo('Image Data Updated', '/views/gallery/index.php');
    }else{
        redirectTo('Image Data Not Updated', '/views/gallery/index.php');
    }

?>