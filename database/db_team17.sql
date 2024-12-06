SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `db_team17`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `boards`
--

CREATE TABLE `boards` (
                          `id` int(11) NOT NULL,
                          `board` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `personen`
--

CREATE TABLE `personen` (
                            `id` int(11) NOT NULL,
                            `vorname` varchar(100) NOT NULL,
                            `name` varchar(100) NOT NULL,
                            `email` varchar(100) NOT NULL,
                            `passwort` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `spalten`
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
-- Tabellenstruktur für Tabelle `taskarten`
--

CREATE TABLE `taskarten` (
                             `id` int(11) NOT NULL,
                             `taskart` varchar(50) NOT NULL,
                             `icon` varchar(59) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tasks`
--

CREATE TABLE `tasks` (
                         `id` int(11) NOT NULL,
                         `personenid` int(11) NOT NULL,
                         `spaltenid` int(11) NOT NULL,
                         `taskartenid` int(11) NOT NULL,
                         `sortid` int(11) NOT NULL,
                         `task` varchar(100) NOT NULL,
                         `notizen` text DEFAULT NULL,
                         `erstelldatum` datetime NOT NULL,
                         `erinnerungsdatum` datetime NOT NULL,
                         `erinnerung` smallint(1) NOT NULL,
                         `deadline` datetime NOT NULL,
                         `erledigt` smallint(1) NOT NULL,
                         `geloescht` smallint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `boards`
--
ALTER TABLE `boards`
    ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `personen`
--
ALTER TABLE `personen`
    ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `spalten`
--
ALTER TABLE `spalten`
    ADD PRIMARY KEY (`id`),
  ADD KEY `spalten_ibfk_1` (`boardsid`);

--
-- Indizes für die Tabelle `taskarten`
--
ALTER TABLE `taskarten`
    ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `tasks`
--
ALTER TABLE `tasks`
    ADD PRIMARY KEY (`id`),
  ADD KEY `spaltenid` (`spaltenid`),
  ADD KEY `tasks_ibfk_1` (`personenid`),
  ADD KEY `tasks_ibfk_3` (`taskartenid`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `boards`
--
ALTER TABLE `boards`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `personen`
--
ALTER TABLE `personen`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `spalten`
--
ALTER TABLE `spalten`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `taskarten`
--
ALTER TABLE `taskarten`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `tasks`
--
ALTER TABLE `tasks`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `spalten`
--
ALTER TABLE `spalten`
    ADD CONSTRAINT `spalten_ibfk_1` FOREIGN KEY (`boardsid`) REFERENCES `boards` (`id`);

--
-- Constraints der Tabelle `tasks`
--
ALTER TABLE `tasks`
    ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`personenid`) REFERENCES `personen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`spaltenid`) REFERENCES `spalten` (`id`),
  ADD CONSTRAINT `tasks_ibfk_3` FOREIGN KEY (`taskartenid`) REFERENCES `taskarten` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
