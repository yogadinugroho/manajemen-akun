-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08 Jun 2021 pada 01.18
-- Versi Server: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2197101034`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_biodata_dosen`
--

CREATE TABLE `tabel_biodata_dosen` (
  `nip` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gambar_profil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_biodata_dosen`
--

INSERT INTO `tabel_biodata_dosen` (`nip`, `nama`, `email`, `gambar_profil`) VALUES
('101010', 'Choi Soobin', 'soobin@gmail.com', '60be2f33d8478.png'),
('101011', 'Seo Dal Mi', 'dalmi@gmail.com', '60be2f4f7f5d5.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_biodata_mahasiswa`
--

CREATE TABLE `tabel_biodata_mahasiswa` (
  `nim` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gambar_profil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_biodata_mahasiswa`
--

INSERT INTO `tabel_biodata_mahasiswa` (`nim`, `nama`, `email`, `gambar_profil`) VALUES
('2197101034', 'Nam Do San', 'dosan@gmail.com', '60be2eab37080.png'),
('2197101035', 'Han Ji Pyeong', 'jipyeong@gmail.com', '60be2ec9df55f.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_login`
--

CREATE TABLE `tabel_login` (
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_login`
--

INSERT INTO `tabel_login` (`username`, `password`, `status`) VALUES
('101011', '$2y$10$O6NN/yDeiRR.nvH0dPSOveKZHK2QyMnanuL6odCFpDAe4/yL1sfxq', 2),
('2197101034', '$2y$10$FLW076T3rXwkEsjE/kADUeu/ojHsJOtk15Saw85PMcRYVqP6DpYje', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_biodata_dosen`
--
ALTER TABLE `tabel_biodata_dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tabel_biodata_mahasiswa`
--
ALTER TABLE `tabel_biodata_mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tabel_login`
--
ALTER TABLE `tabel_login`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
