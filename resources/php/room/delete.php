<?php
include_once '../functions.php';

$id = $_GET['id'] ?? '';
if ($id == '') {
    redirectTo('Room Not Found', '/views/room/index.php');
}
delete('rooms', 'id', $id);
delete('room_details', 'room_id', $id);
delete('viewed_room', 'room_id', $id);
