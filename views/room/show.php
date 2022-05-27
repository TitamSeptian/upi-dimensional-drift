<!-- content here -->
<?php
include_once '../template/header.php';
$slug = $_GET['panorama'] ?? '';
if ($slug == '') {
    header('Location: /views/room/index.php');
}
$room = query("call getRoomBySlug('$slug')")[0];
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
<div class="flex justify-between items-center">
    <h1 class="text-gray-800 text-2xl font-semibold capitalize mt-4"><?= $room['title'] ?></h1>
    <span class="bg-color2 p-2 text-white rounded"><i class="bx bx-show"></i> <?= $room['viewed'] ?></span>
</div>
<i class="italic text-xs text-gray-400"><?= $room['descriptions'] ?></i>
<p class="text-gray-800 mt-2"><?= $room['body'] ?></p>
<section class="panorama rounded-xl overflow-hidden mt-4">
    <div id="panorama-360-view" class="picture"></div>
</section>

<div class="grid grid-cols-1 sm:grid-cols-2 mt-2 place-items-start gap-2">
    <div class="">
        <h1 class="font-semibold text-xl text-gray-800">Thumbnail</h1>
        <div class="aspect-[8/6]  w-full rounded-2xl overflow-hidden">
            <img class="w-full h-full object-cover hover:scale-110 transition-all duration-300" src="<?= base_url() ?>/public/360thumbnail/<?= $room['thumbnail'] ?>" alt="<?= $room['title'] ?>">
        </div>
    </div>
    <div class="">
        <h1 class="font-semibold text-xl text-gray-800">Facility</h1>

        <div class="flex justify-start gap-4 ">
            <?php
            $facilities = query("call getFacilitiesByRoomId({$room['id']})");
            foreach ($facilities as $facility) :
            ?>
                <div class='facility-item flex gap-x-2 justify-center items-center py-3 px-2 rounded-xl hover:shadow-md transition-all duration-200 border'>
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