const modal = $("#modal");
$(document).ready(function () {
    $("#btn-close-modal").click(function () {
        modal.toggleClass("invisible");
    });
    $("body").on("click", ".btn-detail", function () {
        const title = $(this).data("title");
        const body = $(this).data("body");
        const img = $(this).parent().parent().find("img").attr("src");
        console.log(img);
        modal.find("#modal-desc").html(body);
        modal.find("#modal-title").html(title);
        modal.find("#modal-img").attr("src", img);
        modal.toggleClass("invisible");
    });
});
// $(".btn-detail").click(function () {
//     alert("heo");
//     const eleemnt = $(this).parent();
//     const title = eleemnt.find(".desc h1").html();
//     const body = eleemnt.find(".desc p").html();
//     const img = eleemnt.find("img").attr("src");
//     modal.find("#modal-desc").html(body);
//     modal.find("#modal-title").html(title);
//     modal.find("#img-modal").attr("src", img);
//     modal.toggleClass("invisible");
//     console.log(eleemnt, title, body, img);
// });
