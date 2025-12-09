<?php
// Model untuk Quiz
function getAllQuiz() {
    global $conn;
    $query = mysqli_query($conn, "SELECT q.*, a.username as admin_name FROM quiz AS q JOIN admin AS a ON q.admin_id = a.id_admin");
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function getQuizById($id) {
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM quiz WHERE id_quiz = $id");
    return mysqli_fetch_assoc($result);
}

function storeQuizModel($namaQuiz, $durasi, $waktuPelaksanaan, $waktuBerakhir, $adminId) {
    global $conn;
    // Query disederhanakan: INSERT INTO quiz(nama_quiz, durasi, waktu_pelaksanaan, waktu_berakhir, admin_id) VALUES(...)
    // Asumsi Admin ID diambil dari session
    mysqli_query($conn, "INSERT INTO quiz(nama_quiz, durasi, waktu_pelaksanaan, waktu_berakhir, admin_id) VALUES('$namaQuiz', '$durasi', '$waktuPelaksanaan', '$waktuBerakhir', '$adminId')");
}

function updateQuizModel($id, $namaQuiz, $durasi, $waktuPelaksanaan, $waktuBerakhir) {
    global $conn;
    mysqli_query($conn, "UPDATE quiz SET nama_quiz='$namaQuiz', durasi = '$durasi', waktu_pelaksanaan = '$waktuPelaksanaan', waktu_berakhir = '$waktuBerakhir' WHERE id_quiz=$id");
}

function deleteQuizModel($id) {
    global $conn;
    // Perlu menghapus semua pertanyaan dan hasil quiz yang terkait dulu
    // (Dalam kasus sederhana ini, kita hanya fokus pada Quiz, asumsi DB menanganinya melalui CASCADE)
    mysqli_query($conn, "DELETE FROM quiz WHERE id_quiz=$id");
}

// Model untuk Pertanyaan
function getAllPertanyaan() {
    global $conn;
    $query = mysqli_query($conn, "SELECT p.*, q.nama_quiz FROM pertanyaan AS p JOIN quiz AS q ON p.quiz_id = q.id_quiz");
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function getPertanyaanById($id) {
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM pertanyaan WHERE id_pertanyaan = $id");
    return mysqli_fetch_assoc($result);
}

function storePertanyaanModel($teksPertanyaan, $quizId, $adminId, $jawabanBenar, $jawabanSalah1, $jawabanSalah2, $jawabanSalah3) {
    global $conn;
    
    // Insert Pertanyaan
    mysqli_query($conn, "INSERT INTO pertanyaan(teks_pertanyaan, quiz_id, admin_id) VALUES('$teksPertanyaan', '$quizId', '$adminId')");
    $pertanyaanId = mysqli_insert_id($conn);

    // Insert Jawaban
    mysqli_query($conn, "INSERT INTO jawaban(teks_jawaban, adalah_benar, pertanyaan_id) VALUES('$jawabanBenar', 1, '$pertanyaanId')");
    mysqli_query($conn, "INSERT INTO jawaban(teks_jawaban, adalah_benar, pertanyaan_id) VALUES('$jawabanSalah1', 0, '$pertanyaanId')");
    mysqli_query($conn, "INSERT INTO jawaban(teks_jawaban, adalah_benar, pertanyaan_id) VALUES('$jawabanSalah2', 0, '$pertanyaanId')");
    mysqli_query($conn, "INSERT INTO jawaban(teks_jawaban, adalah_benar, pertanyaan_id) VALUES('$jawabanSalah3', 0, '$pertanyaanId')");
}

function updatePertanyaanModel($id, $teksPertanyaan, $quizId) {
    global $conn;
    mysqli_query($conn, "UPDATE pertanyaan SET teks_pertanyaan='$teksPertanyaan', quiz_id = '$quizId' WHERE id_pertanyaan=$id");
}

function deletePertanyaanModel($id) {
    global $conn;
    // Hapus Jawaban terkait dulu
    mysqli_query($conn, "DELETE FROM jawaban WHERE pertanyaan_id=$id");
    // Hapus Pertanyaan
    mysqli_query($conn, "DELETE FROM pertanyaan WHERE id_pertanyaan=$id");
}