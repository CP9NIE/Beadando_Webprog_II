-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1:3308
-- Létrehozás ideje: 2020. Máj 12. 22:01
-- Kiszolgáló verziója: 5.7.26
-- PHP verzió: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `gallery`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `idGallery` int(11) NOT NULL AUTO_INCREMENT,
  `titleGallery` longtext COLLATE utf8_unicode_ci NOT NULL,
  `descGallery` longtext COLLATE utf8_unicode_ci NOT NULL,
  `imgFullNameGallery` longtext COLLATE utf8_unicode_ci NOT NULL,
  `orderGallery` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idGallery`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
