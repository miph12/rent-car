-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 08, 2017 at 02:16 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_harga`
--

CREATE TABLE IF NOT EXISTS `tb_harga` (
  `id_harga` varchar(10) NOT NULL,
  `type_harga` varchar(10) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `keterangan` varchar(40) NOT NULL,
  PRIMARY KEY (`id_harga`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_harga`
--

INSERT INTO `tb_harga` (`id_harga`, `type_harga`, `harga`, `keterangan`) VALUES
('KD001', 'Full Day', '600000', 'baru'),
('KD002', 'Half Day', '200000', 'baru');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mobil`
--

CREATE TABLE IF NOT EXISTS `tb_mobil` (
  `id_mobil` varchar(10) NOT NULL,
  `nama_mobil` varchar(20) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `merek` varchar(10) NOT NULL,
  `warna` varchar(10) NOT NULL,
  `tahun` int(4) NOT NULL,
  `no_polisi` varchar(10) NOT NULL,
  `no_bpkb` varchar(20) NOT NULL,
  `tgl_berlaku_stnk` date NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  PRIMARY KEY (`id_mobil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mobil`
--

INSERT INTO `tb_mobil` (`id_mobil`, `nama_mobil`, `jenis`, `merek`, `warna`, `tahun`, `no_polisi`, `no_bpkb`, `tgl_berlaku_stnk`, `keterangan`) VALUES
('KM001', 'kijang lgx', 'Toyota', 'kijang', 'biru', 2006, 'P 0898 DE', '93824729857', '2016-07-21', 'lama'),
('KM002', 'kuda', '', 'kijang', 'biru muda', 2002, 'P 0889 DE', '768768768', '0000-00-00', 'lama'),
('KM003', 'Grand Livina', 'Nissan', 'Sedan', 'Silver', 2009, 'P 8909 HB', '80709809798907', '2016-11-26', 'lama');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE IF NOT EXISTS `tb_pembayaran` (
  `id_pembayaran` varchar(10) NOT NULL,
  `id_pemesanan` varchar(10) NOT NULL,
  `id_pemesan` varchar(10) NOT NULL,
  `nama_pemesan` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telepon` int(12) NOT NULL,
  `kode_pos` int(6) NOT NULL,
  `kecamatan` varchar(20) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `provinsi` varchar(20) NOT NULL,
  `bayar` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id_pembayaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemesan`
--

CREATE TABLE IF NOT EXISTS `tb_pemesan` (
  `id_pemesan` varchar(10) NOT NULL,
  `nama_pemesan` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telepon` int(12) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pemesan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pemesan`
--

INSERT INTO `tb_pemesan` (`id_pemesan`, `nama_pemesan`, `alamat`, `telepon`, `username`, `password`) VALUES
('KR001', 'yuda', 'bondowoso', 890988778, 'yuda', 'yuda'),
('KR002', 'bayu', 'banyuwangi', 2147483647, 'bayu', 'bayu'),
('KR003', 'andi', 'situbondo', 2147483647, 'baru', 'baru');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemesanan`
--

CREATE TABLE IF NOT EXISTS `tb_pemesanan` (
  `id_pemesanan` varchar(10) NOT NULL,
  `id_pemesan` varchar(10) NOT NULL,
  `id_mobil` varchar(10) NOT NULL,
  `id_sopir` varchar(10) NOT NULL,
  `id_harga` varchar(10) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `lama_hari` varchar(2) NOT NULL,
  `sub_total` varchar(15) NOT NULL,
  PRIMARY KEY (`id_pemesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengiriman`
--

CREATE TABLE IF NOT EXISTS `tb_pengiriman` (
  `id_pengiriman` varchar(10) NOT NULL,
  `id_pemesanan` varchar(10) NOT NULL,
  `id_pembayaran` varchar(10) NOT NULL,
  `id_pemesan` varchar(10) NOT NULL,
  `id_sopir` varchar(10) NOT NULL,
  `tgl_kirim` date NOT NULL,
  PRIMARY KEY (`id_pengiriman`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE IF NOT EXISTS `tb_petugas` (
  `id_petugas` varchar(10) NOT NULL,
  `nama_petugas` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telepon` int(12) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(10) NOT NULL,
  `level` varchar(10) NOT NULL,
  PRIMARY KEY (`id_petugas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama_petugas`, `alamat`, `telepon`, `username`, `password`, `level`) VALUES
('KP001', 'Mu''tasim', 'Situbondo', 2147483647, 'pimpinan', 'pimpinan', 'pimpinan'),
('KP002', 'Yuda', 'bondowoso', 889789, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sopir`
--

CREATE TABLE IF NOT EXISTS `tb_sopir` (
  `id_sopir` varchar(10) NOT NULL,
  `nama_sopir` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telepon` int(12) NOT NULL,
  PRIMARY KEY (`id_sopir`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sopir`
--

INSERT INTO `tb_sopir` (`id_sopir`, `nama_sopir`, `alamat`, `telepon`) VALUES
('KS001', 'tasim', 'ask', 7897),
('KS002', 'Andi', 'Banyuwangi', 2147483647);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
