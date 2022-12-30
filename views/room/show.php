<!-- content here -->
<?php
include_once '../template/header.php';
$slug = $_GET['panorama'] ?? '';
$slug = xss_encode($slug);
if ($slug == '') {
    header('Location: /views/room/index.php');
}
$room = query("call getRoomBySlug('$slug')")[0];
// dd(isset($room));
if (!isset($room)) {
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
<a href="<?= base_url(); ?>/views/room/index.php" class="mb-4 btn btn-sm"><i class='bx bx-arrow-back'></i> back</a>
<div class="flex items-center justify-between">
    <h1 class="mt-4 text-2xl font-semibold text-gray-800 capitalize"><?= $room['title'] ?></h1>
    <span class="p-2 text-white rounded bg-color2"><i class="bx bx-show"></i> <?= $room['viewed'] ?></span>
</div>
<i class="text-xs italic text-gray-400"><?= $room['descriptions'] ?></i>
<div class="form-control">
    <label for="text" class="label">Body</label>
    <textarea name="text" id="text" rows="6" class="resize-none textarea"><?= $room['body'] ?></textarea>
</div>
<section class="mt-4 overflow-hidden panorama rounded-xl">
    <div id="panorama-360-view" class="picture"></div>
</section>

<div class="grid grid-cols-1 gap-2 mt-2 sm:grid-cols-2 place-items-start">
    <div class="">
        <h1 class="text-xl font-semibold text-gray-800">Thumbnail</h1>
        <div class="aspect-[8/6]  w-full rounded-2xl overflow-hidden">
            <img class="object-cover w-full h-full transition-all duration-300 hover:scale-110" src="<?= base_url() ?>/public/360thumbnail/<?= $room['thumbnail'] ?>" alt="<?= $room['title'] ?>">
        </div>
    </div>
    <div class="">
        <h1 class="text-xl font-semibold text-gray-800">Facility</h1>

        <div class="flex justify-start gap-4 ">
            <?php
            $facilities = query("call getFacilitiesByRoomId({$room['id']})");
            foreach ($facilities as $facility) :
            ?>
                <div class='flex items-center justify-center px-2 py-3 transition-all duration-200 border facility-item gap-x-2 rounded-xl hover:shadow-md'>
                    <span><?= $facility['icon'] ?></span>
                    <p><?= $facility['facility'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<script src="<?= base_url(); ?>/public/vendor/pannellum/pannellum.js"></script>
<script>
    const p360 = pannellum.viewer("panorama-360-view", {
        type: "equirectangular",
        panorama: "/public/360images/<?= $room['panorama_image'] ?>",
        autoLoad: true,
        compass: false,
        mouseZoom: false,
    });
</script>
<?php include_once '../template/footer.php'; ?>