<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: ?action=login");
    exit;
}

include "config/koneksi.php";
include "model/admin/siswaModel.php";

function index(){
    // Pengaturan paginasi
    $limit = 5; // Jumlah data per halaman
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page - 1) * $limit;
    
    // Ambil data dengan paginasi
    $data = getSiswaWithPagination($limit, $offset);
    
    // Hitung total data dan halaman
    $totalData = getTotalSiswa();
    $totalPages = ceil($totalData / $limit);
    
    // Data untuk view
    $pagination = [
        'currentPage' => $page,
        'totalPages' => $totalPages,
        'totalData' => $totalData,
        'limit' => $limit
    ];
    
    include "view/admin/siswa.php";
}

function edit(){
    $id = $_GET['id'];
    $data = getSiswaById($id);
    $sekolah = getAllSekolah();
    include "view/admin/editSiswa.php";
}

function update(){
    $id = $_POST['id'];
    $username = $_POST['username'];
    $nama = $_POST['namaSiswa'];
    $sekolahId = $_POST['sekolahId'];

    updateSiswaModel($id, $nama, $username, $sekolahId);
    header("Location: ?action=siswaAdmin");
    exit;
}

function delete(){
    $id = $_GET['id'];
    deleteSiswaModel($id);
    header("Location: ?action=siswaAdmin");
    exit;
}

function create(){
    $sekolah = getAllSekolah();
    include "view/admin/createSiswa.php";
}

function store(){
    $username = $_POST['username'];
    $nama = $_POST['namaSiswa'];
    $password = $_POST['password'];
    $sekolahId = $_POST['sekolahId'];

    storeSiswaModel($username, $nama, $password, $sekolahId);
    header("Location: ?action=siswaAdmin");
    exit;
}
