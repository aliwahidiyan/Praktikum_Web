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

$id = $_GET["id"];

$query = mysqli_query($conn, "DELETE FROM transaksi WHERE id_transaksi = $id");

if ($query) {
    echo "
    <script>
        alert('Berhasil Menghapus Pesanan!');
        document.location.href = 'pesanan.php';
    </script>
    ";
}
