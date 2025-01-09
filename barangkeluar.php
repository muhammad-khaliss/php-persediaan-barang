<?php
require_once('koneksi.php');

// Ambil data pelanggan dan barang
$pelangganQuery = "SELECT * FROM tb_pelanggan";
$pelangganResult = mysqli_query($koneksi, $pelangganQuery);

$barangQuery = "SELECT * FROM tb_barang";
$barangResult = mysqli_query($koneksi, $barangQuery);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Proses form submission
    $kode_barang = $_POST['kode_barang'];
    $kode_pelanggan = $_POST['kode_pelanggan'];
    $jumlah_keluar = $_POST['jumlah'];
    $tanggal = date('Y-m-d H:i:s');
    $petugas = "Admin"; // Atau bisa sesuaikan dengan sesi pengguna yang login

    // Ambil stok barang saat ini
    $barangQuery = "SELECT stok FROM tb_barang WHERE kode_barang = '$kode_barang'";
    $barang = mysqli_fetch_assoc(mysqli_query($koneksi, $barangQuery));
    $stok_sekarang = $barang['stok'];

    if ($stok_sekarang >= $jumlah_keluar) {
        // Kurangi stok barang
        $new_stok = $stok_sekarang - $jumlah_keluar;
        $updateStok = "UPDATE tb_barang SET stok = $new_stok WHERE kode_barang = '$kode_barang'";
        mysqli_query($koneksi, $updateStok);

        // Insert transaksi barang keluar
        $insertQuery = "INSERT INTO tb_barang_keluar (kode_barang, kode_pelanggan, jumlah, tanggal, petugas) 
                        VALUES ('$kode_barang', '$kode_pelanggan', $jumlah_keluar, '$tanggal', '$petugas')";
        mysqli_query($koneksi, $insertQuery);

        echo "<script>alert('Transaksi barang keluar berhasil!'); window.location = 'barangkeluar.php';</script>";
    } else {
        echo "<script>alert('Stok tidak cukup!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang Keluar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php require_once('menu.php'); ?>

    <div class="container my-4">
        <h2>Barang Keluar</h2>

        <form method="POST">
            <div class="mb-3">
                <label for="kode_pelanggan" class="form-label">Pelanggan</label>
                <select class="form-select" name="kode_pelanggan" required>
                    <option value="">Pilih Pelanggan</option>
                    <?php while ($pelanggan = mysqli_fetch_assoc($pelangganResult)): ?>
                        <option value="<?= $pelanggan['kode_pelanggan']; ?>"><?= $pelanggan['nama']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="kode_barang" class="form-label">Barang</label>
                <select class="form-select" name="kode_barang" required>
                    <option value="">Pilih Barang</option>
                    <?php while ($barang = mysqli_fetch_assoc($barangResult)): ?>
                        <option value="<?= $barang['kode_barang']; ?>"><?= $barang['nama']; ?> (Stok: <?= $barang['stok']; ?>)</option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah Barang Keluar</label>
                <input type="number" class="form-control" name="jumlah" min="1" required>
            </div>

            <button type="submit" class="btn btn-primary">Proses Barang Keluar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
