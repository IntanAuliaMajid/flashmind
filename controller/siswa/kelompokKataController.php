<?php
session_start();

include "config/koneksi.php";
include "model/siswa/kelompokKataModel.php";

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || $_SESSION['role'] !== 'siswa') {
    header("Location: ?action=login");
    exit;
}

$id = isset($_SESSION['id_siswa']) ? $_SESSION['id_siswa'] : null;

function index(){
    global $conn;
    global $id;
    $kelompok = getKelompok($id);

    include "view/siswa/kelompokKata.php";
}

function tambah(){
    global $id;

    // If form submitted, process insertion
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nama = isset($_POST['nama_kelompok']) ? trim($_POST['nama_kelompok']) : [];

        if($nama !== '' && $id !== null){
            $inserted = insertKelompok($id, $nama);
            // You might want to set a flash message here based on $inserted
        }

        header("Location: index.php?action=kelompokKata");
        exit;
    }

    // Otherwise show the create form
    include "view/siswa/createKelompok.php";
}

function edit(){
    global $id;

    $idKelompok = isset($_GET['id']) ? intval($_GET['id']) : null;
    if(!$idKelompok){
        header("Location: index.php?action=kelompokKata");
        exit;
    }

    // If form submitted, process update
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nama = isset($_POST['nama_kelompok']) ? trim($_POST['nama_kelompok']) : '';

        if($nama !== ''){
            $updated = editKelompok($idKelompok, $nama);
            // You might want to set a flash message here based on $updated
        }

        header("Location: index.php?action=kelompokKata");
        exit;
    }

    // Load kelompok data for editing
    $kelompok = getKelompokById($idKelompok);
    if(!$kelompok){
        header("Location: index.php?action=kelompokKata");
        exit;
    }

    include "view/siswa/editKelompok.php";
}

function delete(){
    $idKelompok = isset($_GET['id']) ? intval($_GET['id']) : null;
    if(!$idKelompok){
        header("Location: index.php?action=kelompokKata");
        exit;
    }

    // Delete the kelompok
    $deleted = deleteKelompok($idKelompok);

    // Redirect back to list
    header("Location: index.php?action=kelompokKata");
    exit;
}