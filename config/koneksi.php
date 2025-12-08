<?php
$conn = mysqli_connect("localhost", "root", "tuhu.tuhu", "flashmind");
date_default_timezone_set('Asia/Jakarta');

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
