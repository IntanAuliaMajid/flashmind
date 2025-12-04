<?php
session_start();
include "config/koneksi.php";
include "model/siswa/homeModel.php";

$wod = getWOD();
function index(){
    global $wod;
    include "view/siswa/home.php";
}