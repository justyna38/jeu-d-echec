-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 20 sep. 2021 à 06:29
-- Version du serveur :  8.0.21
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `onlinechess`
--

-- --------------------------------------------------------

--
-- Structure de la table `game`
--

DROP TABLE IF EXISTS `game`;
CREATE TABLE IF NOT EXISTS `game` (
  `id` int NOT NULL AUTO_INCREMENT,
  `white` int NOT NULL,
  `black` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=84;

--
-- Déchargement des données de la table `game`
--

INSERT INTO `game` (`id`, `white`, `black`) VALUES
(2, 2, 1),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `gamedata`
--

DROP TABLE IF EXISTS `gamedata`;
CREATE TABLE IF NOT EXISTS `gamedata` (
  `id` int NOT NULL AUTO_INCREMENT,
  `game` int NOT NULL,
  `history` char(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=143 DEFAULT;

--
-- Déchargement des données de la table `gamedata`
--

INSERT INTO `gamedata` (`id`, `game`, `history`) VALUES
(1, 1, '4244'),
(38, 1, '2847'),
(37, 1, '7183'),
(36, 1, '7866'),
(35, 1, '3142'),
(29, 1, '5253'),
(30, 1, '7776'),
(31, 1, '6125'),
(32, 1, '3736'),
(33, 1, '2543'),
(41, 1, '2224'),
(40, 1, '5756'),
(39, 1, '8375'),
(21, 2, '8283'),
(139, 2, '3537'),
(34, 1, '4846'),
(22, 1, '4745'),
(42, 1, '1828'),
(43, 1, '2113'),
(44, 1, '4624'),
(45, 1, '4224'),
(46, 1, '2726'),
(47, 1, '4174'),
(48, 1, '6674'),
(49, 1, '2446'),
(50, 1, '6846'),
(51, 1, '3233'),
(52, 1, '4613'),
(53, 1, '1121'),
(54, 1, '2625'),
(55, 1, '8283'),
(56, 1, '8786'),
(57, 1, '3334'),
(122, 2, '6252'),
(121, 2, '2726'),
(120, 2, '3142'),
(119, 2, '1716'),
(69, 2, '5755'),
(70, 2, '7163'),
(71, 2, '4866'),
(72, 2, '5254'),
(73, 2, '6835'),
(74, 2, '3233'),
(75, 2, '4746'),
(76, 2, '6384'),
(77, 2, '6684'),
(78, 2, '4163'),
(79, 2, '8474'),
(80, 2, '6374'),
(81, 2, '3874'),
(82, 2, '6125'),
(83, 2, '3736'),
(84, 2, '2514'),
(85, 2, '2847'),
(86, 2, '3334'),
(87, 2, '4726'),
(88, 2, '1423'),
(89, 2, '6766'),
(90, 2, '8374'),
(91, 2, '7776'),
(92, 2, '6263'),
(93, 2, '7675'),
(94, 2, '8161'),
(95, 2, '7886'),
(96, 2, '6162'),
(97, 2, '3524'),
(98, 2, '1213'),
(99, 2, '8868'),
(100, 2, '3435'),
(101, 2, '4645'),
(102, 2, '5445'),
(103, 2, '2645'),
(104, 2, '2345'),
(105, 2, '2435'),
(109, 1, '2534'),
(110, 2, '4243'),
(123, 2, '3571'),
(124, 2, '4536'),
(125, 2, '5848'),
(126, 2, '4224'),
(127, 2, '4837'),
(128, 2, '4344'),
(129, 2, '3736'),
(130, 2, '5232'),
(131, 2, '3625'),
(132, 2, '3235'),
(133, 2, '2514'),
(140, 2, '6848'),
(141, 2, '3787'),
(142, 2, '4838');

-- --------------------------------------------------------

--
-- Structure de la table `player`
--

DROP TABLE IF EXISTS `player`;
CREATE TABLE IF NOT EXISTS `player` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6;

--
-- Déchargement des données de la table `player`
--

INSERT INTO `player` (`id`, `login`, `password`) VALUES
(1, 'player1', '5d2bbc279b5ce75815849d5e3f0533ec'),
(2, 'player2', '88e77ff74930f37010370c296d14737b'),
(3, 'player3', '1aa3814dca32e4c0b79a2ca047ef1db0'),
(4, 'player4', '12efaba7fd50f5c66bd295683c0ce2a7'),
(5, 'player5', 'c5aec8b7110bb97bf59ab1a06805ebdd');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
