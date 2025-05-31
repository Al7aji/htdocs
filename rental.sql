-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 31 mei 2025 om 14:15
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `account`
--

CREATE TABLE `account` (
  `Account_ID` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `account`
--

INSERT INTO `account` (`Account_ID`, `FirstName`, `LastName`, `password`, `Email`) VALUES
(1, '', '', '$2y$14$x8AvRdeoEp2ymdKd0gY5/usJPkmntMUDbokkEbD9bot6wsq2PT2qi', 'test@gmail.com');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `admins`
--

CREATE TABLE `admins` (
  `Admin_ID` int(11) NOT NULL,
  `Account_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bookings`
--

CREATE TABLE `bookings` (
  `Booking_ID` int(11) NOT NULL,
  `Customer_ID` int(11) DEFAULT NULL,
  `Cars_ID` int(11) DEFAULT NULL,
  `PickupCity` varchar(50) DEFAULT NULL,
  `PickupDate` date DEFAULT NULL,
  `PickupTime` time DEFAULT NULL,
  `DropoffCity` varchar(50) DEFAULT NULL,
  `DropoffDate` date DEFAULT NULL,
  `DropoffTime` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cars`
--

CREATE TABLE `cars` (
  `Cars_ID` int(11) NOT NULL,
  `PricePerDay` decimal(10,2) DEFAULT NULL,
  `Model` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `CarGear` varchar(55) NOT NULL,
  `Capacity` int(11) NOT NULL,
  `Liters` int(11) NOT NULL,
  `Status` enum('Available','Rented','Maintenance') DEFAULT 'Available',
  `Image` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `cars`
--

INSERT INTO `cars` (`Cars_ID`, `PricePerDay`, `Model`, `type`, `CarGear`, `Capacity`, `Liters`, `Status`, `Image`) VALUES
(1, 99.00, 'Koenigegg', 'sport', 'Manual', 2, 90, 'Available', 'car (0).svg'),
(2, 80.00, 'Nissan GT - R', 'sport', 'Manual', 2, 80, 'Available', 'car (1).svg'),
(3, 96.00, 'Rolls - Royce', 'Sedan', 'Manual', 4, 70, 'Available', 'car (2).svg'),
(4, 80.00, 'Nissan GT - R', 'sport', 'Manual', 2, 80, 'Available', 'car (1).svg'),
(6, 72.00, 'All New Rush', 'SUV', 'Manual', 6, 70, 'Available', 'car (4).svg'),
(7, 80.00, 'CR  - V', 'SUV', 'Manual', 6, 80, 'Available', 'car (5).svg'),
(8, 74.00, 'All New Terios', 'SUV', 'Manual', 6, 90, 'Available', 'car (6).svg'),
(9, 80.00, 'CR  - V', 'SUV', 'Manual', 6, 80, 'Available', 'car (7).svg'),
(10, 76.00, 'MG ZX Exclusice', 'Hatchback', 'Manual', 4, 70, 'Available', 'car (8).svg'),
(11, 80.00, 'New MG ZS', 'SUV', 'Manual', 6, 80, 'Available', 'car (9).svg'),
(12, 74.00, 'MG ZX Exclusice', 'Hatchback', 'Manual', 4, 70, 'Available', 'car (8).svg'),
(13, NULL, 'New MG ZS', 'SUV', 'Manual', 6, 80, 'Available', 'car (11).svg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `customer`
--

CREATE TABLE `customer` (
  `Customer_ID` int(11) NOT NULL,
  `Account_ID` int(11) DEFAULT NULL,
  `FirstName` varchar(100) DEFAULT NULL,
  `LastName` varchar(100) DEFAULT NULL,
  `Street` varchar(100) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `Zip` varchar(20) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reviews`
--

CREATE TABLE `reviews` (
  `Review_ID` int(11) NOT NULL,
  `Customer_ID` int(11) DEFAULT NULL,
  `Car_ID` int(11) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL CHECK (`Rating` >= 1 and `Rating` <= 5),
  `Comment` text DEFAULT NULL,
  `ReviewDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`Account_ID`);

--
-- Indexen voor tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`Admin_ID`),
  ADD KEY `Account_ID` (`Account_ID`);

--
-- Indexen voor tabel `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`Booking_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`),
  ADD KEY `Cars_ID` (`Cars_ID`);

--
-- Indexen voor tabel `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`Cars_ID`);

--
-- Indexen voor tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_ID`),
  ADD KEY `Account_ID` (`Account_ID`);

--
-- Indexen voor tabel `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`Review_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`),
  ADD KEY `Car_ID` (`Car_ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `account`
--
ALTER TABLE `account`
  MODIFY `Account_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `Admin_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `bookings`
--
ALTER TABLE `bookings`
  MODIFY `Booking_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `cars`
--
ALTER TABLE `cars`
  MODIFY `Cars_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `reviews`
--
ALTER TABLE `reviews`
  MODIFY `Review_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`Account_ID`) REFERENCES `account` (`Account_ID`) ON DELETE CASCADE;

--
-- Beperkingen voor tabel `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`Cars_ID`) REFERENCES `cars` (`Cars_ID`) ON DELETE SET NULL;

--
-- Beperkingen voor tabel `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`Account_ID`) REFERENCES `account` (`Account_ID`) ON DELETE CASCADE;

--
-- Beperkingen voor tabel `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`Car_ID`) REFERENCES `cars` (`Cars_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
