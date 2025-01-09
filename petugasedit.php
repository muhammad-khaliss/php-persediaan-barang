<?php
    require_once('koneksi.php');

    // Cek jika 'id' tersedia di URL
    $KodePetugas = isset($_GET['id']) ? $_GET['id'] : null;
    if ($KodePetugas === null) {
        echo "<script>alert('ID tidak ditemukan!'); window.location.href='petugas.php';</script>";
        exit;
    }

    if (isset($_POST['btnsimpan']) && $_POST['btnsimpan'] == 'btnsimpan') {
        $KodePetugas = trim($_POST['kode_petugas']);
        $Nama = trim($_POST['nama']);
        $Jabatan = trim($_POST['jabatan']);
    
        $query_sql = "UPDATE tb_petugas SET nama='$Nama', jabatan='$Jabatan' 
                      WHERE kode_petugas='$KodePetugas'";
        $sql = mysqli_query($koneksi, $query_sql) or die(mysqli_error($koneksi));
        if ($sql) {
            echo "<script>alert('Berhasil simpan.'); window.location.href='petugas.php';</script>";
            exit;
        }
    }

    // Query untuk mengambil data berdasarkan ID
    $query_sql = "SELECT * FROM tb_petugas WHERE kode_petugas='$KodePetugas'";
    $sql = mysqli_query($koneksi, $query_sql) or die(mysqli_error($koneksi));

    if ($sql && mysqli_num_rows($sql) > 0) {
        $data = mysqli_fetch_assoc($sql);
    } else {
        echo "<script>alert('Data tidak ditemukan!'); window.location.href='petugas.php';</script>";
        exit;
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Data Petugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php require_once('menu.php'); ?>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Data Petugas</h2>
        <form method="post" name="form1">
            <div class="mb-3">
                <label for="kode_petugas" class="form-label"><b>Kode Petugas :</b></label>
                <input type="text" disabled value="<?php echo htmlspecialchars($data['kode_petugas']); ?>" 
                    class="form-control">
                <input type="hidden" name="kode_petugas" value="<?php echo htmlspecialchars($data['kode_petugas']); ?>">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label"><b>Nama :</b></label>
                <input type="text" required name="nama" value="<?php echo htmlspecialchars($data['nama']); ?>" 
                    class="form-control">
            </div>
            <div class="mb-3">
                <label for="jabatan" class="form-label"><b>Jabatan :</b></label>
                <input type="text" required name="jabatan" value="<?php echo htmlspecialchars($data['jabatan']); ?>" 
                    class="form-control">
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-success" name="btnsimpan" value="btnsimpan" type="submit">Simpan</button>
                <button class="btn btn-danger" type="reset">Reset</button>
                <a href="petugas.php" class="btn btn-primary">Kembali</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
