<?php
// Konfigurasi Database
$host     = "localhost";   // Server Database
$user     = "root";        // Username Database
$password = "";            // Password Database
$database = "db_aplikasi_persediaan";  // Nama Database

// Membuat Koneksi
$koneksi = mysqli_connect($host, $user, $password, $database);

// Cek Koneksi
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>
