-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Ven 28 Février 2020 à 08:59
-- Version du serveur :  5.7.29-0ubuntu0.18.04.1
-- Version de PHP :  7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `acscom`
--

-- --------------------------------------------------------

--
-- Structure de la table `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `total_price_without_taxes` double NOT NULL,
  `total_price_all_taxes_included` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `bills_products`
--

CREATE TABLE `bills_products` (
  `bills_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `product_amount` int(11) DEFAULT NULL,
  `total_price_paid` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_price_without_taxes` double NOT NULL,
  `total_price_all_taxes_included` double NOT NULL,
  `last_modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cart_products`
--

CREATE TABLE `cart_products` (
  `cart_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `product_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categories_products`
--

CREATE TABLE `categories_products` (
  `categories_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `deals`
--

CREATE TABLE `deals` (
  `id` int(11) NOT NULL,
  `code` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_percentage` int(11) NOT NULL,
  `expiration_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `deals_categories`
--

CREATE TABLE `deals_categories` (
  `deals_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `deals_products`
--

CREATE TABLE `deals_products` (
  `deals_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `deals_user`
--

CREATE TABLE `deals_user` (
  `deals_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200227145456', '2020-02-27 14:56:13'),
('20200227151140', '2020-02-27 15:11:59'),
('20200227151515', '2020-02-27 15:15:22'),
('20200227151829', '2020-02-27 15:19:49'),
('20200227152406', '2020-02-27 15:24:16'),
('20200227153223', '2020-02-27 15:32:36'),
('20200228080133', '2020-02-28 08:02:04'),
('20200228080557', '2020-02-28 08:06:13'),
('20200228081215', '2020-02-28 08:12:58'),
('20200228081526', '2020-02-28 08:15:34'),
('20200228082211', '2020-02-28 08:22:22'),
('20200228082744', '2020-02-28 08:27:54'),
('20200228083221', '2020-02-28 08:32:31');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_without_taxes` double NOT NULL,
  `price_all_taxes_included` double NOT NULL,
  `is_available` tinyint(1) NOT NULL,
  `product_stock` int(11) NOT NULL,
  `times_purchased` int(11) NOT NULL,
  `has_different_sizes` tinyint(1) NOT NULL,
  `has_different_colors` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci,
  `score` int(11) DEFAULT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(320) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `adress` longtext COLLATE utf8mb4_unicode_ci,
  `loyalty_points` int(11) DEFAULT NULL,
  `is_confirmed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_22775DD0A76ED395` (`user_id`);

--
-- Index pour la table `bills_products`
--
ALTER TABLE `bills_products`
  ADD PRIMARY KEY (`bills_id`,`products_id`),
  ADD KEY `IDX_24F5F28C2ABC37A4` (`bills_id`),
  ADD KEY `IDX_24F5F28C6C8A81A9` (`products_id`);

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_BA388B7A76ED395` (`user_id`);

--
-- Index pour la table `cart_products`
--
ALTER TABLE `cart_products`
  ADD PRIMARY KEY (`cart_id`,`products_id`),
  ADD KEY `IDX_2D2515311AD5CDBF` (`cart_id`),
  ADD KEY `IDX_2D2515316C8A81A9` (`products_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_3AF34668727ACA70` (`parent_id`);

--
-- Index pour la table `categories_products`
--
ALTER TABLE `categories_products`
  ADD PRIMARY KEY (`categories_id`,`products_id`),
  ADD KEY `IDX_6544F363A21214B7` (`categories_id`),
  ADD KEY `IDX_6544F3636C8A81A9` (`products_id`);

--
-- Index pour la table `deals`
--
ALTER TABLE `deals`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `deals_categories`
--
ALTER TABLE `deals_categories`
  ADD PRIMARY KEY (`deals_id`,`categories_id`),
  ADD KEY `IDX_9402283F97ED4789` (`deals_id`),
  ADD KEY `IDX_9402283FA21214B7` (`categories_id`);

--
-- Index pour la table `deals_products`
--
ALTER TABLE `deals_products`
  ADD PRIMARY KEY (`deals_id`,`products_id`),
  ADD KEY `IDX_D822012F97ED4789` (`deals_id`),
  ADD KEY `IDX_D822012F6C8A81A9` (`products_id`);

--
-- Index pour la table `deals_user`
--
ALTER TABLE `deals_user`
  ADD PRIMARY KEY (`deals_id`,`user_id`),
  ADD KEY `IDX_E607A00397ED4789` (`deals_id`),
  ADD KEY `IDX_E607A003A76ED395` (`user_id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6970EB0FA76ED395` (`user_id`),
  ADD KEY `IDX_6970EB0F4584665A` (`product_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `deals`
--
ALTER TABLE `deals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `FK_22775DD0A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `bills_products`
--
ALTER TABLE `bills_products`
  ADD CONSTRAINT `FK_24F5F28C2ABC37A4` FOREIGN KEY (`bills_id`) REFERENCES `bills` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_24F5F28C6C8A81A9` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_BA388B7A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `cart_products`
--
ALTER TABLE `cart_products`
  ADD CONSTRAINT `FK_2D2515311AD5CDBF` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_2D2515316C8A81A9` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `FK_3AF34668727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`);

--
-- Contraintes pour la table `categories_products`
--
ALTER TABLE `categories_products`
  ADD CONSTRAINT `FK_6544F3636C8A81A9` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_6544F363A21214B7` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `deals_categories`
--
ALTER TABLE `deals_categories`
  ADD CONSTRAINT `FK_9402283F97ED4789` FOREIGN KEY (`deals_id`) REFERENCES `deals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_9402283FA21214B7` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `deals_products`
--
ALTER TABLE `deals_products`
  ADD CONSTRAINT `FK_D822012F6C8A81A9` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_D822012F97ED4789` FOREIGN KEY (`deals_id`) REFERENCES `deals` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `deals_user`
--
ALTER TABLE `deals_user`
  ADD CONSTRAINT `FK_E607A00397ED4789` FOREIGN KEY (`deals_id`) REFERENCES `deals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_E607A003A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `FK_6970EB0F4584665A` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `FK_6970EB0FA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
