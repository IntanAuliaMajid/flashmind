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
    'quizAdmin'       => 'controller/admin/quizController.php', 
    'pertanyaanAdmin' => 'controller/admin/pertanyaanController.php', 
    'hasilQuizAdmin'  => 'controller/admin/hasilQuizController.php', 
    'logout'          => 'controller/logoutController.php',
    'login'           => 'controller/loginController.php',
    'register'        => 'controller/registerController.php',
    'profil'          => 'controller/siswa/profilController.php',
    'kelompokKata'    => 'controller/siswa/kelompokKataController.php',
    'kata'            => 'controller/siswa/kataController.php',
    'quiz'            => 'controller/siswa/quizController.php'
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
