<?php
session_start();
require 'functions.php';

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

//ambil data di url
$users = query("SELECT * FROM users")[0];

if (isset($_POST["submit"])) {

    if (ubahprofile($_POST) > 0) {
        echo "
            <script>
                alert('Profile Berhasil Diubah');
                document.location.href = 'profile.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Profile Gagal Diubah');
                document.location.href = 'profile.php';
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
    <title>Ubah Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/ubahprofile.css">
</head>

<body>
    <div class=container col-8>
        <h1 class="text-center pt-4">Ubah Profile</h1>
                <div class="mb-3">
                    <label for="Username" class="form-label">Username</label>
                    <input type="text" name="Username" class="form-control" value="<?= $users["username"]; ?>">
                </div>
                <div class="mb-3">
                    <label for="Password">Password</label>
                    <input type="Password" name="Password" class="form-control">
                </div>
                <div class="mb-3">
                <button type="submit" class="btn btn-primary" name="login">Ubah Profile</button>
                </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>