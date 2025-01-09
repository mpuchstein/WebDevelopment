-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 08, 2025 at 11:25 PM
-- Server version: 10.6.18-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.2.27

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

--
-- Dumping data for table `boards`
--

INSERT INTO `boards` (`id`, `board`) VALUES
(1, 'Allgemeine Todos');

-- --------------------------------------------------------

--
-- Table structure for table `personen`
--

CREATE TABLE `personen` (
  `id` int(11) NOT NULL,
  `vorname` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `passwort` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personen`
--

INSERT INTO `personen` (`id`, `vorname`, `name`, `email`, `passwort`) VALUES
(1, 'Max', 'Mustermann', 'max.mustermann@mustermail.de', 'Pa$$word0'),
(2, 'Moni', 'Mittermeier', 'moni.mm@mustermail.de', 'Pa$$word1');

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

--
-- Dumping data for table `spalten`
--

INSERT INTO `spalten` (`id`, `boardsid`, `sortid`, `spalte`, `spaltenbeschreibung`) VALUES
(1, 1, 100, 'Zu Besprechen', 'Noch zu besprechende Todos'),
(3, 1, 200, 'In Bearbeitung', 'Todos die aktuell bearbeitet werden');

-- --------------------------------------------------------

--
-- Table structure for table `taskarten`
--

CREATE TABLE `taskarten` (
  `id` int(11) NOT NULL,
  `taskart` varchar(50) NOT NULL,
  `icon` varchar(59) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taskarten`
--

INSERT INTO `taskarten` (`id`, `taskart`, `icon`) VALUES
(1, 'Uni', '<i class=\"fa-solid fa-building-columns\"></i>'),
(2, 'Home', '<i class=\"fa-solid fa-house-chimney\"></i>');

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
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `personenid`, `spaltenid`, `taskartenid`, `sortid`, `task`, `notizen`, `erstelldatum`, `erinnerungsdatum`, `erinnerung`, `deadline`, `erledigt`, `geloescht`) VALUES
(1, 2, 1, 1, 100, 'Folien für Vortrag', '                        ', '2025-01-06 00:00:00', '2025-01-13 14:00:00', 0, '2025-01-15 00:00:00', 0, 0),
(2, 2, 3, 2, 50, 'Keller Ausmisten', NULL, '2024-12-01 14:37:00', '2024-12-26 08:00:00', 0, '2025-01-01 00:00:00', 1, 0),
(6, 2, 3, 1, 90, 'Abgabe für Webentwicklung!', 'Ich bin bearbeitet!', '2025-01-08 12:00:00', '0000-00-00 00:00:00', 0, '2025-01-09 00:00:00', 1, 0);

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
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `spaltenid` (`spaltenid`),
  ADD KEY `tasks_ibfk_1` (`personenid`),
  ADD KEY `tasks_ibfk_3` (`taskartenid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boards`
--
ALTER TABLE `boards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personen`
--
ALTER TABLE `personen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `spalten`
--
ALTER TABLE `spalten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `taskarten`
--
ALTER TABLE `taskarten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `spalten`
--
ALTER TABLE `spalten`
  ADD CONSTRAINT `spalten_ibfk_1` FOREIGN KEY (`boardsid`) REFERENCES `boards` (`id`);

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`personenid`) REFERENCES `personen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`spaltenid`) REFERENCES `spalten` (`id`),
  ADD CONSTRAINT `tasks_ibfk_3` FOREIGN KEY (`taskartenid`) REFERENCES `taskarten` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
