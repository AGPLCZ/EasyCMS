CREATE DATABASE `konstraktX` CHARACTER SET utf8;

    
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





CREATE TABLE `rubriky` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `title` varchar(128) CHARACTER SET latin2 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE `galerie` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `rubrikyId` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `perex` varchar(255) NOT NULL,
  `href` varchar(128) NOT NULL,
  `howOpen` varchar(128) NOT NULL,
  `img` varchar(128) NOT NULL,
  FOREIGN KEY (rubrikyId) REFERENCES rubriky(id)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;




