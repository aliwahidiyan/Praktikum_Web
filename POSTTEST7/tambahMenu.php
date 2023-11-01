<?php

require "function.php";
if (isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

if ($_SESSION["type"] != "admin") {
    header("Location:index.php");
    exit;
}

$stmt = mysqli_query($conn, "SELECT * FROM menu");

if (isset($_POST["kirim"])) {
    $nama_dessert = htmlspecialchars($_POST["nama"]);
    $deskripsi = htmlspecialchars($_POST["deskripsi"]);
    $harga = $_POST["harga"];
    $gambar = $_FILES["gambar"]["name"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    $ekstensigmbr = explode(".", $gambar);
    $ekstensigmbr = strtolower(end($ekstensigmbr));
    $nm_gambar = date('Y-m-d');
    $nm_gambar .= ".";
    $nm_gambar .= strtolower($nama_dessert) . "-file";
    $nm_gambar .= ".";
    $nm_gambar .= $ekstensigmbr;
    // menyimpan gambar yang diupload pada folder img/data/
    if (move_uploaded_file($tmpName, 'img/data/' . $nm_gambar)) {
        $query = mysqli_query($conn, "INSERT INTO menu VALUES(NULL,'$nama_dessert',$harga,'$deskripsi','$nm_gambar')");
        if ($query) {
            echo "
            <script>
                alert('Berhasil Menambahkan Menu!');
                document.location.href = 'menu.php';
            </script>
            ";
        }
    } else {
        echo "
        <script>
            alert('Data gagal ditambahkan!');
            document.location.href = 'tambahMenu.php';
        </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formstyle.css">
    <title>Toko Dessert</title>
</head>

<body>
    <h2>Tambah menu dengan mengisi form ini!</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <label for="gambar">Foto Dessert:</label>
        <input type="file" name="gambar" id="gambar" accept="image/*">
        <label for="nama">Nama Dessert:</label>
        <input type="text" id="nama" name="nama" required><br><br>
        <label for="deskripsi">Deskripsi Dessert:</label>
        <textarea name="deskripsi" id="deskripsi" cols="45" rows="10"></textarea><br><br>
        <label for="harga">Harga Dessert:</label>
        <input type="number" id="harga" name="harga" required><br><br>

        <input type="submit" name="kirim">

    </form>
    </form>
</body>

</html>