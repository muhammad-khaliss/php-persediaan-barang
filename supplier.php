<?php
require_once('koneksi.php');
$query_sql = "SELECT * FROM tb_supplier";
$sql = mysqli_query($koneksi, $query_sql) or die(mysqli_error($koneksi));
$totaldata = mysqli_num_rows($sql);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Aplikasi PHP MySQL</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php require_once('menu.php'); ?>
<br>
<div class="container">
    <h2 class="my-4">Data Supplier</h2>
    <a href="suppliertambah.php" class="btn btn-primary mb-3">
        Tambah Supplier <i class="bi bi-plus-circle"></i>
    </a>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Ubah / Hapus</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telp</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($totaldata > 0): ?>
                <?php while ($data = mysqli_fetch_assoc($sql)): ?>
                    <tr>
                        <td>
                            <a href="supplieredit.php?id=<?php echo $data['kode_supplier']; ?>" class="btn btn-warning btn-sm">Ubah</a>
                            <a href="supplierhapus.php?id=<?php echo $data['kode_supplier']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                        <td><?php echo htmlspecialchars($data['kode_supplier']); ?></td>
                        <td><?php echo htmlspecialchars($data['nama']); ?></td>
                        <td><?php echo htmlspecialchars($data['alamat']); ?></td>
                        <td><?php echo htmlspecialchars($data['telp']); ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">Data kosong.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
