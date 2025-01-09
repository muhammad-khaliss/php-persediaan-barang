<?php
require_once('koneksi.php');  // Include the database connection
$query_sql = "SELECT * FROM tb_petugas";
$sql = $koneksi->query($query_sql);

$totaldata = $sql->num_rows;
?>

<!doctype html>
<html lang="en">
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Aplikasi PHP MySQL</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Optional theme for icons -->
  <link href="https://cdn.jsdelivr.net/npm/font-awesome/css/font-awesome.min.css" rel="stylesheet">
 </head>

 <body>
   <?php require_once('menu.php'); ?>
   <div class="container mt-4">
     <h2>Data Petugas</h2>
     <a href="petugastambah.php" class="btn btn-primary mb-3">Tambah Petugas</a>
     

     <?php if ($totaldata == 0) { ?>
       <div class="alert alert-warning" role="alert">Data kosong.</div>
     <?php } else { ?>
       <table class="table table-striped table-bordered">
         <thead class="table table-dark">
           <tr>
             <th>Ubah / Hapus</th>
             <th>Kode</th>
             <th>Nama</th>
             <th>Jabatan</th>
           </tr>
         </thead>
         <tbody>
           <?php while ($data = $sql->fetch_assoc()) { ?>
             <tr>
               <td>
                 <a href="petugasedit.php?id=<?php echo $data['kode_petugas']; ?>" class="btn btn-warning btn-sm">Ubah</a>
                 <a href="petugashapus.php?id=<?php echo $data['kode_petugas']; ?>" class="btn btn-danger btn-sm">Hapus</a>
               </td>
               <td><?php echo $data['kode_petugas']; ?></td>
               <td><?php echo $data['nama']; ?></td>
               <td><?php echo $data['jabatan']; ?></td>
             </tr>
           <?php } ?>
         </tbody>
       </table>
     <?php } ?>
   </div>

   <!-- Bootstrap 5 JS and dependencies -->
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
 </body>
</html>
