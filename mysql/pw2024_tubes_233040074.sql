-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 07, 2024 at 05:05 PM
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
-- Database: `pw2024_tubes_233040074`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'matic'),
(2, 'manual');

-- --------------------------------------------------------

--
-- Table structure for table `spesifikasi`
--

CREATE TABLE `spesifikasi` (
  `id` int NOT NULL,
  `Merek` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Harga` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Launching` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Mesin` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Deskripsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Gambar` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kategori_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `spesifikasi`
--

INSERT INTO `spesifikasi` (`id`, `Merek`, `Harga`, `Launching`, `Mesin`, `Deskripsi`, `Gambar`, `kategori_id`) VALUES
(1, 'Aston Martin ', 'Rp 4,30 Milyar', '2021', '4735 cc', 'Aston Martin Vantage AMR A Fierce New Breed', '6662ef14b1298.jpg', 1),
(2, 'Aston Martin', 'Rp 4,50 Milyar', '2019', '4735 cc', 'Aston Martin Vantage V8 S Race Bred Dynamism', 'ASTON MARTIN V8 Vantage.jpg\r\n', 1),
(3, 'Aston Martin', 'Rp 5,20 Milyar', '2019', '5935 cc', 'Aston Martin Vantage V12 S Roadster Pure Sports', '2021 Aston Martin Vantage Roadster.jpg', 1),
(4, 'Aston Martin', 'Rp 6,00 Milyar', '2019', '5935 cc', 'Aston Martin Vantage V12 S Pure Performance', 'Aston Martin Cars 2.jpg\r\n', 2),
(24, 'Aston Martin DB11', 'Rp 7,70 Milyar', '2019', '5198cc', 'Aston Martin DB11 A Design Evolution', '6662f19b66964.jpg', 1),
(25, 'Aston Martin Rapide S', 'Rp 8,10 Milyar', '2019', '5935 cc', 'Aston Martin Rapide S Luxury', '6662f2db0c35c.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(4, 'nur', '$2y$10$NJ/l00DIV523nCYlX7mNZuQZuGMskUTvbiGuG19YILrohHWXA.e9a'),
(5, 'admin', '$2y$10$sljQLRebcFZg24cbDwjbqOdSI7h.zavOaAKnRrmbfenttk6qFSjl.'),
(6, 'nada', '$2y$10$/3pC5vBEVML9zn7qCnt1J.huzjTkvAF67bm8fdCrbqH0DD1kpi.CW'),
(7, 'nurf', '$2y$10$O8JI6FWWxecztTgX3RzbD.DEUg.GaOCQMf/j6pL6FFg.gGpywNfMe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spesifikasi`
--
ALTER TABLE `spesifikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `spesifikasi`
--
ALTER TABLE `spesifikasi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `spesifikasi`
--
ALTER TABLE `spesifikasi`
  ADD CONSTRAINT `spesifikasi_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
