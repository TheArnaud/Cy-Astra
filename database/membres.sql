-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 06 juin 2021 à 21:57
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
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `membreId` int(11) NOT NULL,
  `nom` text NOT NULL,
  `dateNaissance` date DEFAULT NULL,
  `pseudonyme` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `motdepasse` varchar(30) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `sexe` varchar(15) NOT NULL,
  `profession` varchar(25) NOT NULL,
  `ville` text NOT NULL,
  `roleMembre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`membreId`, `nom`, `dateNaissance`, `pseudonyme`, `email`, `motdepasse`, `adresse`, `sexe`, `profession`, `ville`, `roleMembre`) VALUES
(2, '', NULL, 'aaaaaaaa', 'aaaaaaa@gmail.com', 'aaaaaaaaa', '', '', '', '', ''),
(3, '', NULL, 'cccc', 'ccccc@gmail.com', 'cccccccc', '', '', '', '', ''),
(4, '', NULL, 'ddddd', 'ddd@gmail.com', 'ddddddddd', '', '', '', '', ''),
(5, '', NULL, 'hhhh', 'hhhhh@gmail.com', 'hhhhhh', '6 rue legrand', '', '', '', ''),
(27, '', NULL, 'tsssssss', 'tgrsgs@gmail.com', 'tsssssssssssssssssss', 'tssssss rue 3', 'female', 'Professeur', '', ''),
(28, '', NULL, 'ki', 'ko@gmail.com', 'koi', 'koo', '', '', '', ''),
(29, '', NULL, 'chhh', 'chhh@gmaill.com', 'chhjj', 'cjhhh', '', '', '', ''),
(30, '', NULL, 'eirzj', 'zefZF@gmail.com', 'fzikf', 'jkernfie', '', '', '', ''),
(31, '', NULL, 'gj', 'gj@gmail.com', 'gj', 'gj', '', '', '', ''),
(32, '', NULL, 'dfb', 'dfb@gmail.com', 'fz', 'rge', '', '', '', ''),
(33, '', NULL, 'vsdfs', 'fsdrds@gmail.com', 'rifjeoi', 'jdenffie', '', '', '', ''),
(34, '', NULL, 'fdvd', 'fsdvds@gmail.com', 'jehdfiz', 'nifvjn', '', '', '', ''),
(35, '', NULL, 'pitie1', 'pity@gmail.com', 'jehdiz', 'iojzdiofcz', '', '', '', ''),
(36, '', NULL, 'piti2', 'rkflze@gmail.com', 'ikejf', 'ikfgjen', '', '', '', ''),
(37, '', NULL, 'pitie3', 'edzjk@gmail.com', 'ujjhefiz', 'inddfiej', '', '', '', ''),
(38, '', NULL, 'enfinn', 'jifzn@gmail.com', 'iedjfz', 'jdoeik', '', '', '', ''),
(39, '', NULL, 'edz', 'rf@gmail.com', 'zef', 'effz', '', 'effz', '', ''),
(40, '', NULL, 'zfz', 'zefz@gmail.com', 'jdnei', 'jkndif', 'M', 'jkndif', '', ''),
(42, '', NULL, 'slooooooooooo', 'slooooooooooo@gmail.com', 'slooooooooooo', 'slooooooooooo5464', 'male', 'Etudiant', 'Ecquevilly', ''),
(43, 'llllllllll', '2021-06-10', '', '', 'vvv', '', 'male', '', '', ''),
(44, 'iiiiiiiiiiiiii', '2021-06-10', 'iiiiiiiiiiiiiiiiiii', '', 'iiiiiiiiiii', '', 'male', '', '', ''),
(45, 'gne', '0000-00-00', 'hrfthrth', 'thfh@gmail.com', '', '', '', '', '', ''),
(46, 'franky', '0000-00-00', 'luffy', 'monkey@gmail.com', 'D', 'monk D luff', '', '', '', ''),
(47, 'dzsdeds', '0000-00-00', 'effsfs', 'esfsefsdfsefseff@gmail.co', 'efkzoejkdfo', 'krfoefjoekf', '', '', '', ''),
(48, '', '0000-00-00', 'opti', 'opti@gmail.com', 'opti', '3 rue opti', '', 'Etudiant', '', ''),
(49, '', NULL, 'fine', 'fine@gmail.com', 'fine', '3 ruez fine', '', '', '', ''),
(50, '', NULL, 'refe', 'ergerg@gmail.com', 'orfk', 'gferg', '', '', '', ''),
(51, '', NULL, 'dfgsvaaaaaaaaa', 'aaaassss@gmail.com', 'aaaaaassss', 'asasasasa', '', '', '', ''),
(52, '', NULL, 'goodbye', 'goodbye@gmail.com', 'gbye', 'gby', '', '', '', ''),
(53, '', NULL, 'bjourBJO', 'bjour@gmail.com', 'bjourb', '3 rue bjr', '', '', '', ''),
(54, '', NULL, 'zdsqqqqqqqqqqq', 'dzzzzzzzzzzzzz@gmail.com', 'zqdassssss', 'qdazs', '', '', '', ''),
(55, '', NULL, 'ezfffffffffffsqsssss', 'ssssssssssdqsqsd@gmail.co', 'sssssssssssssdqsdqs', 'ssssssssssssssqdsqsd', '', '', '', ''),
(56, ' coc', '0000-00-00', 'zxsq', 's@gmail.com', 'sxqsx', 'sxqsx', 'male', '', ' refffffffffffffffff', ' frfrfr'),
(57, '', NULL, 'zdzd', 'zdzd@gm', 'ail', 'zdzdz', '', '', '', ''),
(58, ' ', '0000-00-00', 'fvbv', 'fdbv@gm', 'sdfd', 'ddsx', 'male', '', ' ', ' '),
(59, ' ', '0000-00-00', 'erfezf', 'zefzef@gmail.com', 'efzef', 'efzef', 'male', '', ' ', ' '),
(60, '', '0000-00-00', 'pls', 'pls@gmail.Com', 'pls', 'pls', 'female', '', '', ''),
(61, '', '0000-00-00', 'hihihhh', 'hhhhhh@gmail.com', 'hhhhhhh', 'ccece', '', 'Etudiant', '', ''),
(62, '', '0000-00-00', 'test prof', 'prof@gmail.com', 'propfprof', 'prof 3 rue', 'male', 'Professeur', 'jhbuiygi', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`membreId`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `membreId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
