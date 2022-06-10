<!-- content here -->
<?php include_once '../template/header.php'; ?>
<script>
    let id = 'gallery';
    $("#" + id).addClass("bg-gray-100")
    $(`#${id} i`).removeClass("text-gray-400")
    $(`#${id} i`).addClass("text-color3")
    $(`#${id} span`).removeClass("text-gray-400")
    $(`#${id} span`).addClass("text-color3")
</script>
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
<h1 class="text-gray-800 text-2xl font-black capitalize after:content-[''] after:block after:w-10 after:h-1 after:bg-gray-800 after:rounded-full mb-4">Welcome to Gallery !!</h1>

<button onclick="toggleModal()" class="btn btn-sm">+ Add Image</button>


<div id="overlay" class="fixed top-0 bottom-0 left-0 right-0 z-50 hidden w-full h-full backdrop-sepia-0 bg-black/70"></div>


<form id="formGallery" action="<?= base_url() ?>/resources/php/gallery/store.php" method="POST" enctype="multipart/form-data" class="absolute top-0 left-0 right-0 z-50 hidden w-4/5 mt-5 ml-auto mr-auto bg-white rounded-2xl md:w-3/4 drop-shadow-2xl ">
    <div id="formHeader" class="flex items-center justify-between px-5 py-5 bg-blue-500 rounded-t-2xl">
        <h3 class="font-bold text-white">Add New Image</h3>
        <span class="hover:cursor-pointer" onclick="toggleModal()">x</span>
    </div>
    <div id="formContainer" class="p-5 ">

        <!-- <div class="form-control">
            <label class="label" for="name">Path</label>
            <input class="input" type="text" name="path" id="name" required>
            <span class="text-xs text-red-500">* nama harus di isi</span>
        </div> -->
        <!-- <div class="form-control">
            <label class="label" for="name">Room ID</label>
            <input class="input" type="text" name="room_id" id="name" required>
             <span class="text-xs text-red-500">* nama harus di isi</span>
        </div> -->
        <!-- <div class="form-control">
            <label class="label" for="name">User ID</label>
            <select name="user_id" class="input" id="">
                <option class="" selected>Choose...</option>
                <?php
                foreach ($results2 as $result) {
                    $id = $result['id'];
                    $name = $result['first_name'];
                    echo "<option value='" . $id . "'>" . $id . " " . "--" . " $name" . "</option>";
                }
                ?>
            </select>
            <input class="input" type="text" name="user_id" id="name" required>
        </div> -->
        <div class="form-control">
            <label class="label" for="name">Title</label>
            <input class="input" type="text" name="title" id="name" required>
            <!-- <span class="text-xs text-red-500">* nama harus di isi</span> -->
        </div>
        <div class="form-control">
            <label class="label" for="name">Body</label>
            <!-- <input class="input" type="text" name="name" id="name" height="100px" required> -->
            <textarea id="" cols="0" rows="0" class="rounded input" name="text_body"></textarea>
            <!-- <span class="text-xs text-red-500">* nama harus di isi</span> -->
        </div>
        <div class="form-control">
            <label class="label" for="files">Image</label>
            <input type="file" id="files" accept="image/png, image/jpeg" class="p-2 border input border-slate-500 " name="image">
        </div>
        <button class="mt-5 btn btn-sm" name="submit" type="submit">Submit</button>
    </div>
</form>
<div class="overflow-x-auto table-wrapper">
    <div class="inline-block min-w-full py-2">
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
                        <th scope="col" class="text-center th ">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($results as $result) :
                        $id = $result['id'];
                        $user_id = $result['user_id'];
                        $room_id = $result['room_id'];
                        $image = $result['image'];
                        $path = $result['path'];
                        $title = $result['title'];
                        $body = $result['body'];
                    ?>
                        <tr class="bg-white border-b">
                            <td class="td"><?= $id ?></td>
                            <td class="max-w-sm truncate td">
                                <img src="<?= base_url() ?>/../../../../public/images/gallery/<?= $image ?>" alt="" class="w-24 rounded-lg" alt=<?= $image ?>>
                            </td>
                            <td class="font-medium text-gray-900 td">
                                <a class="text-blue-500" target="_blank" href="<?= $path ?>">Link to path</a>
                            </td>
                            <td class="td"><?= $room_id ?></td>
                            <td class="td"><?= $user_id ?></td>
                            <td class="td"><?= $title ?></td>
                            <td class="max-w-sm capitalize truncate td ">
                                <?= $body ?>
                            </td>
                            <td class="flex space-x-2 td">
                                <a href="<?= base_url() ?>/views/gallery/update.php?id=<?= $id ?>" name="editImg" class="btn btn-sm hover:bg-blue-900 ">Edit</a>
                                <a name="deleteImg" href="<?= base_url() ?>/resources/php/gallery/delete.php?id=<?= $id ?>" class="text-red-500 border-red-500 btn btn-sm btn-outline hover:bg-red-500 hover:text-white" onClick="return confirm('Are You Sure Want to Delete this Image?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include_once '../template/footer.php'; ?>