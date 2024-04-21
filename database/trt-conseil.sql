-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 21 avr. 2024 à 17:40
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `trt-conseil`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

DROP TABLE IF EXISTS `annonce`;
CREATE TABLE IF NOT EXISTS `annonce` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description_annonce` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `poste_demandee` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lieu_travail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_annonce` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `utilisateur_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F65593E5FB88E14F` (`utilisateur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id`, `description_annonce`, `poste_demandee`, `lieu_travail`, `date_annonce`, `status`, `utilisateur_id`) VALUES
(1, 'Restaurant Gastronomique renommé recherche un Chef Cuisinier passionné pour rejoindre notre équipe dynamique. Si vous êtes créatif, talentueux et avez une véritable passion pour la gastronomie, nous avons l\\\'opportunité parfaite pour vous.', 'Chef Cuisinier', 'Nabeul', '2024-03-17', 0, 2),
(2, 'Restaurant branché et animé recherche des serveurs talentueux et passionnés pour offrir une expérience exceptionnelle à nos clients. Si vous êtes enthousiaste, orienté client et que vous aimez travailler dans un environnement dynamique, nous voulons vous rencontrer.', 'Serveur', 'Lorient', '2024-03-28', 0, 7),
(4, 'Restaurant réputé situé en plein cœur de la ville recherche un plongeur motivé et dynamique pour rejoindre notre équipe de cuisine. Si vous êtes organisé, capable de travailler efficacement et souhaitez contribuer à l\'excellence de notre service, nous serions ravis de vous rencontrer.', 'Plongeur', 'France', '2024-03-22', 1, 2),
(5, 'Restaurant branché et convivial cherche des serveurs/serveuses enthousiastes et dynamiques pour offrir une expérience exceptionnelle à nos clients. Si vous êtes passionné(e) par le service, avez une attitude positive et souhaitez rejoindre une équipe dévouée, nous serions enchantés de vous accueillir.', 'Serveuse', 'Paris', '2024-03-07', 1, 4),
(6, 'Restaurant de renom spécialisé dans la cuisine italienne cherche à embaucher un Chef Cuisinier créatif et passionné pour diriger notre brigade de cuisine. Si vous êtes un chef expérimenté, passionné par l\'art culinaire italien et doté d\'excellentes compétences en gestion, nous aimerions vous rencontrer.', 'Chef Cuisinier', 'Paris', '2024-03-19', 0, 9),
(7, 'Restaurant familial convivial cherche un(e) Plongeur(euse) énergique et motivé(e) pour soutenir notre équipe de cuisine. Si vous êtes une personne organisée, capable de travailler efficacement dans un environnement dynamique, nous serions ravis de vous accueillir dans notre équipe.', 'Plongeur', 'Paris', '2024-03-28', 0, 8),
(8, 'Restaurant de haut standing situé au cœur de la ville recherche des Serveurs/Serveuses professionnels et enthousiastes pour offrir un service d\'exception à nos clients. Si vous avez une expérience significative dans le secteur de la restauration, un sens inné de l\'hospitalité et des compétences en communication exceptionnelles, nous serions ravis de vous rencontrer.', 'Serveur', 'Lille', '2024-03-03', 1, 3),
(9, 'Restaurant branché et accueillant situé au cœur de la ville recherche des Serveurs dynamiques et enthousiastes pour offrir un service exceptionnel à nos clients. Si vous êtes passionné par la restauration, doté d\'un excellent sens du relationnel et que vous aimez travailler dans une ambiance conviviale, nous serions ravis de vous rencontrer.', 'Serveur', 'Lille', '2024-03-01', 1, 4),
(10, 'La Casa, un restaurant réputé pour son ambiance chaleureuse et sa cuisine de qualité, recherche un Chef Cuisinier passionné pour rejoindre notre équipe talentueuse. En tant que Chef Cuisinier, vous serez responsable de la gestion de la cuisine, de la création de plats délicieux et innovants, et de la supervision de l\'équipe de cuisine pour garantir une expérience culinaire exceptionnelle pour nos clients.', 'Chef Cuisinier', 'Arras', '2024-04-06', 0, 7),
(11, 'Le restaurant Le Pêcheur est un établissement renommé situé au cœur de la ville, spécialisé dans les fruits de mer et les plats de poissons frais. Nous offrons une expérience culinaire exceptionnelle dans un cadre élégant et convivial, et nous nous engageons à fournir à nos clients des plats de la plus haute qualité. Nous recherchons un chef cuisinier talentueux et passionné pour rejoindre notre équipe dynamique.', 'Chef Cuisinier', 'France', '2024-04-12', 0, 7);

-- --------------------------------------------------------

--
-- Structure de la table `candidature`
--

DROP TABLE IF EXISTS `candidature`;
CREATE TABLE IF NOT EXISTS `candidature` (
  `id` int NOT NULL AUTO_INCREMENT,
  `approuver` tinyint(1) DEFAULT '0',
  `date_approbation` date DEFAULT NULL,
  `utilisateur_id` int DEFAULT NULL,
  `annonce_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E33BD3B8FB88E14F` (`utilisateur_id`),
  KEY `IDX_E33BD3B88805AB2F` (`annonce_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `candidature`
--

INSERT INTO `candidature` (`id`, `approuver`, `date_approbation`, `utilisateur_id`, `annonce_id`) VALUES
(3, 0, '2024-03-20', 2, 2),
(4, 1, '2024-03-19', 3, 7),
(5, 0, '2024-03-25', 4, 5),
(6, 0, '2024-03-26', 7, 6),
(9, NULL, NULL, 4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20240330001956', '2024-03-30 00:20:04', 16),
('DoctrineMigrations\\Version20240330080136', '2024-03-30 11:11:07', 56);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `body` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `messenger_messages`
--

INSERT INTO `messenger_messages` (`id`, `body`, `headers`, `queue_name`, `created_at`, `available_at`, `delivered_at`) VALUES
(1, 'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:51:\\\"Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\\":2:{s:60:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0message\\\";O:39:\\\"Symfony\\\\Bridge\\\\Twig\\\\Mime\\\\TemplatedEmail\\\":5:{i:0;s:30:\\\"reset_password/email.html.twig\\\";i:1;N;i:2;a:1:{s:10:\\\"resetToken\\\";O:58:\\\"SymfonyCasts\\\\Bundle\\\\ResetPassword\\\\Model\\\\ResetPasswordToken\\\":4:{s:65:\\\"\\0SymfonyCasts\\\\Bundle\\\\ResetPassword\\\\Model\\\\ResetPasswordToken\\0token\\\";s:40:\\\"4y0WRkTr2geqJqv2QXhO5LmtHElysA0EKXpnwKtA\\\";s:69:\\\"\\0SymfonyCasts\\\\Bundle\\\\ResetPassword\\\\Model\\\\ResetPasswordToken\\0expiresAt\\\";O:17:\\\"DateTimeImmutable\\\":3:{s:4:\\\"date\\\";s:26:\\\"2024-03-07 10:32:41.906371\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:71:\\\"\\0SymfonyCasts\\\\Bundle\\\\ResetPassword\\\\Model\\\\ResetPasswordToken\\0generatedAt\\\";i:1709803961;s:73:\\\"\\0SymfonyCasts\\\\Bundle\\\\ResetPassword\\\\Model\\\\ResetPasswordToken\\0transInterval\\\";i:1;}}i:3;a:6:{i:0;N;i:1;N;i:2;N;i:3;N;i:4;a:0:{}i:5;a:2:{i:0;O:37:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\\":2:{s:46:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0headers\\\";a:3:{s:4:\\\"from\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:4:\\\"From\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:24:\\\"tshaukemulumba@yahoo.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:15:\\\"Salomon TSHAUKE\\\";}}}}s:2:\\\"to\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:2:\\\"To\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:24:\\\"alexandrejoyce@yahoo.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:7:\\\"subject\\\";a:1:{i:0;O:48:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:7:\\\"Subject\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:55:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\0value\\\";s:27:\\\"Your password reset request\\\";}}}s:49:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0lineLength\\\";i:76;}i:1;N;}}i:4;N;}s:61:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0envelope\\\";N;}}', '[]', 'default', '2024-03-07 09:32:44', '2024-03-07 09:32:44', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `profil_candidat`
--

DROP TABLE IF EXISTS `profil_candidat`;
CREATE TABLE IF NOT EXISTS `profil_candidat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cv` varchar(255) DEFAULT NULL,
  `poste` varchar(255) DEFAULT NULL,
  `utilisateur_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `utilisateur_id` (`utilisateur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `profil_recruteur`
--

DROP TABLE IF EXISTS `profil_recruteur`;
CREATE TABLE IF NOT EXISTS `profil_recruteur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int DEFAULT NULL,
  `nom_entreprise` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse_entreprise` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_83A851ACFB88E14F` (`utilisateur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `profil_recruteur`
--

INSERT INTO `profil_recruteur` (`id`, `utilisateur_id`, `nom_entreprise`, `adresse_entreprise`) VALUES
(1, 8, 'Bistrot Instinct', '19 Rue de Picardie, 75003 Paris France'),
(2, 9, 'Il Etait Un Square', '54, Rue Corvisart, 75013 Paris France'),
(3, 4, 'Nectar', '7 rue Mayran Hôtel Maison mère, 75009 Paris France'),
(4, 7, 'Akabeko Restaurant', '40 Rue De L\'université, 75007 Paris France'),
(5, 3, 'Bistro Chez Pradel', '3 rue du Pasteur Wagner, 75011 Paris France');

-- --------------------------------------------------------

--
-- Structure de la table `reset_password_request`
--

DROP TABLE IF EXISTS `reset_password_request`;
CREATE TABLE IF NOT EXISTS `reset_password_request` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `selector` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hashed_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `requested_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `expires_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_7CE748AA76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reset_password_request`
--

INSERT INTO `reset_password_request` (`id`, `user_id`, `selector`, `hashed_token`, `requested_at`, `expires_at`) VALUES
(1, 3, '4y0WRkTr2geqJqv2QXhO', 'bYK1MwLeLqLgT6Fh0bnRG9aGkSKWV/nY5AUzsThPAIc=', '2024-03-07 09:32:41', '2024-03-07 10:32:41');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1D1C63B3E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `email`, `roles`, `password`, `nom`, `prenom`, `date_creation`, `status`) VALUES
(2, 'alexandros.ones@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$sluKclIY.tvE8i/PKrkFkenJ/nFlb4zrtTS1jmx1XuzY6ljqQpZPy', 'Alexandre', 'Joyce', '2024-03-06', 1),
(3, 'alexandrejoyce@yahoo.com', '[\"ROLE_CONSULTANT\"]', '$2y$13$vPUhwWuaVNW8hk1FpfkjzeB3nPRPRrFwTxfhAsjYddWnf0J4swB0G', 'Scrapy', 'Salomon', '2024-03-06', 1),
(4, 'alexandrejoyce4@yahoo.com', '[\"ROLE_CANDIDAT\"]', '$2y$13$zfxPy.azqy9kLq2FFRGzqeAbBN9ql0bgLgfOXNXa22GG0a4MW61fy', 'Tshauke', 'Alexandros', '2024-03-07', 1),
(7, 'camaramagname65@gmail.com', '[\"ROLE_RECRUTEUR\"]', '$2y$13$eG7hdgWexAWmVE1sKvXvsO/m4iIYRS88bQevL31ovc5hYab22YjeS', 'Camara', 'Magname', '2024-03-21', 1),
(8, 'camaramagname66@gmail.com', '[\"ROLE_RECRUTEUR\"]', '$2y$13$It3yQZilepbkzRtvKKrKZe51d7i9ls7DvM.gagdu.TjMc8HTdeK0O', 'Camara', 'Magname', '2024-03-24', 0),
(9, 'camaramagname67@gmail.com', '[\"ROLE_RECRUTEUR\"]', '$2y$13$H.07fUolIzGmBrOsDMOX7.pE7HKOeP.kBJoBTX/bh36/kGCg.F/XO', 'Camara', 'Magname', '2024-03-25', 1),
(39, 'haliyousri@gmail.com', '[\"ROLE_CONSULTANT\"]', '$2y$13$x.UGpi6ZeHjTL.gPVG/VA.GuzZL6iY9xbhKs6PyUqKPuQy3xAKoza', 'Riadh', 'yosri', '2024-04-03', 1),
(40, 'joshuantambwe@yahoo.com', '[\"ROLE_CONSULTANT\"]', '$2y$13$TyYMKfsgcnlRjxLL63YLQOE4IqIbUP4NZq839FLcMYGmQcdX0O.QS', 'NTAMBWE', 'Joshua', '2024-04-05', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `FK_F65593E5FB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `candidature`
--
ALTER TABLE `candidature`
  ADD CONSTRAINT `FK_E33BD3B88805AB2F` FOREIGN KEY (`annonce_id`) REFERENCES `annonce` (`id`),
  ADD CONSTRAINT `FK_E33BD3B8FB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `profil_candidat`
--
ALTER TABLE `profil_candidat`
  ADD CONSTRAINT `profil_candidat_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `profil_recruteur`
--
ALTER TABLE `profil_recruteur`
  ADD CONSTRAINT `FK_83A851ACFB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  ADD CONSTRAINT `FK_7CE748AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `utilisateur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
