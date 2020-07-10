-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 10 juil. 2020 à 15:37
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_project_four`
--

-- --------------------------------------------------------

--
-- Structure de la table `chapter`
--

DROP TABLE IF EXISTS `chapter`;
CREATE TABLE IF NOT EXISTS `chapter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `createDate` datetime NOT NULL,
  `updateDate` datetime NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `chapter`
--

INSERT INTO `chapter` (`id`, `author`, `title`, `content`, `createDate`, `updateDate`, `published`) VALUES
(4, 'Jean', 'Quatrième chapitre !', 'It\'s toe-tappingly tragic! Oh Leela! You\'re the only person I could turn to;\r\n     you\'re the only person who ever loved me. Bender, being God isn\'t easy. If you do too much, people get dependent \r\n     on you, and if you do nothing, they lose hope. You have to use a light touch. Like a safecracker, or a pickpocket.\r\n     Oh, I don\'t have time for this. I have to go and buy a single piece of fruit with a coupon and then return it, making \r\n     people wait behind me while I complain. Does anybody else feel jealous and aroused and worried?', '2020-06-14 19:33:31', '2020-06-14 19:33:31', 1),
(21, 'Jean', 'Huitième chapitre', 'Contenu du huitième chapitre', '2020-07-02 15:04:38', '2020-07-02 15:04:38', 1),
(3, 'Jean', 'Troisième chapitre !', '### In your time, yes, but nowadays shut up! Besides, these are adult stemcells, \r\n    harvested from perfectly healthy adults whom I killed for their stemcells.Stop! Don\'t shoot fire stick in \r\n    space canoe! Cause explosive decompression! Come, Comrade Bender! We must take to the streets! But existing \r\n    is basically all I do! Large bet on myself in round one.\r\n    * Bender, this is Fry\'s decision… and he made it wrong. So it\'s time for us to interfere in his life.\r\n    * You wouldn\'t. Ask anyway!\r\n    * File not found.', '2020-05-05 19:03:10', '2020-05-05 19:03:10', 1),
(5, 'Jean', 'Cinquième chapitre', 'It\'s toe-tappingly tragic! Oh Leela! You\'re the only person I could turn to;\r\n     you\'re the only person who ever loved me. Bender, being God isn\'t easy. If you do too much, people get dependent \r\n     on you, and if you do nothing, they lose hope. You have to use a light touch. Like a safecracker, or a pickpocket.\r\n     Oh, I don\'t have time for this. I have to go and buy a single piece of fruit with a coupon and then return it, making \r\n     people wait behind me while I complain. Does anybody else feel jealous and aroused and worried?', '2020-06-19 09:22:52', '2020-06-19 09:22:52', 0),
(6, 'Jean', 'Sixième Chapitre', 'Yeah. Give a little credit to our public schools. And then the battle\'s not so bad? Why am I sticky and naked? Did I miss something fun? That\'s not soon enough! Who am I making this out to? Hi, I\'m a naughty nurse, and I really need someone to talk to. $9.95 a minute.\r\n\r\nOh no! The professor will hit me! But if Zoidberg \'fixes\' it… then perhaps gifts! I\'ll get my kit! These old Doomsday Devices are dangerously unstable. I\'ll rest easier not knowing where they are.\r\n\r\nMoving along… Stop it, stop it. It\'s fine. I will \'destroy\' you! Incidentally, you have a dime up your nose. Oh, but you can. But you may have to metaphorically make a deal with the devil. And by \"devil\", I mean Robot Devil. And by \"metaphorically\", I mean get your coat.\r\n\r\nIf rubbin\' frozen dirt in your crotch is wrong, hey I don\'t wanna be right. So I really am important? How I feel when I\'m drunk is correct? I could if you hadn\'t turned on the light and shut off my stereo.', '2020-06-19 13:55:02', '2020-06-19 13:55:02', 1),
(1, 'Jean', 'Premier chapitre !', '<h1>Good news, everyone! I\'ve taught the toaster to feel love!</h1>\r\n<p>You can crush me but you can\'t crush my spirit! We\'ll need to have a look inside you with this camera. I love you, buddy! What kind of a father would I be if I said no? I\'m Santa Claus!</p>\r\n<p>Can we have Bender Burgers again? Bender, quit destroying the universe! <strong> Why would I want to know that?</strong> <em> No.</em> We\'re on the top.</p>\r\n<h2>We\'ll go deliver this crate like professionals, and then we\'ll go home.</h2>\r\n<p>Ow, my spirit! You won\'t have time for sleeping, soldier, not with all the bed making you\'ll be doing. Oh yeah, good luck with that. Good news, everyone! There\'s a report on TV with some very bad news!</p>\r\n<ol>\r\n<li>You, minion. Lift my arm. AFTER HIM!</li><li>As an interesting side note, as a head without a body, I envy the dead.</li><li>We need rest. The spirit is willing, but the flesh is spongy and bruised.</li>\r\n</ol>\r\n\r\n<h3>Now Fry, it\'s been a few years since medical school, so remind me. Disemboweling in your species: fatal or non-fatal?</h3>\r\n<p>When will that be? It\'s toe-tappingly tragic! Why not indeed! Yes! In your face, Gandhi! Good man. Nixon\'s pro-war and pro-family.</p>\r\n<ul>\r\n<li>Also Zoidberg.</li><li>No argument here.</li><li>Alright, let\'s mafia things up a bit. Joey, burn down the ship. Clamps, burn down the crew.</li>\r\n</ul>', '2020-05-04 10:30:45', '2020-07-09 18:58:02', 1);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(100) DEFAULT NULL,
  `title` varchar(150) NOT NULL,
  `content` text DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `updatedDate` datetime NOT NULL,
  `report` tinyint(1) NOT NULL DEFAULT 0,
  `chapterId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `foreignNewsId` (`chapterId`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `author`, `title`, `content`, `createdDate`, `updatedDate`, `report`, `chapterId`) VALUES
(1, 'Jean', 'First', 'I suggest you try it again, Luke. !', '2020-05-10 09:52:24', '2020-05-10 09:52:24', 0, 1),
(2, 'Claude', 'Second', ' Hey, Luke! May the Force be with you.', '2020-05-11 00:45:30', '2020-05-10 09:52:24', 0, 1),
(3, 'Bob', 'Third', 'Great ! ', '2020-05-11 18:00:04', '2020-05-10 09:52:24', 0, 1),
(4, 'Toto', 'Fourth', 'He is here. You don\'t believe in the Force, do you', '2020-05-09 20:05:57', '2020-05-10 09:52:24', 0, 2),
(5, 'Moam', 'Fifth', 'Still, she\'s got a lot of spirit. I don\'t know, what do you think', '2020-05-09 18:12:59', '2020-05-10 09:52:24', 0, 2),
(6, 'Baba', 'Sixth', 'Send a detachment down to retrieve them, and see to it personally, Commander', '2020-05-18 10:05:10', '2020-05-10 09:52:24', 0, 2),
(7, 'Gui', 'Seventh', 'Alderaan is peaceful. We have no weapons', '2020-05-05 11:11:22', '2020-05-10 09:52:24', 0, 3),
(8, 'Aurora', 'Eight', 'I am a member of the Imperial Senate on a diplomatic mission to Alderaan', '2020-05-05 20:11:12', '2020-05-10 09:52:24', 0, 3),
(10, 'Bob', 'A quant la suite?', 'On attend la suite avec grande impatience ! ', '2020-06-26 17:39:22', '2020-06-26 17:39:22', 0, 2),
(11, 'Bob', 'A quant la suite?', 'On attend la suite avec grande impatience ! ', '2020-06-26 17:43:57', '2020-06-26 17:43:57', 0, 2),
(12, 'Bob', 'A quant la suite?', 'On attend la suite avec grande impatience ! ', '2020-06-26 17:44:51', '2020-06-26 17:44:51', 0, 2),
(13, 'Bob', 'A quant la suite?', 'On attend la suite avec grande impatience ! ', '2020-06-26 17:45:45', '2020-06-26 17:45:45', 0, 2),
(14, 'John', 'Vraiment ?', 'Mais cs fkfdnfn  nandnzeikjanbiuonaoiu noiufza ', '2020-06-26 17:46:38', '2020-06-26 17:46:38', 0, 2),
(15, 'Bob', 'Vraiment ?', 'C\'est pas dingue... ', '2020-07-01 17:50:10', '2020-07-01 17:50:10', 0, 20),
(16, 'Bee', 'Rien ne va plus', 'Rien ne va plus, l\'intrigue par dans tout les sens ! Abandonne on livre il mène à rien !!!', '2020-07-02 15:06:04', '2020-07-02 15:06:04', 1, 21),
(17, 'Bob', 'Prenant', 'A quand la suite ? vite', '2020-07-02 15:09:02', '2020-07-02 15:09:02', 0, 21),
(18, 'Non', 'Non', 'Allo ?', '2020-07-02 15:10:39', '2020-07-02 15:10:39', 0, 21),
(20, 'NON', 'NON', 'NON NON NON NON NON NON NON', '2020-07-02 16:31:29', '2020-07-02 16:31:29', 0, 21),
(21, 'Bob', 'A quant la suite', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ', '2020-07-09 19:36:54', '2020-07-09 19:36:54', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `logins`
--

DROP TABLE IF EXISTS `logins`;
CREATE TABLE IF NOT EXISTS `logins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `logins`
--

INSERT INTO `logins` (`id`, `username`, `email`, `password`, `status`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$10$e/KHGFl/s/yQumb4bCY0DO240TcW27XgXBObBDW68tM7G3PqC4T2e', 1),
(2, 'Jean', 'jean.forteroche@gmail.com', 'JeanPassword', 1),
(3, 'User', 'user@user.com', 'UserPassword', 0);

-- --------------------------------------------------------

--
-- Structure de la table `reporting`
--

DROP TABLE IF EXISTS `reporting`;
CREATE TABLE IF NOT EXISTS `reporting` (
  `reportId` int(11) NOT NULL AUTO_INCREMENT,
  `reportingDate` datetime NOT NULL,
  `commentId` int(11) NOT NULL,
  PRIMARY KEY (`reportId`),
  KEY `foreigncomment_id` (`commentId`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reporting`
--

INSERT INTO `reporting` (`reportId`, `reportingDate`, `commentId`) VALUES
(1, '2020-07-02 16:01:49', 18),
(2, '2020-07-02 16:20:51', 17),
(3, '2020-07-02 16:21:21', 16),
(4, '2020-07-02 16:37:21', 18),
(5, '2020-07-02 16:37:28', 20),
(6, '2020-07-02 16:37:31', 20),
(7, '2020-07-02 16:37:33', 20),
(8, '2020-07-02 18:47:56', 19),
(9, '2020-07-02 19:01:59', 19),
(10, '2020-07-02 19:02:02', 19),
(11, '2020-07-03 11:51:10', 18),
(12, '2020-07-03 11:51:14', 18),
(13, '2020-07-03 11:51:22', 20),
(14, '2020-07-03 11:51:25', 20),
(15, '2020-07-03 14:46:44', 20),
(16, '2020-07-03 14:47:15', 20),
(17, '2020-07-03 17:38:10', 19),
(18, '2020-07-09 15:11:01', 1),
(19, '2020-07-09 15:11:10', 1),
(20, '2020-07-09 15:22:08', 2),
(21, '2020-07-10 10:45:27', 16),
(22, '2020-07-10 10:46:51', 16),
(23, '2020-07-10 10:47:21', 16),
(24, '2020-07-10 10:57:58', 16),
(25, '2020-07-10 10:58:21', 16),
(26, '2020-07-10 10:59:31', 16),
(27, '2020-07-10 11:00:24', 16),
(28, '2020-07-10 11:02:43', 16),
(29, '2020-07-10 11:03:23', 16),
(30, '2020-07-10 11:03:40', 16),
(31, '2020-07-10 11:06:22', 16),
(32, '2020-07-10 11:11:25', 16),
(33, '2020-07-10 11:17:07', 16),
(34, '2020-07-10 11:17:33', 16),
(35, '2020-07-10 11:18:09', 16),
(36, '2020-07-10 11:18:43', 16),
(37, '2020-07-10 11:20:09', 16),
(38, '2020-07-10 11:20:50', 16),
(39, '2020-07-10 11:25:58', 16),
(40, '2020-07-10 11:31:14', 20),
(41, '2020-07-10 11:33:19', 9),
(42, '2020-07-10 11:34:36', 9);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
