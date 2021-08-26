CREATE DATABASE `databaze_pro_web` CHARACTER SET utf8 COLLATE utf8_czech_ci;

    
--
-- Struktura tabulky `users`
--
CREATE TABLE `users` (
  `userId` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `userLogin` varchar(128) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `userEmail` varchar(128) NOT NULL,
  `userNickName` varchar(128) NOT NULL,
  `userFirstName` varchar(128) NOT NULL,
  `userLastName` varchar(128) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_czech_cs;
