-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2025 at 06:33 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_aplikasi_persediaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kode_barang` varchar(50) NOT NULL,
  `nama` varchar(250) DEFAULT NULL,
  `harga_beli` int(11) DEFAULT 0,
  `harga_jual` int(11) DEFAULT 0,
  `stok` int(11) DEFAULT 0,
  `satuan` varchar(50) DEFAULT NULL,
  `petugas` varchar(50) DEFAULT NULL,
  `kode_supplier` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`kode_barang`, `nama`, `harga_beli`, `harga_jual`, `stok`, `satuan`, `petugas`, `kode_supplier`, `jenis`) VALUES
('BRG001', 'Kaos Kerah', 100, 200, 12, 'PCS', 'ADMIN', 'AGH', 'Kaos'),
('BRG002', 'Kemeja Lengan Panjang', 200, 300, 2, 'KG', 'ADMIN', 'AGH', 'Kemeja'),
('BRG003', 'Jubah', 250, 300, 1, 'KG', 'ADMIN', 'AGH', 'Jubah'),
('BRG004', 'Jubah Koko', 200, 300, 1, 'KG', 'ADMIN', 'AGH', 'Jubah'),
('BRG005', 'Celena Cargo', 300, 400, 5, 'PCS', 'ADMIN', 'BCL', 'Cargo');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_keluar`
--

CREATE TABLE `tb_barang_keluar` (
  `id` int(11) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `kode_pelanggan` varchar(50) DEFAULT NULL,
  `kode_barang` varchar(50) DEFAULT NULL,
  `nama` varchar(250) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `petugas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_barang_keluar`
--

INSERT INTO `tb_barang_keluar` (`id`, `tanggal`, `kode_pelanggan`, `kode_barang`, `nama`, `jumlah`, `satuan`, `petugas`) VALUES
(1, '2025-01-07 19:40:53', 'PLG001', 'BRG001', NULL, 5, NULL, 'Admin'),
(2, '2025-01-07 20:04:02', 'PLG003', 'BRG001', NULL, 8, NULL, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_masuk`
--

CREATE TABLE `tb_barang_masuk` (
  `id` int(11) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `kode_supplier` varchar(50) DEFAULT NULL,
  `kode_barang` varchar(50) DEFAULT NULL,
  `nama` varchar(250) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `petugas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_barang_masuk`
--

INSERT INTO `tb_barang_masuk` (`id`, `tanggal`, `kode_supplier`, `kode_barang`, `nama`, `jumlah`, `satuan`, `petugas`) VALUES
(1, '2025-01-07 19:15:03', 'AGH', 'BRG001', NULL, 3, NULL, 'ADMIN'),
(2, '2025-01-07 19:16:01', 'AGH', 'BRG001', NULL, 3, NULL, 'ADMIN'),
(3, '2025-01-07 20:03:04', 'AGH', 'BRG001', NULL, 7, NULL, 'ADMIN'),
(4, '2025-01-07 20:04:18', 'AGH', 'BRG001', NULL, 3, NULL, 'ADMIN'),
(5, '2025-01-07 20:06:58', 'AGH', 'BRG001', NULL, 4, NULL, 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `kode_pelanggan` varchar(50) NOT NULL,
  `nama` varchar(250) DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `telp` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`kode_pelanggan`, `nama`, `alamat`, `telp`) VALUES
('PLG001', 'Kibutsi Muzan', 'JL.Reruntuhan No.22 Wano', '0812321234'),
('PLG002', 'Zenitsu', 'Jl.Kroco No.12 Wano', '0812342624'),
('PLG003', 'Nezuko', 'Jl. Ayam No.12 Wano', '089272364827'),
('PLG004', 'Kamaboko Kompaciro', 'Jl.Kroco No.13 Wano', '082374764728');

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `kode_petugas` varchar(50) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `jabatan` varchar(250) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`kode_petugas`, `nama`, `jabatan`, `password`) VALUES
('ADM', 'Admin', 'ADMIN', 'ADM'),
('AG', 'Dilan', 'ADMIN GUDANG', 'AG'),
('SA', 'Aquila', 'SALES', 'SA'),
('SPV', 'Agus', 'SUPERVISOR', 'SPV');

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `kode_supplier` varchar(50) NOT NULL,
  `nama` varchar(250) DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `telp` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_supplier`
--

INSERT INTO `tb_supplier` (`kode_supplier`, `nama`, `alamat`, `telp`) VALUES
('AGH', 'Toko Anugrah', 'Jl.Mawar no.25 Semarang', '0812345678'),
('BCL', 'Berlian Cemerlang', 'jl.Raya Solo', '0812345676'),
('IDM', 'PT Indomarco', 'jl.Merbabu Jakarta', '081212111234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kode_barang`) USING BTREE;

--
-- Indexes for table `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `idx_kode_barang` (`kode_barang`) USING BTREE,
  ADD KEY `idx_kode_pelanggan` (`kode_pelanggan`) USING BTREE;

--
-- Indexes for table `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `idx_kode_barang` (`kode_barang`) USING BTREE,
  ADD KEY `idx_kode_supplier` (`kode_supplier`) USING BTREE;

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`kode_pelanggan`) USING BTREE;

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`kode_petugas`) USING BTREE;

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`kode_supplier`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
