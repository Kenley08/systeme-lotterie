-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 30 mai 2020 à 15:41
-- Version du serveur :  10.1.29-MariaDB
-- Version de PHP :  7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_lotterie`
--

-- --------------------------------------------------------

--
-- Structure de la table `tbladministration`
--

CREATE TABLE `tbladministration` (
  `id_admin` varchar(200) NOT NULL,
  `type_admin_id` int(11) NOT NULL,
  `nom_complet` varchar(200) NOT NULL,
  `pin` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `ville_id` varchar(200) NOT NULL,
  `adresse_complete` varchar(200) NOT NULL,
  `etat` int(11) NOT NULL,
  `date_ajout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modifier` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbladministration`
--

INSERT INTO `tbladministration` (`id_admin`, `type_admin_id`, `nom_complet`, `pin`, `email`, `telephone`, `ville_id`, `adresse_complete`, `etat`, `date_ajout`, `date_modifier`) VALUES
('158938582588', 2, 'Fleurine Kenley', '0822', 'fleurinekenley@gmail.com', '47663774', '1', 'tabarre,36', 1, '2020-05-29 16:56:32', '2020-05-13 16:03:45'),
('158938604558', 2, 'Sandeline Pierre Simon', '0881', 'sandy@gmail.com', '44212211', '66', 'rue rebecca impasse Lalo,#23', 1, '2020-05-26 18:52:56', '2020-05-13 16:07:26'),
('158938633455', 3, 'Willy Jean', '00123', 'Wjean9012r@gmail.com', '47663372', '143', 'rue rubin impasse rounier,#23', 1, '2020-05-29 16:01:19', '2020-05-13 16:12:14'),
('158957518532', 2, 'Gina Fleurine', '0810', 'ginafleurine@gmail.com', '12121212', '4', 'tabarre', 1, '2020-05-29 15:15:22', '2020-05-15 20:39:45'),
('15905039773', 3, 'Judelin Fleurine', '0813', 'judelin09@gmail.com', '44090934', '4', 'rue rebecca impasse Lalo,#23', 1, '2020-05-29 15:15:27', '2020-05-26 14:39:37'),
('159052348348', 1, 'Billy Russeau', '0821', 'billyrusse@gmail.com', '32325453', '70', 'carrefour Rita', 1, '2020-05-30 13:31:03', '2020-05-26 20:04:43'),
('159076413051', 2, 'Sasou', '0890', 'sasou09@gmail.com', '44090931', '2', 'rue rebecca impasse Lalo,#23', 1, '2020-05-29 16:56:03', '2020-05-29 14:55:30'),
('159076511332', 3, 'Nadine Larosiliere', '0112', 'nadine@larosiliere', '47663300', '9', 'tabarre21', 1, '2020-05-29 16:55:51', '2020-05-29 15:11:53'),
('23812237695', 3, 'Douby Frantz', '1245', 'doubyfrantz@gmail.com', '43456567', '65', 'delmas 40 b,impasse le rocher', 1, '2020-05-26 19:14:13', '2020-05-19 05:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `tblboule`
--

CREATE TABLE `tblboule` (
  `id_boule` varchar(200) NOT NULL,
  `type_boule_id` varchar(200) NOT NULL,
  `boule` varchar(20) NOT NULL,
  `prix` int(11) NOT NULL,
  `fiche_id` varchar(200) NOT NULL,
  `date_ajout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modifier` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblboule`
--

INSERT INTO `tblboule` (`id_boule`, `type_boule_id`, `boule`, `prix`, `fiche_id`, `date_ajout`, `date_modifier`) VALUES
('158991923116', '1', '06', 30, '158991923155', '2020-05-19 20:13:51', '2020-05-19 20:13:51'),
('158991924445', '1', '25', 25, '158991923155', '2020-05-19 20:14:04', '2020-05-19 20:14:04'),
('158991929184', '5', '25*30', 10, '158991929141', '2020-05-19 20:14:51', '2020-05-19 20:14:51'),
('158991935231', '1', '11', 50, '158991935251', '2020-05-19 20:15:52', '2020-05-19 20:15:52'),
('158991936129', '1', '28', 30, '158991935251', '2020-05-19 20:16:01', '2020-05-19 20:16:01'),
('158991938378', '2', '00', 30, '158991938352', '2020-05-19 20:16:23', '2020-05-19 20:16:23'),
('158991946937', '1', '20', 10, '15899194695', '2020-05-19 20:17:49', '2020-05-19 20:17:49'),
('158991948363', '1', '66', 40, '15899194695', '2020-05-19 20:18:03', '2020-05-19 20:18:03'),
('158991950569', '2', '066', 60, '158991950595', '2020-05-19 20:18:25', '2020-05-19 20:18:25'),
('158991958299', '5', '25*30', 5, '158991958247', '2020-05-19 20:19:43', '2020-05-19 20:19:43'),
('158991960099', '5', '30*06', 10, '158991958247', '2020-05-19 20:20:00', '2020-05-19 20:20:00'),
('158991961235', '1', '75', 30, '158991958247', '2020-05-19 20:20:12', '2020-05-19 20:20:12');

-- --------------------------------------------------------

--
-- Structure de la table `tblconnexion`
--

CREATE TABLE `tblconnexion` (
  `id_connexion` varchar(200) NOT NULL,
  `admin_id` varchar(200) NOT NULL,
  `etat` int(11) NOT NULL,
  `date_ajout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblconnexion`
--

INSERT INTO `tblconnexion` (`id_connexion`, `admin_id`, `etat`, `date_ajout`) VALUES
('158940886274', '158938582588', 1, '2020-05-13 22:27:42'),
('15894090098', '158938582588', 0, '2020-05-13 22:30:09'),
('158957114742', '158938582588', 0, '2020-05-15 19:32:27');

-- --------------------------------------------------------

--
-- Structure de la table `tblentreprise`
--

CREATE TABLE `tblentreprise` (
  `id_entreprise` varchar(200) NOT NULL,
  `admin_id` varchar(200) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `ville_id` int(11) NOT NULL,
  `adresse_complete` varchar(200) NOT NULL,
  `etat` int(11) NOT NULL,
  `date_ajout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modifier` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblentreprise`
--

INSERT INTO `tblentreprise` (`id_entreprise`, `admin_id`, `nom`, `logo`, `ville_id`, `adresse_complete`, `etat`, `date_ajout`, `date_modifier`) VALUES
('158902317669', '158957518532', 'Titi Bank', '', 1, 'la vallee,nimero 10', 1, '2020-05-21 14:32:22', '2020-05-19 05:00:00'),
('198122317601', '158938582588', 'Lesly Center', '', 143, 'Routes Freres,Au bord de commisariat', 1, '2020-05-21 14:31:48', '2020-05-19 05:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `tblentrepriseadmin`
--

CREATE TABLE `tblentrepriseadmin` (
  `id_ent_admin` varchar(200) NOT NULL,
  `admin_id` varchar(200) NOT NULL,
  `entreprise_id` varchar(200) NOT NULL,
  `date_ajout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modifier` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblentrepriseadmin`
--

INSERT INTO `tblentrepriseadmin` (`id_ent_admin`, `admin_id`, `entreprise_id`, `date_ajout`, `date_modifier`) VALUES
('009059562011', '159059542070', '198122317601', '2020-05-29 15:24:51', '2020-05-29 04:00:00'),
('150122348112', '159052348348', '198122317601', '2020-05-29 15:21:11', '2020-05-29 04:00:00'),
('15907641301', '159076413051', '198122317601', '2020-05-29 14:55:30', '2020-05-29 14:55:30'),
('159076511345', '159076511332', '198122317601', '2020-05-29 15:11:53', '2020-05-29 15:11:53'),
('209938232509', '158938582588', '198122317601', '2020-05-29 15:14:25', '2020-05-29 04:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `tblfiche`
--

CREATE TABLE `tblfiche` (
  `id_fiche` varchar(200) NOT NULL,
  `prix_total` bigint(20) NOT NULL,
  `admin_id` varchar(200) NOT NULL,
  `etat` int(11) NOT NULL,
  `paye` int(11) NOT NULL,
  `date_ajout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modifier` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblfiche`
--

INSERT INTO `tblfiche` (`id_fiche`, `prix_total`, `admin_id`, `etat`, `paye`, `date_ajout`, `date_modifier`) VALUES
('158991925231', 55, '158938633455', 1, 0, '2020-05-19 20:14:12', '2020-05-19 20:14:12'),
('158991929265', 10, '158938633455', 1, 0, '2020-05-19 20:14:52', '2020-05-19 20:14:52'),
('158991936284', 80, '158938633455', 1, 0, '2020-05-20 20:16:02', '2020-05-19 20:16:02'),
('158991938493', 30, '158938633455', 1, 0, '2020-05-21 20:16:24', '2020-05-19 20:16:24'),
('158991948529', 50, '158938604558', 1, 0, '2020-05-19 20:18:05', '2020-05-19 20:18:05'),
('158991950671', 60, '158938604558', 1, 0, '2020-05-19 20:18:26', '2020-05-19 20:18:26'),
('158991961337', 45, '23812237695', 1, 0, '2020-05-22 20:20:13', '2020-05-19 20:20:13'),
('158993330460', 50, '23812237695', 1, 0, '2020-05-24 00:08:24', '2020-05-20 00:08:24');

-- --------------------------------------------------------

--
-- Structure de la table `tblhistoricite`
--

CREATE TABLE `tblhistoricite` (
  `id_his` varchar(200) NOT NULL,
  `admin_id` varchar(200) NOT NULL,
  `action` varchar(200) NOT NULL,
  `date_ajout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tblhistoriciteaction`
--

CREATE TABLE `tblhistoriciteaction` (
  `id_his_action` varchar(200) NOT NULL,
  `action` varchar(200) NOT NULL,
  `etat` int(11) NOT NULL,
  `date_ajout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modifier` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tblpost`
--

CREATE TABLE `tblpost` (
  `id_post` varchar(200) NOT NULL,
  `admin_id` varchar(200) NOT NULL,
  `surcussale_id` varchar(200) NOT NULL,
  `etat` int(11) NOT NULL,
  `date_ajout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modifier` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblpost`
--

INSERT INTO `tblpost` (`id_post`, `admin_id`, `surcussale_id`, `etat`, `date_ajout`, `date_modifier`) VALUES
('09412097611', '158938633455', '348902310239', 1, '2020-05-29 16:01:19', '2020-05-29 16:01:19'),
('217602310220', '158938604558', '43812097612', 1, '2020-05-19 15:29:26', '2020-05-19 15:29:26'),
('03212007663', '23812237695', '348902310239', 1, '2020-05-26 19:14:13', '2020-05-26 19:14:13'),
('008938582500', '158938582588', '158902317618', 1, '2020-05-26 19:26:19', '2020-05-26 19:26:19'),
('159050397780', '15905039773', '348902310239', 1, '2020-05-26 14:39:37', '2020-05-26 14:39:37'),
('159052343330', '159052343374', '43812097612', 1, '2020-05-26 20:03:53', '2020-05-26 20:03:53'),
('159052348361', '159052348348', '43812097612', 1, '2020-05-26 20:04:43', '2020-05-26 20:04:43'),
('159059542015', '159059542070', '348902310239', 1, '2020-05-27 16:03:40', '2020-05-27 16:03:40');

-- --------------------------------------------------------

--
-- Structure de la table `tblsurcussale`
--

CREATE TABLE `tblsurcussale` (
  `id_surcussale` varchar(200) NOT NULL,
  `entreprise_id` varchar(200) NOT NULL,
  `ville_id` varchar(200) NOT NULL,
  `adresse_complete` varchar(200) NOT NULL,
  `etat` int(11) NOT NULL,
  `date_ajout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modifier` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblsurcussale`
--

INSERT INTO `tblsurcussale` (`id_surcussale`, `entreprise_id`, `ville_id`, `adresse_complete`, `etat`, `date_ajout`, `date_modifier`) VALUES
('158902317618', '158902317669', '64', 'carrefour lamatin 52', 1, '2020-05-15 18:30:12', '2020-05-15 18:30:12'),
('15892005504', '158902317669', '65', 'delmas 48', 1, '2020-05-17 14:34:29', '2020-05-17 14:34:29'),
('348902310239', '198122317601', '60', 'carrefour,Lamantin5 4', 1, '2020-05-22 17:00:03', '2020-05-22 17:00:03'),
('43812097612', '198122317601', '60', 'Carrefour,block 18', 1, '2020-05-19 15:29:26', '2020-05-19 15:29:26'),
('454302347611', '158902317669', '65', 'Delmas 42', 1, '2020-05-14 17:43:18', '2020-05-14 17:43:18');

-- --------------------------------------------------------

--
-- Structure de la table `tbltypeadministration`
--

CREATE TABLE `tbltypeadministration` (
  `id_type_admin` int(11) NOT NULL,
  `type_admin` varchar(100) NOT NULL,
  `etat` int(11) NOT NULL,
  `date_ajout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modifier` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbltypeadministration`
--

INSERT INTO `tbltypeadministration` (`id_type_admin`, `type_admin`, `etat`, `date_ajout`, `date_modifier`) VALUES
(1, 'Admin', 1, '2020-05-08 17:00:03', '2020-05-08 05:00:00'),
(2, 'Super Admin', 1, '2020-05-08 05:00:00', '2020-05-08 05:00:00'),
(3, 'Caisser', 1, '2020-05-08 05:00:00', '2020-05-08 05:00:00'),
(4, 'Superviseur', 1, '2020-05-08 05:00:00', '2020-05-08 05:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `tbltypeboule`
--

CREATE TABLE `tbltypeboule` (
  `id_type_boule` int(11) NOT NULL,
  `type_boule` varchar(200) NOT NULL,
  `etat` int(11) NOT NULL,
  `date_ajout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modifier` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbltypeboule`
--

INSERT INTO `tbltypeboule` (`id_type_boule`, `type_boule`, `etat`, `date_ajout`, `date_modifier`) VALUES
(1, 'Simple', 1, '2020-05-09 05:00:00', '2020-05-09 05:00:00'),
(2, 'Lotto 3 chiffres', 1, '2020-05-09 05:00:00', '2020-05-09 05:00:00'),
(3, 'Lotto 4 chiffres', 1, '2020-05-09 05:00:00', '2020-05-09 05:00:00'),
(4, 'Lotto 5 chiffres', 1, '2020-05-09 05:00:00', '2020-05-09 05:00:00'),
(5, 'Mariage', 1, '2020-05-09 05:00:00', '2020-05-09 05:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `tblville`
--

CREATE TABLE `tblville` (
  `id_ville` int(11) NOT NULL,
  `id_etat` int(11) NOT NULL,
  `nom_ville` varchar(50) NOT NULL,
  `date_ajout` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblville`
--

INSERT INTO `tblville` (`id_ville`, `id_etat`, `nom_ville`, `date_ajout`) VALUES
(1, 1, 'Acul-du-Nord', '2019-09-08'),
(2, 1, 'Plaine-du-Nord', '2019-09-08'),
(3, 1, 'Milot', '2019-09-08'),
(4, 1, 'Borgne', '2019-09-08'),
(5, 1, 'Port-Margot', '2019-09-08'),
(6, 1, 'Cap-Haitien', '2019-09-08'),
(7, 1, 'Limonade', '2019-09-08'),
(8, 1, 'Quartier-Morin', '2019-09-08'),
(9, 1, 'Grande-Riviere-du-Nord', '2019-09-08'),
(10, 1, 'Bahon', '2019-09-08'),
(11, 1, 'Limbe', '2019-09-08'),
(12, 1, 'Bas-Limbe', '2019-09-08'),
(13, 1, 'Plaisance', '2019-09-08'),
(14, 1, 'Pilate', '2019-09-08'),
(15, 1, 'Saint-Raphael', '2019-09-08'),
(16, 1, 'Dondon', '2019-09-08'),
(17, 1, 'Ranquitte', '2019-09-08'),
(18, 1, 'Pignon', '2019-09-08'),
(19, 1, 'La Victoire', '2019-09-08'),
(20, 2, 'Aquin', '2019-09-08'),
(21, 2, 'Cavaillon', '2019-09-08'),
(22, 2, 'Saint-Louis-du-Sud', '2019-09-08'),
(23, 2, 'Cayes', '2019-09-08'),
(24, 2, 'Camp-Perrin', '2019-09-08'),
(25, 2, 'Cornillon', '2019-09-08'),
(26, 2, 'Chantal', '2019-09-08'),
(27, 2, 'Maniche', '2019-09-08'),
(28, 2, 'Ile-a-Vache', '2019-09-08'),
(29, 2, 'Torbeck', '2019-09-08'),
(30, 2, 'Chardonnieres', '2019-09-08'),
(31, 2, 'Les Anglais', '2019-09-08'),
(32, 2, 'Tiburon', '2019-09-08'),
(33, 2, 'Port-a-Piment', '2019-09-08'),
(34, 2, 'Roche-a-Bateau', '2019-09-08'),
(35, 2, 'Port-Salut', '2019-09-08'),
(36, 2, 'Arniquet', '2019-09-08'),
(37, 2, 'Saint-Jean-du-Sud', '2019-09-08'),
(38, 3, 'Cerca-la-Source', '2019-09-08'),
(39, 3, 'Thomassique', '2019-09-08'),
(40, 3, 'Hinche', '2019-09-08'),
(41, 3, 'Cerca-Carvajal', '2019-09-08'),
(42, 3, 'Maissade', '2019-09-08'),
(43, 3, 'Thomonde', '2019-09-08'),
(44, 3, 'Lascahobas', '2019-09-08'),
(45, 3, 'Belladere', '2019-09-08'),
(46, 3, 'Anse-Rouge', '2019-09-08'),
(47, 3, 'Savanette', '2019-09-08'),
(48, 3, 'Mirebalais', '2019-09-08'),
(49, 3, 'Saut-d-eau', '2019-09-08'),
(50, 3, 'Boucan-Carre', '2019-09-08'),
(51, 4, 'Arcahaie', '2019-09-08'),
(52, 4, 'Cabaret', '2019-09-08'),
(53, 4, 'Croix-des-Bouquets', '2019-09-08'),
(54, 4, 'Ganthier', '2019-09-08'),
(55, 4, 'Thomazeau', '2019-09-08'),
(56, 4, 'Cornillon', '2019-09-08'),
(57, 4, 'Fonds-Verrettes', '2019-09-08'),
(58, 4, 'Anse-a-Galets', '2019-09-08'),
(59, 4, 'Pointe-a-Raquette', '2019-09-08'),
(60, 4, 'Leogane', '2019-09-08'),
(61, 4, 'Petit-Goave', '2019-09-08'),
(62, 4, 'Grand-Goave', '2019-09-08'),
(63, 4, 'Port-au-Prince', '2019-09-08'),
(64, 4, 'Carrefour', '2019-09-08'),
(65, 4, 'Delmas', '2019-09-08'),
(66, 4, 'Petion-ville', '2019-09-08'),
(67, 4, 'Kenscoff', '2019-09-08'),
(68, 4, 'Cite-Soleil', '2019-09-08'),
(69, 4, 'Gressier', '2019-09-08'),
(70, 4, 'Tabarre', '2019-09-08'),
(71, 5, 'Bainet', '2019-09-08'),
(72, 5, 'Thiotte', '2019-09-08'),
(73, 5, 'Grand-Gossier', '2019-09-08'),
(74, 5, 'Jacmel', '2019-09-08'),
(75, 5, 'Cotes-de-Fer', '2019-09-08'),
(76, 5, 'Vallee-de-Jacmel', '2019-09-08'),
(77, 5, 'Belle-Anse', '2019-09-08'),
(78, 5, 'Anse-a-Pittes', '2019-09-08'),
(79, 5, 'Cayes-Jacmel', '2019-09-08'),
(80, 5, 'Marigot', '2019-09-08'),
(81, 6, 'Dessalines', '2019-09-08'),
(82, 6, 'Desdunes', '2019-09-08'),
(83, 6, 'Grande-Saline', '2019-09-08'),
(84, 6, 'Petite-Riviere-de-l-Artibonite', '2019-09-08'),
(85, 6, 'Gonaives', '2019-09-08'),
(86, 6, 'Ennery', '2019-09-08'),
(87, 6, 'Estere', '2019-09-08'),
(88, 6, 'Gros-Morne', '2019-09-08'),
(89, 6, 'Anse-Rouge', '2019-09-08'),
(90, 6, 'Terre-Neuve', '2019-09-08'),
(91, 6, 'Marmelade', '2019-09-08'),
(92, 6, 'Saint-Michel-de-lAttalaye', '2019-09-08'),
(93, 6, 'Saint-marc', '2019-09-08'),
(94, 6, 'Verrettes', '2019-09-08'),
(95, 6, 'La Chapelle', '2019-09-08'),
(96, 7, 'Fort-Liberte', '2019-09-08'),
(97, 7, 'Perches', '2019-09-08'),
(98, 7, 'Ferrier', '2019-09-08'),
(99, 7, 'Ouanaminthe', '2019-09-08'),
(100, 7, 'Capotille', '2019-09-08'),
(101, 7, 'Mont-Organise', '2019-09-08'),
(102, 7, 'Trou-du-Nord', '2019-09-08'),
(103, 7, 'Caracol', '2019-09-08'),
(104, 7, 'Sainte-Suzanne', '2019-09-08'),
(105, 7, 'Terrier-Rouge', '2019-09-08'),
(106, 7, 'Vallieres', '2019-09-08'),
(107, 7, 'Carice', '2019-09-08'),
(108, 7, 'Mombin-Crochu', '2019-09-08'),
(109, 8, 'Mole-Saint-Nicolas', '2019-09-08'),
(110, 8, 'Baie-de-Henne', '2019-09-08'),
(111, 8, 'Bombardopolis', '2019-09-08'),
(112, 8, 'Jean-Rabel', '2019-09-08'),
(113, 8, 'Port-de-Paix', '2019-09-08'),
(114, 8, 'Bassin-Bleu', '2019-09-08'),
(115, 8, 'Chansolme', '2019-09-08'),
(116, 8, 'La Tortue', '2019-09-08'),
(117, 8, 'Saint-Louis-du-Nord', '2019-09-08'),
(118, 8, 'Anse-a-Foleur', '2019-09-08'),
(119, 9, 'Miragoane', '2019-09-08'),
(120, 9, 'Petite-Riviere-de-Nippes', '2019-09-08'),
(121, 9, 'Fonds-des-Negres', '2019-09-08'),
(122, 9, 'Paillant', '2019-09-08'),
(123, 9, 'Anse-a-Veau', '2019-09-08'),
(124, 9, 'lAsile', '2019-09-08'),
(125, 9, 'Petit-Trou-de-Nippes', '2019-09-08'),
(126, 9, 'Plaisance-de-Sud', '2019-09-08'),
(127, 9, 'Arnaud', '2019-09-08'),
(128, 9, 'Barraderes', '2019-09-08'),
(129, 9, 'Grand-Boucan', '2019-09-08'),
(130, 10, 'Anse-dAinault', '2019-09-08'),
(131, 10, 'Dame-Marie', '2019-09-08'),
(132, 10, 'Les Irois', '2019-09-08'),
(133, 10, 'Corail', '2019-09-08'),
(134, 10, 'Roseaux', '2019-09-08'),
(135, 10, 'Beaumont', '2019-09-08'),
(136, 10, 'Pestel', '2019-09-08'),
(137, 10, 'Belladere', '2019-09-08'),
(138, 10, 'Jeremie', '2019-09-08'),
(139, 10, 'Abricots', '2019-09-08'),
(140, 10, 'Trou-Bonbon', '2019-09-08'),
(141, 10, 'Moron', '2019-09-08'),
(142, 10, 'Chambellan', '2019-09-08'),
(143, 1, 'Route-Freres', '2020-03-28'),
(145, 1, 'Centre-Ville', '2020-03-28');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tbladministration`
--
ALTER TABLE `tbladministration`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `tblboule`
--
ALTER TABLE `tblboule`
  ADD PRIMARY KEY (`id_boule`);

--
-- Index pour la table `tblconnexion`
--
ALTER TABLE `tblconnexion`
  ADD PRIMARY KEY (`id_connexion`);

--
-- Index pour la table `tblentreprise`
--
ALTER TABLE `tblentreprise`
  ADD PRIMARY KEY (`id_entreprise`);

--
-- Index pour la table `tblentrepriseadmin`
--
ALTER TABLE `tblentrepriseadmin`
  ADD PRIMARY KEY (`id_ent_admin`);

--
-- Index pour la table `tblfiche`
--
ALTER TABLE `tblfiche`
  ADD PRIMARY KEY (`id_fiche`);

--
-- Index pour la table `tblhistoricite`
--
ALTER TABLE `tblhistoricite`
  ADD PRIMARY KEY (`id_his`);

--
-- Index pour la table `tblhistoriciteaction`
--
ALTER TABLE `tblhistoriciteaction`
  ADD PRIMARY KEY (`id_his_action`);

--
-- Index pour la table `tblsurcussale`
--
ALTER TABLE `tblsurcussale`
  ADD PRIMARY KEY (`id_surcussale`);

--
-- Index pour la table `tbltypeadministration`
--
ALTER TABLE `tbltypeadministration`
  ADD PRIMARY KEY (`id_type_admin`);

--
-- Index pour la table `tbltypeboule`
--
ALTER TABLE `tbltypeboule`
  ADD PRIMARY KEY (`id_type_boule`);

--
-- Index pour la table `tblville`
--
ALTER TABLE `tblville`
  ADD PRIMARY KEY (`id_ville`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tblville`
--
ALTER TABLE `tblville`
  MODIFY `id_ville` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
