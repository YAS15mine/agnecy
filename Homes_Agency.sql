-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 21 fév. 2023 à 09:26
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
  time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;

/*!40101 SET NAMES utf8mb4 */
;

--
-- Base de données : `test`
--
--
--
-- Structure de la table `annonce`
--
CREATE TABLE `annonce` (
  `ad_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `publication_date` date NOT NULL,
  `last_modification_date` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Contry` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Déchargement des données de la table `annonce`
--
INSERT INTO
  `annonce` (
    `ad_id`,
    `title`,
    `price`,
    `publication_date`,
    `last_modification_date`,
    `address`,
    `City`,
    `Contry`,
    `category`,
    `type`,
    `client_id`
  )
VALUES
  (
    2,
    'villa moahed ',
    6600000,
    '2023-02-20',
    '2023-02-20',
    'tanger,morocco',
    'tanger',
    'morocco',
    'villa',
    'sale',
    1
  ),
  (
    3,
    'khadija office',
    5500,
    '2023-02-21',
    '2023-02-21',
    'casablanca,morocco',
    'casablanca',
    'morocco',
    'office',
    'rent',
    1
  ),
  (
    4,
    'Yasmine house',
    3000000,
    '2023-02-21',
    '2023-02-21',
    'tanger,morocco',
    'tanger',
    'morocco',
    'apartment',
    'sale',
    1
  ),
  (
    5,
    'grand villa hassan',
    50000000,
    '2023-02-21',
    '2023-02-21',
    'safe,morocco',
    'safe',
    'morocco',
    'villa',
    'rent',
    1
  ),
  (
    6,
    'Yassine office',
    6000,
    '2023-02-21',
    '2023-02-21',
    'Rabat,morocco',
    'Rabat',
    'morocco',
    'office',
    'rent',
    1
  ),
  (
    7,
    'region lands',
    55000000,
    '2023-02-21',
    '2023-02-21',
    'tanger,morocco',
    'tanger',
    'morocco',
    'land',
    'sale',
    1
  ),
  (
    8,
    'Ahlan appartments',
    2400000,
    '2023-02-21',
    '2023-02-21',
    'Zagoura,morocco',
    'Zagoura',
    'morocco',
    'apartment',
    'sale',
    1
  ),
  (
    9,
    'soufian villa',
    50000000,
    '2023-02-21',
    '2023-02-21',
    'tanger,morocco',
    'tanger',
    'morocco',
    'villa',
    'sale',
    2
  ),
  (
    10,
    'hamza offices',
    4500,
    '2023-02-21',
    '2023-02-21',
    'tanger,morocco',
    'tanger',
    'morocco',
    'office',
    'rent',
    2
  ),
  (
    11,
    'big lands',
    670000,
    '2023-02-21',
    '2023-02-21',
    'beni mellal,morocco',
    'beni mellal',
    'morocco',
    'land',
    'sale',
    2
  );

-- --------------------------------------------------------
--
-- Structure de la table `client`
--
CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--
INSERT INTO
  `client` (
    `client_id`,
    `first_name`,
    `last_name`,
    `email`,
    `password`,
    `phone_number`
  )
VALUES
  (
    1,
    'hussein',
    'bouik',
    'daifaney@gmail.com',
    'huss080701',
    '0626916989'
  ),
  (
    2,
    'soufian',
    'tamim',
    'soufian.tamim.solicode@gmail.com',
    'soudian.tamim01',
    '0600000000'
  );

-- --------------------------------------------------------
--
-- Structure de la table `image_d_annonce`
--
CREATE TABLE image_d_annonce (
  image_id INT NOT NULL PRIMARY KEY,
  primary_or_secondary ENUM('primary', 'secondary') NOT NULL,
  image_path VARCHAR(200) NOT NULL,
  ad_id INT NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Déchargement des données de la table `image_d_annonce`
--
INSERT INTO
  `image_d_annonce` (
    `image_id`,
    `primary_or_secondary`, 
    `image_path`,
    `ad_id`
  )
VALUES
  (1, 'primary', '/images/1_primary.jpg', 2),
  (2, 'secondary', '/images/1_secondary1.jpg', 2),
  (3, 'secondary', '/images/1_secondary2.jpg', 2),
  (4, 'secondary', '/images/1_secondary3.jpg', 2),
  (5, 'secondary', '/images/1_secondary4.jpg', 2),
  (6, 'primary', '/images/2_primary.jpg', 3),
  (7, 'secondary', '/images/1_secondary1.jpg', 3),
  (8, 'secondary', '/images/1_secondary2.jpg', 3),
  (9, 'secondary', '/images/1_secondary3.jpg', 3),
  (10, 'secondary', '/images/1_secondary4.jpg', 3),
  (11, 'primary', '/images/3_primary.jpg', 4),
  (12, 'secondary', '/images/1_secondary1.jpg', 4),
  (13, 'secondary', '/images/1_secondary2.jpg', 4),
  (14, 'secondary', '/images/1_secondary3.jpg', 4),
  (15, 'secondary', '/images/1_secondary4.jpg', 4),
  (16, 'primary', '/images/4_primary.jpg', 5),
  (17, 'secondary', '/images/1_secondary1.jpg', 5),
  (18, 'secondary', '/images/1_secondary2.jpg', 5),
  (19, 'secondary', '/images/1_secondary3.jpg', 5),
  (20, 'secondary', '/images/1_secondary4.jpg', 5),
  (21, 'primary', '/images/5_primary.jpg', 6),
  (22, 'secondary', '/images/1_secondary1.jpg', 6),
  (23, 'secondary', '/images/1_secondary2.jpg', 6),
  (24, 'secondary', '/images/1_secondary3.jpg', 6),
  (25, 'secondary', '/images/1_secondary4.jpg', 6),
  (26, 'primary', '/images/6_primary.jpg', 7),
  (27, 'secondary', '/images/1_secondary1.jpg', 7),
  (28, 'secondary', '/images/1_secondary2.jpg', 7),
  (29, 'secondary', '/images/1_secondary3.jpg', 7),
  (30, 'secondary', '/images/1_secondary4.jpg', 7),
  (31, 'primary', '/images/7_primary.jpg', 8),
  (32, 'secondary', '/images/1_secondary1.jpg', 8),
  (33, 'secondary', '/images/1_secondary2.jpg', 8),
  (34, 'secondary', '/images/1_secondary3.jpg', 8),
  (35, 'secondary', '/images/1_secondary4.jpg', 8),
  (36, 'primary', '/images/1_primary.jpg', 9),
  (37, 'secondary', '/images/1_secondary1.jpg', 9),
  (38, 'secondary', '/images/1_secondary2.jpg', 9),
  (39, 'secondary', '/images/1_secondary3.jpg', 9),
  (40, 'secondary', '/images/1_secondary4.jpg', 9),
  (41, 'primary', '/images/1_primary.jpg', 10),
  (42, 'secondary', '/images/1_secondary1.jpg', 10),
  (43, 'secondary', '/images/1_secondary2.jpg', 10),
  (44, 'secondary', '/images/1_secondary3.jpg', 10),
  (45, 'secondary', '/images/1_secondary4.jpg', 10),
  (46, 'primary', '/images/1_primary.jpg', 11),
  (47, 'secondary', '/images/1_secondary1.jpg', 11),
  (48, 'secondary', '/images/1_secondary2.jpg', 11),
  (49, 'secondary', '/images/1_secondary3.jpg', 11),
  (50, 'secondary', '/images/1_secondary4.jpg', 11);

--
-- Index pour les tables déchargées
--
--
-- Index pour la table `annonce`
--
ALTER TABLE
  `annonce`
ADD
  PRIMARY KEY (`ad_id`),
ADD
  KEY `client_id` (`client_id`);

--
-- Index pour la table `client`
--
ALTER TABLE
  `client`
ADD
  PRIMARY KEY (`client_id`);

--
-- Index pour la table `image_d_annonce`
--
-- ALTER TABLE `image_d_annonce`
--   ADD PRIMARY KEY (`image_id`),
--   ADD KEY `ad_id` (`ad_id`);
ALTER TABLE
  `image_d_annonce`
ADD
  KEY `ad_id` (`ad_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--
--
-- AUTO_INCREMENT pour la table `annonce`
--
ALTER TABLE
  `annonce`
MODIFY
  `ad_id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 12;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE
  `client`
MODIFY
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 3;

--
-- AUTO_INCREMENT pour la table `image_d_annonce`
--
ALTER TABLE
  `image_d_annonce`
MODIFY
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 51;

--
-- Contraintes pour les tables déchargées
--
--
-- Contraintes pour la table `annonce`
--
ALTER TABLE
  `annonce`
ADD
  CONSTRAINT `annonce_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`);

--
-- Contraintes pour la table `image_d_annonce`
--
ALTER TABLE
  `image_d_annonce`
ADD
  CONSTRAINT `image_d_annonce_ibfk_1` FOREIGN KEY (`ad_id`) REFERENCES `annonce` (`ad_id`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;