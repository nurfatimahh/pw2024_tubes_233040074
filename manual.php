<?php 

include 'functions.php';

$kategori = $_GET['kategori_id'];

$spesifikasi = query("SELECT * FROM spesifikasi WHERE kategori_id = $kategori");

//ketika tombol cari diklik 

if (isset($_POST["cari"])) {
    $sps = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manual</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <!-- css -->
    <link rel="stylesheet" href="./css/tampilan.css">
</head>
<body>

 <!-- navar -->
 <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">SportAutoExpo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#Home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#About">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Collections">Collection</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Category">Category</a>
                    </li>
                    <li class="nav-item">
                    <li><a class="nav-link" href="login.php">Login</a>
                    </li>
                </ul>
                </li>
                </ul>
               
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->

<div class="container mt-4">
    <div class="row">

        <!-- colections -->
        <section id="Collections">
            <div class="container" id="container">
                <div class="row text-center ">
                    <div class="col">
                        <h1>Colections Manual</h1>
                    </div>
                </div>
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
            </div>
        </section>
    </div>
        <!-- akhir collections -->
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
</body>
</html>