-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 07 jan. 2025 à 16:05
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `reservation_sdw`
--

-- --------------------------------------------------------

--
-- Structure de la table `activities`
--

DROP TABLE IF EXISTS `activities`;
CREATE TABLE IF NOT EXISTS `activities` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(125) DEFAULT NULL,
  `type_id` int DEFAULT NULL,
  `places_disponibles` int DEFAULT NULL,
  `description` text,
  `datetime_debut` datetime DEFAULT NULL,
  `duree` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `type_id` (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `activities`
--

INSERT INTO `activities` (`id`, `nom`, `type_id`, `places_disponibles`, `description`, `datetime_debut`, `duree`) VALUES
(1, 'randonnée 1', 1, 10, 'une randonnée pour faire des rencontres', '0000-00-00 00:00:00', '6h'),
(2, 'randonnée 2', 1, 4, 'une randonnée en petite committée', '0000-00-00 00:00:00', '7h'),
(3, 'ski', 2, 30, 'Une activité de ski pour une classe scolaire', '0000-00-00 00:00:00', '8h');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `activite_id` int DEFAULT NULL,
  `date_reservation` datetime DEFAULT NULL,
  `etat` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `activite_id` (`activite_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type_activite`
--

DROP TABLE IF EXISTS `type_activite`;
CREATE TABLE IF NOT EXISTS `type_activite` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `type_activite`
--

INSERT INTO `type_activite` (`id`, `nom`) VALUES
(1, 'En fôret'),
(2, 'En montagne');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `prenom` varchar(125) DEFAULT NULL,
  `nom` varchar(125) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `motdepasse` varchar(255) DEFAULT NULL,
  `role` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'inscrit',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `prenom`, `nom`, `email`, `motdepasse`, `role`) VALUES
(1, 'Vincent', 'CHEN', 'vincentchen@blabla.com', 'c4b7b48481f33746eb1112c5a251bb46b11871670ac9c1e03e5a0153431de2ae', 'admin'),
(2, 'John', 'DOE', 'johndoe@blabla.com', '68482803aaba8275b96565b25ecabcdc475b21b08b7ff09e018f9e798a5b9bda', 'inscrit'),
(5, 'Jane', 'Doe', 'janedoe@blabla.com', '$2y$10$vXqgUP7WKwGTGNfi82kv5uYfeb0fBYfoqeaB7L3RE8P5RX27hWXt6', 'inscrit'),
(4, 'Vincent', 'CHEN', 'vincentchen@bloblo.com', '$2y$10$kTFdBWrwHVq.PkXtneOXbuywjzhCSjBcd1j65A7GwzGRHxg5Ws8lO', 'inscrit'),
(6, 'Jane', 'Doe', 'janedoe@blabla.com', '$2y$10$SlLvm4xKq8mFqGgKn7HvX.GBUXyNYaGmaRCm0gj4ccMezO19zmWj6', 'inscrit'),
(7, 'Jane', 'Doe', 'janedoe@blabla.com', '$2y$10$OgUd.EoRuSaAlnNoJYkGCuD8lIlEVXzmpma5rBd6xAdJf0lpZHcaC', 'inscrit');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
