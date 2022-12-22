-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jun 2022 pada 10.38
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtiket`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hrgtiket`
--

CREATE TABLE `hrgtiket` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `harga_tiket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hrgtiket`
--

INSERT INTO `hrgtiket` (`id`, `nama_kelas`, `harga_tiket`) VALUES
(1, 'ekonomi', '50000'),
(2, 'bisnis', '100000'),
(3, 'eksekutif', '200000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbanggota`
--

CREATE TABLE `tbanggota` (
  `idanggota` int(255) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `klsbus` varchar(255) NOT NULL,
  `tgl` date DEFAULT NULL,
  `jml1` int(255) NOT NULL,
  `jml2` int(255) NOT NULL,
  `foto` text NOT NULL,
  `harga` int(255) NOT NULL,
  `totalbayar` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `hrgtiket`
--
ALTER TABLE `hrgtiket`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbanggota`
--
ALTER TABLE `tbanggota`
  ADD PRIMARY KEY (`idanggota`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `hrgtiket`
--
ALTER TABLE `hrgtiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
