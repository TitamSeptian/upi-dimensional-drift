<!-- content here -->
<?php include_once '../template/header.php'; ?>

<?php
    // $results =  query("SELECT gallery.*, CONCAT(users.first_name,' ',   users.last_name) AS name 
    // FROM gallery
    // INNER JOIN users
    // ON gallery.user_id = users.id");

    $results = query("SELECT * FROM gallery");

    // $results2 =  query("SELECT gallery.*, CONCAT(users.first_name,' ',   users.last_name) AS name, users.id AS id_user 
    // FROM gallery
    // LEFT JOIN users
    // ON gallery.user_id = users.id");

    $results2 = query("SELECT * FROM users");
?>

<script>
    function toggleModal() {
        $('#formGallery').toggle();
        $('#overlay').toggle();
    }

    
</script>
<h1 class="text-xl font-bold">Welcome to Gallery !!</h1>

<button onclick="toggleModal()" class="bg-blue-600  text-white p-4 rounded-lg mt-5">+ Add Image</button>

<div id="overlay" class="fixed w-full h-full top-0 left-0 right-0 bottom-0 backdrop-sepia-0 bg-black/70 z-50 hidden"></div>


<form id="formGallery" action="<?= base_url()?>/resources/php/gallery/store.php" method="POST" enctype="multipart/form-data" class="mt-5  rounded-2xl absolute left-0 right-0 ml-auto mr-auto  w-4/5 md:w-3/4 bg-white hidden top-0 drop-shadow-2xl z-50 ">
    <div id="formHeader" class="flex items-center justify-between py-5 px-5 bg-blue-500 rounded-t-2xl">
        <h3 class="font-bold  text-white">Add New Image</h3>
        <span class="hover:cursor-pointer" onclick="toggleModal()">x</span>
    </div>
    <div id="formContainer" class="p-5 ">
        
        <!-- <div class="form-control">
            <label class="label" for="name">Path</label>
            <input class="input" type="text" name="path" id="name" required>
            <span class="text-red-500 text-xs">* nama harus di isi</span>
        </div> -->
        <!-- <div class="form-control">
            <label class="label" for="name">Room ID</label>
            <input class="input" type="text" name="room_id" id="name" required>
             <span class="text-red-500 text-xs">* nama harus di isi</span>
        </div> -->
        <!-- <div class="form-control">
            <label class="label" for="name">User ID</label>
            <select name="user_id" class="input" id="">
                <option class="" selected>Choose...</option>
                <?php
                    foreach($results2 as $result){
                        $id = $result['id'];
                        $name = $result['first_name'];
                        echo "<option value='".$id."'>".$id." "."--"." $name"."</option>";
                    }
                ?>
            </select>
            <input class="input" type="text" name="user_id" id="name" required>
        </div> -->
        <div class="form-control">
            <label class="label" for="name">Title</label>
            <input class="input" type="text" name="title" id="name" required>
            <!-- <span class="text-red-500 text-xs">* nama harus di isi</span> -->
        </div>
        <div class="form-control">
            <label class="label" for="name">Body</label>
            <!-- <input class="input" type="text" name="name" id="name" height="100px" required> -->
            <textarea id="" cols="0" rows="0" class="rounded input" name="text_body"></textarea>
            <!-- <span class="text-red-500 text-xs">* nama harus di isi</span> -->
        </div>
        <div class="form-control">
            <label class="label" for="files">Image</label>
            <input type="file" id="files" accept="image/png, image/jpeg"  class="input border p-2 border-slate-500 " name="image" >
        </div>
        <button class="btn btn-sm mt-5" name="submit" type="submit">Submit</button>
    </div>
</form>
<div class="overflow-x-auto table-wrapper">
    <div class="inline-block py-2 min-w-full">
        <div class="overflow-hidden rounded-lg">
            <table class="min-w-full">
                <thead class="thead">
                    <tr>
                        <th scope="col" class="th">ID</th>
                        <th scope="col" class="th">Thumbnail</th>
                        <th scope="col" class="th">Path</th>
                        <th scope="col" class="th">Room ID</th>
                        <th scope="col" class="th">User ID</th>
                        <th scope="col" class="th">Title</th>
                        <th scope="col" class="th">Body</th>
                        <th scope="col" class="th text-center ">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($results as $result):
                            $id = $result['id'];
                            $user_id = $result['user_id'];
                            $room_id = $result['room_id'];
                            $image = $result['image'];
                            $path = $result['path'];
                            $title = $result['title'];
                            $body = $result['body'];
                            ?>
                    <tr class="bg-white border-b">
                        <td class="td"><?=$id?></td>
                        <td class="td max-w-sm truncate">
                            <img src="<?=base_url()?>/../../../../public/images/gallery/<?= $image?>" alt="" 
                                class="w-24 rounded-lg" alt=<?= $image?>>
                        </td>
                        <td class="td font-medium text-gray-900">
                            <a class="text-blue-500" target="_blank" href="<?=$path?>">Link to path</a>
                        </td>
                        <td class="td"><?= $room_id?></td>
                        <td class="td"><?= $user_id ?></td>
                        <td class="td"><?= $title ?></td>
                        <td class="td capitalize max-w-sm truncate ">
                            <?= $body?>
                        </td>
                        <td class="td flex space-x-2">
                            <a href="<?=base_url()?>/views/gallery/update.php?id=<?=$id?>" name="editImg" class="btn btn-sm hover:bg-blue-900 ">Edit</a>
                            <a name="deleteImg" href="<?=base_url()?>/resources/php/gallery/delete.php?id=<?=$id?>" class="btn btn-sm btn-outline hover:bg-red-500 hover:text-white text-red-500 border-red-500" onClick="return confirm('Are You Sure Want to Delete this Image?')">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include_once '../template/footer.php'; ?>