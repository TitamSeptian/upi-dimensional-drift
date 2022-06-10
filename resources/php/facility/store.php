<?php
include_once '../functions.php';
insert('facilities', [
    'facility' => $_POST['facility'],
    'icon' => $_POST['icon'],
]);
redirectTo('Add New Facility Success', '/views/facility/index.php');
