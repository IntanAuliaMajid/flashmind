<?php

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
    if($password != $konfirmasipassword){
        header("location: ?action=register");
    }
    
    $sql = "INSERT INTO siswa (username, nama, password, sekolah_id) values ('$username', '$nama', '$password', $sekolah_id)";
    mysqli_query($conn, $sql);
    header("location: ?action=login");
}

?>