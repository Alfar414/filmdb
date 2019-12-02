-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 26 nov 2019 om 13:07
-- Serverversie: 10.1.36-MariaDB
-- PHP-versie: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `films`
--

CREATE TABLE `films` (
  `film_id` int(11) NOT NULL,
  `naam` varchar(30) NOT NULL,
  `image` varchar(250) NOT NULL,
  `descriptie` varchar(255) NOT NULL,
  `director` varchar(20) NOT NULL,
  `acteur` varchar(40) NOT NULL,
  `vurl` varchar(50) NOT NULL,
  `soort` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `films`
--

INSERT INTO `films` (`film_id`, `naam`, `image`, `descriptie`, `director`, `acteur`, `vurl`, `soort`) VALUES
(6, 'naam', 'image0-4.jpg', 'descriptie', 'director', 'acteur', 'OgSef_M0DJk', 'rotzooi'),
(7, 'joker', 'download.jpg', 'een depressieve clown is boos', 'anass', 'ian robeerst', 'zAGVQLHvwOY', 'clown'),
(8, 'it', 'Naamloos.png', 'horror clown jaagt op kids', 'it man', 'the clown', 'hAUTdjf9rko', 'clown'),
(9, 'cars', 'image0-4.jpg', 'autofilm voor kids', 'carreman', 'lightning mcqueen', 'NOW()', 'auto'),
(10, 'IT 2', 'weewr.jpg', 'Clown komt terug en jaagt op de zelfde kids maar dan ouder', 'IT man ', 'Clown', 'xhJ5P7Up3jA', 'clowns');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `userid` int(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `woord1` varchar(20) NOT NULL,
  `woord2` varchar(20) NOT NULL,
  `woord3` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`userid`, `username`, `pass`, `bio`, `email`, `woord1`, `woord2`, `woord3`) VALUES
(1, '0', '0', 'asdf', 'as.cool@live.nl', '', '', ''),
(2, 'a1lfar', 'passwords', 'fghf', 'as.cool@live.nl', '', '', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user_films`
--

CREATE TABLE `user_films` (
  `ufid` int(200) NOT NULL,
  `userid` int(200) NOT NULL,
  `film_id` int(200) NOT NULL,
  `soort` varchar(25) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `user_films`
--

INSERT INTO `user_films` (`ufid`, `userid`, `film_id`, `soort`, `date`) VALUES
(17, 2, 7, 'clown', '2019-11-25 23:00:00'),
(39, 2, 9, 'auto', '2019-11-26 00:30:21'),
(44, 2, 10, 'clown', '2019-11-26 09:57:27');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`film_id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- Indexen voor tabel `user_films`
--
ALTER TABLE `user_films`
  ADD PRIMARY KEY (`ufid`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `films`
--
ALTER TABLE `films`
  MODIFY `film_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `user_films`
--
ALTER TABLE `user_films`
  MODIFY `ufid` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
