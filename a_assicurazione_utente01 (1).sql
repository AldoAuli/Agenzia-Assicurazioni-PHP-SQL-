-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 16, 2025 alle 17:17
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a_assicurazione_utente01`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `assicurazioni`
--

CREATE TABLE `assicurazioni` (
  `CodAss` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Sede` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `assicurazioni`
--

INSERT INTO `assicurazioni` (`CodAss`, `Nome`, `Sede`) VALUES
(1, 'SARA', 'Torino'),
(2, 'Andrea Lombardo', 'Napoli');

-- --------------------------------------------------------

--
-- Struttura della tabella `auto`
--

CREATE TABLE `auto` (
  `Targa` varchar(10) NOT NULL,
  `Marca` varchar(50) NOT NULL,
  `Cilindrata` int(11) NOT NULL,
  `Potenza` int(11) NOT NULL,
  `CodF` varchar(16) NOT NULL,
  `CodAss` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `auto`
--

INSERT INTO `auto` (`Targa`, `Marca`, `Cilindrata`, `Potenza`, `CodF`, `CodAss`) VALUES
('AB123CD', 'Fiat', 1200, 121, 'CF1234567890', 1),
('CD321EF', 'TOYOTA', 1300, 80, 'CF1234567890', 1),
('EF567GH', 'BMW', 3000, 180, 'CF0987654321', 2),
('HJ 280 FC', 'MERCEDES', 200, 2, 'CF1234567890', 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `autocoinvolte`
--

CREATE TABLE `autocoinvolte` (
  `CodS` int(11) NOT NULL,
  `Targa` varchar(10) NOT NULL,
  `ImportoDelDanno` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `autocoinvolte`
--

INSERT INTO `autocoinvolte` (`CodS`, `Targa`, `ImportoDelDanno`) VALUES
(1, 'AB123CD', 1500.50);

-- --------------------------------------------------------

--
-- Struttura della tabella `marca`
--

CREATE TABLE `marca` (
  `marca` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `marca`
--

INSERT INTO `marca` (`marca`) VALUES
('BMW'),
('AUDI'),
('MERCEDES'),
('FIAT'),
('FORD'),
('RENAULT'),
('TOYOTA'),
('VOLKSWAGEN'),
('OPEL');

-- --------------------------------------------------------

--
-- Struttura della tabella `proprietari`
--

CREATE TABLE `proprietari` (
  `CodF` varchar(16) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Residenza` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `proprietari`
--

INSERT INTO `proprietari` (`CodF`, `Nome`, `Residenza`) VALUES
('CF0987654321', 'Andrea Lombardo', 'Napoli'),
('CF1234567890', 'Mario Rossi', 'Roma');

-- --------------------------------------------------------

--
-- Struttura della tabella `sinistri`
--

CREATE TABLE `sinistri` (
  `CodS` int(11) NOT NULL,
  `Località` varchar(100) NOT NULL,
  `Data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `sinistri`
--

INSERT INTO `sinistri` (`CodS`, `Località`, `Data`) VALUES
(1, 'Roma', '2002-01-20');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `assicurazioni`
--
ALTER TABLE `assicurazioni`
  ADD PRIMARY KEY (`CodAss`);

--
-- Indici per le tabelle `auto`
--
ALTER TABLE `auto`
  ADD PRIMARY KEY (`Targa`),
  ADD KEY `CodF` (`CodF`),
  ADD KEY `CodAss` (`CodAss`);

--
-- Indici per le tabelle `autocoinvolte`
--
ALTER TABLE `autocoinvolte`
  ADD PRIMARY KEY (`CodS`,`Targa`),
  ADD KEY `Targa` (`Targa`);

--
-- Indici per le tabelle `proprietari`
--
ALTER TABLE `proprietari`
  ADD PRIMARY KEY (`CodF`);

--
-- Indici per le tabelle `sinistri`
--
ALTER TABLE `sinistri`
  ADD PRIMARY KEY (`CodS`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `assicurazioni`
--
ALTER TABLE `assicurazioni`
  MODIFY `CodAss` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `sinistri`
--
ALTER TABLE `sinistri`
  MODIFY `CodS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `auto`
--
ALTER TABLE `auto`
  ADD CONSTRAINT `auto_ibfk_1` FOREIGN KEY (`CodF`) REFERENCES `proprietari` (`CodF`),
  ADD CONSTRAINT `auto_ibfk_2` FOREIGN KEY (`CodAss`) REFERENCES `assicurazioni` (`CodAss`);

--
-- Limiti per la tabella `autocoinvolte`
--
ALTER TABLE `autocoinvolte`
  ADD CONSTRAINT `autocoinvolte_ibfk_1` FOREIGN KEY (`CodS`) REFERENCES `sinistri` (`CodS`),
  ADD CONSTRAINT `autocoinvolte_ibfk_2` FOREIGN KEY (`Targa`) REFERENCES `auto` (`Targa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
