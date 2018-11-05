-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 05 Lis 2018, 10:54
-- Wersja serwera: 10.1.19-MariaDB
-- Wersja PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `bursa`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `grupa`
--

CREATE TABLE `grupa` (
  `ID` int(11) NOT NULL,
  `nazwa` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `id_wychowawcy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `grupa`
--

INSERT INTO `grupa` (`ID`, `nazwa`, `id_wychowawcy`) VALUES
(3, 'a1', 1),
(4, 'b1', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rodzice`
--

CREATE TABLE `rodzice` (
  `ID` int(255) NOT NULL,
  `Imie` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `adres` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `nr_telefonu` varchar(9) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `sytuacja_materialna` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `ID_ucznia` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uczniowie`
--

CREATE TABLE `uczniowie` (
  `ID` int(255) NOT NULL,
  `Imie` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `PESEL` int(11) NOT NULL,
  `data_urodzenia` date NOT NULL,
  `miejsce_urodzenia` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `adres` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `nr_telefonu` varchar(9) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `choroby` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `ID_grupy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `ID` int(255) NOT NULL,
  `login` varchar(30) NOT NULL,
  `haslo` varchar(30) NOT NULL,
  `imie` varchar(30) NOT NULL,
  `nazwisko` varchar(30) NOT NULL,
  `id_grupy` int(11) NOT NULL,
  `typ_konta` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`ID`, `login`, `haslo`, `imie`, `nazwisko`, `id_grupy`, `typ_konta`) VALUES
(9, 'user1', 'user1', 'Marcin', 'Kowal', 3, 0),
(10, 'admin', 'admin', 'Marek', 'Raczkowski', 4, 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `grupa`
--
ALTER TABLE `grupa`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `id_wychowawcy` (`id_wychowawcy`);

--
-- Indexes for table `rodzice`
--
ALTER TABLE `rodzice`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_ucznia` (`ID_ucznia`),
  ADD KEY `ID_ucznia_2` (`ID_ucznia`);

--
-- Indexes for table `uczniowie`
--
ALTER TABLE `uczniowie`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_grupy` (`ID_grupy`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `id_grupy` (`id_grupy`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `grupa`
--
ALTER TABLE `grupa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `rodzice`
--
ALTER TABLE `rodzice`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `uczniowie`
--
ALTER TABLE `uczniowie`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `rodzice`
--
ALTER TABLE `rodzice`
  ADD CONSTRAINT `rodzice_ibfk_1` FOREIGN KEY (`ID_ucznia`) REFERENCES `uczniowie` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `uczniowie`
--
ALTER TABLE `uczniowie`
  ADD CONSTRAINT `uczniowie_ibfk_1` FOREIGN KEY (`ID_grupy`) REFERENCES `grupa` (`ID`);

--
-- Ograniczenia dla tabeli `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_grupy`) REFERENCES `grupa` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
