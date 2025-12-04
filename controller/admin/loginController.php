<?php
include "config/koneksi.php";
include "model/loginModel.php";

function index(){
    include "view/loginAdmin.php";
}

function login() {
    // ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cekLogin = cekLogin($username, $password);

    if ($cekLogin > 0) {
        // berhasil login
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['logged_in'] = true;
        header("Location: ?action=homeAdmin");
        exit;
    } else {
        // gagal login
        echo "<script>alert('Username atau Password salah!'); window.location='?action=login';</script>";
    }
}