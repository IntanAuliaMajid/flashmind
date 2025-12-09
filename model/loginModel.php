<?php

function cekLoginAdmin($username, $password){
    global $conn;
    $sql = "SELECT id_admin, username FROM admin WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

function cekLoginSiswa($username, $password){
    global $conn;
    $sql = "SELECT s.id_siswa, s.username, s.nama, sc.nama_sekolah as sekolah, s.avatar FROM siswa as s JOIN sekolah as sc ON s.sekolah_id = sc.id_sekolah WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}