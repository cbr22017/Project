-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2019 at 10:40 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `metatokowoof`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(255) NOT NULL,
  `productName` varchar(60) NOT NULL,
  `productPrice` int(255) NOT NULL,
  `productImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `productName`, `productPrice`, `productImage`) VALUES
(1, 'Anjing Beagle', 4000000, 'assets/images/Jenis-Anjing-Beagle.jpg'),
(2, 'Anjing Chihuahua', 5000000, 'assets/images/Jenis-Anjing-Chihuahua-700x505.jpg'),
(3, 'Anjing Bichon Havanais', 8000000, 'assets/images/Jenis-Anjing-Bichon-Havanais.jpg'),
(4, 'Anjing Labrador Retriever', 10000000, 'assets/images/Jenis-Anjing-Labrador-Retriever-700x483.jpg'),
(5, 'Anjing Pug', 7000000, 'assets/images/Jenis-Anjing-Pug-700x534.jpg'),
(6, 'Anjing Siberian Husky', 9000000, 'assets/images/Jenis-Anjing-Siberian-Husky-700x472.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'Terra', '$2y$10$PCWhLIwBThK7.hp/e7u3Z.xWNWez4v.lOG4AsXO2bverx7r9RINXy'),
(2, 'Popipipopop', '$2y$10$hTcvn1UWypqwSExrIPZUeeEIt5TxA3pV6lTufB083v5itWGsERtla'),
(3, 'Angelbert', '$2y$10$sJgAMcBocTQ/dWYUx.BP7u6Gv6nIk72hwCrUX3zsFwXUEl07MSsQC'),
(4, 'Elgreat', '$2y$10$paSEsJxWCUCdGT9dvZbEQervTZ5eWgWmYF4uf18/X8w5ms3PHkVq2'),
(5, 'Steven', '$2y$10$aZ44f5XbN7YUEASKhvKHq.40sV.E2gNlC/76inG6Tx.VSCRJWOFpO'),
(6, 'Boobi', '$2y$10$CZL.1vvOJzXjYt3srS7XMuQILe/kPOGCMaO5Imwt9Oo3TjssNkEDy'),
(7, 'Tuyul', '$2y$10$Ckjv9DnBBxrfknnb0u.PHOYksMb5natBLoLOQ.mfQWSjMGhrH8M3m'),
(9, 'admin', '$2y$10$DfjyYWe6l8pOtKsMw/yb8.SMeqn6bslR3gzW8kfY/thaVvoBE.a4y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
