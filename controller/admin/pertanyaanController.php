<?php
// session_start();
// ... (Tambahkan cek login di aplikasi nyata)

include "config/koneksi.php";
include "model/admin/quizModel.php"; // Menggunakan QuizModel untuk fungsi pertanyaan

function index(){
    $data = getAllPertanyaan();
    include "view/admin/pertanyaan.php";
}

function create(){
    $quizList = getAllQuiz(); // Untuk dropdown quiz
    include "view/admin/createPertanyaan.php";
}

function store(){
    $teksPertanyaan = $_POST['teksPertanyaan'];
    $quizId = $_POST['quizId'];
    $jawabanBenar = $_POST['jawabanBenar'];
    $jawabanSalah1 = $_POST['jawabanSalah1'];
    $jawabanSalah2 = $_POST['jawabanSalah2'];
    $jawabanSalah3 = $_POST['jawabanSalah3'];
    $adminId = 1; // <--- Ganti dengan $_SESSION['admin_id'] di aplikasi nyata

    storePertanyaanModel($teksPertanyaan, $quizId, $adminId, $jawabanBenar, $jawabanSalah1, $jawabanSalah2, $jawabanSalah3);
    header("Location: ?action=pertanyaanAdmin");
    exit;
}

function edit(){
    $id = $_GET['id'];
    $data = getPertanyaanById($id);
    $quizList = getAllQuiz();
    
    // Asumsi: Anda juga perlu mengambil data jawaban yang benar dari DB di sini
    // untuk diisi ke form edit. (Dapat diimplementasikan lebih lanjut di model)

    include "view/admin/editPertanyaan.php";
}

function update(){
    $id = $_POST['id'];
    $teksPertanyaan = $_POST['teksPertanyaan'];
    $quizId = $_POST['quizId'];
    
    // Catatan: Logika update jawaban (yang benar dan salah) perlu ditambahkan di sini
    // Saat ini hanya mengupdate pertanyaan.

    updatePertanyaanModel($id, $teksPertanyaan, $quizId);
    header("Location: ?action=pertanyaanAdmin");
    exit;
}

function delete(){
    $id = $_GET['id'];
    deletePertanyaanModel($id);
    header("Location: ?action=pertanyaanAdmin");
    exit;
}