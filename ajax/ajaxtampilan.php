<?php
require '../functions.php';
$keyword = $_GET["keyword"];

$query = "SELECT * FROM spesifikasi WHERE
        kategori_id LIKE '%$keyword%' OR
        Merek LIKE '%$keyword%' OR
        Harga LIKE '%$keyword%' OR
        Launching LIKE '%$keyword%' OR
        Mesin LIKE '%$keyword%' OR
        Deskripsi LIKE '%$keyword%'
    ";
    $spesifikasi = query($query); 
?>
<table class="table table-bordered m-4">
      <thead>
        <tr>
          <th scope="coll">No</th>
          <th scope="coll">kategori_id</th>
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
            <th scope="row"><?=$i++; ?></th>
            <td><?= $sps ['kategori_id'];?></td>
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
        <?php endforeach; ?>
    </tbody>
</table>