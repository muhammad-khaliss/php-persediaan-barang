<?php
require_once('koneksi.php');

// Mengecek apakah tombol "Simpan" sudah ditekan
if (isset($_POST['btnsimpan']) && $_POST['btnsimpan'] == 'btnsimpan') {
    $KodeSupplier = trim($_POST['kode_supplier']);
    $Nama = trim($_POST['nama']);
    $Alamat = trim($_POST['alamat']);
    $Telp = trim($_POST['telp']);
    
    // Query untuk mengupdate data supplier
    $query_sql = "UPDATE tb_supplier SET nama='$Nama', alamat='$Alamat', telp='$Telp' WHERE kode_supplier='$KodeSupplier'";
    $sql = mysqli_query($koneksi, $query_sql) or die(mysqli_error($koneksi));
    
    if ($sql) {
        echo "<script> alert('Berhasil simpan.') </script>";
        echo "<script>window.location.href='supplier.php'</script>";
    }
}

// Menangani jika id tidak ada atau tidak valid
if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan.";
    exit;
}

$KodeSupplier = $_GET['id'];

// Query untuk mengambil data supplier berdasarkan KodeSupplier
$query_sql = "SELECT * FROM tb_supplier WHERE kode_supplier ='$KodeSupplier'";
$sql = mysqli_query($koneksi, $query_sql) or die(mysqli_error($koneksi));
$data = mysqli_fetch_assoc($sql);

// Jika data tidak ditemukan
if (!$data) {
    echo "Data supplier tidak ditemukan.";
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Aplikasi PHP MySQL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php require_once('menu.php'); ?>
<br>
<div class="container">
    <h2>Edit Data Supplier</h2>
    <form method="post" name="form1">
        <div class="mb-3">
            <label for="kode_supplier" class="form-label">Kode Supplier: </label>
            <input type="text" disabled value="<?php echo $data['kode_supplier']; ?>" name="kode_supplier" class="form-control">
            <input type="hidden" value="<?php echo $data['kode_supplier']; ?>" name="kode_supplier">
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama: </label>
            <input type="text" required value="<?php echo $data['nama']; ?>" name="nama" class="form-control">
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat: </label>
            <input type="text" required value="<?php echo $data['alamat']; ?>" name="alamat" class="form-control">
        </div>
        <div class="mb-3">
            <label for="telp" class="form-label">Telp: </label>
            <input type="text" required value="<?php echo $data['telp']; ?>" name="telp" class="form-control">
        </div>
        <div class="mb-3">
            <button class="btn btn-success" name="btnsimpan" value="btnsimpan" type="submit">Simpan</button>
            <button class="btn btn-danger" type="reset">Reset</button>
            <a href="supplier.php"><button class="btn btn-primary" type="button">Data Supplier</button></a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
