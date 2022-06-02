<!-- content here -->
<?php include_once '../template/header.php'; ?>
<?php
    $results = query("SELECT * FROM users");
?>

<script>
    function toggleModal() {
        $('#formUser').toggle();
        $('#overlay').toggle();
    }
</script>

<h1 class="text-gray-800 text-2xl font-black capitalize after:content-[''] after:block after:w-10 after:h-1 after:bg-gray-800 after:rounded-full mb-4">
    User
</h1>
<button onclick="toggleModal()" class="btn btn-sm">+ Add User</button>
<div id="overlay" class="fixed w-full h-full top-0 left-0 right-0 bottom-0 backdrop-sepia-0 bg-black/70 z-50 hidden"></div>

<form id="formUser" action="<?= base_url()?>/resources/php/user/store.php" method="POST" class="mt-5  rounded-2xl absolute left-0 right-0 ml-auto mr-auto  w-4/5 md:w-3/4 bg-white hidden top-0 drop-shadow-2xl z-50 ">
    <div id="formHeader" class="flex items-center justify-between py-5 px-5 bg-blue-500 rounded-t-2xl">
        <h3 class="font-bold  text-white">Add New User</h3>
        <span class="hover:cursor-pointer text-white" onclick="toggleModal()">x</span>
    </div>
    <div id="formContainer" class="p-5 ">
        <div class="form-control">
            <label class="label" for="first_name">First Name</label>
            <input class="input" type="text" name="first_name" id="first_name" placeholder="Jack" required>
        </div>
        <div class="form-control">
            <label class="label" for="last_name">Last Name</label>
            <input class="input" type="text" name="last_name" id="last_name" placeholder="Snowden" required>
        </div>
        <div class="form-control">
            <label class="label" for="email">Email</label>
            <input class="input" type="text" name="email" id="email" placeholder="jackexample@gmail.com" required>
        </div>
        <div class="form-control">
            <label class="label" for="password">Password</label>
            <input class="input" type="password" name="password"  id="password" placeholder="******" required>
        </div>
        <div class="form-control">
            <label class="label" for="confirmPassword">Confirm Password</label>
            <input class="input" type="password" name="confirmPassword" id="confirmPassword" placeholder="******" required>
        </div>
        <button class="btn btn-sm mt-5" type="submit">Submit</button>
    </div>
</form>

<div class="overflow-x-auto table-wrapper">
    <div class="inline-block py-2 min-w-full">
        <div class="overflow-hidden rounded-lg">
            <table class="min-w-full">
                <thead class="thead">
                    <tr>
                        <th scope="col" class="th">ID</th>
                        <th scope="col" class="th">Email</th>
                        <th scope="col" class="th">Password</th>
                        <th scope="col" class="th">First Name</th>
                        <th scope="col" class="th">Last Name</th>
                        <th scope="col" class="th">Level</th>
                        <th scope="col" class="th">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($results as $result):
                            $id = $result['id'];
                            $email = $result['email'];
                            $password = $result['password'];
                            $first_name = $result['first_name'];
                            $last_name = $result['last_name'];
                            $level = $result['level'];
                    ?>
                    <tr class="bg-white border-b">
                        <td class="td font-medium text-gray-900"><?=$id?></td>
                        <td class="td"><?=$email?></td>
                        <td class="td"><?=$password?></td>
                        <td class="td"><?=$first_name?></td>
                        <td class="td"><?=$last_name?></td>
                        <td class="td capitalize"><?=$level?></td>
                        <td class="td flex space-x-2">
                            <a href="<?=base_url()?>/views/user/update.php?id=<?=$id?>" name="editUser" class="btn btn-sm">Edit</a>
                            <a href="<?=base_url()?>/resources/php/user/delete.php?id=<?=$id?>" name="deleteUser" class="btn btn-sm btn-outline" onClick="return confirm('Are You Sure Want to Delete this User?')">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include_once '../template/footer.php'; ?>