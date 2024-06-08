<?php
require 'functions.php';
if( isset($_POST["cari"]) ) {
  $spesifikasi = cari($_POST["keyword"]);
}

$spesifikasi = query("SELECT a.*, b.nama AS nama_kategori FROM spesifikasi a JOIN kategori b ON a.kategori_id=b.id"); 
$kategori = query("SELECT * FROM kategori");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=">
    <title>Halaman Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
 
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top" style="background: linear-gradient(rgb(232, 136, 152), rgb(90, 90, 242))">
        <div class="container">
          <a class="navbar-brand" href="#">Aston Martin</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="tampilan.php" target="_blank">Halaman User</a>
              </li>
              <a class="nav-link" href="tampilan.php" target="_blank">Cetak</a>
              </li>
            </ul>
            <form class="d-flex" action="" method="POST">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword" id="keyword" autocomplete="off">
              <button class="btn btn-outline-success me-4 tombol-cari" type="submit" name="cari">Search</button>
            </form>
            <button type="submit" class="btn btn-dark ">
              <a class="text-decoration-none" href="logout.php">LOGOUT</a>
            </button>
        </div>
    </div>
  </div>
</nav>
<!-- Akhir Navbar -->
  
<div class="container">
  <br>
  <h1 class="mt-4 pt-4 text-center">Daftar Mobil</h1>
  <a href="tambah.php" class="btn btn-primary" style="margin-right: 10px;">Tambah Data Mobil</a>
  <br>
  <div class="container" id="container">
    <table class="table table-bordered m-4">
      <thead>
        <tr>
          <th scope="coll">No</th>
          <th scope="coll">kategori</th>
          <th scope="coll">Gambar</th>
          <th scope="coll">Merek</th>
          <th scope="coll">Harga</th>
          <th scope="coll">Launching</th>
          <th scope="coll">Mesin</th>
          <th scope="coll">Deskripsi</th>
          <th scope="coll">Aksi</th>
        <tr>
      </thead>
      <tbody>
        <?php $i = 1 ; ?>
        
        <?php foreach ($spesifikasi as $sps): ?>

        <tr>
            <th scope="row"><?=$i;?></th>
            <td><?= $sps ['nama_kategori'];?></td>
            <td> <img src="img/<?= $sps ['Gambar']; ?>" width="100"></td>
            <td><?= $sps ['Merek'];?></td>
            <td><?= $sps ['Harga'];?></td>
            <td><?= $sps ['Launching'];?></td>
            <td><?= $sps ['Mesin'];?></td>
            <td><?= $sps ['Deskripsi'];?></td>

          <td>
                <a href="ubah.php?id=<?= $sps["id"];?>" class="badge text-bg-warning text-decoration-none">edit</a> 
                <a href="hapus.php?id=<?= $sps["id"];?>" onclick="return confirm('yakin');" class="badge text-bg-danger text-decoration-none">hapus</a>
          </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
        
      </tbody>
    </table>
  </div>
</div>

    <script src="js/scriptuser.js"></script>
  </body>
</html> 