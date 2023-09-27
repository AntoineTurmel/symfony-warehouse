-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 27 sep. 2023 à 17:12
-- Version du serveur :  10.3.38-MariaDB-0ubuntu0.20.04.1
-- Version de PHP : 7.3.33-14+ubuntu20.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `app`
--

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230923122212', '2023-09-23 14:22:40', 58);

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `reference`) VALUES
(1, 'Chaussure de ville Converse', 'Nouveau modèle converse', 'CON123'),
(2, 'Chaussures à talons', 'Couleur noire', 'TAL001'),
(3, 'Escarpins', 'Rouge flashy', 'ESC001'),
(4, 'Bottines', 'Modèle homme marron', 'BOT001'),
(5, 'Bottes de pluie', 'Modèle enfant', 'BOT002'),
(6, 'Crocs Rose', 'Édition limitée Barbie', 'CRO001'),
(7, 'Tongs Plage', 'Couleur bleu', 'TON001'),
(8, 'Chaussons unisexe', 'Confort maximal', 'CHA001'),
(9, 'Chelsea Boots', 'Couleur noir homme', 'CHE001'),
(10, 'Sandales unisexe', 'Couleur grise', 'SAN001');

--
-- Déchargement des données de la table `product_size`
--

INSERT INTO `product_size` (`id`, `product_id_id`, `size`) VALUES
(1, 5, '12'),
(2, 5, '14'),
(3, 5, '16'),
(4, 4, '32'),
(5, 4, '33'),
(6, 4, '34'),
(7, 5, '35'),
(8, 8, '40'),
(9, 8, '35'),
(10, 8, '42'),
(11, 8, '43'),
(12, 1, '42'),
(13, 1, '43'),
(14, 1, '44'),
(15, 2, '35'),
(16, 2, '33'),
(17, 2, '34'),
(18, 9, '42'),
(19, 9, '41'),
(20, 9, '40'),
(21, 6, '32'),
(22, 6, '34'),
(23, 6, '35'),
(24, 3, '32'),
(25, 3, '31'),
(26, 3, '30'),
(27, 10, '43'),
(28, 10, '42'),
(29, 10, '30'),
(30, 7, '35'),
(31, 7, '32'),
(32, 7, '31'),
(33, 4, '39'),
(34, 9, '45'),
(35, 1, '50'),
(36, 3, '40');

--
-- Déchargement des données de la table `reception`
--

INSERT INTO `reception` (`id`, `product_size_id_id`, `warehouse_id_id`, `qty`, `available_at`) VALUES
(1, 1, 3, 5, NULL),
(2, 1, 1, 5, '2023-09-30 23:28:20'),
(3, 2, 3, 2, NULL),
(4, 2, 4, 2, NULL),
(5, 2, 2, 7, '2023-09-29 23:28:20'),
(6, 3, 3, 2, NULL),
(7, 26, 4, 12, '2023-09-29 23:28:20'),
(10, 25, 3, 1, NULL),
(11, 25, 4, 6, '2023-09-30 23:28:20'),
(15, 24, 3, 1, NULL),
(16, 24, 2, 9, NULL),
(17, 21, 1, 6, NULL),
(18, 21, 3, 3, '2023-09-29 23:28:20'),
(19, 4, 1, 3, NULL),
(20, 4, 3, 9, '2023-09-29 23:28:20'),
(21, 5, 3, 5, '2023-09-28 23:32:47'),
(22, 5, 1, 2, NULL),
(23, 5, 2, 1, NULL),
(24, 16, 3, 1, '2023-09-29 23:32:47'),
(25, 16, 2, 2, NULL),
(26, 6, 3, 1, NULL),
(27, 6, 4, 7, NULL),
(28, 17, 1, 1, NULL),
(29, 17, 4, 9, NULL),
(30, 22, 3, 3, NULL),
(31, 22, 4, 2, '2023-09-29 23:32:47'),
(32, 23, 3, 1, NULL),
(33, 23, 1, 2, NULL),
(34, 23, 4, 8, NULL),
(35, 23, 2, 1, NULL),
(38, 7, 3, 1, NULL),
(39, 7, 2, 2, NULL),
(40, 15, 4, 14, NULL),
(41, 9, 1, 7, NULL),
(42, 9, 4, 2, '2023-09-30 23:36:19'),
(43, 9, 2, 3, NULL),
(44, 9, 3, 1, NULL),
(45, 8, 3, 1, NULL),
(46, 8, 1, 1, NULL),
(47, 20, 2, 12, '2023-09-28 23:36:19'),
(48, 20, 3, 1, NULL),
(49, 19, 1, 2, NULL),
(50, 19, 2, 3, NULL),
(51, 10, 3, 9, NULL),
(52, 10, 1, 2, '2023-09-28 23:36:19'),
(53, 12, 3, 9, NULL),
(54, 12, 1, 1, NULL),
(55, 18, 1, 3, NULL),
(56, 18, 4, 1, NULL),
(59, 11, 2, 20, NULL),
(60, 11, 3, 1, '2023-09-28 23:36:19'),
(106, 13, 3, 8, NULL),
(107, 13, 1, 3, NULL),
(108, 13, 2, 1, NULL),
(111, 14, 3, 9, NULL),
(112, 14, 1, 1, NULL),
(113, 14, 4, 2, NULL),
(114, 14, 2, 1, NULL),
(115, 1, 1, 7, '2023-09-29 01:09:12'),
(116, 21, 2, 10, '2023-09-30 01:10:51'),
(117, 26, 4, 7, '2023-09-30 16:41:26');

--
-- Déchargement des données de la table `warehouse`
--

INSERT INTO `warehouse` (`id`, `address`, `postal_code`, `city`) VALUES
(1, '39 Rue de la Mainguais', '44300', 'Carquefou'),
(2, 'Chemin du Pot au Pin', '33610', 'Cestas'),
(3, '36 Avenue Louis de Broglie', '87280', 'Limoges'),
(4, '2102 Rue Denis Papin', '77550', 'Réau');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
