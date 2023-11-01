<?php
session_start();
require "function.php";

$query = mysqli_query($conn, "SELECT * FROM menu");

while ($row = mysqli_fetch_assoc($query)) {
    $menus[] = $row;
}

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="stylemenu.css">
    <title>Daftar Menu Dessert</title>
</head>
<?php if (isset($_SESSION["type"])) : ?>
    <?php if ($_SESSION["type"] != "admin") : ?>
        <a href="daftarpsn.php">Buat Pesanan</a>
    <?php endif ?>
<?php endif ?>
<?php if (isset($_SESSION["type"])) : ?>
    <?php if ($_SESSION["type"] == "admin") : ?>
        <a href="tambahMenu.php">Tambah Menu</a>
    <?php endif ?>
<?php endif ?>
<a href="index.php">Kembali</a>

<body>
    <h1>Daftar Menu Dessert</h1>
    <ul>
        <?php foreach ($menus as $menu) : ?>
            <li>
                <img src="img/data/<?= $menu["gambar"] ?>" alt="">
                <h2><?= $menu["nama"] ?></h2>
                <p>Deskripsi: <?= $menu["deskripsi"] ?>.</p>
                <p>Harga: Rp <?= $menu["harga"] ?></p>
                <?php if (isset($_SESSION["type"])) : ?>
                    <?php if ($_SESSION["type"] == "admin") : ?>
                        <p><a href="ubahMenu.php?id=<?= $menu["id_menu"] ?>">Ubah</a> <a href="hapusMenu.php?id=<?= $menu["id_menu"] ?>">Hapus</a></p>
                    <?php endif ?>
                <?php endif ?>
            </li>
        <?php endforeach ?>
    </ul>

</body>

</html>