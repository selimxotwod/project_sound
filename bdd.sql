-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Jeu 30 Juin 2016 à 12:43
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `projet_fin`
--

-- --------------------------------------------------------

--
-- Structure de la table `signataire`
--

CREATE TABLE `signataire` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentaire` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `public` int(11) NOT NULL DEFAULT '0',
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lien_partage` int(11) NOT NULL DEFAULT '0',
  `nbr_neveu` int(11) NOT NULL DEFAULT '0',
  `parrain` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `signataire`
--

INSERT INTO `signataire` (`id`, `nom`, `prenom`, `commentaire`, `public`, `mail`, `lien_partage`, `nbr_neveu`, `parrain`, `date`) VALUES
(63, 'Jean', 'Paul', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 1, 'jp@gmail.com', 1, 2, '0', '2016-06-27 00:30:52'),
(64, 'Christophe', 'Kokss', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 1, 'ck@gmail.com', 0, 13, '63', '2016-06-27 00:31:38'),
(65, 'Clara', 'Sainaro', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 1, 'cs@gmail.com', 1, 3, '63', '2016-06-27 00:32:13'),
(66, 'Louis', 'Philippe', 'Blablablablalbalbalbalblablablalbabl', 1, 'lp@gmail.com', 0, 8, '0', '2016-06-27 11:23:46'),
(67, 'Abel', 'Tesfaye', 'xoxooxoxoxooxoxoxoxoxoxooxxxooxoxoooxoxoxoo', 1, 'abeltesfaye@xo.com', 1, 19, '0', '2016-06-27 11:29:29'),
(68, 'Aubrey', 'Graham', 'ovovovovovoovovovovoovovovooovovovovovo', 1, 'ag@gmail.com', 1, 12, '65', '2016-06-27 11:30:26'),
(69, 'Eric', 'Perry', 'kpkpkpkpkpkpkpkpkpkpkppkkpkpp', 0, 'kp@gmail.com', 0, 7, '68', '2016-06-27 11:33:17'),
(70, 'Jean', 'Babibel', 'jbjbjbjjbjbjb', 0, 'jb@gmaill.com', 1, 3, '68', '2016-06-27 11:35:07'),
(71, 'Jean', 'Karim', 'kjjjkjjkjkkjkjkjkjkjkjkjk', 0, 'jk@gmail.com', 0, 6, '68', '2016-06-27 11:35:15'),
(74, 'Frank', 'Ocean', 'fofofofofoofofofofofofofofof', 0, 'fo@gmail.com', 1, 2, '0', '2016-06-27 14:39:48'),
(83, 'ouo', 'ou', 'ouuu', 0, 'ou', 0, 0, '65', '2016-06-28 11:40:00'),
(84, 'alo', 'laooo', 'akki', 0, 'alloo', 1, 0, '65', '2016-06-28 11:42:35'),
(104, 'sd', 'sds', 'sd', 0, 'sds', 0, 0, '', '2016-06-29 16:40:38'),
(105, 'jjj', 'jj', 'ji', 0, 'koko', 1, 1, '', '2016-06-29 23:26:22'),
(106, 'frr', 'rgrg', 'rggrgr', 0, 'rg', 0, 0, 'koko', '2016-06-29 23:27:39'),
(107, 'rz', 'zrzr', 'zrz', 0, 'zrz', 0, 0, '', '2016-06-30 11:14:33'),
(108, 'aa', 'aa', 'aa', 0, 'aa', 1, 0, '', '2016-06-30 11:56:01'),
(109, 'vdvd', 'dvdv', 'dvd', 0, 'dvd', 0, 0, '', '2016-06-30 11:59:37');

-- --------------------------------------------------------

--
-- Structure de la table `total_visiteur`
--

CREATE TABLE `total_visiteur` (
  `id` int(11) NOT NULL,
  `total` int(11) NOT NULL DEFAULT '0',
  `total_down` int(11) NOT NULL,
  `total_see_form` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `total_visiteur`
--

INSERT INTO `total_visiteur` (`id`, `total`, `total_down`, `total_see_form`) VALUES
(1, 498, 499, 244);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `signataire`
--
ALTER TABLE `signataire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `total_visiteur`
--
ALTER TABLE `total_visiteur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `signataire`
--
ALTER TABLE `signataire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT pour la table `total_visiteur`
--
ALTER TABLE `total_visiteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;