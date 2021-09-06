-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06 Sep 2021 pada 19.20
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_developer`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `Id_Product` varchar(20) NOT NULL,
  `Nama_Produk` text NOT NULL,
  `Harga` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`Id_Product`, `Nama_Produk`, `Harga`, `date`) VALUES
('1', 'baju', 50000, '2021-09-04 08:07:32'),
('2', 'sepatu', 100000, '2021-09-04 08:07:32'),
('3', 'kaos', 50000, '2021-09-04 08:10:54'),
('4', 'celana', 100000, '2021-09-04 08:10:54'),
('5', 'topi', 30000, '2021-09-04 08:10:54'),
('6', 'jaket', 200000, '2021-09-04 08:10:54'),
('7', 'kaca mata', 30000, '2021-09-04 08:10:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_page`
--

CREATE TABLE `product_page` (
  `Id_Product_Page` int(11) NOT NULL,
  `Order_No` int(10) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Id_Product` varchar(20) NOT NULL,
  `Shipping_Address` text NOT NULL,
  `Price` int(11) NOT NULL,
  `Total_Harga` int(11) NOT NULL,
  `Token` int(8) NOT NULL,
  `Verifikasi` varchar(50) NOT NULL,
  `Time1` datetime NOT NULL,
  `Time2` datetime NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product_page`
--

INSERT INTO `product_page` (`Id_Product_Page`, `Order_No`, `Email`, `Id_Product`, `Shipping_Address`, `Price`, `Total_Harga`, `Token`, `Verifikasi`, `Time1`, `Time2`, `date`) VALUES
(1, 1128430606, 'sabar@gmail.com', '2', 'sukabumi', 1, 100000, 11473206, 'Shiping', '2021-09-06 06:28:43', '2021-09-07 02:28:43', '2021-09-06 23:28:43'),
(2, 1133330606, 'sabar@gmail.com', '3', 'sukabumi', 1, 50000, 12383506, 'Shiping', '2021-09-06 06:33:33', '2021-09-07 02:33:33', '2021-09-06 23:33:33'),
(3, 1333330606, 'sabar@gmail.com', '3', 'sukabumi', 1, 50000, 12243506, 'Shiping', '2021-09-06 06:33:33', '2021-09-07 06:33:33', '2021-09-06 23:33:33'),
(4, 1136580606, 'sabar@gmail.com', '3', 'sukabumi', 1, 50000, 0, 'Canceled', '2021-09-06 06:36:58', '2021-09-06 06:36:58', '2021-09-06 23:36:58'),
(5, 1546550606, 'sabar@gmail.com', '1', 'sukabumi', 1, 50000, 14595206, 'Shiping', '2021-09-06 06:46:55', '2021-09-07 02:46:55', '2021-09-06 23:46:55'),
(6, 1554530606, 'sabar@gmail.com', '3', 'sukabumi', 1, 50000, 14085706, 'Shiping', '2021-09-06 06:54:53', '2021-09-07 02:54:53', '2021-09-06 23:54:53'),
(7, 1557500606, 'sabar@gmail.com', '1', 'sukabumi', 2, 100000, 0, 'Failed', '2021-09-06 06:57:50', '2021-09-06 06:57:50', '2021-09-06 23:57:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saldo_top_up`
--

CREATE TABLE `saldo_top_up` (
  `Id_Saldo` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Mobile_Number` varchar(12) NOT NULL,
  `Value` varchar(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `saldo_top_up`
--

INSERT INTO `saldo_top_up` (`Id_Saldo`, `Email`, `Mobile_Number`, `Value`, `date`) VALUES
(7, 'sabar@gmail.com', '085846761639', '620000', '2021-09-06 23:57:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `Id_User` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Password` varchar(6) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`Id_User`, `Email`, `Name`, `Password`, `date`) VALUES
(1, 'sabar@gmail.com', 'sabar', 'lab', '2021-09-01 23:43:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Id_Product`);

--
-- Indexes for table `product_page`
--
ALTER TABLE `product_page`
  ADD PRIMARY KEY (`Id_Product_Page`);

--
-- Indexes for table `saldo_top_up`
--
ALTER TABLE `saldo_top_up`
  ADD PRIMARY KEY (`Id_Saldo`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id_User`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_page`
--
ALTER TABLE `product_page`
  MODIFY `Id_Product_Page` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `saldo_top_up`
--
ALTER TABLE `saldo_top_up`
  MODIFY `Id_Saldo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
