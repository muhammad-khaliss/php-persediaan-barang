<?php
require_once('koneksi.php');

if (isset($_POST['btnsimpan'])) {
    $KodeSupplier = trim($_POST['kode_supplier']);
    $Nama = trim($_POST['nama']);
    $Alamat = trim($_POST['alamat']);
    $Telp = trim($_POST['telp']);

    $query_sql = "INSERT INTO tb_supplier (kode_supplier, nama, alamat, telp) 
                  VALUES ('$KodeSupplier', '$Nama', '$Alamat', '$Telp')";

    $sql = mysqli_query($koneksi, $query_sql) or die(mysqli_error($koneksi));

    if ($sql) {
        echo "<script>alert('Berhasil disimpan.');</script>";
        echo "<script>window.location.href='supplier.php';</script>";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi PHP MySQL</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php require_once('menu.php'); ?>

    <div class="container mt-5">
        <h2 class="mb-4">Tambah Data Supplier</h2>

        <form method="post" name="form1">
            <div class="mb-3">
                <label for="kode_supplier" class="form-label">Kode Supplier:</label>
                <input type="text" required name="kode_supplier" class="form-control">
            </div>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" required name="nama" class="form-control">
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <input type="text" required name="alamat" class="form-control">
            </div>

            <div class="mb-3">
                <label for="telp" class="form-label">Telepon:</label>
                <input type="text" required name="telp" class="form-control">
            </div>

            <div class="mb-3">
                <button class="btn btn-success" name="btnsimpan" type="submit">
                    <i class="bi bi-save"></i> Simpan
                </button>

                <button class="btn btn-danger" type="reset">
                    <i class="bi bi-x-circle"></i> Reset
                </button>

                <a href="supplier.php" class="btn btn-primary">
                    <i class="bi bi-list"></i> Data Supplier
                </a>
            </div>
        </form>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
