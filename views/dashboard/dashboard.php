<!-- content here -->
<?php include_once '../template/header.php'; ?>
<h1 class="text-xl font-bold">Welcome to Dashboard !!</h1>
<form action="">

    <div class="form-control">
        <label class="label" for="name">Name</label>
        <input class="input" type="text" name="name" id="name" required>
        <span class="invalid">* nama harus di isi</span>
    </div>
    <button class="btn btn-sm" type="submit">Submit</button>
</form>
<div class="overflow-x-auto table-wrapper">
    <div class="inline-block py-2 min-w-full">
        <div class="overflow-hidden rounded-lg">
            <table class="min-w-full">
                <thead class="thead">
                    <tr>
                        <th scope="col" class="th">Avatar</th>
                        <th scope="col" class="th">Name</th>
                        <th scope="col" class="th">Email</th>
                        <th scope="col" class="th">Email Verified</th>
                        <th scope="col" class="th">Phone Number</th>
                        <th scope="col" class="th">Role</th>
                        <th scope="col" class="th">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b">
                        <td class="td">
                            <img src="https://hollux.herokuapp.com/storage/img/avatar/a.png" class="w-10 h-10 object-cover rounded-tr-xl rounded-bl-xl" alt="Apri">
                        </td>
                        <td class="td font-medium text-gray-900">Apri</td>
                        <td class="td">apriansyahrizs@gmail.com</td>
                        <td class="td">2022-04-28 06:46:53</td>
                        <td class="td">0895636786435</td>
                        <td class="td capitalize">user</td>
                        <td class="td flex space-x-2">
                            <a class="btn btn-sm">Edit</a>
                            <a class="btn btn-sm btn-outline">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
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