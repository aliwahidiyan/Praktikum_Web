-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Okt 2023 pada 07.13
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dessert`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama`, `harga`, `deskripsi`, `gambar`) VALUES
(1, 'Kue Cokelat', 25000, 'Kue cokelat lembut dengan lapisan cokelat krim', ''),
(2, 'Pancake Blueberry', 30000, 'Pancake lembut dengan blueberry segar dan sirup maple', '2023-10-25.pancake blueberry-file.jpg'),
(3, 'Es Krim Vanilla 1 Scoop', 15000, 'Es krim vanilla lembut dengan pilihan toping', ''),
(4, 'Es Krim Vanilla 2 Scoop', 25000, 'Es krim vanilla lembut dengan pilihan toping', ''),
(5, 'Tiramisu', 35000, 'Tiramisu klasik dengan lapisan keju mascarpone dan kopi', ''),
(6, 'Puding Caramel', 20000, 'Puding karamel dengan saus karamel gurih', ''),
(7, 'Cheesecake Raspberry', 40000, 'Cheesecake lembut dengan saus raspberry segar', ''),
(8, 'Fruit Parfait', 30000, 'Lapisan buah segar, yogurt, dan granola', ''),
(9, 'Muffin Cokelat', 15000, 'Muffin cokelat dengan choco chips', ''),
(10, 'Es Krim Cokelat Mint 1 Scoop', 20000, 'Es krim cokelat dengan rasa mint segar', ''),
(11, 'Es Krim Cokelat Mint 2 Scoop', 35000, 'Es krim cokelat dengan rasa mint segar', ''),
(13, 'Pancake Coklat', 30000, 'Pancake lembut dengan cokelat chips', '2023-10-25.pancake coklat-file.webp');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(10) UNSIGNED ZEROFILL NOT NULL,
  `id_menu` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_menu`, `nama_pelanggan`, `no_hp`, `jumlah`, `tanggal`, `total_harga`) VALUES
(0000000002, 4, 'Sannie', '080808080808', 15, '2023-10-01', 375000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_menu` (`id_menu`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
