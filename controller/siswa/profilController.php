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

    // Ambil data profil lama untuk mendapatkan foto lama
    $profilLama = getProfileById($id);
    $fotoLama = $profilLama['avatar'] ?? null;

    // Cek jika ada upload foto
    $foto = null;
    if (!empty($_FILES['foto']['name'])) {
        // Hapus foto lama jika ada
        if ($fotoLama && $fotoLama != '' && file_exists("uploads/" . $fotoLama)) {
            if (unlink("uploads/" . $fotoLama)) {
                // File berhasil dihapus
                error_log("File lama berhasil dihapus: " . $fotoLama);
            } else {
                // Gagal menghapus file
                error_log("Gagal menghapus file lama: " . $fotoLama);
            }
        }

        $namaFile = time() . "_" . $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];

        if (move_uploaded_file($tmp, "uploads/" . $namaFile)) {
            $foto = $namaFile;
        } else {
            error_log("Gagal upload file baru: " . $namaFile);
        }
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
