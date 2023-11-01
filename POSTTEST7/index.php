<?php
date_default_timezone_set("Asia/Makassar");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Toko Dessert</title>
</head>

<body>

    <div class="hd">
        <h2>Make Your Life More Sweety!</h2>
    </div>
    <div class="btn">
        <h1>Dark/Light Mode</h1>
        <button id="toggleModeButton">Pencet coba!</button>
    </div>
    <div id="popupBox" class="hidden">
        <p>Berubah dikit!</p>

    </div>
    </div>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="aboutme.php">About</a></li>
                <?php if (isset($_SESSION["type"])) : ?>
                    <?php if ($_SESSION["type"] == "admin") : ?>
                        <li><a href="pesanan.php">Pesanan</a></li>
                    <?php endif ?>
                <?php endif ?>
                <?php if (!isset($_SESSION["login"])) { ?>
                    <li><a href="login.php">Login</a></li>
                <?php } else { ?>
                    <li><a href="logout.php">Logout</a></li>
                <?php } ?>
                <li>
                    <p><?php echo date("l, d-m-Y e") ?></p>
                </li>
            </ul>
        </nav>
    </header>

    <section class="hero">
        <h1>Selamat Datang di Toko Dessert kami</h1>
        <br><br>
        <p>Manjakan Pasangan itu harus,tapi memanjakan diri sendiri itu juga nggak kalah penting.</p>
        <p>So,buruan order Dessert box kami.</p>
        <?php if (isset($_SESSION["type"])) : ?>
            <?php if ($_SESSION["type"] != "admin") : ?>
                <a href="daftarpsn.php">Order Now</a>
            <?php endif ?>
        <?php endif ?>
    </section>
    <section>
        <div class="footer">
            <p>&copy; 2023 Nama Perusahaan. Hak Cipta Dilindungi.</p>
        </div>
    </section>

    <script src="js.js"></script>
</body>

</html>