-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 23 nov. 2022 à 14:50
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

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
-- Structure de la table `axe`
--

CREATE TABLE `axe` (
  `numaxe` int(4) NOT NULL,
  `nomaxe` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `axe`
--

INSERT INTO `axe` (`numaxe`, `nomaxe`) VALUES
(1, 'Déroulement'),
(2, 'Le Contenue du cours'),
(3, 'Activités(TD,TP,projet)'),
(4, 'Présentation'),
(5, 'Méthode d`enseignement'),
(6, 'Evaluation de Comp et Conn');

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE `etudiants` (
  `matricule` int(5) NOT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `semestre` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`matricule`, `prenom`, `nom`, `semestre`) VALUES
(21001, 'Cheikh Ahmed', 'Mohamed Ahmed', 'S1'),
(21002, 'khadijetou', 'Baya', 'S1'),
(21003, 'Touba', 'Yarahallah', 'S1'),
(21004, 'Mohamed Youssef', 'Abdelbarka', 'S1'),
(21005, 'Fatimetou', 'Ahmed Ely', 'S1'),
(21006, 'Mohamed', 'Sidi Ahmed', 'S1'),
(21007, 'Meimouna', 'Erebih', 'S1'),
(21008, 'Roukaya', 'Dehah', 'S1'),
(21009, 'Mohamed', 'Ahmedou', 'S1'),
(21010, 'Esmaou', 'Esmaou V', 'S1'),
(21011, 'Mohamed Lemine', 'Taleb Ahmed', 'S1'),
(21012, 'Ahlam', 'Abdel Kader', 'S1'),
(21014, 'Taleb', 'Bahan', 'S1'),
(21016, 'khadijetou', 'Abdel Ghader', 'S1'),
(21017, 'Bedra', 'Deddy', 'S1'),
(21018, 'Mohamed', 'Ejelal', 'S2'),
(21019, 'Fatimetou', 'Dah', 'S1'),
(21020, 'Ahmed', 'Sejad', 'S1'),
(21021, 'El Moukhtar', 'D\'Meiss', 'S1'),
(21022, 'Sidi Abdoullah', 'Mehdi', 'S1'),
(21023, 'Mouhamed Said', 'Rabany', 'S1'),
(21024, 'Cheikh Elhdrami', 'Begnoug', 'S1'),
(21025, 'Mohamed', 'Mahmoud Hmemed', 'S1'),
(21026, 'Mohamedhen Vall', 'Khaled', 'S1'),
(21027, 'Khadigetou', 'Mohamed Mewloud', 'S1'),
(21028, 'Fatimetou', 'El Alem', 'S1'),
(21029, 'Sidi', 'Ebeidi', 'S1'),
(21030, 'Aicha', 'Moussa', 'S1'),
(21031, 'Sidi El Valy', 'Sid\'Elemine', 'S1'),
(21032, 'Oum Elvadhli', 'Cheikh', 'S1'),
(21033, 'Lalla', 'Ebety', 'S1'),
(21034, 'Khaled', 'Ahmed Mahmoud', 'S1'),
(21035, 'Mohamed salem', 'Abad', 'S1'),
(21036, 'Cheikh', 'Aba', 'S1'),
(21038, 'El Vaghih', 'Zeine', 'S1'),
(21039, 'Taher', 'sellahi', 'S1'),
(21040, 'Abdoulaye', 'Ba', 'S1'),
(21041, 'Mariem', 'Dahi', 'S1'),
(21042, 'Zeinebou', 'lebchir', 'S1'),
(21043, 'Mohamed Vall', 'Mohameden Vall', 'S1'),
(21044, 'El Houssein', 'Nah', 'S1'),
(21045, 'Rougha', 'Amar Salem', 'S1'),
(21046, 'Zeinebou', 'El Ghellawi', 'S1'),
(21047, 'Djilitt', 'Abdellahi', 'S1'),
(21048, 'sara', 'Ahmed Hourma', 'S1'),
(21049, 'OUM El khairy', 'Mahfoudh', 'S1'),
(21050, 'Aicha', 'Bou Ghouba', 'S1'),
(21051, 'Fatimetou', 'Abdel Haye', 'S1'),
(21052, 'Ghlana', 'Mohamed Habib', 'S1'),
(21053, 'Imane', 'Hmeyada', 'S1'),
(21054, 'Mariem', 'Sid\'Ahmed Taleb', 'S1'),
(21055, 'Cherifa', 'Beillahi', 'S1'),
(21056, 'Bouchra', 'Ahmed Ramdhane', 'S1'),
(21057, 'Varh', 'Ahmed Horma', 'S1'),
(21058, 'Aichetou', 'Abdellah', 'S1'),
(21059, 'Mariem', 'Afou', 'S1'),
(21060, 'Tekeiber', 'Bah', 'S1'),
(21061, 'Mohamed Abderrahmane', 'Nane', 'S1'),
(21062, 'Oumou', 'Ba', 'S1'),
(21063, 'Aicha', 'Fadel', 'S1'),
(21064, 'Soumeya', 'Ebi El Maaly', 'S1'),
(21065, 'Moussa', 'Emhamed', 'S1'),
(21066, 'Aminetou', 'Lekhoueima', 'S1'),
(21068, 'Amani', 'Baba', 'S1'),
(21069, 'Ahmed', 'Cheikh', 'S1'),
(21070, 'Oudaa', 'Oudaa', 'S1'),
(21071, 'Fatimetou', 'N\'Dary', 'S1'),
(21072, 'Aminetou', 'Ahmed Cherif', 'S1'),
(21074, 'Mohamed Mahmoud', 'Abd El Kader', 'S1'),
(21075, 'Mohamed', 'El Moustpha Mohamedou', 'S1');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `matricule` int(5) DEFAULT NULL,
  `codematieres` varchar(7) DEFAULT NULL,
  `annee` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `matieres`
--

CREATE TABLE `matieres` (
  `codematieres` varchar(7) NOT NULL,
  `nommatieres` varchar(100) DEFAULT NULL,
  `module` varchar(100) DEFAULT NULL,
  `debut` date DEFAULT NULL,
  `fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `matieres`
--

INSERT INTO `matieres` (`codematieres`, `nommatieres`, `module`, `debut`, `fin`) VALUES
('\r\nMAI22', 'Probalité et statistiques ', 'Outils mathematiques et informatiques', '2022-08-08', '2022-08-10'),
('DEV11', 'algorithme et programation C++', 'programmation et développement 1', NULL, NULL),
('DEV12', 'introduction oux base de données', 'programmation et développement 1', NULL, NULL),
('DEV13', 'Technologies Web', 'programmation et développement 2', NULL, NULL),
('DEV21', 'Programmation Python', 'Programmation et développement', NULL, NULL),
('DEV22', 'Langages web', 'Programmation et développement', NULL, NULL),
('DPR11', 'Français', 'Développement personnel', NULL, NULL),
('DPR12', 'Anglais', 'Développement personnel', NULL, NULL),
('DPR13', 'PPP', 'Développement personnel', NULL, NULL),
('DPR21', 'Communication', 'Développement personnel', NULL, NULL),
('DPR22', 'Anglais', 'Développement personnel', NULL, NULL),
('DPR23', 'PPP', 'Développement personnel', NULL, NULL),
('DSI21/R', 'SGBD 1 (MySQL)/LAN/CMS et PAO', 'Spécialité', NULL, NULL),
('DSI22/R', 'PI DEV/SR/Multumedia', 'Spécialité', NULL, NULL),
('MAI11', 'Algeber', 'Outils mathematiques et informatiques', NULL, NULL),
('MAI12', 'Analyse', 'Outils mathematiques et informatiques', NULL, NULL),
('MAI13', 'Certification Pix 1', 'Outils mathematiques et informatiques', NULL, NULL),
('MAI21', 'Algèbre ', 'Outils mathematiques et informatiques', NULL, NULL),
('MAI23', 'Certification PIX 2', 'Outils mathematiques et informatiques', NULL, NULL),
('SYR11', 'Bases d\'informatique', 'Systémes et réseaux', NULL, NULL),
('SYR12', 'Concepts de base des réseaux informatiques', 'Systémes et réseaux', NULL, NULL),
('SYR21', 'Système logique', 'Systémes et réseaux', NULL, NULL),
('SYR22', 'SE Windows Server', 'Systémes et réseaux', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `point`
--

CREATE TABLE `point` (
  `codematieres` varchar(5) DEFAULT NULL,
  `pointsfort` varchar(200) DEFAULT NULL,
  `pointsfaible` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `point`
--

INSERT INTO `point` (`codematieres`, `pointsfort`, `pointsfaible`) VALUES
('DEV21', 'les td et le tp', 'poussière chose'),
('DEV21', '  .,,rg', 'ef'),
('DEV21', 'dfghjk', 'sdfghj'),
('DEV22', 'je crois que cet matiere est bein', 'les TD'),
('DEV22', 'tres bien', 'methode '),
('DEV22', 'le prof est grand', 'le prof est ...'),
('DEV22', 'les td ', 'rien'),
('DEV22', 'explication', 'methode de memoirisation'),
('DEV22', 'rien', 'tous'),
('DEV22', ' ', 'Les CM'),
('DEV22', 'tous les points', 'pas de points faibles'),
('DEV22', 'les CM', 'tois les points'),
('DEV22', 'pas de points forts', '...'),
('DEV22', 'j aime cet matiere', 'les cours sont cathastrophique'),
('DEV22', 'les TP', 'Les TP'),
('DEV22', 'ciantiphique', 'temps '),
('DEV22', 'le prof connetre bien le programme', 'il ya plusieure point faible');

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `numquestion` int(5) NOT NULL,
  `question` varchar(300) DEFAULT NULL,
  `numaxe` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`numquestion`, `question`, `numaxe`) VALUES
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
(12, 'L’enseignant semble socieux d`améliorer son cours ', 4);

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `id` int(5) NOT NULL,
  `numreponse` int(2) DEFAULT NULL,
  `matricule` int(5) DEFAULT NULL,
  `scores` int(1) DEFAULT NULL,
  `numquestion` int(5) DEFAULT NULL,
  `codematieres` varchar(30) DEFAULT NULL,
  `numaxe` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`id`, `numreponse`, `matricule`, `scores`, `numquestion`, `codematieres`, `numaxe`) VALUES
(1, 1, 21038, 3, 1, 'DEV12', 1),
(2, 1, 21038, 3, 2, 'DEV12', 1),
(3, 1, 21038, 3, 3, 'DEV12', 1),
(4, 1, 21038, 3, 4, 'DEV12', 2),
(5, 1, 21038, 3, 5, 'DEV12', 2),
(6, 1, 21038, 3, 6, 'DEV12', 2),
(7, 1, 21038, 3, 7, 'DEV12', 3),
(8, 1, 21038, 3, 8, 'DEV12', 3),
(9, 1, 21038, 3, 9, 'DEV12', 3),
(10, 1, 21038, 3, 10, 'DEV12', 4),
(11, 1, 21038, 3, 11, 'DEV12', 4),
(12, 1, 21038, 3, 12, 'DEV12', 4),
(13, 2, 21038, 2, 1, 'DEV22', 1),
(14, 3, 21038, 1, 2, 'DEV22', 1),
(15, 4, 21038, 0, 3, 'DEV22', 1),
(16, 3, 21038, 1, 4, 'DEV22', 2),
(17, 3, 21038, 1, 5, 'DEV22', 2),
(18, 1, 21038, 3, 6, 'DEV22', 2),
(19, 4, 21038, 0, 7, 'DEV22', 3),
(20, 4, 21038, 0, 8, 'DEV22', 3),
(21, 2, 21038, 2, 9, 'DEV22', 3),
(22, 1, 21038, 3, 10, 'DEV22', 4),
(23, 3, 21038, 1, 11, 'DEV22', 4),
(24, 3, 21038, 1, 12, 'DEV22', 4),
(25, 2, 21038, 2, 1, 'DEV13', 1),
(26, 4, 21038, 0, 2, 'DEV13', 1),
(27, 1, 21038, 3, 3, 'DEV13', 1),
(28, 4, 21038, 0, 4, 'DEV13', 2),
(29, 4, 21038, 0, 5, 'DEV13', 2),
(30, 1, 21038, 3, 6, 'DEV13', 2),
(31, 4, 21038, 0, 7, 'DEV13', 3),
(32, 4, 21038, 0, 8, 'DEV13', 3),
(33, 1, 21038, 3, 9, 'DEV13', 3),
(34, 1, 21038, 3, 10, 'DEV13', 4),
(35, 3, 21038, 1, 11, 'DEV13', 4),
(36, 1, 21038, 3, 12, 'DEV13', 4),
(37, 1, 21038, 3, 1, 'DPR11', 1),
(38, 1, 21038, 3, 2, 'DPR11', 1),
(39, 1, 21038, 3, 3, 'DPR11', 1),
(40, 2, 21038, 2, 4, 'DPR11', 2),
(41, 2, 21038, 2, 5, 'DPR11', 2),
(42, 2, 21038, 2, 6, 'DPR11', 2),
(43, 3, 21038, 1, 7, 'DPR11', 3),
(44, 3, 21038, 1, 8, 'DPR11', 3),
(45, 3, 21038, 1, 9, 'DPR11', 3),
(46, 4, 21038, 0, 10, 'DPR11', 4),
(47, 4, 21038, 0, 11, 'DPR11', 4),
(48, 4, 21038, 0, 12, 'DPR11', 4),
(49, 3, 21056, 1, 1, 'DEV21', NULL),
(50, 2, 21056, 2, 2, 'DEV21', NULL),
(51, 1, 21056, 3, 3, 'DEV21', NULL),
(52, 3, 21056, 1, 4, 'DEV21', NULL),
(53, 4, 21056, 0, 5, 'DEV21', NULL),
(54, 1, 21056, 3, 6, 'DEV21', NULL),
(55, 1, 21056, 3, 7, 'DEV21', NULL),
(56, 4, 21056, 0, 8, 'DEV21', NULL),
(57, 3, 21056, 1, 9, 'DEV21', NULL),
(58, 1, 21056, 3, 10, 'DEV21', NULL),
(59, 2, 21056, 2, 11, 'DEV21', NULL),
(60, 4, 21056, 0, 12, 'DEV21', NULL),
(61, 1, 21056, 3, 1, 'DEV21', NULL),
(62, 1, 21056, 3, 2, 'DEV21', NULL),
(63, 1, 21056, 3, 3, 'DEV21', NULL),
(64, 1, 21056, 3, 4, 'DEV21', NULL),
(65, 1, 21056, 3, 5, 'DEV21', NULL),
(66, 1, 21056, 3, 6, 'DEV21', NULL),
(67, 1, 21056, 3, 7, 'DEV21', NULL),
(68, 1, 21056, 3, 8, 'DEV21', NULL),
(69, 1, 21056, 3, 9, 'DEV21', NULL),
(70, 1, 21056, 3, 10, 'DEV21', NULL),
(71, 1, 21056, 3, 11, 'DEV21', NULL),
(72, 1, 21056, 3, 12, 'DEV21', NULL),
(73, 2, 21056, 2, 1, 'DEV21', NULL),
(74, 3, 21056, 1, 2, 'DEV21', NULL),
(75, 1, 21056, 3, 3, 'DEV21', NULL),
(76, 1, 21056, 3, 4, 'DEV21', NULL),
(77, 3, 21056, 1, 5, 'DEV21', NULL),
(78, 1, 21056, 3, 6, 'DEV21', NULL),
(79, 1, 21056, 3, 7, 'DEV21', NULL),
(80, 3, 21056, 1, 8, 'DEV21', NULL),
(81, 4, 21056, 0, 9, 'DEV21', NULL),
(82, 3, 21056, 1, 10, 'DEV21', NULL),
(83, 1, 21056, 3, 11, 'DEV21', NULL),
(84, 4, 21056, 0, 12, 'DEV21', NULL),
(85, 1, 21056, 3, 1, 'DEV21', NULL),
(86, 1, 21056, 3, 2, 'DEV21', NULL),
(87, 1, 21056, 3, 3, 'DEV21', NULL),
(88, 1, 21056, 3, 4, 'DEV21', NULL),
(89, 1, 21056, 3, 5, 'DEV21', NULL),
(90, 1, 21056, 3, 6, 'DEV21', NULL),
(91, 1, 21056, 3, 7, 'DEV21', NULL),
(92, 1, 21056, 3, 8, 'DEV21', NULL),
(93, 1, 21056, 3, 9, 'DEV21', NULL),
(94, 1, 21056, 3, 10, 'DEV21', NULL),
(95, 1, 21056, 3, 11, 'DEV21', NULL),
(96, 1, 21056, 3, 12, 'DEV21', NULL);

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
(1, 'user', 'bouchra', 'mocktar', '21056@supnum.mr', '25d55ad283aa400af464c76d713c07ad', '0', 'Verified'),
(2, 'admin', 'bah', 'moussa', 'moussa.ba@supnum.mr', 'fe008700f25cb28940ca8ed91b23b354', '0', 'Verified'),
(3, 'user', 'elvaghih', 'ahmed', '21038@supnum.mr', '33a8916cf71084322965874bc281c75a', '0', 'Verified');

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
(1, '21001@supnum.mr', 'user'),
(2, '21002@supnum.mr', 'user'),
(3, '21003@supnum.mr', 'user'),
(4, '21004@supnum.mr', 'user'),
(5, '21005@supnum.mr', 'user'),
(6, '21006@supnum.mr', 'user'),
(7, '21007@supnum.mr', 'user'),
(8, '21008@supnum.mr', 'user'),
(9, '21009@supnum.mr', 'user'),
(10, '21010@supnum.mr', 'user'),
(11, '21011@supnum.mr', 'user'),
(12, '21012@supnum.mr', 'user'),
(13, '21013@supnum.mr', 'user'),
(14, '21014@supnum.mr', 'user'),
(15, '21015@supnum.mr', 'user'),
(16, '21016@supnum.mr', 'user'),
(17, '21017@supnum.mr', 'user'),
(18, '21018@supnum.mr', 'user'),
(19, '21019@supnum.mr', 'user'),
(20, '21020@supnum.mr', 'user'),
(21, '21021@supnum.mr', 'user'),
(22, '21022@supnum.mr', 'user'),
(23, '21023@supnum.mr', 'user'),
(24, '21024@supnum.mr', 'user'),
(25, '21025@supnum.mr', 'user'),
(26, '21026@supnum.mr', 'user'),
(27, '21027@supnum.mr', 'user'),
(28, '21028@supnum.mr', 'user'),
(29, '21029@supnum.mr', 'user'),
(30, '21030@supnum.mr', 'user'),
(31, '21031@supnum.mr', 'user'),
(32, '21032@supnum.mr', 'user'),
(33, '21033@supnum.mr', 'user'),
(34, '21034@supnum.mr', 'user'),
(35, '21035@supnum.mr', 'user'),
(36, '21036@supnum.mr', 'user'),
(37, '21037@supnum.mr', 'user'),
(38, '21038@supnum.mr', 'user'),
(39, '21039@supnum.mr', 'user'),
(40, '21040supnum.mr', 'user'),
(41, '21041@supnum.mr', 'user'),
(42, '21042@supnum.mr', 'user'),
(43, '21043@supnum.mr', 'user'),
(44, '21044@supnum.mr', 'user'),
(45, '21045@supnum.mr', 'user'),
(46, '21046@supnum.mr', 'user'),
(47, '21047@supnum.mr', 'user'),
(48, '21048@supnum.mr', 'user'),
(49, '21049@supnum.mr', 'user'),
(50, '21050@supnum.mr', 'user'),
(51, '21051@supnum.mr', 'user'),
(52, '21052@supnum.mr', 'user'),
(53, '21053@supnum.mr', 'user'),
(54, '21054@supnum.mr', 'user'),
(55, '21055@supnum.mr', 'user'),
(56, '21056@supnum.mr', 'user'),
(57, '21057@supnum.mr', 'user'),
(58, '21058@supnum.mr', 'user'),
(59, '21059@supnum.mr', 'user'),
(60, '21060@supnum.mr', 'user'),
(61, '21061@supnum.mr', 'user'),
(62, '21062@supnum.mr', 'user'),
(63, '21063@supnum.mr', 'user'),
(64, '21064@supnum.mr', 'user'),
(65, '21065@supnum.mr', 'user'),
(66, '21066@supnum.mr', 'user'),
(67, '21067@supnum.mr', 'user'),
(68, '21068@supnum.mr', 'user'),
(69, '21069@supnum.mr', 'user'),
(70, '21070@supnum.mr', 'user'),
(71, '21071@supnum.mr', 'user'),
(72, '21072@supnum.mr', 'user'),
(73, '21073@supnum.mr', 'user'),
(74, '21074@supnum.mr', 'user'),
(75, '21075@supnum.mr', 'user');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_question`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `v_question` (
`numaxe` int(4)
,`nomaxe` varchar(100)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_reponse`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `v_reponse` (
`codematieres` varchar(7)
,`nommatieres` varchar(100)
,`module` varchar(100)
,`debut` date
,`fin` date
,`id` int(5)
,`numreponse` int(2)
,`matricule` int(5)
,`scores` int(1)
,`numquestion` int(5)
);

-- --------------------------------------------------------

--
-- Structure de la vue `v_question`
--
DROP TABLE IF EXISTS `v_question`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_question`  AS SELECT `axe`.`numaxe` AS `numaxe`, `axe`.`nomaxe` AS `nomaxe` FROM `axe``axe`  ;

-- --------------------------------------------------------

--
-- Structure de la vue `v_reponse`
--
DROP TABLE IF EXISTS `v_reponse`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_reponse`  AS SELECT `matieres`.`codematieres` AS `codematieres`, `matieres`.`nommatieres` AS `nommatieres`, `matieres`.`module` AS `module`, `matieres`.`debut` AS `debut`, `matieres`.`fin` AS `fin`, `reponse`.`id` AS `id`, `reponse`.`numreponse` AS `numreponse`, `reponse`.`matricule` AS `matricule`, `reponse`.`scores` AS `scores`, `reponse`.`numquestion` AS `numquestion` FROM (`matieres` left join `reponse` on(`matieres`.`codematieres` = `reponse`.`codematieres`))  ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `axe`
--
ALTER TABLE `axe`
  ADD PRIMARY KEY (`numaxe`);

--
-- Index pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`matricule`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD KEY `matricule` (`matricule`),
  ADD KEY `codematieres` (`codematieres`);

--
-- Index pour la table `matieres`
--
ALTER TABLE `matieres`
  ADD PRIMARY KEY (`codematieres`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`numquestion`),
  ADD KEY `numaxe` (`numaxe`);

--
-- Index pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matricule` (`matricule`),
  ADD KEY `codematieres` (`codematieres`),
  ADD KEY `numaxe` (`numaxe`),
  ADD KEY `numquestion` (`numquestion`);

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
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `inscription_ibfk_1` FOREIGN KEY (`matricule`) REFERENCES `etudiants` (`matricule`),
  ADD CONSTRAINT `inscription_ibfk_2` FOREIGN KEY (`codematieres`) REFERENCES `matieres` (`codematieres`);

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`numaxe`) REFERENCES `axe` (`numaxe`);

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `reponse_ibfk_1` FOREIGN KEY (`matricule`) REFERENCES `etudiants` (`matricule`),
  ADD CONSTRAINT `reponse_ibfk_2` FOREIGN KEY (`codematieres`) REFERENCES `matieres` (`codematieres`),
  ADD CONSTRAINT `reponse_ibfk_3` FOREIGN KEY (`numquestion`) REFERENCES `question` (`numquestion`),
  ADD CONSTRAINT `reponse_ibfk_4` FOREIGN KEY (`numaxe`) REFERENCES `axe` (`numaxe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
