<?php
function getAllSekolahWithPagination($limit, $offset) {
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM sekolah LIMIT $limit OFFSET $offset");
    $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
    return $data;
}

function getTotalSekolah() {
    global $conn;
    $query = mysqli_query($conn, "SELECT COUNT(*) as total FROM sekolah");
    $result = mysqli_fetch_assoc($query);
    return $result['total'];
}

function getSekolahById($id) {
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM sekolah WHERE id_sekolah = $id");
    $data = mysqli_fetch_assoc($result);
    return $data;
}

function storeSekolahModel($namaSekolah, $alamat) {
    global $conn;
    mysqli_query($conn, "INSERT INTO sekolah(nama_sekolah, alamat) VALUES('$namaSekolah')");
}

function updateSekolahModel($id, $namaSekolah) {
    global $conn;
    mysqli_query($conn, "UPDATE sekolah SET nama_sekolah='$namaSekolah' WHERE id_sekolah=$id");
}

function deleteSekolahModel($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM sekolah WHERE id_sekolah=$id");
}