<?php

function getProfil($username, $password){
    global $conn;
    $sql = "SELECT * FROM siswa WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}
#read
function cekLogin($username, $password){
    global $conn;
    $sql = "SELECT * FROM siswa WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    return mysqli_num_rows($result);
}