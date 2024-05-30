<?php
require 'functions.php';
if( isset($_POST["cari"]) ) {
  $spesifikasi = cari($_POST["keyword"]);
}

$spesifikasi = query("SELECT * FROM spesifikasi");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=">
    <title>Halaman Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<a href="logout.php">logout</a>

  <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="..." class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="..." class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="..." class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  
<!-- Navbar -->
<!-- <nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top"
    style="background-color:rgb(130, 158, 235)">
        <div class="container">
          <a class="navbar-brand" href="#">Nurfatimah</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#about"> About</a>
              </li>
              <a class="nav-link" href="#hobby">Hobby</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#gallery">Gallery</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contact">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </nav> -->
    <!-- Akhir Navbar -->
    
<div class="container">
  <h1>Daftar Mobil</h1>
  <a href="tambah.php" >Tambah Data Mobil</a>
  <br><br>
  <form action="" method="post">
    <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off">
    <button type="submit" name="cari">Cari!</button>
  </form>
  <br>
  <table class="table"
    <thead>
      <tr>
        <th scope="coll">No</th>
        <th scope="coll">Gambar</th>
        <th scope="coll">Merek</th>
        <th scope="coll">Harga</th>
        <th scope="coll">Varian</th>
        <th scope="coll">BBM</th>
        <th scope="coll">Launching</th>
        <th scope="coll">Mesin</th>
        <th scope="coll">Tenaga</th>
        <th scope="coll">Deskripsi</th>
        <th scope="coll">Aksi</th>
      <tr>
    </thead>
    <tbody>
      <?php $i = 1 ; ?>
      
      <?php foreach ($spesifikasi as $sps): ?>

      <tr>
          <th scope="row"><?=$i;?></th>
          <td> <img src="img/<?= $sps ['Gambar']; ?>" width="100"></td>
          <td><?= $sps ['Merek'];?></td>
          <td><?= $sps ['Harga'];?></td>
          <td><?= $sps ['Varian'];?></td>
          <td><?= $sps ['BBM'];?></td>
          <td><?= $sps ['Launching'];?></td>
          <td><?= $sps ['Mesin'];?></td>
          <td><?= $sps ['Tenaga'];?></td>
          <td><?= $sps ['Deskripsi'];?></td>

        <td>
              <a href="ubah.php?id=<?= $sps["id"];?>" onclick="return confirm('yakin');" class="badge text-bg-warning text-decoration-none">update</a> 
              <a href="hapus.php?id=<?= $sps["id"];?>" onclick="return confirm('yakin');" class="badge text-bg-danger text-decoration-none">hapus</a>
        </td>
      </tr>
      <?php $i++; ?>
      <?php endforeach; ?>
      
    </tbody>
  </table>
</div>


    <!-- <script src="https://cdn.jsdelivrnet/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
    <srcipt src="js/script.js"></script>
  </body>
</html> 