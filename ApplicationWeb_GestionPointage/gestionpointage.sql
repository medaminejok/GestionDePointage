-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 13 mai 2020 à 20:59
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestionpointage`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `code` varchar(30) NOT NULL,
  `Libelle` text NOT NULL,
  `salaire` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE `departement` (
  `Num` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Descr` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`Num`, `Nom`, `Descr`) VALUES
(1, 'Recherche', 'Department de recherche etc...'),
(2, 'Communication', 'Description de departement de Communication'),
(3, 'Informatique', 'Departement Informatique c\'est un departement qui permet de repondre a tous qui est .'),
(4, 'RH', 'Description de departement RH');

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE `employe` (
  `CIN` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `dateNaissance` date NOT NULL,
  `tel` varchar(30) NOT NULL,
  `email` varchar(150) NOT NULL,
  `sexe` varchar(15) NOT NULL,
  `adresse` varchar(250) NOT NULL,
  `nbrEnfant` int(11) NOT NULL,
  `passwd` varchar(150) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `role` varchar(50) NOT NULL,
  `dateRecrutement` date NOT NULL,
  `codeF` varchar(30) NOT NULL,
  `codeC` varchar(30) NOT NULL,
  `num` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `fonction`
--

CREATE TABLE `fonction` (
  `code` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `montant` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fonction`
--

INSERT INTO `fonction` (`code`, `nom`, `montant`) VALUES
(1, 'IngÃ©nieur', 12000),
(2, 'Technicien', 6000),
(3, 'Testeur', 16000);

-- --------------------------------------------------------

--
-- Structure de la table `pointage`
--

CREATE TABLE `pointage` (
  `Id_P` int(11) NOT NULL,
  `Date_P` date NOT NULL,
  `Heure_P` time NOT NULL,
  `Type_P` varchar(30) NOT NULL,
  `CIN` varchar(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pointage`
--

INSERT INTO `pointage` (`Id_P`, `Date_P`, `Heure_P`, `Type_P`, `CIN`) VALUES
(4, '2020-05-25', '08:00:00', 'EntrÃ©e', NULL),
(2, '2020-05-25', '18:00:00', 'Sortie', NULL),
(3, '2020-05-03', '07:30:00', 'EntrÃ©e', NULL),
(5, '2020-05-05', '08:10:00', 'EntrÃ©e', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`code`);

--
-- Index pour la table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`Num`);

--
-- Index pour la table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`CIN`),
  ADD KEY `fk_empcat` (`codeC`),
  ADD KEY `fk_empDep` (`num`),
  ADD KEY `fk_empFonct` (`codeF`);

--
-- Index pour la table `fonction`
--
ALTER TABLE `fonction`
  ADD PRIMARY KEY (`code`);

--
-- Index pour la table `pointage`
--
ALTER TABLE `pointage`
  ADD PRIMARY KEY (`Id_P`),
  ADD KEY `fk_pointemp` (`CIN`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `pointage`
--
ALTER TABLE `pointage`
  MODIFY `Id_P` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
