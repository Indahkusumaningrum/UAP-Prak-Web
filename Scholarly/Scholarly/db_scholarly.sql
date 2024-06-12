-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jun 2024 pada 03.44
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_scholarly`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id` int(11) NOT NULL,
  `nama_matkul` varchar(100) DEFAULT NULL,
  `sks` int(11) DEFAULT NULL,
  `dosen_pengampu` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id`, `nama_matkul`, `sks`, `dosen_pengampu`, `deskripsi`) VALUES
(1, 'Analisis dan Desain Sistem Informasi', 3, 'Dadang Sudrajat', 'Wajib'),
(9, 'Kecerdasan Buatan', 3, 'Muhammad Yamin', 'Wajib'),
(10, 'Teori Informasi', 2, 'Ir. Soekarno', 'Wajib'),
(11, 'Pemrosesan Data Terdistribusi', 3, 'Albert Einstein', 'Peminatan'),
(12, 'Pemrograman Deklaratif', 3, 'Isaac Newton', 'Peminatan'),
(13, 'Pembelajaran Mesin', 3, 'Nikola Tesla', 'Wajib'),
(14, 'Teknologi dan Aplikasi Mobile', 3, ' Ki Hajar Dewantara', 'Wajib'),
(15, 'Pemrograman Web', 3, 'B.J. Habibie', 'Wajib'),
(16, 'Internet of Things', 3, 'Elon Musk', 'Peminatan'),
(17, 'Manajemen Pengetahuan', 2, 'Nadiem Makarim', 'Peminatan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
