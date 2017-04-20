-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 24 Février 2014 à 21:36
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `tuto`
--
CREATE DATABASE IF NOT EXISTS `tuto` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tuto`;

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  `ref` varchar(60) NOT NULL,
  `ref_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `username`, `email`, `content`, `created`, `ref`, `ref_id`, `parent_id`) VALUES
(1, 'John Doe', 'john-doe@doe.com', 'Hey! I''m a porno-dealing monster, what do I care what you think? Ah, computer dating. It''s like pimping, but you rarely have to use the phrase "upside your head." Say what? Yep, I remember. They came in last at the Olympics, then retired to promote alcoholic beverages!', '2014-02-16 00:00:00', 'posts', 1, 0),
(2, 'John', 'doe@doe.fr', 'Mon petit commentaire', '2014-02-23 17:38:14', 'posts', 1, 0),
(3, 'Marc', 'marc@marc.fr', 'Je suis pas d''accord !', '2014-02-23 17:43:23', 'posts', 1, 2),
(5, 'aze', 'aze@aze.fr', 'azeaezz', '2014-02-23 17:58:50', 'posts', 1, 0),
(6, 'Monsieur content', 'content@content.fr', 'Je suis d''accord', '2014-02-23 18:04:58', 'posts', 1, 0),
(7, 'Monsieur content', 'content@content.fr', 'Je suis d''accord', '2014-02-23 18:05:38', 'posts', 1, 2),
(8, 'aze', 'aze@aze.fr', 'azeazee', '2014-02-23 18:12:40', 'posts', 1, 2),
(9, 'aze', 'aze@azeazze.fr', 'azeeaz', '2014-02-24 21:35:52', 'posts', 1, 0),
(10, 'aze', 'aze@aze.fr', 'lol', '2014-02-24 21:36:07', 'posts', 1, 9);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`id`, `name`, `slug`, `content`) VALUES
(1, 'I Second That Emotion', 'mon-super-slug', '<h1>I Second That Emotion</h1> <p>I''ll get my kit! No, she''ll probably make me do it. Now that the, uh, garbage ball is in space, Doctor, perhaps you can help me with my sexual inhibitions?</p> <h2>A Pharaoh to Remember</h2> <p>Hey! I''m a porno-dealing monster, what do I care what you think? Ah, computer dating. It''s like pimping, but you rarely have to use the phrase "upside your head." Say what? Yep, I remember. They came in last at the Olympics, then retired to promote alcoholic beverages!</p>');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
