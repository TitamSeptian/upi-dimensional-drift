<?php

include '../../resources/php/functions.php';

$data = query("SELECT MONTHNAME(date) as month, count(room_id) as data FROM viewed_room WHERE YEAR(date) = YEAR(CURDATE()) GROUP BY MONTHNAME(date);");
header("Content-Type: application/json");
echo json_encode($data);
