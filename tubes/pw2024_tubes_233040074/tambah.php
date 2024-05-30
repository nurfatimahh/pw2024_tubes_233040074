<?php
session_start();

if ( !isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;

}
require 'functions.php';

if( isset($_POST["submit"]) ) {

    if(tambah($_POST) > 0 ) {
        echo "
            <script>
                alert('Data Berhasil Ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Data Gagal Ditambahkan');
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
    <title>Tambah Data Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class=container col-8>
        <h1>Tambah Data Mobil</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="Merek">Merek : </label>
            <input type="text" name="Merek" id="Merek"><br>

        </div>
        <div class="mb-3">
            <label for="Harga">Harga : </label>
            <input type="text" name="Harga" id="Harga"><br>
        </div>
        <div class="mb-3">
            <label for="Varian">Varian : </label>
            <input type="text" name="Varian" id="Varian"><br>
        </div>
        <div class="mb-3">
            <label for="BBM">BBM : </label>
            <input type="text" name="BBM" id="BBM"><br>
        </div>
        <div class="mb-3">
            <label for="Launching">Launching : </label>
            <input type="text" name="Launching" id="Launching"><br>
        </div>
        <div class="mb-3">
            <label for="Mesin">Mesin : </label>
            <input type="text" name="Mesin" id="Mesin"><br>
        </div>
        <div class="mb-3">
            <label for="Tenaga"> Tenaga : </label>
            <input type="text" name="Tenaga" id="Tenaga"><br>
        </div>
        <div class="mb-3">   
            <label for="Deskripsi">Deskripsi : </label>
            <input type="text" name="Deskripsi" id="Deskripsi"><br>
        </div>
        <div class="mb-3">
            <label for="Gambar">Gambar : </label>
            <input type="file" name="Gambar" id="Gambar"><br>
        </div>
        <div class="mb-3">
            <button type="submit" name="submit">Tambah Data</button>
        </form>
    </div>
</body>
</html>

