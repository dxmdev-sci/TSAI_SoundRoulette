-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 17 Maj 2021, 15:15
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
  `general_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `album`
--

INSERT INTO `album` (`id`, `user_id`, `name`, `general_description`) VALUES
(1, 1, 'adsfaasdfgva', 'askjhlfkajsdhflkajhdlfiakjlszdhzxcvn,bm desc'),
(2, 0, '', 'My new Album named new Album()');

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

--
-- Zrzut danych tabeli `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `song_id`, `title`, `content`) VALUES
(0, 1, 1, 'asdfasdfa', 'asdfasdfadfffsfaf'),
(1, 1, 1, 'asdfasdfa', 'asdfasdfadfffsfaf');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `description`
--

CREATE TABLE `description` (
  `id` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `album` int(11) NOT NULL,
  `description` text NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `description`
--

INSERT INTO `description` (`id`, `author`, `album`, `description`, `created_at`) VALUES
(1, 2, 0, 'jest w pyte', '2021-05-17');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'rock');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `group_name`
--

CREATE TABLE `group_name` (
  `id` int(11) NOT NULL,
  `name` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `group_name`
--

INSERT INTO `group_name` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'banned');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `group_permission`
--

CREATE TABLE `group_permission` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `group_permission`
--

INSERT INTO `group_permission` (`id`, `group_id`, `permission_id`, `created_at`) VALUES
(1, 1, 1, '2021-05-17'),
(2, 1, 2, '2021-05-17'),
(3, 1, 3, '2021-05-17'),
(4, 1, 4, '2021-05-17'),
(6, 1, 5, '2021-05-17'),
(7, 1, 6, '2021-05-17'),
(8, 1, 7, '2021-05-17'),
(9, 1, 8, '2021-05-17'),
(10, 1, 9, '2021-05-17'),
(11, 1, 10, '2021-05-17'),
(12, 1, 11, '2021-05-17'),
(13, 1, 12, '2021-05-17'),
(14, 1, 13, '2021-05-17'),
(15, 1, 14, '2021-05-17'),
(16, 1, 15, '2021-05-17'),
(17, 1, 16, '2021-05-17'),
(18, 2, 12, '2021-05-17'),
(19, 2, 5, '2021-05-17'),
(20, 2, 10, '2021-05-17'),
(21, 2, 9, '2021-05-17');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `permission`
--

INSERT INTO `permission` (`id`, `name`, `created_at`) VALUES
(1, 'pieśla', '2021-05-17'),
(2, 'user_add', '2021-05-17'),
(3, 'user_deletion', '2021-05-17'),
(4, 'user_update', '2021-05-17'),
(5, 'comment_add', '2021-05-17'),
(6, 'comment_deletion', '2021-05-17'),
(7, 'comment_update', '2021-05-17'),
(8, 'album_deletion', '2021-05-17'),
(9, 'album_update', '2021-05-17'),
(10, 'album_add', '2021-05-17'),
(11, 'description_update', '2021-05-17'),
(12, 'description_add', '2021-05-17'),
(13, 'description_deletion', '2021-05-17'),
(14, 'genre_add', '2021-05-17'),
(15, 'genre_deletion', '2021-05-17'),
(16, 'genre_update', '2021-05-17');

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
  `password_hash` text NOT NULL,
  `email` text NOT NULL,
  `profile_image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `group_id`, `username`, `password_hash`, `email`, `profile_image`) VALUES
(1, 1, 'PieslaSpecial', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'bpbartekp@gmail.com', 'http://infraport.pl/wp-content/uploads/2018/02/1procent_dla_Macieja.jpg'),
(2, 2, 'maciek', 'd5f12e53a182c062b6bf30c1445153faff12269a', '', NULL);

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
-- Indeksy dla tabeli `group_name`
--
ALTER TABLE `group_name`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `group_permission`
--
ALTER TABLE `group_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `permission_id` (`permission_id`);

--
-- Indeksy dla tabeli `permission`
--
ALTER TABLE `permission`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `description`
--
ALTER TABLE `description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `group_name`
--
ALTER TABLE `group_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `group_permission`
--
ALTER TABLE `group_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT dla tabeli `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT dla tabeli `song`
--
ALTER TABLE `song`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `group_permission`
--
ALTER TABLE `group_permission`
  ADD CONSTRAINT `group_permission_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `group_name` (`id`),
  ADD CONSTRAINT `group_permission_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `permission` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
