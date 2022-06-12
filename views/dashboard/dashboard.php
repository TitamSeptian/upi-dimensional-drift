<!-- content here -->
<?php include_once '../template/header.php'; ?>
<h1 class="text-gray-800 text-3xl font-black capitalize after:content-[''] after:block after:w-10 after:h-1 after:bg-gray-800 after:rounded-full">
    Welcome!!
</h1>
<div class="mt-8 grid md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-4">
    <h2 class="sr-only">Statistic</h2>
    <div class="py-4 px-6 bg-gray-50 rounded-xl">
        <div class="flex items-center gap-4">
            <div class="h-14 w-14 grid place-items-center rounded-xl bg-gray-800 text-white text-xl">
                <i class="bx bx-building"></i>
            </div>
            <div class="flex flex-col">
                <span class="text-gray-600 text-lg">
                    Room
                </span>
                <span class="text-gray-800 text-2xl font-bold">
                    <?= query("SELECT COUNT(*) as sum FROM rooms")[0]['sum'] ?>
                </span>
            </div>
        </div>
    </div>
    <div class="py-4 px-6 bg-gray-50 rounded-xl">
        <div class="flex items-center gap-4">
            <div class="h-14 w-14 grid place-items-center rounded-xl bg-gray-800 text-white text-xl">
                <i class="bx bx-label"></i>
            </div>
            <div class="flex flex-col">
                <span class="text-gray-600 text-lg">
                    Facility
                </span>
                <span class="text-gray-800 text-2xl font-bold">
                    <?= query("SELECT COUNT(*) as sum FROM facilities")[0]['sum'] ?>

                </span>
            </div>
        </div>
    </div>
    <div class="py-4 px-6 bg-gray-50 rounded-xl">
        <div class="flex items-center gap-4">
            <div class="h-14 w-14 grid place-items-center rounded-xl bg-gray-800 text-white text-xl">
                <i class="bx bx-image"></i>
            </div>
            <div class="flex flex-col">
                <span class="text-gray-600 text-lg">
                    Gallery
                </span>
                <span class="text-gray-800 text-2xl font-bold">
                    <?= query("SELECT COUNT(*) as sum FROM gallery")[0]['sum'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<div class="mt-8 grid md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-4">
    <div id="chart-container" class="rounded-xl py-4 px-6 bg-gray-50">
        <h1 class="text-gray-800">Viewed Room By Month</h1>
        <canvas id="graphCanvas" class="w-full"></canvas>
    </div>
    <div class="rounded-xl bg-gray-50 py-4 px-6">
        <div class="flex flex-col">
            <div class="grid gap-2">
                <h1 class="text-gray-800 py-4 px-6">Most Viewed Room</h1>
            </div>
            <?php foreach (query("call getRoomMostViewed()") as $room) : ?>
                <div class="grid gap-2">
                    <a href="/views/room/show.php?panorama=<?= $room['slug'] ?>" class="py-4 px-6 transition-all duration-300 hover:bg-gray-100 rounded-xl group">
                        <span><?= $room['title'] ?></span>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="rounded-xl bg-gray-50 py-4 px-6">
        <div class="flex flex-col">
            <div class="grid gap-2">
                <h1 class="text-gray-800 py-4 px-6">Most Viewed Room</h1>
            </div>
            <?php foreach (query("call getRoomMostFacility()") as $room) : ?>
                <div class="grid gap-2">
                    <a href="/views/room/show.php?panorama=<?= $room['slug'] ?>" class="py-4 px-6 transition-all duration-300 hover:bg-gray-100 rounded-xl group">
                        <span><?= $room['title'] ?></span>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<script>
    let id = 'home';
    $("#" + id).addClass("bg-gray-100")
    $(`#${id} i`).removeClass("text-gray-400")
    $(`#${id} i`).addClass("text-color3")
    $(`#${id} span`).removeClass("text-gray-400")
    $(`#${id} span`).addClass("text-color3")
    $(document).ready(function() {
        showGraph();
    });


    function showGraph() {
        {
            $.post("chart.php",
                function(data) {
                    console.log(data);
                    var name = [];
                    var marks = [];

                    for (var i in data) {
                        name.push(data[i].month);
                        marks.push(data[i].data);
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [{
                            label: 'Room Viewed',
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.4)',
                                'rgba(54, 162, 235, 0.4)',
                                'rgba(255, 206, 86, 0.4)',
                                'rgba(75, 192, 192, 0.4)',
                                'rgba(153, 102, 255, 0.4)',
                                'rgba(0, 0, 128, 0.4)',
                                'rgba(0, 128, 0, 0.4)',
                                'rgba(255, 0, 0, 0.4)',
                                'rgba(255, 255, 0, 0.4)',
                                'rgba(255, 0, 255, 0.4)',
                                'rgba(0, 255, 0, 0.4)',
                                'rgba(153, 102, 255, 0.4)',
                            ],
                            borderColor: '#46d5f1',
                            hoverBackgroundColor: '#CCCCCC',
                            hoverBorderColor: '#666666',
                            data: marks
                        }]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'pie',
                        data: chartdata
                    });
                });
        }
    }
</script>
<?php include_once '../template/footer.php'; ?>