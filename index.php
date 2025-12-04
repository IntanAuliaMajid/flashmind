<?php

// ambil action (controller)
$action = $_GET['action'] ?? 'login';

// ambil method (fungsi dalam controller)
$method = $_GET['method'] ?? 'index';

// daftar route
$routes = [
    'home'            => 'controller/siswa/homeController.php',
    'homeAdmin'       => 'controller/admin/dashboardController.php',
    'siswaAdmin'      => 'controller/admin/siswaController.php',
    'sekolahAdmin'    => 'controller/admin/sekolahController.php',
    'logout'          => 'controller/logoutController.php',
    'login'           => 'controller/siswa/loginController.php',
    'register'        => 'controller/siswa/registerController.php',
    'loginAdmin'      => 'controller/admin/loginController.php',
    'profil'          => 'controller/siswa/profilController.php',
    'logout'          => 'controller/logoutController.php'
];

// cek apakah route ada
if (!array_key_exists($action, $routes)) {
    die("404 - Route '$action' tidak ditemukan.");
}

// include controller
include $routes[$action];

// cek apakah function method ada di controller
if (!function_exists($method)) {
    die("404 - Method '$method' tidak ditemukan di controller '$action'.");
}

// jalankan method
$method();
