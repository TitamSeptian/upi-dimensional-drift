const p360 = pannellum.viewer("panorama-360-view", {
    type: "equirectangular",
    panorama: "./assets/360images/360-image.jpg",
    autoLoad: true,
    compass: false,
    // autoRotate: -2,
    hotSpots: [
        {
            pitch: -9.020813587234997,
            yaw: -6.510781856704625,
            type: "info",
            text: "Ini Orang",
            URL: "https://artbma.org/",
        },
    ],
});
const divPannelum = document.getElementById("panorama-360-view");
divPannelum.addEventListener("click", function (event) {
    // if (event.target.id === "panorama-360-view") {
    // }
    console.log(p360.getPitch(), p360.getYaw());
});
