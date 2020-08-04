-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 31 juil. 2020 à 19:23
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
  `imgUrl` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `chapter`
--

INSERT INTO `chapter` (`id`, `author`, `title`, `content`, `createDate`, `updateDate`, `published`, `imgUrl`) VALUES
(1, 'Jean', '1 - Bienvenu en Alaska', '&lt;h1&gt;Ah, yes! John Quincy Adding Machine. He struck a chord with the voters when he pledged not to go on a killing spree.&lt;/h1&gt;\r\n&lt;p&gt;You seem malnourished. Are you suffering from intestinal parasites? The alien mothership is in orbit here. If we can hit that bullseye, the rest of the dominoes will fall like a house of cards. Checkmate.&lt;/p&gt;\r\n&lt;p&gt;&lt;em&gt;Morbo will now introduce tonight\'s candidates&amp;hellip; PUNY HUMAN NUMBER ONE, PUNY HUMAN NUMBER TWO, and Morbo\'s good friend, Richard Nixon.&lt;/em&gt;&amp;nbsp;When the lights go out, it\'s nobody\'s business what goes on between two consenting adults.&lt;/p&gt;\r\n&lt;h2&gt;We\'re rescuing ya.&lt;/h2&gt;\r\n&lt;p&gt;Shut up and get to the point! When the lights go out, it\'s nobody\'s business what goes on between two consenting adults. I barely knew Philip, but as a clergyman I have no problem telling his most intimate friends all about him.&lt;/p&gt;\r\n&lt;ol&gt;\r\n&lt;li&gt;&lt;span style=&quot;color: #000000; background-color: #bfedd2;&quot;&gt;You\'ve killed me! Oh, you\'ve killed me!&lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span style=&quot;color: #000000; background-color: #bfedd2;&quot;&gt;Spare me your space age technobabble, Attila the Hun!&lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span style=&quot;color: #000000; background-color: #bfedd2;&quot;&gt;Man, I\'m sore all over. I feel like I just went ten rounds with mighty Thor.&lt;/span&gt;&lt;/li&gt;\r\n&lt;/ol&gt;', '2020-07-31 20:35:03', '2020-07-31 20:35:03', 1, '/img/img-chapter-1.png'),
(2, 'Jean', '2- Aller simple ?', '&lt;h3&gt;I\'m sorry, guys. I never meant to hurt you. Just to destroy everything you ever believed in.&lt;/h3&gt;\r\n&lt;p&gt;All I want is to be a monkey of moderate intelligence who wears a suit&amp;hellip; that\'s why I\'m transferring to business school! Oh right. I forgot about the battle. Meh. I could if you hadn\'t turned on the light and shut off my stereo.&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Shut up and get to the point!&lt;/li&gt;\r\n&lt;li&gt;Fry, we have a crate to deliver.&lt;/li&gt;\r\n&lt;li&gt;You\'ve killed me! Oh, you\'ve killed me!&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;Doomsday device? Ah, now the ball\'s in Farnsworth\'s court! In your time, yes, but nowadays shut up! Besides, these are adult stemcells, harvested from perfectly healthy adults whom I killed for their stemcells.&lt;/p&gt;\r\n&lt;p&gt;Just once I\'d like to eat dinner with a celebrity who isn\'t bound and gagged. Oh, all right, I am. But if anything happens to me, tell them I died robbing some old man. OK, this has gotta stop. I\'m going to remind Fry of his humanity the way only a woman can.&lt;/p&gt;', '2020-07-31 20:35:52', '2020-07-31 20:35:52', 1, '/img/img-chapter-2.png'),
(3, 'Jean', '3 - Une vie plus simple', '&lt;p&gt;Just once I\'d like to eat dinner with a celebrity who isn\'t bound and gagged. Oh, all right, I am. But if anything happens to me, tell them I died robbing some old man. OK, this has gotta stop. I\'m going to remind Fry of his humanity the way only a woman can.&lt;/p&gt;\r\n&lt;p&gt;Look, everyone wants to be like Germany, but do we really have the pure strength of \'will\'? We\'re rescuing ya. Good man. Nixon\'s pro-war and pro-family. Your best is an idiot! I can explain. It\'s very valuable.&lt;/p&gt;\r\n&lt;p&gt;Bite my shiny metal ass. Aww, it\'s true. I\'ve been hiding it for so long. You mean while I\'m sleeping in it? I videotape every customer that comes in here, so that I may blackmail them later. Fry! Quit doing the right thing, you jerk!&lt;/p&gt;\r\n&lt;p&gt;Bender, hurry! This fuel\'s expensive! Also, we\'re dying! What kind of a father would I be if I said no? Guards! Bring me the forms I need to fill out to have her taken away! Why, those are the Grunka-Lunkas! They work here in the Slurm factory.&lt;/p&gt;\r\n&lt;p&gt;Oh Leela! You\'re the only person I could turn to; you\'re the only person who ever loved me. I saw you with those two &quot;ladies of the evening&quot; at Elzars. Explain that. As an interesting side note, as a head without a body, I envy the dead.&lt;/p&gt;\r\n&lt;p&gt;Wow! A superpowers drug you can just rub onto your skin? You\'d think it would be something you\'d have to freebase. But existing is basically all I do! Tell them I hate them. You\'re going to do his laundry?&lt;/p&gt;\r\n&lt;p&gt;I\'m just glad my fat, ugly mama isn\'t alive to see this day. Now, now. Perfectly symmetrical violence never solved anything. File not found. Professor, make a woman out of me. She also liked to shut up!&lt;/p&gt;\r\n&lt;p&gt;Good man. Nixon\'s pro-war and pro-family. Incidentally, you have a dime up your nose. Please, Don-Bot&amp;hellip; look into your hard drive, and open your mercy file! Leela, are you alright? You got wanged on the head.&lt;/p&gt;\r\n&lt;p&gt;Bender?! You stole the atom. Pansy. Really?! OK, if everyone\'s finished being stupid. Yes! In your face, Gandhi!&lt;/p&gt;\r\n&lt;p&gt;Now, now. Perfectly symmetrical violence never solved anything. No. We\'re on the top. Oh, you\'re a dollar naughtier than most. Ok, we\'ll go deliver this crate like professionals, and then we\'ll go ride the bumper cars.&lt;/p&gt;', '2020-07-31 20:39:11', '2020-07-31 20:39:11', 1, '/img/img-chapter-3.png'),
(4, 'Jean', '4 - Une nuit agité', '&lt;p&gt;All I want is to be a monkey of moderate intelligence who wears a suit&amp;hellip; that\'s why I\'m transferring to business school! Oh right. I forgot about the battle. Meh. I could if you hadn\'t turned on the light and shut off my stereo.&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Shut up and get to the point!&lt;/li&gt;\r\n&lt;li&gt;Fry, we have a crate to deliver.&lt;/li&gt;\r\n&lt;li&gt;You\'ve killed me! Oh, you\'ve killed me!&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;Doomsday device? Ah, now the ball\'s in Farnsworth\'s court! In your time, yes, but nowadays shut up! Besides, these are adult stemcells, harvested from perfectly healthy adults whom I killed for their stemcells.&lt;/p&gt;\r\n&lt;p&gt;Just once I\'d like to eat dinner with a celebrity who isn\'t bound and gagged. Oh, all right, I am. But if anything happens to me, tell them I died robbing some old man. OK, this has gotta stop. I\'m going to remind Fry of his humanity the way only a woman can.&lt;/p&gt;\r\n&lt;p&gt;Look, everyone wants to be like Germany, but do we really have the pure strength of \'will\'? We\'re rescuing ya. Good man. Nixon\'s pro-war and pro-family. Your best is an idiot! I can explain. It\'s very valuable.&lt;/p&gt;\r\n&lt;p&gt;Bite my shiny metal ass. Aww, it\'s true. I\'ve been hiding it for so long. You mean while I\'m sleeping in it? I videotape every customer that comes in here, so that I may blackmail them later. Fry! Quit doing the right thing, you jerk!&lt;/p&gt;\r\n&lt;p&gt;Bender, hurry! This fuel\'s expensive! Also, we\'re dying! What kind of a father would I be if I said no? Guards! Bring me the forms I need to fill out to have her taken away! Why, those are the Grunka-Lunkas! They work here in the Slurm factory.&lt;/p&gt;\r\n&lt;p&gt;Oh Leela! You\'re the only person I could turn to; you\'re the only person who ever loved me. I saw you with those two &quot;ladies of the evening&quot; at Elzars. Explain that. As an interesting side note, as a head without a body, I envy the dead.&lt;/p&gt;\r\n&lt;p&gt;Wow! A superpowers drug you can just rub onto your skin? You\'d think it would be something you\'d have to freebase. But existing is basically all I do! Tell them I hate them. You\'re going to do his laundry?&lt;/p&gt;\r\n&lt;p&gt;I\'m just glad my fat, ugly mama isn\'t alive to see this day. Now, now. Perfectly symmetrical violence never solved anything. File not found. Professor, make a woman out of me. She also liked to shut up!&lt;/p&gt;\r\n&lt;p&gt;Good man. Nixon\'s pro-war and pro-family. Incidentally, you have a dime up your nose. Please, Don-Bot&amp;hellip; look into your hard drive, and open your mercy file! Leela, are you alright? You got wanged on the head.&lt;/p&gt;\r\n&lt;p&gt;Bender?! You stole the atom. Pansy. Really?! OK, if everyone\'s finished being stupid. Yes! In your face, Gandhi!&lt;/p&gt;\r\n&lt;p&gt;Now, now. Perfectly symmetrical violence never solved anything. No. We\'re on the top. Oh, you\'re a dollar naughtier than most. Ok, we\'ll go deliver this crate like professionals, and then we\'ll go ride the bumper cars.&lt;/p&gt;', '2020-07-31 20:55:33', '2020-07-31 20:55:33', 1, '/img/img-chapter-4.png'),
(5, 'Jean', '5 - Des préparatifs long et compliqués', '&lt;h3&gt;I\'m sorry, guys. I never meant to hurt you. Just to destroy everything you ever believed in.&lt;/h3&gt;\r\n&lt;p&gt;All I want is to be a monkey of moderate intelligence who wears a suit&amp;hellip; that\'s why I\'m transferring to business school! Oh right. I forgot about the battle. Meh. I could if you hadn\'t turned on the light and shut off my stereo.&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Shut up and get to the point!&lt;/li&gt;\r\n&lt;li&gt;Fry, we have a crate to deliver.&lt;/li&gt;\r\n&lt;li&gt;You\'ve killed me! Oh, you\'ve killed me!&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;Doomsday device? Ah, now the ball\'s in Farnsworth\'s court! In your time, yes, but nowadays shut up! Besides, these are adult stemcells, harvested from perfectly healthy adults whom I killed for their stemcells.&lt;/p&gt;\r\n&lt;p&gt;Just once I\'d like to eat dinner with a celebrity who isn\'t bound and gagged. Oh, all right, I am. But if anything happens to me, tell them I died robbing some old man. OK, this has gotta stop. I\'m going to remind Fry of his humanity the way only a woman can.&lt;/p&gt;\r\n&lt;p&gt;Look, everyone wants to be like Germany, but do we really have the pure strength of \'will\'? We\'re rescuing ya. Good man. Nixon\'s pro-war and pro-family. Your best is an idiot! I can explain. It\'s very valuable.&lt;/p&gt;\r\n&lt;p&gt;Bite my shiny metal ass. Aww, it\'s true. I\'ve been hiding it for so long. You mean while I\'m sleeping in it? I videotape every customer that comes in here, so that I may blackmail them later. Fry! Quit doing the right thing, you jerk!&lt;/p&gt;\r\n&lt;p&gt;Bender, hurry! This fuel\'s expensive! Also, we\'re dying! What kind of a father would I be if I said no? Guards! Bring me the forms I need to fill out to have her taken away! Why, those are the Grunka-Lunkas! They work here in the Slurm factory.&lt;/p&gt;\r\n&lt;p&gt;Oh Leela! You\'re the only person I could turn to; you\'re the only person who ever loved me. I saw you with those two &quot;ladies of the evening&quot; at Elzars. Explain that. As an interesting side note, as a head without a body, I envy the dead.&lt;/p&gt;\r\n&lt;p&gt;Wow! A superpowers drug you can just rub onto your skin? You\'d think it would be something you\'d have to freebase. But existing is basically all I do! Tell them I hate them. You\'re going to do his laundry?&lt;/p&gt;\r\n&lt;p&gt;I\'m just glad my fat, ugly mama isn\'t alive to see this day. Now, now. Perfectly symmetrical violence never solved anything. File not found. Professor, make a woman out of me. She also liked to shut up!&lt;/p&gt;\r\n&lt;p&gt;Good man. Nixon\'s pro-war and pro-family. Incidentally, you have a dime up your nose. Please, Don-Bot&amp;hellip; look into your hard drive, and open your mercy file! Leela, are you alright? You got wanged on the head.&lt;/p&gt;\r\n&lt;p&gt;Bender?! You stole the atom. Pansy. Really?! OK, if everyone\'s finished being stupid. Yes! In your face, Gandhi!&lt;/p&gt;\r\n&lt;p&gt;Now, now. Perfectly symmetrical violence never solved anything. No. We\'re on the top. Oh, you\'re a dollar naughtier than most. Ok, we\'ll go deliver this crate like professionals, and then we\'ll go ride the bumper cars.&lt;/p&gt;', '2020-07-31 20:57:51', '2020-07-31 20:57:51', 1, '/img/img-chapter-5.png'),
(6, 'Jean', '6 - Jamais l\'un sans l\'autre', '&lt;h1&gt;Stop talking, brain thinking. Hush.&lt;/h1&gt;\r\n&lt;p&gt;All I\'ve got to do is pass as an ordinary human being. Simple. What could possibly go wrong? The way I see it, every life is a pile of good things and bad things.&amp;hellip;hey.&amp;hellip;the good things don\'t always soften the bad things; but vice-versa the bad things don\'t necessarily spoil the good things and make them unimportant.&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;I\'m nobody\'s taxi service; I\'m not gonna be there to catch you every time you feel like jumping out of a spaceship.&lt;/strong&gt;&amp;nbsp;&lt;em&gt;*Insistently* Bow ties are cool!&lt;/em&gt;&amp;nbsp;Come on Amy, I\'m a normal bloke, tell me what normal blokes do!&lt;/p&gt;\r\n&lt;h2&gt;They\'re not aliens, they\'re Earth&amp;hellip;liens!&lt;/h2&gt;\r\n&lt;p&gt;Saving the world with meals on wheels. No&amp;hellip; It\'s a thing; it\'s like a plan, but with more greatness. No&amp;hellip; It\'s a thing; it\'s like a plan, but with more greatness. Stop talking, brain thinking. Hush.&lt;/p&gt;\r\n&lt;ol&gt;\r\n&lt;li&gt;No, I\'ll fix it. I\'m good at fixing rot. Call me the Rotmeister. No, I\'m the Doctor. Don\'t call me the Rotmeister.&lt;/li&gt;\r\n&lt;li&gt;It\'s a fez. I wear a fez now. Fezes are cool.&lt;/li&gt;\r\n&lt;li&gt;Did I mention we have comfy chairs?&lt;/li&gt;\r\n&lt;/ol&gt;\r\n&lt;h3&gt;You know when grown-ups tell you \'everything\'s going to be fine\' and you think they\'re probably lying to make you feel better?&lt;/h3&gt;\r\n&lt;p&gt;It\'s a fez. I wear a fez now. Fezes are cool. I am the last of my species, and I know how that weighs on the heart so don\'t lie to me! You hit me with a cricket bat. Aw, you\'re all Mr. Grumpy Face today.&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;You hate me; you want to kill me! Well, go on! Kill me! KILL ME!&lt;/li&gt;\r\n&lt;li&gt;It\'s a fez. I wear a fez now. Fezes are cool.&lt;/li&gt;\r\n&lt;li&gt;It\'s a fez. I wear a fez now. Fezes are cool.&lt;/li&gt;\r\n&lt;/ul&gt;', '2020-07-31 20:58:31', '2020-07-31 20:58:31', 0, '/img/img-chapter-7.png'),
(7, 'Jean', '7 - A définir', '&lt;p&gt;&lt;span style=&quot;background-color: #fbeeb8; color: #e03e2d;&quot;&gt;&lt;em&gt;En cours d\'&amp;eacute;criture&lt;/em&gt;&lt;/span&gt;&lt;/p&gt;\r\n&lt;h2 style=&quot;text-align: center;&quot;&gt;They\'re not aliens, they\'re Earth&amp;hellip;liens!&lt;/h2&gt;\r\n&lt;p&gt;Saving the world with meals on wheels. No&amp;hellip; It\'s a thing; it\'s like a plan, but with more greatness. No&amp;hellip; It\'s a thing; it\'s like a plan, but with more greatness. Stop talking, brain thinking. Hush.&lt;/p&gt;\r\n&lt;ol&gt;\r\n&lt;li&gt;No, I\'ll fix it. I\'m good at fixing rot. Call me the Rotmeister. No, I\'m the Doctor. Don\'t call me the Rotmeister.&lt;/li&gt;\r\n&lt;li&gt;It\'s a fez. I wear a fez now. Fezes are cool.&lt;/li&gt;\r\n&lt;li&gt;Did I mention we have comfy chairs?&lt;/li&gt;\r\n&lt;/ol&gt;\r\n&lt;h3&gt;You know when grown-ups tell you \'everything\'s going to be fine\' and you think they\'re probably lying to make you feel better?&lt;/h3&gt;\r\n&lt;p&gt;It\'s a fez. I wear a fez now. Fezes are cool. I am the last of my species, and I know how that weighs on the heart so don\'t lie to me! You hit me with a cricket bat. Aw, you\'re all Mr. Grumpy Face today.&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;You hate me; you want to kill me! Well, go on! Kill me! KILL ME!&lt;/li&gt;\r\n&lt;li&gt;It\'s a fez. I wear a fez now. Fezes are cool.&lt;/li&gt;\r\n&lt;li&gt;It\'s a fez. I wear a fez now. Fezes are cool&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', '2020-07-31 20:59:59', '2020-07-31 20:59:59', 0, '/img/img-chapter-8.png');

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
  `chapterId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `foreignchapterId` (`chapterId`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `author`, `title`, `content`, `createdDate`, `updatedDate`, `chapterId`) VALUES
(1, 'Bob', 'Prenant', 'Concept original. Histoire commence bien, a voir la suite !', '2020-07-31 21:01:17', '2020-07-31 21:01:17', 1),
(2, 'Fonctionne', 'J\'espère', 'Que ce cela', '2020-07-31 11:26:17', '2020-07-31 11:26:17', 4),
(3, 'Claude', 'Youpi', 'Je n\'avais plus grand chose à me mettre sous la dent, content d\'avoir trouvé ce blog :)', '2020-07-31 21:03:32', '2020-07-31 21:03:32', 1),
(4, 'John', 'fqsfqsfq', 'fqfqs fdqsdqs dqsd', '2020-07-31 21:03:44', '2020-07-31 21:03:44', 1),
(5, 'NON', 'NON NON', 'NON NON NON ', '2020-07-31 21:04:09', '2020-07-31 21:04:09', 1),
(6, 'Bob', 'English version ?', 'I find your lack of faith disturbing. Look, I can take you as far as Anchorhead. ', '2020-07-31 21:05:22', '2020-07-31 21:05:22', 2),
(7, 'Lucie', 'Vraiment ?', 'Bof bof, ça me parait difficile de commencer plus mal et pourtant j\'ai déjà lieu certains de vos ouvrages, Très déçu....', '2020-07-31 21:06:26', '2020-07-31 21:06:26', 2),
(8, 'Claude', 'A la suite', 'Superbe ! Plus vite :)', '2020-07-31 21:07:05', '2020-07-31 21:07:05', 2),
(9, 'NON ', 'NON ', 'NON NON NON et TOUJOURS NON ', '2020-07-31 21:08:21', '2020-07-31 21:08:21', 2),
(10, 'NONI find your lack of faith disturbing. Look, I can take you as far as Anchorhead. ', 'I find your lack of faith disturbing. Look, I can take you as far as Anchorhead. ', 'I find your lack of faith disturbing. Look, I can take you as far as Anchorhead. I find your lack of faith disturbing. Look, I can take you as far as Anchorhead. I find your lack of faith disturbing. Look, I can take you as far as Anchorhead. I find your lack of faith disturbing. Look, I can take you as far as Anchorhead. I find your lack of faith disturbing. Look, I can take you as far as Anchorhead. I find your lack of faith disturbing. Look, I can take you as far as Anchorhead. ', '2020-07-31 21:08:54', '2020-07-31 21:08:54', 3),
(11, 'Denis', 'Allo la modération !', 'Il faudrait se réveillé sur la modération non ? ', '2020-07-31 21:09:32', '2020-07-31 21:09:32', 3),
(12, 'First ', 'First ', 'First', '2020-07-31 21:11:56', '2020-07-31 21:11:56', 4),
(13, 'Jean', 'Une dernier', 'Un dernier commentaire pour la route', '2020-07-31 21:14:12', '2020-07-31 21:14:12', 4),
(14, 'John', 'A quand la suite ', 'Les parutions vont être fixe ? Quel va être le rythme de publication ??', '2020-07-31 21:02:55', '2020-07-31 21:02:55', 1);

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
  KEY `foreigncommentId` (`commentId`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reporting`
--

INSERT INTO `reporting` (`reportId`, `reportingDate`, `commentId`) VALUES
(1, '2020-07-31 21:21:53', 10),
(2, '2020-07-31 21:22:25', 10),
(3, '2020-07-31 21:22:33', 9),
(4, '2020-07-31 21:22:35', 9),
(5, '2020-07-31 21:22:37', 9),
(6, '2020-07-31 21:22:39', 9),
(7, '2020-07-31 21:22:45', 4),
(8, '2020-07-31 21:22:47', 5),
(9, '2020-07-31 21:22:50', 5),
(10, '2020-07-31 21:22:52', 5),
(11, '2020-07-31 21:22:54', 4),
(12, '2020-07-31 21:22:56', 4),
(13, '2020-07-31 21:22:59', 5),
(14, '2020-07-31 21:23:07', 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
