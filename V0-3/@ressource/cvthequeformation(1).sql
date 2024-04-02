-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 20, 2024 at 05:16 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cvthequeformation`
--

-- --------------------------------------------------------

--
-- Table structure for table `competences`
--

CREATE TABLE `competences` (
  `id` bigint UNSIGNED NOT NULL COMMENT 'identifiant d''une compétence',
  `intitule` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nom de la competence',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Court descriptif d''une competence',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `competences`
--

INSERT INTO `competences` (`id`, `intitule`, `description`, `created_at`, `updated_at`) VALUES
(11, 'Programmation en langages', 'Capacité à écrire et à comprendre du code dans plusieurs langages de programmation couramment utilisés dans le développement logiciel.', '2024-03-07 09:57:06', '2024-03-07 09:57:06'),
(12, 'Développement front-end', 'Compétence dans la création d\'interfaces utilisateur web ou mobiles, en utilisant des technologies comme HTML, CSS, et JavaScript.', '2024-03-07 09:57:28', '2024-03-07 09:57:28'),
(13, 'Développement back-end', 'Aptitude à concevoir et à gérer la logique et la base de données d\'une application, en utilisant des serveurs, des applications et des bases de données.', '2024-03-07 09:57:45', '2024-03-07 09:57:45'),
(14, 'Gestion de bases de données', 'Compétence dans la manipulation, l\'organisation et la sécurisation des données au moyen de systèmes de gestion de bases de données comme SQL, Oracle, ou MongoDB.', '2024-03-07 09:58:00', '2024-03-07 09:58:00'),
(15, 'Cybersécurité et protection des données', 'Connaissances dans la mise en œuvre de mesures de sécurité pour protéger les systèmes et les données contre les cyberattaques.', '2024-03-07 09:58:15', '2024-03-07 09:58:15'),
(16, 'Analyse des besoins et spécification de logiciels', 'Capacité à analyser les besoins des utilisateurs ou des clients pour créer des cahiers des charges et des spécifications techniques pour le développement de logiciels.', '2024-03-07 09:58:38', '2024-03-07 09:58:38'),
(17, 'Gestion de projet informatique', 'Aptitude à planifier, organiser, diriger et contrôler les ressources pour atteindre les objectifs spécifiques d\'un projet informatique.', '2024-03-07 09:58:48', '2024-03-07 09:58:48'),
(18, 'Maintenance et dépannage informatique', 'Compétences techniques pour identifier, diagnostiquer et résoudre les problèmes hardware et software.', '2024-03-07 09:59:06', '2024-03-07 09:59:06');

-- --------------------------------------------------------

--
-- Table structure for table `competence_professionnel`
--

CREATE TABLE `competence_professionnel` (
  `id` bigint UNSIGNED NOT NULL,
  `competence_id` bigint UNSIGNED NOT NULL,
  `professionnel_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `competence_professionnel`
--

INSERT INTO `competence_professionnel` (`id`, `competence_id`, `professionnel_id`, `created_at`, `updated_at`) VALUES
(2, 13, 14, '2024-03-14 10:59:55', '2024-03-14 10:59:55'),
(3, 12, 14, '2024-03-14 11:02:00', '2024-03-14 11:02:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `metiers`
--

CREATE TABLE `metiers` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `libelle` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `metiers`
--

INSERT INTO `metiers` (`id`, `created_at`, `updated_at`, `libelle`, `description`, `slug`) VALUES
(8, '2024-03-07 09:51:16', '2024-03-07 09:51:16', 'Développeur', 'Conçoit et développe des sites web selon les besoins des clients ou de l\'entreprise.', 'developpeur-web'),
(9, '2024-03-07 09:51:44', '2024-03-07 09:51:44', 'Analyste programmeur', 'Analyse les besoins des utilisateurs et programme des solutions logicielles.', 'analyste-programmeur'),
(10, '2024-03-07 09:52:05', '2024-03-07 09:52:05', 'Administrateur', 'Gère, sécurise et optimise les bases de données pour les rendre accessibles et performantes.', 'administrateur-bases-donnees'),
(11, '2024-03-07 09:52:57', '2024-03-07 09:52:57', 'Technicien', 'Assure le support technique auprès des utilisateurs pour résoudre les problèmes informatiques.', 'technicien-support-informatique'),
(12, '2024-03-07 09:53:26', '2024-03-07 09:53:26', 'Consultante en cybersécurité', 'Conseille les entreprises sur la sécurisation de leurs systèmes d\'information.', 'consultant-cybersecurite'),
(13, '2024-03-07 09:53:49', '2024-03-07 09:53:49', 'Chef de projet informatique', 'Planifie, coordonne et supervise le développement de projets informatiques.', 'chef-projet-informatique'),
(14, '2024-03-07 09:54:11', '2024-03-07 09:54:24', 'Développeur mobiles', 'Conçoit et développe des applications pour smartphones et tablettes.', 'developpeur-applications-mobiles'),
(15, '2024-03-07 09:54:51', '2024-03-07 09:54:51', 'Data analyst', 'Traite et analyse les données pour aider à la prise de décision.', 'data-analyst');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_15_142102_create_competences_table', 1),
(6, '2024_02_16_205220_create_metiers_table', 2),
(7, '2024_03_07_131500_create_professionnels_table', 3),
(8, '2024_03_14_102450_create_competence_professionnel_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `professionnels`
--

CREATE TABLE `professionnels` (
  `id` bigint UNSIGNED NOT NULL COMMENT 'ID du professionnel',
  `prenom` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Prénom du professionnel',
  `nom` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nom du professionnel',
  `cp` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Code postal du professionnel',
  `ville` varchar(38) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Ville du professionnel',
  `telephone` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'telephone du professionnel',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'email du professionnel',
  `naissance` date NOT NULL COMMENT 'Date de naissance du professionnel',
  `formation` tinyint(1) NOT NULL COMMENT 'activiter de formation deja fait oui non',
  `domaine` set('S','R','D') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'domlaine d''activité du professionnel',
  `source` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'source du professionnel',
  `observation` text COLLATE utf8mb4_unicode_ci COMMENT 'Observation ou commentaire ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `metier_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `professionnels`
--

INSERT INTO `professionnels` (`id`, `prenom`, `nom`, `cp`, `ville`, `telephone`, `email`, `naissance`, `formation`, `domaine`, `source`, `observation`, `created_at`, `updated_at`, `metier_id`) VALUES
(1, 'samuel', 'masque', '41000', 'blois', '060000000000', 'test@gmail.com', '2001-10-24', 1, 'D', NULL, 'ok', NULL, '2024-03-12 08:19:11', 8),
(4, 'toto', 'riphi', '37310', 'tauxigny', '060000000000', 'toto@gmail.com', '1954-12-13', 0, 'D', 'http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=cvthequeformation&table=professionnels', 'c\'est un gas bien', '2024-03-11 16:10:31', '2024-03-11 16:10:31', 13),
(5, 'test', 'test', '00000', 'blois', '060000000000', 'test@test.fr', '2024-02-27', 1, 'S', 'rtretre', 'retreter', '2024-03-12 08:16:30', '2024-03-12 08:16:30', 8),
(8, 'test', 'test', '41000', 'bidou', '060000000000', 'test446@gmail.com', '2024-03-06', 1, 'S', NULL, NULL, '2024-03-14 10:25:09', '2024-03-14 10:25:09', 9),
(11, 'test', 'test', '41000', 'bidou', '060000000000', 'test49@gmail.com', '2024-03-06', 1, 'S', NULL, NULL, '2024-03-14 10:27:48', '2024-03-14 10:27:48', 9),
(13, 'test', 'test', '41000', 'bidou', '060000000000', 'testppp49@gmail.com', '2024-03-06', 1, 'S', NULL, NULL, '2024-03-14 10:29:56', '2024-03-14 10:29:56', 9),
(14, 'competence', 'test', '00000', 'nulpar', '060000000000', 'comptest@gmail.com', '2024-02-27', 1, 'S', NULL, NULL, '2024-03-14 10:59:55', '2024-03-14 10:59:55', 15);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `competences`
--
ALTER TABLE `competences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `competence_professionnel`
--
ALTER TABLE `competence_professionnel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `competence_professionnel_competence_id_foreign` (`competence_id`),
  ADD KEY `competence_professionnel_professionnel_id_foreign` (`professionnel_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `metiers`
--
ALTER TABLE `metiers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `metiers_slug_unique` (`slug`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `professionnels`
--
ALTER TABLE `professionnels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `professionnels_email_unique` (`email`),
  ADD KEY `professionnels_metier_id_foreign` (`metier_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `competences`
--
ALTER TABLE `competences`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'identifiant d''une compétence', AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `competence_professionnel`
--
ALTER TABLE `competence_professionnel`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `metiers`
--
ALTER TABLE `metiers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `professionnels`
--
ALTER TABLE `professionnels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID du professionnel', AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `competence_professionnel`
--
ALTER TABLE `competence_professionnel`
  ADD CONSTRAINT `competence_professionnel_competence_id_foreign` FOREIGN KEY (`competence_id`) REFERENCES `competences` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `competence_professionnel_professionnel_id_foreign` FOREIGN KEY (`professionnel_id`) REFERENCES `professionnels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `professionnels`
--
ALTER TABLE `professionnels`
  ADD CONSTRAINT `professionnels_metier_id_foreign` FOREIGN KEY (`metier_id`) REFERENCES `metiers` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
