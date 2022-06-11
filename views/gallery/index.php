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

$results = query("call getGallery()");

// $results2 =  query("SELECT gallery.*, CONCAT(users.first_name,' ',   users.last_name) AS name, users.id AS id_user 
// FROM gallery
// LEFT JOIN users
// ON gallery.user_id = users.id");

$results2 = query("SELECT * FROM users");
?>

<script>
    let ids = 'gallery';
    $("#" + ids).addClass("bg-gray-100")
    $(`#${ids} i`).removeClass("text-gray-400")
    $(`#${ids} i`).addClass("text-color3")
    $(`#${ids} span`).removeClass("text-gray-400")
    $(`#${ids} span`).addClass("text-color3")

    function toggleModal() {
        $('#formGallery').toggle();
        $('#overlay').toggle();
    }
</script>
<h1 class="text-gray-800 text-2xl font-black capitalize after:content-[''] after:block after:w-10 after:h-1 after:bg-gray-800 after:rounded-full mb-4">Welcome to Gallery !!</h1>

<button onclick="toggleModal()" class="btn btn-sm">+ Add Image</button>


<div id="overlay" class="fixed top-0 bottom-0 left-0 right-0 z-50 hidden w-full h-full backdrop-sepia-0 bg-black/70"></div>


<form id="formGallery" action="<?= base_url() ?>/resources/php/gallery/store.php" method="POST" enctype="multipart/form-data" class="absolute top-0 left-0 right-0 z-50 hidden sm:w-4/5 w-[90%] mt-5 ml-auto mr-auto overflow-hidden bg-white rounded-2xl md:w-3/4 drop-shadow-2xl">
    <div id="formHeader" class="flex items-center justify-between px-5 py-5 bg-color2 rounded-t-2xl">
        <h3 class="font-bold text-white">Add New Image</h3>
        <span class="text-white hover:cursor-pointer" onclick="toggleModal()">x</span>
    </div>
    <div id="formContainer" class="max-h-[80vh] p-5 space-y-3 overflow-y-scroll">
        <div class="form-control">
            <label class="label" for="name">Title</label>
            <input class="input" type="text" placeholder="title" name="title" id="name" required>
        </div>
        <div class="form-control">
            <label class="label" for="name">Body</label>
            <textarea id="" cols="0" rows="0" class="rounded input" name="text_body"></textarea>
        </div>
        <div class="relative form-control">
            <label class="btn" for="image">Upload Image</label>
            <input type="file" id="image" accept="image/png, image/jpeg" class="sr-only" name="image" onchange="showPreview(event);">
        </div>
        <div class="aspect-[16/9] rounded-xl overflow-hidden w-full bg-gray-100 max-h-[70%]">
            <img class="hidden object-cover w-full h-full transition-all duration-300 hover:scale-110" src="" id="preview-image">
        </div>
        <div class="form-control">
            <label for="room" class="label">Related Room</label>
            <span class="text-sm">if your image related to room</span>
            <select name="room" id="room" class="input">
                <option selected disabled>-- Room --</option>
                <?php foreach (query("SELECT * FROM rooms") as $row) : ?>
                    <option value="<?= $row['id'] ?>"><?= $row['title'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button class="mt-5 btn btn-sm" name="submit" type="submit">Submit</button>
    </div>
</form>
<script>
    function showPreview(event) {
        if (event.target.files.length > 0) {
            let src = URL.createObjectURL(event.target.files[0]);
            let preview = document.getElementById("preview-image");
            preview.src = src;
            preview.classList.remove("hidden");
        }
    }
</script>
<div class="overflow-x-auto table-wrapper">
    <div class="inline-block min-w-full py-2">
        <div class="overflow-hidden rounded-lg">
            <table class="min-w-full">
                <thead class="thead">
                    <tr>
                        <th scope="col" class="th">Thumbnail</th>
                        <th scope="col" class="th">Room</th>
                        <th scope="col" class="th">User</th>
                        <th scope="col" class="th">Title</th>
                        <th scope="col" class="text-center th ">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($results as $result) :
                        $id = $result['id'];
                        $user = $result['uploader'];
                        $room = $result['room'];
                        $image = $result['image'];
                        $title = $result['title'];
                        $body = $result['body'];
                    ?>
                        <tr class="bg-white border-b">
                            <td class="max-w-sm truncate td">
                                <img src="<?= base_url() ?>/../../../../public/gallery/<?= $image ?>" alt="" class="w-24 rounded-lg" alt=<?= $image ?>>
                            </td>
                            <td class="td"><?= $room ?></td>
                            <td class="td"><?= $user ?></td>
                            <td class="td"><?= $title ?></td>
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