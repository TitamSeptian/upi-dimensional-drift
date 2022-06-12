<!-- content here -->
<?php include_once '../template/header.php'; ?>
<h1 class="text-xl p-2 text-center font-bold">Welcome to Dashboard !!</h1>
<hr>
<div id="chart-container">
    <canvas id="graphCanvas"></canvas>
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