<?php
require 'functions.php';
$keyword =$_GET["keyword"];

$query = "SELECT * FROM spesifikasi WHERE
        nama LIKE '%$keyword%' OR
        merk LIKE '%$keyword%' OR
        harga LIKE '%$keyword%'
    ";
    $spesifikasi = query($query); 
?>

<table class="table table-bordered m-4">
    <thead>
      <tr>
        <th scope="coll">No</th>
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
          <td> <img src="img/<?= $sps ['Gambar']; ?>" width="100"></td>
          <td><?= $sps ['Merek'];?></td>
          <td><?= $sps ['Harga'];?></td>
          <td><?= $sps ['Launching'];?></td>
          <td><?= $sps ['Mesin'];?></td>
          <td><?= $sps ['Deskripsi'];?></td>
        <td>
              <a href="ubah.php?id=<?= $sps["id"];?>" class="badge text-bg-warning text-decoration-none">update</a> 
              <a href="hapus.php?id=<?= $sps["id"];?>" onclick="return confirm('yakin');" class="badge text-bg-danger text-decoration-none">hapus</a>
        </td>
      </tr>
      <?php $i++; ?>
      <?php endforeach; ?>
      
    </tbody>
  </table>
  