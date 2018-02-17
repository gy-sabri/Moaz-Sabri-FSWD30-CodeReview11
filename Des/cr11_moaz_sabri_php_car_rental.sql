-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 17. Feb 2018 um 16:39
-- Server-Version: 10.1.30-MariaDB
-- PHP-Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr11_moaz_sabri_php_car_rental`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cars`
--

CREATE TABLE `cars` (
  `carsId` smallint(6) NOT NULL,
  `fk_officeId` smallint(6) NOT NULL,
  `model` varchar(30) NOT NULL,
  `status` enum('available','reserved') DEFAULT NULL,
  `url_img` varchar(255) NOT NULL,
  `location_path` varchar(255) NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `cars`
--

INSERT INTO `cars` (`carsId`, `fk_officeId`, `model`, `status`, `url_img`, `location_path`, `location`) VALUES
(1, 1, 'Renault Kadjar Energy TCe 130', 'reserved', 'https://cache.willhaben.at/mmo/7/235/183/617_1113322491_hoved.jpg', '', '1210 Wien, 21. Bezirk, Floridsdorf'),
(2, 2, 'VW Golf Cabriolet Sky BMT 1,2 ', 'available', 'https://cache.willhaben.at/mmo/6/241/214/056_-497689829_hoved.jpg', '', '1220 Wien, 22. Bezirk, Donaustadt'),
(3, 3, 'Mercedes C-Klasse', 'available', 'https://cdn.pixabay.com/photo/2017/10/18/20/32/mercedes-c63-2865402__340.jpg', '', 'Kettenbrückengasse 23, 1050 Wien'),
(4, 1, 'Audi A4 2.0', 'reserved', 'https://cache.willhaben.at/mmo/6/241/212/586_181601324_hoved.jpg', '', '1100 Wien, 10. Bezirk, Favoriten'),
(5, 5, 'BMW X5 3.0d 7 Sitzer', 'available', 'https://cache.willhaben.at/mmo/9/241/212/049_-1040114738_hoved.jpg', '', '1170 Wien, 17. Bezirk, Hernals'),
(6, 5, 'VW Touareg 2,5 R5 TDI', 'available', 'https://cache.willhaben.at/mmo/6/241/212/076_-1607209304_hoved.jpg', '', '1100 Wien, 10. Bezirk, Favoriten'),
(7, 4, 'Opel Zafira 1,9 CDTI ', 'reserved', 'https://cache.willhaben.at/mmo/0/235/178/320_1399511885_hoved.jpg', '', '1110 Wien, 11. Bezirk, Simmering'),
(8, 2, 'Peugeot 508 ALL BHDI180 EAT6', 'available', 'https://cache.willhaben.at/mmo/4/241/211/564_134604430_hoved.jpg', '', '1110 Wien, 11. Bezirk, Simmering'),
(9, 3, 'Mini Countryman Cooper SD ALL4', 'available', 'https://cache.willhaben.at/mmo/7/241/210/157_684985367_hoved.jpg', '', '1130 Wien, 13. Bezirk, Hietzing'),
(10, 5, 'Audi A4 1,9 TDI', 'available', 'https://cache.willhaben.at/mmo/4/241/209/694_596566175_hoved.jpg', '', '1100 Wien, 10. Bezirk, Favoriten'),
(11, 2, 'Mercedes-Benz Viano 2,1 ', 'available', 'https://cache.willhaben.at/mmo/1/241/209/431_32954368_hoved.jpg', '', '1220 Wien, 22. Bezirk, Donaustadt'),
(12, 4, 'KIA Picanto 1,1i Advantage', 'reserved', 'https://cache.willhaben.at/mmo/4/241/209/434_636676814_hoved.jpg', '', '1220 Wien, 22. Bezirk, Donaustadt'),
(13, 1, 'Seat Ibiza SportCoupé Chili ', 'available', 'https://cache.willhaben.at/mmo/5/241/209/435_-866201081_hoved.jpg', '', '1220 Wien, 22. Bezirk, Donaustadt'),
(14, 1, 'Peugeot 308 SW 1,6 16V', 'reserved', 'https://cache.willhaben.at/mmo/9/241/207/949_284590590_hoved.jpg', '', '1210 Wien, 21. Bezirk, Floridsdorf');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `offices`
--

CREATE TABLE `offices` (
  `officesId` smallint(6) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `offices`
--

INSERT INTO `offices` (`officesId`, `name`, `address`) VALUES
(1, 'Peugeot', 'Triester Str. 50A, 1100 Wien'),
(2, 'Hertz Autovermietung', 'Kärntner Ring 17, 1010 Wien'),
(3, 'Elite Rent-a-Car GmbH', 'Biberstraße 9, 1010 Wien'),
(4, 'Cash4Car', 'Urban-Loritz-Platz 3, 1070 Wie'),
(5, 'Lucky Car - DER Spezialist', 'Davidgasse 50, 1100 Wien');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `orders`
--

CREATE TABLE `orders` (
  `ordersId` smallint(6) NOT NULL,
  `fk_userId` smallint(6) DEFAULT NULL,
  `fk_officesId` smallint(6) DEFAULT NULL,
  `fk_carsId` smallint(6) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `orders`
--

INSERT INTO `orders` (`ordersId`, `fk_userId`, `fk_officesId`, `fk_carsId`, `create_date`) VALUES
(125, 2, NULL, 7, '2018-02-17 15:19:04'),
(126, 2, NULL, 7, '2018-02-17 15:21:09'),
(127, 2, NULL, 7, '2018-02-17 15:21:12'),
(128, 2, NULL, 7, '2018-02-17 15:21:38'),
(129, 2, NULL, 12, '2018-02-17 15:21:59'),
(132, 2, NULL, 14, '2018-02-17 15:26:41');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `userId` smallint(6) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `password_user` varchar(256) DEFAULT NULL,
  `email_user` varchar(30) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` enum('other','female','male') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`userId`, `first_name`, `last_name`, `password_user`, `email_user`, `birth_date`, `gender`) VALUES
(1, 'moaz', 'sabri', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'm@m.cc', '2000-03-17', 'male'),
(2, 'moaz', 'sabri', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'q@q.q', '1998-08-25', 'female'),
(3, 'moaz', 'sabri', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'abri@hot.com', '1997-03-27', 'female'),
(4, 'moaz', 'sabri', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'd@d.d', '1991-05-15', 'female'),
(5, 'moaz', 'sabri', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'm@m.y', '1989-06-15', 'male');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`carsId`),
  ADD KEY `fk_officeId` (`fk_officeId`);

--
-- Indizes für die Tabelle `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`officesId`);

--
-- Indizes für die Tabelle `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ordersId`),
  ADD KEY `fk_userId` (`fk_userId`),
  ADD KEY `fk_officesId` (`fk_officesId`),
  ADD KEY `fk_carsId` (`fk_carsId`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `email_user` (`email_user`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `cars`
--
ALTER TABLE `cars`
  MODIFY `carsId` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT für Tabelle `offices`
--
ALTER TABLE `offices`
  MODIFY `officesId` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `orders`
--
ALTER TABLE `orders`
  MODIFY `ordersId` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `userId` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`fk_officeId`) REFERENCES `offices` (`officesId`);

--
-- Constraints der Tabelle `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`fk_userId`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`fk_officesId`) REFERENCES `offices` (`officesId`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`fk_userId`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`fk_officesId`) REFERENCES `offices` (`officesId`),
  ADD CONSTRAINT `orders_ibfk_5` FOREIGN KEY (`fk_carsId`) REFERENCES `cars` (`carsId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
