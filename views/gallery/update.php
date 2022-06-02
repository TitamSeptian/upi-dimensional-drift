<!-- content here -->
<?php include_once '../template/header.php'; ?>

<?php
    $id = $_GET['id'];
    $imageData =  query("SELECT * FROM gallery WHERE id = $id");  
    
    foreach($imageData as $img){
        $id = $img['id'];
        $image = $img['image'];
        $path = $img['path'];
        $room_id = $img['room_id'];
        $user_id = $img['user_id'];
        $title = $img['title'];
        $body = $img['body'];
    }
?>

<form id="formGallery" enctype="multipart/form-data" action="<?= base_url()?>/resources/php/gallery/update.php" method="POST" class=" border rounded-t-2xl">
    <div id="formHeader" class="flex items-center justify-between py-5 px-5 bg-blue-500 rounded-t-2xl">
        <h3 class="font-bold  text-white">Edit Image Data</h3>
    </div>
    <div id="formContainer" class="p-5 ">
        <div class="form-control">
            <label class="label" for="name">ID</label>
            <input class="input bg-slate-300 hover:cursor-not-allowed" type="text" name="id" id="name" value=<?=$id?>  readonly>
            <!-- <span class="text-red-500 text-xs">* nama harus di isi</span> -->
        </div>
     
        <!-- <div class="form-control">
            <label class="label" for="name">Path</label>
            <input class="input" type="text" name="path" id="name" value=<?=$path?> required>
            <span class="text-red-500 text-xs">* nama harus di isi</span>
        </div> -->
        <!-- <div class="form-control">
            <label class="label" for="name">Room ID</label>
            <input class="input" type="text" name="room_id" id="name" required value=<?=$room_id?> >
             <span class="text-red-500 text-xs">* nama harus di isi</span>
        </div> -->
        <!-- <div class="form-control">
            <label class="label" for="name">User ID</label>
            <select name="user_id" id="">
                <option selected>Choose...</option>
                <?php
                    // $users =  query("SELECT * FROM users");
                    // foreach($users as $user){
                    //     $id = $user['id'];
                    //     $name = $user['first_name'];
                    //     echo "<option value='".$id."'>".$id." "."--"." $name"."</option>";
                    // }
                ?>
            </select>
            <input class="input" type="text" name="user_id" id="name" required>
        </div> -->
        <div class="form-control">
            <label class="label" for="name">Title</label>
            <input class="input" type="text" name="title" id="name" required value=<?= $title?>>
            <!-- <span class="text-red-500 text-xs">* nama harus di isi</span> -->
        </div>
        <div class="form-control">
            <label class="label" for="name">Body</label>
            <!-- <input class="input" type="text" name="name" id="name" height="100px" required> -->
            <textarea  id="" cols="0" rows="0" class="rounded input" name="text_body" > <?= $body ?> </textarea>
            <!-- <span class="text-red-500 text-xs">* nama harus di isi</span> -->
        </div>
        <div class="form-control">
            <label class="label" for="image">Image</label>
            <input type="file" accept="image/png, image/jpeg" class="input border p-2 border-slate-500" name="image" value="w.jpg" required>
        </div>
        <button class="btn btn-sm mt-5" name="update" type="submit">Submit</button>
        <a name="deleteImg" href="<?=base_url()?>/views/gallery/index.php" class="btn btn-sm btn-outline hover:bg-sky-700 hover:text-white text-sky-800 border-sky-900">Cancel</a>
    </div>
</form>

<?php include_once '../template/footer.php'; ?>