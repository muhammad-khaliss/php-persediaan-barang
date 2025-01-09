<?php
require_once('koneksi.php'); // Koneksi ke database

// Ambil data barang keluar
$query_sql = "SELECT * FROM tb_barang_keluar";
$sql = mysqli_query($koneksi, $query_sql) or die(mysqli_error($koneksi));

$totaldata = mysqli_num_rows($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang Keluar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php require_once('menu.php'); ?> <!-- Menampilkan menu -->

    <div class="container my-4">
        <h2>Data Barang Keluar</h2>

        <!-- Tabel untuk menampilkan data barang keluar -->
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Kode Pelanggan</th>
                    <th>Nama Pelanggan</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                    <th>Petugas</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($totaldata == 0): ?>
                    <tr><td colspan="8" class="text-center">Data kosong.</td></tr>
                <?php else: ?>
                    <?php $no = 1; ?>
                    <?php while ($data = mysqli_fetch_assoc($sql)): ?>
                        <?php
                        // Ambil nama barang berdasarkan kode_barang
                        $barangQuery = "SELECT nama FROM tb_barang WHERE kode_barang = '".$data['kode_barang']."'";
                        $barangResult = mysqli_query($koneksi, $barangQuery);
                        $barang = mysqli_fetch_assoc($barangResult);

                        // Ambil nama pelanggan berdasarkan kode_pelanggan
                        $pelangganQuery = "SELECT nama FROM tb_pelanggan WHERE kode_pelanggan = '".$data['kode_pelanggan']."'";
                        $pelangganResult = mysqli_query($koneksi, $pelangganQuery);
                        $pelanggan = mysqli_fetch_assoc($pelangganResult);
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo htmlspecialchars($data['kode_barang']); ?></td>
                            <td><?php echo htmlspecialchars($barang['nama']); ?></td>
                            <td><?php echo htmlspecialchars($data['kode_pelanggan']); ?></td>
                            <td><?php echo htmlspecialchars($pelanggan['nama']); ?></td>
                            <td><?php echo htmlspecialchars($data['jumlah']); ?></td>
                            <td><?php echo htmlspecialchars($data['tanggal']); ?></td>
                            <td><?php echo htmlspecialchars($data['petugas']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
