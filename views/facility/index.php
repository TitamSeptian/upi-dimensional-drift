<!-- content here -->
<?php include_once '../template/header.php'; ?>
<?php
    if(isset($_GET['id']) && isset($_POST['facility'])) 
    {
        update('facilities', [
            'facility' => $_POST['facility'],
            'icon' => $_POST['icon'],
        ], 'id', $_GET['id']);
        redirectTo('Update Success', '/views/dashboard/index.php');
    }
    elseif(isset($_GET['id'])) 
    {
        if ($_GET['action'] == 'delete') {
            delete('facilities', 'id', $_GET['id']);
            redirectTo('Delete Success', '/views/dashboard/index.php');
        }
        elseif ($_GET['action'] == 'edit') 
        {
            $conn = connectMySQL();
            $row = $conn->prepare("select * from facilities where id = :id");
            $row->bindParam(':id', $_GET['id']);
            $row->execute();
            $row = $row->fetch(PDO::FETCH_ASSOC);
            
            $facility = $row['facility'];
            $icon = $row['icon'];
        }
    }
    elseif(isset($_POST['facility'])) 
    {
        insert('facilities', [
            'facility' => $_POST['facility'],
            'icon' => $_POST['icon'],
        ]);
        redirectTo('Add New Record Success', '/views/dashboard/index.php');
    }
?>
<h1 class="text-xl font-bold">Welcome to Dashboard !!</h1>
<form action="" method="post" class="py-4">
    <div class="form-control py-2">
        <label class="label" for="facility">Facility</label>
        <input class="input" type="text" name="facility" id="facility" value="<?= isset($facility) ? $facility : ""?>" required>
        <span class="invalid">* Facility required</span>
    </div>
    <div class="form-control py-2">
        <label class="label" for="icon">Icon</label>
        <input class="input" type="text" name="icon" id="icon" value="<?= isset($icon) ? htmlentities($icon) : ""?>" required>
        <span class="invalid">* Icon Required</span>
    </div>
    <button class="btn btn-sm" type="submit">
        <?php
            if (isset($facility)) {
                echo 'Update';
            }else{
                echo 'Submit';
            }
        ?>    
    </button>
</form>
<div class="overflow-x-auto table-wrapper">
    <div class="inline-block py-2 min-w-full">
        <div class="overflow-hidden rounded-lg">
            <table class="min-w-full">
                <thead class="thead">
                    <tr>
                        <th scope="col" class="th">Facility</th>
                        <th scope="col" class="th">Icon</th>
                        <th scope="col" class="th">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "select * from facilities";
                        $result = query($sql);
                        foreach ($result as $key => $value) {
                    ?>
                        <tr class="bg-white border-b">
                            <td class="td"><?= $value['facility'] ?></td>
                            <td class="td font-medium text-gray-900"><?= $value['icon'] ?></td>
                            <td class="td flex space-x-2">
                                <a href="<?php base_url() ?>/views/dashboard/index.php?action=edit&id=<?= $value['id'] ?>" class="btn btn-sm">Edit</a>
                                <a href="<?php base_url() ?>/views/dashboard/index.php?action=delete&id=<?= $value['id'] ?>" class="btn btn-sm btn-outline">Delete</a>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include_once '../template/footer.php'; ?>