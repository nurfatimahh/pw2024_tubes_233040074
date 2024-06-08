<?php 
include 'functions.php';

$spesifikasi = query("SELECT * FROM spesifikasi");

//ketika tombol cari diklik 

if( isset($_POST["cari"]) ) {
    $sps = cari($_POST["keyword"]);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampilan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/tampilan.css">
</head>
<body>

<!-- navar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#"><span class="text-warning">Aston</span>Martin</a>
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
            <a class="nav-link" href="#Picture">Picture</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
     </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
        </ul>
        <form class="d-flex" action="" method="POST">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword" id="keyword" autocomplete="off">
              <button class="btn btn-outline-success me-4 tombol-cari" type="submit" name="cari">Search</button>
            </form>
</div>
</div>
</nav>
<!-- akhir navbar -->

<!-- hero -->
<section id="Home">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="img/car bg.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption">
            <h5>Luxury British Sport Car</h5>
            <p>Some representative placeholder content for the first slide.</p>
        </div>
        </div>
        <div class="carousel-item">
        <img src="img/car bg.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption">
            <h5>The New Power Within</h5>
            <p>Some representative placeholder content for the second slide.</p>
        </div>
        </div>
        <div class="carousel-item">
        <img src="img/car bg.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption">
            <h5>The Louwman Museum The Hague</h5>
            <p>Some representative placeholder content for the third slide.</p>
        </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
</section> 
<!--  akhir hero -->

<!-- about -->
<section id="About" class="about">
        <div class="container">
            <div class="row text-center m-4">
                <div class="col">
                    <h1>About</h1>
                </div>
            </div>
            <div class="row text-center fs-5 justify-content-center">
                <div class="col-md-4 m-5">
                    <img src="img/foto1.jpg" class="img-fluid ">
                </div>
                <div class="col-md-4 m-5">
                    <p>lorrem </p>
                </div>
            </div>
        </div>
    </section>
<!-- akhir about -->

<!-- colections -->
<section id="Collections">
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
                        <h4 class="card-title"><?= $sps['Merek']; ?></h4>
                        <p class="card-text"><?= $sps['Deskripsi']; ?></p>
                    </div>
            </div>
            <?php endforeach; ?>    
        </div>
    </div>
</section>
<!-- akhir collections -->

<!-- picture -->

<!-- akhir picture -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/script1.js"></script>
</body>
</html>