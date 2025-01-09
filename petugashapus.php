<?php
require_once('koneksi.php');

// Pengecekan apakah parameter 'id' ada dan tidak kosong
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>alert('ID tidak ditemukan dalam URL!');</script>";
    echo "<script>window.location.href='petugas.php'</script>";
    exit;
}

$KodePetugas = $_GET['id'];

// Hapus data petugas berdasarkan ID
$query_sql = "DELETE FROM tb_petugas WHERE kode_petugas='$KodePetugas'";
$sql = mysqli_query($koneksi, $query_sql) or die(mysqli_error($koneksi));

// Cek apakah data berhasil dihapus
if ($sql) {
    echo "<script>alert('Berhasil Hapus.');</script>";
} else {
    echo "<script>alert('Gagal menghapus data.');</script>";
}
echo "<script>window.location.href='petugas.php'</script>";
?>
