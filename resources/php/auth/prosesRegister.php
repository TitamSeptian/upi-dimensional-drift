<?php
include "../functions.php";
$conn = connectMySQL();

$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['confirmPassword'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
// dd($email, $password, $password2,  $firstName, $lastName);

$sql = 'INSERT INTO users (email, password, first_name, last_name, level) VALUES (?, ?, ?, ?, ?)';
// dd(htmlentities($email), htmlentities($password), htmlentities($firstName), htmlentities($lastName), htmlentities('user'));
//cek if email is exist
// $stmt = $conn->prepare('SELECT * FROM users WHERE email=?');
// $stmt->execute([$email]);
$user = query('SELECT * FROM users WHERE email=?', [$email]);
// dd($user);
if ($user) {
    // email found
    echo "<script>
                alert('Email already registered! Try new one')
                window.location.href = '../../../views/register.php';
        </script>";
} else {

    // cek password confirm
    if ($password !== $password2) {
        echo "<script>
                    alert('Password Confirmation not match!');
                    window.location.href = '../../../views/register.php';
                </script>";
    } else {
        $password = passwordHash($password); // HASING PASSWORD
        $pdo = connectMySQL();
        try {
            $registeredUser = insert('users', [
                'email' => $email,
                'password' => $password,
                'first_name' => $firstName,
                'last_name' => $lastName,
                'level' => 'user',
            ], true);
            if ($registeredUser) {
                $_SESSION['user_id'] = $registeredUser;
                $_SESSION['Session_email'] = $email;
                $_SESSION['Session_firstName'] = $firstName;
                $_SESSION['Session_lastName'] = $password;
                $_SESSION['Session_status'] = "Active";
                $_SESSION['level'] = 'user';
                echo "<script>
                        alert('Registration Successful!');
                        window.location.href = '../../../views/dashboard/dashboard.php';
                    </script>";
            } else {
                echo "<script>
                        alert('Registration Failed!');
                        window.location.href = '../../../views/register.php';
                    </script>";
            }
        } catch (PDOException $e) {
            echo "<script>
                    alert('Registration Failed!');
                    window.location.href = '../../../views/register.php';
                </script>";
        }
        // try {
        //     // dd($email, $password, $firstName, $lastName, 'user');
        //     $conn->beginTransaction();
        //     $statement = $conn->prepare($sql);
        //     $statement->execute([$email, $password, htmlspecialchars($firstName), htmlspecialchars($lastName), 'user']);
        //     $id = $conn->lastInsertId('id');
        //     $result = $statement->fetch(PDO::FETCH_ASSOC);
        //     $conn->commit();
        //     $_SESSION['user_id'] = $id;
        //     $_SESSION['Session_email'] = $email;
        //     $_SESSION['Session_firstName'] = $firstName;
        //     $_SESSION['Session_lastName'] = $password;
        //     $_SESSION['Session_status'] = "Active";
        //     $_SESSION['level'] = 'user';
        //     echo "<script>
        //             alert('Registration Successful!');
        //             window.location.href = '../../../views/dashboard/dashboard.php';
        //         </script>";
        // } catch (PDOException $e) {
        //     $conn->rollBack();
        //     echo "<script>
        //             alert('Registration Failed!');
        //             window.location.href = '../../../views/register.php';
        //         </script>";
        //     print "Error!: " . $e->getMessage() . "</br>";
        // }
    }
}
