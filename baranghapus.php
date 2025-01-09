<?php
require_once('koneksi.php');

if (isset($_GET['id'])) {
    $KodeBarang = $_GET['id'];

    // Menggunakan prepared statement untuk menghindari SQL Injection
    $query_sql = "DELETE FROM tb_barang WHERE kode_barang = ?";
    $stmt = $koneksi->prepare($query_sql);

    if ($stmt) {
        $stmt->bind_param("s", $KodeBarang); // Bind parameter tipe string
        if ($stmt->execute()) {
            echo "<script>alert('Berhasil Hapus.');</script>";
            echo "<script>window.location.href='barang.php';</script>";
        } else {
            echo "<script>alert('Gagal Hapus.');</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('Terjadi kesalahan dalam query.');</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan.');</script>";
    echo "<script>window.location.href='barang.php';</script>";
}

$koneksi->close();
?>
