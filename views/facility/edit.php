<?php include_once '../template/header.php';
$id = $_GET['id'] ?? '';
if ($id == '') {
    redirectTo('Invalid ID', base_url() . '/views/facility/index.php');
}
$facility = query("SELECT * FROM facilities WHERE id = ?", [$id])[0];
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
<a href="<?= base_url() ?>/views/facility/index.php" class="btn btn-sm">Back</a>

<form action="<?= base_url(); ?>/resources/php/facility/update.php" method="post" class="py-4" id="form">
    <input type="hidden" name="id" id="id" value="<?= $facility['id'] ?>">
    <div class="py-2 form-control">
        <label class="label" for="facility">Facility</label>
        <input class="input" type="text" name="facility" id="facility" value="<?= $facility['facility']  ?>">
    </div>
    <div class="py-2 form-control">
        <label class="label" for="icon">Icon</label>
        <span class="text-sm text-color1">icon only support from <a href="https://boxicons.com" class="italic hover:underline hover:text-color3" target="_blank">https://boxicons.com</a> </span>
        <input class="input" type="text" name="icon" id="icon" value="<?= htmlentities($facility['icon']) ?>">
    </div>
    <button class="btn btn-sm" type="submit">
        Update
    </button>
</form>
<script>
    $(document).ready(function() {
        $('#form').validate({
            rules: {
                onkeyup: true,
                facility: {
                    required: true,
                    minlength: 3,
                    maxlength: 20
                },
                icon: {
                    required: true,
                }
            }
        });
    });
</script>
<?php include_once '../template/footer.php'; ?>