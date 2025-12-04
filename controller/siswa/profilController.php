<?php
include "config/koneksi.php";
include "model/siswa/profilModel.php";

function index() {
    session_start();

    $id = $_SESSION['id_siswa'];
    $profil = getProfileById($id);

    include "view/siswa/profil.php";
}

function update() {
    session_start();
    global $conn;

    $id = $_SESSION['id_siswa'];
    $nama = $_POST['nama_lengkap'];
    $username = $_POST['username'];

    // Cek jika ada upload foto
    $foto = null;
    if (!empty($_FILES['foto']['name'])) {
        $namaFile = time() . "_" . $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];

        move_uploaded_file($tmp, "uploads/" . $namaFile);

        $foto = $namaFile;
    }

    // Update ke database lewat model
    updateProfile($id, $nama, $username, $foto);

    // Update session
    $_SESSION['nama'] = $nama;
    $_SESSION['username'] = $username;
    if ($foto) {
        $_SESSION['avatar'] = $foto;
    }

    // Redirect
    header("Location: ?action=profil");
    exit;
}
