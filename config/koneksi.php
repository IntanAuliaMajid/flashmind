<?php
$conn = mysqli_connect("localhost", "root", "", "flashmind");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
