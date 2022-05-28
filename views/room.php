<?php include_once 'headerLanding.php';
$slug = $_GET['panorama'] ?? '';
if ($slug == '') {
    header('Location: /views/room/index.php');
}
$room = query("call getRoomBySlug('$slug')")[0];
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
            <div class="content font-semibold">
                <h1><?= $room['title'] ?></h1>
                <p><?= $room['descriptions'] ?></p>
                <button class="py-3 px-8 bg-color1 text-white font-semibold rounded-xl">
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
    <div class="flex flex-col sm:p-10 gap-y-5 px-5 py-10">
        <div class="detail flex flex-col gap-y-4">
            <h1 class="font-semibold text-2xl">This is Detail</h1>
            <p class="text-justify"><?= $room['body'] ?></p>
        </div>
        <div class="facility flex flex-col gap-y-4">
            <h1 class="font-semibold text-2xl">This is Facility</h1>
            <div class="grid grid-cols-1 md:grid-cols-4 sm:grid-cols-2 gap-4">
                <?php
                $facilities = query("call getFacilitiesByRoomId({$room['id']})");
                foreach ($facilities as $facility) :
                ?>
                    <div class="facility-item flex gap-x-2 justify-center items-center py-3 rounded-xl hover:shadow-md transition-all duration-200 border">
                        <?= $facility['icon'] . ' ' ?>
                        <p><?= $facility['facility'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="more-image flex flex-col gap-y-4">
            <h1 class="font-semibold text-2xl">Another Image</h1>

            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 sm:grid-cols-2 lg:grid-cols-3">
                <?php
                $gallery = query("SELECT * FROM gallery WHERE room_id = {$room['id']}");
                if (count($gallery) > 0) {
                    foreach ($gallery as $image) :
                ?>
                        <div class="rounded-xl overflow-hidden">
                            <img src="<?= base_url() ?>/public/gallery/<?= $image['image'] ?>" class="hover:scale-110 transition-all duration-300" alt="gambar lain" />
                        </div>
                    <?php endforeach;
                } else {
                    ?>
                    <div class="flex justify-start items-center h-1/2 p-4">
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