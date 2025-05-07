-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 08 mars 2022 à 22:49
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
-- Base de données : `db_pharmacie`
--

-- --------------------------------------------------------

--
-- Structure de la table `bon_commande`
--

DROP TABLE IF EXISTS `bon_commande`;
CREATE TABLE IF NOT EXISTS `bon_commande` (
  `code_commande` int(11) NOT NULL AUTO_INCREMENT,
  `produit_cmd` varchar(20) NOT NULL,
  `quantite_commande` int(11) NOT NULL,
  `facture_bon` varchar(40) NOT NULL,
  `date_bon` date NOT NULL,
  `id_pharma` int(11) NOT NULL,
  PRIMARY KEY (`code_commande`),
  KEY `rf_ph` (`id_pharma`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bon_commande`
--

INSERT INTO `bon_commande` (`code_commande`, `produit_cmd`, `quantite_commande`, `facture_bon`, `date_bon`, `id_pharma`) VALUES
(3, 'paracetamol', 34, '25000', '2022-02-12', 1),
(1, 'paracetamol', 34, '25000', '2022-02-12', 1),
(4, 'saaaa', 1222, '1111', '1029-11-01', 1);

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

DROP TABLE IF EXISTS `employe`;
CREATE TABLE IF NOT EXISTS `employe` (
  `id_employe` int(11) NOT NULL AUTO_INCREMENT,
  `nom_employe` varchar(30) NOT NULL,
  `prenom_employe` varchar(30) NOT NULL,
  `sexe` enum('homme','femme') NOT NULL,
  `username` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email_employe` varchar(40) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id_employe`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`id_employe`, `nom_employe`, `prenom_employe`, `sexe`, `username`, `phone`, `email_employe`, `password`) VALUES
(1, 'Diagne', 'Serigne', 'homme', 'serigne', '777777777', 'sd@pharmacie.com', '$2y$12$oIFwW.OJAGgfQWzYIVwO2ePIyneIge.FarNqmed50eObzCedqJZQK'),
(2, 'Ouoba', 'lucien', 'homme', 'luce', '771534537', 'luce@pharmacie.com', 'luce020'),
(3, 'Diaw', 'Fatoumata', 'femme', 'fatou', '787777670', 'fatou@pharmacie.com', '$2ysa$12$Hop04uGyFq0JU2c0qsXca7efxxOce9kM3PNnV98IxAFm6CxmfNwOgu'),
(4, 'Ben', 'Abdoulatif', 'homme', 'ben', '766666666', 'benalfa@pharmacie.com', '$2y$12$.8wahtXNtEBOkbNuXLTI5.b0C0pIcGIf05d7dsqOdAQpu9I.W'),
(5, 'Dembele', 'Dieydy', 'homme', 'dembele', '775554430', 'dd@pharmacie.com', '$2y$12$VyIkODXu1sdjhiojDIOb6.patFI7o6X/YXIobKdzcsBDx729q.eyG'),
(11, 'test', 'tester', 'homme', 'tester', '770123010', 'tt@gmail.com', '$2y$12$aZ2ACrKDfV0iA4mkRuoy2.QTMAbn3Wdb7hLswbfV/9JewLyfeLWeK');

-- --------------------------------------------------------

--
-- Structure de la table `pharmacien`
--

DROP TABLE IF EXISTS `pharmacien`;
CREATE TABLE IF NOT EXISTS `pharmacien` (
  `id_pharma` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(16) NOT NULL,
  `num_tel` varchar(20) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pharma`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pharmacien`
--

INSERT INTO `pharmacien` (`id_pharma`, `nom`, `prenom`, `username`, `password`, `num_tel`, `adresse`, `email`) VALUES
(1, 'admin', 'administrateur', 'admin', 'admin', '773456576', 'KENIA', 'admin@pahamacie.com'),
(2, 'luce', 'ouoba', 'luce', 'lucien', '771534537', 'DAKAR', 'luce@pharmacie.com');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `code_produit` int(11) NOT NULL AUTO_INCREMENT,
  `nom_produit` text NOT NULL,
  `prix_produit` int(11) NOT NULL,
  `emplacement` text NOT NULL,
  `date_expiration` date DEFAULT NULL,
  `quantite_stock` int(11) NOT NULL,
  PRIMARY KEY (`code_produit`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`code_produit`, `nom_produit`, `prix_produit`, `emplacement`, `date_expiration`, `quantite_stock`) VALUES
(24, 'PARACETAMOL', 100, 'Rayon 2', '2023-12-03', 12),
(13, 'ALCOOL', 3000, 'Rayon 5', '2029-03-13', 30),
(25, 'DAFALGAN', 1500, 'Rayon 1', '2030-09-01', 11),
(23, 'EFFERALGAN', 2500, 'Rayon 3', '2024-12-10', 25),
(26, 'ADVIL', 3000, 'Rayon 2', '2024-01-31', 30),
(27, 'LITACOLD', 250, 'Rayon 3', '2025-02-28', 25),
(28, 'GEL HYDRO-ALCOOLIQUE (petit modele)', 500, 'Rayon 6', '2023-07-09', 20),
(29, 'GEL HYDRO-ALCOOLIQUE (grand modele)', 1500, 'Rayon 6', '2023-07-09', 27),
(30, 'CERELAC', 2800, 'Rayon 7', '2023-07-09', 15);

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

DROP TABLE IF EXISTS `vente`;
CREATE TABLE IF NOT EXISTS `vente` (
  `id_vente` int(11) NOT NULL AUTO_INCREMENT,
  `quantite_vendue` int(11) NOT NULL,
  `prix_total` int(11) NOT NULL,
  `date_vendue` date DEFAULT NULL,
  `code_produit` int(11) NOT NULL,
  `id_pharma` int(11) DEFAULT NULL,
  `id_employe` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_vente`),
  KEY `code_produit` (`code_produit`),
  KEY `rfph` (`id_pharma`),
  KEY `rf_empl` (`id_employe`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vente`
--

INSERT INTO `vente` (`id_vente`, `quantite_vendue`, `prix_total`, `date_vendue`, `code_produit`, `id_pharma`, `id_employe`) VALUES
(1, 3, 6000, NULL, 1, 1, 1),
(2, 10, 10000, '2022-12-12', 4, 1, 0),
(3, 12, 24000, '2022-11-02', 3, 1, NULL),
(4, 12, 24000, '2022-11-02', 3, 1, NULL),
(9, 12, 24000, '2022-12-12', 3, 1, NULL),
(10, 4, 8000, '2022-12-12', 3, 1, NULL),
(8, 9, 22000, '2022-12-12', 3, 1, NULL),
(11, 4, 400, '2026-05-10', 24, 1, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
