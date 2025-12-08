<?php
// session_start();
// ... (Tambahkan cek login di aplikasi nyata)

include "config/koneksi.php";
include "model/admin/hasilQuizModel.php";

function index(){
    $data = getAllHasilQuiz();
    include "view/admin/hasilQuiz.php";
}

// Tidak ada fungsi CRUD (create, edit, delete, store) karena data ini dihasilkan otomatis oleh sistem.