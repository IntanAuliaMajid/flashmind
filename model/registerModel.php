<?php

// --- Fungsi Tambahan: Cek Keberadaan User ---
function isUsernameExists($username) {
    global $conn;
    $username = mysqli_real_escape_string($conn, $username);
    // Cek di tabel siswa (Wajib, karena data Siswa disimpan di sini)
    $siswaQuery = mysqli_query($conn, "SELECT username FROM siswa WHERE username = '$username'");
    return mysqli_num_rows($siswaQuery) > 0;
}
// ------------------------------------------

function getAllSchool(){
    global $conn;
    $sql = "SELECT * FROM sekolah";
    $data = mysqli_query($conn, $sql);
    $result = mysqli_fetch_all($data, MYSQLI_ASSOC);
    return $result;
}
#creat
function register($username, $nama, $password, $konfirmasipassword,$sekolah_id){
    global $conn;
    
    $sql = "INSERT INTO siswa (username, nama, password, sekolah_id) values ('$username', '$nama', '$password', $sekolah_id)";
    mysqli_query($conn, $sql);
    header("location: ?action=login");
}

?>