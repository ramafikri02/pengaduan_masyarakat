-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Agu 2020 pada 08.56
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan_masyarakat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','petugas','masyarakat') NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`nama`, `email`, `password`, `level`, `date_created`) VALUES
('Casper Z', 'casper01@gmail.com', '$2y$10$7CaTaBniWPJ84ZXyXkmqbe6O2aP2/ezK9jec6fQqm5neb2E2CRPqC', 'petugas', 1597202794),
('Jack', 'jack01@gmail.com', '$2y$10$VG5gMh2q2n6a3B6lBjEItOMQXXhST.d5y9/7tcRg2u89j5uSd5nc.', 'admin', 1597202074),
('Menos', 'menos01@gmail.com', '$2y$10$4/qc02Ptw2XLFpx6r/Qj2O1PDXmOMnfG9UhRjx1rT6JKXErLgDzQy', 'masyarakat', 1597203047);

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` char(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telp` int(13) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `email`, `password`, `telp`, `date_created`) VALUES
('1234512345123423', 'Menos', 'menos01@gmail.com', '$2y$10$4/qc02Ptw2XLFpx6r/Qj2O1PDXmOMnfG9UhRjx1rT6JKXErLgDzQy', 2147483647, 1597203047);

--
-- Trigger `masyarakat`
--
DELIMITER $$
CREATE TRIGGER `delete_level_masyarakat` AFTER DELETE ON `masyarakat` FOR EACH ROW BEGIN
    DELETE FROM login
    WHERE email = OLD.email;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `level_masyarakat` AFTER INSERT ON `masyarakat` FOR EACH ROW BEGIN
    INSERT INTO login
    set nama = NEW.nama,
    email = NEW.email,
    password = NEW.password,
    level = 'masyarakat',
    date_created = NEW.date_created; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `nik` char(16) NOT NULL,
  `judul_laporan` varchar(255) NOT NULL,
  `isi_laporan` text NOT NULL,
  `tgl_kejadian` date NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tgl_pengaduan` int(11) NOT NULL,
  `status` enum('Proses','Selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telp` int(13) NOT NULL,
  `level` enum('admin','petugas') NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama`, `email`, `password`, `telp`, `level`, `date_created`) VALUES
(3, 'Jack', 'jack01@gmail.com', '$2y$10$VG5gMh2q2n6a3B6lBjEItOMQXXhST.d5y9/7tcRg2u89j5uSd5nc.', 2147483647, 'admin', 1597202074),
(4, 'Casper Z', 'casper01@gmail.com', '$2y$10$7CaTaBniWPJ84ZXyXkmqbe6O2aP2/ezK9jec6fQqm5neb2E2CRPqC', 2147483647, 'petugas', 1597202794);

--
-- Trigger `petugas`
--
DELIMITER $$
CREATE TRIGGER `delete_level_petugas` AFTER DELETE ON `petugas` FOR EACH ROW BEGIN
    DELETE FROM login
    WHERE email = OLD.email;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `level_admin_petugas` AFTER INSERT ON `petugas` FOR EACH ROW BEGIN
    INSERT INTO login
    set nama = NEW.nama,
    email = NEW.email,
    password = NEW.password,
    level = NEW.level,
    date_created = NEW.date_created; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
