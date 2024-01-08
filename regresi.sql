-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 02 Apr 2023 pada 10.57
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `regresi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_stok`
--

CREATE TABLE `log_stok` (
  `id_log` int(11) NOT NULL,
  `jenis_barang` varchar(10) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp(),
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log_stok`
--

INSERT INTO `log_stok` (`id_log`, `jenis_barang`, `waktu`, `jumlah`, `keterangan`) VALUES
(1, '30', '2023-03-31 16:45:36', 300, NULL),
(2, '30', '2023-04-02 00:55:32', 750, NULL),
(3, '30', '2023-04-02 01:04:04', 10, NULL),
(4, '30', '2023-04-02 01:23:14', 20, NULL),
(5, '30', '2023-04-02 01:24:39', 100, NULL),
(6, '25', '2023-04-02 01:24:45', 100, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prediksi_penjualan`
--

CREATE TABLE `prediksi_penjualan` (
  `id` int(10) NOT NULL,
  `30` varchar(10) NOT NULL,
  `25` varchar(10) NOT NULL,
  `20` varchar(10) NOT NULL,
  `15` varchar(10) NOT NULL,
  `month` date NOT NULL,
  `data_ke` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `prediksi_penjualan`
--

INSERT INTO `prediksi_penjualan` (`id`, `30`, `25`, `20`, `15`, `month`, `data_ke`) VALUES
(1, '23200', '19000', '18920', '21500', '2022-08-01', 1),
(2, '25000', '21300', '23100', '32000', '2022-09-01', 2),
(6, '19200', '20100', '20100', '19800', '2022-10-01', 3),
(9, '23100', '21450', '20000', '21900', '2022-11-01', 4),
(10, '23100', '24100', '20210', '20900', '2022-12-01', 5),
(11, '19800', '20100', '21200', '32000', '2023-01-01', 6),
(12, '23100', '22000', '20210', '35000', '2023-02-01', 7),
(15, '20900', '21000', '19900', '38000', '2023-03-01', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `data_ke` int(20) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tahun` varchar(20) NOT NULL,
  `jenis_barang` varchar(20) NOT NULL,
  `jumlah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id_penjualan`, `data_ke`, `bulan`, `tahun`, `jenis_barang`, `jumlah`) VALUES
(45, 1, '1', '2022', '30', '21200'),
(46, 2, '2', '2022', '30', '21000'),
(47, 3, '03', '2022', '30', '19800'),
(49, 5, '4', '2022', '30', '24000'),
(50, 6, '5', '2022', '30', '22300'),
(55, 7, '5', '2022', '25', '23300'),
(56, 8, '6', '2022', '25', '31200'),
(57, 9, '7', '2022', '25', '24000'),
(67, 10, '12', '2019', '30', '21200'),
(68, 11, '12', '2022', '30', '22100'),
(69, 12, '9', '2022', '25', '20222'),
(70, 13, '8', '2022', '30', '20300'),
(71, 14, '12', '2022', '20', '21000'),
(72, 15, '10', '2022', '20', '20200'),
(73, 16, '9', '2022', '20', '20100'),
(74, 9, '2022-09-01', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_stok`
--

CREATE TABLE `tb_stok` (
  `id_stok` int(11) NOT NULL,
  `jenis_barang` varchar(3) NOT NULL,
  `jumlah_stok` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_stok`
--

INSERT INTO `tb_stok` (`id_stok`, `jenis_barang`, `jumlah_stok`) VALUES
(1, '30', '190'),
(4, '25', '150'),
(5, '20', '300'),
(6, '15', '300');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `level` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `nama`, `no_hp`, `level`, `username`, `password`) VALUES
(7, 'Testing', '081213321435', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(8, 'Ini Pegawai', '083980982098', 'pegawai', 'pegawai', '047aeeb234644b9e2d4138ed3bc7976a');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `log_stok`
--
ALTER TABLE `log_stok`
  ADD PRIMARY KEY (`id_log`);

--
-- Indeks untuk tabel `prediksi_penjualan`
--
ALTER TABLE `prediksi_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indeks untuk tabel `tb_stok`
--
ALTER TABLE `tb_stok`
  ADD PRIMARY KEY (`id_stok`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `log_stok`
--
ALTER TABLE `log_stok`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `prediksi_penjualan`
--
ALTER TABLE `prediksi_penjualan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT untuk tabel `tb_stok`
--
ALTER TABLE `tb_stok`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
