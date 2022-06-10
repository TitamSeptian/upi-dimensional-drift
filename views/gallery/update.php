<!-- content here -->
<?php include_once '../template/header.php'; ?>

<?php
$id = $_GET['id'];
$imageData =  query("SELECT * FROM gallery WHERE id = $id");

foreach ($imageData as $img) {
    $id = $img['id'];
    $image = $img['image'];
    $path = $img['path'];
    $room_id = $img['room_id'];
    $user_id = $img['user_id'];
    $title = $img['title'];
    $body = $img['body'];
}
?>

<form id="formGallery" enctype="multipart/form-data" action="<?= base_url() ?>/resources/php/gallery/update.php" method="POST" class="border rounded-t-2xl">
    <div id="formHeader" class="flex items-center justify-between px-5 py-5 bg-color2 rounded-t-2xl">
        <h3 class="font-bold text-white">Edit Image Data</h3>
    </div>
    <div id="formContainer" class="p-5 space-y-3">
        <input type="hidden" name="id" id="id" value="<?= $id ?>">
        <div class="form-control">
            <label class="label" for="name">Title</label>
            <input class="input" type="text" placeholder="title" name="title" id="name" value="<?= $title ?>" required>
        </div>
        <div class="form-control">
            <label class="label" for="name">Body</label>
            <textarea id="" cols="0" rows="0" class="rounded input" name="text_body"><?= $body ?></textarea>
        </div>
        <div class="relative form-control">
            <label class="btn" for="image">Upload Image</label>
            <input type="file" id="image" accept="image/png, image/jpeg" class="sr-only" name="image" onchange="showPreview(event);">
        </div>
        <div class="aspect-[16/9] rounded-xl overflow-hidden w-full bg-gray-100 max-h-[70%]">
            <img class="object-cover w-full h-full transition-all duration-300 hover:scale-110" src="<?= $path ?>" id="preview-image">
        </div>
        <div class="form-control">
            <label for="room" class="label">Related Room</label>
            <span class="text-sm">if your image related to room</span>
            <select name="room" id="room" class="input">
                <option selected disabled>-- Room --</option>
                <?php foreach (query("SELECT * FROM rooms") as $row) :
                    $selected = $row['id'] == $room_id ? 'selected' : '';
                ?>
                    <option value="<?= $row['id'] ?>" <?= $selected ?>><?= $row['title'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button class="mt-5 btn btn-sm" name="update" type="submit">Submit</button>
    </div>
</form>
<script>
    let id = 'gallery';
    $("#" + id).addClass("bg-gray-100")
    $(`#${id} i`).removeClass("text-gray-400")
    $(`#${id} i`).addClass("text-color3")
    $(`#${id} span`).removeClass("text-gray-400")
    $(`#${id} span`).addClass("text-color3")

    function showPreview(event) {
        if (event.target.files.length > 0) {
            let src = URL.createObjectURL(event.target.files[0]);
            let preview = document.getElementById("preview-image");
            preview.src = src;
            preview.classList.remove("hidden");
        }
    }
</script>
<?php include_once '../template/footer.php'; ?>