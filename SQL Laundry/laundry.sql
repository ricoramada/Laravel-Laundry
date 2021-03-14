-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Mar 2021 pada 00.23
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_member`
--

CREATE TABLE `tb_member` (
  `id` int(20) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `tlp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_member`
--

INSERT INTO `tb_member` (`id`, `nama`, `alamat`, `jenis_kelamin`, `tlp`) VALUES
(1, 'Supri yadi', 'Jl. Durian no 56', 'Laki-Laki', '0812378123'),
(2, 'Bambang', 'jl tambingan', 'Laki-Laki', '08133459254'),
(5, 'Rico', 'Jl Mangga', 'Laki-Laki', '0812312773123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_outlet`
--

CREATE TABLE `tb_outlet` (
  `id` int(20) NOT NULL,
  `nama_outlet` varchar(500) NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_outlet`
--

INSERT INTO `tb_outlet` (`id`, `nama_outlet`, `alamat`, `tlp`) VALUES
(1, 'Toko Sejahterah', 'Jl Gunung Ijo no 32', '0812354657'),
(2, 'Toko Aby', 'jl tambingan', '08455616165');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id` int(20) NOT NULL,
  `id_outlet` int(20) NOT NULL,
  `jenis` enum('Kiloan','Selimut','Bed Cover','Kaos','Lain') NOT NULL,
  `nama_paket` varchar(200) NOT NULL,
  `harga` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_paket`
--

INSERT INTO `tb_paket` (`id`, `id_outlet`, `jenis`, `nama_paket`, `harga`) VALUES
(1, 1, 'Kaos', 'Kilat', 20000),
(2, 1, 'Selimut', 'Selimut Lembut', 50000),
(3, 1, 'Kaos', 'Cuci Kilat Kaos', 65000),
(5, 2, 'Kiloan', '2 Kg Baju', 35000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int(20) NOT NULL,
  `id_outlet` int(20) NOT NULL,
  `id_paket` int(25) NOT NULL,
  `kode_invoice` int(25) NOT NULL,
  `id_member` int(20) NOT NULL,
  `tgl` date NOT NULL,
  `batas_waktu` date NOT NULL,
  `tgl_bayar` date NOT NULL,
  `biaya_tambahan` int(20) NOT NULL,
  `diskon` double NOT NULL,
  `pajak` int(20) NOT NULL,
  `status` enum('baru','proses','selesai','diambil') NOT NULL,
  `dibayar` enum('dibayar','belum_dibayar') NOT NULL,
  `id_user` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `id_outlet`, `id_paket`, `kode_invoice`, `id_member`, `tgl`, `batas_waktu`, `tgl_bayar`, `biaya_tambahan`, `diskon`, `pajak`, `status`, `dibayar`, `id_user`) VALUES
(1, 1, 1, 693030, 1, '2021-03-11', '2021-03-17', '2021-03-16', 5000, 10, 2000, 'diambil', 'dibayar', 1),
(25, 1, 2, 913006, 5, '2021-03-14', '2021-03-15', '2021-03-14', 1000, 20, 2000, 'proses', 'dibayar', 1),
(26, 1, 2, 891573, 5, '2021-03-14', '2021-03-15', '2021-03-14', 1000, 20, 2000, 'proses', 'dibayar', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(25) NOT NULL,
  `id_outlet` int(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `number_user` int(20) NOT NULL,
  `role` enum('admin','kasir','owner') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `id_outlet`, `email`, `nama`, `username`, `password`, `number_user`, `role`) VALUES
(1, 1, 'rico@gmail.com', 'rico', 'rico', '17f53b55ba7e8e3d703b04c4f391fec1', 2147483647, 'admin'),
(2, 2, 'aby@gmail.com', 'aby', 'aby', '7e47b0bfc5b4331818414fca5176f7db', 815465468, 'admin'),
(3, 1, 'abc@gmail.com', 'abc', 'abc', 'e99a18c428cb38d5f260853678922e03', 728, 'kasir'),
(4, 0, 'abcd@gmail.com', 'abcd', 'abcd', '79cfeb94595de33b3326c06ab1c7dbda', 8206286, 'kasir'),
(5, 0, 'er@gmail.com', 'er', 'er', '1fe715a058291d76ead9701a6e40391f', 293948284, 'owner');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_outlet`
--
ALTER TABLE `tb_outlet`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_outlet` (`id_outlet`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_outlet` (`id_outlet`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_paket` (`id_paket`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_outlet` (`id_outlet`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_outlet`
--
ALTER TABLE `tb_outlet`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
