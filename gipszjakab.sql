-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2017 at 02:11 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gipszjakab`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogbejegyzes`
--

CREATE TABLE IF NOT EXISTS `blogbejegyzes` (
  `id` int(11) NOT NULL,
  `tartalom` text COLLATE utf8_hungarian_ci NOT NULL,
  `nev` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `datum` date NOT NULL,
  `szerzo` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `aktivitas` varchar(16) COLLATE utf8_hungarian_ci NOT NULL DEFAULT 'inaktiv'
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `blogbejegyzes`
--

INSERT INTO `blogbejegyzes` (`id`, `tartalom`, `nev`, `datum`, `szerzo`, `aktivitas`) VALUES
(15, 'awtv3s fesr gsert ', 'sert sert sert sert ', '2017-11-09', 'sert esrt ser tsert esrt ', 'inaktiv');

-- --------------------------------------------------------

--
-- Table structure for table `felhasznalok`
--

CREATE TABLE IF NOT EXISTS `felhasznalok` (
  `f_id` int(11) NOT NULL,
  `f_nev` varchar(512) COLLATE utf8_hungarian_ci NOT NULL,
  `f_email` varchar(512) COLLATE utf8_hungarian_ci NOT NULL,
  `f_jelszo` varchar(512) COLLATE utf8_hungarian_ci NOT NULL,
  `f_jogosultsag` varchar(128) COLLATE utf8_hungarian_ci NOT NULL,
  `f_aktivitas` varchar(20) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `felhasznalok`
--

INSERT INTO `felhasznalok` (`f_id`, `f_nev`, `f_email`, `f_jelszo`, `f_jogosultsag`, `f_aktivitas`) VALUES
(1, 'tomika', 'tomika@gmail.com', '12345', 'user', 'aktiv'),
(2, 'admin', 'admin@gmail.com', '12345', 'admin', 'aktiv'),
(3, 'Gipsz Jakab', 'mrgipsz@gmail.com', '12345', 'user2', 'aktiv');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogbejegyzes`
--
ALTER TABLE `blogbejegyzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`f_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogbejegyzes`
--
ALTER TABLE `blogbejegyzes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
