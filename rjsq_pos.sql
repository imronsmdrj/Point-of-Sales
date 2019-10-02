-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2019 at 12:27 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rjsq_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `bid` varchar(15) NOT NULL,
  `bnama` varchar(45) DEFAULT NULL,
  `bsatuan` varchar(35) DEFAULT NULL,
  `bharga_pokok` double DEFAULT NULL,
  `bharga_jual` double DEFAULT NULL,
  `bharga_jual_grosir` double DEFAULT NULL,
  `bstok` int(11) NOT NULL,
  `btgl_masuk` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bkategori_id` int(11) DEFAULT NULL,
  `buser_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`bid`, `bnama`, `bsatuan`, `bharga_pokok`, `bharga_jual`, `bharga_jual_grosir`, `bstok`, `btgl_masuk`, `bkategori_id`, `buser_id`) VALUES
('8991102024711', 'Pencuci muka', 'PCS', NULL, 12000, 15000, 10, '2019-09-03 17:34:00', 1, NULL),
('8991102024714', 'Pepesodent', 'PCS', NULL, 12000, 13000, 19, '2019-08-27 14:18:12', 1, NULL),
('8991102024716', 'Pepesodent', 'PCS', NULL, 20000, 25000, 8, '2019-08-23 16:41:00', 2, NULL),
('8991102024717', 'Action Figure', 'PCS', NULL, 500000, 600000, 2, '2019-09-01 14:08:03', 3, NULL),
('921442024716', 'Pepesodent', 'PCS', NULL, 12000, 13000, 10, '2019-08-18 11:35:34', 3, NULL),
('9997202024716', 'Parfume', 'BOX', NULL, 50000, 80000, 30, '2019-08-23 16:44:25', 1, NULL),
('BRG-004', 'Indomie Rasa Empal Gentong', 'BOX', 3500, 98500, 3500, 84, '2018-11-14 04:09:47', 2, NULL),
('BRG-005', 'Indomie Goreng Rasa Dendeng Balado', 'BOX', 3500, 89000, 3200, 151, '2018-11-14 04:12:06', 2, NULL),
('BRG-006', 'Sedaap Rasa Ayam Bawang', 'BOX', 2800, 87500, 3000, 44, '2018-11-14 04:15:34', 2, NULL),
('BRG-007', 'Sedaap Rasa Kari Spesial', 'BOX', 3000, 92000, 3300, 72, '2018-11-14 04:17:05', 2, NULL),
('BRG-008', 'Bodrex Migran', 'PCS', 2000, 37500, 2500, 86, '2018-11-14 04:19:39', 1, NULL),
('BRG-009', 'Panadol Paracetamol', 'PCS', 1500, 40000, 2650, 78, '2018-11-14 04:20:36', 1, NULL),
('BRG-010', 'Mixagrip Flu', 'PCS', 2700, 38200, 2200, 260, '2018-11-14 04:21:42', 1, NULL),
('BRG-011', 'Paramex Sakit Kepala', 'PCS', 2800, 43500, 3000, 259, '2018-11-14 04:22:42', 1, NULL),
('BRG-012', 'Tramadol', 'PCS', 2000, 36600, 2750, 166, '2018-12-07 13:52:05', 1, NULL),
('BRG-013', 'Shampo Sunsilk', 'PCS', 1000, 40200, 2000, 192, '2018-12-23 17:19:26', NULL, NULL),
('BRG-014', 'Masako Rasa Ayam', 'PCS', NULL, 51500, 1000, 200, '2019-01-05 16:04:07', 4, NULL),
('BRG-015', 'Aqua Botol 500ml', 'BOX', NULL, 125000, 3250, 28, '2019-01-05 16:46:56', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `ig` varchar(30) NOT NULL,
  `desc` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `website` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `nama`, `email`, `ig`, `desc`, `alamat`, `website`) VALUES
(1, 'RJSQ - Point Of Sales with Apriori Method', 'rojasqi.fadilla13@gmail.com', '@rojasqifadilla13', 'Terdepan, Terpercaya, Tumbuh Bersama Anda', 'Jl. Sarijadi No.54 Sariasih Kota Bandung 40511', 'www.toko-rjsq.com');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `dbeli_id` int(11) NOT NULL,
  `dbeli_nofaktur` varchar(15) DEFAULT NULL,
  `dbeli_barang_id` varchar(15) DEFAULT NULL,
  `dbeli_harga` double DEFAULT NULL,
  `dbeli_jumlah` int(11) DEFAULT NULL,
  `dbeli_total` double DEFAULT NULL,
  `dbeli_kode` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_dj` int(11) NOT NULL,
  `pj_id` varchar(15) NOT NULL,
  `djual_bkategori_id` int(11) DEFAULT NULL,
  `djual_bid` varchar(15) DEFAULT NULL,
  `djual_bnama` varchar(45) DEFAULT NULL,
  `djual_qty` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_dj`, `pj_id`, `djual_bkategori_id`, `djual_bid`, `djual_bnama`, `djual_qty`) VALUES
(2, 'PJ-002', NULL, 'BRG-006', NULL, 12),
(3, 'PJ-002', NULL, 'BRG-005', NULL, 12),
(7, 'PJ-003', NULL, 'BRG-004', NULL, 10),
(8, 'PJ-004', NULL, 'BRG-004', NULL, 10),
(9, 'PJ-004', NULL, 'BRG-005', NULL, 6),
(10, 'PJ-004', NULL, 'BRG-010', NULL, 10),
(11, 'PJ-004', NULL, 'BRG-011', NULL, 11),
(12, 'PJ-005', NULL, 'BRG-007', NULL, 8),
(13, 'PJ-005', NULL, 'BRG-010', NULL, 6),
(14, 'PJ-005', NULL, 'BRG-008', NULL, 6),
(15, 'PJ-006', NULL, 'BRG-005', NULL, 5),
(16, 'PJ-006', NULL, 'BRG-006', NULL, 4),
(18, 'PJ-007', NULL, 'BRG-006', NULL, 4),
(20, 'PJ-008', NULL, 'BRG-008', NULL, 3),
(21, 'PJ-009', NULL, 'BRG-006', NULL, 3),
(22, 'PJ-009', NULL, 'BRG-012', NULL, 4),
(23, 'PJ-010', NULL, 'BRG-006', NULL, 2),
(24, 'PJ-010', NULL, 'BRG-013', NULL, 2),
(25, 'PJ-010', NULL, 'BRG-010', NULL, 4),
(26, 'PJ-010', NULL, 'BRG-005', NULL, 4),
(27, 'PJ-011', NULL, 'BRG-006', NULL, 3),
(28, 'PJ-011', NULL, 'BRG-009', NULL, 12),
(29, 'PJ-012', NULL, 'BRG-008', NULL, 5),
(30, 'PJ-013', NULL, 'BRG-015', NULL, 5),
(31, 'PJ-013', NULL, 'BRG-006', NULL, 6),
(32, 'PJ-013', NULL, 'BRG-009', NULL, 10),
(33, 'PJ-014', NULL, 'BRG-015', NULL, 2),
(34, 'PJ-014', NULL, 'BRG-006', NULL, 2),
(35, 'PJ-014', NULL, 'BRG-013', NULL, 6),
(36, 'PJ-015', NULL, 'BRG-004', NULL, 12),
(37, 'PJ-016', NULL, '921442024716', NULL, 2),
(38, 'PJ-017', NULL, '8991102024716', NULL, 2),
(39, 'PJ-018', NULL, '8991102024717', NULL, 8);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'Obat-Obatan'),
(2, 'Makanan'),
(3, 'Perlengkapan Rumah Tangga'),
(4, 'Bumbu Dapur'),
(8, 'Perlengkapan Sekolah'),
(9, 'Perlengkapan Sekolah'),
(10, 'Mainan'),
(12, 'Perlengkapan Alat Mandi');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `pb_kode` varchar(15) NOT NULL,
  `pb_nofaktur` varchar(15) DEFAULT NULL,
  `pb_tanggal` date DEFAULT NULL,
  `pb_supplier_id` varchar(15) DEFAULT NULL,
  `pb_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `pj_id` varchar(15) NOT NULL,
  `pj_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pj_total` double DEFAULT NULL,
  `pj_jumlah_uang` double DEFAULT NULL,
  `pj_kembalian` double DEFAULT NULL,
  `pj_supplier_id` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`pj_id`, `pj_tanggal`, `pj_total`, `pj_jumlah_uang`, `pj_kembalian`, `pj_supplier_id`) VALUES
('PJ-008', '2019-01-02 17:00:00', 9000, 10000, 1000, 'SUP-003'),
('PJ-009', '2019-01-02 17:00:00', 22500, 30000, 7500, 'SUP-002'),
('PJ-010', '2019-01-02 17:00:00', 30000, 31000, 1000, 'SUP-002'),
('PJ-011', '2019-01-02 17:00:00', 40500, 50000, 9500, 'SUP-002'),
('PJ-012', '2019-01-02 17:00:00', 15000, 50000, 35000, 'SUP-001'),
('PJ-013', '2019-01-05 17:00:00', 1550000, 2000000, 450000, 'SUP-004'),
('PJ-014', '2019-01-07 17:00:00', 666200, 700000, 33800, 'SUP-003'),
('PJ-015', '2019-08-17 17:00:00', 1182000, 2000000, 818000, 'SUP-002'),
('PJ-016', '2019-08-17 17:00:00', 24000, 25000, 1000, 'SUP-003'),
('PJ-017', '2019-08-31 17:00:00', 40000, 120000, 80000, 'SUP-005'),
('PJ-018', '2019-09-04 17:00:00', 4000000, 5000000, 1000000, 'SUP-005');

-- --------------------------------------------------------

--
-- Table structure for table `retur`
--

CREATE TABLE `retur` (
  `rid` int(11) NOT NULL,
  `rtanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `rbarang_id` varchar(15) DEFAULT NULL,
  `rbarang_nama` varchar(50) DEFAULT NULL,
  `rbarang_satuan` varchar(30) DEFAULT NULL,
  `rharga_jual` double DEFAULT NULL,
  `rqty` int(11) DEFAULT NULL,
  `rsubtotal` double DEFAULT NULL,
  `rketerangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retur`
--

INSERT INTO `retur` (`rid`, `rtanggal`, `rbarang_id`, `rbarang_nama`, `rbarang_satuan`, `rharga_jual`, `rqty`, `rsubtotal`, `rketerangan`) VALUES
(60, '2019-08-18 12:05:49', '921442024716', 'Pepesodent', 'PCS', 12000, 1, 12000, 'Males ah'),
(61, '2019-08-31 11:50:08', '8991102024714', 'Pepesodent', 'PCS', 12000, 1, 12000, 'Rusak'),
(62, '2019-08-31 11:50:30', '8991102024716', 'Pepesodent', 'PCS', 20000, 4, 80000, 'rusak'),
(63, '2019-08-31 11:50:50', '8991102024714', 'Pepesodent', 'PCS', 12000, 1, 12000, 'Rusak'),
(64, '2019-09-01 14:04:41', '8991102024714', 'Pepesodent', 'PCS', 12000, 1, 12000, 'Rusak'),
(65, '2019-09-01 14:05:20', '8991102024714', 'Pepesodent', 'PCS', 12000, 1, 12000, 'Rusak Berat'),
(66, '2019-09-01 14:05:40', '8991102024716', 'Pepesodent', 'PCS', 20000, 1, 20000, 'Males ah'),
(67, '2019-09-01 14:05:55', 'BRG-005', 'Indomie Goreng Rasa Dendeng Balado', 'BOX', 89000, 1, 89000, 'Rusak'),
(68, '2019-09-01 14:06:08', 'BRG-008', 'Bodrex Migran', 'PCS', 37500, 1, 37500, 'Rusak');

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `sid` varchar(15) NOT NULL,
  `snama` varchar(35) DEFAULT NULL,
  `salamat` varchar(100) DEFAULT NULL,
  `stelp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`sid`, `snama`, `salamat`, `stelp`) VALUES
('SUP-001', 'Ujang Mamprang', 'Jl.Nyasar Gg.Buntu Rt:04/04 No.102 Kec.Cimenyan Purwakarta', '082123456789'),
('SUP-002', 'Mumun Karmila', 'Jl.Cigondewah No.22 Rt:02/04 Kec.Sukaluyu Bogor', '02212365'),
('SUP-003', 'Solih Solihin', 'Jl.Cipatewew Raya No.332 Rt:09/08 Kec.Kebonkawung Rancaekek', '083214747476'),
('SUP-004', 'Jonathan Bauman', 'Jl.Sukabumi no.99 rt:01/02 kec.sukijan kel.kemajen Bandung', '085974784842'),
('SUP-005', 'Arya Santoso', 'Jl. Bhayangkara Gg. Karakterdes III. No. 13', '0852800781278'),
('SUP-006', 'Maman Tulungan', 'Jl. Jakarta no. 50', '087621349874'),
('SUP-007', 'Nicholas Samuel', 'Jl. Mars Pasirwaluyu. No. 88', '085278867219');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(35) DEFAULT NULL,
  `username` varchar(35) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL,
  `user_level` enum('Admin','Kasir') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `nama`, `username`, `password`, `user_level`) VALUES
(1, 'Rojasqi Fadilla', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(2, 'Dadangxs', 'kasir', 'caf1a3dfb505ffed0d024130f58c5cfa', 'Kasir'),
(8, 'Manon', 'manonsiadmin', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Admin'),
(9, 'Sodik', 'sodiksikasir', 'a01610228fe998f515a72dd730294d87', 'Kasir'),
(10, 'Susay Manoy', 'Suasay', 'caf1a3dfb505ffed0d024130f58c5cfa', 'Kasir'),
(11, 'Imron Sumadireja', 'admin', '1844156d4166d94387f1a4ad031ca5fa', 'Admin'),
(12, 'Cokro', 'Cok123', 'caf1a3dfb505ffed0d024130f58c5cfa', 'Admin'),
(13, 'Salman Ihsan', 'salman', 'a01610228fe998f515a72dd730294d87', 'Kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `bkategori_id` (`bkategori_id`),
  ADD KEY `buser_id` (`buser_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`dbeli_id`),
  ADD KEY `dbeli_nofaktur` (`dbeli_nofaktur`),
  ADD KEY `dbeli_barang_id` (`dbeli_barang_id`),
  ADD KEY `dbeli_kode` (`dbeli_kode`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_dj`),
  ADD KEY `djual_nofaktur` (`djual_bkategori_id`,`djual_bid`),
  ADD KEY `djual_bid` (`djual_bid`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`pb_kode`),
  ADD KEY `pb_kode` (`pb_kode`,`pb_supplier_id`,`pb_user_id`),
  ADD KEY `pb_user_id` (`pb_user_id`),
  ADD KEY `pb_supplier_id` (`pb_supplier_id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`pj_id`),
  ADD KEY `pj_user_id` (`pj_supplier_id`);

--
-- Indexes for table `retur`
--
ALTER TABLE `retur`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `dbeli_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_dj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `retur`
--
ALTER TABLE `retur`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`buser_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`bkategori_id`) REFERENCES `kategori` (`kategori_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD CONSTRAINT `detail_pembelian_ibfk_1` FOREIGN KEY (`dbeli_barang_id`) REFERENCES `barang` (`bid`),
  ADD CONSTRAINT `detail_pembelian_ibfk_2` FOREIGN KEY (`dbeli_kode`) REFERENCES `pembelian` (`pb_kode`) ON DELETE NO ACTION;

--
-- Constraints for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD CONSTRAINT `detail_penjualan_ibfk_1` FOREIGN KEY (`djual_bid`) REFERENCES `barang` (`bid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `detail_penjualan_ibfk_2` FOREIGN KEY (`djual_bkategori_id`) REFERENCES `kategori` (`kategori_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`pb_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`pb_supplier_id`) REFERENCES `suplier` (`sid`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`pj_supplier_id`) REFERENCES `suplier` (`sid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
