-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 18 Gru 2020, 16:06
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sound_roulette`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `description`
--

CREATE TABLE `description` (
  `id` int(11) NOT NULL,
  `author` text NOT NULL,
  `description` text NOT NULL,
  `realesed` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `group_permission`
--

CREATE TABLE `group_permission` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `add_song` tinyint(1) NOT NULL,
  `delete_song` tinyint(1) NOT NULL,
  `edit` tinyint(1) NOT NULL,
  `comment_delete` tinyint(1) NOT NULL,
  `add_comment` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `group_permission`
--

INSERT INTO `group_permission` (`id`, `name`, `add_song`, `delete_song`, `edit`, `comment_delete`, `add_comment`) VALUES
(1, 'Admin', 1, 1, 1, 1, 1),
(2, 'user', 1, 0, 1, 0, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `song`
--

CREATE TABLE `song` (
  `id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `description_id` int(11) NOT NULL,
  `reference` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `profile_image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `group_id`, `username`, `password`, `email`, `profile_image`) VALUES
(1, 1, 'PieslaSpecial', '$argon2i$v=19$m=65536,t=4,p=1$bTBYTmJaa1JyVWdmMncxbw$HM3q4HYNKOcTvqyzs68vMSJUGb9ozyKLsmCxpi+O53g', 'bpbartekp@gmail.com', 'http://infraport.pl/wp-content/uploads/2018/02/1procent_dla_Macieja.jpg');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `description`
--
ALTER TABLE `description`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `group_permission`
--
ALTER TABLE `group_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `group_permission`
--
ALTER TABLE `group_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `song`
--
ALTER TABLE `song`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
