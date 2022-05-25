<?php
// require('../resources/php/connections.php');
require('../resources/php/functions.php');

if (isset($_POST['submit'])) {
    registerAcc();
    // header("Location: register.php?register=success");
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
                    <p>Register Account</p>
                </div>
                <form action="<?= base_url(); ?>/resources/php/auth/prosesRegister.php" method="POST" id="form-regis">
                    <!-- email, password, confirm password, nama depan belakang -->
                    <div class="">
                        <label class="block text-grey-darker text-sm font-bold mb-2" for="firstName">
                            First Name
                        </label>
                        <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="firstName" type="text" name="firstName" placeholder="First Name" required />
                    </div>
                    <div class="">
                        <label class="block text-grey-darker text-sm font-bold mb-2" for="lastName">
                            Last Name
                        </label>
                        <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="lastName" type="text" name="lastName" placeholder="Last Name" required />
                    </div>
                    <div class="mb-4">
                        <label class="block text-grey-darker text-sm font-bold mb-2" for="email">
                            Email
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="email" type="email" name="email" placeholder="Email" required />
                    </div>
                    <div class="">
                        <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
                            Password
                        </label>
                        <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" type="password" name="password" placeholder="******" required />
                    </div>
                    <div class="">
                        <label class="block text-grey-darker text-sm font-bold mb-2" for="confirmPassword">
                            Confirm Password
                        </label>
                        <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="confirmPassword" type="password" name="confirmPassword" placeholder="******" required />
                    </div>
                    <div class="flex items-center justify-between">
                        <button class="text-white bg-color3 font-bold py-2 px-4 rounded" type="submit" name="submit">
                            Sign Up
                        </button>
                        <!-- <a
                                class="inline-block align-baseline font-bold text-sm text-blue hover:text-blue-darker"
                                href="#"
                            >
                                Forgot Password?
                            </a> -->
                    </div>
                </form>
                <p class="text-thin text-center mt-4">
                    Already have an account?
                    <a href="" class="underline text-color4">Sign in instead</a>
                </p>
            </div>
        </div>
    </section>
    <script src="../public/vendor/jquery/jquery.min.js"></script>
    <script src="../public/vendor/jquery-validate/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#form-regis").validate({
                onkeyup: true,
                rules: {
                    firstName: {
                        required: true,
                        minlength: 3,
                        maxlength: 32,
                    },
                    lastName: {
                        required: true,
                        minlength: 3,
                        maxlength: 32,
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 3,
                        maxlength: 32,
                    },
                    confirmPassword: {
                        required: true,
                        equalTo: "#password",
                        minlength: 3,
                        maxlength: 32,
                    }
                }
            });
        });
    </script>
</body>

</html>