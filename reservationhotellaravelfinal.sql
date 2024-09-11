-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 10 sep. 2024 à 12:59
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `reservationhotellaravelfinal`
--
CREATE DATABASE IF NOT EXISTS `reservationhotellaravelfinal` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `reservationhotellaravelfinal`;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id_cat` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nbr_cle` int NOT NULL,
  `prix` int NOT NULL,
  `categorie` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_hotel` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_cat`),
  KEY `categories_id_hotel_foreign` (`id_hotel`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_cat`, `nbr_cle`, `prix`, `categorie`, `id_hotel`, `created_at`, `updated_at`) VALUES
(6, 10, 100000, 'VIP', 1, '2024-06-15 15:35:05', '2024-06-15 15:35:05'),
(5, 20, 50000, 'SIMPLE', 1, '2024-06-15 15:34:45', '2024-06-15 15:34:45'),
(7, 20, 30000, 'SIMPLE', 2, '2024-06-17 06:54:38', '2024-06-17 06:54:38'),
(8, 20, 200000, 'VIP', 2, '2024-06-17 06:54:56', '2024-06-17 06:54:56'),
(9, 10, 20000, 'SIMPLE', 3, '2024-06-17 07:35:35', '2024-06-17 07:35:35'),
(10, 10, 300000, 'VIP', 3, '2024-06-17 07:36:04', '2024-06-17 07:36:04'),
(11, 40, 300000, 'VIP', 4, '2024-06-17 07:42:42', '2024-06-17 07:42:42'),
(12, 10, 100000, 'SIMPLE', 4, '2024-06-17 07:44:20', '2024-06-17 07:44:20'),
(13, 50, 200000, 'SIMPLE', 5, '2024-06-17 07:47:10', '2024-06-17 07:47:10'),
(14, 60, 300000, 'SIMPLE', 6, '2024-06-17 07:50:23', '2024-06-17 07:50:23');

-- --------------------------------------------------------

--
-- Structure de la table `cle_activations`
--

DROP TABLE IF EXISTS `cle_activations`;
CREATE TABLE IF NOT EXISTS `cle_activations` (
  `id_cle_activation` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `cle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_hotel` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_cle_activation`),
  KEY `cle_activations_id_hotel_foreign` (`id_hotel`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cle_chambres`
--

DROP TABLE IF EXISTS `cle_chambres`;
CREATE TABLE IF NOT EXISTS `cle_chambres` (
  `id_cle_chambre` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `cle_numero` int NOT NULL,
  `active` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_cat` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_cle_chambre`),
  KEY `cle_chambres_id_cat_foreign` (`id_cat`)
) ENGINE=MyISAM AUTO_INCREMENT=271 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cle_chambres`
--

INSERT INTO `cle_chambres` (`id_cle_chambre`, `cle_numero`, `active`, `id_cat`, `created_at`, `updated_at`) VALUES
(60, 10, '1', 7, '2024-06-17 06:56:58', '2024-06-17 06:56:58'),
(59, 9, '1', 7, '2024-06-17 06:56:58', '2024-06-17 06:56:58'),
(58, 8, '1', 7, '2024-06-17 06:56:58', '2024-06-17 06:56:58'),
(57, 7, '1', 7, '2024-06-17 06:56:58', '2024-06-17 06:56:58'),
(56, 6, '1', 7, '2024-06-17 06:56:58', '2024-06-17 06:56:58'),
(55, 5, '1', 7, '2024-06-17 06:56:58', '2024-06-17 06:56:58'),
(54, 4, '1', 7, '2024-06-17 06:56:58', '2024-06-17 06:56:58'),
(53, 3, '1', 7, '2024-06-17 06:56:58', '2024-06-17 06:56:58'),
(52, 2, '1', 7, '2024-06-17 06:56:58', '2024-06-17 06:56:58'),
(51, 1, '1', 7, '2024-06-17 06:56:58', '2024-06-17 06:56:58'),
(50, 20, '1', 5, '2024-06-15 17:49:57', '2024-06-15 17:49:57'),
(49, 19, '1', 5, '2024-06-15 17:49:57', '2024-06-15 17:49:57'),
(48, 18, '1', 5, '2024-06-15 17:49:57', '2024-06-15 17:49:57'),
(47, 17, '1', 5, '2024-06-15 17:49:57', '2024-06-15 17:49:57'),
(46, 16, '1', 5, '2024-06-15 17:49:57', '2024-06-15 17:49:57'),
(45, 15, '0', 5, '2024-06-15 17:49:57', '2024-06-15 17:49:57'),
(44, 14, '0', 5, '2024-06-15 17:49:57', '2024-06-15 17:49:57'),
(43, 13, '0', 5, '2024-06-15 17:49:57', '2024-06-15 17:49:57'),
(42, 12, '0', 5, '2024-06-15 17:49:57', '2024-06-15 17:49:57'),
(41, 11, '0', 5, '2024-06-15 17:49:57', '2024-06-15 17:49:57'),
(40, 10, '1', 6, '2024-06-15 17:48:39', '2024-06-15 17:48:39'),
(39, 9, '0', 6, '2024-06-15 17:48:39', '2024-06-15 17:48:39'),
(38, 8, '1', 6, '2024-06-15 17:48:39', '2024-06-15 17:48:39'),
(37, 7, '1', 6, '2024-06-15 17:48:39', '2024-06-15 17:48:39'),
(36, 6, '1', 6, '2024-06-15 17:48:39', '2024-06-15 17:48:39'),
(35, 5, '1', 6, '2024-06-15 17:48:39', '2024-06-15 17:48:39'),
(34, 4, '1', 6, '2024-06-15 17:48:39', '2024-06-15 17:48:39'),
(33, 3, '1', 6, '2024-06-15 17:48:39', '2024-06-15 17:48:39'),
(32, 2, '1', 6, '2024-06-15 17:48:39', '2024-06-15 17:48:39'),
(31, 1, '1', 6, '2024-06-15 17:48:39', '2024-06-15 17:48:39'),
(61, 11, '1', 7, '2024-06-17 06:56:58', '2024-06-17 06:56:58'),
(62, 12, '1', 7, '2024-06-17 06:56:58', '2024-06-17 06:56:58'),
(63, 13, '1', 7, '2024-06-17 06:56:58', '2024-06-17 06:56:58'),
(64, 14, '1', 7, '2024-06-17 06:56:58', '2024-06-17 06:56:58'),
(65, 15, '1', 7, '2024-06-17 06:56:58', '2024-06-17 06:56:58'),
(66, 16, '1', 7, '2024-06-17 06:56:58', '2024-06-17 06:56:58'),
(67, 17, '1', 7, '2024-06-17 06:56:58', '2024-06-17 06:56:58'),
(68, 18, '1', 7, '2024-06-17 06:56:58', '2024-06-17 06:56:58'),
(69, 19, '1', 7, '2024-06-17 06:56:58', '2024-06-17 06:56:58'),
(70, 20, '1', 7, '2024-06-17 06:56:58', '2024-06-17 06:56:58'),
(71, 21, '1', 8, '2024-06-17 07:28:43', '2024-06-17 07:28:43'),
(72, 22, '1', 8, '2024-06-17 07:28:43', '2024-06-17 07:28:43'),
(73, 23, '1', 8, '2024-06-17 07:28:43', '2024-06-17 07:28:43'),
(74, 24, '1', 8, '2024-06-17 07:28:43', '2024-06-17 07:28:43'),
(75, 25, '1', 8, '2024-06-17 07:28:43', '2024-06-17 07:28:43'),
(76, 26, '1', 8, '2024-06-17 07:28:43', '2024-06-17 07:28:43'),
(77, 27, '1', 8, '2024-06-17 07:28:43', '2024-06-17 07:28:43'),
(78, 28, '1', 8, '2024-06-17 07:28:43', '2024-06-17 07:28:43'),
(79, 29, '1', 8, '2024-06-17 07:28:43', '2024-06-17 07:28:43'),
(80, 30, '1', 8, '2024-06-17 07:28:43', '2024-06-17 07:28:43'),
(81, 31, '1', 8, '2024-06-17 07:28:43', '2024-06-17 07:28:43'),
(82, 32, '1', 8, '2024-06-17 07:28:43', '2024-06-17 07:28:43'),
(83, 33, '1', 8, '2024-06-17 07:28:43', '2024-06-17 07:28:43'),
(84, 34, '1', 8, '2024-06-17 07:28:43', '2024-06-17 07:28:43'),
(85, 35, '1', 8, '2024-06-17 07:28:43', '2024-06-17 07:28:43'),
(86, 36, '1', 8, '2024-06-17 07:28:43', '2024-06-17 07:28:43'),
(87, 37, '1', 8, '2024-06-17 07:28:43', '2024-06-17 07:28:43'),
(88, 38, '1', 8, '2024-06-17 07:28:43', '2024-06-17 07:28:43'),
(89, 39, '1', 8, '2024-06-17 07:28:43', '2024-06-17 07:28:43'),
(90, 40, '1', 8, '2024-06-17 07:28:43', '2024-06-17 07:28:43'),
(91, 1, '0', 9, '2024-06-17 07:37:02', '2024-06-17 07:37:02'),
(92, 2, '0', 9, '2024-06-17 07:37:02', '2024-06-17 07:37:02'),
(93, 3, '0', 9, '2024-06-17 07:37:02', '2024-06-17 07:37:02'),
(94, 4, '0', 9, '2024-06-17 07:37:02', '2024-06-17 07:37:02'),
(95, 5, '1', 9, '2024-06-17 07:37:02', '2024-06-17 07:37:02'),
(96, 6, '1', 9, '2024-06-17 07:37:02', '2024-06-17 07:37:02'),
(97, 7, '1', 9, '2024-06-17 07:37:02', '2024-06-17 07:37:02'),
(98, 8, '1', 9, '2024-06-17 07:37:02', '2024-06-17 07:37:02'),
(99, 9, '1', 9, '2024-06-17 07:37:02', '2024-06-17 07:37:02'),
(100, 10, '1', 9, '2024-06-17 07:37:02', '2024-06-17 07:37:02'),
(101, 11, '1', 9, '2024-06-17 07:37:18', '2024-06-17 07:37:18'),
(102, 12, '1', 9, '2024-06-17 07:37:18', '2024-06-17 07:37:18'),
(103, 13, '1', 9, '2024-06-17 07:37:18', '2024-06-17 07:37:18'),
(104, 14, '1', 9, '2024-06-17 07:37:18', '2024-06-17 07:37:18'),
(105, 15, '1', 9, '2024-06-17 07:37:18', '2024-06-17 07:37:18'),
(106, 16, '1', 9, '2024-06-17 07:37:18', '2024-06-17 07:37:18'),
(107, 17, '1', 9, '2024-06-17 07:37:18', '2024-06-17 07:37:18'),
(108, 18, '1', 9, '2024-06-17 07:37:18', '2024-06-17 07:37:18'),
(109, 19, '1', 9, '2024-06-17 07:37:18', '2024-06-17 07:37:18'),
(110, 20, '1', 9, '2024-06-17 07:37:18', '2024-06-17 07:37:18'),
(111, 1, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(112, 2, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(113, 3, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(114, 4, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(115, 5, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(116, 6, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(117, 7, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(118, 8, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(119, 9, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(120, 10, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(121, 11, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(122, 12, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(123, 13, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(124, 14, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(125, 15, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(126, 16, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(127, 17, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(128, 18, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(129, 19, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(130, 20, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(131, 21, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(132, 22, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(133, 23, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(134, 24, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(135, 25, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(136, 26, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(137, 27, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(138, 28, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(139, 29, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(140, 30, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(141, 31, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(142, 32, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(143, 33, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(144, 34, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(145, 35, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(146, 36, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(147, 37, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(148, 38, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(149, 39, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(150, 40, '1', 11, '2024-06-17 07:43:30', '2024-06-17 07:43:30'),
(151, 41, '1', 12, '2024-06-17 07:44:39', '2024-06-17 07:44:39'),
(152, 42, '1', 12, '2024-06-17 07:44:39', '2024-06-17 07:44:39'),
(153, 43, '1', 12, '2024-06-17 07:44:39', '2024-06-17 07:44:39'),
(154, 44, '1', 12, '2024-06-17 07:44:39', '2024-06-17 07:44:39'),
(155, 45, '1', 12, '2024-06-17 07:44:39', '2024-06-17 07:44:39'),
(156, 46, '1', 12, '2024-06-17 07:44:39', '2024-06-17 07:44:39'),
(157, 47, '1', 12, '2024-06-17 07:44:39', '2024-06-17 07:44:39'),
(158, 48, '1', 12, '2024-06-17 07:44:39', '2024-06-17 07:44:39'),
(159, 49, '1', 12, '2024-06-17 07:44:39', '2024-06-17 07:44:39'),
(160, 50, '1', 12, '2024-06-17 07:44:39', '2024-06-17 07:44:39'),
(161, 1, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(162, 2, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(163, 3, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(164, 4, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(165, 5, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(166, 6, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(167, 7, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(168, 8, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(169, 9, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(170, 10, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(171, 11, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(172, 12, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(173, 13, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(174, 14, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(175, 15, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(176, 16, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(177, 17, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(178, 18, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(179, 19, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(180, 20, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(181, 21, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(182, 22, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(183, 23, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(184, 24, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(185, 25, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(186, 26, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(187, 27, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(188, 28, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(189, 29, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(190, 30, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(191, 31, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(192, 32, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(193, 33, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(194, 34, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(195, 35, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(196, 36, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(197, 37, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(198, 38, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(199, 39, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(200, 40, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(201, 41, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(202, 42, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(203, 43, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(204, 44, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(205, 45, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(206, 46, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(207, 47, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(208, 48, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(209, 49, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(210, 50, '1', 13, '2024-06-17 07:48:11', '2024-06-17 07:48:11'),
(211, 1, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(212, 2, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(213, 3, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(214, 4, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(215, 5, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(216, 6, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(217, 7, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(218, 8, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(219, 9, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(220, 10, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(221, 11, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(222, 12, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(223, 13, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(224, 14, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(225, 15, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(226, 16, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(227, 17, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(228, 18, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(229, 19, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(230, 20, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(231, 21, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(232, 22, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(233, 23, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(234, 24, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(235, 25, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(236, 26, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(237, 27, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(238, 28, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(239, 29, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(240, 30, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(241, 31, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(242, 32, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(243, 33, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(244, 34, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(245, 35, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(246, 36, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(247, 37, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(248, 38, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(249, 39, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(250, 40, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(251, 41, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(252, 42, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(253, 43, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(254, 44, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(255, 45, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(256, 46, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(257, 47, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(258, 48, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(259, 49, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(260, 50, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(261, 51, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(262, 52, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(263, 53, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(264, 54, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(265, 55, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(266, 56, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(267, 57, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(268, 58, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(269, 59, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55'),
(270, 60, '1', 14, '2024-06-17 07:50:55', '2024-06-17 07:50:55');

-- --------------------------------------------------------

--
-- Structure de la table `cle_payments`
--

DROP TABLE IF EXISTS `cle_payments`;
CREATE TABLE IF NOT EXISTS `cle_payments` (
  `id_cle_payment` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `cle_public` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cle_prive` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_hotel` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_cle_payment`),
  KEY `cle_payments_id_hotel_foreign` (`id_hotel`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `employeurs`
--

DROP TABLE IF EXISTS `employeurs`;
CREATE TABLE IF NOT EXISTS `employeurs` (
  `id_emp` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ddn` date NOT NULL,
  `adresse` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `situation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_fonction` bigint UNSIGNED NOT NULL,
  `id_hotel` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_emp`),
  KEY `employeurs_id_fonction_foreign` (`id_fonction`),
  KEY `employeurs_id_hotel_foreign` (`id_hotel`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fonctions`
--

DROP TABLE IF EXISTS `fonctions`;
CREATE TABLE IF NOT EXISTS `fonctions` (
  `id_fonction` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_fonction` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_fonction`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `hotels`
--

DROP TABLE IF EXISTS `hotels`;
CREATE TABLE IF NOT EXISTS `hotels` (
  `id_hotel` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_hotel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse_hotel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nbr_chambre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nbr_etoil` int NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `active` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_hotel`),
  KEY `hotels_id_user_foreign` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `hotels`
--

INSERT INTO `hotels` (`id_hotel`, `nom_hotel`, `adresse_hotel`, `ville`, `nbr_chambre`, `photo`, `description`, `contact`, `nbr_etoil`, `id_user`, `active`, `created_at`, `updated_at`) VALUES
(1, 'M Hotel', 'lot nka Andavamamba', 'antananarivo', '30', '1718389765.jpeg', 'confortable', '0328492100', 3, 1, '1', '2024-06-14 09:26:12', '2024-06-14 09:26:12'),
(2, 'Mada Hotel', 'lot nth mahabibo', 'mahajanga', '40', '1718614400.jpeg', 'confortable', '0325689789', 2, 2, '1', '2024-06-17 06:53:20', '2024-06-17 06:53:20'),
(3, 'Safary', 'lot vtb Mahabibo', 'mahajanga', '20', '1718616894.jpeg', 'confortable', '0345689789', 2, 3, '1', '2024-06-17 07:34:54', '2024-06-17 07:34:54'),
(4, 'Louvre', 'Antaninarenine', 'antananarivo', '50', '1718617344.jpeg', 'confort', '0345689789', 4, 4, '1', '2024-06-17 07:42:24', '2024-06-17 07:42:24'),
(5, 'Colbert', 'Antaninarenina', 'antananarivo', '50', '1718617598.jpeg', 'confortable', '0345689789', 4, 5, '1', '2024-06-17 07:46:38', '2024-06-17 07:46:38'),
(6, 'anjara', 'ambodivona', 'antananarivo', '60', '1718617796.jpeg', 'confortable', '0345689789', 3, 6, '1', '2024-06-17 07:49:56', '2024-06-17 07:49:56');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_06_10_123147_create_hotels_table', 1),
(6, '2024_06_10_123239_create_reservations_table', 1),
(7, '2024_06_10_123316_create_categories_table', 1),
(8, '2024_06_10_123400_create_photos_table', 1),
(9, '2024_06_10_123546_create_cle_chambres_table', 1),
(10, '2024_06_10_123627_create_cle_payments_table', 1),
(11, '2024_06_10_123806_create_remises_table', 1),
(12, '2024_06_10_123911_create_paniers_table', 1),
(13, '2024_06_10_123951_create_cle_activations_table', 1),
(14, '2024_06_10_133039_create_fonctions_table', 1),
(15, '2024_06_10_133146_create_employeurs_table', 1),
(16, '2024_06_10_215405_create_payment_fournisseurs_table', 1),
(17, '2024_06_19_202815_rename_foreign_key_column', 2),
(18, '2024_06_19_231942_modify_table_attributes', 3),
(19, '2024_06_19_232417_modify_table_attributes', 4),
(20, '2024_06_19_232942_modify_table_attributes', 5);

-- --------------------------------------------------------

--
-- Structure de la table `paniers`
--

DROP TABLE IF EXISTS `paniers`;
CREATE TABLE IF NOT EXISTS `paniers` (
  `id_panier` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `n_chambre` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` int NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_panier`),
  KEY `paniers_id_user_foreign` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `paniers`
--

INSERT INTO `paniers` (`id_panier`, `nom_client`, `n_chambre`, `prix`, `id_user`, `created_at`, `updated_at`) VALUES
(2, 'NomenjanaharyRija', '-11-12-13-14-15', 50000, 8, '2024-06-20 17:05:08', '2024-06-20 17:05:08');

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `payment_fournisseurs`
--

DROP TABLE IF EXISTS `payment_fournisseurs`;
CREATE TABLE IF NOT EXISTS `payment_fournisseurs` (
  `id_pf` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_hotel` bigint UNSIGNED NOT NULL,
  `mois_paye` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pf`),
  KEY `payment_fournisseurs_id_hotel_foreign` (`id_hotel`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

DROP TABLE IF EXISTS `photos`;
CREATE TABLE IF NOT EXISTS `photos` (
  `id_photo` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `titre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_cat` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_photo`),
  KEY `photos_id_cat_foreign` (`id_cat`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `photos`
--

INSERT INTO `photos` (`id_photo`, `photo`, `titre`, `description`, `id_cat`, `created_at`, `updated_at`) VALUES
(4, '1718472998.jpeg', 'douce', 'avece eau chaude', 5, '2024-06-15 15:36:38', '2024-06-15 15:36:38'),
(5, '1718473031.jpg', 'Chambre', 'Double matelas', 5, '2024-06-15 15:37:11', '2024-06-15 15:37:11'),
(6, '1718473075.jpeg', 'vip', 'Chambre', 6, '2024-06-15 15:37:55', '2024-06-15 15:37:55'),
(7, '1718614577.jpeg', 'Douce', 'Avec eau chaude', 7, '2024-06-17 06:56:17', '2024-06-17 06:56:17'),
(8, '1718617000.jpeg', 'Douce', 'Avec eau chaude', 9, '2024-06-17 07:36:40', '2024-06-17 07:36:40'),
(9, '1718617668.jpeg', 'Douce', 'Avec eau chaude', 13, '2024-06-17 07:47:48', '2024-06-17 07:47:48'),
(10, '1718617843.jpeg', 'Douce', 'Avec eau chaude', 14, '2024-06-17 07:50:43', '2024-06-17 07:50:43');

-- --------------------------------------------------------

--
-- Structure de la table `remises`
--

DROP TABLE IF EXISTS `remises`;
CREATE TABLE IF NOT EXISTS `remises` (
  `id_remise` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `remise` int NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `id_cat` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_remise`),
  KEY `remises_id_cat_foreign` (`id_cat`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `remises`
--

INSERT INTO `remises` (`id_remise`, `remise`, `date_debut`, `date_fin`, `id_cat`, `created_at`, `updated_at`) VALUES
(6, 20, '2024-06-16', '2024-06-28', 5, '2024-06-15 15:35:43', '2024-06-15 15:35:43');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id_reservation` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_user` bigint UNSIGNED NOT NULL,
  `id_hotel` bigint UNSIGNED NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `nbr_chambre` int NOT NULL,
  `prix` int NOT NULL,
  `heure` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_reservation`),
  KEY `reservations_id_user_foreign` (`id_user`),
  KEY `reservations_id_hotel_foreign` (`id_hotel`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id_reservation`, `id_user`, `id_hotel`, `date_debut`, `date_fin`, `nbr_chambre`, `prix`, `heure`, `active`, `created_at`, `updated_at`) VALUES
(3, 8, 1, '2024-06-20', '2024-06-21', 5, 50000, '22:04', '1', '2024-06-20 17:05:08', '2024-06-20 17:05:08');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `nom`, `prenom`, `email`, `contact`, `password`, `remember_token`, `created_at`, `updated_at`, `status`, `active`) VALUES
(1, 'dede', 'kely be', 'dede@mail.com', '1789', '$2y$10$UdTOkvwNA3OW..yoWszIh.Tde2nU3FGv3HnNnVLs5g6EtnYUpi0QW', NULL, '2024-06-13 10:28:31', '2024-06-13 10:28:31', 'fournisseur', '1'),
(2, 'rakoto', 'jean', 'rakoto@mail.com', '4568', '$2y$10$3mu4WzLWjQCVtZAng5ogguP7N11Em5/DW2FdmLA/iHwfUauU4xlba', NULL, '2024-06-13 10:31:48', '2024-06-13 10:31:48', 'fournisseur', '1'),
(3, 'nomena', 'tsoa', 'nomena@mail.com', '12345', '$2y$10$oe4dqBlsuW.BCSgXXK19fO2eccUdHV/Ms21c1s6EThxsg6Pas.Aje', NULL, '2024-06-13 10:33:37', '2024-06-13 10:33:37', 'fournisseur', '1'),
(4, 'ndrina', 'noely', 'ndrina@mail.com', '1356', '$2y$10$/dZRG.tIaraAjNFDm0QZ3ekRcWzk1UxDmttp0X10mfocrkEvwoXpC', NULL, '2024-06-13 10:35:35', '2024-06-13 10:35:35', 'fournisseur', '1'),
(5, 'sedera', 'gege', 'sedera@mail.com', '12355', '$2y$10$OxSBduCde7l8kzEKNn9w0uCOMxUS0QPNKKwZlNb1lzkF34PmuL6Ce', NULL, '2024-06-13 10:37:28', '2024-06-13 10:37:28', 'fournisseur', '1'),
(6, 'cedric', 'rina', 'cedric@mail.com', '123562', '$2y$10$.LtJJ/OT2YVMVpqdHCa67.Hq71p8nVSFlAYA.UfJjlGjOtLptqWEC', NULL, '2024-06-13 10:39:10', '2024-06-13 10:39:10', 'fournisseur', '1'),
(7, 'cecilien', 'cecilien', 'cecilien@mail.com', '2355', '$2y$10$SECLBhKDqXLIcFfxoMnqUeehikc4HzWKuPLx6glhwuJFqUfJ0p1V6', NULL, '2024-06-18 15:23:42', '2024-06-18 15:23:42', 'admin', '1'),
(8, 'Nomenjanahary', 'Rija', 'rija@mail.com', '2355', '$2y$10$IDAsIIDU/u4aTIf2p.V.R.NQxcD6VaVqVTckaNWIAdd8iumb9r20i', NULL, '2024-06-18 15:28:31', '2024-06-18 15:28:31', 'client', '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
