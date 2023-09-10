-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2023 at 10:46 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wssc_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `clintcomp`
--

CREATE TABLE `clintcomp` (
  `Id` int(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Detale` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clintcomp`
--

INSERT INTO `clintcomp` (`Id`, `Image`, `Address`, `Detale`, `Type`) VALUES
(1, '', 'adress', 'detale', 'type');

-- --------------------------------------------------------

--
-- Table structure for table `complane`
--

CREATE TABLE `complane` (
  `Id` int(255) NOT NULL,
  `CNIC` varchar(255) NOT NULL,
  `Mobile` varchar(255) NOT NULL,
  `LandLine` varchar(255) NOT NULL,
  `Consumer Type` varchar(255) NOT NULL,
  `Zone` varchar(255) NOT NULL,
  `UC` varchar(255) NOT NULL,
  `Area` varchar(255) NOT NULL,
  `Mohalla` varchar(255) NOT NULL,
  `House` varchar(255) NOT NULL,
  `Ploat/House` varchar(255) NOT NULL,
  `Ploat Size` varchar(255) NOT NULL,
  `Street` varchar(255) NOT NULL,
  `Main Road` varchar(255) NOT NULL,
  `Phase` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `File` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complane`
--

INSERT INTO `complane` (`Id`, `CNIC`, `Mobile`, `LandLine`, `Consumer Type`, `Zone`, `UC`, `Area`, `Mohalla`, `House`, `Ploat/House`, `Ploat Size`, `Street`, `Main Road`, `Phase`, `Email`, `File`, `Status`) VALUES
(1, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '', '-', '-', '-', '-', '64fe2217e0c8a', '-'),
(5, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-22', '64fe2290a63bf', '-');

-- --------------------------------------------------------

--
-- Table structure for table `singin`
--

CREATE TABLE `singin` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `lastseen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `singin`
--

INSERT INTO `singin` (`id`, `name`, `number`, `email`, `address`, `password`, `status`, `lastseen`) VALUES
(1, 'Shayan', '02002020', 'kurtlar1215225@gmail.com', 'sdlfjasdfk', '12345678', '', ''),
(2, 'nem', '1234', 'email@email.com', 'add', '2345', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clintcomp`
--
ALTER TABLE `clintcomp`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `complane`
--
ALTER TABLE `complane`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `singin`
--
ALTER TABLE `singin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clintcomp`
--
ALTER TABLE `clintcomp`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complane`
--
ALTER TABLE `complane`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `singin`
--
ALTER TABLE `singin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
