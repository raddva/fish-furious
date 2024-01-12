-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2024 at 10:07 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fishnfurious`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `kodeadm` varchar(10) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`kodeadm`, `nama`, `username`, `password`) VALUES
('A0001', 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(5) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `kodeproduk` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `qty` int(5) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `kode`, `kodeproduk`, `nama`, `qty`, `harga`) VALUES
(8, 'C0003', 'P0009', 'Keong Hias', 1, 100000),
(13, 'C0001', 'P0006', 'Louhan', 1, 100000),
(17, 'C0002', 'P0006', 'Louhan', 1, 100000),
(18, 'C0001', 'P0001', 'Arwana', 2, 500000),
(26, 'C0008', 'P0006', 'Louhan', 1, 100000),
(28, 'C0007', 'P0002', 'Chana Pulchra', 1, 150000);

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `invoice` varchar(10) NOT NULL,
  `kodecust` varchar(10) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kpos` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `invoice`, `kodecust`, `total`, `nama`, `provinsi`, `kota`, `alamat`, `kpos`) VALUES
(2, 'INV0001', 'C0005', 115000, 'nila', 'jawatimur', 'malang', 'ngantang', '66394'),
(3, 'INV0002', 'C0002', 20000, 'Saras mutia', 'Jawa Timur', 'Malang', 'Malang', '66366'),
(4, 'INV0003', 'C0007', 60000, 'sheila', 'jatim', 'Batu', 'batu', '6651'),
(5, 'INV0004', 'C0006', 450000, 'nadya', 'jatim', 'Batu', 'batu', '6651'),
(6, 'INV0005', 'C0006', 225000, 'nadya', 'jatim', 'Batu', 'batu', '6651');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `kode` varchar(10) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `telp` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`kode`, `nama`, `email`, `username`, `password`, `telp`) VALUES
('C0001', 'Nadya', 'areraraas@gmail.com', 'raddva', 'e8ff2dde8e070e9cf39a710e2d19fc83', '085806934305'),
('C0002', 'saras', 'sarasmutia163@gmail.com', 'sarascantiknanimut', 'a3f339ceb8604e8204c1856d00efb64f', '08888888888'),
('C0003', 'Test', 'root@mail.com', 'root', '63a9f0ea7bb98050796b649e85481845', '08888888888'),
('C0004', 'Childe', 'ajax@mail.com', 'tartaglia', 'fcb7308f75fa8a877eaba74951090365', '08888888888'),
('C0005', 'nila', 'nilnila@gmail.com', 'nilawidha', 'ab1b96cab73f21734eba3e596efe14c6', '085693241568'),
('C0006', 'titto', 'areraraas@gmail.com', 'tittoo', '202cb962ac59075b964b07152d234b70', '428084080340'),
('C0007', 'Nadya Auradiva', 'areraraas@gmail.com', 'nadyea', '1e6eb2590ee576e8f788729ad596403a', '085806934305');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `kodeproduk` varchar(10) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kodeproduk`, `nama`, `image`, `deskripsi`, `harga`) VALUES
('P0001', 'Arwana', 'arwana.jpg', 'Arwana adalah salah satu spesies ikan air tawar dari Asia Tenggara. Arwana memiliki badan yang panjang; sirip dubur yang terletak jauh di belakang badan. Ikan Arwana adalah ikan bertulang dari keluarga Osteoglossidae, yang juga dikenal sebagai bonytongues. makanani ikan tersebut adalah jangkrik udang daging DLL.', 500000),
('P0002', 'Chana Pulchra', 'chanap.jpg', 'Ikan pulchra adalah ikan predator ikan ini hidup di sungai dengan arus tinggi dan kadar oksigen tinggi makanan ikan ini adalah jangkrik udang DLL', 150000),
('P0003', 'Cupang', 'cupang.jpg', 'Cupang, ikan laga, atau ikan adu siam (Betta sp.) adalah ikan air tawar yang habitat asalnya adalah beberapa negara di Asia Tenggara, antara lain Thailand, Malaysia, Brunei Darussalam, Singapura, Vietnam, dan Indonesia. Ikan ini mempunyai bentuk dan karakter yang unik dan cenderung agresif dalam mempertahankan wilayahnya.', 20000),
('P0004', 'Koi', 'koi.jpg', 'Koi adalah sejenis ikan yang termasuk carp amur (Cyprinus rubrofuscus) yang mempunyai ornamen yang menarik dan jinak. Seringkali ikan ini dianggap varian dari ikan mas (Cyprinus carpio) padahal secara genetik berbeda keduanya berbeda. Koi biasanya dipelihara.', 50000),
('P0005', 'Koki', 'koki.jpg', 'Koki adalah ikan yg membutuhkan perawatan sedikit rumit makanan ikan koki adalah pelet ikan', 15000),
('P0006', 'Louhan', 'louhan.jpg', 'Ikan Louhan adalah salah satu ikan primadona yang dijadikan sebagai ikan hias. Ikan louhan memiliki ciri khas yaitu terdapat benjolan besar pada bagian kepalanya.  Dan sering disebut dengan ikan Jenong. Untuk sebagian orang ada yang percaya bahwa ikan ini dapat membawa keberuntungan bagi para pemiliknya.  Terdapat beberapa jenis ikan louhan, dan jenis-jenis ikan louhan lokal tidak kalah cantik dengan ikan louhan yang impor.', 100000),
('P0007', 'Udang Hias', 'urang.png', 'udang hias berguna untuk membersihkan aquarium dari lumut dan mempercantik aquarium', 5000),
('P0008', 'Takari', 'pakan.jpg', 'pakan ikan', 10000),
('P0009', 'Keong Hias', 'keong.jpg', 'keong hias berfungsi membantu membersihkan aquarium dari lumut dan kotoran ikan juga mempercantik aquarium', 2500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`kodeadm`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kodeproduk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
