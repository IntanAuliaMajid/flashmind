<?php
// PATH INCLUDE HARUS DARI ROOT FOLDER
include "config/koneksi.php";
include "model/registerModel.php"; // Digunakan untuk storeSiswaModel

$sekolah = getAllSchool();

function index(){
    global $sekolah;
    include "view/register.php";
}

function store(){
    global $conn;
    
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $password2 = $_POST['password2'] ?? '';
    $nama = $_POST['nama'] ?? '';

    $_SESSION['old_input'] = [
        'username' => $username,
        'nama' => $nama,
        'sekolahId' => $sekolahId
    ];

    if ($password !== $password2) {
        echo "<script>alert('Konfirmasi Password tidak cocok!'); window.location='?action=register';</script>";
        exit;
    }
    if (preg_match("/[^a-zA-Z]+/", $nama)) {
        echo "<script>alert('Nama tidak boleh angka!'); window.
        location='?action=register';</script>";
    }
    
    if (isUsernameExists($username)) {
        echo "<script>alert('Username sudah digunakan!'); window.location='?action=register';</script>";
        exit;
    }

    // HANYA SIMPAN KE TABEL SISWA
    register($username, $nama, $password, $sekolahId);
    
    echo "<script>alert('Pendaftaran Siswa berhasil! Silakan login.'); window.location='?action=login';</script>";
    exit;
}