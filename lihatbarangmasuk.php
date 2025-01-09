<?php
require_once('koneksi.php');

// Query untuk mengambil riwayat barang masuk
$query_sql = "SELECT bm.tanggal, bm.kode_barang, bm.kode_supplier, bm.jumlah, bm.petugas, b.nama AS barang, s.nama AS supplier 
              FROM tb_barang_masuk bm
              JOIN tb_barang b ON bm.kode_barang = b.kode_barang
              JOIN tb_supplier s ON bm.kode_supplier = s.kode_supplier
              ORDER BY bm.tanggal DESC";
$sql = mysqli_query($koneksi, $query_sql);
$totaldata = mysqli_num_rows($sql);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Riwayat Barang Masuk</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php require_once('menu.php'); ?>
<br>
<div class="container">
    <h2 class="my-4">Riwayat Barang Masuk</h2>

    <?php if ($totaldata == 0): ?>
        <div class="alert alert-warning" role="alert">Tidak ada riwayat barang masuk.</div>
    <?php else: ?>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Tanggal</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Kode Supplier</th>
                    <th>Nama Supplier</th>
                    <th>Jumlah</th>
                    <th>Petugas</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($data = mysqli_fetch_assoc($sql)): ?>
                    <tr>
                        <td><?php echo date('d-m-Y H:i:s', strtotime($data['tanggal'])); ?></td>
                        <td><?php echo $data['kode_barang']; ?></td>
                        <td><?php echo $data['barang']; ?></td>
                        <td><?php echo $data['kode_supplier']; ?></td>
                        <td><?php echo $data['supplier']; ?></td>
                        <td><?php echo number_format($data['jumlah'], 0, ',', '.'); ?></td>
                        <td><?php echo $data['petugas']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
