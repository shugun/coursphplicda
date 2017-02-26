-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Dim 19 Février 2017 à 15:52
-- Version du serveur :  5.5.42
-- Version de PHP :  7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `greenolive`
--

-- --------------------------------------------------------

--
-- Structure de la table `refs`
--

CREATE TABLE `refs` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `ss_titre` varchar(255) NOT NULL,
  `cat` varchar(255) NOT NULL,
  `visuel` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `refs`
--

INSERT INTO `refs` (`id`, `titre`, `ss_titre`, `cat`, `visuel`) VALUES
(1, 'titre', 'sous titre', 'cat 1', 'marker.png'),
(2, 'titre 2', 'sous titre 2', 'cat 2', 'marker.png'),
(3, 'titre 3', 'sous titre 3', 'cat 2', 'marker.png');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `refs`
--
ALTER TABLE `refs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `refs`
--
ALTER TABLE `refs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
