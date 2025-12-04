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
