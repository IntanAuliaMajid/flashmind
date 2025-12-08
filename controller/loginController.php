<?php
session_start(); 
// Path disesuaikan (include dari root controller)
include "config/koneksi.php"; 
include "model/loginModel.php";

function index(){
    include "view/login.php";
}

function login() {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // 1. Cek sebagai Admin
    $dataAdmin = cekLoginAdmin($username, $password);

    if ($dataAdmin) {
        // BERHASIL LOGIN SEBAGAI ADMIN
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $dataAdmin['username'];
        $_SESSION['role'] = 'admin'; // Menentukan Peran
        $_SESSION['id_admin'] = $dataAdmin['id_admin']; 
        

        
        header("Location: ?action=homeAdmin"); // Redirect ke Dashboard Admin
        exit;
    }

    // 2. Jika bukan Admin, cek sebagai Siswa
    $dataSiswa = cekLoginSiswa($username, $password);

    if ($dataSiswa) {
        // BERHASIL LOGIN SEBAGAI SISWA
        $_SESSION['logged_in'] = true;
        $_SESSION['nama'] = $dataSiswa['nama'];
        $_SESSION['username'] = $dataSiswa['username'];
        $_SESSION['sekolah'] = $dataSiswa['sekolah'];
        $_SESSION['role'] = 'siswa'; // Menentukan Peran
        $_SESSION['id_siswa'] = $dataSiswa['id_siswa']; // PENTING untuk Quiz dan Home Siswa
        $_SESSION['avatar'] = $dataSiswa['avatar']; // Foto Profil Siswa

        header("Location: ?action=home"); // Redirect ke Home Siswa
        exit;
    } 
    
    // 3. Gagal Login
    else {
        echo "<script>alert('Username atau Password salah!'); window.location='?action=login';</script>";
    }
}