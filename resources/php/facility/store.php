<?php
include_once '../functions.php';
insert('facilities', [
    'facility' => $_POST['facility'],
    'icon' => $_POST['icon'],
], true);
redirectTo('Add New Facility Success', '/views/facility/index.php');
