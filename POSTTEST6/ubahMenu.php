<?php
require "function.php";

$id = $_GET["id"];

$queryUbah = mysqli_query($conn, "SELECT * FROM menu WHERE id_menu = $id");
$menu = mysqli_fetch_assoc($queryUbah);

if (isset($_POST["kirim"])) {
    $id = $_POST["id"];
    $nama_dessert = htmlspecialchars($_POST["nama"]);
    $deskripsi = htmlspecialchars($_POST["deskripsi"]);
    $harga = $_POST["harga"];
    if ($_FILES["gambar"]["name"]) {
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
            $query = mysqli_query($conn, "UPDATE menu SET nama = '$nama_dessert', harga = $harga, deskripsi = '$deskripsi', gambar = '$nm_gambar' WHERE id_menu = $id");
            if ($query) {
                echo "
                <script>
                    alert('Berhasil Mengubah Menu!');
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
    } else {
        $query = mysqli_query($conn, "UPDATE menu SET nama = '$nama_dessert', harga = $harga, deskripsi = '$deskripsi' WHERE id_menu = $id");
        if ($query) {
            echo "
                <script>
                    alert('Berhasil Mengubah Menu!');
                    document.location.href = 'menu.php';
                </script>
                ";
        }
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
        <input type="hidden" name="id" value="<?= $id ?>">
        <label for="gambar">Foto Dessert:</label>
        <input type="file" name="gambar" id="gambar" accept="image/*">
        <label for="nama">Nama Dessert:</label>
        <input type="text" value="<?= $menu["nama"] ?>" id="nama" name="nama" required><br><br>
        <label for="deskripsi">Deskripsi Dessert:</label>
        <textarea name="deskripsi" id="deskripsi" cols="45" rows="10" required><?= $menu["deskripsi"] ?></textarea><br><br>
        <label for="harga">Harga Dessert:</label>
        <input type="number" value="<?= $menu["harga"] ?>" id="harga" name="harga" required><br><br>

        <input type="submit" name="kirim">

    </form>
    </form>
</body>

</html>