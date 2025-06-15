-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 21 fév. 2023 à 18:16
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `evaluation`
--

-- --------------------------------------------------------

--
-- Structure de la table `academic`
--

CREATE TABLE `academic` (
  `id` int(30) NOT NULL,
  `anne` text NOT NULL,
  `semestere` varchar(2) DEFAULT NULL,
  `courant` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `academic`
--

INSERT INTO `academic` (`id`, `anne`, `semestere`, `courant`) VALUES
(1, '2022-2023', 'S1', 1),
(2, '2022-2023', 'S2', 0),
(3, '2022-2023', 'S3', 1),
(4, '2022-2023', 'S4', 0),
(5, '2022-2023', 'S5', 1),
(6, '2022-2023', 'S6', 0);

-- --------------------------------------------------------

--
-- Structure de la table `archive`
--

CREATE TABLE `archive` (
  `annee` date DEFAULT NULL,
  `semester` varchar(2) DEFAULT NULL,
  `score` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `axe`
--

CREATE TABLE `axe` (
  `id` int(4) NOT NULL,
  `nomaxe` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `axe`
--

INSERT INTO `axe` (`id`, `nomaxe`) VALUES
(1, 'Déroulement'),
(2, 'Le Contenue du cours'),
(3, 'les TD et les TP '),
(4, 'Présentation'),
(5, 'Méthode d`enseignement'),
(6, 'Evaluation de Comp et Conn');

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE `departement` (
  `id` int(30) NOT NULL,
  `code` text NOT NULL,
  `nom` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`id`, `code`, `nom`) VALUES
(1, 'DSI', 'Devellopement'),
(2, 'RSS', 'reseaux'),
(3, 'CNM', 'multimedia'),
(4, 'TC', 'trancommun');

-- --------------------------------------------------------

--
-- Structure de la table `description`
--

CREATE TABLE `description` (
  `id` int(30) NOT NULL,
  `id_evalu` int(30) DEFAULT NULL,
  `pointfort` varchar(300) DEFAULT NULL,
  `pointfaible` varchar(300) DEFAULT NULL,
  `connaissance` varchar(300) DEFAULT NULL,
  `group` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE `etudiants` (
  `id` int(30) NOT NULL,
  `matricule` int(5) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `dep_id` int(30) DEFAULT NULL,
  `academic_id` int(30) DEFAULT NULL,
  `group` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`id`, `matricule`, `prenom`, `nom`, `dep_id`, `academic_id`, `group`) VALUES
(174, 21001, 'Cheikh Ahmed', 'Mohamed Ahmed', 2, 3, 'G2'),
(175, 21003, 'Touba', 'Yarahallah ', 1, 3, 'G1'),
(176, 21004, 'Mohamed Youssef', 'Abdelbarka', 2, 3, 'G1'),
(177, 21008, 'Rakiea', 'Dhah ', 1, 3, 'G1'),
(178, 21010, ' Esmaou', 'Vall', 1, 3, 'G1'),
(179, 21011, 'Mohamed Lemine', 'Taleb Ahmed ', 1, 3, 'G1'),
(180, 21012, 'Ahlam', 'Abdel Kader ', 1, 3, 'G1'),
(181, 21014, 'Taleb', 'Bahan ', 1, 3, 'G1'),
(182, 21016, 'khadijetou', 'Abdel Ghader ', 3, 3, 'G1'),
(183, 21017, 'Bedra', 'Deddy ', 1, 3, 'G1'),
(184, 21018, 'Mohamed', 'Ejelal ', 1, 3, 'G2'),
(185, 21019, 'Fatimetou', 'Dah ', 1, 3, 'G1'),
(186, 21020, 'Ahmed', 'Sejad ', 1, 3, 'G2'),
(187, 21021, 'El Moukhtar', 'DMeiss ', 3, 3, 'G2'),
(188, 21022, 'Sidi Abdoullah', 'Mehdi ', 2, 3, 'G2'),
(189, 21024, 'Cheikh Elhdrami', 'Begnoug ', 1, 3, 'G2'),
(190, 21027, 'Khadigetou', 'Mohamed Mewloud ', 2, 3, 'G2'),
(191, 21028, 'Fatimetou', 'El Alem ', 3, 3, 'G2'),
(192, 21029, 'Sidi', 'Ebeidi ', 3, 3, 'G1'),
(193, 21030, 'Aicha', 'Moussa ', 1, 3, 'G2'),
(194, 21031, 'Sidi El Valy', 'SidElemine ', 2, 3, 'G1'),
(195, 21032, 'Oum Elvadhli', 'Cheikh ', 3, 3, 'G2'),
(196, 21033, 'Lalla', 'Ebety ', 1, 3, 'G1'),
(197, 21038, 'El Vaghih', 'Zeine ', 1, 3, 'G1'),
(198, 21040, 'Abdoulaye', 'Ba ', 1, 3, 'G2'),
(199, 21041, 'Mariem', 'Dahi ', 2, 3, 'G2'),
(200, 21042, 'Zeinebou', 'Lebchir', 2, 3, 'G1'),
(201, 21043, 'Mohamed Vall', 'Mohameden Vall', 1, 3, 'G1'),
(202, 21045, 'Rougha', 'Amar Salem ', 2, 3, 'G2'),
(203, 21046, 'Zeinebou', 'El Ghellawi', 3, 3, 'G1'),
(204, 21047, 'Djilitt', 'Abdellahi', 1, 3, 'G1'),
(205, 21050, 'Aicha', 'Chrif Bou Ghouba', 2, 3, 'G1'),
(206, 21051, 'Fatimetou', 'Abdel Haye ', 3, 3, 'G1'),
(207, 21052, 'Ghlana', 'Mohamed Habib ', 1, 3, 'G2'),
(208, 21053, 'Imane', 'Hmeyada', 2, 3, 'G1'),
(209, 21054, 'Mariem', 'SidAhmed Taleb ', 1, 3, 'G2'),
(210, 21055, 'Cherifa', 'Beillahi ', 3, 3, 'G1'),
(211, 21056, 'Bouchra', 'Ahmed Ramdhane ', 1, 3, 'G2'),
(212, 21059, 'Mariem', 'Afou ', 2, 3, 'G1'),
(213, 21060, 'Tekeiber', 'Bah ', 1, 3, 'G1'),
(214, 21061, 'Abderrahmane', 'Nanne Mohamed ', 1, 3, 'G2'),
(215, 21062, 'Oumou', 'Ba ', 2, 3, 'G2'),
(216, 21063, 'Aicha', 'Fadel ', 3, 3, 'G1'),
(217, 21064, 'Soumeya', 'Ebi El Maaly ', 2, 3, 'G1'),
(218, 21065, 'Moussa', 'Emhamed ', 1, 3, 'G2'),
(219, 21066, 'Aminetou', 'Lekhoueima ', 1, 3, 'G1'),
(220, 21068, 'Amani', 'Baba ', 3, 3, 'G2'),
(221, 21069, 'Ahmed', 'Cheikh ', 2, 3, 'G2'),
(222, 21072, 'Aminetou', 'Ahmed Cherif ', 3, 3, 'G1'),
(223, 21076, 'Ahmedou', 'Enaha Cheikh ', 1, 3, 'G2'),
(276, 21007, 'Meimouna', 'Erebih', 4, 1, 'G2'),
(277, 21009, 'Mohamed', 'Ahmedou ', 4, 1, 'G3'),
(280, 21026, 'Mohamedhen Vall', 'Khaled ', 4, 1, 'G1'),
(282, 21036, 'Cheikh', 'Aba ', 4, 1, 'G1'),
(285, 21058, 'Aichetou', 'Abdellah ', 4, 1, 'G1'),
(286, 21071, 'Fatimetou', 'NDary ', 4, 1, 'G3'),
(287, 22001, 'Mezid Abderahman', 'Mohamed Mahmoud', 4, 1, 'G2'),
(288, 22002, 'Mohamed Lemine', 'Al Id', 4, 1, 'G3'),
(289, 22003, 'Ebou Oubeideta', 'Mohamed Vall ', 4, 1, 'G3'),
(290, 22004, 'El Moukhtar', 'Amar Mohamed', 4, 1, 'G2'),
(291, 22005, 'Mariem', 'Erebih ', 4, 1, 'G2'),
(292, 22006, 'Mohamed', 'Cheikh Sidi ', 4, 1, 'G2'),
(293, 22007, 'Ahmedou', 'Miya ', 4, 1, 'G1'),
(294, 22008, 'Mohamed', 'Dahi', 4, 1, 'G3'),
(295, 22009, 'Ahmed', 'Mohamed Abba ', 4, 1, 'G3'),
(296, 22010, 'Aissata', 'NGaid ', 4, 1, 'G2'),
(297, 22011, 'Abdellah', 'Nomane Mohamed ', 4, 1, 'G3'),
(298, 22012, 'Aboubakri', 'NGaidé ', 4, 1, 'G1'),
(299, 22013, 'El Moustapha', 'Mohamed El Moustapha ', 4, 1, 'G2'),
(300, 22014, 'Bechir', 'Mady ', 4, 1, 'G1'),
(301, 22015, 'Nebghouha', 'Seyid', 4, 1, 'G2'),
(302, 22016, 'Diyana', 'Sambe', 4, 1, 'G3'),
(303, 22017, 'Kadiata', 'Niang', 4, 1, 'G1'),
(304, 22018, 'Souleymane', 'Baba ', 4, 1, 'G3'),
(305, 22019, 'Sultana', 'Ebe Oumar', 4, 1, 'G2'),
(306, 22020, 'Idoumou', 'Lehbouss', 4, 1, 'G2'),
(307, 22021, 'Taleb', 'Abde Selam ', 4, 1, 'G1'),
(308, 22022, 'Boubou', 'Camara ', 4, 1, 'G3'),
(309, 22023, 'Itawel Oumrou', 'Cheikh Mohamed Vadel ', 4, 1, 'G2'),
(310, 22024, 'Ahmedou Bemba', 'Ahmedou Salem ', 4, 1, 'G2'),
(311, 22025, 'El Kherchy', 'Baba ', 4, 1, 'G3'),
(312, 22026, 'Yahya', 'Tyib Mohamed ', 4, 1, 'G2'),
(313, 22027, 'Cheikh Maleinine', 'Cheikh Malainine ', 4, 1, 'G3'),
(314, 22028, 'Khadijetou', 'Boubakar ', 4, 1, 'G3'),
(315, 22029, 'Mohamed Lemine', 'NDiayane ', 4, 1, 'G1'),
(317, 22031, 'Mama', 'Diakit ', 4, 1, 'G1'),
(318, 22032, 'Yahya', 'Elmine ', 4, 1, 'G1'),
(319, 22033, 'Salma', 'Lefad ', 4, 1, 'G2'),
(320, 22034, 'Mohamed Mahmoud', 'Sidi Echeikh ', 4, 1, 'G1'),
(321, 22035, 'Vatma', 'El Wavi ', 4, 1, 'G1'),
(322, 22036, 'Memoud', 'Abdi Sidi ', 4, 1, 'G2'),
(326, 22040, 'Mohamed', 'Dhmin ', 4, 1, 'G1'),
(327, 22041, 'Abdellahi', 'Elemine Vall ', 4, 1, 'G3'),
(328, 22042, 'Fatimetou', 'Cheikh Ould Meny ', 4, 1, 'G1'),
(329, 22043, 'Mohamed Lemine', 'Ahmed El Haj ', 4, 1, 'G2'),
(331, 22045, 'Hawa', 'Leye', 4, 1, 'G1'),
(332, 22046, 'Weva', 'Nahy ', 4, 1, 'G2'),
(333, 22047, 'Mohamed', 'Camara ', 4, 1, 'G1'),
(334, 22048, 'Zeinebou', 'El Hachmi ', 4, 1, 'G3'),
(335, 22049, 'Abd Dayem', 'Ainine ', 4, 1, 'G1'),
(336, 22050, 'Ahamed Salem', 'Chennan ', 4, 1, 'G2'),
(339, 22053, 'Abderahmane', 'Abderrahmane ', 4, 1, 'G1'),
(340, 22054, 'Ahmed', 'Ely ', 4, 1, 'G2'),
(341, 22055, 'Sara', 'Wedih ', 4, 1, 'G1'),
(342, 22056, 'Achato', 'Cheikh El Mehdy ', 4, 1, 'G1'),
(343, 22057, 'Ahmed Yassine', 'Mohamed Salem ', 4, 1, 'G2'),
(344, 22058, 'Ethemane', 'Niass ', 4, 1, 'G3'),
(345, 22059, 'Tahra', 'Cheikh Mamine ', 0, 1, 'G2'),
(346, 22060, 'Mama', 'Sidi Youssouf ', 4, 1, 'G1'),
(347, 22061, 'Marieme', 'Lab ', 4, 1, 'G1'),
(348, 22062, 'Mohameden', 'Edou', 4, 1, 'G2'),
(349, 22063, 'Hawa', 'Blal ', 4, 1, 'G3'),
(350, 22064, 'Aminetou', 'Abderrazagh ', 4, 1, 'G3'),
(351, 22065, 'Zeinebou', 'Saleh ', 4, 1, 'G1'),
(352, 22066, 'Aichetou', 'Mohamed Chrif ', 4, 1, 'G1'),
(353, 22067, 'Hafssatou', 'Bilal ', 4, 1, 'G1'),
(354, 22068, 'Mariem', 'Kah', 4, 1, 'G1'),
(355, 22069, 'Sidi Mohamed', 'Taje Dine ', 4, 1, 'G1'),
(356, 22070, 'Mariem', 'El Youssy ', 4, 1, 'G3'),
(357, 22071, 'Rabani', 'El Bessry ', 4, 1, 'G3'),
(358, 22072, 'Toutou', 'Mouslih ', 4, 1, 'G2'),
(359, 22073, ' El Yedaly', 'El Ahtighe', 4, 1, 'G2'),
(360, 22074, 'Mouna', 'El Khaye ', 4, 1, 'G1'),
(361, 22075, 'Oum El Moumnine', 'Abdel Kader ', 4, 1, 'G3'),
(362, 22076, 'Fatimetou', 'Ahmed Maham ', 4, 1, 'G1'),
(363, 22077, ' Mohamed Lemine', 'Zeidane', 4, 1, 'G1'),
(364, 22078, 'Roughaya', 'Bebane', 4, 1, 'G3'),
(365, 22079, 'Oussame', 'Said ', 4, 1, 'G1'),
(366, 22080, 'Ammou Melika', 'Mohamed ', 4, 1, 'G3'),
(367, 22081, 'Mohamed Lemine', 'Allouche ', 4, 1, 'G2'),
(369, 22083, 'El Heiba', 'Houmren ', 4, 1, 'G1'),
(370, 22084, 'Ahmed', 'Khouna ', 4, 1, 'G3'),
(371, 22085, 'Cheikh', 'Abidine ', 4, 1, 'G3'),
(372, 22086, 'Aliyine', 'Wedad ', 4, 1, 'G3'),
(373, 22087, 'TFeil Maryeim', 'Mohamed ', 4, 1, 'G3'),
(374, 22088, 'Ousama', 'El Atigh ', 4, 1, 'G3'),
(375, 22089, 'Mouna', 'El Mokhtar ', 4, 1, 'G2'),
(377, 22030, 'Abdellahi', 'Menem ', 4, 1, 'G2'),
(384, 22037, 'Khira', 'Elema ', 4, 1, 'G3'),
(385, 22038, 'Zeinebou', 'El Agheb ', 4, 1, 'G2'),
(386, 22039, 'Esma', 'MHadi ', 4, 1, 'G1'),
(391, 22044, 'Mohamed Mahmoud', 'Mohamed Lemine', 4, 1, 'G1'),
(398, 22051, 'Ahmed', 'El Maouloud ', 4, 1, 'G2'),
(399, 22052, 'Safia', 'El Hacen ', 4, 1, 'G3'),
(412, 22065, 'Zeinebou', 'Saleh ', 4, 1, 'G1'),
(413, 22066, 'Aichetou', 'Mohamed Chrif ', 4, 1, 'G1'),
(420, 22073, ' El Yedaly', 'El Ahtighe', 4, 1, 'G2'),
(429, 22082, 'Elmoctar Aicha', 'Mohamed ', 4, 1, 'G2'),
(444, 21002, 'khadije', 'baye', 4, 1, 'G3'),
(445, 21005, 'fatimetou ', 'ahmed eli', 4, 1, 'G3'),
(446, 21006, 'mohamed', 'sidi ahmed', 4, 1, 'G1'),
(449, 21023, 'mohamed said', 'rebanie', 4, 1, 'G1'),
(450, 21025, 'mohamed mahmoud', 'ahmemd', 4, 1, 'G2'),
(452, 21034, 'khaled', 'ahmed mahmoud', 4, 1, 'G2'),
(454, 21039, 'taher', 'selahi', 4, 1, 'G2'),
(455, 21044, 'El hssein', 'nah', 4, 1, 'G2'),
(456, 21048, 'sara', 'ahmed horme', 4, 1, 'G3'),
(457, 21049, 'omelkheyri', 'mahfoudh', 4, 1, 'G3'),
(459, 21070, 'oudaa', 'oudaa', 4, 1, 'G2'),
(460, 21074, 'mohamed mahmoud', 'Abd El kader', 4, 1, 'G3'),
(461, 21075, 'mohamed El moustpha ', 'Mohamedou', 4, 1, 'G3');

-- --------------------------------------------------------

--
-- Structure de la table `evaluation`
--

CREATE TABLE `evaluation` (
  `id` int(30) NOT NULL,
  `academic_id` int(30) NOT NULL,
  `dep_id` int(30) NOT NULL,
  `id_mat` int(30) NOT NULL,
  `debut` date DEFAULT NULL,
  `fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `matieres`
--

CREATE TABLE `matieres` (
  `id` int(30) NOT NULL,
  `codematieres` varchar(7) NOT NULL,
  `nommatieres` varchar(100) DEFAULT NULL,
  `module` varchar(100) DEFAULT NULL,
  `id_dep` int(30) DEFAULT NULL,
  `semester` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `matieres`
--

INSERT INTO `matieres` (`id`, `codematieres`, `nommatieres`, `module`, `id_dep`, `semester`) VALUES
(46, 'DEV110', 'Algorithmique et programmation C++', ' Programmation et développement 1', 4, 'S1'),
(47, 'DEV111', 'Introduction aux bases de données', ' Programmation et développement 1', 4, 'S1'),
(48, 'DEV112', 'Technologies web', ' Programmation et développement 1', 4, 'S1'),
(49, 'SYR110', 'Bases informatique', ' Systèmes et Réseaux', 4, 'S1'),
(50, 'SYR111', 'Concepts de base des réseaux informatiques', 'Systèmes et Réseaux', 4, 'S1'),
(51, 'MAI110', 'Algèbre 1', ' Outils mathématiques et informatiques', 4, 'S1'),
(52, 'MAI111', 'Analyse', 'Outils mathématiques et informatiques', 4, 'S1'),
(53, 'MAI112', 'Certification PIX 1', ' Outils mathématiques et informatiques', 4, 'S1'),
(54, 'DPR110', 'Communication', ' Développement personnel', 4, 'S1'),
(55, 'DPR111', 'Anglais', 'Développement personnel', 4, 'S1'),
(56, 'DPR112', 'PPP', 'Développement personnel', 4, 'S1'),
(57, 'DEV210', 'Programmation Python', 'Programmation et développement 2', 4, 'S2'),
(58, 'DEV211', 'Langages web', 'Programmation et développement 2', 4, 'S2'),
(59, 'CNM210', 'CMS et PAO 1', 'Atelier multumédia', 3, 'S2'),
(60, 'CNM211', 'Projet integrateur Multumedia', 'Atelier multumédia', 4, 'S2'),
(61, 'SYR210', 'Systèmes logiques', ' Architecture et systèmes', 4, 'S2'),
(62, 'SYR211', 'Système exploitation I', ' Architecture et systèmes', 4, 'S2'),
(63, 'MAI210', 'Algèbre 2', 'Outils mathématiques et informatiques', 4, 'S2'),
(64, 'MAI211', 'Probalité et statistiques', 'Outils mathématiques et informatiques', 4, 'S2'),
(65, 'MAI212', 'Certification PIX 2', 'Outils mathématiques et informatiques', 4, 'S2'),
(66, 'DPR210', 'Communication', ' Développement personnel', 4, 'S2'),
(67, 'DPR211', 'Anglais', ' Développement personnel', 4, 'S2'),
(68, 'DPR212', 'PPP', ' Développement personnel', 4, 'S2'),
(69, 'DPR310', 'Communication', ' Développement personnel', 4, 'S3'),
(70, 'DPR311', 'Anglais', ' Développement personnel', 4, 'S3'),
(71, 'DPR312', 'PPP', ' Développement personnel', 4, 'S3'),
(72, 'DPR313', 'Gestion entreprise', ' Développement personnel', 4, 'S3'),
(73, 'CNM310', 'Numérisation et codage des objets Multimédia', 'Outils multimédia', 3, 'S3'),
(74, 'CNM311', 'CMS et PAO 2', 'Outils multimédia', 3, 'S3'),
(75, 'CNM312', 'Projet integrateur Avancé I', 'Outils multimédia', 3, 'S3'),
(76, 'CNM320', 'Technologies Multimédias avancées', 'U31', 3, 'S3'),
(77, 'CNM321', 'Bases de données et conception des SI', 'U31', 3, 'S3'),
(78, 'PAV310', 'Programmation orientée objet  Java', 'porgrammation avancée', 4, 'S3'),
(79, 'PAV311', 'Structure de données et complexité algorithmique', 'porgrammation avancée', 4, 'S3'),
(80, 'DAS310', 'Machine learning', ' Science des données', 4, 'S3'),
(81, 'DAS311', 'RO', ' Science des données', 4, 'S3'),
(82, 'RSS310', 'Introduction aux Réseaux Mobiles', ' Outils Réseaux et Systèmes', 2, 'S3'),
(83, 'RSS311', 'Administration systèmes et réseaux ', ' Outils Réseaux et Systèmes', 2, 'S3'),
(84, 'RSS312', 'Projet integrateur Avancé', ' Outils Réseaux et Systèmes', 2, 'S3'),
(85, 'RSS320', 'Introduction à la sécurité informatique', ' U13', 2, 'S3'),
(86, 'RSS321', 'Bases de données et conception des SI', 'U13', 2, 'S3'),
(87, 'DSI310', 'Génie logiciel ', 'SI avancé', 1, 'S3'),
(88, 'DSI311', 'Bases de données avancés', 'SI avancé', 1, 'S3'),
(89, 'DSI312', 'Projet integrateur avancé I', 'SI avancé', 1, 'S3'),
(90, 'DSI320', 'Développement web python', 'Outils Développement', 1, 'S3'),
(91, 'DSI321', 'DevOps ', ' Outils Développement', 1, 'S3'),
(92, 'DSI210', 'SGBD MySQL', ' Atelier dév', 1, 'S2'),
(93, 'DSI211', 'Projet integrateur DEV', ' Atelier dév', 1, 'S2'),
(94, 'RSS210', 'Services réseaux ', ' Atelier Réseau', 2, 'S2'),
(95, 'RSS211', 'Projet integrateur Réseaux ', ' Atelier Réseau', 2, 'S2');

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `id` int(30) NOT NULL,
  `question` varchar(300) DEFAULT NULL,
  `id_axe` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id`, `question`, `id_axe`) VALUES
(1, 'Le cours est bien équilibré entre éléments de théorie, exemples et applications.', 1),
(2, 'Le déroulement des cours, TD, TP refléte la difficulté et l’importance des sujets traités.', 1),
(3, 'Le volume horaire refléte l’importance de la matiére.', 1),
(4, 'Le contenu du cours est satisfaisant pour mon orientation professionnelle.', 2),
(5, 'J’ai compris les objectifs et l’importance de ce cours.', 2),
(6, 'Les ressources nécessaires me semblent appropriées et disponibles.', 2),
(7, 'J’ai compris quels sont les criteres et directives de ces activites.', 3),
(8, 'Je sais quels sont les objectifs evalues par ces activites', 3),
(9, 'Ces activités me permettent de vérifier ma progression', 3),
(10, 'L’enseignant présente la matiére de façon claire et structurée.', 4),
(11, 'L’enseignant est suffisamment disponible.', 4),
(12, 'L’enseignant semble socieux d`améliorer son cours ', 4),
(13, 'Les activités proposées pendant le cours ont nécessité votre participation active.', 5),
(14, 'Le groupe était dynamique et participait volontiers aux activités, répondait aux questions.', 5),
(15, 'Les méthodes d\'enseignement vous ont permis d\'acquérir les compétences visées', 5),
(16, 'Les modalité d\'évaluation ont été clairement présentées.', 6),
(17, 'Les consignes pour la réalisation des travaux de l\'évaluation des compétences étaient claires', 6),
(18, 'Des retours utiles ont été faits à propos des travaux et examens', 6);

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `id` int(30) NOT NULL,
  `id_etud` int(30) DEFAULT NULL,
  `id_question` int(30) NOT NULL,
  `id_evalu` int(30) NOT NULL,
  `score` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `droit` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `login` varchar(30) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `code` varchar(30) NOT NULL,
  `STATUS` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `droit`, `nom`, `prenom`, `login`, `pass`, `code`, `STATUS`) VALUES
(22, 'admin', 'cheikh', 'dhib', 'cheikh.dhib@supnum.mr', '25d55ad283aa400af464c76d713c07ad', '0', 'Verified'),
(33, 'user', 'med', 'ejlal', '21018@supnum.mr', '25d55ad283aa400af464c76d713c07ad', '0', 'Verified');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(2) NOT NULL,
  `email` varchar(25) DEFAULT NULL,
  `droit` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `email`, `droit`) VALUES
(85, '21001@supnum.mr', 'user'),
(86, '21003@supnum.mr', 'user'),
(87, '21004@supnum.mr', 'user'),
(88, '21008@supnum.mr', 'user'),
(89, '21010@supnum.mr', 'user'),
(90, '21011@supnum.mr', 'user'),
(91, '21012@supnum.mr', 'user'),
(92, '21014@supnum.mr', 'user'),
(93, '21016@supnum.mr', 'user'),
(94, '21017@supnum.mr', 'user'),
(95, '21018@supnum.mr', 'user'),
(96, '21019@supnum.mr', 'user'),
(97, '21020@supnum.mr', 'user'),
(98, '21021@supnum.mr', 'user'),
(99, '21022@supnum.mr', 'user'),
(100, '21024@supnum.mr', 'user'),
(101, '21027@supnum.mr', 'user'),
(102, '21028@supnum.mr', 'user'),
(103, '21029@supnum.mr', 'user'),
(104, '21030@supnum.mr', 'user'),
(105, '21031@supnum.mr', 'user'),
(106, '21032@supnum.mr', 'user'),
(107, '21033@supnum.mr', 'user'),
(108, '21038@supnum.mr', 'user'),
(109, '21040@supnum.mr', 'user'),
(110, '21041@supnum.mr', 'user'),
(111, '21042@supnum.mr', 'user'),
(112, '21043@supnum.mr', 'user'),
(113, '21045@supnum.mr', 'user'),
(114, '21046@supnum.mr', 'user'),
(115, '21047@supnum.mr', 'user'),
(116, '21050@supnum.mr', 'user'),
(117, '21051@supnum.mr', 'user'),
(118, '21052@supnum.mr', 'user'),
(119, '21053@supnum.mr', 'user'),
(120, '21054@supnum.mr', 'user'),
(121, '21055@supnum.mr', 'user'),
(122, '21056@supnum.mr', 'user'),
(123, '21059@supnum.mr', 'user'),
(124, '21060@supnum.mr', 'user'),
(125, '21061@supnum.mr', 'user'),
(126, '21062@supnum.mr', 'user'),
(127, '21063@supnum.mr', 'user'),
(128, '21064@supnum.mr', 'user'),
(129, '21065@supnum.mr', 'user'),
(130, '21066@supnum.mr', 'user'),
(131, '21068@supnum.mr', 'user'),
(132, '21069@supnum.mr', 'user'),
(133, '21072@supnum.mr', 'user'),
(134, '21076@supnum.mr', 'user'),
(135, 'cheikh.dhib@supnum.mr', 'admin'),
(137, '22001@supnum.mr', 'user'),
(138, '22002@supnum.mr', 'user'),
(139, '22003@supnum.mr', 'user'),
(140, '22004@supnum.mr', 'user'),
(141, '22005@supnum.mr', 'user'),
(142, '22006@supnum.mr', 'user'),
(143, '22007@supnum.mr', 'user'),
(144, '22008@supnum.mr', 'user'),
(145, '22009@supnum.mr', 'user'),
(146, '22010@supnum.mr', 'user'),
(147, '22011@supnum.mr', 'user'),
(148, '22012@supnum.mr', 'user'),
(149, '22013@supnum.mr', 'user'),
(150, '22014@supnum.mr', 'user'),
(151, '22015@supnum.mr', 'user'),
(152, '22016@supnum.mr', 'user'),
(153, '22017@supnum.mr', 'user'),
(154, '22018@supnum.mr', 'user'),
(155, '22019@supnum.mr', 'user'),
(156, '22020@supnum.mr', 'user'),
(157, '22021@supnum.mr', 'user'),
(158, '22022@supnum.mr', 'user'),
(159, '22023@supnum.mr', 'user'),
(160, '22024@supnum.mr', 'user'),
(161, '22025@supnum.mr', 'user'),
(162, '22026@supnum.mr', 'user'),
(163, '22027@supnum.mr', 'user'),
(164, '22028@supnum.mr', 'user'),
(165, '22029@supnum.mr', 'user'),
(166, '22030@supnum.mr', 'user'),
(167, '22031@supnum.mr', 'user'),
(168, '22032@supnum.mr', 'user'),
(169, '22033@supnum.mr', 'user'),
(170, '22034@supnum.mr', 'user'),
(171, '22035@supnum.mr', 'user'),
(172, '22036@supnum.mr', 'user'),
(173, '22037@supnum.mr', 'user'),
(174, '22038@supnum.mr', 'user'),
(175, '22039@supnum.mr', 'user'),
(176, '22040@supnum.mr', 'user'),
(177, '22041@supnum.mr', 'user'),
(178, '22042@supnum.mr', 'user'),
(179, '22043@supnum.mr', 'user'),
(180, '22044@supnum.mr', 'user'),
(181, '22045@supnum.mr', 'user'),
(182, '22046@supnum.mr', 'user'),
(183, '22047@supnum.mr', 'user'),
(184, '22048@supnum.mr', 'user'),
(185, '22049@supnum.mr', 'user'),
(186, '22050@supnum.mr', 'user'),
(187, '22051@supnum.mr', 'user'),
(188, '22052@supnum.mr', 'user'),
(189, '22053@supnum.mr', 'user'),
(190, '22054@supnum.mr', 'user'),
(191, '22055@supnum.mr', 'user'),
(192, '22056@supnum.mr', 'user'),
(193, '22057@supnum.mr', 'user'),
(194, '22058@supnum.mr', 'user'),
(195, '22059@supnum.mr', 'user'),
(196, '22060@supnum.mr', 'user'),
(197, '22061@supnum.mr', 'user'),
(198, '22062@supnum.mr', 'user'),
(199, '22063@supnum.mr', 'user'),
(200, '22064@supnum.mr', 'user'),
(201, '22065@supnum.mr', 'user'),
(202, '22066@supnum.mr', 'user'),
(203, '22067@supnum.mr', 'user'),
(204, '22068@supnum.mr', 'user'),
(205, '22069@supnum.mr', 'user'),
(206, '22070@supnum.mr', 'user'),
(207, '22071@supnum.mr', 'user'),
(208, '22072@supnum.mr', 'user'),
(209, '22073@supnum.mr', 'user'),
(210, '22074@supnum.mr', 'user'),
(211, '22075@supnum.mr', 'user'),
(212, '22076@supnum.mr', 'user'),
(213, '22077@supnum.mr', 'user'),
(214, '22078@supnum.mr', 'user'),
(215, '22079@supnum.mr', 'user'),
(216, '22080@supnum.mr', 'user'),
(217, '22081@supnum.mr', 'user'),
(218, '22082@supnum.mr', 'user'),
(219, '22083@supnum.mr', 'user'),
(220, '22084@supnum.mr', 'user'),
(221, '22085@supnum.mr', 'user'),
(222, '22086@supnum.mr', 'user'),
(223, '22087@supnum.mr', 'user'),
(224, '22088@supnum.mr', 'user'),
(225, '22089@supnum.mr', 'user'),
(226, '21002@supnum.mr', 'user'),
(227, '21005@supnum.mr', 'user'),
(228, '21006@supnum.mr', 'user'),
(229, '21007@supnum.mr', 'user'),
(230, '21009@supnum.mr', 'user'),
(231, '21023@supnum.mr', 'user'),
(232, '21025@supnum.mr', 'user'),
(233, '21026@supnum.mr', 'user'),
(234, '21034@supnum.mr', 'user'),
(235, '21036@supnum.mr', 'user'),
(236, '21039@supnum.mr', 'user'),
(237, '21044@supnum.mr', 'user'),
(238, '21071@supnum.mr', 'user'),
(239, '21028@supnum.mr', 'user'),
(240, 'cheikh.dhib@supnum.mr', 'admin'),
(242, 'moussaba@supnum.mr', 'admin'),
(243, '21018@supnum.mr', 'admin'),
(244, '21018@supnum.mr', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `academic`
--
ALTER TABLE `academic`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `axe`
--
ALTER TABLE `axe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `description`
--
ALTER TABLE `description`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_evalu` (`id_evalu`);

--
-- Index pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dep_id` (`dep_id`),
  ADD KEY `academic_id` (`academic_id`);

--
-- Index pour la table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `academic_id` (`academic_id`),
  ADD KEY `dep_id` (`dep_id`),
  ADD KEY `id_mat` (`id_mat`);

--
-- Index pour la table `matieres`
--
ALTER TABLE `matieres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dep` (`id_dep`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_axe` (`id_axe`);

--
-- Index pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_etud` (`id_etud`),
  ADD KEY `id_evalu` (`id_evalu`),
  ADD KEY `id_question` (`id_question`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `academic`
--
ALTER TABLE `academic`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `axe`
--
ALTER TABLE `axe`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `departement`
--
ALTER TABLE `departement`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `description`
--
ALTER TABLE `description`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT pour la table `etudiants`
--
ALTER TABLE `etudiants`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=462;

--
-- AUTO_INCREMENT pour la table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT pour la table `matieres`
--
ALTER TABLE `matieres`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3554;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `description`
--
ALTER TABLE `description`
  ADD CONSTRAINT `description_ibfk_1` FOREIGN KEY (`id_evalu`) REFERENCES `evaluation` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
