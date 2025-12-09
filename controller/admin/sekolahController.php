<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: ?action=login");
    exit;
}

include "config/koneksi.php";
include "model/admin/sekolahModel.php";

function index(){
    // Pengaturan paginasi
    $limit = 5; // Jumlah data per halaman
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page - 1) * $limit;
    
    // Ambil data dengan paginasi
    $data = getAllSekolahWithPagination($limit, $offset);
    
    // Hitung total data dan halaman
    $totalData = getTotalSekolah();
    $totalPages = ceil($totalData / $limit);
    
    // Data untuk view
    $pagination = [
        'currentPage' => $page,
        'totalPages' => $totalPages,
        'totalData' => $totalData,
        'limit' => $limit
    ];
    
    include "view/admin/sekolah.php";
}

function edit(){
    $id = $_GET['id'];
    $data = getSekolahById($id);
    include "view/admin/editSekolah.php";
}

function update(){
    $id = $_POST['id'];
    $namaSekolah = $_POST['namaSekolah'];

    updateSekolahModel($id, $namaSekolah);
    header("Location: ?action=sekolahAdmin");
    exit;
}

function delete(){
    $id = $_GET['id'];
    deleteSekolahModel($id);
    header("Location: ?action=sekolahAdmin");
    exit;
}

function create(){
    include "view/admin/createSekolah.php";
}

function store(){
    $namaSekolah = $_POST['namaSekolah'];

    storeSekolahModel($namaSekolah);
    header("Location: ?action=sekolahAdmin");
    exit;
}