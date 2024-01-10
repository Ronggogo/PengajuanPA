-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jan 2024 pada 10.59
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pepa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'admin',
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `role`, `password`) VALUES
('admin', 'admin', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Struktur dari tabel `koor_pa`
--

CREATE TABLE `koor_pa` (
  `nip` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'koor',
  `angkatan_pa` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `koor_pa`
--

INSERT INTO `koor_pa` (`nip`, `email`, `nama`, `role`, `angkatan_pa`, `password`) VALUES
('101010', 'samsul@gmail.com', 'samsul', 'koor', '20', 'b5146ab5c012993e868d0f7f3ab2c092');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `angkatan` varchar(20) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'mahasiswa',
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `email`, `kelas`, `angkatan`, `jurusan`, `role`, `password`) VALUES
('2255301010', 'Putra', 'putra@gmail.com', '2 TI E', 'G22', 'Teknik Informatika', 'mahasiswa', '21f1256217c52a6cdaa51f34bf1b4131'),
('2255301098', 'M.Dzaki Renggodhani', 'm.dzaki22ti@mahasiswa.pcr.ac.id', '2 TI E', 'G22', 'Teknik Informatika', 'mahasiswa', '9847437ee8f492559c804fe844cae22f');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pa`
--

CREATE TABLE `pa` (
  `id_pa` int(11) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `judul_pa` varchar(255) NOT NULL,
  `file_pa` varchar(255) NOT NULL,
  `periode_pa` varchar(50) NOT NULL,
  `kbk` enum('multimedia','operating system and computer network','soft computing','software enginering') NOT NULL,
  `status` enum('terima','proses','tolak','') NOT NULL DEFAULT 'proses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pa`
--

INSERT INTO `pa` (`id_pa`, `nim`, `nip`, `judul_pa`, `file_pa`, `periode_pa`, `kbk`, `status`) VALUES
(1, '2255301098', '101010', 'PA KU', 'Define,_Ideate,_dan_user_flow_Kel_4.pdf', '2024', 'multimedia', 'proses'),
(2, '2255301098', '101010', 'PA2', 'Laporan_Progress_Project_DW.pdf', '2024', 'soft computing', 'proses'),
(3, '2255301098', '101010', 'PA3', 'Makalah_Ideologi_M_Dzaki_Renggodhani.pdf', '2024', 'multimedia', 'proses'),
(4, '2255301098', '101010', 'Analisis covid', 'rekap-data-bulanan-covid-19tahun-2021.zip', '2024', 'soft computing', 'proses'),
(5, '2255301098', '101010', 'Analisis covid', 'rekap-data-bulanan-covid-19tahun-20211.zip', '2024', 'soft computing', 'proses');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `koor_pa`
--
ALTER TABLE `koor_pa`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `pa`
--
ALTER TABLE `pa`
  ADD PRIMARY KEY (`id_pa`),
  ADD KEY `nim` (`nim`),
  ADD KEY `nip` (`nip`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pa`
--
ALTER TABLE `pa`
  MODIFY `id_pa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pa`
--
ALTER TABLE `pa`
  ADD CONSTRAINT `nim` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`),
  ADD CONSTRAINT `nip` FOREIGN KEY (`nip`) REFERENCES `koor_pa` (`nip`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
