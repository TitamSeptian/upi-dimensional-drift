<?php
session_start();
include '/resources/php/connections.php';
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
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['Session_email'] = $user['email'];
    $_SESSION['Session_firstName'] = $user['first_name'];
    $_SESSION['Session_lastName'] = $user['last_name'];
    $_SESSION['Session_status'] = "Active";
    $_SESSION['level'] = $user['level'];
    header("location:index.php");
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
                <div class="flex flex-col items-center gap-4">
                    <a href="index.php">
                        <img src="/public/images/logo/logo.png" alt="logo" />
                    </a>
                    <h1 class="text-xl font-semibold">
                        Welcome To UPI Dimensional Drift
                    </h1>
                </div>
                <?php
                if (!isset($_SESSION['Session_flash'])) {
                    echo "<p class='p-1 m-1 text-center'>Please Login To Continue</p>";
                } else {
                    $flash_session = $_SESSION['Session_flash'];
                    unset($_SESSION['Session_flash']);
                    echo "<div class='p-1 m-4 font-medium text-center text-white border-2 border-red-300 rounded-md bg-red-400/70'>" . $flash_session . "</div>";
                }
                ?>
                <form action="../resources/php/auth/prosesLogin.php" id="formLogin" method="POST">
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-grey-darker" for="email">
                            E-Mail
                        </label>
                        <input name="email" class="w-full px-3 py-2 border rounded shadow appearance-none text-grey-darker" id="email" type="text" placeholder="E-mail" />
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-bold text-grey-darker" for="password">
                            Password
                        </label>
                        <input name="password" class="w-full px-3 py-2 mb-3 border rounded shadow appearance-none border-red text-grey-darker" id="password" type="password" placeholder="******" />
                    </div>
                    <div class="flex items-center justify-between">
                        <button class="px-4 py-2 font-bold text-white rounded bg-color3" type="submit">
                            Sign In
                        </button>
                        <!-- <a
                                class="inline-block text-sm font-bold align-baseline text-blue hover:text-blue-darker"
                                href="#"
                            >
                                Forgot Password?
                            </a> -->
                        <label for="remember-me">
                            <input type="checkbox" class="transition-all duration-100 rounded form-checkbox text-color3" name="remember-me" value="1" id="remember-me" />
                            <span>Remember me</span>
                        </label>
                    </div>
                </form>
                <p class="mt-4 text-center text-thin">
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
            onkeyup: true,
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