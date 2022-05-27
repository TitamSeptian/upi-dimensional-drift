<!-- content here -->
<?php include_once '../template/header.php'; ?>
<h1 class="text-xl font-bold">Welcome to Dashboard !!</h1>
<form action="">

    <div class="form-control">
        <label class="label" for="name">Name</label>
        <input class="input" type="text" name="name" id="name" required>
        <span class="invalid">* nama harus di isi</span>
    </div>
    <button class="btn btn-sm" type="submit">Submit</button>
</form>
<div class="overflow-x-auto table-wrapper">
    <div class="inline-block py-2 min-w-full">
        <div class="overflow-hidden rounded-lg">
            <table class="min-w-full">
                <thead class="thead">
                    <tr>
                        <th scope="col" class="th">Avatar</th>
                        <th scope="col" class="th">Name</th>
                        <th scope="col" class="th">Email</th>
                        <th scope="col" class="th">Email Verified</th>
                        <th scope="col" class="th">Phone Number</th>
                        <th scope="col" class="th">Role</th>
                        <th scope="col" class="th">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b">
                        <td class="td">
                            <img src="https://hollux.herokuapp.com/storage/img/avatar/a.png" class="w-10 h-10 object-cover rounded-tr-xl rounded-bl-xl" alt="Apri">
                        </td>
                        <td class="td font-medium text-gray-900">Apri</td>
                        <td class="td">apriansyahrizs@gmail.com</td>
                        <td class="td">2022-04-28 06:46:53</td>
                        <td class="td">0895636786435</td>
                        <td class="td capitalize">user</td>
                        <td class="td flex space-x-2">
                            <a class="btn btn-sm">Edit</a>
                            <a class="btn btn-sm btn-outline">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include_once '../template/footer.php'; ?>