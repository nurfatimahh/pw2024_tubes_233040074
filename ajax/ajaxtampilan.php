<?php
require 'functions.php';
$keyword =$_GET["keyword"];

$query = "SELECT * FROM spesifikasi WHERE
        kategori_id LIKE '%$keyword%' OR
        Varian LIKE '%$keyword%' OR
        Deskripsi LIKE '%$keyword%'
    ";
    $spesifikasi = query($query); 
?>


    <div class="container" id="container">
        <div class="row text-center ">
            <div class="col">
                <h1>Colections</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php foreach ($spesifikasi as $sps) : ?>
            <div class="card m-4" style="width: 18rem;">
                <img src="img/<?= $sps['Gambar']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title"><?= $sps['Varian']; ?></h4>
                        <p class="card-text"><?= $sps['Deskripsi']; ?></p>
                    </div>
            </div>
            <?php endforeach; ?>    
        </div>
    </div>