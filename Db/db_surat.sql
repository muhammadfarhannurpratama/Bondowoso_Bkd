-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2021 at 01:22 AM
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
(1, 'admin', 'admin', '$2y$10$76sSiZgcONYHd0SJFZYT7OeXjQgkJzPp.Owd.TkjJWCHUDiREc5Gu', 'admin.jpg'),
(2, 'admin2', 'admin2', '315f166c5aca63a157f7d41007675cb44a948b33', 'admin2.jpg');

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
(45, 'rrq', 'rrq', '$2y$10$Z/dMhWqhvESGbPIVKO1G4eS0qc7vu4I7JgCVf/yo1jaP0PbNKC39S', 'rrq', '2021-11-02', 'rrq', '1234567899', 'rrq.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kepala`
--

CREATE TABLE `tb_kepala` (
  `id_kepala` int(11) NOT NULL,
  `nama_kepala` varchar(50) NOT NULL,
  `username_admin_kepala` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(27, '2017-11-15 00:00:00', '411', '3451/WALIKOTA/2017', 'WALIKOTA', '2017-11-15', 'Masyarakat', 'Himbauan Gotong Royong', '2017-3451.pdf', 'admin', '2021-11-09 11:08:48'),
(29, '2017-11-15 08:20:00', '851', '3453/TU/2017', 'TU', '2017-11-15', 'Kepala Bagian Tata Usaha', 'Cuti Tahunan ', '2017-3453.pdf', 'admin', '2017-11-18 02:39:32'),
(30, '2017-11-14 13:25:00', '915.1', '3454/ADM.PEMB/2017', 'ADM.PEMB', '2017-11-15', 'Walikota', 'Daftar Usulan Proyek', '2017-3454.pdf', 'admin', '2017-11-14 23:29:41'),
(31, '2017-11-17 08:30:00', '125.4', '3455/PEM-OTDA/2017', 'PEM-OTDA', '2017-11-16', 'Camat Samarida Seberang', 'Pemekaran Wilayah', '2017-3455.pdf', 'admin', '2017-11-16 02:30:02'),
(35, '2017-11-17 08:30:00', '821.1', '3452/TU/2017', 'TU', '2017-11-16', 'Kepala Bagian Lingkup Pemkot Samarinda', 'Pengangkatan Jabatan Pegawai Negeri ', '2017-3452.pdf', 'admin', '2017-11-16 17:35:35'),
(88, '2017-11-17 08:45:00', '476.4', '3456/KESRA/2017', 'KESRA', '2017-11-17', 'Lurah SE-KOTA SAMARINDA', 'Peninjauan Kampung KB', '2017-3456.pdf', 'admin', '2017-11-17 02:58:51'),
(90, '2017-11-18 08:30:00', '376', '3458/ASSIII/2017', 'ASS.III', '2017-11-18', 'Kontraktor Bangunan', 'Penindakan Bangunan tanpa surat izin mendirikan bangunan', '2017-3458.pdf', 'admin', '2017-11-18 03:19:54'),
(91, '2017-11-30 01:00:00', '454', '3457/ORTAL/2017', 'ORTAL', '2017-11-30', 'Lurah SE-KOTA SAMARINDA', 'Pelatihan Kelembagaan Desa', '2017-3457.pdf', 'admin', '2017-11-30 00:01:06'),
(92, '2017-12-06 08:17:00', '342', '3459/TU/2017', 'TU', '2017-12-06', 'CAMAT SE-KOTA SAMARINDA', 'pilgub', '2017-3459.pdf', 'admin', '2017-12-06 07:19:29'),
(95, '2021-11-01 08:17:00', '7237', '3460', 'evos', '2021-11-01', 'Kepala Bagian Lingkup Evos', 'sjdbsdbjsdb', '2021-3460.pdf', 'admin', '2021-11-01 08:17:42'),
(96, '2021-11-01 08:47:00', '8232', '3461', 'HUKUM', '2021-11-01', 'Kepala Bagian Lingkup Evos', 'jsbcj', '2021-3461.pdf', 'admin', '2021-11-01 08:48:12'),
(97, '2021-11-01 00:00:00', '8437', '3462', 'evos', '2021-11-01', 'BTR ONIC', 'BTR ONIC', '2021-3462.pdf', 'admin', '2021-11-01 10:31:43'),
(98, '2021-11-01 00:00:00', '1211', '3463', 'evos', '2021-11-01', 'GPX jgasg', 'GPX asgasg', '2021-3463.pdf', 'admin', '2021-11-01 11:17:01'),
(99, '2021-11-02 09:20:00', '8232', '3464', 'rrq', '2021-11-02', 'rrq', 'rrq', '2021-3464.pdf', 'admin', '2021-11-02 09:20:39');

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
  `tanggal_disposisi1` datetime NOT NULL DEFAULT current_timestamp(),
  `disposisi2` varchar(50) NOT NULL,
  `tanggal_disposisi2` varchar(25) NOT NULL,
  `disposisi3` varchar(50) NOT NULL,
  `tanggal_disposisi3` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_suratmasuk`
--

INSERT INTO `tb_suratmasuk` (`id_suratmasuk`, `tanggalmasuk_suratmasuk`, `kode_suratmasuk`, `nomorurut_suratmasuk`, `nomor_suratmasuk`, `tanggalsurat_suratmasuk`, `pengirim`, `kepada_suratmasuk`, `perihal_suratmasuk`, `file_suratmasuk`, `operator`, `tanggal_entry`, `disposisi1`, `tanggal_disposisi1`, `disposisi2`, `tanggal_disposisi2`, `disposisi3`, `tanggal_disposisi3`, `status`) VALUES
(3, '2017-09-20 14:00:00', '011', '4519', '036/B/HMJELEKTRO/IX/2017', '2017-09-18', 'FORUM KOMUNIKASI HIMPUNAN MAHASISWA ELEKTRO INDONESIA WILAYAH XIII KALIMANTAN', 'UMUM', 'Permohonan\r\n', '2017-4519.pdf', 'admin2', '2017-11-14 23:43:44', 'UMUM', '2017-09-22 11:00:00', '', '1970-01-01 07:00:00', 'UMUM', '2017-09-22 11:05:00', 'belumd'),
(6, '2017-09-26 10:00:00', '061', '4521', '061/4382/SJ', '2017-09-20', 'MENDAGRI RI', 'Organisasi', 'Surat Edaran Tentang Mekanisme Layanan Administrasi Kemendagri\r\n', '2017-4521.pdf', 'admin', '2017-12-02 21:44:11', 'ASS.III', '2017-09-26 15:00:00', '', '1970-01-01 07:00:00', 'ORTAL', '2017-09-27 11:30:00', 'belumd'),
(7, '2017-09-25 14:00:00', '503', '4522', '503/744/100.26', '2017-09-25', 'DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU KOTA SAMARINDA', 'PLH SEKDA', 'Tindak Lanjut Permohonan Penghapusan Denda Retribusi IMB PT.Borneo Inti Graha\r\n', '2017-4522.pdf', 'admin', '2021-10-29 09:04:45', 'PLH.SEKDA', '2017-09-26 10:00:00', 'evos', '1970-01-01 07:00:00', 'HUKUM', '2017-09-27 15:00:00', 'belumd'),
(8, '2017-12-06 08:12:00', '454', '4523 ', '4121/wawali/2017', '2017-12-06', 'pdam', 'wawali', 'air', '2017-4523.pdf', 'admin', '2017-12-06 07:15:07', 'WAKIL WALIKOTA', '2017-12-14 08:14:00', 'ADM.PEMB', '2017-12-12 08:14:00', 'PEM-OTDA', '2017-12-13 08:15:00', 'pending'),
(9, '2021-09-30 08:12:00', '0001', '4524 ', '00978789', '2021-09-30', 'kepala bkd', 'wakil walikota', 'rapat', '2021-4524.pdf', 'admin', '2021-09-30 08:15:57', 'WALIKOTA', '2021-09-30 08:15:00', 'WAKIL WALIKOTA', '2021-09-30 08:15:00', 'SEKDA', '2021-09-30 08:16:00', 'sudah'),
(11, '2021-10-09 12:11:00', '6802', '4526', '050/588/300.03', '2021-10-09', 'BAPPEDA KOTA bondowoso', 'sekertaris daerah', 'naae', '2021-4526', 'admin', '2021-10-09 12:13:01', 'ADM.PEMB', '2021-10-25 12:12:00', 'PLH.SEKDA', '2021-10-06 11:49:00', 'WAKIL WALIKOTA', '2021-10-19 11:50:00', 'belum'),
(19, '2021-10-25 10:51:00', '085', '4527', 'Viva Rrq', '2021-10-25', 'Viva Rrq', 'Onic', 'Final Mpl', '2021-4527.pdf', 'admin', '2021-10-26 10:36:57', 'WALIKOTA', '2021-10-26 10:52:00', 'WAKIL WALIKOTA', '2021-10-18 10:52:00', 'HUKUM', '2021-10-27 10:53:00', 'belumd'),
(20, '2021-11-03 10:40:00', '0851', '4528', 'BKD BWS', '2021-10-26', 'BKD BWS', 'BKD BWS', 'Rapat Bkd', '2021-4528.pdf', 'admin', '2021-10-26 10:42:21', 'WALIKOTA', '2021-10-27 10:41:00', 'WAKIL WALIKOTA', '2021-10-24 10:52:00', 'evos', '2021-10-27 10:40:00', 'belumd'),
(21, '2021-10-29 09:56:00', '0822', '4529', '0823456', '2021-10-29', 'polres ', 'BKD BWS', 'rapat', '2021-4529.pdf', 'admin', '2021-10-29 09:59:40', 'UMUM', '2021-10-29 09:57:00', 'WALIKOTA', '2021-11-01 09:57:00', 'SEKDA', '2021-11-02 09:58:00', 'belumd'),
(22, '2021-11-01 08:52:00', '2831', '4530', 'Viva Rrq Evos', '2021-11-01', 'Viva Rrq Evos', 'Viva Rrq Evos', 'nskdsdkhsdkshdkwq', '2021-4530.pdf', 'admin', '2021-11-01 08:53:09', 'evos', '2021-11-01 08:52:00', 'WALIKOTA', '2021-11-01 08:52:00', 'WAKIL WALIKOTA', '2021-12-03 08:53:00', 'pending'),
(23, '2021-11-01 09:42:00', '2531', '4531', 'dfafe', '2021-11-01', 'a', 'aaa', 'aaa', '2021-4531.pdf', 'admin', '2021-11-01 09:43:53', 'PEM-OTDA', '2021-10-29 09:57:00', 'BKPPD', '2021-11-01 08:52:00', 'PROTOKOL', '2021-12-03 08:53:00', 'belumd'),
(24, '2021-11-01 09:50:00', '8372', '4532', 'btr', '2021-11-01', 'btr', 'btr', 'sdjsojd', '2021-4532.pdf', 'admin', '2021-11-01 09:51:27', 'evos', '2021-11-01 09:51:00', 'TU', '2021-11-01 09:51:00', 'HUMAS', '2021-12-03 09:50:00', 'belumd'),
(25, '2021-11-01 10:27:00', '8236', '4533', 'BTR ONIC GPX', '2021-11-01', 'BTR ONIC GPX', 'BTR ONIC GPX', 'BTR ONIC GPX', '2021-4533.pdf', 'admin', '2021-11-01 11:13:44', 'evos', '2021-11-01 10:27:00', 'WALIKOTA', '2021-11-01 10:28:00', 'BKPPD', '2021-12-01 10:27:00', 'belumd'),
(26, '2021-11-03 08:08:00', '1214', '4534', 'sdh812', '2021-11-03', 'blacklist', 'vior', 'ba', '2021-4534.pdf', 'admin', '2021-11-03 08:10:59', 'evos', '2021-11-03 08:09:00', 'rrq', '2021-11-10 08:10:00', 'HUMAS', '2021-11-16 08:11:00', 'sudah'),
(27, '2021-11-03 08:56:00', '2531', '4535', 'BA EVOS', '2021-11-03', 'BA EVOS', 'BA EVOS', 'BA EVOS', '2021-4535.pdf', 'admin', '2021-11-03 08:57:00', 'evos', '2021-11-04 08:56:00', 'rrq', '2021-11-03 08:56:00', 'percobaan', '2021-11-05 08:57:00', 'belum'),
(28, '2021-11-03 09:00:00', '08511', '4536', 'BA ONIC', '2021-11-03', 'BA ONIC', 'BA ONIC', 'BA ONIC', '2021-4536.pdf', 'admin', '2021-11-03 09:02:23', 'evos', '2021-11-03 09:01:00', 'rrq', '2021-11-04 09:01:00', 'percobaan', '2021-11-05 09:00:00', 'belumd'),
(29, '2021-11-03 17:25:00', '08521', '4537', 'BA BTR', '2021-11-03', 'BA BTR', 'BA BTR', 'BA BTR', '2021-4537.pdf', 'admin', '2021-11-03 18:27:19', 'evos', '2021-11-03 17:26:00', 'rrq', '2021-11-03 18:26:00', 'HUMAS', '2021-11-03 18:27:00', 'belumd'),
(30, '2021-11-03 19:01:00', '0121', '4538', 'BA GPX', '2021-11-03', 'BA GPX', 'BA GPX', 'BA GPX', '2021-4538.pdf', 'admin', '2021-11-03 19:03:02', 'evos', '2021-11-03 19:02:00', 'rrq', '2021-11-03 18:02:00', 'percobaan', '2021-11-03 18:03:00', 'belumd'),
(31, '2021-11-03 20:03:00', '1111', '4539', 'BA OPI', '2021-11-03', 'BA OPI', 'BA OPI', 'BA OPI', '2021-4539.pdf', 'admin', '2021-11-03 20:04:23', 'evos', '2021-11-03 20:10:00', 'rrq', '2021-11-03 20:15:00', 'percobaan', '2021-11-03 20:15:00', 'belumd'),
(32, '2021-11-03 20:42:00', '0011', '4540', 'BA LEMON', '2021-11-03', 'BA LEMON', 'BA LEMON', 'BA LEMON', '2021-4540.pdf', 'admin', '2021-11-03 20:43:46', 'evos', '2021-11-03 20:45:00', 'rrq', '2021-11-03 20:46:00', 'percobaan', '2021-11-03 20:47:00', 'belumd'),
(33, '2021-11-03 20:51:00', '0900', '4541', 'BA XIN', '2021-11-03', 'BA XIN', 'BA XIN', 'BA XIN', '2021-4541.pdf', 'admin', '2021-11-03 20:52:51', 'rrq', '2021-11-03 20:55:00', 'TU', '2021-11-03 20:54:00', 'SEKDA', '2021-11-10 20:51:00', 'belumd'),
(34, '2021-11-03 21:04:00', '0999', '4542', 'BA ALBERTTT', '2021-11-03', 'BA ALBERTTT', 'BA ALBERTTT', 'BA ALBERTTT', '2021-4542.pdf', 'admin', '2021-11-03 21:06:10', 'WALIKOTA', '2021-11-03 21:09:00', 'SEKDA', '2021-11-03 21:08:00', 'UMUM', '2021-11-03 21:10:00', 'belumd'),
(35, '2021-11-03 21:13:00', '0909', '4543', 'R7', '2021-11-03', 'R7', 'R7', 'R7', '2021-4543.pdf', 'admin', '2021-11-03 21:15:09', 'rrq', '2021-11-03 21:17:00', 'evos', '2021-11-03 21:19:00', 'HUKUM', '2021-11-03 21:20:00', 'belumd'),
(36, '2021-11-03 21:59:00', '0900', '4544', 'VYN', '2021-11-03', 'VYN', 'VYN', 'VYN', '2021-4544.pdf', 'admin', '2021-11-03 22:00:52', 'rrq', '2021-11-03 22:02:00', 'evos', '2021-11-03 22:03:00', 'HUMAS', '2021-11-03 22:05:00', 'belumd'),
(37, '2021-11-10 09:58:00', '221', '4545', 'asdad', '2021-11-11', 'dadad', 'adwa', 'asdadw', '2021-4545.pdf', 'admin', '2021-11-10 09:59:36', 'evos', '2021-10-26 10:52:00', 'BKPPD', '2021-10-24 10:52:00', 'percobaan', '2021-11-02 09:58:00', 'belumd'),
(38, '2021-11-10 14:15:00', '081021', '4546', 'Bkent', '2021-11-10', 'Bkent', 'Bkent', 'Bkent wkwkwk', '2021-4546.pdf', 'admin', '2021-11-10 14:17:05', 'evos', '2021-11-10 14:16:00', 'rrq', '2021-11-10 14:16:00', 'HUMAS', '2021-11-10 14:17:00', ''),
(39, '2021-11-10 16:37:00', '029', '4547', 'JO', '2021-11-10', 'JO', 'JO', 'JO', '2021-4547.pdf', 'admin', '2021-11-10 16:38:34', 'evos', '2021-11-10 16:38:00', 'rrq', '2021-11-10 16:38:00', 'WALIKOTA', '2021-11-10 16:39:00', 'belumd'),
(40, '2021-11-10 16:40:00', '6328', '4548', 'JAMET', '2021-11-10', 'JAMET', 'JAMET', 'JAMET', '2021-4548.pdf', 'admin', '2021-11-10 16:41:02', 'rrq', '2021-11-10 16:40:00', 'evos', '2021-11-10 16:40:00', 'WALIKOTA', '2021-11-10 16:41:00', 'pending'),
(41, '2021-11-10 16:54:00', '8361', '4549', 'Doyok', '2021-11-10', 'Doyok', 'Doyok', 'Doyok', '2021-4549.pdf', 'admin', '2021-11-10 16:55:40', 'evos', '2021-11-10 16:55:00', 'rrq', '2021-11-10 16:55:00', 'WALIKOTA', '2021-11-10 16:56:00', 'belumd'),
(42, '2021-11-10 17:23:00', '8281', '4550', 'Tanggul', '2021-11-10', 'Tanggul', 'Tanggul', 'Tanggul', '2021-4550.pdf', 'admin', '2021-11-10 17:24:24', 'evos', '2021-11-10 17:24:00', 'rrq', '2021-11-10 18:24:00', 'WALIKOTA', '2021-11-10 20:25:00', 'sudah');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_bagian`
--
ALTER TABLE `tb_bagian`
  MODIFY `id_bagian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tb_kepala`
--
ALTER TABLE `tb_kepala`
  MODIFY `id_kepala` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_suratkeluar`
--
ALTER TABLE `tb_suratkeluar`
  MODIFY `id_suratkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `tb_suratmasuk`
--
ALTER TABLE `tb_suratmasuk`
  MODIFY `id_suratmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
