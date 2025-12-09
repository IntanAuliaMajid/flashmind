<?php
// session_start();
// ... (Tambahkan cek login di aplikasi nyata)

include "config/koneksi.php";
include "model/admin/quizModel.php";
// include "model/admin/siswaModel.php"; // Diperlukan jika ingin memilih Admin/Guru yang membuat

function index(){
    $data = getAllQuiz();
    include "view/admin/quiz.php";
}

function create(){
    // $adminList = ... (Untuk memilih admin yang membuat)
    include "view/admin/createQuiz.php";
}

function store(){
    $namaQuiz = $_POST['namaQuiz'];
    $durasi = $_POST['durasi']; // format H:i:s
    $waktuPelaksanaan = $_POST['waktuPelaksanaan']; // format Y-m-d H:i:s
    $waktuBerakhir = $_POST['waktuBerakhir']; // format Y-m-d H:i:s
    $adminId = 1; // <--- Ganti dengan $_SESSION['admin_id'] di aplikasi nyata

    storeQuizModel($namaQuiz, $durasi, $waktuPelaksanaan, $waktuBerakhir, $adminId);
    header("Location: ?action=quizAdmin");
    exit;
}

function edit(){
    $id = $_GET['id'];
    $data = getQuizById($id);
    include "view/admin/editQuiz.php";
}

function update(){
    $id = $_POST['id'];
    $namaQuiz = $_POST['namaQuiz'];
    $durasi = $_POST['durasi'];
    $waktuPelaksanaan = $_POST['waktuPelaksanaan'];
    $waktuBerakhir = $_POST['waktuBerakhir'];

    updateQuizModel($id, $namaQuiz, $durasi, $waktuPelaksanaan, $waktuBerakhir);
    header("Location: ?action=quizAdmin");
    exit;
}

function delete(){
    $id = $_GET['id'];
    deleteQuizModel($id);
    header("Location: ?action=quizAdmin");
    exit;
}