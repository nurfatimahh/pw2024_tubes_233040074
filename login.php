<?php
session_start();
require 'functions.php';

// cek cookie

if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");

    //cek cookie
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($key === hash('sha256', $row['username'], time() + 60)) {
            $_SESSION["login"] = true;
        }
    }
}



if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    //cek username
    if (mysqli_num_rows($result) === 1) {
        // cek password
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row["password"])) {

            // set session
            $_SESSION["login"] = true;

            // cek remember me 
            if (isset($_POST['remember'])) {
                // buat cookie
                setcookie('id', $row['id'], time() + 60);
                setcookie('key', hash('sha256', $row['username']), time() + 60);
                setcookie('key', hash('sha256', $row['password']), time() + 60);
                setcookie('key', hash('sha256', $row['level']), time() + 60);
                setcookie('remember', true, time() + 60);
            }
            header("Location: admin.php");
            exit;
        }
    }

    $error = true;
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- feater icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- css -->
    <link rel="stylesheet" href="css/login.css">
</head>

<body class="body">
    <div class="login">
        <div class="card" style="width: 20rem;">
            <div class="kartu">
                <div class="card-body p-4 mb-3">
                    <h1 syle="top: 50px;">Login</h1>
                    <?php if (isset($error)) : ?>
                        <p style="color: red; font-style: italic;">username / password salah</p>
                    <?php endif; ?>
                    <form action="" method="post">
                        <ul style="list-style-type: none;">
                            <li>
                                <label for="username">Username : </label>
                                <input type="text" name="username" id="username">
                            </li>
                            <br>
                            <li>
                                <label for="password">Password : </label>
                                <input type="password" name="password" id="password">
                            </li>
                            <br>
                            <li>
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember">Remember Me</label>
                            </li>
                            <br>
                            <li style="margin-left: 4.5rem;">
                                <button type="submit" class="btn btn-dark" name="login">Login</button>
                            </li>
                            <div class="registerlink">
                                <p>Dont have an account? <a href="registrasi.php">Sign up</a></p>
                            </div>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <script type="module" src="https://cdn.jsdelivr.net/npm/ionicons@latest/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/ionicons@latest/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <!-- feather icons -->
    <script>
        feather.replace();
    </script>
</body>

</html>