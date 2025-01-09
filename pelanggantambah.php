<?php
require_once('koneksi.php');

if (isset($_POST['btnsimpan']) && $_POST['btnsimpan'] === 'btnsimpan') {
    $KodePelanggan = trim($_POST['kode_pelanggan']);
    $Nama = trim($_POST['nama']);
    $Alamat = trim($_POST['alamat']);
    $Telp = trim($_POST['telp']);

    $query_sql = "INSERT INTO tb_pelanggan (kode_pelanggan, nama, alamat, telp)
                  VALUES ('$KodePelanggan', '$Nama', '$Alamat', '$Telp')";
    $sql = mysqli_query($koneksi, $query_sql) or die(mysqli_error($koneksi));
    if ($sql) {
        echo "<script>alert('Berhasil simpan.');</script>";
        echo "<script>window.location.href='pelanggan.php'</script>";
    }
}
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php require_once('menu.php'); ?>
    <br>
    <div class="container">
        <h2>Tambah Data Pelanggan</h2>
        <form method="post" name="form1">
            <div class="mb-3">
                <label for="kode_pelanggan" class="form-label">Kode Pelanggan:</label>
                <input type="text" required name="kode_pelanggan" id="kode_pelanggan" class="form-control">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" required name="nama" id="nama" class="form-control">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <input type="text" required name="alamat" id="alamat" class="form-control">
            </div>
            <div class="mb-3">
                <label for="telp" class="form-label">Telp:</label>
                <input type="text" required name="telp" id="telp" class="form-control">
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-success" name="btnsimpan" value="btnsimpan" type="submit">Simpan</button>
                <button class="btn btn-danger" type="reset">Reset</button>
                <a href="pelanggan.php" class="btn btn-primary">Data Pelanggan</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
