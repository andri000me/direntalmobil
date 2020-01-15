-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2020 at 08:21 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dirental`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_galeri`
--

CREATE TABLE `tbl_galeri` (
  `id_galeri` int(11) NOT NULL,
  `nama_galeri` varchar(25) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `kategori_galeri_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_galeri`
--

INSERT INTO `tbl_galeri` (`id_galeri`, `nama_galeri`, `gambar`, `kategori_galeri_id`) VALUES
(3, 'Galeri Mobil', '3ba91917f5b263e0350fec6c0fd1d5be.jpg', 2),
(5, 'Galeri Mobil Xenia', '9b7e115e07d8bb9637d7e2d66b15480a.jpg', 5),
(6, 'New Avanza', '70ef8253577eba0a87d41d07912e537c.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori_galeri`
--

CREATE TABLE `tbl_kategori_galeri` (
  `id_kategori_galeri` int(11) NOT NULL,
  `nama_kategori_galeri` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori_galeri`
--

INSERT INTO `tbl_kategori_galeri` (`id_kategori_galeri`, `nama_kategori_galeri`) VALUES
(2, 'Galeri Pertama');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas_mobil`
--

CREATE TABLE `tbl_kelas_mobil` (
  `id_kelas_mobil` int(11) NOT NULL,
  `nama_kelas_mobil` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kelas_mobil`
--

INSERT INTO `tbl_kelas_mobil` (`id_kelas_mobil`, `nama_kelas_mobil`) VALUES
(1, 'HONDA'),
(3, 'SUZUKI');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mobil`
--

CREATE TABLE `tbl_mobil` (
  `id_mobil` int(11) NOT NULL,
  `nama_mobil` char(50) NOT NULL,
  `harga_mobil` bigint(15) NOT NULL,
  `spesifikasi_mobil` text NOT NULL,
  `status_mobil` int(2) NOT NULL,
  `kelas_mobil_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mobil`
--

INSERT INTO `tbl_mobil` (`id_mobil`, `nama_mobil`, `harga_mobil`, `spesifikasi_mobil`, `status_mobil`, `kelas_mobil_id`) VALUES
(1, 'Xenia R01', 350000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste totam maiores aliquam nobis quidem reiciendis cum numquam minima accusantium beatae vitae dicta earum tempore temporibus nemo dolore harum facilis ratione ullam, accusamus incidunt libero corporis recusandae! Laborum quis veritatis quas, officia, praesentium vel, doloribus rem dolorem voluptatem cum voluptatibus. Adipisci.', 0, 1),
(2, 'Xenia R02', 350000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste totam maiores aliquam nobis quidem reiciendis cum numquam minima accusantium beatae vitae dicta earum tempore temporibus nemo dolore harum facilis ratione ullam, accusamus incidunt libero corporis recusandae! Laborum quis veritatis quas, officia, praesentium vel, doloribus rem dolorem voluptatem cum voluptatibus. Adipisci.', 0, 1),
(3, 'Avanza R01', 300000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste totam maiores aliquam nobis quidem reiciendis cum numquam minima accusantium beatae vitae dicta earum tempore temporibus nemo dolore harum facilis ratione ullam, accusamus incidunt libero corporis recusandae! Laborum quis veritatis quas, officia, praesentium vel, doloribus rem dolorem voluptatem cum voluptatibus. Adipisci.', 0, 3),
(4, 'Avanza R02', 300000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste totam maiores aliquam nobis quidem reiciendis cum numquam minima accusantium beatae vitae dicta earum tempore temporibus nemo dolore harum facilis ratione ullam, accusamus incidunt libero corporis recusandae! Laborum quis veritatis quas, officia, praesentium vel, doloribus rem dolorem voluptatem cum voluptatibus. Adipisci.', 0, 3),
(5, 'Xenia R03', 350000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste totam maiores aliquam nobis quidem reiciendis cum numquam minima accusantium beatae vitae dicta earum tempore temporibus nemo dolore harum facilis ratione ullam, accusamus incidunt libero corporis recusandae! Laborum quis veritatis quas, officia, praesentium vel, doloribus rem dolorem voluptatem cum voluptatibus. Adipisci.', 0, 1),
(6, 'Xenia R04', 350000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste totam maiores aliquam nobis quidem reiciendis cum numquam minima accusantium beatae vitae dicta earum tempore temporibus nemo dolore harum facilis ratione ullam, accusamus incidunt libero corporis recusandae! Laborum quis veritatis quas, officia, praesentium vel, doloribus rem dolorem voluptatem cum voluptatibus. Adipisci.', 0, 1),
(7, 'Xenia R05', 350000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste totam maiores aliquam nobis quidem reiciendis cum numquam minima accusantium beatae vitae dicta earum tempore temporibus nemo dolore harum facilis ratione ullam, accusamus incidunt libero corporis recusandae! Laborum quis veritatis quas, officia, praesentium vel, doloribus rem dolorem voluptatem cum voluptatibus. Adipisci.', 1, 1),
(9, 'Avanza R03', 300000, '<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste totam maiores aliquam nobis quidem reiciendis cum numquam minima accusantium beatae vitae dicta earum tempore temporibus nemo dolore harum facilis ratione ullam, accusamus incidunt libero corporis recusandae! Laborum quis veritatis quas, officia, praesentium vel, doloribus rem dolorem voluptatem cum voluptatibus. Adipisci.</div>', 1, 3),
(10, 'Avanza R04', 300000, '<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste totam maiores aliquam nobis quidem reiciendis cum numquam minima accusantium beatae vitae dicta earum tempore temporibus nemo dolore harum facilis ratione ullam, accusamus incidunt libero corporis recusandae! Laborum quis veritatis quas, officia, praesentium vel, doloribus rem dolorem voluptatem cum voluptatibus. Adipisci.</div>', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mobil_gambar`
--

CREATE TABLE `tbl_mobil_gambar` (
  `id_mobil_gambar` int(11) NOT NULL,
  `nama_mobil_gambar` varchar(50) NOT NULL,
  `mobil_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mobil_gambar`
--

INSERT INTO `tbl_mobil_gambar` (`id_mobil_gambar`, `nama_mobil_gambar`, `mobil_id`) VALUES
(8, '4e23c294a4f69d205524209847d2e635.jpg', 8),
(18, 'c24ec654eab3449cd4d34f0f21a6f4ec.jpg', 9),
(22, 'd7412b662b259f338d0d3f03d58cf1b3.jpg', 9),
(26, '3bcf8e5b8a92e43160eed134087ac197.jpg', 10),
(27, '4f198f02554a493e3f64ebf09f66ae81.jpg', 4),
(28, '6598954d3da75b4be1bb4b1ea75aced9.jpg', 3),
(30, '8e13fcba5e75d3ac3bec13c1b339e9d0.jpg', 7),
(31, 'fc3b774260e4e7421d332c01cf8309d1.jpg', 6),
(32, 'a5b77e0cbdc01097fc73cfe685f3ea58.jpg', 5),
(33, '3771528f5e34a85969cd37fdad56ec5f.jpg', 2),
(34, '249c48149d89280f18c9d50b2dc49f54.jpg', 1),
(35, 'da54b8a3b4cfc2f15f5e48e39ab51f7f.jpg', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rental`
--

CREATE TABLE `tbl_rental` (
  `id_rental` int(11) NOT NULL,
  `nama_rental` varchar(25) NOT NULL,
  `telp_rental` varchar(12) NOT NULL,
  `alamat_rental` text NOT NULL,
  `tgl_rental_masuk` date NOT NULL,
  `tgl_rental_kembali` date NOT NULL,
  `mobil_id` int(11) NOT NULL,
  `status_rental` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rental`
--

INSERT INTO `tbl_rental` (`id_rental`, `nama_rental`, `telp_rental`, `alamat_rental`, `tgl_rental_masuk`, `tgl_rental_kembali`, `mobil_id`, `status_rental`) VALUES
(2, 'Yuda', '089503759512', 'Bandung', '2020-01-01', '2020-01-05', 10, 2),
(3, 'Yuda Yudiarto', '089503759512', 'Bandung', '2020-01-12', '2020-01-24', 8, 2),
(4, 'Yuda', '08210440159', 'Bandung', '2020-01-12', '2020-01-23', 1, 2),
(5, 'Yuda Yudiarto', '089503759512', 'Bandung Timur', '2020-01-16', '2020-01-23', 7, 2),
(6, 'Yudi', '089202012494', 'Antar Ke Bandung', '2020-01-15', '2020-01-16', 9, 2),
(7, 'Yudi', '089202012494', 'Bandung', '2020-01-13', '2020-01-14', 9, 2),
(8, 'Yudi', '089202012494', 'Bandung', '2020-01-16', '2020-01-23', 9, 2),
(9, 'Yuda Yudiarto', '089503759512', 'Bdg', '2020-01-02', '2020-01-12', 5, 0),
(10, 'Asep', '08920140405', 'Bandung Barat', '2020-01-13', '2020-01-15', 10, 1),
(12, 'Asep Jaenudin', '022224014010', 'Bandung Timur', '2020-01-16', '2020-01-23', 4, 2),
(13, 'sa', '08920201231', 'Bandung', '2020-01-09', '2020-01-18', 7, 0),
(14, 'Wahyudan', '08950201940', 'Bandung Timur', '2020-01-18', '2020-01-24', 7, 0),
(15, 'Sena', '0282014024', 'Bandung', '2020-01-24', '2020-01-28', 7, 0),
(17, 'YudaY', '08924041405', 'Cibiru, Bandung Timur', '2020-01-23', '2020-01-26', 7, 1),
(18, 'Pak Herdarto', '087829090100', 'Bandung', '2020-01-27', '2020-01-29', 9, 1),
(19, 'Pak Hendi', '089503777902', 'Bandung Timur', '2020-01-16', '2020-01-23', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rental_pembayaran`
--

CREATE TABLE `tbl_rental_pembayaran` (
  `id_rental_pembayaran` int(11) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `nominal_pembayaran` int(11) NOT NULL,
  `uang_bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `rental_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rental_pembayaran`
--

INSERT INTO `tbl_rental_pembayaran` (`id_rental_pembayaran`, `tgl_pembayaran`, `nominal_pembayaran`, `uang_bayar`, `kembalian`, `rental_id`) VALUES
(1, '2015-07-27', 350000, 400000, 50000, 1),
(2, '2020-01-12', 3850000, 10000000, 6150000, 4),
(3, '2020-01-12', 4200000, 5000000, 800000, 3),
(4, '2020-01-13', 2450000, 5000000, 2550000, 5),
(5, '2020-01-13', 300000, 5000000, 4700000, 7),
(6, '2020-01-13', 300000, 300000, 0, 6),
(7, '2020-01-13', 1200000, 5000000, 3800000, 2),
(8, '2020-01-14', 2100000, 900000, -1200000, 8),
(9, '2020-01-14', 2100000, 5050500, 2950500, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_saran`
--

CREATE TABLE `tbl_saran` (
  `id_saran` int(11) NOT NULL,
  `nama_saran` varchar(20) NOT NULL,
  `email_saran` varchar(25) NOT NULL,
  `telp_saran` bigint(15) NOT NULL,
  `isi_saran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_saran`
--

INSERT INTO `tbl_saran` (`id_saran`, `nama_saran`, `email_saran`, `telp_saran`, `isi_saran`) VALUES
(3, 'YudaY', 'yudayudiarto.9i@gmail.com', 9895030149, 'Hai, ini coba coba saaja'),
(4, 'YudaY', 'ydauadiadai@gmail.com', 238120491240, 'Bandung'),
(5, 'Setiawan', 'setiawan@gmailcom', 87900119091, 'Sistemnya udah bagus.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tentang_rental`
--

CREATE TABLE `tbl_tentang_rental` (
  `id_tentang_rental` int(11) NOT NULL,
  `nama_rental` varchar(20) NOT NULL,
  `alamat_tentang_rental` varchar(35) NOT NULL,
  `email_tentang_rental` varchar(25) NOT NULL,
  `telp_tentang_rental` bigint(15) NOT NULL,
  `isi_tentang_rental` text NOT NULL,
  `logo` varchar(50) NOT NULL,
  `fb` varchar(50) NOT NULL,
  `tw` varchar(50) NOT NULL,
  `gp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tentang_rental`
--

INSERT INTO `tbl_tentang_rental` (`id_tentang_rental`, `nama_rental`, `alamat_tentang_rental`, `email_tentang_rental`, `telp_tentang_rental`, `isi_tentang_rental`, `logo`, `fb`, `tw`, `gp`) VALUES
(1, 'Dirental', 'Jl Bandung Km 22', 'admin@dirental.com', 829201480, '<img alt=\"\"><img alt=\"\"><img alt=\"\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi praesentium ipsum voluptas quam sed excepturi doloribus doloremque aperiam repellendus delectus sit quasi saepe molestiae, laborum ex quos, vel fuga eum accusamus vero suscipit quae, iusto possimus. Earum aut autem magnam quisquam, debitis ipsum tempora rem laborum minus harum, non quam doloremque cupiditate maxime error ex deleniti vitae dolorem, praesentium. Ea illum error expedita, commodi, asperiores quidem deserunt ab. Quasi dignissimos, aliquid tempore, ab soluta eos hic labore veniam consequatur doloribus minima magnam! Aspernatur blanditiis, consequatur dolores maxime non nesciunt qui pariatur excepturi ex illum deserunt nobis dignissimos, earum quibusdam, iure!', '4edaad4cf65b8c00ed1b657c54037f13.png', 'http://facebook.com', 'http://twitter.com', 'http://gplus.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `email_user` varchar(20) NOT NULL,
  `telp_user` bigint(15) NOT NULL,
  `username_user` varchar(10) NOT NULL,
  `password_user` varchar(50) NOT NULL,
  `user_group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `email_user`, `telp_user`, `username_user`, `password_user`, `user_group_id`) VALUES
(3, 'yuda', 'yudathea@gmail.com', 89503759512, 'adminyuda', 'd1942212b7b0670ae6a8b84d059ec503', 3),
(4, 'operator', 'yudayudiarto.8i@gmai', 2220494040, 'operator', '25f9e794323b453885f5181f1b624d0b', 2),
(5, 'Kelompok 8', 'admin@rental.com', 2229494040, 'admin', '25f9e794323b453885f5181f1b624d0b', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_group`
--

CREATE TABLE `tbl_user_group` (
  `id_user_group` int(11) NOT NULL,
  `nama_user_group` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_group`
--

INSERT INTO `tbl_user_group` (`id_user_group`, `nama_user_group`) VALUES
(2, 'operator'),
(3, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_galeri`
--
ALTER TABLE `tbl_galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `tbl_kategori_galeri`
--
ALTER TABLE `tbl_kategori_galeri`
  ADD PRIMARY KEY (`id_kategori_galeri`);

--
-- Indexes for table `tbl_kelas_mobil`
--
ALTER TABLE `tbl_kelas_mobil`
  ADD PRIMARY KEY (`id_kelas_mobil`);

--
-- Indexes for table `tbl_mobil`
--
ALTER TABLE `tbl_mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `tbl_mobil_gambar`
--
ALTER TABLE `tbl_mobil_gambar`
  ADD PRIMARY KEY (`id_mobil_gambar`);

--
-- Indexes for table `tbl_rental`
--
ALTER TABLE `tbl_rental`
  ADD PRIMARY KEY (`id_rental`);

--
-- Indexes for table `tbl_rental_pembayaran`
--
ALTER TABLE `tbl_rental_pembayaran`
  ADD PRIMARY KEY (`id_rental_pembayaran`);

--
-- Indexes for table `tbl_saran`
--
ALTER TABLE `tbl_saran`
  ADD PRIMARY KEY (`id_saran`);

--
-- Indexes for table `tbl_tentang_rental`
--
ALTER TABLE `tbl_tentang_rental`
  ADD PRIMARY KEY (`id_tentang_rental`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_user_group`
--
ALTER TABLE `tbl_user_group`
  ADD PRIMARY KEY (`id_user_group`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_galeri`
--
ALTER TABLE `tbl_galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_kategori_galeri`
--
ALTER TABLE `tbl_kategori_galeri`
  MODIFY `id_kategori_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_kelas_mobil`
--
ALTER TABLE `tbl_kelas_mobil`
  MODIFY `id_kelas_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_mobil`
--
ALTER TABLE `tbl_mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_mobil_gambar`
--
ALTER TABLE `tbl_mobil_gambar`
  MODIFY `id_mobil_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_rental`
--
ALTER TABLE `tbl_rental`
  MODIFY `id_rental` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_rental_pembayaran`
--
ALTER TABLE `tbl_rental_pembayaran`
  MODIFY `id_rental_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_saran`
--
ALTER TABLE `tbl_saran`
  MODIFY `id_saran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_tentang_rental`
--
ALTER TABLE `tbl_tentang_rental`
  MODIFY `id_tentang_rental` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user_group`
--
ALTER TABLE `tbl_user_group`
  MODIFY `id_user_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
