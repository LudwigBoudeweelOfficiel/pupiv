-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 17 juin 2022 à 07:31
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pupiv`
--

-- --------------------------------------------------------

--
-- Structure de la table `heures`
--

DROP TABLE IF EXISTS `heures`;
CREATE TABLE IF NOT EXISTS `heures` (
  `LigneHeure` int(11) NOT NULL AUTO_INCREMENT,
  `De` varchar(5) NOT NULL,
  `A` varchar(5) NOT NULL,
  `Ordre` int(11) NOT NULL,
  `Background` varchar(255) DEFAULT '#B3F5BE',
  `etat` varchar(255) DEFAULT 'libre',
  PRIMARY KEY (`LigneHeure`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `heures`
--

INSERT INTO `heures` (`LigneHeure`, `De`, `A`, `Ordre`, `Background`, `etat`) VALUES
(1, '08:00', '09:00', 1, '#B3F5BE', 'libre'),
(2, '09:00', '10:00', 2, '#B3F5BE', 'libre'),
(3, '10:00', '11:00', 3, '#B3F5BE', 'libre'),
(4, '11:00', '12:00', 4, '#B3F5BE', 'libre'),
(5, '12:00', '13:00', 5, '#B3F5BE', 'libre'),
(6, '13:00', '13:30', 6, '#B3F5BE', 'libre'),
(7, '13:30', '14:00', 7, '#B3F5BE', 'libre'),
(8, '14:00', '14:30', 8, '#B3F5BE', 'libre'),
(9, '14:30', '15:00', 9, '#B3F5BE', 'libre'),
(10, '15:00', '15:30', 10, '#B3F5BE', 'libre'),
(11, '15:30', '16:00', 11, '#B3F5BE', 'libre'),
(12, '16:00', '16:30', 12, '#B3F5BE', 'libre'),
(13, '16:30', '17:00', 13, '#B3F5BE', 'libre'),
(14, '17:00', '17:30', 14, '#B3F5BE', 'libre');

-- --------------------------------------------------------

--
-- Structure de la table `parametres`
--

DROP TABLE IF EXISTS `parametres`;
CREATE TABLE IF NOT EXISTS `parametres` (
  `NomParam` varchar(255) NOT NULL,
  `Valeur` varchar(255) NOT NULL,
  PRIMARY KEY (`NomParam`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `parametres`
--

INSERT INTO `parametres` (`NomParam`, `Valeur`) VALUES
('SemaineEnCours', '24');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `IdReservation` int(11) NOT NULL AUTO_INCREMENT,
  `Date` varchar(255) NOT NULL,
  `Debut` varchar(255) NOT NULL,
  `Fin` varchar(255) NOT NULL,
  `Prof` varchar(255) NOT NULL,
  `salle` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IdReservation`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`IdReservation`, `Date`, `Debut`, `Fin`, `Prof`, `salle`) VALUES
(1, '2022-06-16', '13:30', '14:00', 'Examens BAC', 'BureauEtude2'),
(3, '2022-06-16', '14:00', '14:30', 'Examens BAC', 'BureauEtude2'),
(4, '2022-06-16', '14:30', '15:00', 'Examens BAC', 'BureauEtude2'),
(5, '2022-06-16', '15:00', '15:30', 'Examens BAC', 'BureauEtude2'),
(6, '2022-06-16', '15:30', '16:00', 'Examens BAC', 'BureauEtude2'),
(7, '2022-06-16', '16:00', '16:30', 'Examens BAC', 'BureauEtude2'),
(8, '2022-06-16', '17:00', '17:30', 'Examens BAC', 'BureauEtude2'),
(9, '2022-06-16', '13:30', '14:00', 'Examens BAC', 'BIMFinition'),
(10, '2022-06-16', '14:00', '14:30', 'Examens BAC', 'BIMFinition'),
(11, '2022-06-16', '14:30', '15:00', 'Examens BAC', 'BIMFinition'),
(12, '2022-06-16', '15:00', '15:30', 'Examens BAC', 'BIMFinition'),
(13, '2022-06-16', '15:30', '16:00', 'Examens BAC', 'BIMFinition'),
(14, '2022-06-16', '16:00', '16:30', 'Examens BAC', 'BIMFinition'),
(15, '2022-06-16', '17:00', '17:30', 'Examens BAC', 'BIMFinition'),
(16, '2022-06-16', '13:30', '14:00', 'Examens BAC', 'BIMGC'),
(17, '2022-06-16', '14:00', '14:30', 'Examens BAC', 'BIMGC'),
(18, '2022-06-16', '14:30', '15:00', 'Examens BAC', 'BIMGC'),
(19, '2022-06-16', '15:00', '15:30', 'Examens BAC', 'BIMGC'),
(20, '2022-06-16', '15:30', '16:00', 'Examens BAC', 'BIMGC'),
(21, '2022-06-16', '16:00', '16:30', 'Examens BAC', 'BIMGC'),
(22, '2022-06-16', '17:00', '17:30', 'Examens BAC', 'BIMGC'),
(23, '2022-06-16', '16:30', '17:00', 'Examens BAC', 'BureauEtude2'),
(24, '2022-06-16', '16:30', '17:00', 'Examens BAC', 'BIMFinition'),
(25, '2022-06-16', '16:30', '17:00', 'Examens BAC', 'BIMGC'),
(26, '2022-06-17', '08:00', '09:00', 'Ludwig Boudeweel : parcours Allophone', 'pupitre1'),
(27, '2022-06-17', '09:00', '10:00', 'Ludwig Boudeweel : parcours Allophone', 'pupitre1');

-- --------------------------------------------------------

--
-- Structure de la table `salles`
--

DROP TABLE IF EXISTS `salles`;
CREATE TABLE IF NOT EXISTS `salles` (
  `NomSalle` varchar(255) NOT NULL,
  `EleveMax` int(11) NOT NULL,
  `IdSalle` int(2) NOT NULL,
  PRIMARY KEY (`IdSalle`),
  KEY `IdSalle` (`IdSalle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `salles`
--

INSERT INTO `salles` (`NomSalle`, `EleveMax`, `IdSalle`) VALUES
('BIMGC', 16, 2),
('BIMFinition', 16, 3),
('TOPO', 7, 5),
('BureauEtude2', 17, 6),
('Annexe1ET', 16, 7),
('pupitre2', 16, 10),
('pupitre1', 16, 11);

-- --------------------------------------------------------

--
-- Structure de la table `semaines`
--

DROP TABLE IF EXISTS `semaines`;
CREATE TABLE IF NOT EXISTS `semaines` (
  `IdSemaine` int(11) NOT NULL AUTO_INCREMENT,
  `NumSemaine` int(2) NOT NULL,
  `Du` date DEFAULT NULL,
  `Au` date DEFAULT NULL,
  PRIMARY KEY (`IdSemaine`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `semaines`
--

INSERT INTO `semaines` (`IdSemaine`, `NumSemaine`, `Du`, `Au`) VALUES
(1, 24, '2022-06-13', '2022-06-19'),
(2, 25, '2022-06-20', '2022-06-26'),
(3, 26, '2022-06-27', '2022-07-03'),
(4, 27, '2022-07-04', '2022-06-10'),
(5, 23, '2022-06-06', '2022-06-10');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `Identifiant` varchar(255) NOT NULL,
  `Mdp` varchar(255) NOT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `Prenom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Identifiant`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`Identifiant`, `Mdp`, `Nom`, `Prenom`) VALUES
('admin', 'lpg5943059430', 'Administrateur', 'Administrateur');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
