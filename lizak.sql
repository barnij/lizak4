-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 07 Paź 2020, 18:43
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `lizak`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `password` text COLLATE utf8_polish_ci NOT NULL,
  `name` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `admins`
--

INSERT INTO `admins` (`id_admin`, `login`, `password`, `name`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `answers`
--

CREATE TABLE `answers` (
  `id_ans` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_task` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `words` int(11) NOT NULL,
  `if_correct` int(11) NOT NULL,
  `kod` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ranking`
--

CREATE TABLE `ranking` (
  `id_user` int(11) NOT NULL,
  `all_ans` int(11) DEFAULT 0,
  `ok_ans` int(11) DEFAULT 0,
  `words` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tasks`
--

CREATE TABLE `tasks` (
  `id_task` int(11) NOT NULL,
  `name_task` text COLLATE utf8_polish_ci NOT NULL,
  `text` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `tasks`
--

INSERT INTO `tasks` (`id_task`, `name_task`, `text`) VALUES
(1, 'Wypisz liczbę', 'Twoim zadaniem jest napisanie programu, w naszym nowym wspaniałym języku,\r\nktóry po dostaniu liczby wypisze ją.\r\n\r\n<br/><br/>\r\n\r\n<b>Przykładowe wejście</b><br/>\r\n17\r\n\r\n<br/><br/>\r\n\r\n<b>Przykładowe wyjście</b><br/>\r\n17\r\n\r\n<br/><br/>\r\nPowodzenia!'),
(2, 'Wypisz o jeden większą', 'Na wejściu podana jest liczba, wypisz ją zwiększoną o 1.\r\n\r\n<br/><br/>\r\n\r\n<b>Przykładowe wejście</b><br/>\r\n67\r\n\r\n<br/><br/>\r\n\r\n<b>Przykładowe wyjście</b><br/>\r\n68'),
(3, 'Liczba -3', 'Na wejściu podana jest liczba, wypisz liczbę o 3 mniejszą.\r\n\r\n<br/><br/>\r\n\r\n<b>Przykładowe wejście</b><br/>\r\n24\r\n\r\n<br/><br/>\r\n\r\n<b>Przykładowe wyjście</b><br/>\r\n21'),
(4, 'Dwie liczby - operacje 1', 'Na wejściu podane są dwie liczby, wypisz pierwszą zmniejszoną o 5, a drugą zwiększoną o 5. (nieoddzielone spacją)\r\n\r\n<br/><br/>\r\n\r\n<b>Przykładowe wejście</b><br/>\r\n45 23\r\n\r\n<br/><br/>\r\n\r\n<b>Przykładowe wyjście</b><br/>\r\n4028'),
(5, 'Wypisz od n do 1', 'Otrzymując pewną liczbę n wypisz wszystkie liczby od n do 1 nieoddzielone spacją.\r\n\r\n<br/><br/>\r\n\r\n<b>Przykładowe wejście</b><br/>\r\n6\r\n\r\n<br/><br/>\r\n\r\n<b>Przykładowe wyjście</b><br/>\r\n654321'),
(6, 'Od 1 do n', 'Na wejściu podana jest liczba n, wypisz liczby od 1 do n. (nieoddzielone spacją)\r\n\r\n<br/><br/>\r\n\r\n<b>Przykładowe wejście</b><br/>\r\n11\r\n\r\n<br/><br/>\r\n\r\n<b>Przykładowe wyjście</b><br/>\r\n1234567891011'),
(7, 'Wypisz LIZAK', 'Tym razem Twoim zadaniem jest jedynie wypisanie jednego słowa: LIZAK'),
(8, 'Dodaj dwie liczby', 'Jasio i Małgosia jako zagorzali łowcy okazji znaleźli na pewnej stronie internetowej obieraczkę do cebuli na superpromocji, ale nie są pewni, czy ich na to stać. Wiedzą, że żadne z nich nie może sobie pozwolić na samodzielny zakup tego jakże przydatnego narzędzia, więc postanowili zebrać pieniądze ze wspólnych oszczędności. Twoje zadanie będzie polegało na podaniu, ile Jasio i Małgosia mają w sumie pieniędzy (dlatego wejście składa się z dwóch liczb). \r\n\r\n<br/><br/>\r\n\r\n<b>Przykładowe wejście</b><br/>\r\n12 15\r\n\r\n<br/><br/>\r\n\r\n<b>Przykładowe wyjście</b><br/>\r\n27'),
(9, 'Różnica liczb', 'Na wejściu podane są dwie liczby, wypisz ich różnicę.\r\n\r\n<br/><br/>\r\n\r\n<b>Przykładowe wejście</b><br/>\r\n35 17\r\n\r\n<br/><br/>\r\n\r\n<b>Przykładowe wyjście</b><br/>\r\n18'),
(10, 'Razy dwa', 'Na wejściu podana jest liczba, wypisz dwa razy większą.\r\n\r\n<br/><br/>\r\n\r\n<b>Przykładowe wejście</b><br/>\r\n24\r\n\r\n<br/><br/>\r\n\r\n<b>Przykładowe wyjście</b><br/>\r\n48'),
(11, 'Podziel przez dwa', 'Na wejściu podana jest liczba parzysta, wypisz ją podzieloną przez 2.\r\n\r\n<br/><br/>\r\n\r\n<b>Przykładowe wejście</b><br/>\r\n240\r\n\r\n<br/><br/>\r\n\r\n<b>Przykładowe wyjście</b><br/>\r\n120'),
(12, 'Zadanie 5 ze spacjami', 'Otrzymując pewną liczbę n wypisz wszystkie liczby od n do 1 ODDZIELONE spacją. \r\n\r\n<br/><br/>\r\n\r\n<b>Przykładowe wejście</b><br/>\r\n6\r\n\r\n<br/><br/>\r\n\r\n<b>Przykładowe wyjście</b><br/>\r\n6 5 4 3 2 1 \r\n\r\n<br/><br/>\r\nWyjaśnienie do przykładu: po jedynce też jest spacja.'),
(13, 'Mnożenie liczb', 'Na wejściu znajdują się dwie liczby. Wypisz wynik ich mnożenia.\r\n\r\n<br/><br/>\r\n\r\n<b>Przykładowe wejście</b><br/>\r\n6 8\r\n\r\n<br/><br/>\r\n\r\n<b>Przykładowe wyjście</b><br/>\r\n48'),
(14, 'Zamiana liter', 'Mając podane słowo składające się z n liter twój program powinien wyświetlić to słowo zapisane małymi literami. \r\n\r\n<br/><br/>\r\n\r\n<b>Przykładowe wejście</b><br/>\r\n5 LIZAK\r\n\r\n<br/><br/>\r\n\r\n<b>Przykładowe wyjście</b><br/>\r\nlizak'),
(15, 'Dziwne równanie', 'Ostatnia prosta! Jako ostatnie zadanie musisz rozwiązać równanie dla danej liczby n i wypisać rozwiązanie:\r\nk = n/3;\r\nn = n/2;\r\nn = n + k;\r\nk = k/2;\r\nn = n + k;\r\n<br/><br/>\r\n\r\n<b>Przykładowe wejście</b><br/>\r\n1\r\n\r\n<br/><br/>\r\n\r\n<b>Przykładowe wyjście</b><br/>\r\nNie tym razem :) ');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `name` text COLLATE utf8_polish_ci NOT NULL,
  `player1` text COLLATE utf8_polish_ci NOT NULL,
  `player2` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeksy dla tabeli `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id_ans`),
  ADD KEY `id_user` (`id_user`,`id_task`),
  ADD KEY `id_task` (`id_task`);

--
-- Indeksy dla tabeli `ranking`
--
ALTER TABLE `ranking`
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indeksy dla tabeli `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id_task`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `answers`
--
ALTER TABLE `answers`
  MODIFY `id_ans` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
