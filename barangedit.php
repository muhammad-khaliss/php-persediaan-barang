<?php
require_once('koneksi.php');

if (isset($_POST['btnsimpan']) == 'btnsimpan') {
    $KodeBarang = trim($_POST['kode_barang']);
    $Nama = trim($_POST['nama']);
    $KodeSupplier = trim($_POST['kode_supplier']);
    $Jenis = trim($_POST['jenis']);
    $HargaBeli = trim($_POST['harga_beli']);
    $HargaJual = trim($_POST['harga_jual']);
    $Stok = trim($_POST['stok']);
    $Satuan = trim($_POST['satuan']);
    $Petugas = 'ADMIN';

    $query_sql = "UPDATE tb_barang SET nama='$Nama', kode_supplier='$KodeSupplier' ,jenis='$Jenis',
                  harga_beli='$HargaBeli', harga_jual='$HargaJual', stok='$Stok', satuan='$Satuan', petugas='$Petugas' 
                  WHERE kode_barang='$KodeBarang'";
    $sql = mysqli_query($koneksi, $query_sql) or die(mysqli_error($koneksi));

    if ($sql) {
        echo "<script>alert('Berhasil simpan.')</script>";
        echo "<script>window.location.href='barang.php';</script>";
    }
}

$KodeBarang = $_GET['id'];
$query_sql = "SELECT * FROM tb_barang WHERE  kode_barang='$KodeBarang'";
$sql = mysqli_query($koneksi, $query_sql) or die(mysqli_error($koneksi));
$data = mysqli_fetch_assoc($sql);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Data Barang</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <?php require_once('menu.php'); ?>

    <div class="container mt-5">
      <h2 class="mb-4">Edit Data Barang</h2>
      <form method="post">
        <div class="card">
          <div class="card-header">
            Ubah Data Barang
          </div>
          <div class="card-body">
            <div class="mb-3">
              <label for=" kode_barang" class="form-label">Kode Barang</label>
              <input type="text" class="form-control" disabled value="<?php echo $data['kode_barang']; ?>">
              <input type="hidden" name=" kode_barang" value="<?php echo $data['kode_barang']; ?>">
            </div>

            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>" required>
            </div>

            <div class="mb-3">
              <label for="harga_beli" class="form-label">Harga Beli</label>
              <input type="number" class="form-control" name="harga_beli" value="<?php echo $data['harga_beli']; ?>" required>
            </div>

            <div class="mb-3">
              <label for="harga_jual" class="form-label">Harga Jual</label>
              <input type="number" class="form-control" name="harga_jual" value="<?php echo $data['harga_jual']; ?>" required>
            </div>

            <div class="mb-3">
              <label for="kode_supplier" class="form-label">Kode Supplier</label>
              <select class="form-select" name="kode_supplier">
                <option value="<?php echo $data['kode_supplier']; ?>"><?php echo $data['kode_supplier']; ?></option>
                <?php
                $query_Rs_Qr_Sp = "SELECT * FROM tb_supplier ORDER BY kode_supplier ASC";
                $Rs_Qr_Sp = mysqli_query($koneksi, $query_Rs_Qr_Sp) or die(mysqli_error($koneksi));
                while ($data_sp = mysqli_fetch_array($Rs_Qr_Sp)) {
                    echo "<option value='{$data_sp['kode_supplier']}'>{$data_sp['kode_supplier']}</option>";
                }
                ?>
              </select>
            </div>

            <div class="mb-3">
              <label for="jenis" class="form-label">Jenis</label>
              <input type="text" class="form-control" name="jenis" value="<?php echo $data['jenis']; ?>" required>
            </div>

            <div class="mb-3">
              <label for="stok" class="form-label">Stok</label>
              <input type="number" class="form-control" name="stok" value="<?php echo $data['stok']; ?>" required>
            </div>

            <div class="mb-3">
              <label for="satuan" class="form-label">Satuan</label>
              <select class="form-select" name="satuan">
                <option value="<?php echo $data['satuan']; ?>"><?php echo $data['satuan']; ?></option>
                <option value="PCS">PCS</option>
                <option value="KG">KG</option>
                <option value="BAL">BAL</option>
                <option value="DUS">DUS</option>
              </select>
            </div>
          </div>

          <div class="card-footer">
            <button type="submit" name="btnsimpan" value="btnsimpan" class="btn btn-success">Simpan</button>
            <button type="reset" class="btn btn-danger">Reset</button>
            <a href="barang.php" class="btn btn-primary">Data Barang</a>
            <a href="pelanggan.php" class="btn btn-info">Data Pelanggan</a>
          </div>
        </div>
      </form>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
