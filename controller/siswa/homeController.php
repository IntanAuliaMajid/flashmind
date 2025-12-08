<?php
session_start();
// Path disesuaikan: Menghilangkan ../../ dan menggunakan jalur dari root
include "config/koneksi.php"; 
include "model/homeModel.php"; // <--- PATH YANG BENAR

$wod = getWOD();
// Cek Login dan Peran
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || $_SESSION['role'] !== 'siswa') {
    header("Location: ?action=login");
    exit;
}


$wod = getWOD(); // Fungsi ini sekarang dapat ditemukan karena file model di-include.

function index(){
    global $wod;
    
    // Ambil ID Siswa dari sesi
    $siswaId = $_SESSION['id_siswa'] ?? 1; 

    // Ambil Kelompok Kata Siswa
    $kelompokKata = getKelompokKataBySiswaId($siswaId);
    
    // Render view
    include "view/siswa/home.php";
}

