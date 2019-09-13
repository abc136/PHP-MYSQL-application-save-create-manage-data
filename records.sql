-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 31 Août 2019 à 23:54
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `records`
--

-- --------------------------------------------------------

--
-- Structure de la table `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `First` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `Last` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `img_dir` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `Marks` float NOT NULL,
  `Status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `data`
--

INSERT INTO `data` (`id`, `First`, `Last`, `Email`, `img_dir`, `Marks`, `Status`) VALUES
(1, 'first1', 'last1', 'first1.last1@firstlast.com', 'aaaa.jpeg', 85, 1),
(2, 'first2', 'last2', 'first2.last2@firstlast.de', 'bbbbbbbb.jpeg', 64, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
