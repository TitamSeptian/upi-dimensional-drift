<?php include_once 'headerLanding.php';
?>
<script>
    $("head").prepend(`<link rel="stylesheet" href="/public/vendor/pannellum/pannellum.css" />`)
    $("nav").addClass("bg-white")
    $("header").removeClass("absolute")
</script>
<div class="container px-8 mx-auto space-y-10 my-10">
    <div class="space-y-2 flex justify-between flex-wrap gap-3">
        <div class="space-y-2">
            <h1 class="sm:text-4xl text-gray-800 font-bold text-xl capitalize after:content-[''] after:block after:w-10 after:h-1 after:bg-gray-800 after:rounded-full">See the Campus With a
                360° Concept</h1>
            <p class="tracking-wide text-gray-600 sm:text-base text-sm">his 360° system is applied to see various facilities or rooms on the UPI Cibiru campus more deeply or look like real.</p>
        </div>
        <div class="dropdown inline-block relative">
            <button class="bg-white text-color1 hover:bg-color1 hover:text-white border border-color1 font-semibold py-2 px-4 rounded inline-flex items-center">
                <span class="mr-1">Short By</span>
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                </svg>
            </button>
            <ul class="dropdown-menu absolute hidden text-color1 pt-1 border rounded">
                <li class=""><a class="rounded-t bg-white hover:bg-color1 hover:text-white py-2 px-4 block whitespace-no-wrap" href="?orderBy=mostViewed">Most Viewed</a></li>
                <li class=""><a class="bg-white hover:bg-color1 hover:text-white py-2 px-4 block whitespace-no-wrap" href="?orderBy=mostFacility">Most Facility</a></li>
                <!-- <li class=""><a class="rounded-b bg-white hover:bg-color1 py-2 px-4 block whitespace-no-wrap" href="#">Three is the magic number</a></li> -->
            </ul>
        </div>
    </div>
    <div class="grid lg:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-8">
        <?php
        $query;
        $orderBy = $_GET['orderBy'] ?? '';
        switch ($orderBy) {
            case 'mostViewed':
                $query = "call getRoomMostViewed()";
                break;
            case 'mostFacility':
                $query = "call getRoomMostFacility()";
                break;
            default:
                $query = "call getRooms()";
                break;
        }
        $rooms = query($query);
        if (empty($rooms)) {
        ?>
            <div class="min-h-screen flex items-center justify-center">
                <h1 class="text-4xl text-gray-800  after:content-[''] after:block after:w-10 after:h-1 after:bg-gray-800 after:rounded-full">No Tour Available 😞</h1>
            </div>
            <?php } else {
            foreach ($rooms as $room) {
            ?>
                <div class="space-y-4">
                    <div class="aspect-[8/6]  w-full rounded-2xl overflow-hidden">
                        <img class="w-full h-full object-cover hover:scale-110 transition-all duration-300" src="<?= base_url() ?>/public/360thumbnail/<?= $room['thumbnail'] ?>" alt="<?= $room['title'] ?>">
                    </div>
                    <div class="bg-gray-200 text-sm text-gray-600 flex gap-x-4 gap-y-2 justify-center rounded-lg py-2 px-4">
                        <div class="flex items-center gap-1 text-gray-800">
                            <i class="bx bx-tag-alt"></i>
                            <span class="text-sm capitalize"><?= $room['facilities'] ?></span>
                        </div>
                        <div class="flex items-center gap-1 text-gray-800">
                            <i class="bx bx-show"></i>
                            <span class="text-sm capitalize"><?= $room['viewed'] ?></span>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between items-center">
                            <h3 class="font-bold text-lg text-gray-800"><?= $room['title'] ?></h3>
                            <span class="text-sm text-gray-600"><i class='bx bxs-user'></i> <?= $room['author'] ?></span>
                            <a href="/views/room.php?panorama=<?= $room['slug'] ?>" class="flex items-center gap-1 group">
                                <span class="text-sm text-gray-600 group-hover:underline">More</span>
                                <i class="bx bx-right-arrow-alt"></i>
                            </a>
                        </div>
                        <p class="tracking-wide text-gray-600 sm:text-base text-sm break-words">
                            <?= $room['descriptions'] ?>
                        </p>
                    </div>
                    <?php if (empty($room['panorama_image'])) : ?>
                        <span class="text-sm text-gray-600 bg-gray-200 py-2 text-center rounded-xl block"><i class='bx bx-image'></i> 360 photo not available</span>
                    <?php else : ?>
                        <span class="text-sm text-white bg-color4 py-2 text-center rounded-xl block"><i class='bx bx-image'></i> 360 photo available</span>
                    <?php endif; ?>
                </div>
        <?php }
        } ?>
    </div>
</div>
<?php include_once 'footerLanding.php' ?>