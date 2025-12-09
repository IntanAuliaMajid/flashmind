<?php
session_start();
include "config/koneksi.php";
include "model/siswa/quizModel.php";

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || $_SESSION['role'] !== 'siswa') {
    header("Location: ?action=login");
    exit;
}

function index() {
    $quiz = getAllQuiz();
    include "view/siswa/quiz/index.php";
}

function startQuiz() {
    if (!isset($_GET['id'])) {
        die("Quiz tidak ditemukan.");
    }

    $id = $_GET['id'];
    $siswa_id = $_SESSION['id_siswa'] ?? null;
    
    if (!$siswa_id) {
        die("Anda harus login sebagai siswa.");
    }
    
    $data = getQuizById($id);
    
    if (!$data) {
        die("Quiz dengan ID $id tidak ditemukan.");
    }
    
    // Cek apakah siswa sudah mengerjakan quiz ini
    if (hasStudentTakenQuiz($siswa_id, $id)) {
        $quizStatus = ['message' => 'Anda sudah mengerjakan quiz ini sebelumnya. Setiap siswa hanya boleh mengerjakan sekali.'];
        include "view/siswa/quiz/quiz_not_available.php";
        exit;
    }
    
    // Cek apakah quiz masih aktif
    $quizStatus = isQuizActive($id);
    if (!$quizStatus['status']) {
        include "view/siswa/quiz/quiz_not_available.php";
        exit;
    }
    
    $soal = getQuestions($id);

    // Get answers for each question
    foreach ($soal as &$s) {
        $s['jawaban'] = getAnswersByQuestionId($s['id_pertanyaan']);
    }

    include "view/siswa/quiz/start.php";
}

function submitQuiz() {
    if (!isset($_POST['quiz_id'])) {
        echo "Akses tidak valid.";
        exit;
    }

    $quiz_id = $_POST['quiz_id'];
    $siswa_id = $_SESSION['id_siswa'] ?? null;
    
    if (!$siswa_id) {
        die("Anda harus login sebagai siswa.");
    }
    
    // Cek apakah siswa sudah mengerjakan quiz ini
    if (hasStudentTakenQuiz($siswa_id, $quiz_id)) {
        die("Anda sudah mengerjakan quiz ini sebelumnya.");
    }
    
    $jawaban_user = isset($_POST['jawaban']) ? $_POST['jawaban'] : [];

    $soal = getQuestions($quiz_id);
    $benar = 0;

    foreach ($soal as $s) {
        $id_soal = $s['id_pertanyaan'];
        
        // Get correct answer
        $jawaban = getAnswersByQuestionId($id_soal);
        $kunci = null;
        foreach ($jawaban as $j) {
            if ($j['adalah_benar'] == 1) {
                $kunci = $j['id_jawaban'];
                break;
            }
        }

        $user = isset($jawaban_user[$id_soal]) ? $jawaban_user[$id_soal] : null;

        if ($user == $kunci) {
            $benar++;
        }
    }

    $total = count($soal);
    $nilai = $total > 0 ? round(($benar / $total) * 100) : 0;
    
    // Simpan hasil quiz ke database
    saveQuizResult($siswa_id, $quiz_id, $nilai);

    include "view/siswa/quiz/result.php";
}

function leaderboard() {
    $quiz_id = $_GET['quiz_id'] ?? null;
    
    if ($quiz_id) {
        $leaderboard = getLeaderboard($quiz_id);
        $quiz = getQuizById($quiz_id);
    } else {
        $leaderboard = getLeaderboard();
        $quiz = null;
    }
    
    include "view/siswa/quiz/leaderboard.php";
}