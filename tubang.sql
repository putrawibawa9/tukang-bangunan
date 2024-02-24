-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jan 2024 pada 15.16
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

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
-- Struktur dari tabel `favorite`
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
-- Dumping data untuk tabel `favorite`
--

INSERT INTO `favorite` (`id_fav`, `id_user`, `Id_tukang`, `nama`, `alamat`, `deskripsi`, `no_hp`, `norek`, `harga`) VALUES
(43, 2, 2, 'Pak heri', 'Denpasar', 'pak heri sudah berpengalaman bikin bangunan kandang ayam yang sangat makjos pokoknya no debat', '32164597816', '123456/BRI', 200000),
(44, 2, 5, 'ketut', 'klashdpoawebnsmnc', 'saya sudah sangat sering membuat bangunan bali, dari bale dangin, daje, jineng, sanggah, dan yang lainnya', '32164597816', '2135486/BR', 400000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `info_tukang`
--

CREATE TABLE `info_tukang` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `deskripsi` text NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `norek` varchar(20) NOT NULL,
  `harga` int(20) NOT NULL,
  `statuss` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `info_tukang`
--

INSERT INTO `info_tukang` (`id`, `nama`, `alamat`, `deskripsi`, `no_hp`, `norek`, `harga`, `statuss`) VALUES
(1, 'Pak Budi', 'Denpasar', 'pak budi sudah berpengalaman bikin bangunan kolam berenang yang sangat makjos pokoknya no debat', '032164597816', '123456/BRI', 200000, 0),
(2, 'Pak heri', 'Denpasar', 'pak heri sudah berpengalaman bikin bangunan kandang ayam yang sangat makjos pokoknya no debat', '032164597816', '123456/BRI', 200000, 0),
(3, 'Pak wawan', 'Denpasar', 'pak wawan sudah berpengalaman bikin bangunan hotel mewah yang sangat makjos pokoknya no debat', '032164597816', '123456/BNI', 200000, 0),
(4, 'Bli Doni', 'Denpasar', 'saya sudah sangat sering membuat bangunan bali, dari bale dangin, daje, jineng, sanggah, dan yang lainnya', '032164597816', '123456/BNI', 200000, 1),
(5, 'ketut', 'klashdpoawebnsmnc', 'saya sudah sangat sering membuat bangunan bali, dari bale dangin, daje, jineng, sanggah, dan yang lainnya', '032164597816', '2135486/BRI', 400000, 1),
(6, 'prema', 'jhsdflksald', 'saya sudah sangat sering membuat bangunan bali, dari bale dangin, daje, jineng, sanggah, dan yang lainnya', '21231646872', '1325431/BAC', 500000, 1),
(7, 'I GEDE RIZKI HERIANA PRAYOGA', 'bali', 'dasda', '0213785454567', '456789/BRI', 500000, 1),
(9, 'I Kdek Putu Komang', 'medan', 'dfasfasf', '343142', '33333/BCA', 20, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
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
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id_cart`, `id_tukang`, `id_user`, `nama`, `deskripsi`, `harga`, `durasi`, `no_hp`, `norek`) VALUES
(101, 1, 1, 'Pak Budi', 'pak budi sudah berpengalaman bikin bangunan kolam berenang yang sangat makjos pokoknya no debat', 200000, 1, 2147483647, '123456/BRI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
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
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_tukang`, `id_user`, `nama`, `deskripsi`, `harga`, `durasi`, `no_hp`, `norek`, `statuss`) VALUES
(7, 4, 2, 'Bli Doni', 'saya sudah sangat sering membuat bangunan bali, dari bale dangin, daje, jineng, sanggah, dan yang la', 200000, 3, 2147483647, '123456/BNI', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `alamat`, `no_hp`, `email`, `password`) VALUES
(1, 'I Kdek Putu Komang', 'medan', 343142, 'ikadekputukomang@gmail.com', '1234567890'),
(2, 'I GEDE RIZKI HERIANA PRAYOGA', 'Tabanan', 21384934, 'rizki@gmail.com', '21122019'),
(3, 'Steven', 'Denpasar', 123456987, 'stevenberutu31@gmail.com', 'Steven,310');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`id_fav`);

--
-- Indeks untuk tabel `info_tukang`
--
ALTER TABLE `info_tukang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id_fav` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `info_tukang`
--
ALTER TABLE `info_tukang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
