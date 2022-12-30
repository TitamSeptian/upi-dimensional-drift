<?php
include_once '../functions.php';
$update = update('facilities', [
    'facility' => $_POST['facility'],
    'icon' => $_POST['icon'],
], 'id', $_POST['id'], true);
if ($update) {
    redirectTo('Update Facility Success', '/views/facility/index.php');
} else {

    redirectTo('Something wrong', '/views/facility/index.php');
}
