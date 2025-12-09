<?php
function getAllHasilQuiz() {
    global $conn;
    $query = mysqli_query($conn, "SELECT 
        hq.id_hasil, s.nama as nama_siswa, sh.nama_sekolah, q.nama_quiz, hq.skor_akhir
        FROM hasil_quiz AS hq
        JOIN siswa AS s ON hq.siswa_id = s.id_siswa
        JOIN quiz AS q ON hq.quiz_id = q.id_quiz
        JOIN sekolah AS sh ON s.sekolah_id = sh.id_sekolah
        ORDER BY hq.skor_akhir DESC");
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}