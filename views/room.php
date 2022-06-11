<?php include_once 'headerLanding.php';
$slug = $_GET['panorama'] ?? '';
if ($slug == '') {
    header('Location: /views/room/index.php');
}
$room = query("call getRoomBySlug('$slug')")[0];
insert("viewed_room", [
    'room_id' => $room['id'],
    'date' => date('Y-m-d H:i:s'),
])
?>
<script>
    $("head").prepend(`<link rel="stylesheet" href="/public/vendor/pannellum/pannellum.css" />`)
    $("nav").addClass("bg-white")
    $("header").removeClass("absolute")
</script>

<section class="panorama">
    <div id="panorama-360-view" class="picture"></div>
    <div class="container-xx">
        <div class="info-destination active">
            <div class="font-semibold content">
                <h1><?= $room['title'] ?></h1>
                <p><?= $room['descriptions'] ?></p>
                <button class="px-8 py-3 font-semibold text-white bg-color1 rounded-xl">
                    <i class="fa fa-search"></i>
                    Explore
                </button>
            </div>
        </div>
        <div class="buttons in">
            <button class="arrow-left">
                <i class="fa fa-long-arrow-left" title="Tampilkan Bar"></i>
            </button>
            <button class="arrow-right" title="Sembunyikan Bar">
                <i class="fa fa-long-arrow-right"></i></button><br />
            <button class="button-info" title="Tentang Wisata">
                <i class="fa fa-info"></i></button><br />
            <button onclick="p360.toggleFullscreen()" title="Lihat 360 Secara Fullscreen">
                <i class="fa fa-arrows-alt"></i></button><br />
            <a href="#detail" title="Detail">
                <button>
                    <i class="fa fa-angle-down"></i>
                </button>
            </a>
        </div>
    </div>
</section>
<section id="detail">
    <div class="flex flex-col px-5 py-10 sm:p-10 gap-y-5">
        <div class="flex flex-col detail gap-y-4">
            <h1 class="text-2xl font-semibold">This is Detail</h1>
            <p class="text-justify"><?= $room['body'] ?></p>
        </div>
        <div class="flex flex-col facility gap-y-4">
            <h1 class="text-2xl font-semibold">This is Facility</h1>
            <div class="grid grid-cols-1 gap-4 md:grid-cols-4 sm:grid-cols-2">
                <?php
                $facilities = query("call getFacilitiesByRoomId({$room['id']})");
                foreach ($facilities as $facility) :
                ?>
                    <div class="flex items-center justify-center py-3 transition-all duration-200 border facility-item gap-x-2 rounded-xl hover:shadow-md">
                        <?= $facility['icon'] . ' ' ?>
                        <p><?= $facility['facility'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="flex flex-col more-image gap-y-4">
            <h1 class="text-2xl font-semibold">Another Image</h1>

            <div class="gap-4 space-y-4 sm:columns-2 md:columns-3">
                <?php
                $gallery = query("SELECT * FROM gallery WHERE room_id = {$room['id']}");
                if (count($gallery) > 0) {
                    foreach ($gallery as $image) :
                ?>
                        <div class="overflow-hidden rounded-xl">
                            <img src="<?= base_url() ?>/public/gallery/<?= $image['image'] ?>" class="transition-all duration-300 hover:scale-110" alt="gambar lain" />
                        </div>
                    <?php endforeach;
                } else {
                    ?>
                    <div class="flex items-center justify-start p-4 h-1/2">
                        <p class="text-gray-500">No Image</p>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</section>
<script src="<?= base_url(); ?>/public/vendor/pannellum/pannellum.js"></script>
<script>
    const p360 = pannellum.viewer("panorama-360-view", {
        type: "equirectangular",
        // panorama: "assets/360images/360-image.jpg",
        panorama: "<?= base_url() ?>/public/360images/<?= $room['panorama_image'] ?>",
        autoLoad: true,
        compass: false,
    });
</script>
<?php include_once 'footerLanding.php' ?>