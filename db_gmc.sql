-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16 Jan 2019 pada 09.11
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gmc`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `detailpenjualan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detailpenjualan` (
`no_penjualan` varchar(11)
,`id_obat` varchar(10)
,`jumlah` int(11)
,`proses` int(1)
,`id_karyawan` varchar(10)
,`tgl_penjualan` date
,`nama_pasien` varchar(25)
,`tlp_pasien` varchar(13)
,`alamat_pasien` text
,`nama_obat` varchar(30)
,`jenis` varchar(100)
,`stok` int(11)
,`letak` varchar(5)
,`harga_beli` int(11)
,`harga_jual` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `detail_karyawan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_karyawan` (
`id_karyawan` varchar(10)
,`nama_karyawan` varchar(30)
,`no_hp` varchar(13)
,`jabatan` varchar(15)
,`alamat` text
,`id_user` int(11)
,`username` varchar(16)
,`password` varchar(50)
,`level` int(1)
,`keterangan` varchar(15)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `no_pembelian` varchar(11) NOT NULL,
  `id_obat` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `proses` int(1) NOT NULL COMMENT '1=sudah, 0=belum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`no_pembelian`, `id_obat`, `jumlah`, `total_harga`, `proses`) VALUES
('B1901020001', 'AM022', 90, 0, 1),
('B1901090002', 'AM022', 10, 0, 1),
('B1901090002', 'BE001', 10, 0, 1),
('B1901090002', 'GE123', 5, 0, 1),
('B1901090003', 'AM022', 20, 0, 1),
('B1901150001', 'AC011', 100, 0, 1);

--
-- Trigger `detail_pembelian`
--
DELIMITER $$
CREATE TRIGGER `beli` AFTER INSERT ON `detail_pembelian` FOR EACH ROW BEGIN
UPDATE obat set stok = stok + NEW.jumlah WHERE id_obat = NEW.id_obat;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `gajadi_beli` AFTER DELETE ON `detail_pembelian` FOR EACH ROW BEGIN
UPDATE obat set stok = stok - OLD.jumlah WHERE id_obat = OLD.id_obat;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_pembelian` AFTER UPDATE ON `detail_pembelian` FOR EACH ROW BEGIN
if NEW.jumlah > OLD.jumlah
THEN
UPDATE obat set stok = NEW.jumlah - OLD.jumlah + stok WHERE id_obat = NEW.id_obat;
ELSE
UPDATE obat set stok = stok - OLD.jumlah - NEW.jumlah WHERE id_obat = NEW.id_obat;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `no_penjualan` varchar(11) NOT NULL,
  `id_obat` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `proses` int(1) NOT NULL COMMENT '1=sudah 0=belum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`no_penjualan`, `id_obat`, `jumlah`, `total_harga`, `proses`) VALUES
('1901090002', 'BE001', 1, 0, 1),
('1901090002', 'AM022', 10, 0, 1),
('1901100001', 'AM003', 10, 0, 1),
('1901100001', 'AC011', 10, 0, 1),
('1901130001', 'AC011', 10, 0, 1),
('1901140001', 'DE432', 10, 0, 1),
('1901140001', 'ET023', 10, 0, 1),
('1901140001', 'GL001', 9, 0, 1),
('1901140001', 'FE901', 10, 0, 1),
('1901140001', 'AM002', 10, 0, 1),
('1901140002', 'DE322', 10, 0, 1),
('1901140002', 'ET023', 10, 0, 1),
('1901160001', 'AC011', 10, 56000, 1);

--
-- Trigger `detail_penjualan`
--
DELIMITER $$
CREATE TRIGGER `gajadi_jual` AFTER DELETE ON `detail_penjualan` FOR EACH ROW BEGIN
UPDATE obat set stok = stok + OLD.jumlah WHERE id_obat = OLD.id_obat;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `jual` AFTER INSERT ON `detail_penjualan` FOR EACH ROW BEGIN
UPDATE obat set stok = stok - NEW.jumlah WHERE id_obat = NEW.id_obat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan_ifrs`
--

CREATE TABLE `karyawan_ifrs` (
  `id_karyawan` varchar(10) NOT NULL,
  `nama_karyawan` varchar(30) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `jabatan` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan_ifrs`
--

INSERT INTO `karyawan_ifrs` (`id_karyawan`, `nama_karyawan`, `no_hp`, `jabatan`, `alamat`) VALUES
('ADM1', 'Admin', '08127222161', 'Kepala IFRS', ' Jalan Bunga Sepatu 2 Blok 4J no2'),
('KRS', 'Dr. Hetti Rusmini, M. Biomed', '081272221890', 'Kepala RS', 'Jalan Bunga Sedap Malam Raya no 34'),
('USR1', 'Komalasari,S.Farm', '081277100256', 'Karyawan IFRS', '  Jalan Bunga Sedap malam Raya No 23');

-- --------------------------------------------------------

--
-- Stand-in structure for view `lap_pembelian`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `lap_pembelian` (
`no_pembelian` varchar(11)
,`id_obat` varchar(10)
,`jumlah` int(11)
,`proses` int(1)
,`nama_pbo` varchar(30)
,`id_karyawan` varchar(10)
,`tgl_pengiriman` date
,`nama_obat` varchar(30)
,`jenis` varchar(100)
,`stok` int(11)
,`letak` varchar(5)
,`harga_beli` int(11)
,`harga_jual` int(11)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` varchar(10) NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,
  `letak` varchar(5) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `jenis`, `stok`, `letak`, `harga_beli`, `harga_jual`) VALUES
('AC011', 'Acyclovir tab 400mg', 'Tablet', 250, 'A1A', 5000, 5600),
('AL031', 'Alprazolam 0,5mg tab E Kat', 'Kapsul', 500, 'A1A', 4000, 5000),
('AM001', 'Ambroxol 15mg/ml syrup E Kat', 'Sirup', 500, 'A1B', 8000, 8600),
('AM002', 'Aminophylline inj 24mg/ml E Ka', 'Injeksi', 490, 'A1B', 5000, 6000),
('AM003', 'Ambroxol tab 30mg', 'Tablet', 490, 'A1A', 4500, 5000),
('AM021', 'Aminophylline inj 24mg/ml E Ka', 'Injeksi', 500, 'A1B', 8000, 8500),
('AM022', 'Amoxilin ', 'Cair', 230, 'P2B', 5000, 5600),
('AM421', 'Aminophylline 200mg tab', 'Tablet', 500, 'A1A', 10000, 11000),
('BE001', 'Betadine ', 'Tablet', 89, 'P2A', 3500, 5000),
('DE322', 'Dextrose 5%inf E Kat', 'Tablet', 180, 'D1B', 5000, 6000),
('DE432', 'Dexametason inj', 'injeksi', 40, 'D1B', 4500, 6500),
('ER001', 'Erythromicin kap 500mg E Kat', 'Kapsul', 500, 'E1A', 5000, 6000),
('ET023', 'Etambutol tab 500mg', 'Tablet', 480, 'E1A', 7000, 7500),
('FE213', 'Fenitoin Natrium inj 50mg/mlE ', 'Tablet', 200, 'F1B', 6000, 7000),
('FE342', 'Fenobarbital inj 50mg/ml E Kat', 'Tablet', 200, 'F1B', 8000, 9000),
('FE861', 'Fenitoin kap 100mg E Kat', 'Kapsul', 500, 'F1A', 9000, 10000),
('FE901', 'Fenobarbital tab 30mg', 'Tablet', 490, 'F1A', 3500, 4500),
('FL123', 'Fitomenadion tab 10mg E Kat', 'Tablet', 500, 'F1A', 4000, 5500),
('FU213', 'Furosemid tab 40mg', 'Tablet', 500, 'F1A', 5000, 6000),
('FU332', 'Furosemid  inj E Kat', 'Tablet', 30, 'F1B', 5000, 6000),
('GE123', 'Gentamicin salp kulit', 'Salep', 295, 'G1B', 6000, 7000),
('GE453', 'Gemfibrozil tab 300mg E  Kat', 'Tablet', 500, 'G1A', 4000, 5000),
('GE521', 'Gentamicin inj 80mg', 'Tablet', 200, 'G1B', 5000, 6000),
('GE564', 'Gentamicin TM', 'Tablet', 500, 'G1A', 6000, 7000),
('GE644', 'Gentamicin inj 80mg E Kat', 'Tablet', 200, 'G1B', 4500, 6000),
('GK001', 'Glukosa 40% E Kat', 'Kapsul', 500, 'G1A', 5000, 6000),
('GL001', 'Glibenclamid tab 5mg', 'Tablet', 491, 'G1A', 6500, 7000),
('GL002', 'Gliceril Guayacolat', 'Kapsul', 500, 'G1A', 4000, 5000),
('GL003', 'Glimeprid tab 2mg', 'Tablet', 500, 'G1A', 5000, 6000),
('GL004', 'Gliquidon tab 30mg', 'Tablet', 500, 'G1A', 7000, 6500),
('HA001', 'Haloperidol tab 1,5mg', 'Tablet', 500, 'H1A', 5000, 4500),
('HA002', 'Haloperidol tab 5mg', 'Tablet', 500, 'H1A', 4500, 5000),
('HA003', 'Haloperidol tab 0.5mg E Kat', 'Tablet', 500, 'H1A', 5000, 6000),
('HA004', 'Haloperidol tab 1.5mg E Kat', 'Tablet', 500, 'H1A', 5500, 5000),
('HA005', 'Haloperidol tab 5mg E Kat', 'Tablet', 500, 'H1A', 5000, 6000),
('HY001', 'Hydrocortison cream 2.5%', 'Salep', 500, 'H1B', 6000, 7000),
('HY002', 'Hydrocortison cream 2.5% E Kat', 'Salep', 500, 'H1B', 5000, 6000),
('IB001', 'Ibuprofen tab 400mg E Kat', 'Tablet', 510, 'I1A', 6000, 6000),
('IB002', 'Ibuprofen tab 200mg E Kat', 'Tablet', 510, 'I1A', 7000, 7600),
('IS001', 'Isoniazid 300mg tab', 'Tablet', 500, 'I1A', 6000, 7000),
('IS002', 'Isosorbid Dinitrat 5mg E Kat', 'Kapsul', 500, 'I1A', 6600, 7500),
('IS003', 'Isosorbid Dinitrat 5mg ', 'Kapsul', 500, 'I1A', 8500, 9700),
('KA001', 'Kalium Diclofenac tab 50mg E K', 'Tablet', 500, 'K1A', 6500, 8000),
('KE001', 'Ketoconazol cream 2%', 'Salep', 500, 'K1A', 7000, 8500),
('KE002', 'Ketoconazol tab 200mg', 'Tablet', 500, 'K1A', 4500, 5600),
('KE003', 'Ketoprofen tab 100mg', 'Tablet', 500, 'K1A', 8500, 9000),
('KE007', 'Ketoprofen tab 100mg E Kat', 'Tablet', 500, 'K1A', 3500, 5000),
('KE008', 'Ketorolac inj 30mg E Kat', 'Tablet', 200, 'K1B', 5500, 6000),
('KL003', 'Klindamisin kap 300mg', 'Kapsul', 500, 'K1A', 8000, 9000),
('KL004', 'Klindamisin kap 150mg E Kat', 'Kapsul', 500, 'K1A', 5000, 6000),
('KL005', 'Kloramfenicol SM 1%', 'Tablet', 500, 'K1A', 6000, 7000),
('KL006', 'Kloramfenicol TT ', 'Tablet', 500, 'K1A', 6600, 7000),
('KL007', 'Klorpromazin inj 25mg/ml', 'Tablet', 200, 'K1B', 8000, 9000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `no_pembelian` varchar(12) NOT NULL,
  `nama_pbo` varchar(30) NOT NULL,
  `id_karyawan` varchar(10) NOT NULL,
  `tgl_pengiriman` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`no_pembelian`, `nama_pbo`, `id_karyawan`, `tgl_pengiriman`) VALUES
('B1901020001', 'KF Lampung', 'ADM1', '2019-01-02'),
('B1901090002', 'KF Lampung', 'ADM1', '2019-01-09'),
('B1901090003', 'KF Lampung', 'ADM1', '2019-01-09'),
('B1901150001', 'KF Lampung', 'ADM1', '2019-01-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `no_penjualan` varchar(11) NOT NULL,
  `id_karyawan` varchar(10) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `nama_pasien` varchar(25) NOT NULL,
  `tlp_pasien` varchar(13) NOT NULL,
  `alamat_pasien` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`no_penjualan`, `id_karyawan`, `tgl_penjualan`, `nama_pasien`, `tlp_pasien`, `alamat_pasien`) VALUES
('1901090002', 'ADM1', '2019-01-09', 'Jio', '087885602335', 'Jalan-Jalan'),
('1901100001', 'ADM1', '2019-01-10', 'Yuda', '08127222161', 'Polinela'),
('1901130001', 'USR1', '2019-01-13', 'juniman', '08127222161', 'Polinela'),
('1901140001', 'ADM1', '2019-01-14', 'Bambang', '08127222122', 'Jalan Bunga Sepatu 2 Blok 4J no 2'),
('1901140002', 'ADM1', '2019-01-14', 'Budiman', '08975790265', 'Jalan Gunung Krakatau 2'),
('1901160001', 'USR1', '2019-01-16', 'Aris', '08127222165', 'Tj Karang');

--
-- Trigger `penjualan`
--
DELIMITER $$
CREATE TRIGGER `delete` AFTER DELETE ON `penjualan` FOR EACH ROW BEGIN
  DELETE FROM detail_penjualan
  WHERE no_penjualan=old.no_penjualan;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `tigatabel`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `tigatabel` (
`no_penjualan` varchar(11)
,`id_obat` varchar(10)
,`jumlah` int(11)
,`proses` int(1)
,`id_karyawan` varchar(10)
,`tgl_penjualan` date
,`nama_pasien` varchar(25)
,`alamat_pasien` text
,`nama_obat` varchar(30)
,`jenis` varchar(100)
,`stok` int(11)
,`letak` varchar(5)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_login`
--

CREATE TABLE `user_login` (
  `id_user` int(11) NOT NULL,
  `id_karyawan` varchar(10) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(1) NOT NULL,
  `keterangan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_login`
--

INSERT INTO `user_login` (`id_user`, `id_karyawan`, `username`, `password`, `level`, `keterangan`) VALUES
(1, 'ADM1', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'Administrator'),
(2, 'USR1', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 2, 'Pegawai'),
(20, 'KRS', 'krs', 'a669a411d6370f43d8282525974a896f', 3, 'Kepala RS');

-- --------------------------------------------------------

--
-- Struktur untuk view `detailpenjualan`
--
DROP TABLE IF EXISTS `detailpenjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detailpenjualan`  AS  select `detail_penjualan`.`no_penjualan` AS `no_penjualan`,`detail_penjualan`.`id_obat` AS `id_obat`,`detail_penjualan`.`jumlah` AS `jumlah`,`detail_penjualan`.`proses` AS `proses`,`penjualan`.`id_karyawan` AS `id_karyawan`,`penjualan`.`tgl_penjualan` AS `tgl_penjualan`,`penjualan`.`nama_pasien` AS `nama_pasien`,`penjualan`.`tlp_pasien` AS `tlp_pasien`,`penjualan`.`alamat_pasien` AS `alamat_pasien`,`obat`.`nama_obat` AS `nama_obat`,`obat`.`jenis` AS `jenis`,`obat`.`stok` AS `stok`,`obat`.`letak` AS `letak`,`obat`.`harga_beli` AS `harga_beli`,`obat`.`harga_jual` AS `harga_jual` from ((`detail_penjualan` join `penjualan`) join `obat`) where ((`detail_penjualan`.`no_penjualan` = `penjualan`.`no_penjualan`) and (`detail_penjualan`.`id_obat` = `obat`.`id_obat`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_karyawan`
--
DROP TABLE IF EXISTS `detail_karyawan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_karyawan`  AS  select `karyawan_ifrs`.`id_karyawan` AS `id_karyawan`,`karyawan_ifrs`.`nama_karyawan` AS `nama_karyawan`,`karyawan_ifrs`.`no_hp` AS `no_hp`,`karyawan_ifrs`.`jabatan` AS `jabatan`,`karyawan_ifrs`.`alamat` AS `alamat`,`user_login`.`id_user` AS `id_user`,`user_login`.`username` AS `username`,`user_login`.`password` AS `password`,`user_login`.`level` AS `level`,`user_login`.`keterangan` AS `keterangan` from (`karyawan_ifrs` join `user_login`) where (`karyawan_ifrs`.`id_karyawan` = `user_login`.`id_karyawan`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `lap_pembelian`
--
DROP TABLE IF EXISTS `lap_pembelian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lap_pembelian`  AS  select `detail_pembelian`.`no_pembelian` AS `no_pembelian`,`detail_pembelian`.`id_obat` AS `id_obat`,`detail_pembelian`.`jumlah` AS `jumlah`,`detail_pembelian`.`proses` AS `proses`,`pembelian`.`nama_pbo` AS `nama_pbo`,`pembelian`.`id_karyawan` AS `id_karyawan`,`pembelian`.`tgl_pengiriman` AS `tgl_pengiriman`,`obat`.`nama_obat` AS `nama_obat`,`obat`.`jenis` AS `jenis`,`obat`.`stok` AS `stok`,`obat`.`letak` AS `letak`,`obat`.`harga_beli` AS `harga_beli`,`obat`.`harga_jual` AS `harga_jual` from ((`detail_pembelian` join `pembelian`) join `obat`) where ((`detail_pembelian`.`no_pembelian` = `pembelian`.`no_pembelian`) and (`detail_pembelian`.`id_obat` = `obat`.`id_obat`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `tigatabel`
--
DROP TABLE IF EXISTS `tigatabel`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tigatabel`  AS  select `detail_penjualan`.`no_penjualan` AS `no_penjualan`,`detail_penjualan`.`id_obat` AS `id_obat`,`detail_penjualan`.`jumlah` AS `jumlah`,`detail_penjualan`.`proses` AS `proses`,`penjualan`.`id_karyawan` AS `id_karyawan`,`penjualan`.`tgl_penjualan` AS `tgl_penjualan`,`penjualan`.`nama_pasien` AS `nama_pasien`,`penjualan`.`alamat_pasien` AS `alamat_pasien`,`obat`.`nama_obat` AS `nama_obat`,`obat`.`jenis` AS `jenis`,`obat`.`stok` AS `stok`,`obat`.`letak` AS `letak` from ((`detail_penjualan` join `penjualan`) join `obat`) where ((`detail_penjualan`.`no_penjualan` = `penjualan`.`no_penjualan`) and (`detail_penjualan`.`id_obat` = `obat`.`id_obat`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD KEY `no_pembelian` (`no_pembelian`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD KEY `detail_penjualan_ibfk_2` (`no_penjualan`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indexes for table `karyawan_ifrs`
--
ALTER TABLE `karyawan_ifrs`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`no_pembelian`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`no_penjualan`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD CONSTRAINT `detail_pembelian_ibfk_2` FOREIGN KEY (`no_pembelian`) REFERENCES `pembelian` (`no_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pembelian_ibfk_3` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD CONSTRAINT `detail_penjualan_ibfk_1` FOREIGN KEY (`no_penjualan`) REFERENCES `penjualan` (`no_penjualan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_penjualan_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan_ifrs` (`id_karyawan`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan_ifrs` (`id_karyawan`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_login`
--
ALTER TABLE `user_login`
  ADD CONSTRAINT `user_login_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan_ifrs` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
