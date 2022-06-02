<!-- content here -->
<?php include_once '../template/header.php'; ?>

<?php
    $id = $_GET['id'];
    $userData =  query("SELECT * FROM users WHERE id = $id");  
    
    foreach($userData as $user){
        $id = $user['id'];
        $first_name = $user['first_name'];
        $last_name = $user['last_name'];
        $email = $user['email'];
    }
?>

<form id="formUser" action="<?= base_url()?>/resources/php/user/update.php" method="POST" class=" border rounded-t-2xl">
    <div id="formHeader" class="flex items-center justify-between py-5 px-5 bg-blue-500 rounded-t-2xl">
        <h3 class="font-bold  text-white">Edit User Data</h3>
    </div>
    <div id="formContainer" class="p-5 ">
        <div class="form-control">
            <label class="label" for="id">ID</label>
            <input class="input bg-slate-300 hover:cursor-not-allowed" type="text" name="id" id="id" value=<?=$id?> readonly>
        </div>
        <div class="form-control">
            <label class="label" for="first_name">First Name</label>
            <input class="input" type="text" name="first_name" id="first_name" value=<?=$first_name?> required>
        </div>
        <div class="form-control">
            <label class="label" for="last_name">Last Name</label>
            <input class="input" type="text" name="last_name" id="last_name" value=<?=$last_name?> required>
        </div>
        <div class="form-control">
            <label class="label" for="email">Email</label>
            <input class="input" type="text" name="email" id="email" value=<?=$email?> required>
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
        <a href="<?=base_url()?>/views/user/index.php" name="cancelEdit" class="btn btn-sm btn-outline">Cancel</a>
    </div>
</form>

<?php include_once '../template/footer.php'; ?>