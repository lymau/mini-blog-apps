-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2020 at 03:51 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `nama`, `email`, `password`) VALUES
(1, 'admin', 'admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `idkategori` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='untuk menyimpan data kategori yang diinput oleh admin';

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idkategori`, `nama`) VALUES
(8, 'Pemrogaman Dasar'),
(9, 'Kebudayaan'),
(10, 'Teknologi'),
(11, 'Web');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `idkomentar` int(11) NOT NULL,
  `idpost` int(11) NOT NULL,
  `idpenulis` int(11) NOT NULL,
  `isi` text NOT NULL,
  `tgl_update` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`idkomentar`, `idpost`, `idpenulis`, `isi`, `tgl_update`) VALUES
(18, 10, 3, 'Wah artikel yang sangat bermanfaat!', '2020-10-25 20:36:19'),
(19, 10, 6, 'Terimakasih gan!', '2020-10-25 20:45:13'),
(20, 10, 3, 'mantap gan', '2020-10-25 20:54:41');

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE `penulis` (
  `idpenulis` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='untuk menyimpan data penulis';

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`idpenulis`, `nama`, `password`, `alamat`, `kota`, `email`, `no_telp`) VALUES
(3, 'Nur Sabilly', '$2y$10$PBmfuztUUBYr2mkkeDXe5uTx1/guVFROixgDKukyZlLahSR5b30Te', 'Jl. Mawar No. 42 Adipala', 'Cilacap', 'nursabilly.kun@gmail.com', '082134701104'),
(4, 'Inugami Korone', '$2y$10$83vRfskSU7eI.g69yssYbuf..rvwzmVubwSmpUWkc1RmiHn1nCkY.', 'Jepang', 'Shibuya', 'inugami@gmail.com', '081234567890'),
(5, 'Billy', '$2y$10$KDl1rjnC9Q/04YrZaXBISuioiNssnXIRe1SJRV1Vun2ccayKckw7O', 'Adipala', 'Cilacap', 'billy@email.com', '089542314456'),
(6, 'Mas Sholeh', '$2y$10$ew/TGun1KeliaGq.e45zquhQM2o1oOHDKu/.ZOQ0i6bPFNKFr51TW', 'Jalan Jati, Jakarta Selatan', 'Jakarta Selatan', 'massholeh@gmail.com', '081234567891'),
(7, 'Mas Santo', '$2y$10$pw82WGfkSXftWxe/vk//9O6EDHr723UrL8Ol7yRuKIOn9E0X.6wMe', 'Jl. Pemuda No.1 Semarang', 'Semarang', 'massanto@gmail.com', '081234567891');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `idpost` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `idkategori` int(11) NOT NULL,
  `isipost` text NOT NULL,
  `file_gambar` varchar(255) DEFAULT NULL,
  `tgl_insert` datetime NOT NULL DEFAULT current_timestamp(),
  `tgl_update` datetime DEFAULT current_timestamp(),
  `idpenulis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='untuk menyimpan data post oleh penulis';

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`idpost`, `judul`, `idkategori`, `isipost`, `file_gambar`, `tgl_insert`, `tgl_update`, `idpenulis`) VALUES
(9, 'Mengapa Kita Harus Menjadi Seorang Programmer?', 8, '<p><img alt=\"Programmer\" src=\"https://miro.medium.com/max/1280/1*gppZaKrYawY4Vgf0I_uJVg.jpeg\" style=\"height:465px; width:700px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Menjadi seorang&nbsp;<strong>programmer</strong>&nbsp;mempunyai banyak sekali potensi sekarang ini, bukan hanya sebatas sebagai karir saja malahan bisa juga sebagai alat untuk berwirausaha. Sebagai seorang programmer anda tentunya mempunyai kemampuan untuk membuat sesuatu yang terlintas dalam pikiran anda hanya dengan bantuan sebuah komputer. Keterampilan yg anda miliki bisa anda manfaatkan untuk membuat sesuatu yang bisa bermanfaat untuk orang banyak. Disini saya cantumkan beberapa alasan kenapa menjadi seorang programmer adalah pilihan karir yang bagus.</p>\r\n\r\n<h1><strong>Anda tidak perlu mengeluarkan uang banyak untuk mempelajarinya</strong>.</h1>\r\n\r\n<p>Anda tidak perlu mengeluarkan&nbsp;uang banyak untuk menjadi seorang programmer, kenapa ? karena anda bisa mempelajarinya sendiri secara otodidak itulah yang menjadikan programmer sebagai pekerjaan yg menajubkan dan tentunya anda bisa mempelajari bagaimana menjadi seorang programmer yg hebat dan belajar bahasa pemrograman hanya dengan bermodalkan akses internet, disana anda bisa mengikuti banyak tutorial tentang bagaimana memulai mempelajari bahasa pemrograman dan menjadi seorang programmer yang profesional tentunya.</p>\r\n\r\n<h1><strong>Tidak perlu kuliah di jurusan IT untuk menjadi seorang programmer yang hebat.</strong></h1>\r\n\r\n<p>Yaps anda tidak perlu untuk kuliah jurusan Ilmu Komputer/Teknik Informatika atau yg sejenisnya untuk menjadi seorang programmer yg hebat, banyak sekali programmer-programmer hebat di luar sana yg tidak berlatar belakang IT tapi dia mampu menunjukan dirinya bahwa dia mampu untuk menjadi seorang programmer yg hebat tanpa perlu kuliah IT atau bahkan tidak kuliah sama sekali, tentunya dengan bermodal semangat yg tinggi untuk terus belajar dan mereka tidak menyerah menghadapi error-error yang muncul pada saat coding. intinya tetap semangat jangan pantang menyarah dan terus belajar.</p>\r\n\r\n<h1><strong>Anda bisa membawa laptop anda kemana saja untuk bekerja.</strong></h1>\r\n\r\n<p>Ya begitulah jika anda menjadi seorang programmer anda bisa membawa laptop anda kemana saja untuk coding karena mejadi programmer tidak terbatas dengan tempat selama disana ada aliran listrik untuk mencharge laptop dan ada koneksi internet maka disana anda bisa bekerja, bagaimana terdengar asik bukan ?</p>\r\n\r\n<h1>Banyak pekerjaan untuk seorang programmer.</h1>\r\n\r\n<p>Dengan menjadi seorang programmer banyak pekerjaan yg bisa anda ambil di luar sana, bahkan setiap perusahaan sekarang pasti membutuhkan seorang programmer di dalamnya untuk mengembangkan sistem mereka. Ataupun anda bisa menjadi seorang freelancer yg hanya terikat dengan kontrak, bahkan anda bisa membuat dan mengembangkan usaha bisnis anda sendiri tentunya dengan bermodalkan kemampuan programming yg anda miliki. Jadi jangan takut untuk menjadi programmer, terus belajar dan tingkatkan terus skill anda insaallah pekerjaan akan anda dapatkan.</p>\r\n\r\n<p>Nah itulah beberapa alasan kenapa menjadi seorang programmer adalah pilihan yg bagus untuk anda coba, tentunya masih banyak alasan kenapa menjadi programmer itu adalah pilihan karir yg tepat. Semoga beberapa alasan yg saya sebutkan diatas bisa menambah motivasi anda untuk menjadi seorang programmer yg hebat. Terus belajar dan jangan menyerah.</p>\r\n\r\n<p>Jika anda merasa tulisan ini bermanfaat jangan lupa untuk menekan tombol ❤. Sekian dan Terimakasih! ☺</p>\r\n\r\n<p>&quot;</p>\r\n', NULL, '2020-10-25 20:04:32', '2020-10-25 20:05:20', 6),
(10, 'Blockchain Adalah Sebuah Teknologi yang Patut Diaplikasikan', 8, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vehicula augue justo, in mattis lorem blandit id. Cras ullamcorper mi sit amet facilisis semper. Nunc tincidunt iaculis odio et gravida. Aenean pulvinar consequat mattis. Aliquam erat volutpat. Sed in velit orci. Nam et cursus nulla. Phasellus finibus dui ligula, ac tempor orci malesuada id. Suspendisse convallis orci ac purus semper, id luctus ex luctus. Integer sodales, purus eget malesuada pharetra, lacus nulla egestas sem, a placerat odio diam vitae tortor. <strong>Cras pharetra facilisis massa, vitae placerat ipsum porttitor id.</strong></p>\r\n\r\n<p>Morbi blandit pretium augue, in porttitor turpis interdum sit amet. Integer sodales urna at elit vehicula vestibulum. Pellentesque malesuada erat massa, sit amet ullamcorper ipsum tempor ac. Mauris libero diam, scelerisque quis ante sed, egestas imperdiet mauris. Integer rutrum ex quis ipsum iaculis rutrum. In nibh massa, ultrices sed eleifend sit amet, commodo vel nunc. Praesent porttitor tortor nec velit dapibus, at semper ante fermentum. Donec at turpis sit amet ex faucibus finibus. In tincidunt odio eu sem mattis, eget pulvinar nibh sagittis. Praesent accumsan sollicitudin lacus, nec mollis nibh sodales eu. Morbi rutrum, ipsum eu faucibus sodales, tellus felis feugiat metus, nec iaculis ante mauris vitae magna. Pellentesque commodo porta eros quis tempus. Nam nec felis sed nisi suscipit volutpat.</p>\r\n\r\n<p>Maecenas eu metus laoreet, accumsan orci at, efficitur purus. Nam euismod dignissim mauris, eu condimentum turpis efficitur eu. Praesent ex leo, aliquet at augue vel, ullamcorper pellentesque nibh. Donec eget mollis orci, nec dignissim ex. In iaculis est non lectus vestibulum, eu mattis nibh luctus. Nulla malesuada, ex quis volutpat auctor, odio purus interdum eros, in accumsan quam nisi nec dolor. Phasellus convallis ut sem nec suscipit. Sed ac mi ultrices, finibus nibh a, imperdiet ante. Praesent odio massa, venenatis ut nunc ac, scelerisque ullamcorper lectus. Nullam venenatis ipsum eu leo bibendum laoreet. Maecenas nec feugiat lorem.</p>\r\n\r\n<p>Praesent at sapien laoreet, eleifend odio tempor, suscipit eros. Proin vitae facilisis sapien. Curabitur posuere nisl lectus, id convallis risus egestas eget. Sed libero libero, venenatis id malesuada eget, euismod vitae nibh. Pellentesque venenatis sollicitudin ligula, in dapibus ipsum vehicula at. Praesent hendrerit ex sed urna dapibus, convallis vestibulum justo vestibulum. Fusce non tincidunt leo, at pulvinar enim.</p>\r\n\r\n<p>In orci nisi, sagittis eu velit euismod, tincidunt ultricies magna. Curabitur eget velit ut lectus tempus porta id at arcu. Cras sed mauris volutpat, rhoncus mi at, euismod ex. Morbi eleifend lacus posuere elit commodo, ut aliquet orci pellentesque. Sed quis mauris in nunc aliquam consectetur. Maecenas in ipsum consectetur, suscipit velit sit amet, laoreet leo. Quisque pharetra fringilla justo sed blandit. Maecenas vel facilisis lectus, eu vestibulum ex. Curabitur ac ullamcorper mi. Vivamus molestie urna nec libero pulvinar, et venenatis felis scelerisque. Ut non accumsan turpis. Donec nec justo id nisl faucibus eleifend. Nunc et convallis risus. Vivamus varius ipsum sed elit tincidunt, ut vehicula nunc posuere. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>\r\n\r\n<p>&quot;</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: 1px; top: 54px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>\r\n', NULL, '2020-10-25 20:10:42', '2020-10-25 20:45:02', 6),
(11, 'Bahasa Pemrogaman Web Termudah adalah PHP', 11, '<p><img alt=\"\" src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/1200px-PHP-logo.svg.png\" style=\"height:270px; width:500px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vehicula augue justo, in mattis lorem blandit id. Cras ullamcorper mi sit amet facilisis semper. Nunc tincidunt iaculis odio et gravida. Aenean pulvinar consequat mattis. Aliquam erat volutpat. Sed in velit orci. Nam et cursus nulla. Phasellus finibus dui ligula, ac tempor orci malesuada id. Suspendisse convallis orci ac purus semper, id luctus ex luctus. Integer sodales, purus eget malesuada pharetra, lacus nulla egestas sem, a placerat odio diam vitae tortor. Cras pharetra facilisis massa, vitae placerat ipsum porttitor id.</p>\r\n\r\n<p>Morbi blandit pretium augue, in porttitor turpis interdum sit amet. Integer sodales urna at elit vehicula vestibulum. Pellentesque malesuada erat massa, sit amet ullamcorper ipsum tempor ac. Mauris libero diam, scelerisque quis ante sed, egestas imperdiet mauris. Integer rutrum ex quis ipsum iaculis rutrum. In nibh massa, ultrices sed eleifend sit amet, commodo vel nunc. Praesent porttitor tortor nec velit dapibus, at semper ante fermentum. Donec at turpis sit amet ex faucibus finibus. In tincidunt odio eu sem mattis, eget pulvinar nibh sagittis. Praesent accumsan sollicitudin lacus, nec mollis nibh sodales eu. Morbi rutrum, ipsum eu faucibus sodales, tellus felis feugiat metus, nec iaculis ante mauris vitae magna. Pellentesque commodo porta eros quis tempus. Nam nec felis sed nisi suscipit volutpat.</p>\r\n\r\n<p>Maecenas eu metus laoreet, accumsan orci at, efficitur purus. Nam euismod dignissim mauris, eu condimentum turpis efficitur eu. Praesent ex leo, aliquet at augue vel, ullamcorper pellentesque nibh. Donec eget mollis orci, nec dignissim ex. In iaculis est non lectus vestibulum, eu mattis nibh luctus. Nulla malesuada, ex quis volutpat auctor, odio purus interdum eros, in accumsan quam nisi nec dolor. Phasellus convallis ut sem nec suscipit. Sed ac mi ultrices, finibus nibh a, imperdiet ante. Praesent odio massa, venenatis ut nunc ac, scelerisque ullamcorper lectus. Nullam venenatis ipsum eu leo bibendum laoreet. Maecenas nec feugiat lorem.</p>\r\n\r\n<p>Praesent at sapien laoreet, eleifend odio tempor, suscipit eros. Proin vitae facilisis sapien. Curabitur posuere nisl lectus, id convallis risus egestas eget. Sed libero libero, venenatis id malesuada eget, euismod vitae nibh. Pellentesque venenatis sollicitudin ligula, in dapibus ipsum vehicula at. Praesent hendrerit ex sed urna dapibus, convallis vestibulum justo vestibulum. Fusce non tincidunt leo, at pulvinar enim.</p>\r\n\r\n<p>In orci nisi, sagittis eu velit euismod, tincidunt ultricies magna. Curabitur eget velit ut lectus tempus porta id at arcu. Cras sed mauris volutpat, rhoncus mi at, euismod ex. Morbi eleifend lacus posuere elit commodo, ut aliquet orci pellentesque. Sed quis mauris in nunc aliquam consectetur. Maecenas in ipsum consectetur, suscipit velit sit amet, laoreet leo. Quisque pharetra fringilla justo sed blandit. Maecenas vel facilisis lectus, eu vestibulum ex. Curabitur ac ullamcorper mi. Vivamus molestie urna nec libero pulvinar, et venenatis felis scelerisque. Ut non accumsan turpis. Donec nec justo id nisl faucibus eleifend. Nunc et convallis risus. Vivamus varius ipsum sed elit tincidunt, ut vehicula nunc posuere. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>\r\n', NULL, '2020-10-25 20:12:34', NULL, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`idkomentar`),
  ADD KEY `idpost` (`idpost`),
  ADD KEY `idpenulis` (`idpenulis`);

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`idpenulis`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idpost`),
  ADD KEY `idkategori` (`idkategori`),
  ADD KEY `idpenulis` (`idpenulis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `idkomentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `penulis`
--
ALTER TABLE `penulis`
  MODIFY `idpenulis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `idpost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`idpost`) REFERENCES `post` (`idpost`),
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`idpenulis`) REFERENCES `penulis` (`idpenulis`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`idkategori`) REFERENCES `kategori` (`idkategori`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`idpenulis`) REFERENCES `penulis` (`idpenulis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
