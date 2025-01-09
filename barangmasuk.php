<?php
require_once('koneksi.php');

// Ambil data barang dan supplier untuk ditampilkan pada form
$query_barang = "SELECT * FROM tb_barang";
$sql_barang = mysqli_query($koneksi, $query_barang);

$query_supplier = "SELECT * FROM tb_supplier";
$sql_supplier = mysqli_query($koneksi, $query_supplier);

// Proses form jika disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kode_barang = $_POST['kode_barang'];
    $kode_supplier = $_POST['kode_supplier'];
    $jumlah = $_POST['jumlah'];
    $petugas = $_POST['petugas'];
    $tanggal = date('Y-m-d H:i:s');
    
    // Insert data barang masuk ke tabel barang_masuk
    $query_insert = "INSERT INTO tb_barang_masuk (tanggal, kode_barang, kode_supplier, jumlah, petugas)
                     VALUES ('$tanggal', '$kode_barang', '$kode_supplier', '$jumlah', '$petugas')";
    mysqli_query($koneksi, $query_insert);

    // Update stok barang di tabel tb_barang
    $query_update = "UPDATE tb_barang SET stok = stok + $jumlah WHERE kode_barang = '$kode_barang'";
    mysqli_query($koneksi, $query_update);

    echo "<script>alert('Barang berhasil ditambahkan!'); window.location = 'barangmasuk.php';</script>";
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Barang Masuk</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php require_once('menu.php'); ?>
<br>
<div class="container">
    <h2 class="my-4">Barang Masuk</h2>
    <form action="barangmasuk.php" method="POST">
        <div class="mb-3">
            <label for="kode_barang" class="form-label">Kode Barang</label>
            <select class="form-control" id="kode_barang" name="kode_barang" required>
                <?php while ($barang = mysqli_fetch_assoc($sql_barang)): ?>
                    <option value="<?php echo $barang['kode_barang']; ?>"><?php echo $barang['kode_barang']; ?> - <?php echo $barang['nama']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="kode_supplier" class="form-label">Kode Supplier</label>
            <select class="form-control" id="kode_supplier" name="kode_supplier" required>
                <?php while ($supplier = mysqli_fetch_assoc($sql_supplier)): ?>
                    <option value="<?php echo $supplier['kode_supplier']; ?>"><?php echo $supplier['kode_supplier']; ?> - <?php echo $supplier['nama']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah Barang Masuk</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" required>
        </div>

        <div class="mb-3">
            <label for="petugas" class="form-label">Nama Petugas</label>
            <input type="text" class="form-control" id="petugas" name="petugas" required>
        </div>

        <button type="submit" class="btn btn-primary">Tambah Barang Masuk</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
