-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2021 at 10:37 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_endhitafd`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `nama_admin` varchar(50) NOT NULL,
  `alamat_admin` text NOT NULL,
  `tlp_admin` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`nama_admin`, `alamat_admin`, `tlp_admin`, `email`) VALUES
('Destyani Pramita Kusuma', 'Jl. Kyai Mojo No.22, Kasepuhan, Kec. Batang, Kabupaten Batang, Jawa Tengah 51214', '082325046290', 'enditha@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `faktur`
--

CREATE TABLE `faktur` (
  `kd_faktur` int(30) NOT NULL,
  `userid` varchar(30) NOT NULL,
  `total_biaya_barang` double DEFAULT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp(),
  `pembayaran` enum('COD','Transfer') NOT NULL DEFAULT 'Transfer',
  `kurir` varchar(20) NOT NULL DEFAULT 'jne',
  `lama_kirim` varchar(10) DEFAULT NULL,
  `biaya_pengiriman` double DEFAULT NULL,
  `konfirm` enum('Sudah','Belum','Tunda') NOT NULL DEFAULT 'Belum',
  `bukti_transfer` varchar(100) DEFAULT NULL,
  `tgl_kirim` datetime DEFAULT NULL,
  `resi` tinytext DEFAULT NULL,
  `tgl_terima` datetime DEFAULT NULL,
  `komplain` enum('y') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faktur`
--

INSERT INTO `faktur` (`kd_faktur`, `userid`, `total_biaya_barang`, `tgl`, `pembayaran`, `kurir`, `lama_kirim`, `biaya_pengiriman`, `konfirm`, `bukti_transfer`, `tgl_kirim`, `resi`, `tgl_terima`, `komplain`) VALUES
(1516311357, 'indah@gmail.com', 250000, '2018-01-18 21:35:57', 'Transfer', 'jne', '3-6', 15000, 'Sudah', '1516311357.jpg', '2018-01-20 09:00:00', '12345455', '2018-03-22 08:05:37', NULL),
(1516311413, 'indah@gmail.com', 210000, '2018-01-18 21:36:53', 'COD', 'Flanel', '2', 10000, 'Sudah', NULL, '2018-03-01 09:00:00', 'COD', '2018-03-25 09:35:25', NULL),
(1516392762, 'rizkyandana@gmail.com', NULL, '2018-01-19 20:12:42', 'Transfer', 'jne', NULL, NULL, 'Belum', NULL, NULL, NULL, NULL, NULL),
(1521721490, 'ahmad@gmail.com', 10000, '2018-03-22 12:24:50', 'Transfer', 'pos', '1-2 HARI', 10000, 'Sudah', '1521721490.jpg', '2021-01-27 04:11:00', '21312312312', '2021-01-07 11:17:21', NULL),
(1521724670, 'indah@gmail.com', 165000, '2018-03-22 13:17:50', 'Transfer', 'jne', '3-6', 15000, 'Sudah', '1521724670.jpg', '2018-03-26 09:00:00', '123456677899', '2018-03-26 10:47:43', NULL),
(1521944737, 'indah@gmail.com', 134000, '2018-03-25 02:25:37', 'COD', 'Flanel', '2', 10000, 'Sudah', NULL, '2018-03-26 09:00:00', 'COD', '2018-03-26 10:47:47', NULL),
(1521945503, 'indah@gmail.com', 240000, '2018-03-25 02:38:23', 'COD', 'Flanel', '2', 10000, 'Sudah', NULL, '2018-03-26 09:00:00', 'COD', '2018-03-26 10:47:49', NULL),
(1521998843, 'indah@gmail.com', 195000, '2018-03-25 17:27:23', 'Transfer', 'jne', '3-6', 15000, 'Tunda', NULL, NULL, NULL, NULL, NULL),
(1522035512, 'indah@gmail.com', 240000, '2018-03-26 03:38:32', 'COD', 'Flanel', '2', 10000, 'Sudah', NULL, '2018-03-26 09:00:00', 'COD', '2018-03-26 12:28:21', NULL),
(1539752537, 'indah@gmail.com', 445000, '2018-10-17 05:02:17', 'Transfer', 'jne', '', 0, 'Tunda', NULL, NULL, NULL, NULL, NULL),
(1539769022, 'azka@gmail.com', NULL, '2018-10-17 09:37:02', 'Transfer', 'jne', NULL, NULL, 'Belum', NULL, NULL, NULL, NULL, NULL),
(1539769399, 'indah@gmail.com', 168000, '2018-10-17 09:43:19', 'Transfer', 'pos', '', 0, 'Tunda', NULL, NULL, NULL, NULL, NULL),
(1545856450, 'indah@gmail.com', 29000, '2018-12-26 20:34:10', 'Transfer', 'jne', '3-6', 15000, 'Tunda', NULL, NULL, NULL, NULL, NULL),
(1547649441, 'indah@gmail.com', 186000, '2019-01-16 14:37:21', 'Transfer', 'jne', '3-6', 72000, 'Tunda', NULL, NULL, NULL, NULL, NULL),
(1547651157, 'tatakusuma@gmail.com', 920000, '2019-01-16 15:05:57', 'Transfer', 'jne', '3-6', 336000, 'Sudah', '1547651157.png', '2019-01-18 10:10:00', 'r217jv', NULL, NULL),
(1547697969, 'indah@gmail.com', 90000, '2019-01-17 04:06:09', 'Transfer', 'jne', '', 0, 'Sudah', '1547697969.png', NULL, NULL, NULL, NULL),
(1609994058, 'ahmad@gmail.com', 1800, '2021-01-07 04:34:18', 'Transfer', 'jne', '3-6', 12000, 'Sudah', '1609994058.jpg', '2021-01-07 00:37:00', '12312', '2021-01-07 11:39:36', NULL),
(1609994666, 'ahmad@gmail.com', 1800, '2021-01-07 04:44:26', 'Transfer', 'jne', '3-6', 12000, 'Sudah', '1609994666.jpg', '2021-01-07 13:28:00', '213123', '2021-01-08 05:41:37', NULL),
(1610027968, 'ahmad@gmail.com', 900, '2021-01-07 13:59:28', 'Transfer', 'jne', '3-6', 12000, 'Sudah', '1610027968.jpg', '2021-01-08 06:43:00', '132312312', '2021-01-08 05:58:47', NULL),
(1610061093, 'ahmad@gmail.com', 900, '2021-01-07 23:11:33', 'Transfer', 'jne', '3-6', 12000, 'Sudah', '1610061093.jpg', '2021-01-08 06:16:00', '3123123', '2021-01-08 06:16:44', NULL),
(1610061552, 'ahmad@gmail.com', 900, '2021-01-07 23:19:12', 'Transfer', 'jne', '3-6', 12000, 'Sudah', '1610061552.jpg', '2021-01-08 07:19:00', '12312312', NULL, 'y'),
(1610074354, 'ahmad@gmail.com', 900, '2021-01-08 02:52:34', 'Transfer', 'jne', '3-6', 12000, 'Sudah', '1610074354.jpg', '2021-01-08 13:22:00', '3435234', NULL, 'y'),
(1610092394, 'ahmad@gmail.com', 900, '2021-01-08 07:53:14', 'Transfer', 'jne', '3-6', 12000, 'Sudah', '1610092394.jpg', '2021-01-09 11:27:00', '131123412', NULL, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `foto_produk`
--

CREATE TABLE `foto_produk` (
  `kd_produk` int(11) NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto_produk`
--

INSERT INTO `foto_produk` (`kd_produk`, `foto`) VALUES
(2, 'produk1601190807061.jpg'),
(3, 'produk1601190809451.jpg'),
(4, 'produk1601190812531.jpg'),
(5, 'produk1601190814201.jpg'),
(7, 'produk1601190818261.jpg'),
(8, 'produk1601190915431.jpg'),
(9, 'produk1601190919061.jpg'),
(10, 'produk1601190921361.jpg'),
(11, 'produk1601190923471.jpg'),
(6, 'produk1601190931341.jpg'),
(12, 'produk1601190934271.jpg'),
(1, 'produk0701210252101.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `halaman`
--

CREATE TABLE `halaman` (
  `kd_halaman` int(11) NOT NULL,
  `nama_halaman` text NOT NULL,
  `isi_halaman` longtext NOT NULL,
  `admin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `halaman`
--

INSERT INTO `halaman` (`kd_halaman`, `nama_halaman`, `isi_halaman`, `admin`) VALUES
(6, 'Tentang', '<p>CIKI 500 an mantap</p>\r\n', 'enditha@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `kd_inbox` int(11) NOT NULL,
  `pengirim` varchar(30) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`kd_inbox`, `pengirim`, `judul`, `tujuan`) VALUES
(1, 'budi@gmail.com', 'Orderan', 'Admin'),
(2, 'ahmad@gmail.com', 'judul', 'Admin'),
(3, 'enditha@gmail.com', 'KOMPLAIN 1610061552', 'ahmad@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `inbox_detail`
--

CREATE TABLE `inbox_detail` (
  `kd_inbox_detail` int(11) NOT NULL,
  `kd_inbox` int(11) NOT NULL,
  `userid` varchar(30) NOT NULL,
  `pesan` text NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('N','R') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inbox_detail`
--

INSERT INTO `inbox_detail` (`kd_inbox_detail`, `kd_inbox`, `userid`, `pesan`, `tgl`, `status`) VALUES
(1, 1, 'budi@gmail.com', 'Orderan saya sudah dikirim belum ya?', '2018-01-18 21:39:11', 'R'),
(2, 1, 'enditha@gmail.com', 'sudah', '2021-01-07 04:18:20', 'N'),
(7, 2, 'ahmad@gmail.com', 'sadasdas', '2021-01-09 08:36:54', 'R'),
(9, 3, 'enditha@gmail.com', 'Pesanan dengan no faktur 1610061552 mengajukan komplain atas alasan kadaluarsa\r\n				untuk mengetahui lebih detail tentang kendala yang dialami, Anda bisa melakukan chat di forum ini. Terimakasih.', '2021-01-09 09:03:00', 'R'),
(10, 3, 'ahmad@gmail.com', 'okee', '2021-01-09 09:12:08', 'R');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kd_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kd_kategori`, `nama_kategori`) VALUES
(19, 'STIK');

-- --------------------------------------------------------

--
-- Table structure for table `komplain`
--

CREATE TABLE `komplain` (
  `kd_komplain` int(30) NOT NULL,
  `kd_faktur` int(30) NOT NULL,
  `tgl` date NOT NULL,
  `alasan` text DEFAULT NULL,
  `stts` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komplain`
--

INSERT INTO `komplain` (`kd_komplain`, `kd_faktur`, `tgl`, `alasan`, `stts`) VALUES
(1, 1610074354, '2021-01-08', 'rusak', 'pengajuan'),
(9, 1610061552, '2021-01-09', 'kadaluarsa', 'proses');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `kd_kontak` int(11) NOT NULL,
  `kontak` varchar(30) NOT NULL,
  `isi_kontak` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`kd_kontak`, `kontak`, `isi_kontak`) VALUES
(2, 'SMS (Only)', '082325046290'),
(3, 'Telepon', '082325046290'),
(4, 'Email', 'ciki500an@gmail.com'),
(5, 'Whatsapp', '082325046290');

-- --------------------------------------------------------

--
-- Table structure for table `lap_penjualan`
--

CREATE TABLE `lap_penjualan` (
  `kd_lappenjualan` int(11) NOT NULL,
  `kd_penjualan` int(30) NOT NULL,
  `kd_produk` int(11) NOT NULL,
  `jml_beli` int(11) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lap_penjualan`
--

INSERT INTO `lap_penjualan` (`kd_lappenjualan`, `kd_penjualan`, `kd_produk`, `jml_beli`, `total`) VALUES
(1, 1516311357, 2, 250000, 1),
(2, 1516311413, 1, 210000, 1),
(3, 1521724670, 6, 165000, 1),
(4, 1521944737, 7, 134000, 1),
(5, 1521945503, 4, 240000, 1),
(6, 1522035512, 11, 240000, 1),
(7, 1521998843, 9, 195000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `nama_plg` varchar(50) NOT NULL,
  `alamat_plg` text NOT NULL,
  `kd_provinsi` int(11) DEFAULT NULL,
  `kd_kota` int(11) NOT NULL,
  `kodepos_plg` int(5) NOT NULL,
  `tlp_plg` varchar(13) NOT NULL,
  `email_plg` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`nama_plg`, `alamat_plg`, `kd_provinsi`, `kd_kota`, `kodepos_plg`, `tlp_plg`, `email_plg`) VALUES
('AHMAD YANI', 'JL. DENPASAR NO.45 SEMARANG BARAT', 10, 398, 54222, '08194567888', 'ahmad@gmail.com'),
('M. Akmal Fahmi', 'JL. CEMPAKA NO. 28A PEKALONGAN', 10, 348, 51133, '8156956278', 'akmal@gmail.com'),
('Ali Zaenal Abidin', 'Jalan Singkarak No.10 Kauman Pekalongan', 10, 348, 51128, '8157607305', 'alizaenal@gmail.com'),
('Ani Werdaya', 'Jl. Bebas Tulis Rt.02/02 No.04 Kraton Lor', 10, 348, 51145, '085640000001', 'ani@gmail.com'),
('M. Arda Farhani', 'JL. SUTAN SYAHRIR NO. 3 PEKALONGAN', 10, 348, 51134, '85842299242', 'arda@gmail.com'),
('M. Arvyanda Dava Sangga P.', 'WIRSARI 2 JL. SUNAN GUNUNG JATI NO. 8 BATANG', 10, 348, 51135, '85742744834', 'arvyanda@gmail.com'),
('Muhammad Ashlih Zurya', 'JL. HAYAM WURUK PESINDON I/221 PEKALONGAN', 10, 348, 51144, '85712947666', 'ashlih@gmail.com'),
('Azka Zirly Aulia Rahman', 'JL. TERATAI GG. 5 NO. 38 PEKALONGAN', 10, 348, 51129, '87832586175', 'azka@gmail.com'),
('coba', 'coba', 1, 32, 21112, '21312312', 'coba@coba.com'),
('Muchammad Dalil Adnan', 'PONCOL GG. 4 ANGGERK NO. 58 PEKALONGAN', 10, 348, 51141, '85869031882', 'dalil@gmail.com'),
('Achmad Ezra Saquelle DJ', 'PESINDON GG.1/17 PEKALONGAN', 10, 348, 51127, '87830630410', 'ezra@gmail.com'),
('M. Farda Iyad Robbani', 'PONCOL GG. KATALIA 24C PEKALONGAN', 10, 348, 51136, '816677905', 'farda@gmail.com'),
('Fariq Kholish', 'NOYONTAAN GG. 15A NO.16', 10, 348, 51130, '81548074103', 'fariq@gmail.com'),
('Ghulam Muhammad', 'JL. CEMPAKA NO. 68 PEKALONGAN', 10, 348, 51131, '81542003941', 'ghulam@gmail.com'),
('M. Hawari Nusantara Azizi', 'Jl. Kanfer  4 No.134 Perum Slamaran Pekalongan', 10, 348, 51137, '82325785959', 'hawari@gmail.com'),
('Muchammad Heydar Ali Yusuf', 'Jl. Raya Pringgosari No.109 Kalibanger Sokorejo', 10, 348, 51142, '81325655765', 'heydar@gmail.com'),
('Ibni Zakii', 'JL. ULIN 4/9 PERUM SLAMARAN', 10, 348, 51132, '8156909910', 'ibnii@gmail.com'),
('Indah Kusumadewi', 'Jl. Bebas Tulis Rt.01/01 No.01 Kraton Lor', 10, 348, 51145, '085640000002', 'indah@gmail.com'),
('Dwi Lestari', 'Jl. Bahagia No.67 purwokerto', 10, 41, 45671, '0822225467', 'lestari@gmail.com'),
('Mohammad Majdan', 'JL. KARTINI GG. 5 NO. 10 PEKALONGAN', 10, 348, 51139, '85865520021', 'majdan@gmail.com'),
('Primadina Zahrani', 'JL. PEMUDA GG. 32 RT. 01 RW. 07 KAUMAN', 10, 348, 51120, '811278885', 'prima@gmail.com'),
('Razita Zarli Marsya', 'KRAPYAK KIDUL GG. V NO. 79 PEKALONGAN', 10, 348, 51114, '85865495471', 'razita@gmail.com'),
('Rizky Novia Fitri', 'SLAMARAN PEKALONGAN', 10, 348, 51121, '87857993060', 'rizky@gmail.com'),
('Salma Diena Syakira', 'JL. HAYAMWURUK PESINDON GG. I PEKALONGAN', 10, 348, 51122, '8164886437', 'salma@gmail.com'),
('Mohammad Sammy Hibban Ardia', 'PESINDON GG. 1 NO. 3 RT.05 RW.13 PEKALONGAN', 10, 348, 51140, '85869167742', 'sammy@gmail.com'),
('Shafira Az Zahra', 'Pondok Sriwijaya Jl. Mutiara 22 Podosugih Pekalongan', 10, 348, 51123, '817432255', 'shafira@gmail.com'),
('Sofia Sanabila', 'JL. TRAPESIUM II NO. 13 LIMAS PEKALONGAN', 10, 348, 51124, '87733327888', 'sofia@gmail.com'),
('Syahar Banu', 'JL. TERATE KLEGO GG. 4 PEKALONGAN', 10, 348, 51125, '85866636383', 'syahar@gmail.com'),
('Muhamad Taqi', 'JL. TOBA II/21 PEKALONGAN', 10, 348, 51143, '8156594953', 'taqi@gmail.com'),
('pramita', 'Jl. Pandanaran', 10, 398, 51211, '085642372077', 'tatakusuma@gmail.com'),
('M. Yoga Ardhian Maulana', 'Desa Menguneng Rt 02/01 Warungasem Batang', 10, 348, 51138, '85869286969', 'yoga@gmail.com'),
('Yusmar Amelia Solekha', 'KRAPYAK KIDUL GG. V NO. 77A PEKALONGAN', 10, 348, 51126, '85786230975', 'yusmar@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `kd_faktur` int(30) NOT NULL,
  `penerima` varchar(50) DEFAULT NULL,
  `kd_provinsi` int(11) DEFAULT NULL,
  `kd_kota` int(11) DEFAULT NULL,
  `alamat_penerima` text DEFAULT NULL,
  `kdpos_penerima` int(5) DEFAULT NULL,
  `tlp_penerima` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`kd_faktur`, `penerima`, `kd_provinsi`, `kd_kota`, `alamat_penerima`, `kdpos_penerima`, `tlp_penerima`) VALUES
(0, 'Indah Kusumadewi', 10, 348, 'Jl. Bebas Tulis Rt.01/01 No.01 Kraton Lor', 51145, '085640000002'),
(1516311357, 'Indah Kusumadewi', 10, 348, 'Jl. Bebas Tulis Rt.01/01 No.01 Kraton Lor', 51145, '085640000002'),
(1516311413, 'Indah Kusumadewi', 10, 348, 'Jl. Bebas Tulis Rt.01/01 No.01 Kraton Lor', 51145, '085640000002'),
(1521721490, 'AHMAD YANI', 10, 398, 'JL. DENPASAR NO.45 SEMARANG BARAT', 54222, '08194567888'),
(1521724670, 'Indah Kusumadewi', 10, 348, 'Jl. Bebas Tulis Rt.01/01 No.01 Kraton Lor', 51145, '085640000002'),
(1521944737, 'Indah Kusumadewi', 10, 348, 'Jl. Bebas Tulis Rt.01/01 No.01 Kraton Lor', 51145, '085640000002'),
(1521945503, 'Indah Kusumadewi', 10, 348, 'Jl. Bebas Tulis Rt.01/01 No.01 Kraton Lor', 51145, '085640000002'),
(1521998843, 'Indah Kusumadewi', 10, 348, 'Jl. Bebas Tulis Rt.01/01 No.01 Kraton Lor', 51145, '085640000002'),
(1522035512, 'Indah Kusumadewi', 10, 348, 'Jl. Bebas Tulis Rt.01/01 No.01 Kraton Lor', 51145, '085640000002'),
(1539752537, 'Indah Kusumadewi', 10, 348, 'Jl. Bebas Tulis Rt.01/01 No.01 Kraton Lor', 51145, '085640000002'),
(1539769399, 'Indah Kusumadewi', 10, 348, 'Jl. Bebas Tulis Rt.01/01 No.01 Kraton Lor', 51145, '085640000002'),
(1545856450, 'Indah Kusumadewi', 10, 348, 'Jl. Bebas Tulis Rt.01/01 No.01 Kraton Lor', 51145, '085640000002'),
(1547649441, 'Indah Kusumadewi', 10, 398, 'Jl. Bebas Tulis Rt.01/01 No.01 Kraton Lor', 51145, '085640000002'),
(1547651157, 'pramita', 10, 398, 'Jl. Pandanaran', 51211, '085642372077'),
(1547697969, 'Indah Kusumadewi', 10, 348, 'Jl. Bebas Tulis Rt.01/01 No.01 Kraton Lor', 51145, '085640000002'),
(1609994058, 'AHMAD YANI', 10, 398, 'JL. DENPASAR NO.45 SEMARANG BARAT', 54222, '08194567888'),
(1609994666, 'AHMAD YANI', 10, 398, 'JL. DENPASAR NO.45 SEMARANG BARAT', 54222, '08194567888'),
(1610027968, 'AHMAD YANI', 10, 398, 'JL. DENPASAR NO.45 SEMARANG BARAT', 54222, '08194567888'),
(1610061093, 'AHMAD YANI', 10, 398, 'JL. DENPASAR NO.45 SEMARANG BARAT', 54222, '08194567888'),
(1610061552, 'AHMAD YANI', 10, 398, 'JL. DENPASAR NO.45 SEMARANG BARAT', 54222, '08194567888'),
(1610074354, 'AHMAD YANI', 10, 398, 'JL. DENPASAR NO.45 SEMARANG BARAT', 54222, '08194567888'),
(1610092394, 'AHMAD YANI', 10, 398, 'JL. DENPASAR NO.45 SEMARANG BARAT', 54222, '08194567888');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `kd_penjualan` int(11) NOT NULL,
  `kd_faktur` int(30) NOT NULL,
  `kd_produk` int(11) NOT NULL,
  `harga_produk` double NOT NULL,
  `jml_beli` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`kd_penjualan`, `kd_faktur`, `kd_produk`, `harga_produk`, `jml_beli`) VALUES
(1, 1516311357, 2, 250000, 1),
(2, 1516311413, 1, 210000, 1),
(3, 1521724670, 6, 165000, 1),
(4, 1521944737, 7, 134000, 1),
(5, 1521945503, 4, 240000, 1),
(6, 1522035512, 11, 240000, 1),
(7, 1521998843, 9, 195000, 1),
(8, 1539769399, 1, 168000, 1),
(9, 1539752537, 2, 250000, 1),
(10, 1539752537, 9, 195000, 1),
(11, 1545856450, 9, 195000, 1),
(12, 1545856450, 8, 29000, 1),
(13, 1547651157, 12, 16000, 50),
(14, 1547651157, 7, 20000, 6),
(15, 1547649441, 10, 18000, 5),
(16, 1547649441, 12, 16000, 6),
(17, 1547697969, 10, 18000, 5),
(18, 1521721490, 1, 1000, 10),
(19, 1609994058, 1, 900, 2),
(20, 1609994666, 1, 900, 2),
(21, 1610027968, 1, 900, 1),
(22, 1610061093, 1, 900, 1),
(23, 1610061552, 1, 900, 1),
(24, 1610074354, 1, 900, 1),
(25, 1610092394, 1, 900, 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `kd_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `kd_kategori` int(11) NOT NULL,
  `bahan` varchar(30) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `expired` varchar(20) NOT NULL,
  `berat` double NOT NULL,
  `harga` double NOT NULL,
  `stok` int(5) NOT NULL,
  `deskripsi` longtext DEFAULT NULL,
  `foto` varchar(30) DEFAULT 'produk.png',
  `tgl_produk` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `diskon` double DEFAULT NULL,
  `hargabeli` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kd_produk`, `nama_produk`, `kd_kategori`, `bahan`, `warna`, `expired`, `berat`, `harga`, `stok`, `deskripsi`, `foto`, `tgl_produk`, `diskon`, `hargabeli`) VALUES
(1, 'Chiki Potato Stick', 19, 'Potato', '-', '2022', 100, 1000, 981, '<h2>Deskripsi&nbsp;KOMO Jagung Bakar. Snack JADUL Berhadiah. Jajanan Anak 90an. MURAH.</h2>\r\n\r\n<p>ðŸ·ï¸ Item: KOMO Jagung Bakar. Snack JADUL Berhadiah. Jajanan Anak 90an. MURAH.<br />\r\n<br />\r\nRasa sama Seperti Jang DoeloeðŸ¤¤. Bungkush masih sama persis. Bentuk pun juga sama ðŸ‘Œ<br />\r\n<br />\r\nâš ï¸BERHADIAH LANGSUNG (*jika beruntung) ðŸ˜‹</p>\r\n', 'produk0701210252101.jpg', '2021-01-09 04:26:57', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `kd_promo` int(11) NOT NULL,
  `isi` longtext DEFAULT NULL,
  `kd_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`kd_promo`, `isi`, `kd_produk`) VALUES
(1, 'Beli 5 Gratis 1', 1),
(2, '', 2),
(3, '0', 3),
(4, '0', 4),
(5, '0', 5),
(6, '0', 6),
(7, '0', 7),
(8, '0', 8),
(9, '0', 9),
(10, '0', 10),
(11, '0', 11),
(12, '0', 12),
(13, 'Beli 5 Gratis 1', 1),
(14, '', 2),
(15, '0', 3),
(16, '0', 4),
(17, '0', 5),
(18, '0', 6),
(19, '0', 7),
(20, '0', 8),
(21, '0', 9),
(22, '0', 10),
(23, '0', 11),
(24, '', 12),
(25, 'Beli 5 Gratis 1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `kd_rekening` int(11) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `no_rek` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`kd_rekening`, `bank`, `no_rek`) VALUES
(1, 'BCA', '2497-0808-15'),
(4, 'BRI', '3744-0101-4619-533'),
(5, 'BNI', '613492032');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `kd_testimoni` int(11) NOT NULL,
  `kd_produk` int(11) NOT NULL,
  `userid` varchar(30) NOT NULL,
  `isi_testimoni` mediumtext NOT NULL,
  `tgl_testimoni` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`kd_testimoni`, `kd_produk`, `userid`, `isi_testimoni`, `tgl_testimoni`) VALUES
(1, 1, 'ahmad@gmail.com', 'Rasanya mantap', '2021-01-07 04:17:58');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `tipe` enum('Admin','Pelanggan') NOT NULL,
  `status` enum('Y','N') NOT NULL,
  `kode` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `password`, `tipe`, `status`, `kode`) VALUES
('ahmad@gmail.com', 'ahmad', 'Pelanggan', 'Y', NULL),
('akmal@gmail.com', 'akmal', 'Pelanggan', 'Y', NULL),
('alizaenal@gmail.com', 'alizaenal', 'Pelanggan', 'Y', NULL),
('ani@gmail.com', 'ani', 'Pelanggan', 'Y', NULL),
('arda@gmail.com', 'arda', 'Pelanggan', 'Y', NULL),
('arvyanda@gmail.com', 'arvyanda', 'Pelanggan', 'Y', NULL),
('ashlih@gmail.com', 'ashlih', 'Pelanggan', 'Y', NULL),
('azka@gmail.com', 'azka', 'Pelanggan', 'Y', NULL),
('coba@coba.com', 'coba', 'Pelanggan', 'Y', '8195841181'),
('dalil@gmail.com', 'dalil', 'Pelanggan', 'Y', NULL),
('enditha@gmail.com', 'enditha', 'Admin', 'Y', NULL),
('ezra@gmail.com', 'ezra', 'Pelanggan', 'Y', NULL),
('farda@gmail.com', 'farda', 'Pelanggan', 'Y', NULL),
('fariq@gmail.com', 'fariq', 'Pelanggan', 'Y', NULL),
('ghulam@gmail.com', 'ghulam', 'Pelanggan', 'Y', NULL),
('hawari@gmail.com', 'hawari', 'Pelanggan', 'Y', NULL),
('heydar@gmail.com', 'heydar', 'Pelanggan', 'Y', NULL),
('ibnii@gmail.com', 'ibnii', 'Pelanggan', 'Y', NULL),
('indah@gmail.com', 'indah', 'Pelanggan', 'Y', NULL),
('lestari@gmail.com', 'lestari', 'Pelanggan', 'Y', NULL),
('majdan@gmail.com', 'majdan', 'Pelanggan', 'Y', NULL),
('prima@gmail.com', 'prima', 'Pelanggan', 'Y', NULL),
('razita@gmail.com', 'razita', 'Pelanggan', 'Y', NULL),
('rizky@gmail.com', 'rizky', 'Pelanggan', 'Y', NULL),
('salma@gmail.com', 'salma', 'Pelanggan', 'Y', NULL),
('sammy@gmail.com', 'sammy', 'Pelanggan', 'Y', NULL),
('shafira@gmail.com', 'shafira', 'Pelanggan', 'Y', NULL),
('sofia@gmail.com', 'sofia', 'Pelanggan', 'Y', NULL),
('syahar@gmail.com', 'syahar', 'Pelanggan', 'Y', NULL),
('taqi@gmail.com', 'taqi', 'Pelanggan', 'Y', NULL),
('tatakusuma@gmail.com', 'tatakusuma', 'Pelanggan', 'Y', '1177401452'),
('yoga@gmail.com', 'yoga', 'Pelanggan', 'Y', NULL),
('yusmar@gmail.com', 'yusmar', 'Pelanggan', 'Y', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `faktur`
--
ALTER TABLE `faktur`
  ADD PRIMARY KEY (`kd_faktur`);

--
-- Indexes for table `halaman`
--
ALTER TABLE `halaman`
  ADD PRIMARY KEY (`kd_halaman`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`kd_inbox`);

--
-- Indexes for table `inbox_detail`
--
ALTER TABLE `inbox_detail`
  ADD PRIMARY KEY (`kd_inbox_detail`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kd_kategori`);

--
-- Indexes for table `komplain`
--
ALTER TABLE `komplain`
  ADD PRIMARY KEY (`kd_komplain`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`kd_kontak`);

--
-- Indexes for table `lap_penjualan`
--
ALTER TABLE `lap_penjualan`
  ADD PRIMARY KEY (`kd_lappenjualan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`email_plg`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`kd_faktur`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`kd_penjualan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kd_produk`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`kd_promo`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`kd_rekening`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`kd_testimoni`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `halaman`
--
ALTER TABLE `halaman`
  MODIFY `kd_halaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `kd_inbox` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `inbox_detail`
--
ALTER TABLE `inbox_detail`
  MODIFY `kd_inbox_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kd_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `komplain`
--
ALTER TABLE `komplain`
  MODIFY `kd_komplain` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `kd_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lap_penjualan`
--
ALTER TABLE `lap_penjualan`
  MODIFY `kd_lappenjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `kd_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `kd_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `kd_promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `kd_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `kd_testimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
