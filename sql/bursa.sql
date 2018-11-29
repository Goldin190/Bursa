-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 29 Lis 2018, 02:11
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
(4, 'b1', 2),
(5, 'c1', 11);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rodzenstwo`
--

CREATE TABLE `rodzenstwo` (
  `id` int(11) NOT NULL,
  `imie` text NOT NULL,
  `nazwisko` text NOT NULL,
  `zajecie` text NOT NULL,
  `plec` text NOT NULL,
  `uczen_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `rodzenstwo`
--

INSERT INTO `rodzenstwo` (`id`, `imie`, `nazwisko`, `zajecie`, `plec`, `uczen_id`) VALUES
(4, 'Anna', 'Kamikaze', 'KsiÄ™gowa', 'siostra', 12),
(5, 'Marcin', 'Kamal', 'Uczy siÄ™', 'brat', 12);

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

--
-- Zrzut danych tabeli `rodzice`
--

INSERT INTO `rodzice` (`ID`, `Imie`, `Nazwisko`, `adres`, `nr_telefonu`, `sytuacja_materialna`, `ID_ucznia`) VALUES
(1, 'Marcin', 'Kalaman', 'bezdomny lol', '509442312', 'no kutfa słaba', 2),
(2, 'Marianna', 'Kalaman', 'Fajny', '876432573', 'Lepsza od starego LOL XDDD', 2),
(3, 'abab', 'ababa', 'adfsadsf', '142341234', 'adfadfsa', 11),
(4, 'ababaaa', 'bababaaaaaa', 'asdfadsf', '12341234', 'asdfadfsadsf', 11),
(5, 'Marianna', 'Grande', 'Warszawa ul.Fajna 25/1', '987456379', 'No niewiem w sumie xDDD', 12),
(6, 'Marian', 'Grande', 'Lublin ul.Fajniejsza 26/2', '836475684', 'TeÅ¼ Tak Å›rednio wiem xDDD', 12);

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
  `szkola` text NOT NULL,
  `adres` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `nr_telefonu` varchar(9) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `choroby` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `ID_grupy` int(11) NOT NULL,
  `nr_pokoju` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `uczniowie`
--

INSERT INTO `uczniowie` (`ID`, `Imie`, `Nazwisko`, `PESEL`, `data_urodzenia`, `miejsce_urodzenia`, `szkola`, `adres`, `nr_telefonu`, `choroby`, `ID_grupy`, `nr_pokoju`) VALUES
(1, 'Maciej', 'Nowowiejski', 1237465970, '1999-11-07', 'Polska Olsztyn', 'Zespó? szkó? ekonomicznych w olsztynie im. Miko?aja kopernika', 'Nowowiejskiego 25/6', '123586745', 'cukrzyca', 3, 2),
(2, 'Damian', 'Kolegan', 1903020570, '2008-11-30', 'Uran Kazahstan', 'sp. 10 w Kazahstanie', 'Anakonda 23/6', '294857613', NULL, 4, 1),
(3, 'Marcin', 'Nowakowski', 1237465970, '1999-11-07', 'Polska Olsztyn', 'LO 21 w Olsztynie', 'Warszawska 5/6', '123588745', 'Anemia', 5, 3),
(5, 'kapp', 'kke', 2147483647, '0000-00-00', 'warszawa', 'zse', 'Bartąska 25/5', '923845723', 'brak', 3, 22),
(6, 'Adam', 'Adamowski', 2147483647, '1999-11-24', 'Warszawa', 'ZSE', 'BartÄ…ska 25/5', '123094586', 'brak', 3, 13),
(7, 'Adam', 'Adamowski', 2147483647, '1999-11-24', 'Warszawa', 'ZSE', 'BartÄ…ska 25/5', '123094586', 'brak', 3, 13),
(9, 'Marcin', 'Kozakowski', 2147483647, '1999-11-19', 'KrakÃ³w', 'ZSEiT', 'Wyzwolenia 13/90', '123098456', 'Down', 4, 54),
(10, 'Kamil', 'Kajewski', 2147483647, '1998-09-04', 'Olsztyn', 'ZSE', 'Warszawska', '847583421', 'Gluten', 5, 106),
(11, 'Andrzej', 'Kapusta', 2147483647, '1892-11-14', 'ÅÃ³dÅº', 'LO 2', 'Krakowska 90/101', '908765432', 'gluten,cukier,miÄ™so,warzywa', 5, 109),
(12, 'Sebastian', 'Rejman', 2147483647, '1995-12-31', 'Warszawa', 'ZSE', 'Warszawa Koalicji 24/6', '897654354', 'brak', 3, 16);

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
(10, 'admin', 'admin', 'Marek', 'Raczkowski', 4, 1),
(11, 'user2', 'user2', 'Knodrad', 'Wyklawisz', 5, 2);

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
-- Indexes for table `rodzenstwo`
--
ALTER TABLE `rodzenstwo`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `rodzenstwo`
--
ALTER TABLE `rodzenstwo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `rodzice`
--
ALTER TABLE `rodzice`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `uczniowie`
--
ALTER TABLE `uczniowie`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
