<?php
require "function.php";

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
