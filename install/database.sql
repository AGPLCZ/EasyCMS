CREATE DATABASE `konstrakt` CHARACTER SET utf8;

    
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
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE `galerie` (
  `galerieId` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `rubrikyId` int(11) NOT NULL,
  `galerieTitle` varchar(128) NOT NULL,
  `galeriePerex` varchar(255) NOT NULL,
  `galerieHref` varchar(128) NOT NULL,
    `galerieOut` varchar(128) NOT NULL,
  `galerieImg` varchar(128) NOT NULL,
  FOREIGN KEY (rubrikyId) REFERENCES rubriky(rubrikyId)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE `rubriky` (
  `rubrikyId` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `rubrikyName` varchar(128) CHARACTER SET latin2 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
