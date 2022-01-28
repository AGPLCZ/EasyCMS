-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Ned 16. led 2022, 10:58
-- Verze serveru: 5.6.33
-- Verze PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `petrlizalcom4`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `galerie`
--

CREATE TABLE `galerie` (
  `id` int(11) NOT NULL,
  `rubrikyId` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `perex` varchar(255) NOT NULL,
  `href` varchar(128) NOT NULL,
  `howOpen` varchar(128) NOT NULL,
  `img` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `galerie`
--

INSERT INTO `galerie` (`id`, `rubrikyId`, `title`, `perex`, `href`, `howOpen`, `img`) VALUES
(1, 1, '', '', 'img/blog/b1.jpg', 'target=\"_blank\"', 'img/blog/b1.jpg'),
(2, 1, '', '', 'img/blog/b2.jpg', 'target=\"_blank\"', 'img/blog/b2.jpg'),
(3, 1, '', '', 'img/blog/b3.jpg', '', 'img/blog/b3.jpg'),
(4, 1, '', '', 'img/blog/b4.jpg', 'target=\"_blank\"', 'img/blog/b4.jpg'),
(5, 1, '', '', 'img/blog/b5.jpg', 'target=\"_blank\"', 'img/blog/b5.jpg'),
(6, 1, '', '', 'img/blog/b6.jpg', 'target=\"_blank\"', 'img/blog/b6.jpg'),
(7, 1, '', '', 'img/blog/b7.jpg', 'target=\"_blank\"', 'img/blog/b7.jpg'),
(8, 1, '', '', 'img/blog/b8.jpg', 'target=\"_blank\"', 'img/blog/b8.jpg'),
(9, 1, '', '', 'img/blog/b9.jpg', 'target=\"_blank\"', 'img/blog/b9.jpg'),
(10, 1, '', '', 'img/blog/b10.jpg', 'target=\"_blank\"', 'img/blog/b10.jpg'),
(11, 1, '', '', 'img/blog/b11.jpg', 'target=\"_blank\"', 'img/blog/b11.jpg'),
(12, 1, '', '', 'img/blog/b12.jpg', 'target=\"_blank\"', 'img/blog/b12.jpg'),
(13, 1, '', '', 'img/blog/b13.jpg', 'target=\"_blank\"', 'img/blog/b13.jpg'),
(14, 1, '', '', 'img/blog/b14.jpg', 'target=\"_blank\"', 'img/blog/b14.jpg'),
(15, 1, '', '', 'img/blog/b15.jpg', 'target=\"_blank\"', 'img/blog/b15.jpg'),
(16, 1, '', '', 'img/blog/b16.jpg', 'target=\"_blank\"', 'img/blog/b16.jpg'),
(17, 1, '', '', 'img/blog/b17.jpg', 'target=\"_blank\"', 'img/blog/b17.jpg'),
(18, 1, '', '', 'img/blog/b18.jpg', 'target=\"_blank\"', 'img/blog/b18.jpg'),
(19, 1, '', '', 'img/blog/b19.jpg', 'target=\"_blank\"', 'img/blog/b19.jpg'),
(20, 1, '', '', 'img/blog/b20.jpg', 'target=\"_blank\"', 'img/blog/b20.jpg'),
(21, 1, '', '', 'img/blog/b21.jpg', 'target=\"_blank\"', 'img/blog/b21.jpg'),
(22, 1, '', '', 'img/blog/b22.jpg', 'target=\"_blank\"', 'img/blog/b22.jpg'),
(23, 1, '', '', 'img/blog/b23.jpg', 'target=\"_blank\"', 'img/blog/b23.jpg');

-- --------------------------------------------------------

--
-- Struktura tabulky `rubriky`
--

CREATE TABLE `rubriky` (
  `id` int(11) NOT NULL,
  `title` varchar(128) CHARACTER SET latin2 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `rubriky`
--

INSERT INTO `rubriky` (`id`, `title`) VALUES
(1, 'Vylety');

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userLogin` varchar(128) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `userEmail` varchar(128) NOT NULL,
  `userNickName` varchar(128) NOT NULL,
  `userFirstName` varchar(128) NOT NULL,
  `userLastName` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`userId`, `userLogin`, `userPass`, `userEmail`, `userNickName`, `userFirstName`, `userLastName`) VALUES
(1, 'agpl', '$2y$10$pT1f1TQZNAIcnP5G55BsvOj6mFWHj93CXMW9YqNBTZ6yWplfZWiCG', 'gmail@petrlizal.com', '', 'Petr', 'Lízal');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `galerie`
--
ALTER TABLE `galerie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rubrikyId` (`rubrikyId`);

--
-- Indexy pro tabulku `rubriky`
--
ALTER TABLE `rubriky`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `galerie`
--
ALTER TABLE `galerie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pro tabulku `rubriky`
--
ALTER TABLE `rubriky`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `galerie`
--
ALTER TABLE `galerie`
  ADD CONSTRAINT `galerie_ibfk_1` FOREIGN KEY (`rubrikyId`) REFERENCES `rubriky` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
