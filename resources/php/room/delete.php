<?php
session_start();
$sessionId = $_SESSION['user_id'];
include_once '../functions.php';

$id = $_GET['id'] ?? '';
if ($id == '') {
    redirectTo('Room Not Found', '/views/room/index.php');
}
$room = query("SELECT * FROM rooms WHERE id = $id")[0];
delete('room_details', 'room_id', $id);
delete('viewed_room', 'room_id', $id);
unlink('../../../public/360thumbnail/' . $room['thumbnail']);
unlink('../../../public/360images/' . $room['panorama_image']);
delete('rooms', 'id', $id);

// trigger delete
insert('user_log',[
    'user_id' => $sessionId,
    'activity_text' => "User Menghapus Data Room",
    'created_at' => date('Y-m-d H:i:s'),
]);

redirectTo('Room Deleted', '/views/room/index.php');
