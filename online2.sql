--
-- Database: `online2`
--
CREATE DATABASE IF NOT EXISTS `online2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `online2`;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah_barang` int(5) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `harga`, `jumlah_barang`, `deskripsi`, `kategori`, `foto`) VALUES
(2, 'undangan', 30000, 200, 'undangan ini cocok untuk pernikahan maupun khitanan, tersedia warna kuning', 'undangan', 'IMG_20170327_194711.jpg'),
(3, 'tenda 1', 100000, 1, 'tenda dengan kualitas lumayan', 'tenda', 'IMG_20170327_191828.jpg'),
(4, 'tenda 3', 5000000, 3, 'tenda dengan kualitas ekslusif harga terjangkau', 'tenda', 'IMG_20170327_191855.jpg'),
(5, 'tenda 4', 4800000, 3, 'tenda dengan kualitas premium dengan luas total 150m2', 'undangan', 'IMG_20170327_191731.jpg'),
(6, 'tenda 5', 3200000, 4, 'tenda ini jauh lebih sederhana dan unik', 'tenda', 'IMG_20170327_191357.jpg'),
(7, 'undangan 2', 2000, 100, 'surat undangan dengan model ekslusif', 'undangan', 'IMG_20170327_194516.jpg'),
(8, 'tenda 6', 4400000, 3, 'tenda dengan nuansa romantik', 'undangan', 'IMG_20170327_191454.jpg'),
(9, 'undangan 3', 1500, 300, 'dengan motif yang sederhana namun tetap berkualitas', 'undangan', 'IMG_20170327_194339.jpg'),
(10, 'undangan 4', 1200, 250, 'undangan untuk pernikahan', 'undangan', 'IMG_20170327_194450.jpg'),
(11, 'undangan 5', 2200, 230, 'undangan dengan motif baik', 'undangan', 'IMG_20170327_194544.jpg'),
(12, 'undangan 6', 1900, 270, 'undangan pantas untuk khitanan', 'undangan', 'IMG_20170327_194609.jpg'),
(13, 'undangan 7', 1800, 320, 'undangan yang sangat simple nan murah', 'undangan', 'IMG_20170327_194727.jpg'),
(14, 'undangan 8 ', 1750, 300, 'undangan yang paling laris', 'undangan', 'IMG_20170327_195152.jpg'),
(15, 'tenda', 2500000, 5, 'tenda dengan kapasitas kursi 500 kursi dan panjang 100m2', 'tenda', 'IMG_20170327_191557.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang2`
--

CREATE TABLE `keranjang2` (
  `id_keranjang` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  `id_session` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'eman', '123');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_beli` int(11) NOT NULL,
  `pembeli` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` int(20) NOT NULL,
  `banyak` int(11) NOT NULL,
  `hari` varchar(15) NOT NULL,
  `ket` varchar(100) NOT NULL,
  `rek` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `id_session` varchar(100) NOT NULL,
  `tanggal` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_beli`, `pembeli`, `alamat`, `telepon`, `banyak`, `hari`, `ket`, `rek`, `id`, `id_session`, `tanggal`) VALUES
(18, 'contoh', 'khkjhkj', 98908, 1, '1 hari', '', '2334-1234-4343-3452 (BNI)', 10, '31ou2b66l561jhqdmhdftkrhd5', ''),
(21, 'eman', 'uygugi', 2147483647, 1, '1 hari', 'lknl', '0928-2334-2093-2390 (BCA)', 13, 'qqi7bbu5ub14ql7trep5dqb6i5', ''),
(23, 'lsknglk', 'lnlk', 0, 1, '1 hari', '', '0928-2334-2093-2390 (BCA)', 13, 'k4cvt9lh3sbvuemp8te8mfllk5', '2017-05-11'),
(24, 'wsd', 'sd', 12, 1, '2 hari', 'sd', '0928-2334-2093-2390 (BCA)', 14, 'n47f4dk4ui1j1nn09jl7d7h4p5', '2017-05-16'),
(25, 'we', 'rdd', 123, 1, '3 hari', '', '0928-2334-2093-2390 (BCA)', 13, 'i96is79mmfvteoi23lqq7o4sn3', '2017-05-16'),
(26, 'eman', 'kjnk', 980, 2, '4 hari', '', '0928-2334-2093-2390 (BCA)', 14, 'ml1ucno7r231oe5tb6dfhk5nv0', '2017-05-16'),
(27, 'harid', 'uiyiuy98', 9879, 2, '3 hari', '', '0928-2334-2093-2390 (BCA)', 7, '3tc9bdqv1f065l3r12orck94p7', '2017-05-16'),
(28, 'harid', 'jhkjkjhkjhk', 2147483647, 2, '2 hari', '', '0928-2334-2093-2390 (BCA)', 7, '0ieorkfo42dmtu34hepclpma20', '16-05-2017'),
(29, 'skdlfk', 'lknlk', 980, 2, '3 hari', '', '2334-1234-4343-3452 (BNI)', 12, 'chtv4a3hiptl6d0rq3h0fc6h15', '16-05-2017');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang2`
--
ALTER TABLE `keranjang2`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_beli`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `keranjang2`
--
ALTER TABLE `keranjang2`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_beli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `keranjang2`
--
ALTER TABLE `keranjang2`
  ADD CONSTRAINT `keranjang2_ibfk_1` FOREIGN KEY (`id`) REFERENCES `barang` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id`) REFERENCES `barang` (`id`) ON UPDATE CASCADE;
