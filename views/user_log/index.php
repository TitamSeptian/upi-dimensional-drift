<!-- content here -->
<?php include_once '../template/header.php'; ?>
<?php
    $results = query("SELECT user_log.*, CONCAT (users.first_name, ' ', users.last_name) AS full_name FROM user_log INNER JOIN users ON user_log.user_id = users.id ORDER BY user_log.id ASC");
?>

<h1 class="text-gray-800 text-2xl font-black capitalize after:content-[''] after:block after:w-10 after:h-1 after:bg-gray-800 after:rounded-full mb-4">
    User Log
</h1>

<div class="overflow-x-auto table-wrapper">
    <div class="inline-block py-2 min-w-full">
        <div class="overflow-hidden rounded-lg">
            <table class="min-w-full">
                <thead class="thead">
                    <tr>
                        <th scope="col" class="th">ID</th>
                        <th scope="col" class="th">User ID</th>
                        <th scope="col" class="th">User Name</th>
                        <th scope="col" class="th">Activity Detail</th>
                        <th scope="col" class="th">Time Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($results as $result):
                            $id = $result['id'];
                            $user_id = $result['user_id'];
                            $full_name = $result['full_name'];
                            $activity_detail = $result['activity_text'];
                            $time_detail = $result['created_at'];
                    ?>
                    <tr class="bg-white border-b">
                        <td class="td font-medium text-gray-900"><?=$id?></td>
                        <td class="td"><?=$user_id?></td>
                        <td class="td"><?=$full_name?></td>
                        <td class="td"><?=$activity_detail?></td>
                        <td class="td capitalize"><?=$time_detail?></td>
                        <!-- <td class="td flex space-x-2">
                            <a href="<?=base_url()?>/resources/php/user_log/delete.php?id=<?=$id?>" name="deleteLog" class="btn btn-sm btn-outline" onClick="return confirm('Are You Sure Want to Delete this Log?')">Delete</a>
                        </td> -->
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<a href="<?=base_url()?>/resources/php/user_log/delete.php" name="deleteLog" class="btn btn-sm" onClick="return confirm('Are You Sure Want to Delete This Entire Log?')">Delete Log</a>
<?php include_once '../template/footer.php'; ?>