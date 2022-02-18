-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 29, 2022 at 02:49 PM
-- Server version: 10.3.9-MariaDB-log
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zfl2-zscouarjo`
--

-- --------------------------------------------------------

--
-- Table structure for table `TJ_EXP_OVR`
--

CREATE TABLE `TJ_EXP_OVR` (
  `exp_id` int(11) NOT NULL,
  `ovr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `TJ_EXP_OVR`
--

INSERT INTO `TJ_EXP_OVR` (`exp_id`, `ovr_id`) VALUES
(1, 1),
(1, 2),
(13, 2),
(1, 3),
(2, 4),
(3, 4),
(4, 5),
(5, 6),
(6, 7),
(7, 8),
(8, 9),
(9, 10),
(10, 11),
(11, 12),
(12, 13);

-- --------------------------------------------------------

--
-- Table structure for table `T_COMMENTAIRE_COM`
--

CREATE TABLE `T_COMMENTAIRE_COM` (
  `com_id` int(11) NOT NULL,
  `com_date` datetime NOT NULL,
  `com_text` varchar(512) NOT NULL,
  `vis_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `T_COMMENTAIRE_COM`
--

INSERT INTO `T_COMMENTAIRE_COM` (`com_id`, `com_date`, `com_text`, `vis_id`) VALUES
(1, '2022-01-26 15:17:42', 'Super musée !', 1),
(2, '2022-01-26 15:17:42', 'Musée pas terrible', 2),
(3, '2022-01-26 15:17:42', 'J\'ai bien aimé', 3),
(4, '2022-01-26 15:17:42', 'C\'était joli', 4),
(5, '2022-01-26 15:17:42', 'Je retournerai', 5);

-- --------------------------------------------------------

--
-- Table structure for table `T_COMPTE_CPT`
--

CREATE TABLE `T_COMPTE_CPT` (
  `cpt_login` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cpt_mdp` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `T_COMPTE_CPT`
--

INSERT INTO `T_COMPTE_CPT` (`cpt_login`, `cpt_mdp`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3'),
('conservateur', '5a7e42bc6e6f87048ca5d5fe55b0d1eb'),
('gEstionnaire', '98abb15e560057e55e4e99187702ed4e'),
('martin', 'e64c439d90fc3af223e1b4f66ae37bbe'),
('mel', '773928d3d43aed6b140a4b0556410d6f'),
('rld', '7766ddbd1fd4d2799330202c7bb9e047'),
('terrieur', '9b8f1b35d0d3151e91faa082d2234d53'),
('vmarc', '0d66a5dffeffbf2865d563033c389e2b'),
('yann', '952eba47981e9d040fb8aa0befef3cbd'),
('ytroloin', 'b6edd10559b20cb0a3ddaeb15e5267cc');

-- --------------------------------------------------------

--
-- Table structure for table `T_EXPOSANT_EXP`
--

CREATE TABLE `T_EXPOSANT_EXP` (
  `exp_id` int(11) NOT NULL,
  `exp_nom` varchar(64) NOT NULL,
  `exp_prenom` varchar(64) NOT NULL,
  `exp_bio` varchar(512) NOT NULL,
  `exp_email` varchar(256) DEFAULT NULL,
  `exp_website` varchar(512) DEFAULT NULL,
  `exp_img` varchar(256) DEFAULT NULL,
  `cpt_login` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `T_EXPOSANT_EXP`
--

INSERT INTO `T_EXPOSANT_EXP` (`exp_id`, `exp_nom`, `exp_prenom`, `exp_bio`, `exp_email`, `exp_website`, `exp_img`, `cpt_login`) VALUES
(1, 'Conway', 'John', 'Mathématicien 1937-2020', NULL, NULL, NULL, 'gEstionnaire'),
(2, 'Gardner', 'Martin', 'Mathématicien 1914-2010', NULL, NULL, NULL, 'gEstionnaire'),
(3, 'Golomb', 'Solomon', 'Mathématicien 1932-2016', NULL, NULL, NULL, 'gEstionnaire'),
(4, 'Michie', 'Donald', 'Chercheur en intélligence artificielle 1929-2007', NULL, NULL, NULL, 'gEstionnaire'),
(5, 'Sparks', 'Ben', '', NULL, NULL, NULL, 'gEstionnaire'),
(6, 'Sanderson', 'Grant', 'Créateur de 3Blue1Brown', NULL, NULL, NULL, 'gEstionnaire'),
(7, 'Droguet', 'Emmanuel', 'Prof de maths en prépa PCSI à Kérichen', NULL, NULL, NULL, 'gEstionnaire'),
(8, 'Rubik', 'Ernő', 'Architecte', NULL, NULL, NULL, 'gEstionnaire'),
(9, 'Lucas', 'Édouard', 'Mathématicien 1842-1891', NULL, NULL, NULL, 'gEstionnaire'),
(10, 'Cirulli', 'Gabriele', 'Développeur web italien', NULL, NULL, NULL, 'gEstionnaire'),
(11, 'Zamkauskas', 'Walter', 'Argentin', NULL, NULL, NULL, 'gEstionnaire'),
(12, 'Loyd', 'Sam', 'Mathématicien et joueur d\'échecs 1841-1911', NULL, NULL, NULL, 'gEstionnaire'),
(13, 'Paterson', 'Mike', 'Informaticien', NULL, NULL, NULL, 'gEstionnaire');

-- --------------------------------------------------------

--
-- Table structure for table `T_NEWS_NEW`
--

CREATE TABLE `T_NEWS_NEW` (
  `vis_id` int(11) NOT NULL,
  `new_date` datetime NOT NULL,
  `new_html` varchar(256) NOT NULL,
  `cpt_login` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `T_NEWS_NEW`
--

INSERT INTO `T_NEWS_NEW` (`vis_id`, `new_date`, `new_html`, `cpt_login`) VALUES
(1, '2022-01-26 15:17:42', 'new0.html', 'gEstionnaire'),
(2, '2022-01-26 15:17:42', 'new1.html', 'gEstionnaire'),
(3, '2022-01-26 15:17:42', 'new2.html', 'admin'),
(4, '2022-01-26 15:17:42', 'new3.html', 'vmarc'),
(5, '2022-01-26 15:17:42', 'new4.html', 'gEstionnaire');

-- --------------------------------------------------------

--
-- Table structure for table `T_OEUVRE_OVR`
--

CREATE TABLE `T_OEUVRE_OVR` (
  `ovr_id` int(11) NOT NULL,
  `ovr_titre` varchar(64) NOT NULL,
  `ovr_year` char(4) DEFAULT NULL,
  `ovr_descr` varchar(1024) DEFAULT NULL,
  `ovr_img` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `T_OEUVRE_OVR`
--

INSERT INTO `T_OEUVRE_OVR` (`ovr_id`, `ovr_titre`, `ovr_year`, `ovr_descr`, `ovr_img`) VALUES
(1, 'Jeu de la vie', '1970', 'Célèbre automate cellulaire.', NULL),
(2, 'Jeu des pousses', '1967', 'Jeu de graphes qui se joue avec un papier et un crayon.', NULL),
(3, 'Problème de l\'ange', '1974', 'Un ange se déplace d\'un certain nombre de cases sur une grille infinie, à chaque tour le démon peut bloquer une case, arrivera-t-il à bloquer l\'ange ?', NULL),
(4, 'Pentamino', '1953', 'Jeu ayant inspiré Tetris mais avec 18 pièces de 5 carrés.', NULL),
(5, 'Menace', '1961', 'Machine Educable Noughts and Crosses Engine : Une intelligence artificielle pour le morpion faite de 304 boîtes d\'allumettes.', NULL),
(6, 'Je du chat et de la souris', '2019', 'Une souris essaye de sortir d\'une marre circulaire mais un chat essaye de l\'attrapper, ce dernier se déplace sur le périmètre du cercle.', NULL),
(7, 'Fléchettes rétrécissantes', '2019', 'Plus la fléchette atterri proche du centre, moins la cible rétrécit.', NULL),
(8, 'Tir complexe', '2010', 'Un nombre ou plusieurs sont affichés sur le plan complexe et une opération est donnée, le but est de placer la résultat sur le plan.', NULL),
(9, 'Rubik\'s Cube', '1974', 'Célèbre puzzle cubique.', NULL),
(10, 'Les tours de Hanoi', '1883', 'Jeu d\'origine indienne dont le but est de déplacer une pile de disques en étant limité à trois positions et en gardant les tailles des disques décroissantes.', NULL),
(11, '2048', '2014', 'Jeu célèbre où l\'on fusionne des cellules sur une grille.', NULL),
(12, 'Amazons', '1988', 'Jeu qui se joue sur une grille et dont les pièces se déplacent comme les dames des échecs, à chaque mouvement la pièce tir une flèche et bloque une case.', NULL),
(13, 'Taquin', '1870', 'Jeu qui se joue avec une grille de 4x4 et 15 pièces qui peuvent être glissées sur la case vacantes, le but étant de remettre les pièces dans l\'ordre mais ce n\'est pas toujours possible suivant la configuration de départ.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `T_PRESENTATION_PRE`
--

CREATE TABLE `T_PRESENTATION_PRE` (
  `pre_debut` datetime NOT NULL,
  `pre_verni` datetime NOT NULL,
  `pre_fin` datetime NOT NULL,
  `pre_titre` varchar(64) NOT NULL,
  `pre_bienv` varchar(64) NOT NULL,
  `pre_lieu` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `T_PRESENTATION_PRE`
--

INSERT INTO `T_PRESENTATION_PRE` (`pre_debut`, `pre_verni`, `pre_fin`, `pre_titre`, `pre_bienv`, `pre_lieu`) VALUES
('2022-01-26 15:17:42', '2022-01-26 15:17:42', '2022-01-26 15:17:42', 'Les jeux mathématiques', 'Bienvenue sur l\'expo en ligne', 'Au café rue des Arpenteurs');

-- --------------------------------------------------------

--
-- Table structure for table `T_PROFIL_PRO`
--

CREATE TABLE `T_PROFIL_PRO` (
  `cpt_login` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `pro_nom` varchar(64) DEFAULT NULL,
  `pro_prenom` varchar(64) DEFAULT NULL,
  `pro_email` varchar(256) NOT NULL,
  `pro_valid` enum('A','D') NOT NULL,
  `pro_role` enum('A','O') NOT NULL,
  `pro_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `T_PROFIL_PRO`
--

INSERT INTO `T_PROFIL_PRO` (`cpt_login`, `pro_nom`, `pro_prenom`, `pro_email`, `pro_valid`, `pro_role`, `pro_date`) VALUES
('admin', 'Admin', 'Admin', 'admin@netgallery.localhast', 'A', 'A', '2022-01-26 15:17:42'),
('conservateur', 'Thine', 'Clément', 'clement.thine@netgallery.localhost', 'A', 'O', '2022-01-26 15:17:42'),
('gEstionnaire', 'Estionnaire', 'Georges', 'ge@netgallery.localhast', 'A', 'A', '2022-01-26 15:17:42'),
('martin', 'Martin', 'Martin', 'martin.martin@netgallery.localhost', 'A', 'O', '2022-01-26 15:17:42'),
('mel', 'Anfaillite', 'Mélusine', 'melusine.anfaillite@netgallery.localhost', 'A', 'O', '2022-01-26 15:17:42'),
('rld', 'Le Duc', 'Robert', 'robert.leduc@netgallery.localhost', 'A', 'O', '2022-01-26 15:17:42'),
('terrieur', 'Terrieur', 'Alex', 'alex.terrieur@netgallery.localhost', 'A', 'O', '2022-01-26 15:17:42'),
('vmarc', 'Marc', 'Valérie', 'vmarc@univ-brest.fr', 'A', 'A', '2022-01-26 15:17:42'),
('yann', 'Le Floc\'h', 'Yann', 'yann.lefloch@netgallery.localhost', 'A', 'O', '2022-01-26 15:17:42'),
('ytroloin', 'Troloin', 'Yvon', 'yvon.troloin@netgallery.localhost', 'A', 'O', '2022-01-26 15:17:42');

-- --------------------------------------------------------

--
-- Table structure for table `T_VISITEUR_VIS`
--

CREATE TABLE `T_VISITEUR_VIS` (
  `vis_id` int(11) NOT NULL,
  `vis_mdp` char(15) NOT NULL,
  `vis_date` datetime NOT NULL,
  `vis_nom` varchar(64) DEFAULT NULL,
  `vis_prenom` varchar(64) DEFAULT NULL,
  `vis_email` varchar(256) DEFAULT NULL,
  `cpt_login` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `T_VISITEUR_VIS`
--

INSERT INTO `T_VISITEUR_VIS` (`vis_id`, `vis_mdp`, `vis_date`, `vis_nom`, `vis_prenom`, `vis_email`, `cpt_login`) VALUES
(1, '000000000000000', '2022-01-26 15:17:42', NULL, NULL, NULL, 'admin'),
(2, '111111111111111', '2022-01-26 15:17:42', NULL, NULL, NULL, 'admin'),
(3, '656565656565656', '2022-01-26 15:17:42', NULL, NULL, NULL, 'admin'),
(4, 'AAAAAAAAAAAAAAA', '2022-01-26 15:17:42', NULL, NULL, NULL, 'admin'),
(5, '555555555555555', '2022-01-26 15:17:42', NULL, NULL, NULL, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `TJ_EXP_OVR`
--
ALTER TABLE `TJ_EXP_OVR`
  ADD PRIMARY KEY (`ovr_id`,`exp_id`),
  ADD KEY `exp_id` (`exp_id`);

--
-- Indexes for table `T_COMMENTAIRE_COM`
--
ALTER TABLE `T_COMMENTAIRE_COM`
  ADD PRIMARY KEY (`com_id`),
  ADD UNIQUE KEY `vis_id` (`vis_id`);

--
-- Indexes for table `T_COMPTE_CPT`
--
ALTER TABLE `T_COMPTE_CPT`
  ADD PRIMARY KEY (`cpt_login`);

--
-- Indexes for table `T_EXPOSANT_EXP`
--
ALTER TABLE `T_EXPOSANT_EXP`
  ADD PRIMARY KEY (`exp_id`),
  ADD KEY `cpt_login` (`cpt_login`);

--
-- Indexes for table `T_NEWS_NEW`
--
ALTER TABLE `T_NEWS_NEW`
  ADD PRIMARY KEY (`vis_id`),
  ADD KEY `cpt_login` (`cpt_login`);

--
-- Indexes for table `T_OEUVRE_OVR`
--
ALTER TABLE `T_OEUVRE_OVR`
  ADD PRIMARY KEY (`ovr_id`);

--
-- Indexes for table `T_PROFIL_PRO`
--
ALTER TABLE `T_PROFIL_PRO`
  ADD PRIMARY KEY (`cpt_login`);

--
-- Indexes for table `T_VISITEUR_VIS`
--
ALTER TABLE `T_VISITEUR_VIS`
  ADD PRIMARY KEY (`vis_id`),
  ADD KEY `cpt_login` (`cpt_login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `T_COMMENTAIRE_COM`
--
ALTER TABLE `T_COMMENTAIRE_COM`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `T_EXPOSANT_EXP`
--
ALTER TABLE `T_EXPOSANT_EXP`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `T_NEWS_NEW`
--
ALTER TABLE `T_NEWS_NEW`
  MODIFY `vis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `T_OEUVRE_OVR`
--
ALTER TABLE `T_OEUVRE_OVR`
  MODIFY `ovr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `T_VISITEUR_VIS`
--
ALTER TABLE `T_VISITEUR_VIS`
  MODIFY `vis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `TJ_EXP_OVR`
--
ALTER TABLE `TJ_EXP_OVR`
  ADD CONSTRAINT `TJ_EXP_OVR_ibfk_1` FOREIGN KEY (`ovr_id`) REFERENCES `T_OEUVRE_OVR` (`ovr_id`),
  ADD CONSTRAINT `TJ_EXP_OVR_ibfk_2` FOREIGN KEY (`exp_id`) REFERENCES `T_EXPOSANT_EXP` (`exp_id`);

--
-- Constraints for table `T_COMMENTAIRE_COM`
--
ALTER TABLE `T_COMMENTAIRE_COM`
  ADD CONSTRAINT `T_COMMENTAIRE_COM_ibfk_1` FOREIGN KEY (`vis_id`) REFERENCES `T_VISITEUR_VIS` (`vis_id`);

--
-- Constraints for table `T_EXPOSANT_EXP`
--
ALTER TABLE `T_EXPOSANT_EXP`
  ADD CONSTRAINT `T_EXPOSANT_EXP_ibfk_1` FOREIGN KEY (`cpt_login`) REFERENCES `T_COMPTE_CPT` (`cpt_login`);

--
-- Constraints for table `T_NEWS_NEW`
--
ALTER TABLE `T_NEWS_NEW`
  ADD CONSTRAINT `T_NEWS_NEW_ibfk_1` FOREIGN KEY (`cpt_login`) REFERENCES `T_COMPTE_CPT` (`cpt_login`);

--
-- Constraints for table `T_PROFIL_PRO`
--
ALTER TABLE `T_PROFIL_PRO`
  ADD CONSTRAINT `T_PROFIL_PRO_ibfk_1` FOREIGN KEY (`cpt_login`) REFERENCES `T_COMPTE_CPT` (`cpt_login`);

--
-- Constraints for table `T_VISITEUR_VIS`
--
ALTER TABLE `T_VISITEUR_VIS`
  ADD CONSTRAINT `T_VISITEUR_VIS_ibfk_1` FOREIGN KEY (`cpt_login`) REFERENCES `T_COMPTE_CPT` (`cpt_login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
