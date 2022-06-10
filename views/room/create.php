<!-- content here -->
<?php include_once '../template/header.php'; ?>
<script>
    $("head").prepend(`<link rel="stylesheet" href="/public/vendor/pannellum/pannellum.css" />`)
    $("#rooms").addClass("bg-gray-100")
    $("#rooms i").removeClass("text-gray-400")
    $("#rooms i").addClass("text-color3")
    $("#rooms span").removeClass("text-gray-400")
    $("#rooms span").addClass("text-color3")
</script>
<h1 class="text-gray-800 text-2xl font-black capitalize after:content-[''] after:block after:w-10 after:h-1 after:bg-gray-800 after:rounded-full mb-4">
    Room
</h1>
<a href="<?= base_url(); ?>/views/room/index.php" class="mb-4 btn btn-sm"><i class='bx bx-arrow-back'></i> back</a>
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
            <label for="<?= $facility['id'] ?>" class="flex items-center gap-1 px-4 py-2 bg-gray-100 rounded-lg cursor-pointer hover:cursor-pointer">
                <input type="checkbox" name="facilities[]" id="<?= $facility['id'] ?>" value="<?= $facility['id'] ?>" class="cursor-pointer checkbox">
                <span class="text-sm"><?= $facility['icon'] . " " . $facility['facility'] ?></span>
            </label>
        <?php endforeach; ?>
    </div>
    <div class="grid grid-cols-1 gap-4 mt-4 sm:grid-cols-2 place-items-start">
        <div class="relative form-control">
            <label class="btn" for="thumbnail">Upload Thumbnail</label>
            <input accept="image/png, image/jpeg" class="sr-only" type="file" name="thumbnail" id="thumbnail" onchange="showPreview(event);">
        </div>
        <div class="relative form-control">
            <label class="btn" for="panorama">Upload Panorama</label>
            <input accept="image/png, image/jpeg" class="sr-only" type="file" name="panorama" id="panorama" onchange="showPanorama(event);">
        </div>
        <div class="aspect-[16/9] rounded-xl overflow-hidden w-full bg-gray-100">
            <img class="hidden object-cover w-full h-full transition-all duration-300 hover:scale-110" src="" id="preview-thumbnail">
        </div>
        <div class="aspect-[16/9] rounded-xl overflow-hidden w-full bg-gray-100">
            <section class="relative w-full aspect-[16/9] rounded-xl overflow-hidden">
                <div id="panorama-360-view" class="absolute h-full w-full top-0 left-0 z-[2]"></div>
            </section>
        </div>
    </div>
    <button class="mt-4 btn btn-sm" type="submit" name="submit">Submit</button>
</form>
<script src="<?= base_url(); ?>/public/vendor/pannellum/pannellum.js"></script>
<script>
    function showPreview(event) {
        if (event.target.files.length > 0) {
            let src = URL.createObjectURL(event.target.files[0]);
            let preview = document.getElementById("preview-thumbnail");
            preview.src = src;
            preview.classList.remove("hidden");
        }
    }

    function showPanorama(event) {
        if (event.target.files.length > 0) {
            let src = URL.createObjectURL(event.target.files[0]);
            const p360 = pannellum.viewer("panorama-360-view", {
                type: "equirectangular",
                panorama: src,
                autoLoad: true,
                compass: false,
                mouseZoom: false,
            });

        }
    }
</script>
<?php include_once '../template/footer.php'; ?>