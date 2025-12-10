<?php
session_start();

include "config/koneksi.php"; 
include "model/siswa/homeModel.php"; 

// Cek Login dan Peran
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || $_SESSION['role'] !== 'siswa') {
    header("Location: ?action=login");
    exit;
}

$wod = getWOD(); 

$siswaId = $_SESSION['id_siswa'];
$kelompokList = getKelompok($siswaId);

function index(){
    global $wod, $kelompokList;

    // Render view
    include "view/siswa/home.php";
}

