<?php
include_once '../functions.php';
$check_row = query("SELECT COUNT(*) FROM user_log");

if ($check_row[0]['COUNT(*)'] == 0) {
    redirectTo('No Logs to Delete!', '/views/user_log/index.php');
} else {
    $delete_log = query("TRUNCATE TABLE user_log");
    redirectTo('Logs Deleted Successfully!', '/views/user_log/index.php');
}

// Delete Log 1 by 1
// $id = $_GET['id'] ?? '';

// if ($id == '') {
//     redirectTo('Log Not Found!', '/views/user_log/index.php');
// }

// delete('user_log', 'id', $id);
// redirectTo('Log Deleted!', '/views/user_log/index.php');

?>