-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 04, 2025 at 07:36 PM
-- Server version: 11.6.2-MariaDB
-- PHP Version: 8.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_team17`
--

-- --------------------------------------------------------

--
-- Table structure for table `boards`
--

CREATE TABLE `boards` (
  `id` int(11) NOT NULL,
  `board` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personen`
--

CREATE TABLE `personen` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `plevel` int(11) NOT NULL DEFAULT 1000,
  `defboard` int(11) NOT NULL,
  `vorname` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `passwort` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spalten`
--

CREATE TABLE `spalten` (
  `id` int(11) NOT NULL,
  `boardsid` int(11) NOT NULL,
  `sortid` int(11) DEFAULT NULL,
  `spalte` varchar(50) NOT NULL,
  `spaltenbeschreibung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taskarten`
--

CREATE TABLE `taskarten` (
  `id` int(11) NOT NULL,
  `taskart` varchar(50) NOT NULL,
  `icon` varchar(59) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `personenid` int(11) NOT NULL,
  `spaltenid` int(11) NOT NULL,
  `taskartenid` int(11) NOT NULL,
  `sortid` int(11) NOT NULL,
  `task` varchar(100) NOT NULL,
  `notizen` text DEFAULT NULL,
  `erstelldatum` datetime NOT NULL DEFAULT current_timestamp(),
  `erinnerungsdatum` datetime NOT NULL,
  `erinnerung` smallint(1) NOT NULL,
  `deadline` datetime NOT NULL,
  `erledigt` smallint(1) NOT NULL DEFAULT 0,
  `geloescht` smallint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boards`
--
ALTER TABLE `boards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personen`
--
ALTER TABLE `personen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`) USING HASH;

--
-- Indexes for table `spalten`
--
ALTER TABLE `spalten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `spalten_ibfk_1` (`boardsid`);

--
-- Indexes for table `taskarten`
--
ALTER TABLE `taskarten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_ibfk_1` (`personenid`),
  ADD KEY `tasks_ibfk_3` (`taskartenid`),
  ADD KEY `tasks_ibfk_2` (`spaltenid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boards`
--
ALTER TABLE `boards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personen`
--
ALTER TABLE `personen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spalten`
--
ALTER TABLE `spalten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taskarten`
--
ALTER TABLE `taskarten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `spalten`
--
ALTER TABLE `spalten`
  ADD CONSTRAINT `spalten_ibfk_1` FOREIGN KEY (`boardsid`) REFERENCES `boards` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
