-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Sep 2024 pada 20.07
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diskominfo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(9) NOT NULL,
  `tanggal` date NOT NULL,
  `id_karyawan` int(9) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`id_foto`, `tanggal`, `id_karyawan`, `foto`) VALUES
(1, '2024-09-01', 1, 'bidang_statistik.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(9) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` int(6) NOT NULL,
  `alamat` text NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `nip`, `alamat`, `jabatan`) VALUES
(1, 'Kartika', 124563, 'SumedangUtara, jln Darandan', 'Umum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(6) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `status` enum('selesai','delay','batal') NOT NULL,
  `lampiran` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `nama`, `status`, `lampiran`) VALUES
(1, 'sipaa', 'selesai', 0x494d475f363832332e4a5047),
(2, 'Alfiyyah', 'selesai', 0x494d475f363833382e4a5047);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$24qas3t52/WqKijWZDVfYO7oj.Z.0SY7MVxLowpgqkXR64kwtJ0N2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perjalanan`
--

CREATE TABLE `perjalanan` (
  `id_perjalanan` int(9) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_tugas` enum('giat_liputan','seminar','sosialisasi','rapat') NOT NULL,
  `tanggal&waktu` datetime NOT NULL,
  `tempat` text NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `perjalanan`
--

INSERT INTO `perjalanan` (`id_perjalanan`, `nama`, `jenis_tugas`, `tanggal&waktu`, `tempat`, `keterangan`) VALUES
(123456797, '9999', '', '2024-09-21 00:00:00', 'sipaa', 'liput giat sekdan kab sumedang'),
(123456798, '55555', '', '2024-09-21 00:00:00', 'Alfiyyah', 'rapat bupati se jawa barat'),
(123456799, '111213', '', '2024-09-21 00:00:00', 'abang', 'rapat presiden'),
(123456800, '4444', '', '2024-09-21 00:00:00', 'ibay', 'liput giat gubernur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(9) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` varchar(30) NOT NULL,
  `nip` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `nip`) VALUES
(9, 'sipa', '0708', 'pegawai', '202400'),
(10, 'Alfiyyah', '021126', 'pegawai', '021126'),
(11, 'Muhamad Agra', '1203', 'Admin', '120320204'),
(12, '', '$2y$10$ZL8AXYEEcnsaIqqjDlXI8eW', 'admin', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD UNIQUE KEY `foto` (`id_karyawan`,`nama`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perjalanan`
--
ALTER TABLE `perjalanan`
  ADD PRIMARY KEY (`id_perjalanan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66667;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `perjalanan`
--
ALTER TABLE `perjalanan`
  MODIFY `id_perjalanan` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123456801;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
