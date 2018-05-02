-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 01 Maj 2018, 00:12
-- Wersja serwera: 10.1.30-MariaDB
-- Wersja PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `stations_db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `discount`
--

CREATE TABLE `companies` (
  `company_id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `discount` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
--
-- Zrzut danych tabeli `prices`
--

INSERT INTO `companies` (`company_id`, `company_name`, `address`, `discount`) VALUES
(1, 'Our Company', 'Wierzbowa 3, Rzeszów', '90'),
(2, 'Firma Testowa 1', 'Baziowa 5, Rzeszów', '10'),
(3, 'FirmaTestowa 2', 'Sosnowa 15, Rzeszów', '15');
-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `event_log`
--

CREATE TABLE `event_log` (
  `event_id` int(10) UNSIGNED NOT NULL,
  `Users_user_id` int(10) UNSIGNED NOT NULL,
  `event_name` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `event_date` datetime DEFAULT NULL,
  `description` text COLLATE utf8_polish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `logdata`
--

CREATE TABLE `logdata` (
  `logdata_id` int(10) UNSIGNED NOT NULL,
  `Users_user_id` int(10) UNSIGNED NOT NULL,
  `log_date` datetime DEFAULT NULL,
  `valid` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `logdata`
--

INSERT INTO `logdata` (`logdata_id`, `Users_user_id`, `log_date`, `valid`) VALUES
(1, 1, '2018-04-30 14:57:52', 1),
(2, 1, '2018-04-30 15:50:07', 1),
(3, 1, '2018-04-30 17:40:26', 1),
(4, 1, '2018-04-30 17:42:27', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `managers`
--

CREATE TABLE `managers` (
  `manager_id` int(10) UNSIGNED NOT NULL,
  `Stations_station_id` int(10) UNSIGNED NOT NULL,
  `Users_user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `managers`
--

INSERT INTO `managers` (`manager_id`, `Stations_station_id`, `Users_user_id`) VALUES
(1, 4, 4),
(8, 4, 5),
(9, 4, 7);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `prices`
--

CREATE TABLE `prices` (
  `price_id` int(10) UNSIGNED NOT NULL,
  `Stations_station_id` int(10) UNSIGNED NOT NULL,
  `PB98` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `PB95` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `OIL` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `LPG` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `date_of_change` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `prices`
--

INSERT INTO `prices` (`price_id`, `Stations_station_id`, `PB98`, `PB95`, `OIL`, `LPG`, `date_of_change`) VALUES
(7, 4, '0.03', '', '', '', '2018-05-01');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `stations`
--

CREATE TABLE `stations` (
  `station_id` int(10) UNSIGNED NOT NULL,
  `station_name` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `voivodeship` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `stations`
--

INSERT INTO `stations` (`station_id`, `station_name`, `voivodeship`, `city`, `street`) VALUES
(4, 'test', 'Podkarpackie', 'test', 'test'),
(5, 't', 'Podkarpackie', 't', 't');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `login` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `passwd` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `register_date` date DEFAULT NULL,
  `group_id` int(10) UNSIGNED DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `Companies_company_id` int(10) UNSIGNED DEFAULT NULL,
  `info` text COLLATE utf8_polish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`user_id`, `login`, `passwd`, `name`, `mail`, `register_date`, `group_id`, `token`, `Companies_company_id`, `info`) VALUES
(1, 'a', '$2y$10$pfdm9ssnDrQdXlVSSQ0U1OxfSA9fdUYgcP2qB/f0pV68hofjbjdMK', 'a', 'a', '2018-04-09', 4, '$2y$10$34Ocda5LvfuN/Dzp0XlzMe90IkWp1UcmSO9PRzqUm/LCZTBoeI9HW', NULL, 'a'),
(4, '1', '1', '11', '1@1.pl', '0000-00-00', 2, '1', '1', '0'),
(7, '4', '4', '4', '4@4.pl', '0000-00-00', 2, '4', '1', '0'),
(9, '6', '6', '65', '6@6.pl', '0000-00-00', 2, '6', '1', '0'),
(11, '8', '8', '8', '8@8.pl', '0000-00-00', 1, '8', '2', '0'),
(12, '9', '9', '9', '9@9.pl', '0000-00-00', 1, '9', '2', '0');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `discount`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `event_log`
--
ALTER TABLE `event_log`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `Event_log_FKIndex1` (`Users_user_id`);

--
-- Indexes for table `logdata`
--
ALTER TABLE `logdata`
  ADD PRIMARY KEY (`logdata_id`),
  ADD KEY `Logdata_FKIndex1` (`Users_user_id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`manager_id`),
  ADD KEY `Managers_FKIndex1` (`Users_user_id`),
  ADD KEY `Managers_FKIndex2` (`Stations_station_id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`price_id`),
  ADD KEY `Prices_FKIndex1` (`Stations_station_id`);

--
-- Indexes for table `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`station_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`)
  ADD KEY `Companies_FKIndex1` (`Companies_company_id`);;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `discount`
--
ALTER TABLE `Companies`
  MODIFY `company_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `event_log`
--
ALTER TABLE `event_log`
  MODIFY `event_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `logdata`
--
ALTER TABLE `logdata`
  MODIFY `logdata_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `managers`
--
ALTER TABLE `managers`
  MODIFY `manager_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `prices`
--
ALTER TABLE `prices`
  MODIFY `price_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `stations`
--
ALTER TABLE `stations`
  MODIFY `station_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
