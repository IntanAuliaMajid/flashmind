<?php
// PATH INCLUDE HARUS DARI ROOT FOLDER
include "config/koneksi.php";
include "model/registerModel.php";


$sekolah = getAllSchool();
function index(){
    global $sekolah;
    include "view/register.php";
}

function store(){
    global $conn, $sekolah;
    
    $username = $_POST['username'] ?? '';
    $nama = $_POST['nama'] ?? '';
    $password = $_POST['password'] ?? '';
    $password2 = $_POST['password2'] ?? '';
    $sekolah_id = $_POST['sekolah_id'] ?? '';

    // Validasi username (tidak boleh kosong, minimal 3 karakter)
    if (empty($username)) {
        $error = "Username tidak boleh kosong!";
        include "view/register.php";
        exit;
    }
    if (strlen($username) < 3) {
        $error = "Username minimal 3 karakter!";
        include "view/register.php";
        exit;
    }
    if (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
        $error = "Username hanya boleh mengandung huruf, angka, dan underscore!";
        include "view/register.php";
        exit;
    }

    // Validasi nama
    if (empty($nama)) {
        $error = "Nama tidak boleh kosong!";
        include "view/register.php";
        exit;
    }
    if (strlen($nama) < 3) {
        $error = "Nama minimal 3 karakter!";
        include "view/register.php";
        exit;
    }

    // Validasi password
    if (empty($password)) {
        $error = "Password tidak boleh kosong!";
        include "view/register.php";
        exit;
    }
    if (strlen($password) < 6) {
        $error = "Password minimal 6 karakter!";
        include "view/register.php";
        exit;
    }

    // Validasi konfirmasi password
    if ($password !== $password2) {
        $error = "Konfirmasi password tidak cocok!";
        include "view/register.php";
        exit;
    }

    // Validasi sekolah dipilih
    if (empty($sekolah_id)) {
        $error = "Sekolah harus dipilih!";
        include "view/register.php";
        exit;
    }

    // Cek username
    if (isUsernameExists($username)) {
        $error = "Username sudah digunakan!";
        include "view/register.php";
        exit;
    }
    
    register($username, $nama, $password, $sekolah_id);
    
    echo "<script>alert('Pendaftaran Siswa berhasil! Silakan login.'); window.location='?action=login';</script>";
    exit;
}