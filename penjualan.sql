-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 19, 2016 at 06:00 
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) NOT NULL,
  `user` varchar(30) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `type` enum('admin','user','') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `nama`, `user`, `pass`, `type`) VALUES
(1, 'Administrator', 'admin', '$2y$10$UTDfSYDge3Hyw7duD2S/VeRkar/TtR56In5IR0TlbHkH42OqgJg72', 'admin'),
(2, 'Personal User', 'user', '$2y$10$yNRytSTDHHOR6Q4UQHc2yOtJQFuIJ/t7/sgzSXfiYrYwXpyMk5PTC', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `sepeda`
--

CREATE TABLE IF NOT EXISTS `sepeda` (
  `kode_sepeda` int(5) NOT NULL AUTO_INCREMENT,
  `merek` varchar(50) NOT NULL,
  `nama_sepeda` varchar(50) NOT NULL,
  `size_sepeda` varchar(2) NOT NULL,
  `harga_sepeda` int(100) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_sepeda`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `sepeda`
--

INSERT INTO `sepeda` (`kode_sepeda`, `merek`, `nama_sepeda`, `size_sepeda`, `harga_sepeda`, `jumlah_barang`, `gambar`) VALUES
(9, 'Polygon', 'Xtrada 2.0', '26', 5500000, 3, 'extrada2,0.jpg'),
(11, 'Thrill', 'Ricochet 5.0', '26', 5600000, 7, 'thrill_ricochet5,0.jpg'),
(13, 'Thrill', 'Ricochet 3.0', '26', 5600000, 7, 'thrill_ricochet_3,0.jpg'),
(15, 'Thrill', 'Ricochet 4.0', '26', 5600000, 7, 'thrill_ricochet_4,0.jpg'),
(26, 'Polygon', 'Monarch 3.0', '26', 5600000, 7, 'monarch_3,0.png'),
(28, 'Polygon', 'Xtrada 4.0', '26', 5600000, 7, 'xtrada_40.jpg'),
(32, 'Family', 'Truck', '16', 800000, 7, 'family_truck_16.JPG'),
(33, 'WTP', 'BMX WTP Justice', '20', 3000000, 3, 'wtp_justice.jpg'),
(37, 'Thrill', 'Ricochet 2.0', '26', 3000000, 5, 'thrill2,0.png'),
(38, 'Wimcycle', 'Dragster', '20', 1300000, 3, 'dragster.jpg'),
(40, 'Wimcycle', 'Strawberry', '12', 800000, 3, 'wimcycle_strawberry_18.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `table_chart`
--

CREATE TABLE IF NOT EXISTS `table_chart` (
  `id_beli` int(5) NOT NULL AUTO_INCREMENT,
  `nama_sepeda` varchar(50) NOT NULL,
  `size` varchar(10) NOT NULL,
  `jumlah_beli` int(5) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id_beli`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `table_chart`
--

INSERT INTO `table_chart` (`id_beli`, `nama_sepeda`, `size`, `jumlah_beli`, `harga`) VALUES
(1, 'sss', '', 0, 0),
(2, 'Wimcycle Strawberry', '12', 1, 800000),
(3, 'Wimcycle Strawberry', '12', 2, 800000),
(4, 'Wimcycle Strawberry', '12', 2, 800000),
(5, 'Wimcycle Strawberry', '12', 2, 800000),
(6, 'Thrill Ricochet 4.0', '26', 2, 5600000),
(7, 'Thrill Ricochet 3.0', '26', 5, 5600000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
