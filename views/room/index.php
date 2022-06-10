<!-- content here -->
<?php include_once '../template/header.php'; ?>
<script>
    let id = 'rooms';
    $("#" + id).addClass("bg-gray-100")
    $(`#${id} i`).removeClass("text-gray-400")
    $(`#${id} i`).addClass("text-color3")
    $(`#${id} span`).removeClass("text-gray-400")
    $(`#${id} span`).addClass("text-color3")
</script>
<h1 class="text-gray-800 text-2xl font-black capitalize after:content-[''] after:block after:w-10 after:h-1 after:bg-gray-800 after:rounded-full mb-4">
    Room
</h1>
<a href="<?= base_url(); ?>/views/room/create.php" class="mb-4 btn btn-sm"><i class='bx bx-plus'></i> New</a>
<div class="grid grid-cols-1 gap-8 lg:grid-cols-3 sm:grid-cols-2">
    <?php
    $rooms = query("call getRooms()");
    foreach ($rooms as $room) {
    ?>
        <div class="space-y-4">
            <div class="aspect-[8/6]  w-full rounded-2xl overflow-hidden">
                <img class="object-cover w-full h-full transition-all duration-300 hover:scale-110" src="<?= base_url() ?>/public/360thumbnail/<?= $room['thumbnail'] ?>" alt="<?= $room['title'] ?>">
            </div>
            <div class="flex justify-center px-4 py-2 text-sm text-gray-600 bg-gray-200 rounded-lg gap-x-4 gap-y-2">
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
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-bold text-gray-800"><?= $room['title'] ?></h3>
                    <span class="text-sm text-gray-600"><i class='bx bxs-user'></i> <?= $room['author'] ?></span>
                    <a href="/views/room/show.php?panorama=<?= $room['slug'] ?>" class="flex items-center gap-1 group">
                        <span class="text-sm text-gray-600 group-hover:underline">More</span>
                        <i class="bx bx-right-arrow-alt"></i>
                    </a>
                </div>
                <p class="text-sm tracking-wide text-gray-600 break-words sm:text-base">
                    <?= $room['descriptions'] ?>
                </p>
            </div>
            <?php if (empty($room['panorama_image'])) : ?>
                <span class="block py-2 text-sm text-center text-gray-600 bg-gray-200 rounded-xl"><i class='bx bx-image'></i> 360 photo not available</span>
            <?php else : ?>
                <span class="block py-2 text-sm text-center text-white bg-color4 rounded-xl"><i class='bx bx-image'></i> 360 photo available</span>
            <?php endif; ?>

            <div class="flex gap-2">
                <a class="btn btn-sm" href="<?= base_url() ?>/views/room/edit.php?id=<?= $room['id'] ?>">Edit</a>
                <a class="btn btn-sm btn-outline" href="<?= base_url(); ?>/resources/php/room/delete.php?id=<?= $room['id'] ?>" onClick="javascript: return confirm('This Room Will be deleted, are you sure ?');">Delete</a>
            </div>
        </div>
    <?php } ?>
</div>
<?php include_once '../template/footer.php'; ?>