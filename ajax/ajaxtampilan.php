<?php
require '../functions.php';
$keyword = $_GET["keyword"];

$query = "SELECT * FROM spesifikasi WHERE
            kategori_id LIKE '%$keyword%' OR
            Merek LIKE '%$keyword%' OR
            Deskripsi LIKE '%$keyword%'
    ";
    $spesifikasi = query($query); 
?>

    <div class="row justify-content-center">
        <?php foreach ($spesifikasi as $sps) : ?>
        <div class="card m-4" style="width: 18rem;">
            <img src="img/<?= $sps['Gambar']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h4 class="card-title"><?= $sps['Merek']; ?></h4>
                        <p class="card-text"><?= $sps['Deskripsi']; ?></p>
                </div>
        </div>
        <?php endforeach; ?>    
    </div>
