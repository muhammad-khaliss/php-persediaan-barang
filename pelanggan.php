<?php
require_once('koneksi.php');
$query_sql = "SELECT * FROM tb_pelanggan";
$sql = mysqli_query($koneksi, $query_sql) or die(mysqli_error($koneksi));
$totaldata = mysqli_num_rows($sql);
$data = mysqli_fetch_assoc($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Aplikasi PHP MySQL</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php require_once('menu.php'); ?>
    <div class="container my-4">
        <h2>Data Pelanggan</h2>
        <a href="pelanggantambah.php" class="btn btn-primary mb-3">
            Tambah Pelanggan <i class="bi bi-plus"></i>
        </a>

        <table class="table table-striped table-bordered table-hover">
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
    <?php
    if ($totaldata == 0) {
        echo '<tr><td colspan="5" class="text-center">Data kosong.</td></tr>';
    } else {
        do {
    ?>
        <tr>
            <td>
                <a href="pelangganedit.php?id=<?php echo $data['kode_pelanggan']; ?>" class="btn btn-warning btn-sm">Ubah</a>
                <a href="pelangganhapus.php?id=<?php echo $data['kode_pelanggan']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
            </td>
            <td><?php echo $data['kode_pelanggan']; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['alamat']; ?></td>
            <td><?php echo $data['telp']; ?></td>
        </tr>
    <?php
        } while ($data = mysqli_fetch_assoc($sql));
    }
    ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
