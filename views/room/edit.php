<!-- content here -->
<?php
include_once '../template/header.php';
$id = $_GET['id'] ?? '';
$room = query("SELECT * FROM rooms WHERE id = $id")[0];
if ($id == '' || empty($room)) {
    redirectTo('Room Not Found', '/views/room/index.php');
}
?>
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
<a href="<?= base_url(); ?>/views/room/index.php" class="btn btn-sm mb-4"><i class='bx bx-arrow-back'></i> back</a>
<form action="<?= base_url() ?>/resources/php/room/update.php" enctype="multipart/form-data" method="POST">
    <input type="hidden" name="id" value="<?= $room['id'] ?>">
    <div class="form-control">
        <label class="label" for="title">Title</label>
        <input class="input" type="text" name="title" id="title" required value="<?= $room['title'] ?>">
    </div>
    <div class="form-control">
        <label class="label" for="descriptions">Descriptions</label>
        <input class="input" type="text" name="descriptions" id="descriptions" required value="<?= $room['descriptions'] ?>">
    </div>
    <div class="form-control">
        <label class="label" for="body">Body</label>
        <textarea class="textarea" name="body" id="body" rows="15" required><?= $room['body'] ?></textarea>
    </div>
    <div class="flex flex-wrap gap-4 mt-4">
        <?php
        $facilities = query("SELECT * FROM facilities");
        $faciliyRoom = query("call getFacilitiesByRoomId($id)");
        foreach ($facilities as $key => $facility) {
            $checked = '';
            foreach ($faciliyRoom as $key => $facilityRoom) {
                if ($facility['id'] == $facilityRoom['facility_id']) {
                    $checked = 'checked';
                }
            }
        ?>
            <!-- <div class="w-1/2">
                <input type="checkbox" name="facilities[]" value="<?= $facility['id'] ?>" <?= $checked ?>>
                <label class="label" for="facilities"><?= $facility['facility'] ?></label>
            </div> -->
            <label for="<?= $facility['id'] ?>" class="bg-gray-100 py-2 px-4 rounded-lg flex items-center gap-1 cursor-pointer hover:cursor-pointer">
                <input type="checkbox" <?= $checked ?> name="facilities[]" id="<?= $facility['id'] ?>" value="<?= $facility['id'] ?>" class="checkbox cursor-pointer">
                <span class="text-sm"><?= $facility['icon'] . " " . $facility['facility'] ?></span>
            </label>
        <?php } ?>

    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 mt-4 place-items-start gap-4">
        <div class="form-control relative">
            <label class="btn" for="thumbnail">Upload Thumbnail</label>
            <input accept="image/png, image/jpeg" class="sr-only" type="file" name="thumbnail" id="thumbnail" onchange="showPreview(event);">
            <input type="hidden" name="oldThumbnail" value="<?= $room['thumbnail'] ?>">
        </div>
        <div class="form-control relative">
            <label class="btn" for="panorama">Upload Panorama</label>
            <input accept="image/png, image/jpeg" class="sr-only" type="file" name="panorama" id="panorama" onchange="showPanorama(event);">
            <input type="hidden" name="oldPanorama" value="<?= $room['panorama_image'] ?>">
        </div>
        <div class="aspect-[16/9] rounded-xl overflow-hidden w-full bg-gray-100">
            <img class="w-full h-full object-cover hover:scale-110 transition-all duration-300" src="<?= base_url() ?>/public/360thumbnail/<?= $room['thumbnail'] ?>" id="preview-thumbnail">
        </div>
        <div class="aspect-[16/9] rounded-xl overflow-hidden w-full bg-gray-100">
            <section class="relative w-full aspect-[16/9] rounded-xl overflow-hidden">
                <div id="panorama-360-view" class="absolute h-full w-full top-0 left-0 z-[2]"></div>
            </section>
        </div>
    </div>
    <button class="btn btn-sm mt-4" type="submit" name="submit">Edit</button>
</form>
<script src="<?= base_url(); ?>/public/vendor/pannellum/pannellum.js"></script>
<script>
    let p360 = pannellum.viewer("panorama-360-view", {
        type: "equirectangular",
        panorama: '/public/360images/<?= $room['panorama_image'] ?>',
        autoLoad: true,
        compass: false,
        mouseZoom: false,
    });

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
            p360 = pannellum.viewer("panorama-360-view", {
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