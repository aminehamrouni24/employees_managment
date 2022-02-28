-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Jeu 12 Février 2015 à 12:23
-- Version du serveur: 5.5.27-log
-- Version de PHP: 5.4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `gestemploye`
--

-- --------------------------------------------------------

--
-- Structure de la table `actualite`
--

CREATE TABLE IF NOT EXISTS `actualite` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `idexp` int(255) NOT NULL,
  `date` date NOT NULL,
  `heure` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nom` varchar(1000) COLLATE utf8_bin NOT NULL,
  `text` varchar(1000) COLLATE utf8_bin NOT NULL,
  `fichier` varchar(1000) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=53 ;

--
-- Contenu de la table `actualite`
--

INSERT INTO `actualite` (`id`, `idexp`, `date`, `heure`, `nom`, `text`, `fichier`) VALUES
(49, 1, '2015-02-11', '2015-02-11 14:23:33', 'Administrateur', 'Un employÃ© a Ã©tÃ© ajoutÃ© sous le nom de aaa aaa', ''),
(50, 13, '2015-02-11', '2015-02-11 14:25:02', 'aaa aaa', '  ddd', ''),
(51, 13, '2015-02-11', '2015-02-11 14:25:09', 'aaa aaa', '  dd', ''),
(52, 1, '2015-02-11', '2015-02-11 14:35:43', 'Administrateur', 'Un employÃ© a Ã©tÃ© ajoutÃ© sous le nom de aaaz zzzz', '');

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE IF NOT EXISTS `employe` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) COLLATE utf8_bin NOT NULL,
  `login` varchar(100) COLLATE utf8_bin NOT NULL,
  `pass` varchar(100) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(100) COLLATE utf8_bin NOT NULL,
  `adresse` varchar(1000) COLLATE utf8_bin NOT NULL,
  `journ` varchar(10) COLLATE utf8_bin NOT NULL,
  `moisn` varchar(100) COLLATE utf8_bin NOT NULL,
  `anneen` varchar(100) COLLATE utf8_bin NOT NULL,
  `lieun` varchar(100) COLLATE utf8_bin NOT NULL,
  `situation` varchar(100) COLLATE utf8_bin NOT NULL,
  `cin` varchar(100) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `gsm` varchar(100) COLLATE utf8_bin NOT NULL,
  `fixe` varchar(100) COLLATE utf8_bin NOT NULL,
  `sexe` varchar(100) COLLATE utf8_bin NOT NULL,
  `periode` varchar(100) COLLATE utf8_bin NOT NULL,
  `exper` varchar(1000) COLLATE utf8_bin NOT NULL,
  `anneeeduc` varchar(100) COLLATE utf8_bin NOT NULL,
  `diplome` varchar(1000) COLLATE utf8_bin NOT NULL,
  `anneeproj` varchar(100) COLLATE utf8_bin NOT NULL,
  `proj` varchar(1000) COLLATE utf8_bin NOT NULL,
  `langages` varchar(1000) COLLATE utf8_bin NOT NULL,
  `langues` varchar(1000) COLLATE utf8_bin NOT NULL,
  `activite` varchar(1000) COLLATE utf8_bin NOT NULL,
  `moise` varchar(100) COLLATE utf8_bin NOT NULL,
  `anneee` varchar(100) COLLATE utf8_bin NOT NULL,
  `depart` varchar(100) COLLATE utf8_bin NOT NULL,
  `fonction` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=15 ;

--
-- Contenu de la table `employe`
--

INSERT INTO `employe` (`id`, `nom`, `login`, `pass`, `prenom`, `adresse`, `journ`, `moisn`, `anneen`, `lieun`, `situation`, `cin`, `email`, `gsm`, `fixe`, `sexe`, `periode`, `exper`, `anneeeduc`, `diplome`, `anneeproj`, `proj`, `langages`, `langues`, `activite`, `moise`, `anneee`, `depart`, `fonction`) VALUES
(1, 'name', 'admin', 'admin', 'name', 'nasr', '12', 'Novembre', '1985', 'tunis', 'celibataire', '', 'gggg@yahoo.fr', '44444', '777', 'M', '                     juin 2009\r\nJ 666\r\nJTTT\r\n                    ', '                     CAPEL VJGV HBJHBHBJBH HBKBKJBJBNKJB HBJKHBJKHKJN  K ? B N.?.KJ NJKN\r\n GGJ N?KJNL JJL J J JL J L HUGYUG TGY6 IG TGYU OG UHGIO \r\nHHHJ                  ', '                                                                          JUIN 2008\r\n\r\nJUIN 2012    ', '                                                                                                                                                    BAC   \r\n\r\nLICENCE EN INF                                                                                     ', '2011\r\n\r\n2012', 'PFE WEBJN JNKN KJNKU CRTR NHJN LK? \r\n\r\nzzzzzBJHBJH JJK J GH G F F J', '                          C# Java', '                          anglais franÃ§ais', 'SPORT \r\nMUSIC\r\n \r\nETC', 'Avril', '2011', 'INFORMATIQUE', 'ING EN INF'),
(13, 'aaa', 'aaa', 'aaa', 'aaa', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, 'aaaz', 'aaaz', 'aaaz', 'zzzz', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `employearchive`
--

CREATE TABLE IF NOT EXISTS `employearchive` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `idor` int(255) NOT NULL,
  `nom` varchar(100) COLLATE utf8_bin NOT NULL,
  `login` varchar(100) COLLATE utf8_bin NOT NULL,
  `pass` varchar(100) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(100) COLLATE utf8_bin NOT NULL,
  `adresse` varchar(1000) COLLATE utf8_bin NOT NULL,
  `journ` varchar(10) COLLATE utf8_bin NOT NULL,
  `moisn` varchar(100) COLLATE utf8_bin NOT NULL,
  `anneen` varchar(100) COLLATE utf8_bin NOT NULL,
  `lieun` varchar(100) COLLATE utf8_bin NOT NULL,
  `situation` varchar(100) COLLATE utf8_bin NOT NULL,
  `cin` varchar(100) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `gsm` varchar(100) COLLATE utf8_bin NOT NULL,
  `fixe` varchar(100) COLLATE utf8_bin NOT NULL,
  `sexe` varchar(100) COLLATE utf8_bin NOT NULL,
  `periode` varchar(100) COLLATE utf8_bin NOT NULL,
  `exper` varchar(1000) COLLATE utf8_bin NOT NULL,
  `anneeeduc` varchar(100) COLLATE utf8_bin NOT NULL,
  `diplome` varchar(1000) COLLATE utf8_bin NOT NULL,
  `anneeproj` varchar(100) COLLATE utf8_bin NOT NULL,
  `proj` varchar(1000) COLLATE utf8_bin NOT NULL,
  `langages` varchar(1000) COLLATE utf8_bin NOT NULL,
  `langues` varchar(1000) COLLATE utf8_bin NOT NULL,
  `activite` varchar(1000) COLLATE utf8_bin NOT NULL,
  `moise` varchar(100) COLLATE utf8_bin NOT NULL,
  `anneee` varchar(100) COLLATE utf8_bin NOT NULL,
  `depart` varchar(100) COLLATE utf8_bin NOT NULL,
  `fonction` varchar(100) COLLATE utf8_bin NOT NULL,
  `raison` varchar(1000) COLLATE utf8_bin NOT NULL,
  `datedepart` varchar(1000) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `msg1`
--

CREATE TABLE IF NOT EXISTS `msg1` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `idexp` int(255) NOT NULL,
  `date` date NOT NULL,
  `heure` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nom` varchar(1000) COLLATE utf8_bin NOT NULL,
  `msg` varchar(1000) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `msg13`
--

CREATE TABLE IF NOT EXISTS `msg13` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `idexp` int(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `heure` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nom` varchar(1000) COLLATE utf8_bin DEFAULT NULL,
  `msg` varchar(1000) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `msg14`
--

CREATE TABLE IF NOT EXISTS `msg14` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `idexp` int(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `heure` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nom` varchar(1000) COLLATE utf8_bin DEFAULT NULL,
  `msg` varchar(1000) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `photocv`
--

CREATE TABLE IF NOT EXISTS `photocv` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `idemp` int(255) NOT NULL,
  `nom` varchar(200) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=12 ;

--
-- Contenu de la table `photocv`
--

INSERT INTO `photocv` (`id`, `idemp`, `nom`) VALUES
(1, 1, '11images.jpg'),
(10, 13, ''),
(11, 14, '');

-- --------------------------------------------------------

--
-- Structure de la table `tache1`
--

CREATE TABLE IF NOT EXISTS `tache1` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `idexp` int(255) NOT NULL,
  `date` date NOT NULL,
  `heure` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nom` varchar(100) COLLATE utf8_bin NOT NULL,
  `com` varchar(1000) COLLATE utf8_bin NOT NULL,
  `dfin` varchar(100) COLLATE utf8_bin NOT NULL,
  `fich` varchar(111) COLLATE utf8_bin NOT NULL,
  `type` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Contenu de la table `tache1`
--

INSERT INTO `tache1` (`id`, `idexp`, `date`, `heure`, `nom`, `com`, `dfin`, `fich`, `type`) VALUES
(1, 1, '2012-05-12', '2012-05-12 08:13:19', 'MANAI abdes', '', '', '', 'A faire'),
(2, 1, '2012-05-12', '2012-05-12 08:15:52', 'MANAI abdes', '', '', '', 'A faire'),
(3, 1, '2012-05-12', '2012-05-12 08:15:52', 'MANAI abdes', '', '', '', 'A faire');

-- --------------------------------------------------------

--
-- Structure de la table `tache13`
--

CREATE TABLE IF NOT EXISTS `tache13` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `idexp` int(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `heure` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nom` varchar(1000) COLLATE utf8_bin DEFAULT NULL,
  `com` varchar(1000) COLLATE utf8_bin DEFAULT NULL,
  `dfin` varchar(1000) COLLATE utf8_bin DEFAULT NULL,
  `fich` varchar(1000) COLLATE utf8_bin DEFAULT NULL,
  `type` varchar(1000) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tache14`
--

CREATE TABLE IF NOT EXISTS `tache14` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `idexp` int(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `heure` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nom` varchar(1000) COLLATE utf8_bin DEFAULT NULL,
  `com` varchar(1000) COLLATE utf8_bin DEFAULT NULL,
  `dfin` varchar(1000) COLLATE utf8_bin DEFAULT NULL,
  `fich` varchar(1000) COLLATE utf8_bin DEFAULT NULL,
  `type` varchar(1000) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
