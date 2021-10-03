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



CREATE TABLE `articlesimg` (
  `artId` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `artTitle` varchar(128) NOT NULL,
  `artPerex` varchar(255) NOT NULL,
  `artText` varchar(255) NOT NULL,
  `artHref` varchar(128) NOT NULL,
  `artImg` varchar(128) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_czech_cs;


CREATE TABLE `galerie` (
  `galerieId` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `galerieTitle` varchar(128) NOT NULL,
  `galeriePerex` varchar(255) NOT NULL,
  `galerieHref` varchar(128) NOT NULL,
  `galerieImg` varchar(128) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_czech_cs;