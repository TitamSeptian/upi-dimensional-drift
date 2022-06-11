<?php include_once 'headerLanding.php' ?>
<script>
    $("header").addClass("text-white");
</script>
<div class="fixed inset-0 z-50 invisible transition-all duration-300 bg-black/50" id="modal">
    <div class="relative flex items-center justify-center min-h-screen modal-wrapper ">
        <div class="relative flex flex-wrap w-full max-w-5xl p-10 space-y-4 overflow-y-auto bg-white sm:flex-nowrap rounded-xl">
            <button type="button" class="absolute z-50 p-2 text-2xl font-bold rounded-lg top-4 right-4 hover:bg-gray-100" id="btn-close-modal">
                &times;
            </button>
            <div class="aspect-[4/3] w-full rounded-2xl overflow-hidden ">
                <img class="object-cover w-full h-full transition-all duration-300 hover:scale-110" id="modal-img" src="" alt="?>">
            </div>
            <div class="flex flex-col justify-center px-5 ml-5 desc ">
                <div id="text">
                    <h1 class="mb-5 text-4xl font-bold text-blue-900" id="modal-title">
                        Title
                    </h1>
                    <p id="modal-desc">
                        Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Natus modi sint eligendi obcaecati, recusandae
                        placeat voluptatum commodi expedita reiciendis
                        deleniti ducimus quo, ex asperiores a?
                    </p>
                </div>
                <div id="author" class="flex flex-col justify-between w-1/2 mt-10">
                    <p>Uploaded By: </p>
                    <span class="text-slate-500" id="uploader" data-body="Rony"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<section id="header" class="bg-fixed bg-[url('/public/images/gallery/bghome.jpeg')] bg-cover overflow-hidden -z-10">
    <div class="flex items-center justify-center w-screen h-screen">
        <div class="text-2xl font-bold text-center text-white sm:text-6xl">
            <h1>Gallery UPI</h1>
            <h1>Dimensional Drift</h1>
            <a href="#gallery" id="arrow" class="cursor-pointer ">&#8595</a>
        </div>
    </div>
</section>
<section id="gallery" class="h-full px-2 py-10 sm:px-10 bg-color1">
    <div class="gap-4 space-y-4 sm:columns-2 md:columns-3">
        <!-- looping here -->
        <?php
        $gallery = query("call getGallery()");

        foreach ($gallery as $content) :
            $title = $content['title'];
            $body = $content['body'];
            $imagePath = $content['path'];
            $uploader = $content['uploader'];
        ?>
            <div class="relative overflow-hidden rounded-2xl group">
                <div class="absolute z-10 flex space-x-4 top-4 left-4">
                    <button class="scale-0 btn btn-icon group-hover:scale-100 group-hover:cursor-pointer btn-detail" data-title="<?= $title ?>" data-body="<?= $body ?>">
                        <i class="bx bx-show"></i>
                    </button>

                </div>
                <img class="relative z-0 w-full transition-all duration-300 hover:scale-110" src="<?= $imagePath ?>" alt="" title="" />
                <span id="uploaderName" data-uploader="<?= $uploader ?> "></span>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<script src="<?= base_url(); ?>/resources/js/gallery.js"></script>
<?php include_once 'footerLanding.php' ?>