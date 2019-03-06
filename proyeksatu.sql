-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20 Feb 2017 pada 20.39
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyeksatu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barangklr`
--

CREATE TABLE `tb_barangklr` (
  `kode_keluar` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `penerima` varchar(50) NOT NULL,
  `tgl_klr` date NOT NULL,
  `status_barang` varchar(20) NOT NULL,
  `petugas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barangklr`
--

INSERT INTO `tb_barangklr` (`kode_keluar`, `nama_barang`, `penerima`, `tgl_klr`, `status_barang`, `petugas`) VALUES
('B001', 'Xiaomi Redmi Note 3 Prof', 'Akbar Pambudi Utomo', '2017-02-02', 'Barang Keluar', 'julham'),
('B002', 'Laptop Asus', 'M Arya Sikumbang', '2017-02-08', 'Barang Keluar', 'julham'),
('B003', 'Kulkas', 'Haris Munandar', '2017-02-09', 'Barang Keluar', 'akbar'),
('B004', 'CPU', 'Julham Ramadhana', '2017-02-20', 'Barang Keluar', 'adika'),
('B005', 'RAM', 'Akbar Pambudi Utomo', '2017-02-03', 'Barang Keluar', 'p_ekspor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barangmsk`
--

CREATE TABLE `tb_barangmsk` (
  `kode_masuk` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `tgl_msk` date NOT NULL,
  `nama_pengirim` varchar(50) NOT NULL,
  `petugas` varchar(20) NOT NULL,
  `tempat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barangmsk`
--

INSERT INTO `tb_barangmsk` (`kode_masuk`, `nama_barang`, `tgl_msk`, `nama_pengirim`, `petugas`, `tempat`) VALUES
('M001', 'Samsung', '2017-02-03', 'Ariana Setiawan', 'akbar', '4'),
('M002', 'Laptop Asus', '2017-02-06', 'Mariani R', 'akbar', '12'),
('M003', 'Laptop Asus', '2017-02-15', 'Arya Niken', 'akbar', '9'),
('M004', 'Xperia', '2017-02-23', 'Ariana Setiawan', 'julham', '15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penerima`
--

CREATE TABLE `tb_penerima` (
  `kode_penerima` varchar(10) NOT NULL,
  `nama_penerima` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penerima`
--

INSERT INTO `tb_penerima` (`kode_penerima`, `nama_penerima`, `alamat`) VALUES
('T001', 'Akbar Pambudi Utomo', 'Sinjai'),
('T002', 'Julham Ramadhana', 'Medan'),
('T003', 'M Arya Sikumbang', 'Medan'),
('T004', 'Haris Munandar', 'Bandung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengirim`
--

CREATE TABLE `tb_pengirim` (
  `kode_pengirim` varchar(10) NOT NULL,
  `nama_pengirim` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tujuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengirim`
--

INSERT INTO `tb_pengirim` (`kode_pengirim`, `nama_pengirim`, `alamat`, `tujuan`) VALUES
('K001', 'Ariana Setiawan', 'Cimahi', 'Bandung'),
('K002', 'Mariani R', 'Nusa Tenggara', 'Jakarta'),
('K003', 'Arya Niken', 'Bekasi', 'Medan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `pangkat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `first_name`, `last_name`, `no_hp`, `alamat`, `username`, `password`, `pangkat`) VALUES
('U001', 'Muhammad', 'Adam', '6285729780772', 'Semarang', 'adam', 'adam', 'admin'),
('U002', 'Julham', 'Ramadhana', '6287623953203', 'Binjai', 'julham', 'julham', 'Petugas Ekspor'),
('U003', 'Akbar', 'Pambudi', '629485834634', 'Sinjai', 'akbar', 'akbar', 'Petugas Impor'),
('U004', 'Arya', 'Sikumbang', '624045093000', 'Medan', 'arya', 'arya', 'admin'),
('U005', 'Adika', 'Putra', '62095309538098', 'Ciwaruga', 'adika', 'adika', 'Petugas Ekspor'),
('U006', 'Petugas', 'Ekspor', '082300998877', 'Sarijadi', 'p_ekspor', 'ekspor', 'Petugas Ekspor'),
('U007', 'Petugas', 'Impor', '082377889900', 'Sarijadi', 'p_impor', 'impor', 'Petugas Impor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barangklr`
--
ALTER TABLE `tb_barangklr`
  ADD PRIMARY KEY (`kode_keluar`);

--
-- Indexes for table `tb_barangmsk`
--
ALTER TABLE `tb_barangmsk`
  ADD PRIMARY KEY (`kode_masuk`);

--
-- Indexes for table `tb_penerima`
--
ALTER TABLE `tb_penerima`
  ADD PRIMARY KEY (`kode_penerima`);

--
-- Indexes for table `tb_pengirim`
--
ALTER TABLE `tb_pengirim`
  ADD PRIMARY KEY (`kode_pengirim`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
