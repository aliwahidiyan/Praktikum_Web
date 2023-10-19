<?php
require "function.php";

$query = mysqli_query($conn, "SELECT * FROM transaksi JOIN menu ON transaksi.id_menu = menu.id_menu");

while ($row = mysqli_fetch_assoc($query)) {
    $orders[] = $row;
}

$nomor = 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan</title>
    <link rel="stylesheet" href="stylepesanan.css">
</head>

<body>
    <a href="index.php">Kembali</a>
    <section>
        <table>
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Nama Pelanggan</th>
                    <th>Nomor Handphone</th>
                    <th>Pesanan</th>
                    <th>Jumlah</th>
                    <th>Tanggal Pesanan</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order) : ?>
                    <tr>
                        <th><?= $nomor ?></th>
                        <td><?= $order["nama_pelanggan"] ?></td>
                        <td><?= $order["no_hp"] ?></td>
                        <td><?= $order["nama"] ?></td>
                        <td><?= $order["jumlah"] ?></td>
                        <td><?= $order["tanggal"] ?></td>
                        <td>Rp. <?= $order["total_harga"] ?></td>
                        <td><a href="ubah.php?id=<?= $order["id_transaksi"] ?>">Ubah</a> <a href="hapus.php?id=<?= $order["id_transaksi"] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data dengan nama : <?= $order['nama_pelanggan'] ?>, dan Pesanan : <?= $order['nama'] ?>')">Hapus</a></td>
                    </tr>
                <?php $nomor++;
                endforeach; ?>
            </tbody>
        </table>
    </section>
</body>

</html>