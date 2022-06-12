<!-- content here -->
<?php
include_once '../template/header.php';
$results = query("SELECT * FROM users");
?>

<script>
    let id = 'user';
    $("#" + id).addClass("bg-gray-100")
    $(`#${id} i`).removeClass("text-gray-400")
    $(`#${id} i`).addClass("text-color3")
    $(`#${id} span`).removeClass("text-gray-400")
    $(`#${id} span`).addClass("text-color3")

    function toggleModal() {
        $('#formUser').toggle();
        $('#overlay').toggle();
    }
</script>

<h1 class="text-gray-800 text-2xl font-black capitalize after:content-[''] after:block after:w-10 after:h-1 after:bg-gray-800 after:rounded-full mb-4">
    User
</h1>
<button onclick="toggleModal()" class="btn btn-sm">+ Add User</button>
<div id="overlay" class="fixed top-0 bottom-0 left-0 right-0 z-50 hidden w-full h-full backdrop-sepia-0 bg-black/70"></div>

<form id="formUser" action="<?= base_url() ?>/resources/php/user/store.php" method="POST" class="absolute top-0 left-0 right-0 z-50 hidden w-4/5 mt-5 ml-auto mr-auto bg-white rounded-2xl md:w-3/4 drop-shadow-2xl ">
    <div id="formHeader" class="flex items-center justify-between px-5 py-5 bg-blue-500 rounded-t-2xl">
        <h3 class="font-bold text-white">Add New User</h3>
        <span class="text-white hover:cursor-pointer" onclick="toggleModal()">x</span>
    </div>
    <div id="formContainer" class="p-5 ">
        <div class="form-control">
            <label class="label" for="first_name">First Name</label>
            <input class="input" type="text" name="first_name" id="first_name" placeholder="Jack">
        </div>
        <div class="form-control">
            <label class="label" for="last_name">Last Name</label>
            <input class="input" type="text" name="last_name" id="last_name" placeholder="Snowden">
        </div>
        <div class="form-control">
            <label class="label" for="email">Email</label>
            <input class="input" type="text" name="email" id="email" placeholder="jackexample@gmail.com">
        </div>
        <div class="form-control">
            <label class="label" for="level">Level</label>
            <select name="level" id="level" class="input">
                <option disabled>-- Choose level --</option>
                <option value="admin">Admin</option>
                <option value="user">user</option>
            </select>
        </div>
        <div class="form-control">
            <label class="label" for="password">Password</label>
            <input class="input" type="password" name="password" id="password" placeholder="******">
        </div>
        <div class="form-control">
            <label class="label" for="confirmPassword">Confirm Password</label>
            <input class="input" type="password" name="confirmPassword" id="confirmPassword" placeholder="******">
        </div>
        <button class="mt-5 btn btn-sm" type="submit">Submit</button>
    </div>
</form>
<script>
    $(document).ready(function() {
        $("#formUser").validate({
            rules: {
                onkeyup: true,
                first_name: {
                    required: true,
                    minlength: 3,
                    maxlength: 32,
                },
                last_name: {
                    required: true,
                    minlength: 3,
                    maxlength: 32,
                },
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 8,
                    maxlength: 32,
                },
                confirmPassword: {
                    required: true,
                    minlength: 8,
                    maxlength: 32,
                    equalTo: "#password",
                },
            }
        });
    });
</script>

<div class="overflow-x-auto table-wrapper">
    <div class="inline-block min-w-full py-2">
        <div class="overflow-hidden rounded-lg">
            <table class="min-w-full">
                <thead class="thead">
                    <tr>
                        <th scope="col" class="th">No</th>
                        <th scope="col" class="th">Email</th>
                        <th scope="col" class="th">First Name</th>
                        <th scope="col" class="th">Last Name</th>
                        <th scope="col" class="th">Level</th>
                        <th scope="col" class="th">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($results as $result) :
                        $id = $result['id'];
                        $email = $result['email'];
                        $first_name = $result['first_name'];
                        $last_name = $result['last_name'];
                        $level = $result['level'];
                    ?>
                        <tr class="bg-white border-b">
                            <td class="font-medium text-gray-900 td"><?= $no++ ?></td>
                            <td class="td"><?= $email ?></td>
                            <td class="td"><?= $first_name ?></td>
                            <td class="td"><?= $last_name ?></td>
                            <td class="capitalize td"><?= $level ?></td>
                            <td class="flex space-x-2 td">
                                <a href="<?= base_url() ?>/views/user/update.php?id=<?= $id ?>" name="editUser" class="btn btn-sm">Edit</a>
                                <a href="<?= base_url() ?>/resources/php/user/delete.php?id=<?= $id ?>" name="deleteUser" class="btn btn-sm btn-outline" onClick="return confirm('Are You Sure Want to Delete this User?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include_once '../template/footer.php'; ?>