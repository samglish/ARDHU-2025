-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Ven 24 Octobre 2025 à 23:54
-- Version du serveur :  5.7.27-0ubuntu0.18.04.1
-- Version de PHP :  7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ahnens9421_enspm`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'departement ahn', '1234'),
(2, 'admin', '1234'),
(3, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `amis`
--

CREATE TABLE `amis` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ami_id` int(11) NOT NULL,
  `statut` enum('en_attente','accepte','refuse') DEFAULT 'accepte',
  `date_ajout` datetime DEFAULT CURRENT_TIMESTAMP,
  `photo_profil` varchar(255) DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `amis`
--

INSERT INTO `amis` (`id`, `user_id`, `ami_id`, `statut`, `date_ajout`, `photo_profil`) VALUES
(33, 27, 27, 'accepte', '2025-10-02 06:55:45', 'default.jpg'),
(36, 13, 32, 'accepte', '2025-10-02 12:58:42', 'default.jpg'),
(37, 32, 13, 'accepte', '2025-10-02 12:58:57', 'default.jpg'),
(38, 33, 32, 'accepte', '2025-10-02 13:11:05', 'default.jpg'),
(39, 32, 33, 'accepte', '2025-10-02 13:11:30', 'default.jpg'),
(40, 34, 32, 'en_attente', '2025-10-02 13:16:00', 'default.jpg'),
(41, 36, 13, 'accepte', '2025-10-02 13:19:59', 'default.jpg'),
(42, 13, 36, 'accepte', '2025-10-02 13:20:07', 'default.jpg'),
(43, 33, 36, 'accepte', '2025-10-02 13:23:31', 'default.jpg'),
(44, 36, 33, 'accepte', '2025-10-02 13:23:45', 'default.jpg'),
(45, 35, 34, 'accepte', '2025-10-02 13:25:58', 'default.jpg'),
(46, 34, 35, 'accepte', '2025-10-02 13:26:20', 'default.jpg'),
(47, 27, 27, 'accepte', '2025-10-02 16:48:55', 'default.jpg'),
(48, 13, 17, 'accepte', '2025-10-04 03:24:27', 'default.jpg'),
(49, 13, 28, 'accepte', '2025-10-04 03:24:44', 'default.jpg'),
(50, 13, 18, 'en_attente', '2025-10-04 03:29:09', 'default.jpg'),
(51, 13, 23, 'accepte', '2025-10-04 03:29:09', 'default.jpg'),
(52, 13, 35, 'accepte', '2025-10-04 03:29:09', 'default.jpg'),
(53, 23, 13, 'accepte', '2025-10-04 12:50:34', 'default.jpg'),
(54, 23, 27, 'accepte', '2025-10-04 12:51:13', 'default.jpg'),
(55, 35, 36, 'en_attente', '2025-10-04 13:46:32', 'default.jpg'),
(57, 13, 29, 'accepte', '2025-10-04 14:32:52', 'default.jpg'),
(58, 13, 33, 'accepte', '2025-10-04 14:32:55', 'default.jpg'),
(59, 13, 34, 'en_attente', '2025-10-04 14:32:57', 'default.jpg'),
(60, 13, 37, 'en_attente', '2025-10-04 14:33:00', 'default.jpg'),
(61, 13, 38, 'en_attente', '2025-10-04 14:33:02', 'default.jpg'),
(62, 13, 39, 'en_attente', '2025-10-04 14:33:04', 'default.jpg'),
(63, 13, 59, 'accepte', '2025-10-04 14:33:06', 'default.jpg'),
(65, 27, 23, 'accepte', '2025-10-04 15:06:57', 'default.jpg'),
(66, 27, 29, 'accepte', '2025-10-04 15:07:10', 'default.jpg'),
(67, 27, 34, 'en_attente', '2025-10-04 15:07:19', 'default.jpg'),
(68, 27, 13, 'accepte', '2025-10-04 15:10:44', 'default.jpg'),
(69, 27, 36, 'en_attente', '2025-10-04 15:11:32', 'default.jpg'),
(70, 27, 35, 'accepte', '2025-10-04 15:11:55', 'default.jpg'),
(71, 35, 13, 'accepte', '2025-10-04 16:07:00', 'default.jpg'),
(72, 35, 27, 'accepte', '2025-10-04 16:07:05', 'default.jpg'),
(73, 35, 33, 'accepte', '2025-10-04 16:08:08', 'default.jpg'),
(74, 33, 13, 'accepte', '2025-10-04 16:08:32', 'default.jpg'),
(75, 33, 35, 'accepte', '2025-10-04 16:08:37', 'default.jpg'),
(76, 33, 38, 'en_attente', '2025-10-04 16:09:40', 'default.jpg'),
(77, 59, 13, 'accepte', '2025-10-04 16:33:53', 'default.jpg'),
(78, 13, 27, 'accepte', '2025-10-04 17:02:51', 'default.jpg'),
(79, 82, 13, 'accepte', '2025-10-04 17:35:31', 'default.jpg'),
(80, 82, 17, 'accepte', '2025-10-04 17:35:37', 'default.jpg'),
(81, 82, 27, 'accepte', '2025-10-04 17:35:49', 'default.jpg'),
(82, 28, 13, 'accepte', '2025-10-04 19:06:37', 'default.jpg'),
(84, 28, 32, 'en_attente', '2025-10-04 19:06:52', 'default.jpg'),
(85, 28, 36, 'en_attente', '2025-10-04 19:06:59', 'default.jpg'),
(87, 28, 59, 'accepte', '2025-10-04 19:07:10', 'default.jpg'),
(88, 28, 35, 'accepte', '2025-10-04 19:07:18', 'default.jpg'),
(89, 27, 82, 'accepte', '2025-10-04 19:32:20', 'default.jpg'),
(90, 27, 28, 'accepte', '2025-10-04 19:32:23', 'default.jpg'),
(91, 13, 82, 'accepte', '2025-10-04 20:58:38', 'default.jpg'),
(92, 89, 18, 'en_attente', '2025-10-05 05:37:36', 'default.jpg'),
(93, 89, 17, 'accepte', '2025-10-05 05:37:41', 'default.jpg'),
(94, 89, 37, 'en_attente', '2025-10-05 05:38:05', 'default.jpg'),
(95, 89, 39, 'en_attente', '2025-10-05 05:38:14', 'default.jpg'),
(96, 89, 13, 'accepte', '2025-10-05 05:38:17', 'default.jpg'),
(97, 89, 82, 'en_attente', '2025-10-05 05:38:25', 'default.jpg'),
(98, 90, 13, 'accepte', '2025-10-05 11:19:51', 'default.jpg'),
(99, 90, 17, 'accepte', '2025-10-05 11:19:55', 'default.jpg'),
(100, 90, 18, 'en_attente', '2025-10-05 11:19:57', 'default.jpg'),
(101, 90, 23, 'accepte', '2025-10-05 11:20:00', 'default.jpg'),
(102, 90, 27, 'accepte', '2025-10-05 11:20:02', 'default.jpg'),
(103, 90, 28, 'en_attente', '2025-10-05 11:20:04', 'default.jpg'),
(104, 90, 29, 'accepte', '2025-10-05 11:20:07', 'default.jpg'),
(105, 90, 32, 'en_attente', '2025-10-05 11:20:09', 'default.jpg'),
(111, 90, 38, 'en_attente', '2025-10-05 11:20:23', 'default.jpg'),
(113, 90, 89, 'accepte', '2025-10-05 11:20:36', 'default.jpg'),
(114, 13, 90, 'accepte', '2025-10-05 20:17:47', 'default.jpg'),
(115, 13, 89, 'accepte', '2025-10-05 20:17:49', 'default.jpg'),
(119, 89, 90, 'accepte', '2025-10-07 05:49:41', 'default.jpg'),
(120, 100, 92, 'en_attente', '2025-10-08 10:12:19', 'default.jpg'),
(121, 23, 90, 'accepte', '2025-10-08 18:16:31', 'default.jpg'),
(122, 23, 90, 'accepte', '2025-10-08 18:16:34', 'default.jpg'),
(123, 23, 90, 'accepte', '2025-10-08 18:16:35', 'default.jpg'),
(124, 23, 90, 'accepte', '2025-10-08 18:16:36', 'default.jpg'),
(125, 13, 87, 'en_attente', '2025-10-09 03:00:08', 'default.jpg'),
(126, 13, 91, 'en_attente', '2025-10-09 03:00:19', 'default.jpg'),
(127, 13, 92, 'en_attente', '2025-10-09 03:00:23', 'default.jpg'),
(128, 13, 98, 'en_attente', '2025-10-09 03:00:27', 'default.jpg'),
(129, 13, 99, 'en_attente', '2025-10-09 03:00:32', 'default.jpg'),
(130, 13, 100, 'en_attente', '2025-10-09 03:00:36', 'default.jpg'),
(131, 13, 101, 'en_attente', '2025-10-09 03:00:39', 'default.jpg'),
(132, 35, 28, 'accepte', '2025-10-09 12:49:32', 'default.jpg'),
(133, 35, 17, 'accepte', '2025-10-09 12:49:41', 'default.jpg'),
(134, 27, 90, 'accepte', '2025-10-11 08:34:25', 'default.jpg'),
(135, 29, 13, 'accepte', '2025-10-16 06:05:28', 'default.jpg'),
(136, 29, 27, 'accepte', '2025-10-16 06:05:29', 'default.jpg'),
(137, 29, 18, 'en_attente', '2025-10-16 06:05:44', 'default.jpg'),
(138, 29, 90, 'accepte', '2025-10-16 06:05:47', 'default.jpg'),
(139, 29, 17, 'accepte', '2025-10-16 06:05:51', 'default.jpg'),
(140, 29, 23, 'en_attente', '2025-10-16 06:06:02', 'default.jpg'),
(141, 29, 28, 'en_attente', '2025-10-16 06:06:06', 'default.jpg'),
(142, 29, 32, 'en_attente', '2025-10-16 06:06:09', 'default.jpg'),
(143, 29, 33, 'en_attente', '2025-10-16 06:06:11', 'default.jpg'),
(144, 29, 34, 'en_attente', '2025-10-16 06:06:14', 'default.jpg'),
(145, 29, 35, 'accepte', '2025-10-16 06:06:18', 'default.jpg'),
(146, 29, 36, 'en_attente', '2025-10-16 06:06:21', 'default.jpg'),
(147, 29, 38, 'en_attente', '2025-10-16 06:06:25', 'default.jpg'),
(148, 29, 37, 'en_attente', '2025-10-16 06:06:27', 'default.jpg'),
(149, 29, 39, 'en_attente', '2025-10-16 06:06:30', 'default.jpg'),
(150, 29, 59, 'accepte', '2025-10-16 06:06:36', 'default.jpg'),
(151, 29, 82, 'en_attente', '2025-10-16 06:06:40', 'default.jpg'),
(152, 29, 87, 'en_attente', '2025-10-16 06:06:42', 'default.jpg'),
(153, 29, 89, 'en_attente', '2025-10-16 06:06:45', 'default.jpg'),
(154, 29, 91, 'en_attente', '2025-10-16 06:06:48', 'default.jpg'),
(155, 29, 92, 'en_attente', '2025-10-16 06:06:54', 'default.jpg'),
(156, 59, 28, 'accepte', '2025-10-21 10:31:25', 'default.jpg'),
(157, 59, 29, 'accepte', '2025-10-21 10:31:29', 'default.jpg'),
(158, 17, 13, 'accepte', '2025-10-21 17:51:38', 'default.jpg'),
(159, 17, 82, 'accepte', '2025-10-21 17:51:41', 'default.jpg'),
(160, 17, 90, 'accepte', '2025-10-21 17:51:44', 'default.jpg'),
(161, 17, 35, 'accepte', '2025-10-21 17:51:49', 'default.jpg'),
(162, 17, 29, 'accepte', '2025-10-21 17:51:50', 'default.jpg'),
(163, 17, 89, 'accepte', '2025-10-21 17:51:53', 'default.jpg'),
(164, 35, 29, 'accepte', '2025-10-22 06:27:56', 'default.jpg'),
(165, 105, 27, 'en_attente', '2025-10-22 15:47:41', 'default.jpg'),
(166, 105, 13, 'accepte', '2025-10-22 15:47:45', 'default.jpg'),
(167, 105, 32, 'en_attente', '2025-10-22 15:47:52', 'default.jpg'),
(168, 105, 33, 'en_attente', '2025-10-22 15:47:58', 'default.jpg'),
(169, 105, 36, 'en_attente', '2025-10-22 15:48:02', 'default.jpg'),
(170, 105, 35, 'accepte', '2025-10-22 15:48:09', 'default.jpg'),
(171, 105, 38, 'en_attente', '2025-10-22 15:48:13', 'default.jpg'),
(172, 105, 90, 'en_attente', '2025-10-22 15:48:30', 'default.jpg'),
(173, 105, 91, 'en_attente', '2025-10-22 15:48:37', 'default.jpg'),
(174, 105, 92, 'en_attente', '2025-10-22 15:48:42', 'default.jpg'),
(175, 105, 100, 'en_attente', '2025-10-22 15:48:50', 'default.jpg'),
(176, 105, 98, 'en_attente', '2025-10-22 15:48:54', 'default.jpg'),
(177, 105, 99, 'en_attente', '2025-10-22 15:48:59', 'default.jpg'),
(178, 105, 87, 'en_attente', '2025-10-22 15:49:02', 'default.jpg'),
(179, 105, 101, 'en_attente', '2025-10-22 15:49:06', 'default.jpg'),
(180, 105, 59, 'en_attente', '2025-10-22 15:49:08', 'default.jpg'),
(181, 13, 105, 'accepte', '2025-10-24 07:40:22', 'default.jpg'),
(182, 35, 105, 'accepte', '2025-10-24 08:50:43', 'default.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `bibliotheque`
--

CREATE TABLE `bibliotheque` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `fichier` varchar(255) NOT NULL,
  `date_ajout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin_id` int(11) NOT NULL,
  `classe` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `bibliotheque`
--

INSERT INTO `bibliotheque` (`id`, `titre`, `fichier`, `date_ajout`, `admin_id`, `classe`) VALUES
(6, 'Contrôle continu de géométrie 3:plane ', '1759977026_geo plane .pdf', '2025-10-09 02:30:26', 27, 'IAN2');

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `chat`
--

INSERT INTO `chat` (`id`, `user_id`, `nom`, `prenom`, `photo`, `message`, `created_at`) VALUES
(78, 36, 'TAKOUJOU MENOUNGA', 'CAMILA', '1759407461_1000174453.jpg', 'Bonjour', '2025-10-02 13:25:52'),
(80, 27, 'Toutouya ', 'El ', '1759384499_IMG_20250109_083613.jpg', 'Cc', '2025-10-02 16:50:32'),
(84, 35, 'Ketchadji ', 'Eric', 'default.jpg', 'Atassaaaaaa', '2025-10-04 16:09:43'),
(86, 13, 'BEIDI', 'SAMUEL', '1754436857_sammmmm.png', 'N\'oubliez pas de proposer des nouvelles fonctionnalités', '2025-10-04 17:05:21'),
(87, 13, 'BEIDI', 'SAMUEL', '1754436857_sammmmm.png', 'Il y a la notification qu\'on doit quand même gérer.', '2025-10-04 17:06:58'),
(88, 27, 'Toutouya ', 'El ', '1759384499_IMG_20250109_083613.jpg', 'C\'est déjà bon norh ??', '2025-10-04 19:33:49'),
(89, 13, 'BEIDI', 'SAMUEL', '1754436857_sammmmm.png', 'La notification ? Pas encore', '2025-10-04 20:55:41'),
(91, 13, 'BEIDI', 'SAMUEL', '1754436857_sammmmm.png', 'Les administrateurs essayez d\'ajouter les archives dans la bibliothèque', '2025-10-04 20:57:44');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `content`, `created_at`) VALUES
(24, 23, 13, 'Test commentaire 😅', '2025-10-04 01:02:59'),
(25, 23, 35, '😇', '2025-10-04 12:45:36'),
(26, 23, 33, '🥷', '2025-10-04 15:07:46'),
(27, 23, 82, 'Bsr', '2025-10-04 16:34:12'),
(28, 23, 28, 'Salut!!', '2025-10-04 18:06:09'),
(29, 29, 90, 'Hello World', '2025-10-05 10:19:04'),
(30, 29, 27, 'C\'est pas possible de télécharger', '2025-10-05 18:26:45'),
(31, 29, 13, 'D\'accord, le temps que j\'arrange le problème, vous pouvez télécharger sur le site directement', '2025-10-05 19:15:41'),
(32, 30, 13, 'Je t\'ai ajouté comme admin, tu peux écrire ça dans l\'annonce', '2025-10-05 19:17:06');

-- --------------------------------------------------------

--
-- Structure de la table `department_news`
--

CREATE TABLE `department_news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `department_news`
--

INSERT INTO `department_news` (`id`, `title`, `content`, `created_at`) VALUES
(32, 'Résultats ', 'Les résultats de la session normale et rattrapage sont disponibles sur la page résultats.', '2025-10-02 01:35:14');

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE `etudiants` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `matricule` varchar(50) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `filiere` varchar(100) DEFAULT NULL,
  `bio` text,
  `email` varchar(150) DEFAULT NULL,
  `mot_de_passe` varchar(255) DEFAULT NULL,
  `photo_profil` varchar(255) DEFAULT 'default.jpg',
  `role` enum('admin','etudiant') DEFAULT 'etudiant'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `etudiants`
--

INSERT INTO `etudiants` (`id`, `nom`, `prenom`, `matricule`, `numero`, `filiere`, `bio`, `email`, `mot_de_passe`, `photo_profil`, `role`) VALUES
(13, 'BEIDI', 'SAMUEL', '18A1093FS', '697241071', 'INFORMATIQUE ', 'Ingénieur réseaux et systèmes ', 'beidisamuel11@gmail.com', '$2y$10$ydoOh301Ba7qkoPGQW/yYe8Q1d5IqCNRYkl5onPZez7DzQvQJYBtK', '1754436857_sammmmm.png', 'admin'),
(17, 'Matchinda', 'Anelka', '24ENSPM284', '670653411', 'IHN', NULL, 'anelkafabiola7@gmail.com', '$2y$10$b8xMOuIDe0pQttDTJXMAOe2Y6rqKONSe9sI6zjOb25d9gN1j/pAP.', 'default.jpg', 'etudiant'),
(18, 'Namekong', 'Ivanelle', '24ENSPM186', '689666604', 'IHN', NULL, 'ivanellenamakong@gmail.com', '$2y$10$6i9wnlfHpWvRqd5RRLp/DOjCVJ1lnYmHbxAWzfxaeJgOYVbHkT8AW', 'default.jpg', 'etudiant'),
(23, 'FEHEM ', 'BENJAMIN ', '24ENSPM017', '678993543', 'IAN', 'Focus 🧠', 'benjaminfehem@gmail.com', '$2y$10$/rrTEYt5czgYSTQ8GETAhulm8baxTGAAdrPvL5X2D1LJ3Fear.BAG', '1759943898_1000024585.jpg', 'etudiant'),
(27, 'Toutouya ', 'El ', '24ENSPM280 ', '688283514', 'IAN ', '', 'nsteveterence@gmail.com', '$2y$10$OG1RaApHHA34kiAXXLS7sOiyTgOaePC1A25X9YSxRCPKgvkjMUqj2', '1759384499_IMG_20250109_083613.jpg', 'admin'),
(28, 'SOUSSEE-BAA DJONMA', 'JOSEPHINE', '22E0453EP', '693261374', 'IHN', '', 'josephinesousseebaa@gmail.com', '$2y$10$2898zQ5gfUihkyfTphLQneMRXuUVpW6YjJBN23D6Wx8T7ZUS/QXv6', '1758542030_IMG_20250922_093136_793.jpg', 'admin'),
(29, 'NDONGO BARE  ', 'ROMEO ', '24ENSPM181', '694617728/673001319', 'IAN', '', 'ndongoromeo2@gmail.com', '$2y$10$LBQj.F4EPjvXRVJ.D.hyO.4wZaTJl4oEh.OBX/vplo7nVEnoYqdni', '1760591283_1000200174.jpg', 'etudiant'),
(32, 'ARTHUR ', 'AARON ', '23ENSPM0396', '691112252', 'IAN', 'Président Club AHN', 'arthuraaron251@gmail.com', '$2y$10$RvPOVjlr3T1jgB0M07eW9ei8B1lr.pKDklYWaNAylyy88mUV34euC', '1759406006_IMG-20250929-WA0052.jpg', 'admin'),
(33, 'NDJEM ', 'Hervé', '23ENSPM0401', '699163826', 'IAN', '', 'hbinong123@gmail.com', '$2y$10$uHR7eVt7ZBDwr/KzhMXCHe5A1PT8MZ4N6ttIgvSjsIo8j8fE05pMa', '1759407538_20250924_155953.jpg', 'etudiant'),
(34, 'AMOUBE NDE', 'Louange- mystere ', '23ENSPM0394', '690463183', 'IAN', NULL, 'louangende@gmail.com', '$2y$10$V6a0am472FAdDUlModF88.C.vHFjtDtnPKBPoljqRM.ZqubzhojfS', 'default.jpg', 'etudiant'),
(35, 'Ketchadji ', 'Eric', '23ENSPM0400', '671135872', 'IAN', '', 'eketchadji@gmail.com', '$2y$10$TCu5ztWcu2uRBv/hUgWqlOTahgApEKJBqzsfEjr9GdKvME80VFdBa', 'default.jpg', 'admin'),
(36, 'TAKOUJOU MENOUNGA', 'CAMILA', '23ENSPM0407', '658377413', 'IHN ', NULL, 'takoujoumenoungacamila@gmail.com', '$2y$10$KKG4dACBt80sUDmgSDE4QeYaOqar.b/fRvnMSzmxjggKYAUK8dzGi', '1759407461_1000174453.jpg', 'etudiant'),
(37, 'Abdoullahi ', 'Amadou', '24ENSPM182', '699148354', 'IHN', NULL, 'amadouabdoullahi44@gmail.com', '$2y$10$auPohE4/D1QyCOij4/xMFOA34ey4xBdOTdwjqxQtm8KTjYU48Cosi', 'default.jpg', 'etudiant'),
(38, 'TSAGUE ', 'Louidivine cardie ', '22E0439EP', '686127708', 'IAN', NULL, 'cardietsague@gmail.com', '$2y$10$eP8zhZ1NDM1jztLe6rRejur1CWSe7egOMCmA8jUpCPNjR8VyTh.9O', '1759424164_1000140585.jpg', 'admin'),
(39, 'Youssouf ', 'Mahamat ', '24ENSPM188', '658183731', 'IHN', NULL, 'yy0497862@gmail.com', '$2y$10$NiMSY2SNtnPdfov9wtOQnuGHlv45h/7ByAtfN12DGcXQ.M5yd5GEO', '1759432727_de-verre-et-de-beton_4819096.jpg', 'etudiant'),
(59, 'YASMINE', 'HADIDJATOU', '22EO445EP', '655018727', 'IHN', NULL, 'yasminehadidjatou06@gmail.com', '$2y$10$ROW02xGq9ES2Dv3noFlJIuLwAxvWXk6hURooRoNgZwjlgT3cLsdEO', '1759583141_Snapchat-802327985.jpg', 'etudiant'),
(82, 'Youssouf ', 'Mahamat ', '24ENSPM188.', '658183731', 'IHN', '', 'yussufmahamat157@gmail.com', '$2y$10$u21xIn1szyzU5OPJ/ELOs..HSPSKXd1awlY7/KvZiRFnCk1AWbZ6y', '1759999183_1000151063.jpg', 'etudiant'),
(87, 'Koyabe', 'gaius', '23ENSPM0398', '696135579', 'IAN', NULL, 'koyabegaius7@gmail.com', '$2y$10$uy7iEW.Zo/LGcCkakbgbs.2tCg2XSlzs99U3p1CdKOX76y0rs0r.y', 'default.jpg', 'etudiant'),
(89, 'Abdoulatif ', 'Abdoulaye Wirngo ', '24ENSPM178', '691681060', 'IAN', 'You Can Do It', 'abdoulatifwirngoori@gmail.com', '$2y$10$GWdOj7pwnZCtp/YicGfgsuQIpqEFiszkIgKfYesm1UFQvRaotQ1vS', '1759638948_68572.jpg', 'etudiant'),
(90, 'Yassika ', 'Edmond ', '23ENSPM0397', '657595773', 'IAN', NULL, 'edmondyas23@gmail.com', '$2y$10$2LKts9PmKwR241HYjFz/wuX8fVGYe1YpaSSG3kgA2d3GRsiEdN8qK', 'default.jpg', 'etudiant'),
(91, 'Aminatou Doudou ', 'Bintou Aliou', '23enspm0413 ', '694311592', 'IHN ', NULL, 'aminatoual345@gmail', '$2y$10$rAY0eoqO6nihaFVwTYd3uuDzq8t96gkvsoe4AK73Li2kQytX22cJa', 'default.jpg', 'etudiant'),
(92, 'HARIRATOU FADILA ', 'Sambo', '23ENSMP04 ', '656 02 49 07', 'IHN ', NULL, 'harirasambo92@gmail.com', '$2y$10$lhA3gISW.pPruJqdFMpJZ.Z2KucXkFbHYQ.v2YQ5xp204M41P1/R2', '1759750175_1000777723.jpg', 'etudiant'),
(98, 'Eloundou ', 'Marc', '23enspm0416', '673460924', 'Ihn', NULL, 'assolamarc@gmail.com', '$2y$10$saWBdwPHHLCpfEbjM2B32eh.XO8q8d28t5t2JxgzoEE7Oo40Zw6oO', 'default.jpg', 'etudiant'),
(99, 'Nzietchou Dedzo ', 'Arès ', '23enspm0404', '677040886', 'IAN ', NULL, 'anzietchou@gmail.com', '$2y$10$dNXDw/.fxBdFLFXXx7KXJeRED/i9lNR4PB9VS2psbBN0cgHxjFmSu', 'default.jpg', 'etudiant'),
(100, 'Aminatou Alioum', NULL, '24ENSPM0064', '696044496', 'IHN', NULL, 'alioumaminatou77@gmail.com', '$2y$10$mOUqpQPyYsrslmd0umE9ZuceJKXGFbw9goCs32DnZCzAUZbRhnzHW', 'default.jpg', 'etudiant'),
(101, 'WOUDAMVOU ', 'JEAN MARC', '23ENSPM0412', '656741988', 'IHN', NULL, 'woudamvoumarcus@gmail.com', '$2y$10$HRgyVizNoeE8/vD2rgEtPOjCuipclcxi36BRUbau0H0jXPgRXGfau', '1759961715_IMG_20250828_072455_677.jpg', 'etudiant'),
(105, 'Amadou', 'Prosper ', '23ENSPM0409', '698384345', 'IHN', NULL, 'prospama@gmail.com', '$2y$10$YVvpLAWCGtizFa7yoVBQH.6MTD.Tk61X.Xpd0j0Xjmic.v1kmz9ba', '1761144268_Snapchat-156603853.jpg', 'etudiant');

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`, `created_at`) VALUES
(360, 13, 23, '2025-10-04 01:00:59'),
(361, 35, 23, '2025-10-04 15:11:39'),
(362, 27, 23, '2025-10-04 18:31:29'),
(363, 83, 23, '2025-10-04 18:51:01'),
(364, 89, 23, '2025-10-05 04:41:29'),
(365, 90, 23, '2025-10-05 16:49:34'),
(368, 90, 29, '2025-10-05 16:53:01'),
(369, 82, 29, '2025-10-05 17:12:59'),
(370, 27, 30, '2025-10-05 18:29:17'),
(378, 13, 30, '2025-10-05 20:24:19'),
(379, 13, 29, '2025-10-05 20:24:29'),
(380, 17, 30, '2025-10-06 14:12:04'),
(381, 89, 33, '2025-10-07 04:46:23'),
(382, 89, 32, '2025-10-07 04:46:35'),
(383, 89, 31, '2025-10-07 04:46:39'),
(384, 100, 33, '2025-10-08 09:13:23'),
(385, 100, 32, '2025-10-08 09:13:26'),
(386, 13, 33, '2025-10-08 17:14:57'),
(387, 23, 33, '2025-10-08 17:16:19'),
(388, 13, 32, '2025-10-08 18:36:38'),
(389, 27, 33, '2025-10-09 01:35:30'),
(390, 13, 31, '2025-10-09 18:57:46'),
(392, 13, 34, '2025-10-24 14:25:48');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `expediteur_id` int(11) NOT NULL,
  `destinataire_id` int(11) NOT NULL,
  `contenu` text COLLATE utf8mb4_unicode_ci,
  `date_envoi` datetime DEFAULT CURRENT_TIMESTAMP,
  `lu` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id`, `expediteur_id`, `destinataire_id`, `contenu`, `date_envoi`, `lu`) VALUES
(1, 13, 27, 'Salut', '2025-10-21 08:21:06', 0),
(2, 13, 23, 'Salut', '2025-10-21 09:59:19', 0),
(3, 17, 27, 'Cc', '2025-10-21 17:51:13', 0),
(4, 17, 27, 'Cc', '2025-10-21 17:51:13', 0),
(5, 17, 27, 'Cc', '2025-10-21 17:51:14', 0),
(6, 17, 13, 'Hi', '2025-10-21 21:42:15', 1),
(7, 13, 17, 'Goumin légendaire', '2025-10-21 21:45:16', 1),
(8, 17, 13, 'Malof', '2025-10-21 21:53:26', 1),
(9, 13, 17, '😅', '2025-10-21 23:38:00', 1),
(10, 17, 13, '🤣', '2025-10-22 04:27:20', 1),
(11, 17, 13, '❤', '2025-10-22 04:27:30', 1),
(12, 17, 13, '❤', '2025-10-22 04:27:40', 1),
(13, 17, 89, 'Hi', '2025-10-22 06:25:25', 0),
(14, 17, 89, '🖤🖤', '2025-10-22 06:25:30', 0),
(15, 17, 89, '❤', '2025-10-22 06:25:38', 0),
(16, 17, 89, '❤', '2025-10-22 06:25:39', 0),
(17, 17, 89, '❤', '2025-10-22 06:25:40', 0),
(18, 17, 89, '❤', '2025-10-22 06:25:41', 0),
(19, 17, 89, '❤', '2025-10-22 06:25:41', 0),
(20, 17, 89, '💖', '2025-10-22 06:26:18', 0),
(21, 35, 33, 'Yo', '2025-10-22 06:30:21', 0),
(22, 13, 17, 'Problème contacts résolu', '2025-10-24 08:50:28', 1),
(23, 17, 35, 'Cc', '2025-10-24 22:29:13', 0),
(24, 35, 17, 'Hi', '2025-10-24 22:29:46', 1),
(25, 17, 13, 'Hi', '2025-10-24 23:25:33', 1),
(26, 17, 35, 'Ça va ?', '2025-10-24 23:25:57', 0),
(27, 13, 17, 'salut', '2025-10-24 23:25:59', 1),
(28, 13, 17, 'hi', '2025-10-24 23:26:19', 1),
(29, 13, 17, 'hi', '2025-10-24 23:27:04', 1),
(30, 17, 13, 'What\'s up ?', '2025-10-24 23:34:18', 1),
(31, 17, 13, 'How are you ?', '2025-10-24 23:35:45', 0);

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `content`, `file_path`, `created_at`) VALUES
(23, 33, 'Hello', NULL, '2025-10-02 12:10:09'),
(29, 13, 'Résultats Géométrie Affine 1', NULL, '2025-10-05 09:53:41'),
(30, 27, 'Demain cc de géométrie 3:plane\r\nPour les deux parcours et cc d\'initiation à la sociologie et à l\'anthropologie numérique pour art numérique seulement', NULL, '2025-10-05 18:29:13'),
(31, 13, 'Planning de la semaine du 06 au 11 octobre 2025', NULL, '2025-10-06 06:45:59'),
(32, 13, 'Planning de la semaine du 06 au 11 octobre 2025', NULL, '2025-10-06 06:46:41'),
(33, 13, 'Planning de la semaine du 06 au 11 octobre 2025 N4', NULL, '2025-10-06 06:47:10'),
(34, 105, 'Hi guys 👋', NULL, '2025-10-22 14:47:05');

-- --------------------------------------------------------

--
-- Structure de la table `post_files`
--

CREATE TABLE `post_files` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `post_files`
--

INSERT INTO `post_files` (`id`, `post_id`, `file_name`, `file_path`, `uploaded_at`) VALUES
(3, 29, 'PV GÉOMÉTRIE AFFINE .pdf', '68e240259e151.pdf', '2025-10-05 09:53:41'),
(4, 31, 'Emploi-du-temps_Octobre_2025-05-IAN-IHN_N2.pdf', '68e365a772da0.pdf', '2025-10-06 06:45:59'),
(5, 32, 'Emploi-du-temps_Octobre_2025-05-IAN-IHN_N3.pdf', '68e365d1e2ae2.pdf', '2025-10-06 06:46:41'),
(6, 33, 'Emploi-du-temps_Octobre_2025-03-IAN-IHN_N4.pdf', '68e365eeb04f6.pdf', '2025-10-06 06:47:10');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `matricule` varchar(50) NOT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `filiere` varchar(100) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `profile_pic` varchar(255) DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `amis`
--
ALTER TABLE `amis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ami_id` (`ami_id`);

--
-- Index pour la table `bibliotheque`
--
ALTER TABLE `bibliotheque`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `department_news`
--
ALTER TABLE `department_news`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matricule` (`matricule`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_like` (`user_id`,`post_id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expediteur_id` (`expediteur_id`),
  ADD KEY `destinataire_id` (`destinataire_id`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `post_files`
--
ALTER TABLE `post_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matricule` (`matricule`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `amis`
--
ALTER TABLE `amis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT pour la table `bibliotheque`
--
ALTER TABLE `bibliotheque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `department_news`
--
ALTER TABLE `department_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `etudiants`
--
ALTER TABLE `etudiants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT pour la table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=393;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `post_files`
--
ALTER TABLE `post_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `amis`
--
ALTER TABLE `amis`
  ADD CONSTRAINT `amis_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `etudiants` (`id`),
  ADD CONSTRAINT `amis_ibfk_2` FOREIGN KEY (`ami_id`) REFERENCES `etudiants` (`id`);

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`expediteur_id`) REFERENCES `etudiants` (`id`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`destinataire_id`) REFERENCES `etudiants` (`id`);

--
-- Contraintes pour la table `post_files`
--
ALTER TABLE `post_files`
  ADD CONSTRAINT `post_files_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
