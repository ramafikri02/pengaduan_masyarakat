-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Agu 2020 pada 18.28
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

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `tgl_ditambahkan`) VALUES
(3, 'Kesehatan', 1598666839),
(4, 'Covid-19', 1598667236),
(5, 'Pertanian', 1598667243),
(6, 'Bencana Alam', 1598667259);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Admin','Petugas','Masyarakat') NOT NULL,
  `date_created` int(11) NOT NULL,
  `status` enum('Online','Offline') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_login`, `nama`, `email`, `password`, `level`, `date_created`, `status`) VALUES
(7, 'Oden', 'oden01@gmail.com', '$2y$10$WO79CFhfdG4Xkp7XMVD1teR2vL16TQapS4MKViZxyWftUvunlaqeW', 'Masyarakat', 1598675309, 'Online'),
(8, 'Menos', 'menos01@gmail.com', '$2y$10$In.AsG18DQ7UV3LN4LAy6.J52o8mRcd.zLXLTtKXwHlMuc3axwcca', 'Masyarakat', 1598675345, 'Online'),
(9, 'Jack', 'jack01@gmail.com', '$2y$10$VfWtok17SXMYzP92ajimH.OBREnRPDdtWKXDK7.2dMPiwVSYi/8eW', 'Admin', 1598675376, 'Online'),
(10, 'Casper Z', 'casper01@gmail.com', '$2y$10$8zSyqIyt1j588vMF1Ki0I.zCBmOZOAZINm3q9cXzv8efQ2B6PvjYq', 'Petugas', 1598675398, 'Online');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` char(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `image` int(255) NOT NULL,
  `tgl_ditambahkan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `email`, `password`, `telp`, `image`, `tgl_ditambahkan`) VALUES
('132323232323232', 'Menos', 'menos01@gmail.com', '$2y$10$In.AsG18DQ7UV3LN4LAy6.J52o8mRcd.zLXLTtKXwHlMuc3axwcca', '081212121212', 0, 1598675345),
('1787878787878787', 'Oden', 'oden01@gmail.com', '$2y$10$WO79CFhfdG4Xkp7XMVD1teR2vL16TQapS4MKViZxyWftUvunlaqeW', '081818181818', 0, 1598675309);

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
    level = 'Masyarakat',
    date_created = NEW.date_created; 
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_masyarakat` AFTER UPDATE ON `masyarakat` FOR EACH ROW BEGIN
    UPDATE login
    set nama = NEW.nama,
    email = NEW.email,
    password = NEW.password
    WHERE email = NEW.email;
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
  `kategori` varchar(255) NOT NULL,
  `judul_laporan` varchar(255) NOT NULL,
  `isi_laporan` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` enum('Pending','Proses','Selesai') NOT NULL,
  `tgl_pengaduan` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `nik`, `kategori`, `judul_laporan`, `isi_laporan`, `image`, `status`, `tgl_pengaduan`) VALUES
(18, '1787878787878787', 'Covid-19', 'Warga Frindavan Positif covid-19', 'Tolongggggg', 'default.jpg', 'Pending', 1598677064),
(19, '1787878787878787', 'Pertanian', 'Lahan Padi Terbakar', 'Tolongggggggg', 'default.jpg', 'Pending', 1598677304),
(20, '132323232323232', 'Kesehatan', 'Ada warga yang meninggal', 'Tolongggggggggggg', 'default.jpg', 'Pending', 1598679793);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `image` varchar(255) NOT NULL,
  `level` enum('Admin','Petugas') NOT NULL,
  `tgl_ditambahkan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama`, `email`, `password`, `telp`, `image`, `level`, `tgl_ditambahkan`) VALUES
(7, 'Jack', 'jack01@gmail.com', '$2y$10$VfWtok17SXMYzP92ajimH.OBREnRPDdtWKXDK7.2dMPiwVSYi/8eW', '0124124124', 'default.jpg', 'Admin', 1598675376),
(8, 'Casper Z', 'casper01@gmail.com', '$2y$10$8zSyqIyt1j588vMF1Ki0I.zCBmOZOAZINm3q9cXzv8efQ2B6PvjYq', '0421241224', 'default.jpg', 'Petugas', 1598675398);

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
DELIMITER $$
CREATE TRIGGER `update_petugas` AFTER UPDATE ON `petugas` FOR EACH ROW BEGIN
    UPDATE login
    set nama = NEW.nama,
    email = NEW.email,
    password = NEW.password
    WHERE email = NEW.email;
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
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

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
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
