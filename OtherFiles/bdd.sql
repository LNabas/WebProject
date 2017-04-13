-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mer 12 Avril 2017 à 15:35
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `projetWeb`
--

-- --------------------------------------------------------

--
-- Structure de la table `agenda`
--

CREATE TABLE `agenda` (
  `dates` date NOT NULL,
  `heure` time NOT NULL,
  `types` varchar(25) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `avatar`
--

CREATE TABLE `avatar` (
  `chemRel` varchar(100) NOT NULL,
  `id` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commentaireLike`
--

CREATE TABLE `commentaireLike` (
  `commentaire` varchar(10000) NOT NULL,
  `likes` int(1) NOT NULL,
  `idPhoto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `photoAct`
--

CREATE TABLE `photoAct` (
  `chemRel` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `photoGoodies`
--

CREATE TABLE `photoGoodies` (
  `ChemRel` varchar(25) NOT NULL,
  `idAnnonces` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `shop`
--

CREATE TABLE `shop` (
  `descriptif` varchar(25) NOT NULL,
  `prix` varchar(25) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `identifiant` varchar(25) NOT NULL,
  `mdp` varchar(25) NOT NULL,
  `mail` varchar(25) NOT NULL,
  `droit` varchar(15) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `photoAct`
--
ALTER TABLE `photoAct`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);
