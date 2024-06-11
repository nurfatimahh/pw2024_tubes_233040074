<?php
require 'functions.php';
if (isset($_POST["cari"])) {
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
  <style>
    @media print {
      @page {
        margin: 0;
      }
    }

    .navbar-nav .nav-link[onclick="window.print();"] {
      cursor: pointer;
    }

    /* .btn {
      margin-top: 1rem;
    } */
  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top d-print-none" style="background: linear-gradient(rgb(232, 136, 152), rgb(90, 90, 242))">
    <div class="container">
      <a class="navbar-brand" href="#">SportAutoExpo</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="tampilan.php" target="_blank">Halaman User</a>
          </li>
          <!-- <button class=btn btn-primary onclick="window.print();">Print</button> -->
          <a class="nav-link" onclick="window.print();">Cetak</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profile.php" target="_blank">Profile</a>
          </li>
        </ul>
        <form class="d-lg-flex flex-wrap flex-lg-nowrap" action="" method="POST">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword" id="keyword" autocomplete="off">
          <button class="btn btn-outline-success me-4 d-none  tombol-cari" type="submit" name="cari">Search</button>
          <br>
          <button type="submit mt-md-2 m-sm-4" class="btn btn-dark ">
            <a class="text-decoration-none" href="logout.php">LOGOUT</a>
          </button>
        </form>
      </div>
    </div>
    </div>
  </nav>
  <!-- Akhir Navbar -->

  <div class="container">
    <br>
    <h1 class="mt-4 pt-4 text-center">Daftar Mobil</h1>
    <a href="tambah.php" class="btn btn-primary d-print-none">Tambah Data Mobil</a>
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
            <th class="d-print-none" scope="coll">Aksi</th>
          <tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>

          <?php foreach ($spesifikasi as $sps) : ?>

            <tr>
              <th scope="row"><?= $i; ?></th>
              <td><?= $sps['nama_kategori']; ?></td>
              <td> <img src="img/<?= $sps['Gambar']; ?>" width="100"></td>
              <td><?= $sps['Merek']; ?></td>
              <td><?= $sps['Harga']; ?></td>
              <td><?= $sps['Launching']; ?></td>
              <td><?= $sps['Mesin']; ?></td>
              <td><?= $sps['Deskripsi']; ?></td>

              <td class="d-print-none">
                <a href="ubah.php?id=<?= $sps["id"]; ?>" class="badge text-bg-warning text-decoration-none">edit</a>
                <a href="hapus.php?id=<?= $sps["id"]; ?>" onclick="return confirm('yakin');" class="badge text-bg-danger text-decoration-none">hapus</a>
              </td>
            </tr>
            <?php $i++; ?>
          <?php endforeach; ?>

        </tbody>
      </table>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <script src="js/scriptuser.js"></script>
</body>

</html>