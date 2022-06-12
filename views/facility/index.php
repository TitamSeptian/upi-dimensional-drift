<!-- content here -->
<?php include_once '../template/header.php'; ?>
<?php
if (isset($_GET['id'])) {
    if ($_GET['action'] == 'delete') {
        $roomFacility = query("SELECT * FROM room_facilities WHERE facility_id = ?", [$_GET['id']]);
        if (count($roomFacility) > 0) {
            redirectTo('Cannot delete facility, it is used in room', '/views/facility/index.php');
        } else {

            delete('facilities', 'id', $_GET['id']);
            redirectTo('Delete Success', '/views/facility/index.php');
        }
    }
}
?>
<script>
    let id = 'facility';
    $("#" + id).addClass("bg-gray-100")
    $(`#${id} i`).removeClass("text-gray-400")
    $(`#${id} i`).addClass("text-color3")
    $(`#${id} span`).removeClass("text-gray-400")
    $(`#${id} span`).addClass("text-color3")
</script>
<h1 class="text-gray-800 text-2xl font-black capitalize after:content-[''] after:block after:w-10 after:h-1 after:bg-gray-800 after:rounded-full mb-4">
    facilities
</h1>
<a href="<?= base_url() ?>/views/facility/create.php" class="btn btn-sm">+ New</a>

<script>
    $(document).ready(function() {
        $('#form').validate();
    });
</script>
<div class="overflow-x-auto table-wrapper">
    <div class="inline-block min-w-full py-2">
        <div class="overflow-hidden rounded-lg">
            <table class="min-w-full">
                <thead class="thead">
                    <tr>
                        <th scope="col" class="th">Facility</th>
                        <th scope="col" class="th">Icon</th>
                        <th scope="col" class="th">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "select * from facilities";
                    $result = query($sql);
                    foreach ($result as $key => $value) {
                    ?>
                        <tr class="bg-white border-b">
                            <td class="td"><?= $value['facility'] ?></td>
                            <td class="font-medium text-gray-900 td"><?= $value['icon'] ?></td>
                            <td class="flex space-x-2 td">
                                <a href="<?php base_url() ?>/views/facility/edit.php?id=<?= $value['id'] ?>" class="btn btn-sm">Edit</a>
                                <a href="<?php base_url() ?>/views/facility/index.php?action=delete&id=<?= $value['id'] ?>" class="btn btn-sm btn-outline">Delete</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include_once '../template/footer.php'; ?>