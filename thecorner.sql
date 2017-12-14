-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 15 déc. 2017 à 02:15
-- Version du serveur :  10.1.28-MariaDB
-- Version de PHP :  5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `thecorner`
--

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

CREATE TABLE `members` (
  `id` int(10) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `city` varchar(150) DEFAULT 'kinshasa',
  `motivation` varchar(250) DEFAULT NULL,
  `phone` varchar(150) DEFAULT '+243---------',
  `picture` varchar(250) NOT NULL DEFAULT 'user.png',
  `lastvisit` int(11) NOT NULL,
  `registration_date` int(11) NOT NULL,
  `messages_sent` int(11) NOT NULL DEFAULT '0',
  `is_online` int(5) NOT NULL DEFAULT '1',
  `level` int(6) NOT NULL DEFAULT '0',
  `Ip` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`id`, `firstname`, `lastname`, `email`, `password`, `city`, `motivation`, `phone`, `picture`, `lastvisit`, `registration_date`, `messages_sent`, `is_online`, `level`, `Ip`) VALUES
(1, 'mbula', 'mboma', 'user@gmail.com', '123456', 'kinshasa', NULL, '+243---------', 'user.png', 1513293235, 1513293235, 0, 1, 0, '::1');

-- --------------------------------------------------------

--
-- Structure de la table `user_failed_logins`
--

CREATE TABLE `user_failed_logins` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(150) DEFAULT NULL,
  `attempted_at` int(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user_failed_logins`
--

INSERT INTO `user_failed_logins` (`id`, `ip_address`, `attempted_at`) VALUES
(1, '::1', 1513008073),
(2, '::1', 1513008095),
(3, '::1', 1513008105),
(4, '::1', 1513008118);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `user_failed_logins`
--
ALTER TABLE `user_failed_logins`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `user_failed_logins`
--
ALTER TABLE `user_failed_logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
