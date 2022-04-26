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
    });
});
