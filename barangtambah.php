<?php
require_once('koneksi.php');

if (isset($_POST['btnsimpan'])) {
    $KodeBarang = trim($_POST['kode_barang']);
    $Nama = trim($_POST['nama']);
    $KodeSupplier = trim($_POST['kode_supplier']);
    $Jenis = trim($_POST['jenis']);
    $HargaBeli = trim($_POST['harga_beli']);
    $HargaJual = trim( $_POST['harga_jual']);
    $Stok = trim($_POST['stok']);
    $Satuan = trim($_POST['satuan']);
    $Petugas = 'ADMIN';

    $query_sql = "SELECT * FROM tb_barang WHERE kode_barang='$KodeBarang'";
    $sql = mysqli_query($koneksi, $query_sql) or die(mysqli_error($koneksi));
    $totaldata = mysqli_num_rows($sql);

    if ($totaldata > 0) {
        echo "<script>alert('Data Barang sudah pernah ada.');</script>";
        echo "<script>window.location.href='barangtambah.php'</script>";
    } else {
        $query_sql = "INSERT INTO tb_barang (kode_barang, nama, kode_supplier, jenis, harga_beli, harga_jual, stok, satuan, petugas)
                      VALUES ('$KodeBarang', '$Nama', '$KodeSupplier', '$Jenis', '$HargaBeli', '$HargaJual', '$Stok', '$Satuan', '$Petugas')";
        $sql = mysqli_query($koneksi, $query_sql) or die(mysqli_error($koneksi));

        if ($sql) {
            echo "<script>alert('Berhasil simpan.');</script>";
            echo "<script>window.location.href='barang.php'</script>";
        }
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
    <link rel="icon" href="docs/5.0/assets/img/favicons/favicon.ico">

    <title>Aplikasi PHP MySQL</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <?php require_once('menu.php'); ?>
    <br>
    <div class="container">
      <h2 class="my-4">Tambah Data Barang</h2>
      <div class="col-lg-12">
        <form method="post" name="form1">
          <div class="card">
            <div class="card-header">
              Isi data barang
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="kode_barang" class="form-label">Kode Barang</label>
                    <input type="text" required name="kode_barang" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" required name="nama" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label for="harga_beli" class="form-label">Harga Beli</label>
                    <input type="text" required name="harga_beli" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label for="harga_jual" class="form-label">Harga Jual</label>
                    <input type="text" required name="harga_jual" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="kode_supplier" class="form-label">Kode Supplier</label>
                    <select class="form-select" name="kode_supplier">
                      <?php
                      $query_Rs_Qr_Sp = "SELECT * FROM tb_supplier ORDER BY kode_supplier ASC";
                      $Rs_Qr_Sp = mysqli_query($koneksi, $query_Rs_Qr_Sp) or die(mysqli_error());
                      while ($data = mysqli_fetch_array($Rs_Qr_Sp)) {
                      ?>
                        <option value="<?php echo $data['kode_supplier']; ?>">
                          <?php echo $data['kode_supplier']; ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="jenis" class="form-label">Jenis</label>
                    <input type="text" required name="jenis" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="text" required name="stok" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label for="satuan" class="form-label">Satuan</label>
                    <select class="form-select" name="satuan">
                      <option value="PCS">PCS</option>
                      <option value="KG">KG</option>
                      <option value="BAL">BAL</option>
                      <option value="DUS">DUS</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button class="btn btn-success" name="btnsimpan" value="btnsimpan" type="submit">Simpan</button>
              <button class="btn btn-danger" type="reset">Reset</button>
              <a href="barang.php" class="btn btn-primary">Data Barang</a>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
