<?php

function getAllQuiz() {
    global $conn;
    $sql = "SELECT * FROM quiz ORDER BY id_quiz DESC";
    $result = mysqli_query($conn, $sql);

    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
}

function getQuizById($id) {
    global $conn;
    $sql = "SELECT * FROM quiz WHERE id_quiz = '$id'";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

function getQuestions($quiz_id) {
    global $conn;
    $sql = "SELECT * FROM pertanyaan WHERE quiz_id = '$quiz_id'";
    $result = mysqli_query($conn, $sql);

    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
}

function getAnswersByQuestionId($pertanyaan_id) {
    global $conn;
    $sql = "SELECT * FROM jawaban WHERE pertanyaan_id = '$pertanyaan_id'";
    $result = mysqli_query($conn, $sql);

    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
}

function isQuizActive($id) {
    global $conn;
    $sql = "SELECT * FROM quiz WHERE id_quiz = '$id'";
    $result = mysqli_query($conn, $sql);
    $quiz = mysqli_fetch_assoc($result);

    if (!$quiz) {
        return ['status' => false, 'message' => 'Quiz tidak ditemukan'];
    }

    $now = new DateTime();
    $waktu_mulai = new DateTime($quiz['waktu_pelaksanaan']);
    $waktu_berakhir = new DateTime($quiz['waktu_berakhir']);

    if ($now < $waktu_mulai) {
        return ['status' => false, 'message' => 'Quiz belum dimulai. Mulai pada: ' . $waktu_mulai->format('d-m-Y H:i')];
    }

    if ($now > $waktu_berakhir) {
        return ['status' => false, 'message' => 'Quiz sudah berakhir. Berakhir pada: ' . $waktu_berakhir->format('d-m-Y H:i')];
    }

    return ['status' => true, 'message' => 'Quiz aktif'];
}

function hasStudentTakenQuiz($siswa_id, $quiz_id) {
    global $conn;
    $sql = "SELECT * FROM hasil_quiz WHERE siswa_id = '$siswa_id' AND quiz_id = '$quiz_id'";
    $result = mysqli_query($conn, $sql);
    return mysqli_num_rows($result) > 0;
}

function saveQuizResult($siswa_id, $quiz_id, $skor) {
    global $conn;
    $sql = "INSERT INTO hasil_quiz (siswa_id, quiz_id, skor_akhir) VALUES ('$siswa_id', '$quiz_id', '$skor')";
    return mysqli_query($conn, $sql);
}

function getLeaderboard($quiz_id = null) {
    global $conn;
    
    if ($quiz_id) {
        // Leaderboard untuk quiz tertentu
        $sql = "SELECT hq.*, s.nama, s.username, sk.nama_sekolah, q.nama_quiz 
                FROM hasil_quiz hq
                JOIN siswa s ON hq.siswa_id = s.id_siswa
                LEFT JOIN sekolah sk ON s.sekolah_id = sk.id_sekolah
                JOIN quiz q ON hq.quiz_id = q.id_quiz
                WHERE hq.quiz_id = '$quiz_id'
                ORDER BY hq.skor_akhir DESC, hq.id_hasil ASC
                LIMIT 50";
    } else {
        // Leaderboard global (rata-rata semua quiz)
        $sql = "SELECT s.id_siswa, s.nama, s.username, sk.nama_sekolah,
                AVG(hq.skor_akhir) as avg_score,
                COUNT(hq.id_hasil) as total_quiz
                FROM siswa s
                LEFT JOIN sekolah sk ON s.sekolah_id = sk.id_sekolah
                JOIN hasil_quiz hq ON s.id_siswa = hq.siswa_id
                GROUP BY s.id_siswa, s.nama, s.username, sk.nama_sekolah
                ORDER BY avg_score DESC, total_quiz DESC
                LIMIT 50";
    }
    
    $result = mysqli_query($conn, $sql);
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
}
