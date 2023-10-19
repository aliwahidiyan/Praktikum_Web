<?php

require "function.php";

$stmt = mysqli_query($conn, "SELECT * FROM menu");

if (isset($_POST["kirim"])) {
    $nama = htmlspecialchars($_POST["nama"]);
    $nama_dessert = $_POST["nama_dessert"];
    $no_hp = $_POST["no_hp"];
    $jumlah = $_POST["jumlah"];
    $tanggal_pesan = $_POST["tanggal_pesan"];

    $queryHarga = mysqli_query($conn, "SELECT harga FROM menu WHERE id_menu = $nama_dessert");
    $harga = mysqli_fetch_assoc($queryHarga);
    $total = $harga["harga"] * $jumlah;

    // Lakukan validasi data jika diperlukan
    // Contoh validasi sederhana untuk nomor handphone (minimal 12 digit)
    if (strlen($no_hp) < 12) {
        echo "Nomor Handphone harus memiliki minimal 10 digit.";
    } else {
        $query = mysqli_query($conn, "INSERT INTO transaksi VALUES(NULL,$nama_dessert,'$nama','$no_hp',$jumlah,'$tanggal_pesan',$total)");
        if ($query) {
            echo "
            <script>
                alert('Berhasil Melakukan Pesanan!');
                document.location.href = 'pesanan.php';
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
    <h2>Pesan Sekarang dengan mengisi form ini!</h2>
    <form method="POST" action="">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required><br><br>
        <label for="nama_dessert">Nama Dessert:</label>
        <select name="nama_dessert" id="nama_dessert">
            <?php while ($menu = mysqli_fetch_assoc($stmt)) : ?>
                <option value="<?= $menu["id_menu"] ?>"><?= $menu["nama"] ?></option>
            <?php endwhile ?>
        </select><br><br>
        <label for="no_hp">Nomor Handphone:</label>
        <input type="number" maxlength="12" id="no_hp" name="no_hp" required><br><br>
        <label for="jumlah">Jumlah Pesanan:</label>
        <input type="number" id="jumlah" name="jumlah" required><br><br>


        <div class="form-group">
            <label for="tanggal_pesan">Tanggal Pesan:</label>
            <input type="date" id="tanggal_pesan" name="tanggal_pesan" required>

            <input type="submit" name="kirim">

    </form>
    </form>
</body>

</html>