<?php
include 'config/koneksi.php';
include 'model/siswa/registerModel.php';

function index(){
    $sekolah = getAllSchool();
    include "view/siswa/register.php";
}
function store(){
    $username=$_POST['username'];
    $nama=$_POST['nama'];
    $password=$_POST['password'];
    $konfirmasipassword=$_POST['password2'];
    $sekolah_id=$_POST['sekolah_id'];

    if($password != $konfirmasipassword){
        header("location: ?action=register");
        exit;
    }

    register( $username, $nama, $password, $konfirmasipassword, $sekolah_id);
}

?>