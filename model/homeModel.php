<?php

function getWOD(){
    global $conn;
    $query = "SELECT * FROM wod WHERE aktif = '1'";
    $result = mysqli_query($conn, $query);
    
    if($result && mysqli_num_rows($result) > 0){
        return mysqli_fetch_assoc($result);
    }
    
    return null;
}

// BARU: Ambil semua kelompok kata yang dimiliki siswa tertentu
function getKelompokKataBySiswaId($siswaId) {
    global $conn;
    $query = "SELECT kk.id_kelompok_kata, kk.nama_kelompok_kata 
              FROM kelompok_kata kk
              JOIN relasi_siswa_kelompok_kata rskk ON kk.id_kelompok_kata = rskk.id_kelompok_kata
              WHERE rskk.id_siswa = '$siswaId'";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}