<?php

function getProfileById($id) {
    global $conn;
    $sql = "SELECT * FROM siswa WHERE id_siswa = '$id'";
    $data = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($data);
}

function updateProfile($id, $nama, $username, $foto = null) {
    global $conn;

    if ($foto) {
        $sql = "UPDATE siswa 
                SET nama = '$nama', username = '$username', avatar = '$foto'
                WHERE id_siswa = '$id'";
    } else {
        $sql = "UPDATE siswa 
                SET nama = '$nama', username = '$username'
                WHERE id_siswa = '$id'";
    }

    return mysqli_query($conn, $sql);
}

/* ===========================================================
   STATISTIK: MENGHITUNG KATA PER KELOMPOK (pakai kelompok_id)
   =========================================================== */
function getStatisticKata($id) {
    global $conn;
    $sql = "SELECT kk.nama_kelompok_kata, COUNT(k.id_kata) AS total_kata
            FROM kelompok_kata kk
            LEFT JOIN kata k ON kk.id_kelompok_kata = k.kelompok_id
            WHERE kk.user_id = '$id'
            GROUP BY kk.id_kelompok_kata, kk.nama_kelompok_kata
            ORDER BY total_kata DESC";

    $result = mysqli_query($conn, $sql);
    $data = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    return $data;
}

/* ===========================================================
   TOTAL SEMUA KATA UNTUK USER TERTENTU
   =========================================================== */
function getTotalKata($id) {
    global $conn;
    $sql = "SELECT COUNT(k.id_kata) AS total
            FROM kata k
            JOIN kelompok_kata kk ON k.kelompok_id = kk.id_kelompok_kata
            WHERE kk.user_id = '$id'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['total'] ?? 0;
}

/* ===========================================================
   TOTAL KELOMPOK KATA (punya user)
   =========================================================== */
function getTotalKelompok($id) {
    global $conn;
    $sql = "SELECT COUNT(*) AS total
            FROM kelompok_kata
            WHERE user_id = '$id'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['total'] ?? 0;
}

/* ===========================================================
   STATISTIK KATA PER TANGGAL DIBUAT
   =========================================================== */
function getStatisticKataByDate($id) {
    global $conn;
    $sql = "SELECT k.tanggal_dibuat, COUNT(k.id_kata) AS total_kata
            FROM kata k
            JOIN kelompok_kata kk ON k.kelompok_id = kk.id_kelompok_kata
            WHERE kk.user_id = '$id' AND k.tanggal_dibuat IS NOT NULL
            GROUP BY k.tanggal_dibuat
            ORDER BY k.tanggal_dibuat ASC";

    $result = mysqli_query($conn, $sql);
    $data = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    return $data;
}

