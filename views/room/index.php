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
    Room</h1>
<div class="grid lg:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-8">
    <?php
    $rooms = query("call getRooms()");
    foreach ($rooms as $room) {
    ?>
        <div class="space-y-4">
            <div class="aspect-[8/6]  w-full rounded-2xl overflow-hidden">
                <img class="w-full h-full object-cover hover:scale-110 transition-all duration-300" src="<?= base_url() ?>/public/360thumbnail/<?= $room['tumbnail'] ?>" alt="<?= $room['title'] ?>">
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
                    <a href="/views/room/show.php?panorama=<?= $room['slug'] ?>" class="flex items-center gap-1 group">
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

            <div class="flex gap-2">
                <a class="btn btn-sm" href="">Edit</a>
                <button class="btn btn-sm btn-outline">Delete</button>
            </div>
        </div>
    <?php } ?>
</div>
<?php include_once '../template/footer.php'; ?>