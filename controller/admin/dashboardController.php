<?php
// Path disesuaikan: Keluar dari folder 'admin' (../../)
include "config/koneksi.php"; 
include "model/admin/siswaModel.php"; // Diperlukan untuk getTotalSiswa
include "model/admin/sekolahModel.php"; // Diperlukan untuk getTotalSekolah

// --- Fungsi Model Tambahan Khusus Dashboard ---

function getTotalQuiz() {
    global $conn;
    $query = mysqli_query($conn, "SELECT COUNT(*) as total FROM quiz");
    $result = mysqli_fetch_assoc($query);
    return $result['total'];
}

function getTopPeringkat($limit = 5) {
    global $conn;
    // Mengambil 5 siswa dengan skor tertinggi dari hasil_quiz (diurutkan berdasarkan skor akhir)
    $query = "SELECT s.nama, sh.nama_sekolah, hq.skor_akhir
              FROM hasil_quiz hq
              JOIN siswa s ON hq.siswa_id = s.id_siswa
              JOIN sekolah sh ON s.sekolah_id = sh.id_sekolah
              ORDER BY hq.skor_akhir DESC
              LIMIT $limit";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getAktivitasQuizTerakhir($limit = 5) {
    global $conn;
    // Mengambil 5 quiz yang waktu pelaksanaannya paling dekat/terakhir
    $query = "SELECT nama_quiz, durasi, waktu_pelaksanaan 
              FROM quiz 
              ORDER BY waktu_pelaksanaan DESC 
              LIMIT $limit";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}


function index() {
    // 1. Ambil Data Statistik
    $totalSiswa = getTotalSiswa();
    $totalSekolah = getTotalSekolah();
    $totalQuiz = getTotalQuiz();
    
    // 2. Ambil Data Peringkat dan Aktivitas
    $topPeringkat = getTopPeringkat(5);
    $aktivitasTerakhir = getAktivitasQuizTerakhir(5);

    // Render View
    include 'view/admin/dashboard.php';
}