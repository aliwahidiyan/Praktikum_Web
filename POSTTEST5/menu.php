<?php
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
<a href="daftarpsn.php">Buat Pesanan</a>

<body>
    <h1>Daftar Menu Dessert</h1>
    <ul>
        <?php foreach ($menus as $menu) : ?>
            <li>
                <h2><?= $menu["nama"] ?></h2>
                <p>Deskripsi: <?= $menu["deskripsi"] ?>.</p>
                <p>Harga: Rp <?= $menu["harga"] ?></p>
            </li>
        <?php endforeach ?>
    </ul>

</body>

</html>