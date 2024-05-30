<?php
$conn = mysqli_connect ('localhost', 'root', '','pw2024_tubes_233040074');
   return $conn;


function query($query) {
    global $conn;

    $result = mysqli_query($conn, $query);

    $rows = [];
    
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    };

    return $rows;
}

function tambah($data) {
    global $conn;

    $Merek = htmlspecialchars($data["Merek"]);
    $Harga = htmlspecialchars($data["Harga"]);
    $Varian = htmlspecialchars($data["Varian"]);
    $BBM = htmlspecialchars($data["BBM"]);
    $Launching = htmlspecialchars($data["Launching"]);
    $Mesin = htmlspecialchars($data["Mesin"]);
    $Tenaga = htmlspecialchars($data["Tenaga"]);
    $Deskripsi = htmlspecialchars($data["Deskripsi"]);
    $Gambar = upload();


    $query = "INSERT INTO spesifikasi
                VALUES
                     (NULL, '$Merek', '$Harga', '$Varian', '$BBM', '$Launching', '$Mesin', '$Tenaga', '$Deskripsi', '$Gambar')
                        ";
                        

mysqli_query($conn, $query);

return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;

    $id = $data["id"];
    $Merek = htmlspecialchars($data["Merek"]);
    $Harga = htmlspecialchars($data["Harga"]);
    $Varian = htmlspecialchars($data["Varian"]);
    $BBM = htmlspecialchars($data["BBM"]);
    $Launching = htmlspecialchars($data["Launching"]);
    $Mesin = htmlspecialchars($data["Mesin"]);
    $Tenaga = htmlspecialchars($data["Tenaga"]);
    $GambarLama = htmlspecialchars($data["GambarLama"]);

    $Gambar = htmlspecialchars($data["Gambar"]);

    if ($_FILES['Gambar']['error'] === 4) {
        $Gambar = $GambarLama;
    } else {
        $Gambar = upload();
    }
    $query = "UPDATE spesifikasi SET
                Merek = '$Merek',
                Harga = '$Harga',
                Varian = '$Varian',
                BBM = '$BBM',
                Launching = '$Launching',
                Mesin = '$Mesin',
                Tenaga = '$Tenaga',
                Gambar = '$Gambar'
                WHERE id = $id
                ";

mysqli_query($conn, $query);

return mysqli_affected_rows($conn);
}

function upload() {
    $namaFile = $_FILES['Gambar']['name'];
    $ukuranFile = $_FILES['Gambar']['size'];
    $error = $_FILES['Gambar']['error'];
    $tmpName = $_FILES['Gambar']['tmp_name'];

    if ($error === 4) {
        echo "<script>
                alert('Pilih gambar terlebih dahulu!');
                </script>";
        return false;
    }
    
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('Yang anda upload bukan gambar!');
                </script>";
        return false;
    }

    //cek jika ukuran terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>
                alert('Ukuran gambar terlalu besar!');
                </script>";
        return false;
    }
    
    //lolos pengecekan, gambar siap diupload
    //generate nama gambar
    $namaFileBaru = uniqid();
    $namaFileBaru.= '.';
    $namaFileBaru.= $ekstensiGambar;
    move_uploaded_file($tmpName, 'img/'. $namaFileBaru);
    return $namaFileBaru;
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM spesifikasi WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function cari($keyword) {
    $query = "SELECT * FROM spesifikasi
                WHERE
                Merek LIKE '%$keyword%' OR
                Harga LIKE '%$keyword%' OR
                Varian LIKE '%$keyword%' OR
                BBM LIKE '%$keyword%' OR
                Launching LIKE '%$keyword%' OR
                Mesin LIKE '%$keyword%' OR
                Tenaga LIKE '%$keyword%' OR
                Gambar LIKE '%$keyword%'
                ";
    return query($query);
}

function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);


    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambah user baru
    mysqli_query($conn, "INSERT INTO users VALUES(NULL, '$username', '$password')");

    return mysqli_affected_rows($conn);

    //cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Username sudah terdaftar!');
                </script>";
        return false;
    }

    //cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
                alert('Konfirmasi password tidak sesuai!');
                </script>";
        return false;
    }
}
?>  