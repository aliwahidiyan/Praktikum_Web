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

$query = mysqli_query($conn, "DELETE FROM menu WHERE id_menu = $id");

if ($query) {
    echo "
    <script>
        alert('Berhasil Menghapus Menu!');
        document.location.href = 'menu.php';
    </script>
    ";
}
