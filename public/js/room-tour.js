const p360 = pannellum.viewer("panorama-360-view", {
    type: "equirectangular",
    // panorama: "assets/360images/360-image.jpg",
    panorama:
        "https://res.cloudinary.com/dukthftsk/image/upload/v1619363405/WhatsApp_Image_2021-04-25_at_6.27.21_PM_bdnioe.jpg",
    autoLoad: true,
    compass: false,
    // autoRotate: -2,
    hotSpots: [
        {
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
divPannelum.addEventListener("click", function (event) {
    // if (event.target.id === "panorama-360-view") {
    // }
    console.log(p360.getPitch(), p360.getYaw());
});

$(document).ready(function () {
    // $(".panorama .info-destination .content button").click(function (event) {
    //     $(".panorama .container .buttons").find(".button-info").css({
    //         transform: "translateX(0%)",
    //     });
    // });

    $(".info-destination .content")
        .find("button")
        .click(function (event) {
            $(".info-destination").removeClass("active");
        });

    $(".panorama .container .buttons")
        .find(".button-info")
        .click(function (event) {
            $(".info-destination").addClass("active");
            $(this).css({
                transform: "translateX(150%)",
                // opasity: "0",
            });
        });
    $(".panorama .info-destination .content button").click(function (event) {
        $(".panorama .container .buttons").find(".button-info").css({
            transform: "translateX(0%)",
        });
    });

    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $(".panorama .container .buttons").removeClass("in");
            $(".panorama .container .buttons").removeClass("half");
        } else {
            if ($(".panorama .container .buttons").data("class") == "half") {
                $(".panorama .container .buttons").addClass("half");
            } else {
                $(".panorama .container .buttons").addClass("in");
            }
        }
    });
    // arrow right
    $(".panorama .container .buttons")
        .find(".arrow-right")
        .click(function (event) {
            // alert("heo");
            $(".panorama .container .buttons")
                .removeClass("in")
                .addClass("half")
                .data("class", "half");
        });
    // arrow left
    $(".panorama .container .buttons")
        .find(".arrow-left")
        .click(function (event) {
            $(".panorama .container .buttons")
                .removeClass("half")
                .addClass("in")
                .data("class", "in");
        });

    $(".buttons.in a").on("click", function () {
        $("html, body").animate(
            {
                scrollTop: $($.attr(this, "href")).offset().top,
            },
            500
        );
    });
});
