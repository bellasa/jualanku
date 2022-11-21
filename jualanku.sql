-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2022 at 05:58 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jualanku`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_cart`
--

CREATE TABLE `tb_cart` (
  `cart_id` int(11) NOT NULL,
  `cart_cookie_id` int(11) NOT NULL,
  `cart_produk_id` int(11) NOT NULL,
  `cart_produk_qty` int(11) NOT NULL,
  `cart_produk_variant_id` int(11) DEFAULT NULL,
  `cart_added` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_cart`
--

INSERT INTO `tb_cart` (`cart_id`, `cart_cookie_id`, `cart_produk_id`, `cart_produk_qty`, `cart_produk_variant_id`, `cart_added`) VALUES
(1, 12, 1, 3, 12, '2020-12-05'),
(2, 12, 4, 1, 20, '2020-12-05'),
(4, 12, 3, 4, 22, '2020-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cookie`
--

CREATE TABLE `tb_cookie` (
  `cookie_id` int(11) NOT NULL,
  `cookie_key` varchar(256) NOT NULL,
  `cookie_nama` varchar(128) NOT NULL,
  `cookie_wa` int(11) NOT NULL,
  `cookie_province` int(11) NOT NULL,
  `cookie_city` int(11) NOT NULL,
  `cookie_alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_cookie`
--

INSERT INTO `tb_cookie` (`cookie_id`, `cookie_key`, `cookie_nama`, `cookie_wa`, `cookie_province`, `cookie_city`, `cookie_alamat`) VALUES
(12, '4YZjxsjPMFB8jgU5', '', 0, 0, 0, ''),
(17, 'SqQzlEYg4ItboqD5', '', 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_coupon`
--

CREATE TABLE `tb_coupon` (
  `coupon_id` int(11) NOT NULL,
  `coupon_user_id` int(11) NOT NULL,
  `coupon_tipe` varchar(16) NOT NULL,
  `coupon_value` int(11) NOT NULL,
  `coupon_require` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_coupon`
--

INSERT INTO `tb_coupon` (`coupon_id`, `coupon_user_id`, `coupon_tipe`, `coupon_value`, `coupon_require`) VALUES
(1, 1, 'potongan', 10000, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `order_id` int(11) NOT NULL,
  `order_cookie_id` int(11) NOT NULL,
  `order_produk_id` int(11) NOT NULL,
  `order_produk_qty` int(11) NOT NULL,
  `order_method` varchar(64) NOT NULL,
  `order_ongkir` int(11) NOT NULL,
  `order_price` int(11) NOT NULL,
  `order_provinsi` varchar(128) NOT NULL,
  `order_kabupaten` varchar(128) NOT NULL,
  `order_kecamatan` varchar(128) NOT NULL,
  `order_alamat` varchar(256) NOT NULL,
  `order_process` tinyint(1) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `produk_id` int(11) NOT NULL,
  `produk_user_id` int(11) NOT NULL,
  `produk_nama` varchar(256) NOT NULL,
  `produk_deskripsi` text NOT NULL,
  `produk_variant_nama` varchar(32) DEFAULT NULL,
  `produk_harga` int(11) NOT NULL,
  `produk_diskon` int(11) NOT NULL,
  `produk_stock` int(11) NOT NULL,
  `produk_berat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`produk_id`, `produk_user_id`, `produk_nama`, `produk_deskripsi`, `produk_variant_nama`, `produk_harga`, `produk_diskon`, `produk_stock`, `produk_berat`) VALUES
(1, 1, 'Baju', 'New and recommended... Talita Cable by Lizzy ini pake mesin 3get dan rajutan kesenian manual melalui proses yg sgt rumit, super tebel dan bagus banget 1 org cmn bs produksi 1 baju sehari untuk model ini.... ini bnr2 mirip 100% sama rajutan yg hrga 500rb 😭 Harga promo ya cmn sampe akhir bln ini ❤️ Yuk Langsung di borong girls \r\n\r\nNama Produk : Talita cable\r\nBahan : rajut (knit) lembut,dan, adem\r\n\r\nwarna : \r\ndenim\r\nburgundhy \r\nlilac\r\navocado \r\nmustard\r\nemerald\r\nDetail Ukuran : \r\nlingkar dada : 124cm\r\npanjang badan : 65cm\r\npanjang lengan : 60cm\r\nlingkar lengan : 42 cm\r\n\r\nBerat : 600 gram\r\n\r\nBARANG YANG DITERIMA TIDAK SESUAI / CACAT ?\r\nTidak perlu khawatir, kami berikan GARANSI RETUR BARANG\r\nSilahkan LANGSUNG CHAT SEBELUM MEMBERIKAN RATING dan REVIEW ^_^\r\nKami akan melayani Anda dengan senang hati...\r\n', 'size', 55000, 9000, 5, 150),
(2, 1, 'Senter', 'Senter Swat mini yang super terang dengan 3 Mode : senter biasa, kelap kelip dan lampu cob (lampu di gagang senter) \r\n\r\nTali tidak termasuk Yaaa...\r\n\r\nMini Senter Swat COB . Dapat Diisi Ulang Tanpa Baterai Karena Sudah Di Tanam Baterainya . Di Lengkapi Box Plastik Militer , Kabel Charger Universal , Klip Penjepit Untuk Saku . Bahan Full Alumunium Alloy , Bukan Sembarangan Bahan . Alumunium Senter Ini Terjamin Kokoh Dan Tidak Ringkih . Senter Sangat Terang Untuk Ukuran Sekecil Ini . Best Product ....\r\nCocok Untuk Semua Orang .\r\n\r\nSpesifikasi :\r\nPanjang Senter : 19 Cm\r\nBahan : Full Alumunium Alloy\r\nZoom : Ya\r\nDaya Cahaya Tertulis : 88000 Watt\r\nKelengkapan : Senter , Kabel Charger , Box Plastik Army ...\r\n#senter#senterswat#sentermini#sentersuperterang#senterrechas#sentermurah', 'warna', 12500, 1500, 33, 200),
(3, 1, 'Terong/KG', 'Terong Ungu termasuk kedalam sayuran buah dan kerabat dekatnya dengan kentang dan tomat. Terong Ungu seperti namanya memiliki kulit berwarna ungu yang memiliki daging tebal, lunak yang agak berair dan didalamnya terdapat sebaran biji terong.\r\n\r\n- Pesanan dengan pengiriman INSTANT DELIVERY pukul 00.01-14.00 akan dikirim di hari yang sama. Pesanan diatas pukul 14.00 akan dikirim H+1 (hanya berlaku untuk item yang bertanda *BISA INSTANT DELIVERY*) \r\n- Pesanan dengan pengiriman SAMEDAY DELIVERY sebelum pukul 16.00 akan dikirim H+1. Pesanan di atas pukul 16.00 akan dikirim H+2', '-', 3750, 0, 137, 1000),
(4, 1, 'Iphone 11 128GB', 'Rekam video 4K, potret yang indah, dan lanskap yang lebih luas dengan sistem kamera ganda yang sepenuhnya baru. Ambil foto berpencahayaan rendah terbaik dengan mode Malam. Lihat warna yang begitu nyata dalam foto, video, dan game di layar Liquid Retina 6,1 inci. Nikmati performa tak tertandingi dengan A13 Bionic untuk game, augmented reality (AR), dan fotografi. Lakukan lebih banyak hal tanpa perlu sering mengisi daya dengan kekuatan baterai sepanjang hari. Dan nikmati ketenangan dengan ketahanan air hingga 2 meter selama 30 menit.\r\n \r\nPoin-poin fitur \r\n• Layar Liquid Retina HD LCD 6,1 inci(1)  \r\n• Tahan air dan debu (2 meter hingga selama 30 menit, IP68)(1) \r\n• Sistem kamera ganda dengan kamera Ultra Wide dan Wide 12 MP; mode Malam, mode Potret, dan video 4K hingga 60 fps \r\n• Kamera depan TrueDepth 12 MP dengan mode Potret, video 4K, dan video gerakan lambat • Face ID untuk autentikasi aman \r\n• Chip A13 Bionic dengan Neural Engine generasi ketiga \r\n• Kemampuan isi daya cepat\r\n • Pengisian daya nirkabel(4) \r\n• iOS 13 dengan Mode Gelap, alat baru untuk pengeditan foto dan video, dan fitur privasi baru \r\n \r\nLegal \r\n1. iPhone 11 tahan cipratan, air, dan debu, serta diuji dalam kondisi laboratorium terkontrol dengan level IP68 menurut standar IEC 60529 (kedalaman maksimum 2 meter hingga 30 menit). Ketahanan terhadap cipratan, air, dan debu tidak berlaku secara permanen, dan daya tahan mungkin berkurang akibat penggunaan sehari-hari. Jangan coba mengisi daya iPhone yang basah; lihat panduan pengguna untuk instruksi pembersihan dan pengeringan. Kerusakan akibat cairan tidak ditanggung dalam garansi. \r\n2. Kekuatan baterai bervariasi tergantung penggunaan dan konfigurasi. Lihat www.apple.com/batteries untuk informasi selengkapnya. \r\n3. Layar memiliki sudut melengkung. Jika diukur sebagai persegi, layar iPhone 11 memiliki ukuran diagonal 6,06 inci. Area bidang layar berukuran lebih kecil. \r\n4. Pengisi daya nirkabel Qi dijual terpisah.', 'warna', 12300000, 400000, 4, 209),
(5, 1, 'Celana Pria', 'Rekam video 4K, potret yang indah, dan lanskap yang lebih luas dengan sistem kamera ganda yang sepenuhnya baru. Ambil foto berpencahayaan rendah terbaik dengan mode Malam. Lihat warna yang begitu nyata dalam foto, video, dan game di layar Liquid Retina 6,1 inci. Nikmati performa tak tertandingi dengan A13 Bionic untuk game, augmented reality (AR), dan fotografi. Lakukan lebih banyak hal tanpa perlu sering mengisi daya dengan kekuatan baterai sepanjang hari. Dan nikmati ketenangan dengan ketahanan air hingga 2 meter selama 30 menit.\r\n \r\nPoin-poin fitur \r\n• Layar Liquid Retina HD LCD 6,1 inci(1)  \r\n• Tahan air dan debu (2 meter hingga selama 30 menit, IP68)(1) \r\n• Sistem kamera ganda dengan kamera Ultra Wide dan Wide 12 MP; mode Malam, mode Potret, dan video 4K hingga 60 fps \r\n• Kamera depan TrueDepth 12 MP dengan mode Potret, video 4K, dan video gerakan lambat • Face ID untuk autentikasi aman \r\n• Chip A13 Bionic dengan Neural Engine generasi ketiga \r\n• Kemampuan isi daya cepat\r\n • Pengisian daya nirkabel(4) \r\n• iOS 13 dengan Mode Gelap, alat baru untuk pengeditan foto dan video, dan fitur privasi baru \r\n \r\nLegal \r\n1. iPhone 11 tahan cipratan, air, dan debu, serta diuji dalam kondisi laboratorium terkontrol dengan level IP68 menurut standar IEC 60529 (kedalaman maksimum 2 meter hingga 30 menit). Ketahanan terhadap cipratan, air, dan debu tidak berlaku secara permanen, dan daya tahan mungkin berkurang akibat penggunaan sehari-hari. Jangan coba mengisi daya iPhone yang basah; lihat panduan pengguna untuk instruksi pembersihan dan pengeringan. Kerusakan akibat cairan tidak ditanggung dalam garansi. \r\n2. Kekuatan baterai bervariasi tergantung penggunaan dan konfigurasi. Lihat www.apple.com/batteries untuk informasi selengkapnya. \r\n3. Layar memiliki sudut melengkung. Jika diukur sebagai persegi, layar iPhone 11 memiliki ukuran diagonal 6,06 inci. Area bidang layar berukuran lebih kecil. \r\n4. Pengisi daya nirkabel Qi dijual terpisah.', '-', 35000, 0, 120, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk_img`
--

CREATE TABLE `tb_produk_img` (
  `img_id` int(11) NOT NULL,
  `img_produk_id` int(11) NOT NULL,
  `img_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produk_img`
--

INSERT INTO `tb_produk_img` (`img_id`, `img_produk_id`, `img_name`) VALUES
(1, 1, 'baju1.jpg'),
(2, 1, 'baju2.jpg'),
(3, 1, 'baju3.jpg'),
(4, 4, 'ipon.jpg'),
(5, 2, 'senter.jpg'),
(6, 3, 'terong.jpg'),
(7, 5, 'celana.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk_variant`
--

CREATE TABLE `tb_produk_variant` (
  `variant_id` int(11) NOT NULL,
  `variant_produk_id` int(11) NOT NULL,
  `variant` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produk_variant`
--

INSERT INTO `tb_produk_variant` (`variant_id`, `variant_produk_id`, `variant`) VALUES
(11, 1, 'S'),
(12, 1, 'M'),
(15, 1, 'L'),
(16, 1, 'XL'),
(17, 1, 'XXL'),
(18, 2, 'hitam'),
(19, 2, 'merah'),
(20, 4, 'putih'),
(21, 4, 'hitam'),
(22, 2, '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(256) NOT NULL,
  `user_subdomain` varchar(16) NOT NULL,
  `user_province` int(11) NOT NULL,
  `user_city` int(11) NOT NULL,
  `user_wa` varchar(12) NOT NULL,
  `user_password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_nama`, `user_subdomain`, `user_province`, `user_city`, `user_wa`, `user_password`) VALUES
(1, 'Freddy Fred', 'test', 10, 37, '081234567890', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `cart_produk_variant_id` (`cart_produk_variant_id`),
  ADD KEY `cart_produk_id` (`cart_produk_id`),
  ADD KEY `cart_cookie_id` (`cart_cookie_id`);

--
-- Indexes for table `tb_cookie`
--
ALTER TABLE `tb_cookie`
  ADD PRIMARY KEY (`cookie_id`);

--
-- Indexes for table `tb_coupon`
--
ALTER TABLE `tb_coupon`
  ADD PRIMARY KEY (`coupon_id`),
  ADD KEY `coupon_user_id` (`coupon_user_id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_cookie_id` (`order_cookie_id`),
  ADD KEY `order_produk_id` (`order_produk_id`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`produk_id`),
  ADD KEY `produk_user_id` (`produk_user_id`);

--
-- Indexes for table `tb_produk_img`
--
ALTER TABLE `tb_produk_img`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `img_produk_id` (`img_produk_id`);

--
-- Indexes for table `tb_produk_variant`
--
ALTER TABLE `tb_produk_variant`
  ADD PRIMARY KEY (`variant_id`),
  ADD KEY `variant_produk_id` (`variant_produk_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_cart`
--
ALTER TABLE `tb_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_cookie`
--
ALTER TABLE `tb_cookie`
  MODIFY `cookie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_coupon`
--
ALTER TABLE `tb_coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_produk_img`
--
ALTER TABLE `tb_produk_img`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_produk_variant`
--
ALTER TABLE `tb_produk_variant`
  MODIFY `variant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD CONSTRAINT `tb_cart_ibfk_1` FOREIGN KEY (`cart_produk_variant_id`) REFERENCES `tb_produk_variant` (`variant_id`),
  ADD CONSTRAINT `tb_cart_ibfk_2` FOREIGN KEY (`cart_produk_id`) REFERENCES `tb_produk` (`produk_id`),
  ADD CONSTRAINT `tb_cart_ibfk_3` FOREIGN KEY (`cart_cookie_id`) REFERENCES `tb_cookie` (`cookie_id`);

--
-- Constraints for table `tb_coupon`
--
ALTER TABLE `tb_coupon`
  ADD CONSTRAINT `tb_coupon_ibfk_1` FOREIGN KEY (`coupon_user_id`) REFERENCES `tb_user` (`user_id`);

--
-- Constraints for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `tb_order_ibfk_1` FOREIGN KEY (`order_cookie_id`) REFERENCES `tb_cookie` (`cookie_id`),
  ADD CONSTRAINT `tb_order_ibfk_2` FOREIGN KEY (`order_produk_id`) REFERENCES `tb_produk` (`produk_id`);

--
-- Constraints for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD CONSTRAINT `tb_produk_ibfk_1` FOREIGN KEY (`produk_user_id`) REFERENCES `tb_user` (`user_id`);

--
-- Constraints for table `tb_produk_img`
--
ALTER TABLE `tb_produk_img`
  ADD CONSTRAINT `tb_produk_img_ibfk_1` FOREIGN KEY (`img_produk_id`) REFERENCES `tb_produk` (`produk_id`);

--
-- Constraints for table `tb_produk_variant`
--
ALTER TABLE `tb_produk_variant`
  ADD CONSTRAINT `tb_produk_variant_ibfk_1` FOREIGN KEY (`variant_produk_id`) REFERENCES `tb_produk` (`produk_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
