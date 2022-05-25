<?php include_once 'headerLanding.php' ?>
<script>
    $("header").addClass("text-white");
</script>
<div class="modal-wrapper z-10 h-screen fixed bg-black/70 w-screen hidden" id="modal">
    <div class="fixed sm:w-[600px] w-[400px] h-[600px] max-h-400 bg-white z-20 top-1/2 left-1/2 -translate-x-2/4 -translate-y-2/4 rounded-xl">
        <div class="flex flex-col relative overflow-y-scroll overflow-x-hidden w-full h-full p-5 gap-y-3">
            <button type="button" class="text-2xl self-end px-2 py-1 rounded-lg hover:bg-gray-100" id="btn-close-modal">
                &times;
            </button>
            <img src="/public/images/gallery/gdbiru.jpg" alt="" class="aspect-ratio-1/1 w-auto h-[400px] object-cover rounded-xl" id="img-modal" />
            <div class="desc text-center px-5 py-9">
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
    <div class="flex h-screen items-center justify-center w-screen">
        <div class="font-bold text-white text-center text-2xl sm:text-6xl">
            <h1>Gallery UPI</h1>
            <h1>Dimensional Drift</h1>
        </div>
    </div>
</section>
<section id="gallery" class="h-full px-2 sm:px-10 py-10 bg-color1">
    <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4">
        <div class="relative group gallery">
            <div class="h-[200px] aspect-[1/1] w-full rounded-xl overflow-hidden group-hover:brightness-50 transition-all duration-150">
                <img src="/public/images/gallery/gdbiru.jpg" alt="" class="object-cover h-full w-full" />
            </div>
            <button class="py-2 px-3 bg-color1 text-white rounded-lg absolute hidden top-1/2 left-1/2 z-20 -translate-x-2/4 -translate-y-2/4 btn-detail transition-all duration-150">
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
                <img src="/public/images/gallery/gedung kantor.jpeg" alt="" class="object-cover h-full w-full" />
            </div>
            <button class="py-2 px-3 bg-color1 text-white rounded-lg absolute hidden top-1/2 left-1/2 z-20 -translate-x-2/4 -translate-y-2/4 btn-detail transition-all duration-150">
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
                <img src="/public/images/gallery/gedung kantor.jpeg" alt="" class="object-cover h-full w-full" />
            </div>
            <button class="py-2 px-3 bg-color1 text-white rounded-lg absolute hidden top-1/2 left-1/2 z-20 -translate-x-2/4 -translate-y-2/4 btn-detail transition-all duration-150">
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
                <img src="/public/images/gallery/gedung kantor.jpeg" alt="" class="object-cover h-full w-full" />
            </div>
            <button class="py-2 px-3 bg-color1 text-white rounded-lg absolute hidden top-1/2 left-1/2 z-20 -translate-x-2/4 -translate-y-2/4 btn-detail transition-all duration-150">
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
                <img src="/public/images/gallery/gedung kantor.jpeg" alt="" class="object-cover h-full w-full" />
            </div>
            <button class="py-2 px-3 bg-color1 text-white rounded-lg absolute hidden top-1/2 left-1/2 z-20 -translate-x-2/4 -translate-y-2/4 btn-detail transition-all duration-150">
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
                <img src="/public/images/gallery/gedung kantor.jpeg" alt="" class="object-cover h-full w-full" />
            </div>
            <button class="py-2 px-3 bg-color1 text-white rounded-lg absolute hidden top-1/2 left-1/2 z-20 -translate-x-2/4 -translate-y-2/4 btn-detail transition-all duration-150">
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
                <img src="/public/images/gallery/gedung kantor.jpeg" alt="" class="object-cover h-full w-full" />
            </div>
            <button class="py-2 px-3 bg-color1 text-white rounded-lg absolute hidden top-1/2 left-1/2 z-20 -translate-x-2/4 -translate-y-2/4 btn-detail transition-all duration-150">
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
                <img src="/public/images/gallery/gedung kantor.jpeg" alt="" class="object-cover h-full w-full" />
            </div>
            <button class="py-2 px-3 bg-color1 text-white rounded-lg absolute hidden top-1/2 left-1/2 z-20 -translate-x-2/4 -translate-y-2/4 btn-detail transition-all duration-150">
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
                <img src="/public/images/gallery/gedung kantor.jpeg" alt="" class="object-cover h-full w-full" />
            </div>
            <button class="py-2 px-3 bg-color1 text-white rounded-lg absolute hidden top-1/2 left-1/2 z-20 -translate-x-2/4 -translate-y-2/4 btn-detail transition-all duration-150">
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
                <img src="/public/images/gallery/gedung kantor.jpeg" alt="" class="object-cover h-full w-full" />
            </div>
            <button class="py-2 px-3 bg-color1 text-white rounded-lg absolute hidden top-1/2 left-1/2 z-20 -translate-x-2/4 -translate-y-2/4 btn-detail transition-all duration-150">
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
                <img src="/public/images/gallery/gedung kantor.jpeg" alt="" class="object-cover h-full w-full" />
            </div>
            <button class="py-2 px-3 bg-color1 text-white rounded-lg absolute hidden top-1/2 left-1/2 z-20 -translate-x-2/4 -translate-y-2/4 btn-detail transition-all duration-150">
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
                <img src="/public/images/gallery/gedung kantor.jpeg" alt="" class="object-cover h-full w-full" />
            </div>
            <button class="py-2 px-3 bg-color1 text-white rounded-lg absolute hidden top-1/2 left-1/2 z-20 -translate-x-2/4 -translate-y-2/4 btn-detail transition-all duration-150">
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
                <img src="/public/images/gallery/gedung kantor.jpeg" alt="" class="object-cover h-full w-full" />
            </div>
            <button class="py-2 px-3 bg-color1 text-white rounded-lg absolute hidden top-1/2 left-1/2 z-20 -translate-x-2/4 -translate-y-2/4 btn-detail transition-all duration-150">
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
</section>
<?php include_once 'footerLanding.php' ?>