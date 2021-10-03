CREATE DATABASE `konstrakt` CHARACTER SET utf8 COLLATE utf8_czech_ci;

    
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




CREATE TABLE `galerie` (
  `galerieId` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `directorId` int(11) NOT NULL,
  `galerieTitle` varchar(128) NOT NULL,
  `galeriePerex` varchar(255) NOT NULL,
  `galerieHref` varchar(128) NOT NULL,
    `galerieOut` varchar(128) NOT NULL,
  `galerieImg` varchar(128) NOT NULL,
  FOREIGN KEY (directorId) REFERENCES stitky(stitkyId)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_czech_cs;

  CREATE TABLE `stitky` (
  `stitkyId` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `stitkyName` varchar(128) NOT NULL,
  ) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_czech_cs;