-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 18, 2024 at 08:24 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `neokolonialisme`
--

-- --------------------------------------------------------

--
-- Table structure for table `ekonomi`
--

CREATE TABLE `ekonomi` (
  `id_ekonomi` int NOT NULL,
  `negara_id` int DEFAULT NULL,
  `pendapatan_negara` double DEFAULT NULL,
  `persentase_gdp` double DEFAULT NULL,
  `investasi_asing` double DEFAULT NULL,
  `ketergantungan_ekonomi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ekonomi`
--

INSERT INTO `ekonomi` (`id_ekonomi`, `negara_id`, `pendapatan_negara`, `persentase_gdp`, `investasi_asing`, `ketergantungan_ekonomi`) VALUES
(1, 1, 40000000000, 5, 10000000000, 'Tinggi'),
(2, 1, 42000000000, 5.5, 10500000000, 'Tinggi'),
(3, 2, 50000000000, 15, 20000000000, 'Sangat Tinggi'),
(4, 2, 52000000000, 16, 21000000000, 'Sangat Tinggi'),
(5, 3, 30000000000, 25, 5000000000, 'Sangat Tinggi'),
(6, 4, 15000000000, 8, 3000000000, 'Tinggi'),
(7, 5, 25000000000, 12, 8000000000, 'Tinggi'),
(8, 6, 10000000000, 20, 2000000000, 'Sangat Tinggi'),
(9, 7, 100000000000, 20, 30000000000, 'Tinggi'),
(10, 8, 5000000000, 30, 1000000000, 'Sangat Tinggi'),
(11, 9, 20000000000, 18, 7000000000, 'Tinggi'),
(12, 10, 60000000000, 10, 25000000000, 'Tinggi'),
(17, 16, 2100000, 4, 10000, 'Sangat Rendah');

-- --------------------------------------------------------

--
-- Table structure for table `sosiallingkungan`
--

CREATE TABLE `sosiallingkungan` (
  `id_sosial` int NOT NULL,
  `negara_id` int DEFAULT NULL,
  `kerusakan_lingkungan` varchar(50) DEFAULT NULL,
  `penggusuran_penduduk` int DEFAULT NULL,
  `konflik_sosial` varchar(50) DEFAULT NULL,
  `tingkat_kemiskinan` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sosiallingkungan`
--

INSERT INTO `sosiallingkungan` (`id_sosial`, `negara_id`, `kerusakan_lingkungan`, `penggusuran_penduduk`, `konflik_sosial`, `tingkat_kemiskinan`) VALUES
(1, 1, 'Tinggi', 5000, 'Ya', 12),
(2, 1, 'Sedang', 3000, 'Tidak', 10),
(3, 2, 'Sangat Tinggi', 10000, 'Ya', 20),
(4, 2, 'Tinggi', 8000, 'Ya', 18),
(5, 3, 'Sangat Tinggi', 2000, 'Ya', 50),
(6, 4, 'Tinggi', 3000, 'Ya', 25),
(7, 5, 'Tinggi', 4000, 'Ya', 15),
(8, 6, 'Sangat Tinggi', 1000, 'Ya', 40),
(9, 7, 'Sedang', 500, 'Tidak', 8),
(10, 8, 'Sangat Tinggi', 6000, 'Ya', 60),
(11, 9, 'Tinggi', 2000, 'Ya', 30),
(12, 10, 'Sedang', 800, 'Tidak', 10);

-- --------------------------------------------------------

--
-- Table structure for table `sumberdaya`
--

CREATE TABLE `sumberdaya` (
  `id` int NOT NULL,
  `negara` varchar(50) NOT NULL,
  `sumberdaya_utama` varchar(50) DEFAULT NULL,
  `perusahaan_asing` varchar(50) DEFAULT NULL,
  `tahun_eksploitasi` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sumberdaya`
--

INSERT INTO `sumberdaya` (`id`, `negara`, `sumberdaya_utama`, `perusahaan_asing`, `tahun_eksploitasi`) VALUES
(1, 'Indonesia', 'Minyak', 'Chevron', 1970),
(2, 'Nigeria', 'Minyak', 'Shell', 1958),
(3, 'Kongo', 'Kobalt', 'Glencore', 2008),
(4, 'Ghana', 'Emas', 'AngloGold Ashanti', 1999),
(5, 'Peru', 'Tembaga', 'Freeport-McMoRan', 1956),
(6, 'Papua Nugini', 'Emas', 'Barrick Gold', 1990),
(7, 'Australia', 'Bijih Besi', 'Rio Tinto', 1966),
(8, 'Zambia', 'Tembaga', 'First Quantum', 2001),
(9, 'Mongolia', 'Batubara', 'Peabody Energy', 2005),
(10, 'Brazil', 'Aluminium', 'Alcoa', 1985),
(16, 'Konoha', 'Cakra', 'Akatsuki', 1444);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_keputusan`
-- (See below for the actual view)
--
CREATE TABLE `view_keputusan` (
`negara` varchar(50)
,`pendapatan_negara` double
,`ketergantungan_ekonomi` varchar(50)
,`kerusakan_lingkungan` varchar(50)
,`penggusuran_penduduk` int
,`konflik_sosial` varchar(50)
,`tingkat_kemiskinan` double
,`keputusan` varchar(15)
);

-- --------------------------------------------------------

--
-- Structure for view `view_keputusan`
--
DROP TABLE IF EXISTS `view_keputusan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_keputusan`  AS SELECT `n`.`negara` AS `negara`, `e`.`pendapatan_negara` AS `pendapatan_negara`, `e`.`ketergantungan_ekonomi` AS `ketergantungan_ekonomi`, `s`.`kerusakan_lingkungan` AS `kerusakan_lingkungan`, `s`.`penggusuran_penduduk` AS `penggusuran_penduduk`, `s`.`konflik_sosial` AS `konflik_sosial`, `s`.`tingkat_kemiskinan` AS `tingkat_kemiskinan`, (case when ((`s`.`kerusakan_lingkungan` = 'Sangat Tinggi') and (`s`.`konflik_sosial` = 'Ya') and (`s`.`tingkat_kemiskinan` > 40)) then 'Krisis Besar' when ((`s`.`kerusakan_lingkungan` = 'Sangat Tinggi') and (`s`.`konflik_sosial` = 'Ya') and (`s`.`tingkat_kemiskinan` <= 40)) then 'Krisis Sedang' when ((`s`.`kerusakan_lingkungan` = 'Tinggi') and (`s`.`konflik_sosial` = 'Ya')) then 'Krisis Kecil' when (`s`.`kerusakan_lingkungan` = 'Sedang') then 'Terkendali' else 'Tidak Diketahui' end) AS `keputusan` FROM ((`sumberdaya` `n` join `ekonomi` `e` on((`n`.`id` = `e`.`negara_id`))) join `sosiallingkungan` `s` on((`n`.`id` = `s`.`negara_id`)))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ekonomi`
--
ALTER TABLE `ekonomi`
  ADD PRIMARY KEY (`id_ekonomi`),
  ADD KEY `negara_id` (`negara_id`);

--
-- Indexes for table `sosiallingkungan`
--
ALTER TABLE `sosiallingkungan`
  ADD PRIMARY KEY (`id_sosial`),
  ADD KEY `negara_id` (`negara_id`);

--
-- Indexes for table `sumberdaya`
--
ALTER TABLE `sumberdaya`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ekonomi`
--
ALTER TABLE `ekonomi`
  MODIFY `id_ekonomi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sosiallingkungan`
--
ALTER TABLE `sosiallingkungan`
  MODIFY `id_sosial` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sumberdaya`
--
ALTER TABLE `sumberdaya`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ekonomi`
--
ALTER TABLE `ekonomi`
  ADD CONSTRAINT `ekonomi_ibfk_1` FOREIGN KEY (`negara_id`) REFERENCES `sumberdaya` (`id`);

--
-- Constraints for table `sosiallingkungan`
--
ALTER TABLE `sosiallingkungan`
  ADD CONSTRAINT `sosiallingkungan_ibfk_1` FOREIGN KEY (`negara_id`) REFERENCES `sumberdaya` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
