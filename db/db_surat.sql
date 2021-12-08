-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2021 at 05:43 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(10) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username_admin` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `username_admin`, `password`, `gambar`) VALUES
(1, 'admin', 'admin', '$2y$10$aPj6auEvzjC0qDq8UMqAX.UosbePCrmwDCmq1OPg35eDujbJKbDbO', 'admin1.jpg'),
(2, 'sekretaris', 'sekretaris', '$2y$10$76sSiZgcONYHd0SJFZYT7OeXjQgkJzPp.Owd.TkjJWCHUDiREc5Gu', 'admin2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin2`
--

CREATE TABLE `tb_admin2` (
  `id_admin2` int(11) NOT NULL,
  `nama_admin2` varchar(50) NOT NULL,
  `username_admin2` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin2`
--

INSERT INTO `tb_admin2` (`id_admin2`, `nama_admin2`, `username_admin2`, `password`, `gambar`) VALUES
(1, 'admin2', 'admin2', '$2y$10$PjsqXcfBXtEy5ULsfjgzmuGMcIj10wZTBZ2E0vo3wMyJccYBs87Pa', 'admin22.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bagian`
--

CREATE TABLE `tb_bagian` (
  `id_bagian` int(11) NOT NULL,
  `nama_bagian` varchar(120) NOT NULL,
  `username_admin_bagian` varchar(50) NOT NULL,
  `password_bagian` varchar(100) NOT NULL,
  `nama_lengkap` varchar(70) NOT NULL,
  `tanggal_lahir_bagian` date NOT NULL,
  `alamat` text NOT NULL,
  `no_hp_bagian` varchar(12) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bagian`
--

INSERT INTO `tb_bagian` (`id_bagian`, `nama_bagian`, `username_admin_bagian`, `password_bagian`, `nama_lengkap`, `tanggal_lahir_bagian`, `alamat`, `no_hp_bagian`, `gambar`) VALUES
(1, 'WALIKOTA', 'walikota', '$2y$10$1TdvCg1wrdkZVPsC4jaXMOmNO4UxojPt5eQPC.UtN/rycVDXJnsna', 'walikota', '2017-05-25', 'samarinda', '081222222222', 'walikota.jpg'),
(2, 'WAKIL WALIKOTA', 'wawali', '$2y$10$gQPJl.afsLYxuaK153Iq5elA5v3T0GsqMUGO7.Y.eTgkIYRg3bpQi', 'wawali', '1975-11-04', 'samarinda', '081222222222', 'wawali.jpg'),
(3, 'SEKDA', 'sekda', '$2y$10$h3bfu/TLEMfoig80aQh3rO9GK8w7i4qYNMQ1YW3ft7r8dfsE4Pe52', 'SEKDA', '2017-11-10', 'Samarinda', '081299101309', 'sekda.jpg'),
(4, 'PLH.SEKDA', 'plh sekda', '$2y$10$YCZdjF/AX/h8Tp80qPQbuO4MEYTufqM6ujO4L/v//bJVm7Yk0ewPq', 'plh sekda', '2017-11-10', 'Samarinda', '087731311111', 'plh_sekda.jpg'),
(7, 'PLT.ASS.I', 'plt ass i', '$2y$10$llrRdjuBJmADaTo4hUMfVepu8jZL/9WzAnu7j.2oSlqid5UKNQ5p.', 'plt ass i', '2017-11-10', 'bpp', '344444444444', 'plt_ass_ii.jpg'),
(9, 'UMUM', 'umum', '$2y$10$SlrXrEDh8eZh.dJTgS0vaO0nqKaiLOMWLNUDl0KTUpSoYv3HdxFNi', 'umum', '2017-11-17', 'smd', '333333333333', 'umum.jpg'),
(10, 'TU', 'tu', '$2y$10$rLNiKZ12RpHpzkOLp2qmJOeYLJcn6MoBS5maQWNvth26HFsfB596S', 'tu', '2017-11-10', 'badak', '24224242', 'tu.png'),
(11, 'KESRA', 'kesra', '$2y$10$Xvqpzuw.uo.bEKle2sHZsOChKJy1R7vwdYtHGFdvAa37ncJBUnaWi', 'kesra', '2017-11-17', 'bpp', '098979989999', 'kesra.png'),
(13, 'ORTAL', 'ortal', '$2y$10$Gv0UAx63a3WJEd0LNiZWEOf9a4oAzWycTR4CXEDklf4WK2aqlli8m', 'ortal', '2017-11-13', 'samarinda', '081299101309', 'ortal.jpg'),
(14, 'PEM-OTDA', 'pem-otda', '$2y$10$s80QFAjZ8gk7zRBz3Q9XuO4nqK1y8h2t0F8Lk8bCXShOyc5DMQUyy', 'pem-otda', '2017-11-13', 'samarinda', '081222222222', 'pem-otda.jpg'),
(15, 'EKONOMI & SDA', 'ekonomi', '$2y$10$lYQJ8BAU.BG.T54vE4ejqenQMOpw6oYzEkjs2cjYEFZzKBtvYtrxe', 'ekonomi', '2017-11-15', 'samarinda', '081299101309', 'ekonomi.jpg'),
(16, 'HUKUM', 'hukum', '$2y$10$TYZJaCmdpsAheP826YVTquTTK0HNnuGDNIn62Krs7XA1fqLQr7ih6', 'hukum', '2017-11-15', 'Balikpapan', '081222222222', 'hukum.png'),
(17, 'BKPPD', 'bkppd', '$2y$10$6PzATMsRhl4DbWw.9vlsKOXONezMG26DT05W2o19WTpSdJ7fU2thi', 'bkppd', '2017-12-01', 'samarinda', '081299101309', 'bkppd.png'),
(18, 'PROTOKOL', 'protokol', '$2y$10$LhGAfyKxhDgrsHwoUwle7ODD69qwWSEqLSl9QoJq7WAYUwnwoQe46', 'protokol', '2017-12-01', 'samarinda', '081242424223', 'protokol.png'),
(19, 'HUMAS', 'humas', '$2y$10$8oKkEzMS4aLEcoYLTgAArOa28LZ0RSseJgvTF.3gdgmg3pHgbIq5W', 'humas', '2017-12-01', 'samarinda', '081344444444', 'humas.png'),
(20, 'INFRASTRUKTUR', 'infrastruktur', '$2y$10$buynqkzfTWOy2eNnELUE1.SSk9U0.eKWlzHZRvnvz0j2gC9g2B7/i', 'infrastruktur', '2017-12-01', 'smd', '083455253225', 'infrastruktur.jpg'),
(41, 'percobaan', 'percobaan', '$2y$10$WSNQr5ngTrT//oj8zsKdk.6z5rmLzNLiJzBdkt8UNNWLJs1j6qx4W', 'percobaan', '2021-10-15', 'daa', '092032093209', 'percobaan.png'),
(44, 'evos', 'evos', '$2y$10$8X5br8k9dGRh1zZLGXUfJ.7zq9G5wLMKSfmOkykunO.JnJdC7HfLu', 'evos', '2021-10-26', 'jzxbjbjxb', '293792392372', 'evos.jpg'),
(45, 'rrq', 'rrq', '$2y$10$g5eEDQd4FhQfloIs0GqFZOIvSHs6gjhFGlEy.famBolLdxW0mnse.', 'rrq', '2021-11-02', 'rrq', '1234567899', 'rrq.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kepala`
--

CREATE TABLE `tb_kepala` (
  `id_kepala` int(11) NOT NULL,
  `nama_kepala` varchar(120) CHARACTER SET latin1 NOT NULL,
  `username_admin_kepala` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 NOT NULL,
  `gambar` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kepala`
--

INSERT INTO `tb_kepala` (`id_kepala`, `nama_kepala`, `username_admin_kepala`, `password`, `gambar`) VALUES
(1, 'kepala', 'kepala', '$2y$10$q7fOk1juWOPRhkjmfKKcG.2Yid45hb90Ffbt328IcmX1eflHEef82', '.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_suratkeluar`
--

CREATE TABLE `tb_suratkeluar` (
  `id_suratkeluar` int(11) NOT NULL,
  `tanggalkeluar_suratkeluar` datetime NOT NULL,
  `kode_suratkeluar` varchar(10) NOT NULL,
  `nomor_suratkeluar` varchar(45) NOT NULL,
  `nama_bagian` varchar(70) NOT NULL,
  `tanggalsurat_suratkeluar` date NOT NULL,
  `kepada_suratkeluar` varchar(255) NOT NULL,
  `perihal_suratkeluar` text NOT NULL,
  `file_suratkeluar` varchar(255) NOT NULL,
  `operator` varchar(50) NOT NULL,
  `tanggal_entry` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_suratkeluar`
--

INSERT INTO `tb_suratkeluar` (`id_suratkeluar`, `tanggalkeluar_suratkeluar`, `kode_suratkeluar`, `nomor_suratkeluar`, `nama_bagian`, `tanggalsurat_suratkeluar`, `kepada_suratkeluar`, `perihal_suratkeluar`, `file_suratkeluar`, `operator`, `tanggal_entry`) VALUES
(102, '2021-12-01 10:39:00', '394937', '0001', 'percobaan', '2021-12-01', 'sshdish', 'ihsihd', '2021-0001.pdf', 'admin', '2021-12-01 10:39:48'),
(103, '2021-12-01 10:50:00', '29372', '2', 'KESRA', '2021-12-01', 'iwyeywiey', 'iwyrieyiywiye', ' ', 'admin', '2021-12-01 10:53:41'),
(104, '2021-12-01 10:53:00', '9372973', '3', 'evos', '2021-12-01', 'sihdishdih', 'ishdishdih', ' ', 'admin', '2021-12-01 10:54:00'),
(105, '2021-12-02 07:29:00', '293892', '4', 'evos', '2021-12-02', 'sodjosj', 'osjojsodj', ' ', 'admin', '2021-12-02 07:30:00'),
(106, '2021-12-02 07:37:00', '29392', '5', 'evos', '2021-12-02', 'kbkbkb', 'jjvjv', ' ', 'admin', '2021-12-02 07:37:56'),
(107, '2021-12-02 07:43:00', '93898', '6', 'percobaan', '2021-12-02', 'ididnfidnf', 'nisdnisdn', ' ', 'admin', '2021-12-02 07:44:13'),
(108, '2021-12-02 08:24:00', '2937', '7', 'rrq', '2021-12-02', 'test123', 'test123', ' ', 'admin', '2021-12-02 08:24:30'),
(109, '2021-12-02 08:57:00', '92398', '8', 'evos', '2021-12-02', 'mnmnm', 'mnmn', '2021-.pdf', 'admin', '2021-12-02 08:57:45');

-- --------------------------------------------------------

--
-- Table structure for table `tb_suratmasuk`
--

CREATE TABLE `tb_suratmasuk` (
  `id_suratmasuk` int(11) NOT NULL,
  `tanggalmasuk_suratmasuk` datetime NOT NULL DEFAULT current_timestamp(),
  `kode_suratmasuk` varchar(10) NOT NULL,
  `nomorurut_suratmasuk` varchar(7) NOT NULL,
  `nomor_suratmasuk` varchar(25) NOT NULL,
  `tanggalsurat_suratmasuk` date NOT NULL,
  `pengirim` varchar(255) NOT NULL,
  `kepada_suratmasuk` varchar(255) NOT NULL,
  `perihal_suratmasuk` text NOT NULL,
  `file_suratmasuk` varchar(255) NOT NULL,
  `operator` varchar(50) NOT NULL,
  `tanggal_entry` datetime NOT NULL DEFAULT current_timestamp(),
  `disposisi1` varchar(50) NOT NULL,
  `tanggal_disposisi1` varchar(25) NOT NULL DEFAULT current_timestamp(),
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_suratmasuk`
--

INSERT INTO `tb_suratmasuk` (`id_suratmasuk`, `tanggalmasuk_suratmasuk`, `kode_suratmasuk`, `nomorurut_suratmasuk`, `nomor_suratmasuk`, `tanggalsurat_suratmasuk`, `pengirim`, `kepada_suratmasuk`, `perihal_suratmasuk`, `file_suratmasuk`, `operator`, `tanggal_entry`, `disposisi1`, `tanggal_disposisi1`, `status`) VALUES
(75, '2021-12-06 11:35:00', '1201', '0001', 'test 123', '2021-12-06', 'bkd', 'bkd', 'bkd', ' ', 'admin', '2021-12-06 11:36:15', 'evos', '2021-12-06 11:36:00', 'sudah'),
(76, '2021-12-06 11:36:00', '0182', '2', 'ajiejiej', '2021-12-06', 'wijeij', 'ijiwej', 'qijiqjw', '2021-2.pdf', 'admin', '2021-12-06 11:37:10', 'evos', '2021-12-06 11:37:00', 'belumd');

-- --------------------------------------------------------

--
-- Table structure for table `tb_suratregistrasi`
--

CREATE TABLE `tb_suratregistrasi` (
  `id_suratregistrasi` int(11) NOT NULL,
  `tanggalmasuk_suratregistrasi` datetime NOT NULL,
  `kode_suratregistrasi` varchar(10) NOT NULL,
  `nomor_suratregistrasi` varchar(45) NOT NULL,
  `nama_bagian` varchar(70) NOT NULL,
  `tanggalsurat_suratregistrasi` date NOT NULL,
  `kepada_suratregistrasi` varchar(255) NOT NULL,
  `perihal_suratregistrasi` text NOT NULL,
  `file_suratregistrasi` varchar(255) NOT NULL,
  `operatorregistrasi` varchar(50) NOT NULL,
  `tanggal_entry` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_suratregistrasi`
--

INSERT INTO `tb_suratregistrasi` (`id_suratregistrasi`, `tanggalmasuk_suratregistrasi`, `kode_suratregistrasi`, `nomor_suratregistrasi`, `nama_bagian`, `tanggalsurat_suratregistrasi`, `kepada_suratregistrasi`, `perihal_suratregistrasi`, `file_suratregistrasi`, `operatorregistrasi`, `tanggal_entry`, `status`) VALUES
(14, '2021-12-02 07:20:00', '99182', 'eiwhieh', 'ihsdihsd', '2021-12-02', 'wishish', 'ishidh', ' ', 'admin2', '2021-12-02 07:20:35', 'belumd'),
(15, '2021-12-02 07:20:00', '29329', 'oewoeu', 'osudou', '2021-12-02', 'osudou', 'sodsodu', '2021-.pdf', 'admin2', '2021-12-02 07:20:58', 'sudah'),
(16, '2021-12-02 09:15:00', '232787', '2739237', '2927327', '2021-12-02', 'wu9su9sud', 'ishshd', '2021-.pdf', 'admin2', '2021-12-02 09:15:41', 'belumd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username_admin` (`username_admin`);

--
-- Indexes for table `tb_admin2`
--
ALTER TABLE `tb_admin2`
  ADD PRIMARY KEY (`id_admin2`);

--
-- Indexes for table `tb_bagian`
--
ALTER TABLE `tb_bagian`
  ADD PRIMARY KEY (`id_bagian`),
  ADD UNIQUE KEY `username_admin_bagian` (`username_admin_bagian`);

--
-- Indexes for table `tb_kepala`
--
ALTER TABLE `tb_kepala`
  ADD PRIMARY KEY (`id_kepala`);

--
-- Indexes for table `tb_suratkeluar`
--
ALTER TABLE `tb_suratkeluar`
  ADD PRIMARY KEY (`id_suratkeluar`),
  ADD UNIQUE KEY `nomor_suratkeluar` (`nomor_suratkeluar`);

--
-- Indexes for table `tb_suratmasuk`
--
ALTER TABLE `tb_suratmasuk`
  ADD PRIMARY KEY (`id_suratmasuk`),
  ADD UNIQUE KEY `nomorurut_suratmasuk` (`nomorurut_suratmasuk`);

--
-- Indexes for table `tb_suratregistrasi`
--
ALTER TABLE `tb_suratregistrasi`
  ADD PRIMARY KEY (`id_suratregistrasi`),
  ADD KEY `nomor_suratregistrasi` (`nomor_suratregistrasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_admin2`
--
ALTER TABLE `tb_admin2`
  MODIFY `id_admin2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_bagian`
--
ALTER TABLE `tb_bagian`
  MODIFY `id_bagian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tb_kepala`
--
ALTER TABLE `tb_kepala`
  MODIFY `id_kepala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_suratkeluar`
--
ALTER TABLE `tb_suratkeluar`
  MODIFY `id_suratkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `tb_suratmasuk`
--
ALTER TABLE `tb_suratmasuk`
  MODIFY `id_suratmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `tb_suratregistrasi`
--
ALTER TABLE `tb_suratregistrasi`
  MODIFY `id_suratregistrasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
