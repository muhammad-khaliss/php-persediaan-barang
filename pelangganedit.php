<?php
require_once('koneksi.php');

if(isset($_POST['btsimpan']) == 'btsimpan') {
    $KodePelanggan = trim($_POST['kode_pelanggan']);
    $Nama = trim($_POST['nama']);
    $Alamat = trim($_POST['alamat']);
    $Telp = trim($_POST['telp']);

    $query_sql = "UPDATE tb_pelanggan SET nama='$Nama', alamat='$Alamat', telp='$Telp' 
                  WHERE kode_pelanggan='$KodePelanggan'";
    $sql = mysqli_query($koneksi, $query_sql) or die(mysqli_error($koneksi));
    if($sql) {
        echo "<script>alert('Berhasil simpan.')</script>";
        echo "<script>window.location.href='pelanggan.php'</script>";
    }
}

$KodePelanggan = isset($_GET['id']) ? $_GET['id'] : null;

if ($KodePelanggan) {
    $query_sql = "SELECT * FROM tb_pelanggan WHERE kode_pelanggan='$KodePelanggan'";
    $sql = mysqli_query($koneksi, $query_sql) or die(mysqli_error($koneksi));
    $data = mysqli_fetch_assoc($sql);
} else {
    $data = [
        'kode_pelanggan' => '',
        'nama' => '',
        'alamat' => '',
        'telp' => ''
    ];
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
    <h2 class="my-4">Edit Data Pelanggan</h2>

    <form method="post" name="form1">
        <div class="mb-3">
            <label for="kode_pelanggan" class="form-label">Kode Pelanggan:</label>
            <input type="text" class="form-control" id="kode_pelanggan" value="<?php echo htmlspecialchars($data['kode_pelanggan']); ?>" disabled>
            <input type="hidden" name="kode_pelanggan" value="<?php echo htmlspecialchars($data['kode_pelanggan']); ?>">
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($data['nama']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat:</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo htmlspecialchars($data['alamat']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="telp" class="form-label">Telp:</label>
            <input type="text" class="form-control" id="telp" name="telp" value="<?php echo htmlspecialchars($data['telp']); ?>" required>
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success" name="btsimpan" value="btsimpan">Simpan</button>
            <button type="reset" class="btn btn-danger">Reset</button>
            <a href="pelanggan.php" class="btn btn-primary">Data Pelanggan</a>
        </div>
    </form>
</div>

<!-- Bootstrap core JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
