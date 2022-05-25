<?php include_once 'headerLanding.php' ?>
<script>
    $("head").prepend(`<link rel="stylesheet" href="/public/vendor/pannellum/pannellum.css" />`)
    $("nav").addClass("bg-white")
    $("header").removeClass("absolute")
</script>
</script>
</script>
<section class="panorama">
    <div id="panorama-360-view" class="picture"></div>
    <div class="container-xx">
        <div class="info-destination active">
            <div class="content font-semibold">
                <h1>Gedung Biru</h1>
                <p>1st floor, X room</p>
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
            <p class="text-justify">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Animi facilis neque eum, quasi numquam quam repudiandae
                quae. Aut, quidem aliquid consequatur minus et impedit
                alias possimus magnam laborum, exercitationem
                voluptatibus tempora, hic officiis repellendus officia
                natus quibusdam ratione eveniet. Obcaecati perferendis
                tempore eum soluta iste, excepturi consequuntur nihil,
                perspiciatis natus minus ad asperiores quam debitis
                architecto tempora aliquid, delectus aliquam deleniti at
                nobis explicabo recusandae. Blanditiis illum ea
                accusamus ex temporibus beatae non nihil pariatur iusto,
                rem iste ad reiciendis harum! Accusantium facere odit
                consectetur minima pariatur tempora sed ea totam neque
                alias? Veritatis enim saepe officia. Et alias voluptatem
                sunt eum earum atque sequi obcaecati assumenda!
                Doloribus maxime placeat nihil! Non numquam facere
                provident minima aperiam ex cum laudantium.
            </p>
        </div>
        <div class="facility flex flex-col gap-y-4">
            <h1 class="font-semibold text-2xl">This is Facility</h1>
            <div class="grid grid-cols-1 md:grid-cols-4 sm:grid-cols-2 gap-4">
                <div class="facility-item flex gap-x-2 justify-center items-center py-3 rounded-xl hover:shadow-md transition-all duration-200 border">
                    <i class="fa fa-wifi"></i>
                    <p>Free Wifi</p>
                </div>
                <div class="facility-item flex gap-x-2 justify-center items-center py-3 rounded-xl hover:shadow-md transition-all duration-200 border">
                    <i class="fa fa-coffee"></i>
                    <p>Free Coffee</p>
                </div>
                <div class="facility-item flex gap-x-2 justify-center items-center py-3 rounded-xl hover:shadow-md transition-all duration-200 border">
                    <i class="fa fa-cutlery"></i>
                    <p>Free Food</p>
                </div>
                <div class="facility-item flex gap-x-2 justify-center items-center py-3 rounded-xl hover:shadow-md transition-all duration-200 border">
                    <i class="fa fa-car"></i>
                    <p>Free Parking</p>
                </div>
            </div>
        </div>
        <div class="more-image flex flex-col gap-y-4">
            <h1 class="font-semibold text-2xl">Gambar lain</h1>

            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 sm:grid-cols-2 lg:grid-cols-3">
                <div class="rounded-xl overflow-hidden">
                    <img src="/public/images/about/about-upi.png" alt="gambar lain" />
                </div>
                <div class="rounded-xl overflow-hidden">
                    <img src="/public/images/about/about-upi.png" alt="gambar lain" />
                </div>
                <div class="rounded-xl overflow-hidden">
                    <img src="/public/images/about/about-upi.png" alt="gambar lain" />
                </div>
            </div>
        </div>
    </div>
</section>
<script src="<?= base_url(); ?>/public/vendor/pannellum/pannellum.js"></script>
<script>
    const p360 = pannellum.viewer("panorama-360-view", {
        type: "equirectangular",
        // panorama: "assets/360images/360-image.jpg",
        panorama:
            // "https://res.cloudinary.com/dukthftsk/image/upload/v1619363405/WhatsApp_Image_2021-04-25_at_6.27.21_PM_bdnioe.jpg",
            "/public/360images/gedung-i.jpg",
        autoLoad: true,
        compass: false,
        // autoRotate: -2,
        hotSpots: [{
                pitch: -9.020813587234997,
                yaw: -6.510781856704625,
                type: "info",
                text: "ini sesuatu",
                // URL: "https://artbma.org/",
            },
            {
                pitch: -0.6862039444864013,
                yaw: -29.34946088046638,
                type: "info",
                text: "ini sesuatu 2",
                // URL: "https://artbma.org/",
            },
            {
                pitch: -0.6586549905138257,
                yaw: 27.682939233330217,
                type: "info",
                text: "ini sesuatu 2",
                // URL: "https://artbma.org/",
            },
        ],
    });
    const divPannelum = document.getElementById("panorama-360-view");
    divPannelum.addEventListener("click", function(event) {
        // if (event.target.id === "panorama-360-view") {
        // }
        console.log(p360.getPitch(), p360.getYaw());
    });
</script>
<?php include_once 'footerLanding.php' ?>