const modal = $("#modal");
const uploader = $("#uploader");
const html = $("html");


console.log(html);
$(document).ready(function () {
    $("#btn-close-modal").click(function () {
        modal.toggleClass("invisible");
    });
    $(document).keydown(function (e) {
        if (e.key == 'Escape' && !modal.hasClass("invisible")) {
            modal.toggleClass("invisible");
        }
    })
    $("body").on("click", ".btn-detail", function () {
        const title = $(this).data("title");
        const body = $(this).data("body");
        const img = $(this).parent().parent().find("img").attr("src");
        const uploaderName = $("#uploaderName").data("uploader");
        console.log(img);
        console.log(uploaderName);
        console.log($(this).data("title"));
        modal.find("#modal-desc").html(body);
        modal.find("#modal-title").html(title);
        modal.find("#modal-img").attr("src", img);
        modal.toggleClass("invisible");
        uploader.html(uploaderName);
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
