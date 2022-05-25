-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 09 juin 2021 à 23:15
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `galerie`
--

CREATE TABLE `galerie` (
  `imageId` int(11) NOT NULL,
  `imageSource` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `galerie`
--

INSERT INTO `galerie` (`imageId`, `imageSource`) VALUES
(1, 'images/gallerie/nebu.png'),
(2, 'images/gallerie/14.jpg'),
(3, 'images/gallerie/nebu2.jpg'),
(4, 'images/gallerie/15.jpg'),
(5, 'images/gallerie/16.jpg'),
(6, 'images/gallerie/nebu4.jpg'),
(7, 'images/gallerie/17.jpg'),
(8, 'images/gallerie/nebu5.jpg'),
(9, 'images/gallerie/18.jpg'),
(10, 'images/gallerie/24.jpg'),
(11, 'images/gallerie/nebu6.jpg'),
(12, 'images/gallerie/20.jpg'),
(13, 'images/gallerie/purple.jpg'),
(14, 'images/gallerie/15.jpg'),
(15, 'images/gallerie/17.jpg'),
(16, 'images/gallerie/22.jpg'),
(17, 'images/gallerie/nebu12.jpg'),
(18, 'images/gallerie/pillars.jpg'),
(19, 'images/gallerie/nebu8.jpg'),
(20, 'images/gallerie/23.jpg'),
(21, 'images/gallerie/nebu9.jpg'),
(22, 'images/gallerie/nebu3.png'),
(23, 'images/gallerie/19.jpg'),
(24, 'images/gallerie/25.jpg'),
(25, 'images/gallerie/26.jpg'),
(26, 'images/gallerie/nebu6.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `galerie`
--
ALTER TABLE `galerie`
  ADD PRIMARY KEY (`imageId`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `galerie`
--
ALTER TABLE `galerie`
  MODIFY `imageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
