-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Agu 2020 pada 02.24
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
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(200) NOT NULL,
  `tgl_ditambahkan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','petugas','masyarakat') NOT NULL,
  `date_created` int(11) NOT NULL,
  `status` enum('Online','Offline') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`nama`, `email`, `password`, `level`, `date_created`, `status`) VALUES
('Oden', 'oden01@gmail.com', '$2y$10$mif5Zqs.VDk712qbyck9hOb9ewQLJTHoTHEBU3YdvQUvVdsQXzWqq', 'masyarakat', 1598156593, 'Online');

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
  `image` int(255) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `email`, `password`, `telp`, `image`, `date_created`) VALUES
('123212321232122', 'Oden', 'oden01@gmail.com', '$2y$10$mif5Zqs.VDk712qbyck9hOb9ewQLJTHoTHEBU3YdvQUvVdsQXzWqq', 2147483647, 0, 1598156593);

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
  `image` varchar(255) NOT NULL,
  `tgl_pengaduan` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `nik`, `judul_laporan`, `isi_laporan`, `tgl_kejadian`, `image`, `tgl_pengaduan`) VALUES
(5, '123212321232122', 'sfdfdgewgwef', 'asdasdasd', '2020-08-23', 'default.jpg', 1598177187),
(6, '123212321232122', 'Rumah ijat terbakar', 'Tolong!!!', '2020-08-23', 'default.jpg', 1598191700);

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
-- Struktur dari tabel `sub_kategori`
--

CREATE TABLE `sub_kategori` (
  `id_sub_kategori` int(11) NOT NULL,
  `sub_kategori` varchar(200) NOT NULL,
  `tgl_ditambahkan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

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
-- Indeks untuk tabel `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD PRIMARY KEY (`id_sub_kategori`);

--
-- Indeks untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `sub_kategori`
--
ALTER TABLE `sub_kategori`
  MODIFY `id_sub_kategori` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
