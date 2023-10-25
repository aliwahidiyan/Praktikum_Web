<?php
require "function.php";

$id = $_GET["id"];

$query = mysqli_query($conn, "DELETE FROM menu WHERE id_menu = $id");

if ($query) {
    echo "
    <script>
        alert('Berhasil Menghapus Menu!');
        document.location.href = 'menu.php';
    </script>
    ";
}
