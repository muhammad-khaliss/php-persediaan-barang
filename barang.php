<?php
require_once('koneksi.php');
$query_sql = "SELECT * FROM tb_barang";
$sql = mysqli_query($koneksi, $query_sql) or die(mysqli_error($koneksi));
$totaldata = mysqli_num_rows($sql);
$data = mysqli_fetch_assoc($sql);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi PHP MySQL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php require_once('menu.php'); ?>

    <div class="container my-4">
        <h2>Data Barang</h2>
        <a href="barangtambah.php" class="btn btn-primary mb-3">Tambah Barang</a>
        
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Ubah / Hapus</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Supplier</th>
                    <th>Jenis</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Satuan</th>
                    <th>Petugas</th>
                </tr>
            </thead>
            <tbody>
            <?php if ($totaldata == 0): ?>
                <tr><td colspan="9" class="text-center">Data kosong.</td></tr>
            <?php else: ?>
                <?php do { ?>
                    <tr>
                        <td>
                            <a href="barangedit.php?id=<?php echo $data['kode_barang']; ?>" class="btn btn-warning btn-sm">Ubah</a>
                            <a href="baranghapus.php?id=<?php echo $data['kode_barang']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                        <td><?php echo htmlspecialchars($data['kode_barang']); ?></td>
                        <td><?php echo htmlspecialchars($data['nama']); ?></td>
                        <td><?php echo htmlspecialchars($data['kode_supplier']); ?></td>
                        <td><?php echo htmlspecialchars($data['jenis']); ?></td>
                        <td><?php echo htmlspecialchars(number_format($data['harga_beli'], 2, ',', '.')); ?></td>
                        <td><?php echo htmlspecialchars($data['stok']); ?></td>
                        <td><?php echo htmlspecialchars($data['satuan']); ?></td>
                        <td><?php echo htmlspecialchars($data['petugas']); ?></td>
                    </tr>
                <?php } while ($data = mysqli_fetch_assoc($sql)); ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
