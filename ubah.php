<?php
session_start();
require 'functions.php';

if ( !isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;

}

//ambil data di url
$id = $_GET["id"];

$sps = query("SELECT * FROM spesifikasi WHERE id = $id")[0];

if( isset($_POST["submit"]) ) {

    if(ubah($_POST) > 0 ) {
        echo "
            <script>
                alert('Data Berhasil Diubah');
                document.location.href = 'index.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Data Gagal Diubah');
                document.location.href = 'index.php';
            </script>
        ";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/ubah.css">
</head>
<body>
    <div class=container col-8>
        <h1 class="text-center pt-4">Ubah Data Mobil</h1>
            <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $sps["id"];?>">
            <input type="hidden" name="GambarLama" value="<?= $sps['Gambar'] ;?>">
            <ul style="list-style-type: none;">
            <div class="mb-3">
                <label for="kategori_id" class="form-label">Kategori_id</label>
                <select name="kategori_id" id="kategori_id" class="form-control"  value="<?= $sps["kategori_id"]; ?>">
                    <option value="1">Matic</option>
                    <option value="2">Manual</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="Gambar" class="form-label">Gambar</label> <br>
                    <img src="img/<?= $sps['Gambar']; ?>" width="200" he-2> <br>
                    <input type="file" name="Gambar" id="Gambar" value="<?= $sps["Gambar"]; ?>"> <br>
            </div>
            <div class="mb-3 ">
                <label for="Merek" class="form-label">Merek</label>
                <input type="text" name="Merek" id="Merek" class="form-control" value="<?= $sps["Merek"]; ?>">
            </div>
            <div class="mb-3">
                <label for="Harga" class="form-label">Harga</label>
                <input type="text" name="Harga" id="Harga" class="form-control" value="<?= $sps["Harga"]; ?>">
            </div>
            <div class="mb-3">
                <label for="Launching" class="form-label">Launching</label>
                <input type="text" name="Launching" id="Launching" class="form-control" value="<?= $sps["Launching"]; ?>">
            </div>
            <div class="mb-3">
                <label for="Mesin" class="form-label">Mesin</label>
                <input type="text" name="Mesin" id="Mesin" class="form-control" value="<?= $sps["Mesin"]; ?>">
            </div>
            <div class="mb-3">   
                <label for="Deskripsi">Deskripsi</label>
                <input type="text" name="Deskripsi" id="Deskripsi" class="form-control" value="<?= $sps["Deskripsi"]; ?>">
            </div>
            <div class="mb-3">
                <button type="submit" name="submit">Ubah Data</button>
            </div>
            </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>