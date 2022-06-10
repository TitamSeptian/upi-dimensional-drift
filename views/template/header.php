<?php
include '../../resources/php/functions.php';
session_start();
if (!isset($_SESSION['Session_status'])) {
    redirectTo('Login First', '/views/login.php');
}
if ($_SESSION['Session_status'] !== 'Active') {
    redirectTo('Login Again Please !!', '/views/login.php');
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
    <script src="<?= base_url(); ?>/public/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/public/vendor/jquery-validate/jquery.validate.min.js"></script>
    <script src="<?= base_url(); ?>/public/vendor/jquery-validate/additional-methods.js"></script>
    <script>
        $(document).ready(function() {
            $(window).resize(function() {
                var width = $(window).width();
                if (width > 1023) {
                    $("aside").remove("hidden");
                }
            })
            $("#btn-menu").click(function() {
                $("aside").toggleClass("hidden");
            });
        })
    </script>
    <div class="relative min-h-screen overflow-x-hidden">
        <section class="relative flex max-h-screen min-h-screen overflow-hidden">
            <aside class="lg:w-[400px] w-[300px] max-w-full px-8 overflow-x-hidden overflow-y-auto py-4 mt-14 lg:static absolute inset-y-0 bg-red z-10 bg-white transition-all duration-300">
                <div class="space-y-6">
                    <div class="space-y-2">
                        <span class="px-6 text-sm font-bold tracking-widest uppercase text-color3">
                            dashboard
                        </span>
                        <div class="grid gap-2">
                            <a href="#" class="flex items-center gap-2 px-6 py-4 transition-all duration-300 hover:bg-gray-100 rounded-xl group" id="home">
                                <i class="text-xl text-gray-400 transition-all duration-300 bx bxs-dashboard group-hover:text-color3"></i>
                                <span class="font-semibold text-gray-400 transition-all duration-300 group-hover:text-color3">
                                    Home
                                </span>
                            </a>
                        </div>
                        <div class="grid gap-2 ">
                            <a href="<?= base_url() ?>/views/room/index.php" class="flex items-center gap-2 px-6 py-4 transition-all duration-300 hover:bg-gray-100 rounded-xl group" id="rooms">
                                <i class="text-xl text-gray-400 transition-all duration-300 bx bx-building group-hover:text-color3"></i>
                                <span class="font-semibold text-gray-400 transition-all duration-300 group-hover:text-color3">
                                    Room Tour
                                </span>
                            </a>
                        </div>
                        <div class="grid gap-2">
                            <a href="<?= base_url() ?>/views/gallery/index.php" class="flex items-center gap-2 px-6 py-4 transition-all duration-300 hover:bg-gray-100 rounded-xl group" id="gallery">
                                <i class="text-xl text-gray-400 transition-all duration-300 bx bx-images group-hover:text-color3"></i>
                                <span class="font-semibold text-gray-400 transition-all duration-300 group-hover:text-color3">
                                    Gallery
                                </span>
                            </a>
                        </div>
                        <div class="grid gap-2">
                            <a href="<?= base_url(); ?>/views/facility/index.php" class="flex items-center gap-2 px-6 py-4 transition-all duration-300 hover:bg-gray-100 rounded-xl group" id="facility">
                                <i class="text-xl text-gray-400 transition-all duration-300 bx bx-label group-hover:text-color3"></i>
                                <span class="font-semibold text-gray-400 transition-all duration-300 group-hover:text-color3">
                                    Facilities
                                </span>
                            </a>
                        </div>
                        <?php if ($_SESSION['level'] == 'admin') : ?>
                            <span class="px-6 text-sm font-bold tracking-widest uppercase text-color3">
                                Admin
                            </span>
                            <div class="grid gap-2">
                                <a href="<?= base_url(); ?>/views/user/index.php" class="flex items-center gap-2 px-6 py-4 transition-all duration-300 hover:bg-gray-100 rounded-xl group" id="user">
                                    <i class="text-xl text-gray-400 transition-all duration-300 bx bx-user group-hover:text-color3"></i>
                                    <span class="font-semibold text-gray-400 transition-all duration-300 group-hover:text-color3">
                                        User
                                    </span>
                                </a>
                            </div>
                        <?php endif; ?>
                        <span class="px-6 text-sm font-bold tracking-widest uppercase text-color3">
                            Account
                        </span>
                        <div class="grid gap-2">
                            <a href="<?= base_url() ?>/resources/php/auth/logout.php" class="flex items-center gap-2 px-6 py-4 transition-all duration-300 hover:bg-gray-100 rounded-xl group">
                                <i class="text-xl text-gray-400 transition-all duration-300 bx bx-log-out group-hover:text-color3"></i>
                                <span class="font-semibold text-gray-400 transition-all duration-300 group-hover:text-color3">
                                    Logout
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </aside>
            <main class="w-full px-8 pt-20 pb-4 overflow-y-auto">
                <nav class="fixed inset-x-0 top-0 z-50 py-2 border-b border-gray-100 backdrop-blur-sm bg-white/30">
                    <div class="flex items-center justify-between px-8 bg-transparent lg:px-14">
                        <div class="flex items-center gap-4">
                            <button class="lg:hidden btn btn-icon" id="btn-menu">
                                <i class="bx bx-menu-alt-left"></i>
                            </button>
                            <a href="/">
                                <img src="/public/images/logo/logo.png" class="object-cover w-10 h-10 rounded-xl" alt="Hollux" />
                            </a>
                        </div>
                        <div class="flex items-center gap-2 font-semibold text-gray-400 uppercase bg-transparent text-md">
                            <span>User</span>
                        </div>
                    </div>
                </nav>
                <div class="">