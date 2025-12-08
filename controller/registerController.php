<?php
// PATH INCLUDE HARUS DARI ROOT FOLDER
include "config/koneksi.php";
include "model/admin/siswaModel.php"; // Digunakan untuk storeSiswaModel

// --- Fungsi Tambahan: Cek Keberadaan User ---
function isUsernameExists($username) {
    global $conn;
    $username = mysqli_real_escape_string($conn, $username);
    // Cek di tabel siswa (Wajib, karena data Siswa disimpan di sini)
    $siswaQuery = mysqli_query($conn, "SELECT username FROM siswa WHERE username = '$username'");
    return mysqli_num_rows($siswaQuery) > 0;
}
// ------------------------------------------

function index(){
    include "view/register.php";
}

function store(){
    global $conn;
    
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $password2 = $_POST['password2'] ?? '';

    if ($password !== $password2) {
        echo "<script>alert('Konfirmasi Password tidak cocok!'); window.location='?action=register';</script>";
        exit;
    }
    
    if (isUsernameExists($username)) {
        echo "<script>alert('Username sudah digunakan!'); window.location='?action=register';</script>";
        exit;
    }
    
    $nama = $username;
    $sekolahId = 1; // Default Sekolah ID 1

    // HANYA SIMPAN KE TABEL SISWA
    // storeSiswaModel($username, $nama, $password, $sekolahId)
    storeSiswaModel($username, $nama, $password, $sekolahId);
    
    echo "<script>alert('Pendaftaran Siswa berhasil! Silakan login.'); window.location='?action=login';</script>";
    exit;
}