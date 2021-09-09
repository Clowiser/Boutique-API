-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 09 sep. 2021 à 12:21
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bddex`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `idArticles` int(11) NOT NULL AUTO_INCREMENT,
  `descArticle` varchar(200) DEFAULT NULL,
  `prixArticle` float DEFAULT NULL,
  `poidsArticle` float DEFAULT NULL,
  `imgArticle` varchar(200) DEFAULT NULL,
  `nomArticle` varchar(45) DEFAULT NULL,
  `quantiteDispo` int(11) DEFAULT NULL,
  `en_vente` varchar(10) DEFAULT NULL,
  `categories` int(11) DEFAULT NULL,
  PRIMARY KEY (`idArticles`)
) ENGINE=MyISAM AUTO_INCREMENT=820 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`idArticles`, `descArticle`, `prixArticle`, `poidsArticle`, `imgArticle`, `nomArticle`, `quantiteDispo`, `en_vente`, `categories`) VALUES
(123, 'Une jolie bouteille aux couleurs de l\'espace pour transporter toutes vos boissons préférées !', 105, 1, 'https://m.media-amazon.com/images/I/71qUltY+a3L._AC_SX425_.jpg', 'Bouteille Isotherme', 110, 'oui', 1),
(456, 'Un joli mug personnalisable avec une étoile pour illuminer vos journées !', 10.5, 500, 'https://www.tutete.com/tienda/images/5d023cfb13fe5-taza_estrella_aqua_tutete_3_l.jpg', 'Mug', 1, 'oui', 1),
(789, 'Des couverts pour vous accompagner dans vos festins cosmiques !', 10.5, 500, 'https://www.crealoca.com/wp-content/uploads/2020/01/Couvert-bois-etoile-dor%C3%A9e.png', 'Couverts des étoiles', 1, 'non', 2),
(187, 'Une assiette en or qui vous rappelera la lumière des étoiles', 13, 500, 'https://la-boite-a-dragees.fr/wp-content/uploads/2019/10/Assiette-%C3%A9toile-or.jpg', 'Assiette Etoile', 0, 'oui', 2),
(266, 'Des verres pour savourer votre boisson dans l\'univers', 50, 1.2, 'https://boutique-hop.s3-eu-west-1.amazonaws.com/cache/49/51/49519721a2359757efd173b1076ab961.jpg', 'Verres de l\'Univers', 2, 'oui', 1),
(369, 'Pour rester propre et brillante comme une étoile', 500, 1.2, 'https://www.hollyparty.com/ori-serviettes-en-papier-forme-etoile-x20-3528.jpg', 'Serviettes Etoiles', 5, 'oui', 2),
(790, 'Une bouteille au logo étoilé pour retrouver toutes vos boissons préférées !', 105, 1, 'https://www.cdiscount.com/pdt2/5/3/6/1/700x700/hom8435309138536/rw/bouteille-en-verre-1-lit-etoile.jpg', 'Bouteille en Verre', 10, 'oui', 1),
(791, 'Des dessous de plats de l\'espace pour couvrir vos tables', 13, 500, 'https://d1lze4pahqmfde.cloudfront.net/https://dds-images.s3.eu-west-3.amazonaws.com/annonces/808a728be7fe20a5f396bc0270eb79b4a6bca179.jpg?twic=v1/cover=1:1', 'Dessous de plats Etoile', 0, 'oui', 3);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `idCategories` int(11) NOT NULL AUTO_INCREMENT,
  `nomCategories` varchar(50) NOT NULL,
  PRIMARY KEY (`idCategories`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`idCategories`, `nomCategories`) VALUES
(1, 'Contenants liquide'),
(2, 'Service de table'),
(3, 'Supports');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `idClient` int(10) NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(20) NOT NULL,
  `adresse` varchar(45) NOT NULL,
  `codePostal` int(20) NOT NULL,
  `ville` varchar(45) NOT NULL,
  PRIMARY KEY (`idClient`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idClient`, `identifiant`, `adresse`, `codePostal`, `ville`) VALUES
(13, 'Chuck Norris', '50 rue du Ranch', 73000, 'Chambéry'),
(23, 'Charlize Theron', '18 rue du Diable', 74000, 'Annecy'),
(42, 'Johny Vers', '72 route des Nuages', 75000, 'Paris');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `idCommandes` int(10) NOT NULL AUTO_INCREMENT,
  `dateCommandes` date NOT NULL,
  `idClient` int(10) NOT NULL,
  PRIMARY KEY (`idCommandes`),
  KEY `idClient` (`idClient`)
) ENGINE=MyISAM AUTO_INCREMENT=754 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`idCommandes`, `dateCommandes`, `idClient`) VALUES
(147, '2021-08-09', 13),
(258, '2021-08-01', 13),
(369, '2019-12-08', 23),
(753, '2021-08-04', 23),
(268, '2021-08-09', 23);

-- --------------------------------------------------------

--
-- Structure de la table `commandes_articles`
--

DROP TABLE IF EXISTS `commandes_articles`;
CREATE TABLE IF NOT EXISTS `commandes_articles` (
  `idCommandes_Articles` int(11) NOT NULL AUTO_INCREMENT,
  `quantite` int(11) NOT NULL,
  `idCommandes` int(10) NOT NULL,
  `idArticles` int(10) NOT NULL,
  PRIMARY KEY (`idCommandes_Articles`),
  KEY `idCommandes` (`idCommandes`),
  KEY `idArticles` (`idArticles`)
) ENGINE=MyISAM AUTO_INCREMENT=334 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commandes_articles`
--

INSERT INTO `commandes_articles` (`idCommandes_Articles`, `quantite`, `idCommandes`, `idArticles`) VALUES
(321, 1, 147, 123),
(322, 2, 147, 456),
(323, 1, 258, 369),
(324, 2, 258, 266),
(325, 1, 369, 123),
(326, 1, 369, 266),
(327, 2, 753, 456),
(328, 1, 753, 369),
(329, 1, 268, 123),
(330, 1, 268, 369),
(331, 1, 951, 369),
(332, 2, 951, 123),
(333, 3, 951, 266);

-- --------------------------------------------------------

--
-- Structure de la table `token`
--

DROP TABLE IF EXISTS `token`;
CREATE TABLE IF NOT EXISTS `token` (
  `idToken` int(11) NOT NULL AUTO_INCREMENT,
  `Token` varchar(255) NOT NULL,
  PRIMARY KEY (`idToken`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `token`
--

INSERT INTO `token` (`idToken`, `Token`) VALUES
(1, 'eyJhbGciOiJIUzI1NiJ9.eyJSb2xlIjoiQWRtaW4iLCJJc3N1ZXIiOiJJc3N1ZXIiLCJVc2VybmFtZSI6IkphdmFJblVzZSIsImV4cCI6MTYzMTE4ODEwNSwiaWF0IjoxNjMxMTg4MTA1fQ.8vZkI4qv8nr8pS5QR1RCbY96VcMP7RGbWFiowvGF3Pk');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
