-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 02 Maj 2018, 22:32
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
-- Struktura tabeli dla tabeli `companies`
--

CREATE TABLE `companies` (
  `company_id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `discount` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `companies`
--

INSERT INTO `companies` (`company_id`, `company_name`, `address`, `discount`) VALUES
(1, 'Our Company', 'Wierzbowa 3, RzeszÃ³w', 90),
(2, 'Firma Testowa 1', 'Baziowa 5, Rzeszów', 10),
(3, 'FirmaTestowa 2', 'Sosnowa 15, Rzeszów', 15);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `event_log`
--

CREATE TABLE `event_log` (
  `event_id` int(10) UNSIGNED NOT NULL,
  `event_name` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `event_date` datetime DEFAULT NULL,
  `changer` text COLLATE utf8_polish_ci NOT NULL,
  `description` text COLLATE utf8_polish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `event_log`
--

INSERT INTO `event_log` (`event_id`, `event_name`, `event_date`, `changer`, `description`) VALUES
(13, 'Rejestracja', '2018-05-02 19:02:16', '1, a, a', 'Zarejestrowano uÅ¼ytkownika. Login: user Nazwa: User Userzasty E-mail: user@user.user'),
(14, 'Logowanie(bÅ‚Ä™dne)', '2018-05-02 19:18:47', '', 'BÅ‚Ä™dna prÃ³ba zalogowania. Login: user IP: ::1'),
(15, 'Logowanie(bÅ‚Ä™dne)', '2018-05-02 19:19:45', '', 'BÅ‚Ä™dna prÃ³ba zalogowania. Login: user IP: ::1'),
(16, 'Logowanie(poprawne)', '2018-05-02 19:20:11', '', 'Zalogowano uÅ¼ytkownika. Login: a'),
(17, 'Logowanie(poprawne)', '2018-05-02 19:31:35', '', 'Zalogowano uÅ¼ytkownika. Login: user'),
(18, 'Logowanie(poprawne)', '2018-05-02 19:32:08', '', 'Zalogowano uÅ¼ytkownika. Login: a'),
(19, 'Edycja(firma)', '2018-05-02 19:32:21', '1, a, a', 'Edytowano firmÄ™. Nazwa: Our Company(Our Company1), Adres: Wierzbowa 3, RzeszÃ³w(Wierzbowa 3, RzeszÃ³w)'),
(20, 'Rejestracja', '2018-05-02 19:40:46', '1, a, a', 'Zarejestrowano uÅ¼ytkownika. Login: manager, Nazwa: Manager Important, E-mail: manager.important@company.com'),
(21, 'Logowanie(poprawne)', '2018-05-02 20:18:21', '', 'Zalogowano uÅ¼ytkownika. Login: manager'),
(22, 'Logowanie(poprawne)', '2018-05-02 20:18:30', '', 'Zalogowano uÅ¼ytkownika. Login: a'),
(23, 'Edycja(kierownik - zmiana danych)', '2018-05-02 20:27:41', '1, a, a', 'Edytowano kierownika. Login: manager1(manager), Nazwa: Manager Important(Manager Important), E-mail: manager.important@company.com(manager.important@company.com)'),
(24, 'Edycja(kierownik - zmiana stacji)', '2018-05-02 20:28:25', '1, a, a', 'Kierownika (Login: manager1) usuniÄ™to ze stacji (Nazwa: test, Adres: test, test)'),
(25, 'Edycja(kierownik - zmiana stacji)', '2018-05-02 20:34:07', '1, a, a', 'Edytowano kierownika. Login: manager1Nowa stacja: Nazwa: test, Adres: test, test'),
(26, 'Edycja(kierownik - zmiana stacji)', '2018-05-02 20:34:22', '1, a, a', 'Kierownika (Login: manager1) usuniÄ™to ze stacji (Nazwa: test, Adres: test, test)'),
(30, 'Edycja(ceny)', '2018-05-02 21:42:44', '1, a, a', 'Edytowano cenÄ™ na stacji t, t, t. Nowe ceny: PB98 - (), PB95 - 0.02(0.02), ON - (), LPG - 0.04()'),
(31, 'Edycja(uÅ¼ytkownik)', '2018-05-02 21:48:35', '1, a, a', 'Edytowano uÅ¼ytkownika. Login: user1(user), Nazwa: User Userzasty(User Userzasty), E-mail: user@user.user(user@user.user)'),
(32, 'Edycja(uÅ¼ytkownik)', '2018-05-02 21:48:41', '1, a, a', 'Edytowano uÅ¼ytkownika. Login: user(user1), Nazwa: User Userzasty(User Userzasty), E-mail: user@user.user(user@user.user)'),
(33, 'Edycja(stacja)', '2018-05-02 21:57:20', '1, a, a', 'Edytowano stacje. Nazwa: test1(test), Adres: test, test, Podkarpackie(test, test, , Podkarpackie)'),
(34, 'Edycja(stacja)', '2018-05-02 21:57:25', '1, a, a', 'Edytowano stacje. Nazwa: test(test1), Adres: test, test, Podkarpackie(test, test, , Podkarpackie)'),
(35, 'Logowanie(poprawne)', '2018-05-02 22:01:14', '', 'Zalogowano uÅ¼ytkownika. Login: a'),
(36, 'Logowanie(poprawne)', '2018-05-02 22:04:43', '', 'Zalogowano uÅ¼ytkownika. Login: a'),
(37, 'Logowanie(poprawne)', '2018-05-02 22:09:58', '', 'Zalogowano uÅ¼ytkownika. Login: a'),
(38, 'Logowanie(poprawne)', '2018-05-02 22:11:53', '', 'Zalogowano uÅ¼ytkownika. Login: a'),
(39, 'Logowanie(poprawne)', '2018-05-02 22:12:47', '', 'Zalogowano uÅ¼ytkownika. Login: a'),
(40, 'Rejestracja', '2018-05-02 22:13:05', '1, a, a', 'Zarejestrowano uÅ¼ytkownika. Login: m, Nazwa: m, E-mail: m@m.pl'),
(41, 'Logowanie(poprawne)', '2018-05-02 22:17:08', '', 'Zalogowano uÅ¼ytkownika. Login: a'),
(42, 'Rejestracja', '2018-05-02 22:17:21', '1, a, a', 'Zarejestrowano uÅ¼ytkownika. Login: b, Nazwa: b, E-mail: b@b.pl'),
(43, 'Logowanie(poprawne)', '2018-05-02 22:22:34', '', 'Zalogowano uÅ¼ytkownika. Login: a'),
(44, 'Logowanie(poprawne)', '2018-05-02 22:26:21', '', 'Zalogowano uÅ¼ytkownika. Login: a'),
(45, 'Logowanie(poprawne)', '2018-05-02 22:26:54', '', 'Zalogowano uÅ¼ytkownika. Login: a'),
(46, 'Rejestracja', '2018-05-02 22:27:57', '1, a, a', 'Zarejestrowano uÅ¼ytkownika. Login: b, Nazwa: b, E-mail: b@b.pl'),
(47, 'Logowanie(poprawne)', '2018-05-02 22:28:12', '', 'Zalogowano uÅ¼ytkownika. Login: a'),
(48, 'Logowanie(poprawne)', '2018-05-02 22:28:47', '', 'Zalogowano uÅ¼ytkownika. Login: a');

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
(4, 1, '2018-04-30 17:42:27', 1),
(5, 1, '2018-05-02 13:36:55', 1),
(6, 1, '2018-05-02 13:37:18', 1),
(7, 1, '2018-05-02 14:19:19', 1),
(8, 1, '2018-05-02 14:20:07', 1),
(9, 1, '2018-05-02 14:38:01', 1),
(10, 1, '2018-05-02 14:39:38', 1),
(11, 1, '2018-05-02 15:24:19', 1),
(12, 1, '2018-05-02 15:24:55', 1),
(13, 26, '2018-05-02 19:18:47', 0),
(14, 26, '2018-05-02 19:19:45', 0);

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
  `date_of_change` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `prices`
--

INSERT INTO `prices` (`price_id`, `Stations_station_id`, `PB98`, `PB95`, `OIL`, `LPG`, `date_of_change`) VALUES
(7, 4, '0.03', '', '0.06', '0.05', '2018-05-02 21:38:44'),
(8, 5, '', '0.02', '', '0.04', '2018-05-02 21:42:45');

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
(1, 'a', '$2y$10$pfdm9ssnDrQdXlVSSQ0U1OxfSA9fdUYgcP2qB/f0pV68hofjbjdMK', 'a', 'a', '2018-04-09', 4, '$2y$10$YMj1iqu/swReRnHAddNYuu9TuyxKsqLdiqDSolKZtiQrcKYAqhj6G', NULL, 'a'),
(26, 'user', '$2y$10$uOi5g3rZeKCe.mDVzvut4.Mt2ydqTJMrhxOww8rLWr6WRI4dljjlC', 'User Userzasty', 'user@user.user', '2018-05-02', 1, '$2y$10$abPnv16RnMUkYPBVwYDmAOAY19CBaQ1djyP79mQfmli94QqPf3egy', NULL, ''),
(27, 'manager1', '$2y$10$dbS.5cxdLrB5KLAbUZh1J.muRt5yuYSZUQo/KlyybIUe1QorwfhEi', 'Manager Important', 'manager.important@company.com', '2018-05-02', 2, '$2y$10$S9sieQrapT7tnCbXIWKgv.BWRcVtaPU0bl46jNIPyKGBFDsYam0C6', NULL, ''),
(31, 'b', '$2y$10$cVLXidPbRzx0Ti.EzoCHfuVI6ClOjuXm50cY6/2CUHryT//AsfiAK', 'b', 'b@b.pl', '2018-05-02', 1, NULL, NULL, '');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `event_log`
--
ALTER TABLE `event_log`
  ADD PRIMARY KEY (`event_id`);

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
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `Companies_FKIndex1` (`Companies_company_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `event_log`
--
ALTER TABLE `event_log`
  MODIFY `event_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT dla tabeli `logdata`
--
ALTER TABLE `logdata`
  MODIFY `logdata_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `managers`
--
ALTER TABLE `managers`
  MODIFY `manager_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT dla tabeli `prices`
--
ALTER TABLE `prices`
  MODIFY `price_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `stations`
--
ALTER TABLE `stations`
  MODIFY `station_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
