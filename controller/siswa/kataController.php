<?php
session_start();

include "config/koneksi.php";
include "model/siswa/kelompokKataModel.php";
include "model/siswa/kataModel.php";

$id = isset($_SESSION['id_siswa']) ? $_SESSION['id_siswa'] : null;

function daftar(){
    global $id;

    $idKelompok = isset($_GET['id']) ? intval($_GET['id']) : null;
    if(!$idKelompok){
        header("Location: index.php?action=kelompokKata");
        exit;
    }

    // Verify ownership
    $kelompok = getKelompokById($idKelompok);
    if(!$kelompok || $kelompok['user_id'] != $id){
        header("Location: index.php?action=kelompokKata");
        exit;
    }

    $kata = getKataByKelompok($idKelompok);

    include "view/siswa/daftarKata.php";
}

function tambah(){
    global $id;

    $idKelompok = isset($_GET['id']) ? intval($_GET['id']) : null;
    if(!$idKelompok){
        header("Location: index.php?action=kelompokKata");
        exit;
    }

    // Verify ownership
    $kelompok = getKelompokById($idKelompok);
    if(!$kelompok || $kelompok['user_id'] != $id){
        header("Location: index.php?action=kelompokKata");
        exit;
    }

    // If form submitted, process insertion
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $kata = isset($_POST['kata']) ? trim($_POST['kata']) : '';
        $arti = isset($_POST['arti']) ? trim($_POST['arti']) : '';
        $contoh = isset($_POST['contoh']) ? trim($_POST['contoh']) : '';

        if($kata !== '' && $arti !== ''){
            $inserted = insertKata($idKelompok, $kata, $arti, $contoh);
        }

        header("Location: index.php?action=kata&method=daftar&id=$idKelompok");
        exit;
    }

    include "view/siswa/createKata.php";
}

function edit(){
    global $id;

    $idKata = isset($_GET['id']) ? intval($_GET['id']) : null;
    if(!$idKata){
        header("Location: index.php?action=kelompokKata");
        exit;
    }

    $kataData = getKataById($idKata);
    if(!$kataData){
        header("Location: index.php?action=kelompokKata");
        exit;
    }

    // Verify ownership
    $kelompok = getKelompokById($kataData['kelompok_id']);
    if(!$kelompok || $kelompok['user_id'] != $id){
        header("Location: index.php?action=kelompokKata");
        exit;
    }

    // If form submitted, process update
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $kata = isset($_POST['kata']) ? trim($_POST['kata']) : '';
        $arti = isset($_POST['arti']) ? trim($_POST['arti']) : '';
        $contoh = isset($_POST['contoh']) ? trim($_POST['contoh']) : '';

        if($kata !== '' && $arti !== ''){
            $updated = editKata($idKata, $kata, $arti, $contoh);
        }

        header("Location: index.php?action=kata&method=daftar&id=" . $kataData['kelompok_id']);
        exit;
    }

    $idKelompok = $kataData['kelompok_id'];
    include "view/siswa/editKata.php";
}

function delete(){
    global $id;

    $idKata = isset($_GET['id']) ? intval($_GET['id']) : null;
    if(!$idKata){
        header("Location: index.php?action=kelompokKata");
        exit;
    }

    $kataData = getKataById($idKata);
    if(!$kataData){
        header("Location: index.php?action=kelompokKata");
        exit;
    }

    // Verify ownership
    $kelompok = getKelompokById($kataData['kelompok_id']);
    if(!$kelompok || $kelompok['user_id'] != $id){
        header("Location: index.php?action=kelompokKata");
        exit;
    }

    $idKelompok = $kataData['kelompok_id'];

    // Delete the kata
    $deleted = deleteKata($idKata);

    // Redirect back to list
    header("Location: index.php?action=kata&method=daftar&id=$idKelompok");
    exit;
}
