<?php
require_once('koneksi.php');

if (isset($_POST['btnsimpan']) && $_POST['btnsimpan'] == 'btnsimpan') {
    $KodePetugas = trim($_POST['kode_petugas']);
    $Nama = trim($_POST['nama']);
    $Jabatan = trim($_POST['jabatan']);
    $Password = trim($_POST['password']);

    $query_sql = "INSERT INTO tb_petugas (kode_petugas, nama, jabatan, password) VALUES ('$KodePetugas', '$Nama', '$Jabatan', '$Password');";
    $sql = mysqli_query($koneksi, $query_sql) or die(mysqli_error($koneksi));
    if ($sql) {
        echo "<script> alert('Berhasil simpan.') </script>";
        echo "<script>window.location.href='petugas.php'</script>";
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
    <link rel="icon" href="docs/4.0/assets/img/favicons/favicon.ico">
    <title>Aplikasi PHP MySQL</title>
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php require_once('menu.php'); ?>
<br>
<div class="container">
    <h2>Tambah Data Petugas</h2>
    <form method="post" name="form1">
        <div class="form-group">
            <label for="kode_petugas">Kode Petugas: </label>
            <input type="text" required name="kode_petugas" class="form-control">
        </div>
        <div class="form-group">
            <label for="nama">Nama : </label>
            <input type="text" required name="nama" class="form-control">
        </div>
        <div class="form-group">
            <label for="jabatan">Jabatan :</label>
            <input type="text" required name="jabatan" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password: </label>
            <input type="password" required name="password" class="form-control">
        </div>
        <div class="form-check mb-3">
            <button class="btn btn-success" name="btnsimpan" value="btnsimpan" type="submit">Simpan</button>
            <button class="btn btn-danger" type="reset">Reset</button>
            <a href="petugas.php" class="btn btn-primary">Data Petugas</a>
        </div>
    </form>
</div>

<!-- Bootstrap core JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
