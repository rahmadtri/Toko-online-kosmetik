-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2019 at 06:53 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kosmetik`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'rahmad', 'admin', 'rahmad triatmoko'),
(3, 'paijo', 'paijo', 'paijo');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `no_rek` varchar(50) NOT NULL,
  `nasabah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`, `no_rek`, `nasabah`) VALUES
(2, 'BRI', '123-212-434-5353', 'Rahmad');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `gambar_kategori` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `gambar_kategori`) VALUES
(1, 'Masker', '20190314010838maskeer.jpg'),
(3, 'Lipstik', '201903100242024.jpg'),
(4, 'Bedak', '201903110416426.jpg'),
(5, 'Body Lotion', '20190314011305body.jpg'),
(6, 'Krim Pelembab', '20190411105307pelembab.jpg'),
(7, 'Serum Pemutih', '20190411123918serum.jpg'),
(8, 'Parfum', '20190412091953serum.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `username_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(100) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `username_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
(1, 'rahmadaja', 'aaa123', 'rahmad', '086765453421', 'jl solo no 7'),
(2, 'paijo', 'paijo', 'Paijo Londo', '098654567321', 'klaten trucuk'),
(3, 'tuminahaja', 'tuminah', 'tuminah', '09876785642', 'jalan rawa bebek no 70 jakarta utara'),
(4, 'budi', 'budi', 'budiman', '087654345234', 'solo'),
(5, 'yogi', 'yogi', 'yogi', '087654345234', 'gunung kidul'),
(6, 'catur', '123456', 'pak catur', '087654345234', 'klaten');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(3, 19, 'tuminah', 'Mandiri', 265000, '2019-02-13', '201902131208009.jpg'),
(4, 23, 'rahmad', 'Mandiri', 305000, '2019-02-14', '20190214130507SONY.jpg'),
(5, 17, 'rahmad', 'BRI', 1397000, '2019-02-16', '201902161145024.jpg'),
(6, 16, 'rahmad', 'BRI', 1295000, '2019-02-16', '20190216120527WhatsApp Image 2019-02-15 at 16.30.02.jpeg'),
(7, 15, 'tuminah', 'Mandiri', 115000, '2019-02-16', '20190216123940WhatsApp Image 2019-02-15 at 17.33.43.jpeg'),
(8, 18, 'Paijo', 'BPD', 235000, '2019-02-16', '20190216131148WhatsApp Image 2019-02-14 at 18.24.50.jpeg'),
(9, 28, 'tuminah', 'BPD', 571000, '2019-02-22', '20190222151259WhatsApp Image 2019-02-15 at 17.33.09.jpeg'),
(10, 30, 'rahmad', 'BPD', 549, '2019-03-10', '201903100728211.jpg'),
(11, 32, 'rahmad', 'Mandiri', 239434, '2019-03-10', '20190310081027'),
(12, 34, 'tuminah', 'BPD', 88000, '2019-03-17', '20190317164546WhatsApp Image 2019-02-15 at 16.30.02.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_belanja` varchar(225) NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(225) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `catatan` varchar(225) NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `tanggal_pembelian`, `total_belanja`, `total_pembelian`, `nama_kota`, `tarif`, `alamat_pengiriman`, `catatan`, `status_pembelian`, `resi_pengiriman`) VALUES
(34, 3, '2019-03-13', '70000', 88000, 'Pandeglang', 18000, '', '', 'sudah kirim pembayaran', ''),
(35, 1, '2019-03-14', '40000', 55000, 'Jakarta Utara', 15000, 'jl merdeka perumahan bagus no 45 jakarta utara kode pos 55432 ', 'dirumah jam 5 di hari kerja', 'pending', ''),
(36, 3, '2019-03-17', '75000', 90000, 'Jakarta Pusat', 15000, 'jl merdeka no 45 jakarta utara', 'dirumah terus', 'pending', ''),
(37, 1, '2019-04-07', '25000', 32000, 'Klaten', 7000, 'r', 'r', 'pending', ''),
(38, 1, '2019-04-07', '20000', 87000, 'Nunukan', 67000, 'mandong trucuk klaten jawa tengah', 'q', 'pending', ''),
(39, 1, '2019-06-19', '25000', 40000, 'Gunung Kidul', 15000, 'adasdassasas', 'dsadasd', 'pending', ''),
(40, 6, '2019-09-09', '100000', 100000, 'Bangka Barat', 0, 'bangkas selatan', 'rumah warna biru deket kafe', 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(66, 32, 6, 1, 'Implora Lipstik', 40000, 100, 100, 40000),
(67, 32, 9, 1, 'Krim Anti Dingin', 20000, 1200, 1200, 20000),
(68, 32, 17, 1, 'cccc', 43434, 333, 333, 43434),
(69, 32, 13, 1, 'Gel Aloe Vera', 100000, 130, 130, 100000),
(70, 33, 7, 1, 'Body Lotion Vaseline', 35000, 250, 250, 35000),
(71, 33, 5, 2, 'qqqq', 1200000, 1200, 2400, 2400000),
(72, 34, 7, 2, 'Body Lotion Vaseline', 35000, 250, 500, 70000),
(73, 35, 5, 1, 'Lip Balm Aloe Vera', 25000, 50, 50, 25000),
(74, 35, 8, 1, 'Masker Naturgo', 15000, 200, 200, 15000),
(75, 36, 8, 1, 'Masker Naturgo', 15000, 200, 200, 15000),
(76, 36, 9, 1, 'Citra Hand Body', 20000, 500, 500, 20000),
(77, 36, 6, 1, 'Implora Lipstik', 40000, 100, 100, 40000),
(78, 37, 5, 1, 'Lip Balm Aloe Vera', 25000, 50, 50, 25000),
(79, 38, 11, 1, 'Marcks Bedak', 20000, 350, 350, 20000),
(80, 39, 5, 1, 'Lip Balm Aloe Vera', 25000, 50, 50, 25000),
(81, 40, 5, 1, 'exotic', 25000, 50, 50, 25000),
(82, 40, 6, 1, 'Emulsifier', 40000, 100, 100, 40000),
(83, 40, 7, 1, 'fixadura', 35000, 250, 250, 35000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `berat`, `foto_produk`, `deskripsi_produk`, `stok_produk`) VALUES
(5, 3, 'exotic', 25000, 50, 'bangunan.jpg', 'bahan bangun', 99),
(6, 3, 'Emulsifier', 40000, 100, 'bangunan2.jpg', 'bangunan', 99),
(7, 5, 'fixadura', 35000, 250, 'bangunan.jpg', 'bahan bangunann', 99),
(8, 1, 'handsoap', 15000, 200, 'bangunan2.jpg', 'handsoap', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
