<?php include_once 'headerLanding.php' ?>
<script>
    $("header").addClass("text-white");
</script>
<div class="fixed inset-0 bg-black/50 z-50 transition-all duration-300 invisible" id="modal">
    <div class="modal-wrapper relative min-h-screen flex items-center justify-center p-4 ">
        <div class="relative max-w-2xl flex sm:flex-nowrap flex-wrap w-full bg-white rounded-xl p-10 overflow-y-auto space-y-4">
            <button type="button" class="absolute top-4 right-4 p-2 text-2xl font-bold z-50 rounded-lg hover:bg-gray-100" id="btn-close-modal">
                &times;
            </button>
            <div class="aspect-[4/3] w-full rounded-2xl overflow-hidden ">
                <img class="w-full h-full object-cover hover:scale-110 transition-all duration-300" id="modal-img" src="<?= base_url() ?>/public/images/gallery/629581a78fce3894307danau.jpg" alt="?>">
            </div>
            <div class="px-5 text-center desc py-9">
                <h1 class="text-2xl font-semibold" id="modal-title">
                    Title
                </h1>
                <p id="modal-desc">
                    Lorem ipsum dolor sit amet consectetur adipisicing
                    elit. Natus modi sint eligendi obcaecati, recusandae
                    placeat voluptatum commodi expedita reiciendis
                    deleniti ducimus quo, ex asperiores a?
                </p>
            </div>
        </div>
    </div>
</div>
<section id="header" class="bg-fixed bg-[url('/public/images/gallery/bghome.jpeg')] bg-cover overflow-hidden -z-10">
    <div class="flex items-center justify-center w-screen h-screen">
        <div class="text-2xl font-bold text-center text-white sm:text-6xl">
            <h1>Gallery UPI</h1>
            <h1>Dimensional Drift</h1>
        </div>
    </div>
</section>
<section id="gallery" class="h-full px-2 py-10 sm:px-10 bg-color1">
    <div class="gap-4 space-y-4 sm:columns-2 md:columns-3">
        <!-- looping here -->
        <div class="relative overflow-hidden rounded-2xl group">
            <div class="absolute z-10 flex space-x-4 top-4 left-4">
                <button class="scale-0 btn btn-icon group-hover:scale-100 group-hover:cursor-pointer btn-detail" data-title="title2" data-body="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolor, molestiae voluptatum voluptatem excepturi laboriosam voluptas nemo porro consequuntur natus optio itaque alias aliquid sapiente debitis.">
                    <i class="bx bx-show"></i>
                </button>
            </div>
            <img class="relative z-0 w-full transition-all duration-300 hover:scale-110" src="<?= base_url();  ?>/public/images/gallery/629581a78fce3894307danau.jpg" alt="" title="" />
        </div>
        <div class="relative overflow-hidden rounded-2xl group">
            <div class="absolute z-10 flex space-x-4 top-4 left-4">
                <button class="scale-0 btn btn-icon group-hover:scale-100 group-hover:cursor-pointer btn-detail" data-title="title2" data-body="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolor, molestiae voluptatum voluptatem excepturi laboriosam voluptas nemo porro consequuntur natus optio itaque alias aliquid sapiente debitis.">
                    <i class="bx bx-show"></i>
                </button>
            </div>
            <img class="relative z-0 w-full transition-all duration-300 hover:scale-110" src="<?= base_url();  ?>/public/images/gallery/lorong.jpg" alt="" title="" />
        </div>
        <div class="relative overflow-hidden rounded-2xl group">
            <div class="absolute z-10 flex space-x-4 top-4 left-4">
                <button class="scale-0 btn btn-icon group-hover:scale-100 group-hover:cursor-pointer btn-detail" data-title="title2" data-body="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolor, molestiae voluptatum voluptatem excepturi laboriosam voluptas nemo porro consequuntur natus optio itaque alias aliquid sapiente debitis.">
                    <i class="bx bx-show"></i>
                </button>
            </div>
            <img class="relative z-0 w-full transition-all duration-300 hover:scale-110" src="<?= base_url();  ?>/public/images/gallery/62958241cf22f796538city.jpg" alt="" title="" />
        </div>
        <!-- endloop -->
    </div>
</section>
<script src="<?= base_url(); ?>/resources/js/gallery.js"></script>
<!-- <section id="gallery" class="h-full px-2 py-10 sm:px-10 bg-color1">
    <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4">
        <div class="relative group gallery">
            <div class="h-[200px] aspect-[1/1] w-full rounded-xl overflow-hidden group-hover:brightness-50 transition-all duration-150">
                <img src="/public/images/gallery/gdbiru.jpg" alt="" class="object-cover w-full h-full" />
            </div>
            <button class="absolute z-20 hidden px-3 py-2 text-white transition-all duration-150 rounded-lg bg-color1 top-1/2 left-1/2 -translate-x-2/4 -translate-y-2/4 btn-detail">
                Detail
            </button>
            <div class="hidden desc">
                <h1>Title</h1>
                <p>
                    Desc => Lorem ipsum dolor sit amet, consectetur
                    adipisicing elit. Expedita modi praesentium
                    distinctio a quod consequuntur dolore non ad,
                    dolorum molestiae rem corrupti aliquid iste sunt.
                </p>
            </div>
        </div>
        <div class="relative group gallery">
            <div class="h-[200px] aspect-[1/1] w-full rounded-xl overflow-hidden group-hover:brightness-50 transition-all duration-150">
                <img src="/public/images/gallery/gedung kantor.jpeg" alt="" class="object-cover w-full h-full" />
            </div>
            <button class="absolute z-20 hidden px-3 py-2 text-white transition-all duration-150 rounded-lg bg-color1 top-1/2 left-1/2 -translate-x-2/4 -translate-y-2/4 btn-detail">
                Detail
            </button>
            <div class="hidden desc">
                <h1>Title</h1>
                <p>
                    Desc => Lorem ipsum dolor sit amet, consectetur
                    adipisicing elit. Expedita modi praesentium
                    distinctio a quod consequuntur dolore non ad,
                    dolorum molestiae rem corrupti aliquid iste sunt.
                </p>
            </div>
        </div>
        <div class="relative group gallery">
            <div class="h-[200px] aspect-[1/1] w-full rounded-xl overflow-hidden group-hover:brightness-50 transition-all duration-150">
                <img src="/public/images/gallery/gedung kantor.jpeg" alt="" class="object-cover w-full h-full" />
            </div>
            <button class="absolute z-20 hidden px-3 py-2 text-white transition-all duration-150 rounded-lg bg-color1 top-1/2 left-1/2 -translate-x-2/4 -translate-y-2/4 btn-detail">
                Detail
            </button>
            <div class="hidden desc">
                <h1>Title</h1>
                <p>
                    Desc => Lorem ipsum dolor sit amet, consectetur
                    adipisicing elit. Expedita modi praesentium
                    distinctio a quod consequuntur dolore non ad,
                    dolorum molestiae rem corrupti aliquid iste sunt.
                </p>
            </div>
        </div>
        <div class="relative group gallery">
            <div class="h-[200px] aspect-[1/1] w-full rounded-xl overflow-hidden group-hover:brightness-50 transition-all duration-150">
                <img src="/public/images/gallery/gedung kantor.jpeg" alt="" class="object-cover w-full h-full" />
            </div>
            <button class="absolute z-20 hidden px-3 py-2 text-white transition-all duration-150 rounded-lg bg-color1 top-1/2 left-1/2 -translate-x-2/4 -translate-y-2/4 btn-detail">
                Detail
            </button>
            <div class="hidden desc">
                <h1>Title</h1>
                <p>
                    Desc => Lorem ipsum dolor sit amet, consectetur
                    adipisicing elit. Expedita modi praesentium
                    distinctio a quod consequuntur dolore non ad,
                    dolorum molestiae rem corrupti aliquid iste sunt.
                </p>
            </div>
        </div>
        <div class="relative group gallery">
            <div class="h-[200px] aspect-[1/1] w-full rounded-xl overflow-hidden group-hover:brightness-50 transition-all duration-150">
                <img src="/public/images/gallery/gedung kantor.jpeg" alt="" class="object-cover w-full h-full" />
            </div>
            <button class="absolute z-20 hidden px-3 py-2 text-white transition-all duration-150 rounded-lg bg-color1 top-1/2 left-1/2 -translate-x-2/4 -translate-y-2/4 btn-detail">
                Detail
            </button>
            <div class="hidden desc">
                <h1>Title</h1>
                <p>
                    Desc => Lorem ipsum dolor sit amet, consectetur
                    adipisicing elit. Expedita modi praesentium
                    distinctio a quod consequuntur dolore non ad,
                    dolorum molestiae rem corrupti aliquid iste sunt.
                </p>
            </div>
        </div>
        <div class="relative group gallery">
            <div class="h-[200px] aspect-[1/1] w-full rounded-xl overflow-hidden group-hover:brightness-50 transition-all duration-150">
                <img src="/public/images/gallery/gedung kantor.jpeg" alt="" class="object-cover w-full h-full" />
            </div>
            <button class="absolute z-20 hidden px-3 py-2 text-white transition-all duration-150 rounded-lg bg-color1 top-1/2 left-1/2 -translate-x-2/4 -translate-y-2/4 btn-detail">
                Detail
            </button>
            <div class="hidden desc">
                <h1>Title</h1>
                <p>
                    Desc => Lorem ipsum dolor sit amet, consectetur
                    adipisicing elit. Expedita modi praesentium
                    distinctio a quod consequuntur dolore non ad,
                    dolorum molestiae rem corrupti aliquid iste sunt.
                </p>
            </div>
        </div>
        <div class="relative group gallery">
            <div class="h-[200px] aspect-[1/1] w-full rounded-xl overflow-hidden group-hover:brightness-50 transition-all duration-150">
                <img src="/public/images/gallery/gedung kantor.jpeg" alt="" class="object-cover w-full h-full" />
            </div>
            <button class="absolute z-20 hidden px-3 py-2 text-white transition-all duration-150 rounded-lg bg-color1 top-1/2 left-1/2 -translate-x-2/4 -translate-y-2/4 btn-detail">
                Detail
            </button>
            <div class="hidden desc">
                <h1>Title</h1>
                <p>
                    Desc => Lorem ipsum dolor sit amet, consectetur
                    adipisicing elit. Expedita modi praesentium
                    distinctio a quod consequuntur dolore non ad,
                    dolorum molestiae rem corrupti aliquid iste sunt.
                </p>
            </div>
        </div>
        <div class="relative group gallery">
            <div class="h-[200px] aspect-[1/1] w-full rounded-xl overflow-hidden group-hover:brightness-50 transition-all duration-150">
                <img src="/public/images/gallery/gedung kantor.jpeg" alt="" class="object-cover w-full h-full" />
            </div>
            <button class="absolute z-20 hidden px-3 py-2 text-white transition-all duration-150 rounded-lg bg-color1 top-1/2 left-1/2 -translate-x-2/4 -translate-y-2/4 btn-detail">
                Detail
            </button>
            <div class="hidden desc">
                <h1>Title</h1>
                <p>
                    Desc => Lorem ipsum dolor sit amet, consectetur
                    adipisicing elit. Expedita modi praesentium
                    distinctio a quod consequuntur dolore non ad,
                    dolorum molestiae rem corrupti aliquid iste sunt.
                </p>
            </div>
        </div>
        <div class="relative group gallery">
            <div class="h-[200px] aspect-[1/1] w-full rounded-xl overflow-hidden group-hover:brightness-50 transition-all duration-150">
                <img src="/public/images/gallery/gedung kantor.jpeg" alt="" class="object-cover w-full h-full" />
            </div>
            <button class="absolute z-20 hidden px-3 py-2 text-white transition-all duration-150 rounded-lg bg-color1 top-1/2 left-1/2 -translate-x-2/4 -translate-y-2/4 btn-detail">
                Detail
            </button>
            <div class="hidden desc">
                <h1>Title</h1>
                <p>
                    Desc => Lorem ipsum dolor sit amet, consectetur
                    adipisicing elit. Expedita modi praesentium
                    distinctio a quod consequuntur dolore non ad,
                    dolorum molestiae rem corrupti aliquid iste sunt.
                </p>
            </div>
        </div>
        <div class="relative group gallery">
            <div class="h-[200px] aspect-[1/1] w-full rounded-xl overflow-hidden group-hover:brightness-50 transition-all duration-150">
                <img src="/public/images/gallery/gedung kantor.jpeg" alt="" class="object-cover w-full h-full" />
            </div>
            <button class="absolute z-20 hidden px-3 py-2 text-white transition-all duration-150 rounded-lg bg-color1 top-1/2 left-1/2 -translate-x-2/4 -translate-y-2/4 btn-detail">
                Detail
            </button>
            <div class="hidden desc">
                <h1>Title</h1>
                <p>
                    Desc => Lorem ipsum dolor sit amet, consectetur
                    adipisicing elit. Expedita modi praesentium
                    distinctio a quod consequuntur dolore non ad,
                    dolorum molestiae rem corrupti aliquid iste sunt.
                </p>
            </div>
        </div>
        <div class="relative group gallery">
            <div class="h-[200px] aspect-[1/1] w-full rounded-xl overflow-hidden group-hover:brightness-50 transition-all duration-150">
                <img src="/public/images/gallery/gedung kantor.jpeg" alt="" class="object-cover w-full h-full" />
            </div>
            <button class="absolute z-20 hidden px-3 py-2 text-white transition-all duration-150 rounded-lg bg-color1 top-1/2 left-1/2 -translate-x-2/4 -translate-y-2/4 btn-detail">
                Detail
            </button>
            <div class="hidden desc">
                <h1>Title</h1>
                <p>
                    Desc => Lorem ipsum dolor sit amet, consectetur
                    adipisicing elit. Expedita modi praesentium
                    distinctio a quod consequuntur dolore non ad,
                    dolorum molestiae rem corrupti aliquid iste sunt.
                </p>
            </div>
        </div>
        <div class="relative group gallery">
            <div class="h-[200px] aspect-[1/1] w-full rounded-xl overflow-hidden group-hover:brightness-50 transition-all duration-150">
                <img src="/public/images/gallery/gedung kantor.jpeg" alt="" class="object-cover w-full h-full" />
            </div>
            <button class="absolute z-20 hidden px-3 py-2 text-white transition-all duration-150 rounded-lg bg-color1 top-1/2 left-1/2 -translate-x-2/4 -translate-y-2/4 btn-detail">
                Detail
            </button>
            <div class="hidden desc">
                <h1>Title</h1>
                <p>
                    Desc => Lorem ipsum dolor sit amet, consectetur
                    adipisicing elit. Expedita modi praesentium
                    distinctio a quod consequuntur dolore non ad,
                    dolorum molestiae rem corrupti aliquid iste sunt.
                </p>
            </div>
        </div>
        <div class="relative group gallery">
            <div class="h-[200px] aspect-[1/1] w-full rounded-xl overflow-hidden group-hover:brightness-50 transition-all duration-150">
                <img src="/public/images/gallery/gedung kantor.jpeg" alt="" class="object-cover w-full h-full" />
            </div>
            <button class="absolute z-20 hidden px-3 py-2 text-white transition-all duration-150 rounded-lg bg-color1 top-1/2 left-1/2 -translate-x-2/4 -translate-y-2/4 btn-detail">
                Detail
            </button>
            <div class="hidden desc">
                <h1>Title</h1>
                <p>
                    Desc => Lorem ipsum dolor sit amet, consectetur
                    adipisicing elit. Expedita modi praesentium
                    distinctio a quod consequuntur dolore non ad,
                    dolorum molestiae rem corrupti aliquid iste sunt.
                </p>
            </div>
        </div>
    </div>
</section> -->

<?php include_once 'footerLanding.php' ?>