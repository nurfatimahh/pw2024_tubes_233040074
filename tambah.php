<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'functions.php';

if (isset($_POST["submit"])) {

    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
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
    <link rel="stylesheet" href="css/tambah.css">
</head>

<body>
    <div class=container col-8>
        <h1 class="text-center pt-4">Tambah Data Mobil</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3 ">
                <label for="Merek" class="form-label">Merek</label>
                <input type="text" name="Merek" id="Merek" class="form-control">
            </div>
            <div class="mb-3">
                <label for="Harga" class="form-label">Harga</label>
                <input type="text" name="Harga" id="Harga" class="form-control">
            </div>
            <div class="mb-3">
                <label for="Launching" class="form-label">Launching</label>
                <input type="text" name="Launching" id="Launching" class="form-control">
            </div>
            <div class="mb-3">
                <label for="Mesin" class="form-label">Mesin</label>
                <input type="text" name="Mesin" id="Mesin" class="form-control">
            </div>
            <div class="mb-3">
                <label for="Deskripsi" class="form-label">Deskripsi</label>
                <input type="text" name="Deskripsi" id="Deskripsi" class="form-control">
            </div>
            <div class="mb-3">
                <label for="kategori_id" class="form-label">kategori_id</label>
                <select name="kategori_id" id="kategori_id" class="form-control">
                    <option value="1">Matic</option>
                    <option value="2">Manual</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="Gambar" class="form-label">Gambar</label>
                <input type="file" name="Gambar" id="Gambar" class="form-control">
            </div>
            <div class="mb-3">
                <button type="submit" name="submit">Tambah Data</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>