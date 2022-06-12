<?php include_once '../template/header.php'; ?>
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

<form action="<?= base_url() ?>/resources/php/facility/store.php" method="post" class="py-4" id="form">
    <div class="py-2 form-control">
        <label class="label" for="facility">Facility</label>
        <input class="input" type="text" name="facility" id="facility" value="" required>
    </div>
    <div class="py-2 form-control">
        <label class="label" for="icon">Icon</label>
        <span class="text-sm text-color1">icon only support from <a href="https://boxicons.com" class="italic hover:underline hover:text-color3" target="_blank">https://boxicons.com</a> </span>
        <input class="input" type="text" name="icon" id="icon" value="" required>
    </div>
    <button class="btn btn-sm" type="submit">
        Submit
    </button>
</form>
<script>
    $(document).ready(function() {
        $('#form').validate();
    });
</script>
<?php include_once '../template/footer.php'; ?>