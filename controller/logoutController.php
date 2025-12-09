<?php
session_start();

function index() {
    // Hapus semua session
    session_unset();
    session_destroy();
    
    // Redirect ke halaman login atau home
    header("Location: ?action=login"); // Sesuaikan dengan halaman login Anda
    exit;
}