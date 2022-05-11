<?php
session_start();
include '../resources/php/connections.php';
$conn = connectMySQL();
if (isset($_COOKIE['remember_token'])) {
    $row = $conn->prepare("select * from user_token where token = :token");
    $row->bindParam(':token', $_COOKIE['remember_token']);
    $row->execute();
    $user_id = $row->fetch(PDO::FETCH_ASSOC)['user_id'];
    $user = $conn->prepare("select * from users where id = :id");
    $user->bindParam(':id', $user_id);
    $user->execute();
    $user = $user->fetch(PDO::FETCH_ASSOC);
    $_SESSION['Session_email'] = $user['email'];
    $_SESSION['Session_firstName'] = $user['first_name'];
    $_SESSION['Session_lastName'] = $user['last_name'];
    $_SESSION['Session_status'] = "Active";
    header("location:../../pages/index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>UPI Dimensional Drift</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" />
    <link rel="stylesheet" href="/public/css/app.css" />
    <link rel="icon" type="image/png" href="/public/images/logo/logo.png" />
</head>

<body>
    <section id="login">
        <div class="flex items-center w-screen h-screen justify-center bg-[url('/public/images/login/background.png')] bg-cover">
            <div class="bg-white shadow-md rounded-xl px-8 pt-6 pb-8 mb-4 flex flex-col w-[500px]">
                <div class="flex items-center flex-col gap-4">
                    <img src="/public/images/logo/logo.png" alt="logo" />
                    <h1 class="text-xl font-semibold">
                        Welcome To UPI Dimensional Drift
                    </h1>
                </div>
                <?php
                if (!isset($_SESSION['Session_flash'])) {
                    echo "<p class='m-1 text-center p-1'>Please Login To Continue</p>";
                } else {
                    $flash_session = $_SESSION['Session_flash'];
                    unset($_SESSION['Session_flash']);
                    echo "<div class='m-4 rounded-md border-2 border-red-300 bg-red-400/70 p-1 text-center font-medium text-white'>" . $flash_session . "</div>";
                }
                ?>
                <form action="../resources/php/proses_login.php" id="formLogin" method="POST">
                    <div class="mb-4">
                        <label class="block text-grey-darker text-sm font-bold mb-2" for="email">
                            E-Mail
                        </label>
                        <input name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="email" type="text" placeholder="E-mail" />
                    </div>
                    <div class="mb-6">
                        <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
                            Password
                        </label>
                        <input name="password" class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" type="password" placeholder="******" />
                    </div>
                    <div class="flex items-center justify-between">
                        <button class="text-white bg-color3 font-bold py-2 px-4 rounded" type="submit">
                            Sign In
                        </button>
                        <!-- <a
                                class="inline-block align-baseline font-bold text-sm text-blue hover:text-blue-darker"
                                href="#"
                            >
                                Forgot Password?
                            </a> -->
                        <label for="remember-me">
                            <input type="checkbox" class="form-checkbox rounded text-color3 transition-all duration-100" name="remember-me" value="1" id="remember-me" />
                            <span>Remember me</span>
                        </label>
                    </div>
                </form>
                <p class="text-thin text-center mt-4">
                    Don't have an account?
                    <a href="register.php" class="underline text-color4">Sign-up Now</a>
                </p>
            </div>
        </div>
    </section>
</body>

</html>
<script src="../public/vendor/jquery/jquery.min.js"></script>
<script src="../public/vendor/jquery-validate/jquery.validate.min.js"></script>
<script>
    $(document).ready(function() {
        $("#formLogin").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                },
            }
        });
    });
</script>