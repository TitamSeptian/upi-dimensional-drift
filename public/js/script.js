window.onload = () => {
    $(".preloader").fadeOut();
};

$(document).ready(function () {
    $(".times").click(function () {
        $(".sidebar").addClass("hide");
    });
    $(".toggle-menu").click(function () {
        $(".sidebar").removeClass("hide");
    });

    $("#humberger").click(function () {
        $("#humberger").toggleClass("active");
        $("#nav").toggleClass("hidden");
        $("#nav").toggleClass("text-black");
    });

    $(".info-destination .content")
        .find("button")
        .click(function (event) {
            $(".info-destination").removeClass("active");
        });

    $(".panorama .container-xx .buttons")
        .find(".button-info")
        .click(function (event) {
            $(".info-destination").addClass("active");
            $(this).css({
                transform: "translateX(150%)",
                // opasity: "0",
            });
        });
    $(".panorama .info-destination .content button").click(function (event) {
        $(".panorama .container-xx .buttons").find(".button-info").css({
            transform: "translateX(0%)",
        });
    });

    $(window).scroll(function () {
        if ($(this).scrollTop() > 120) {
            $(".panorama .container-xx .buttons").removeClass("in");
            $(".panorama .container-xx .buttons").removeClass("half");
        } else {
            if ($(".panorama .container-xx .buttons").data("class") == "half") {
                $(".panorama .container-xx .buttons").addClass("half");
            } else {
                $(".panorama .container-xx .buttons").addClass("in");
            }
        }
    });
    // arrow right
    $(".panorama .container-xx .buttons")
        .find(".arrow-right")
        .click(function (event) {
            // alert("heo");
            $(".panorama .container-xx .buttons")
                .removeClass("in")
                .addClass("half")
                .data("class", "half");
        });
    // arrow left
    $(".panorama .container-xx .buttons")
        .find(".arrow-left")
        .click(function (event) {
            $(".panorama .container-xx .buttons")
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
    const modal = $("#modal");
    $("#btn-close-modal").click(function () {
        modal.addClass("hidden");
    });
    $(".btn-detail").click(function () {
        const eleemnt = $(this).parent();
        const title = eleemnt.find(".desc h1").html();
        const body = eleemnt.find(".desc p").html();
        const img = eleemnt.find("img").attr("src");
        modal.find("#modal-desc").html(body);
        modal.find("#modal-title").html(title);
        modal.find("#img-modal").attr("src", img);
        modal.removeClass("hidden");
        console.log();
    });
});
