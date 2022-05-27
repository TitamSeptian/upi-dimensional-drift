<!-- content here -->
<?php include_once '../template/header.php'; ?>
<script>
    $("#rooms").addClass("bg-gray-100")
    $("#rooms i").removeClass("text-gray-400")
    $("#rooms i").addClass("text-color3")
    $("#rooms span").removeClass("text-gray-400")
    $("#rooms span").addClass("text-color3")
</script>
<h1 class="text-gray-800 text-2xl font-black capitalize after:content-[''] after:block after:w-10 after:h-1 after:bg-gray-800 after:rounded-full mb-4">
    Room
</h1>
<a href="<?= base_url(); ?>/views/room/index.php" class="btn btn-sm mb-4"><i class='bx bx-arrow-back'></i> back</a>
<form action="<?= base_url() ?>/resources/php/room/store.php" enctype="multipart/form-data" method="POST">
    <div class="form-control">
        <label class="label" for="title">Title</label>
        <input class="input" type="text" name="title" id="title" required>
    </div>
    <div class="form-control">
        <label class="label" for="descriptions">Descriptions</label>
        <input class="input" type="text" name="descriptions" id="descriptions" required>
    </div>
    <div class="form-control">
        <label class="label" for="body">Body</label>
        <textarea class="textarea" name="body" id="body" rows="15" required></textarea>
    </div>
    <div class="flex flex-wrap gap-4 mt-4">
        <?php
        $facilities = query("SELECT * FROM facilities");
        foreach ($facilities as $facility) :
        ?>
            <label for="<?= $facility['id'] ?>" class="bg-gray-100 py-2 px-4 rounded-lg flex items-center gap-1 cursor-pointer hover:cursor-pointer">
                <input type="checkbox" name="facilities[]" id="<?= $facility['id'] ?>" value="<?= $facility['id'] ?>" class="checkbox cursor-pointer">
                <span class="text-sm"><?= $facility['icon'] . " " . $facility['facility'] ?></span>
            </label>
        <?php endforeach; ?>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 mt-4">
        <div class="form-control">
            <label class="label" for="thumbnail">Thumbnail</label>
            <input class="input" type="file" name="thumbnail" id="thumbnail" required accept="image/x-png,image/jpg,image/jpeg,image/webp">
        </div>
        <div class="form-control">
            <label class="label" for="panorama">Panorama Image</label>
            <input class="input" type="file" name="panorama" id="panorama" required accept="image/x-png,image/jpg,image/jpeg,image/webp">
        </div>
    </div>
    <button class="btn btn-sm mt-4" type="submit" name="submit">Submit</button>
</form>
<?php include_once '../template/footer.php'; ?>