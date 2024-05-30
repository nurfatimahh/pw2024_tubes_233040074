<?php
require 'functions.php';
session_start();


if ( !isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;

}
require 'functions.php';

//ambil data di url
$id = $_GET["id"];

$sps = query("SELECT * FROM spesifikasi WHERE id = $id") [0];

$mobil = query("SELECT * FROM mobil WHERE id = $id")[0];

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
</head>
<body>
    <h1>Ubah Data Mobil</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $sps["id"];?>"
        <input type="hidden" name="gambarLama" value="<?= $sps["gambar"];?>"
        <ul>
            <li>
                <label for="Merek">Merek : </label>
                <input type="text" name="Merek" id="Merek"
                value="<? $sps["Merek"]; ?>">
            </li>
            <li>
                <label for="Harga">Harga : </label>
                <input type="text" name="Harga" id="Harga"
                value="<? $sps["Harga"]; ?>">

            </li>
            <li>
                <label for="Varian">Varian : </label>
                <input type="text" name="Varian" id="Varian"
                value="<? $sps["Varian"]; ?>">
            </li>
            <li>
                <label for="BBM">BBM : </label>
                <input type="text" name="BBM" id="BBM">
            </li>
            <li>
                <label for="Launching">Launching : </label>
                <input type="text" name="Launching" id="Launching">
            </li>
            <li>
                <label for="Mesin">Mesin : </label>
                <input type="text" name="Mesin" id="Mesin">
            </li>
            <li>
                <label for="Tenaga ">Tenaga : </label>
                <input type="text" name="Tenaga" id="Tenaga ">
            </li>
            <li>
                <label for="Deskripsi">Deskripsi : </label>
                <input type="text" name="Deskripsi" id="Deskripsi">
            </li>
            <li>
    
                <label for="Gambar">Gambar : </label>
                <img src="/img/<?= $sps['Gambar']; ?>" width="40"> <br>
                <input type="file" name="Gambar" id="Gambar">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>
    </form>
    
</body>
</html>