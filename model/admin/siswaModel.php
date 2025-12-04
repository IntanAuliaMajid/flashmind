<?php
function getAllSiswa() {
    global $conn;
    $query = mysqli_query($conn, "SELECT s.id_siswa, s.username, s.nama, s.sekolah_id, sh.id_sekolah, sh.nama_sekolah FROM siswa AS s INNER JOIN sekolah AS sh ON s.sekolah_id = sh.id_sekolah");
    $data = mysqli_fetch_all($query,MYSQLI_ASSOC);
    return $data;
}

function getSiswaWithPagination($limit, $offset) {
    global $conn;
    $query = mysqli_query($conn, "SELECT s.id_siswa, s.username, s.nama, s.sekolah_id, sh.id_sekolah, sh.nama_sekolah FROM siswa AS s INNER JOIN sekolah AS sh ON s.sekolah_id = sh.id_sekolah LIMIT $limit OFFSET $offset");
    $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
    return $data;
}

function getTotalSiswa() {
    global $conn;
    $query = mysqli_query($conn, "SELECT COUNT(*) as total FROM siswa");
    $result = mysqli_fetch_assoc($query);
    return $result['total'];
}

function getAllSekolah(){
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM sekolah");
    $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
    return $data;
}

function getSiswaById($id) {
    global $conn;

    $result = mysqli_query($conn, "SELECT sh.id_sekolah, sh.nama_sekolah, s.id_siswa, s.username, s.nama, s.sekolah_id FROM siswa as s INNER JOIN sekolah as sh ON s.sekolah_id = sh.id_sekolah WHERE s.id_siswa = $id");
    $data = mysqli_fetch_assoc($result);
    return $data;
}

function saveSiswa($nama, $kelas) {
    global $conn;
    mysqli_query($conn, "INSERT INTO siswa(nama, kelas) VALUES('$nama', '$kelas')");
}

function storeSiswaModel($username, $nama, $password, $sekolahId) {
    global $conn;
    mysqli_query($conn, "INSERT INTO siswa(username, nama, password, sekolah_id) VALUES('$username', '$nama', '$password', '$sekolahId')");
}

function updateSiswaModel($id, $nama, $username, $sekolahId) {
    global $conn;
    mysqli_query($conn, "UPDATE siswa SET nama='$nama', username = '$username'
    , sekolah_id='$sekolahId' WHERE id_siswa=$id");
}

function deleteSiswaModel($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM siswa WHERE id_siswa=$id");
}
