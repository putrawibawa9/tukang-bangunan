-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2024 at 01:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `password`) VALUES
(1, 'putrawibawa7@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `id_fav` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `Id_tukang` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `deskripsi` text NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `norek` varchar(10) NOT NULL,
  `harga` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`id_fav`, `id_user`, `Id_tukang`, `nama`, `alamat`, `deskripsi`, `no_hp`, `norek`, `harga`) VALUES
(43, 2, 2, 'Pak heri', 'Denpasar', 'pak heri sudah berpengalaman bikin bangunan kandang ayam yang sangat makjos pokoknya no debat', '32164597816', '123456/BRI', 200000),
(44, 2, 5, 'ketut', 'klashdpoawebnsmnc', 'saya sudah sangat sering membuat bangunan bali, dari bale dangin, daje, jineng, sanggah, dan yang lainnya', '32164597816', '2135486/BR', 400000),
(45, 2, 5, 'ketut', 'klashdpoawebnsmnc', 'saya sudah sangat sering membuat bangunan bali, dari bale dangin, daje, jineng, sanggah, dan yang lainnya', '32164597816', '2135486/BR', 400000),
(46, 2, 2, 'Pak heri', 'Denpasar', 'pak heri sudah berpengalaman bikin bangunan kandang ayam yang sangat makjos pokoknya no debat', '32164597816', '123456/BRI', 200000),
(47, 2, 2, 'Pak heri', 'Denpasar', 'pak heri sudah berpengalaman bikin bangunan kandang ayam yang sangat makjos pokoknya no debat', '32164597816', '123456/BRI', 200000),
(48, 2, 2, 'Pak heri', 'Denpasar', 'pak heri sudah berpengalaman bikin bangunan kandang ayam yang sangat makjos pokoknya no debat', '32164597816', '123456/BRI', 200000),
(49, 2, 5, 'ketut', 'klashdpoawebnsmnc', 'saya sudah sangat sering membuat bangunan bali, dari bale dangin, daje, jineng, sanggah, dan yang lainnya', '32164597816', '2135486/BR', 400000);

-- --------------------------------------------------------

--
-- Table structure for table `info_tukang`
--

CREATE TABLE `info_tukang` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `deskripsi` text NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `norek` varchar(20) NOT NULL,
  `harga` int(20) NOT NULL,
  `statuss` int(11) NOT NULL,
  `foto_tukang` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `info_tukang`
--

INSERT INTO `info_tukang` (`id`, `nama`, `alamat`, `deskripsi`, `no_hp`, `norek`, `harga`, `statuss`, `foto_tukang`) VALUES
(12, 'Rojak', 'Karangasem', 'Rojak mantap', ' 085222575945', 'BRI 5844845484', 20000, 1, '65d9aabcd21df.jpg'),
(13, 'Bujer', 'Dalung', 'Tukang dari dalung', ' 085222575945', 'BRI 5844845484', 70000, 1, '65d9bc059370e.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_cart` int(11) NOT NULL,
  `id_tukang` int(11) NOT NULL,
  `id_user` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `durasi` int(11) NOT NULL,
  `no_hp` int(15) NOT NULL,
  `norek` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_cart`, `id_tukang`, `id_user`, `nama`, `deskripsi`, `harga`, `durasi`, `no_hp`, `norek`) VALUES
(101, 1, 1, 'Pak Budi', 'pak budi sudah berpengalaman bikin bangunan kolam berenang yang sangat makjos pokoknya no debat', 200000, 1, 2147483647, '123456/BRI');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_tukang` int(11) NOT NULL,
  `id_user` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `durasi` int(11) NOT NULL,
  `no_hp` int(15) NOT NULL,
  `norek` varchar(10) NOT NULL,
  `statuss` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_tukang`, `id_user`, `nama`, `deskripsi`, `harga`, `durasi`, `no_hp`, `norek`, `statuss`) VALUES
(7, 4, 2, 'Bli Doni', 'saya sudah sangat sering membuat bangunan bali, dari bale dangin, daje, jineng, sanggah, dan yang la', 200000, 3, 2147483647, '123456/BNI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` int(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `alamat`, `no_hp`, `email`, `password`) VALUES
(1, 'I Kdek Putu Komang', 'medan', 343142, 'ikadekputukomang@gmail.com', '1234567890'),
(2, 'I GEDE RIZKI HERIANA PRAYOGA', 'Tabanan', 21384934, 'rizki@gmail.com', '21122019'),
(3, 'Steven', 'Denpasar', 123456987, 'stevenberutu31@gmail.com', 'Steven,310'),
(4, 'wuhan', 'Denpasar', 123456987, 'putrabali415@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`id_fav`);

--
-- Indexes for table `info_tukang`
--
ALTER TABLE `info_tukang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id_fav` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `info_tukang`
--
ALTER TABLE `info_tukang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
