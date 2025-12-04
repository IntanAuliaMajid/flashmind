<?php
include "config/koneksi.php";
include "model/siswa/loginModel.php";

function index(){
    include "view/siswa/login.php";
}

function login() {
    // ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cekLogin = cekLogin($username, $password);
    $profil = getProfil($username, $password);
    if ($cekLogin > 0) {
        // berhasil login
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['logged_in'] = true;
        $_SESSION['nama'] = $profil['nama'];
        $_SESSION['avatar'] = $profil['avatar'];
        $_SESSION['id_siswa'] = $profil['id_siswa'];

        header("Location: ?action=home");
        exit;
    } else {
        // gagal login
        echo "<script>alert('Username atau Password salah!'); window.location='?action=login';</script>";
    }
}