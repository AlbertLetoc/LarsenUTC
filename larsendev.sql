-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 02 Août 2016 à 20:44
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `larsendev`
--
CREATE DATABASE IF NOT EXISTS `larsendev` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `larsendev`;

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--
-- Création :  Jeu 28 Juillet 2016 à 15:53
-- Dernière modification :  Jeu 28 Juillet 2016 à 16:19
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `comment_ID` bigint(20) UNSIGNED NOT NULL COMMENT 'ID du commentaire',
  `comment_post_ID` bigint(20) UNSIGNED NOT NULL COMMENT 'ID du post auquel est relié le commentaire',
  `comment_author` varchar(30) NOT NULL COMMENT 'Auteur du commentaire',
  `comment_date` datetime NOT NULL COMMENT 'date et heure du commentaire',
  `comment_status` varchar(20) NOT NULL DEFAULT 'published' COMMENT 'statut du commentaire : published ou deleted',
  `comment_content` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Structure de la table `posts`
--
-- Création :  Jeu 28 Juillet 2016 à 15:46
-- Dernière modification :  Ven 29 Juillet 2016 à 21:17
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `post_ID` bigint(20) UNSIGNED NOT NULL COMMENT 'ID du post',
  `post_author` varchar(30) NOT NULL COMMENT 'Auteur du post',
  `post_date` datetime NOT NULL COMMENT 'Date et heure du post',
  `post_title` text NOT NULL COMMENT 'Titre du post',
  `post_status` varchar(20) NOT NULL DEFAULT 'published' COMMENT 'status du post : published, draft, deleted',
  `post_content` longtext NOT NULL COMMENT 'contenu du post'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Structure de la table `posts_relationships`
--
-- Création :  Jeu 28 Juillet 2016 à 18:26
-- Dernière modification :  Jeu 28 Juillet 2016 à 18:26
--

DROP TABLE IF EXISTS `posts_relationships`;
CREATE TABLE `posts_relationships` (
  `relationships_ID` bigint(20) NOT NULL COMMENT 'ID de la relation',
  `post_ID` bigint(20) NOT NULL COMMENT 'ID du post lié a une taxonomy',
  `taxonomy_ID` bigint(20) NOT NULL COMMENT 'ID de la taxonomy liée au post'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Structure de la table `taxonomy`
--
-- Création :  Jeu 28 Juillet 2016 à 16:00
-- Dernière modification :  Jeu 28 Juillet 2016 à 20:29
--

DROP TABLE IF EXISTS `taxonomy`;
CREATE TABLE `taxonomy` (
  `taxonomy_ID` bigint(20) NOT NULL COMMENT 'index de la taxonomy',
  `taxonomy_name` varchar(30) NOT NULL COMMENT 'nom de la taxonomy'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='la taxonomy représente les tags d''un post';


--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_ID`),
  ADD KEY `post_ID` (`comment_post_ID`),
  ADD KEY `author` (`comment_author`),
  ADD KEY `Date` (`comment_date`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_ID`),
  ADD KEY `author` (`post_author`),
  ADD KEY `Date` (`post_date`);

--
-- Index pour la table `posts_relationships`
--
ALTER TABLE `posts_relationships`
  ADD PRIMARY KEY (`relationships_ID`);

--
-- Index pour la table `taxonomy`
--
ALTER TABLE `taxonomy`
  ADD PRIMARY KEY (`taxonomy_ID`),
  ADD KEY `name` (`taxonomy_name`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID du commentaire', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID du post', AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `posts_relationships`
--
ALTER TABLE `posts_relationships`
  MODIFY `relationships_ID` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'ID de la relation', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `taxonomy`
--
ALTER TABLE `taxonomy`
  MODIFY `taxonomy_ID` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'index de la taxonomy', AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
