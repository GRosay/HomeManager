-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 21 Février 2018 à 15:25
-- Version du serveur :  5.7.21-0ubuntu0.16.04.1
-- Version de PHP :  7.0.25-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `homemanager`
--

-- --------------------------------------------------------

--
-- Structure de la table `hm_Bill`
--

CREATE TABLE `hm_Bill` (
  `id` int(11) NOT NULL,
  `Total` varchar(100) NOT NULL,
  `Echeance` int(11) NOT NULL,
  `NoFacture` varchar(50) NOT NULL,
  `DatePayement` int(11) DEFAULT NULL,
  `Reference` varchar(500) NOT NULL,
  `idx_Fournisseur` int(11) NOT NULL,
  `Versement` text NOT NULL,
  `EnFaveur` text NOT NULL,
  `Compte` varchar(100) NOT NULL,
  `RefPayement` varchar(150) NOT NULL,
  `DateAjout` int(11) NOT NULL,
  `uid` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `hm_File`
--

CREATE TABLE `hm_File` (
  `id` int(11) NOT NULL,
  `url` varchar(500) NOT NULL,
  `date` int(11) NOT NULL,
  `uid` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `hm_Fournisseur`
--

CREATE TABLE `hm_Fournisseur` (
  `id` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Devise` varchar(10) NOT NULL,
  `Telephone` varchar(100) NOT NULL,
  `Mail` varchar(150) NOT NULL,
  `Adresse` text NOT NULL,
  `Versement` varchar(150) NOT NULL,
  `EnFaveur` text NOT NULL,
  `Compte` varchar(100) NOT NULL,
  `Echeances` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `hm_User`
--

CREATE TABLE `hm_User` (
  `id` int(11) NOT NULL,
  `login` varchar(150) NOT NULL,
  `password` varchar(500) NOT NULL,
  `name` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `theme` varchar(50) NOT NULL,
  `descr` text NOT NULL,
  `profilpic` varchar(150) NOT NULL,
  `rights` varchar(500) NOT NULL,
  `lang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `hm_User`
--

INSERT INTO `hm_User` (`id`, `login`, `password`, `name`, `firstname`, `theme`, `descr`, `profilpic`, `rights`, `lang`) VALUES
(1, 'user@mail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Name', 'Firstname', 'red', 'Your bio', '', '11100', 'FR');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `hm_Bill`
--
ALTER TABLE `hm_Bill`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `hm_Fournisseur`
--
ALTER TABLE `hm_Fournisseur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `hm_User`
--
ALTER TABLE `hm_User`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `hm_Bill`
--
ALTER TABLE `hm_Bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `hm_Fournisseur`
--
ALTER TABLE `hm_Fournisseur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `hm_User`
--
ALTER TABLE `hm_User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
