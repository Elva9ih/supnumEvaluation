-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 04 jan. 2023 à 13:58
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
  `semestere` varchar(30) NOT NULL,
  `courant` tinyint(1) NOT NULL DEFAULT 0,
  `statut` int(1) NOT NULL DEFAULT 0 COMMENT '0=Pending,1=Start,2=Closed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `academic`
--

INSERT INTO `academic` (`id`, `anne`, `semestere`, `courant`, `statut`) VALUES
(1, '2023-2022', 'S3', 1, 1);

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
(6, 'Evaluation de Comp et Conn'),
(7, 'med');

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE `departement` (
  `id` int(30) NOT NULL,
  `code` text NOT NULL,
  `nom` text NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`id`, `code`, `nom`) VALUES
(1, 'DSI', 'Devellopement'),
(2, 'RSS', 'reseaux'),
(2, 'TC', 'Tronc Commun'),
(3, 'CNM', 'multimedia');

-- --------------------------------------------------------

--
-- Structure de la table `description`
--

CREATE TABLE `description` (
  `id` int(11) NOT NULL,
  `pointfort` varchar(300) DEFAULT NULL,
  `pointfaible` varchar(300) DEFAULT NULL,
  `connaissance` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `description`
--

INSERT INTO `description` (`id`, `pointfort`, `pointfaible`, `connaissance`) VALUES
(1, 'qwertyuio', 'sdfghjkl', 'sdfghjkl'),
(2, 'sdfghj', 'dxcfgvbhj', 'xtrcytvubinom'),
(3, 'sdfghj', 'dxcfgvbhj', 'xtrcytvubinom'),
(4, 'szfdgchjb', 'zretfykl', 'dxfcghbjkm'),
(5, 'dxfcgvh', 'xryctvui', 'serdtfyghi'),
(6, 'sdfgh', 'rdcfvbghj', 'tcfyvgubhnj'),
(7, 'dtcfgvybhinj', 'rtfyguhinj', 'rygvbhjn'),
(8, 'dfghj', 'ftgyhuji', 'drftgyhuj'),
(9, 'dfghj', 'ftgyhuji', 'drftgyhuj'),
(10, 'dfghj', 'ftgyhuji', 'drftgyhuj'),
(11, 'dfghj', 'ftgyhuji', 'drftgyhuj'),
(12, 'dfghj', 'ftgyhuji', 'drftgyhuj'),
(13, 'dfghj', 'ftgyhuji', 'drftgyhuj'),
(14, 'dfghj', 'ftgyhuji', 'drftgyhuj'),
(15, 'dfgjh', 'sedrfgyui', 'sedrftgyui'),
(16, 'dfgjh', 'sedrfgyui', 'sedrftgyui'),
(17, 'qwertyu', 'sdfghjk', 'sdfghjkl'),
(18, 'hfgdcsx', 'ngbvcx', 'm hngbfvc');

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
  `academic_id` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`id`, `matricule`, `prenom`, `nom`, `dep_id`, `academic_id`) VALUES
(1, 21056, 'mohamed', 'Ejlal', 1, 1),
(2, 21018, 'meliketn', 'mohamedou', 1, 1);

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

--
-- Déchargement des données de la table `evaluation`
--

INSERT INTO `evaluation` (`id`, `academic_id`, `dep_id`, `id_mat`, `debut`, `fin`) VALUES
(35, 1, 1, 1, '2023-01-04', '2023-01-06'),
(38, 1, 1, 14, '2023-01-05', '2023-01-07'),
(39, 1, 1, 5, '2023-01-04', '2023-01-06'),
(40, 1, 1, 13, '2023-01-02', '2023-01-05');

-- --------------------------------------------------------

--
-- Structure de la table `matieres`
--

CREATE TABLE `matieres` (
  `id` int(30) NOT NULL,
  `codematieres` varchar(7) NOT NULL,
  `nommatieres` varchar(100) DEFAULT NULL,
  `module` varchar(100) DEFAULT NULL,
  `semester` varchar(2) DEFAULT NULL,
  `id_dep` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `matieres`
--

INSERT INTO `matieres` (`id`, `codematieres`, `nommatieres`, `module`, `semester`, `id_dep`) VALUES
(1, 'MAI22', 'Probalité et statistiques ', 'Outils mathematiques et informatiques', 'S2', 1),
(2, 'MAI22', 'Probalité et statistiques ', 'Outils mathematiques et informatiques', 'S2', 1),
(3, 'DEV21', 'Programmation Python', 'Programmation et développement','S2', 2),
(4, 'DEV22', 'Langages web', 'Programmation et développement','S2', 3),
(5, 'DPR21', 'Communication', 'Développement personnel', 'S2', 1),
(6, 'DPR22', 'Anglais', 'Développement personnel', 'S2', 2),
(7, 'DPR23', 'PPP1', 'Développement personnel','S2', 3),
(8, 'DSI21', 'SGBD 1 (MySQL)/LAN/CMS et PAO', 'Spécialité', 'S2', 1),
(9, 'DSI22', 'PI DEV/SR/Multumedia', 'Spécialité', 'S2', 3),
(10, 'MAI21', 'Algèbre ', 'Outils mathematiques et informatiques', 'S2', 2),
(11, 'MAI22', 'Probalité et statistique', 'Outils mathematiques et informatiques', 'S2', 1),
(12, 'MAI23', 'Certification PIX 2', 'Outils mathematiques et informatiques', 'S2', 2),
(13, 'MAI31', 'devops', 'Programmation et développement', 'S3', 1),
(14, 'SYR21', 'SE Windows Server', 'Systémes et réseaux','S2', 1),
(15, 'SYR22', 'SE Windows Server', 'Systémes et réseaux', 'S2', 3);

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `id` int(30) NOT NULL,
  `numquestion` int(5) NOT NULL,
  `question` varchar(300) DEFAULT NULL,
  `id_axe` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id`, `numquestion`, `question`, `id_axe`) VALUES
(1, 1, 'Le cours est bien équilibré entre éléments de théorie, exemples et applications.', 1),
(2, 2, 'Le déroulement des cours, TD, TP refléte la difficulté et l’importance des sujets traités.', 1),
(3, 3, 'Le volume horaire refléte l’importance de la matiére.', 1),
(4, 4, 'Le contenu du cours est satisfaisant pour mon orientation professionnelle.', 2),
(5, 5, 'J’ai compris les objectifs et l’importance de ce cours.', 2),
(6, 6, 'Les ressources nécessaires me semblent appropriées et disponibles.', 2),
(7, 7, 'J’ai compris quels sont les criteres et directives de ces activites.', 3),
(8, 8, 'Je sais quels sont les objectifs evalues par ces activites', 3),
(9, 9, 'Ces activités me permettent de vérifier ma progression', 3),
(10, 10, 'L’enseignant présente la matiére de façon claire et structurée.', 4),
(11, 11, 'L’enseignant est suffisamment disponible.', 4),
(12, 12, 'L’enseignant semble socieux d`améliorer son cours ', 4),
(13, 13, 'Les activités proposées pendant le cours ont nécessité votre participation active.', 5),
(14, 14, 'Le groupe était dynamique et participait volontiers aux activités, répondait aux questions.', 5),
(15, 15, 'Les méthodes d\'enseignement vous ont permis d\'acquérir les compétences visées', 5),
(16, 16, 'Les modalité d\'évaluation ont été clairement présentées.', 6),
(17, 17, 'Les consignes pour la réalisation des travaux de l\'évaluation des compétences étaient claires', 6),
(18, 18, 'Des retours utiles ont été faits à propos des travaux et examens', 6),
(19, 0, 'hhhhhhhhhhhhhhhhhhhh', 7),
(21, 0, 'qwertyuiopsdfghjkldfghyujik', 7);

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `id` int(30) NOT NULL,
  `id_etud` int(30) DEFAULT NULL,
  `id_question` int(30) NOT NULL,
  `id_evalu` int(30) DEFAULT NULL,
  `score` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`id`, `id_etud`, `id_question`, `id_evalu`, `score`) VALUES
(308, 1, 1, 16, 1),
(309, 1, 2, 16, 3),
(310, 1, 3, 16, 1),
(311, 1, 4, 16, 1),
(312, 1, 5, 16, 0),
(313, 1, 6, 16, 3),
(314, 1, 7, 16, 0),
(315, 1, 8, 16, 1),
(316, 1, 9, 16, 3),
(317, 1, 10, 16, 1),
(318, 1, 11, 16, 3),
(319, 1, 12, 16, 0),
(320, 1, 13, 16, 0),
(321, 1, 14, 16, 1),
(322, 1, 15, 16, 3),
(323, 1, 16, 16, 3),
(324, 1, 17, 16, 1),
(325, 1, 18, 16, 3),
(326, 1, 1, 17, 1),
(327, 1, 2, 17, 3),
(328, 1, 3, 17, 1),
(329, 1, 4, 17, 3),
(330, 1, 5, 17, 0),
(331, 1, 6, 17, 3),
(332, 1, 7, 17, 3),
(333, 1, 8, 17, 1),
(334, 1, 9, 17, 3),
(335, 1, 10, 17, 3),
(336, 1, 11, 17, 1),
(337, 1, 12, 17, 3),
(338, 1, 13, 17, 0),
(339, 1, 14, 17, 3),
(340, 1, 15, 17, 0),
(341, 1, 16, 17, 3),
(342, 1, 17, 17, 0),
(343, 1, 18, 17, 3),
(344, 1, 1, 19, 1),
(345, 1, 2, 19, 3),
(346, 1, 3, 19, 1),
(347, 1, 4, 19, 3),
(348, 1, 5, 19, 1),
(349, 1, 6, 19, 3),
(350, 1, 7, 19, 1),
(351, 1, 8, 19, 1),
(352, 1, 9, 19, 3),
(353, 1, 10, 19, 0),
(354, 1, 11, 19, 3),
(355, 1, 12, 19, 1),
(356, 1, 13, 19, 1),
(357, 1, 14, 19, 1),
(358, 1, 15, 19, 3),
(359, 1, 16, 19, 1),
(360, 1, 17, 19, 3),
(361, 1, 18, 19, 0),
(362, 1, 1, 20, 2),
(363, 1, 2, 20, 3),
(364, 1, 3, 20, 1),
(365, 1, 4, 20, 1),
(366, 1, 5, 20, 3),
(367, 1, 6, 20, 2),
(368, 1, 7, 20, 3),
(369, 1, 8, 20, 1),
(370, 1, 9, 20, 3),
(371, 1, 10, 20, 3),
(372, 1, 11, 20, 3),
(373, 1, 12, 20, 3),
(374, 1, 13, 20, 3),
(375, 1, 14, 20, 3),
(376, 1, 15, 20, 3),
(377, 1, 16, 20, 3),
(378, 1, 17, 20, 3),
(379, 1, 18, 20, 3),
(380, 1, 1, 27, 3),
(381, 1, 2, 27, 1),
(382, 1, 3, 27, 3),
(383, 1, 4, 27, 1),
(384, 1, 5, 27, 3),
(385, 1, 6, 27, 1),
(386, 1, 7, 27, 0),
(387, 1, 8, 27, 3),
(388, 1, 9, 27, 2),
(389, 1, 10, 27, 3),
(390, 1, 11, 27, 2),
(391, 1, 12, 27, 1),
(392, 1, 13, 27, 0),
(393, 1, 14, 27, 0),
(394, 1, 15, 27, 3),
(395, 1, 16, 27, 3),
(396, 1, 17, 27, 1),
(397, 1, 18, 27, 0),
(398, 1, 19, 27, 0),
(399, 1, 20, 27, 1),
(400, 1, 1, 28, 1),
(401, 1, 2, 28, 3),
(402, 1, 3, 28, 3),
(403, 1, 4, 28, 3),
(404, 1, 5, 28, 3),
(405, 1, 6, 28, 3),
(406, 1, 7, 28, 3),
(407, 1, 8, 28, 3),
(408, 1, 9, 28, 3),
(409, 1, 10, 28, 3),
(410, 1, 11, 28, 3),
(411, 1, 12, 28, 3),
(412, 1, 13, 28, 3),
(413, 1, 14, 28, 3),
(414, 1, 15, 28, 3),
(415, 1, 16, 28, 3),
(416, 1, 17, 28, 3),
(417, 1, 18, 28, 3),
(418, 1, 19, 28, 3),
(419, 1, 20, 28, 3),
(420, 1, 1, 29, 3),
(421, 1, 2, 29, 3),
(422, 1, 3, 29, 3),
(423, 1, 4, 29, 3),
(424, 1, 5, 29, 3),
(425, 1, 6, 29, 3),
(426, 1, 7, 29, 3),
(427, 1, 8, 29, 3),
(428, 1, 9, 29, 3),
(429, 1, 10, 29, 3),
(430, 1, 11, 29, 3),
(431, 1, 12, 29, 3),
(432, 1, 13, 29, 3),
(433, 1, 14, 29, 3),
(434, 1, 15, 29, 3),
(435, 1, 16, 29, 3),
(436, 1, 17, 29, 3),
(437, 1, 18, 29, 3),
(438, 1, 19, 29, 3),
(439, 1, 20, 29, 3),
(440, 1, 1, 29, 3),
(441, 1, 2, 29, 3),
(442, 1, 3, 29, 3),
(443, 1, 4, 29, 3),
(444, 1, 5, 29, 3),
(445, 1, 6, 29, 3),
(446, 1, 7, 29, 3),
(447, 1, 8, 29, 3),
(448, 1, 9, 29, 3),
(449, 1, 10, 29, 3),
(450, 1, 11, 29, 3),
(451, 1, 12, 29, 3),
(452, 1, 13, 29, 3),
(453, 1, 14, 29, 3),
(454, 1, 15, 29, 3),
(455, 1, 16, 29, 3),
(456, 1, 17, 29, 3),
(457, 1, 18, 29, 3),
(458, 1, 19, 29, 3),
(459, 1, 20, 29, 3),
(460, 1, 1, 29, 3),
(461, 1, 2, 29, 3),
(462, 1, 3, 29, 3),
(463, 1, 4, 29, 3),
(464, 1, 5, 29, 3),
(465, 1, 6, 29, 3),
(466, 1, 7, 29, 3),
(467, 1, 8, 29, 3),
(468, 1, 9, 29, 3),
(469, 1, 10, 29, 3),
(470, 1, 11, 29, 3),
(471, 1, 12, 29, 3),
(472, 1, 13, 29, 3),
(473, 1, 14, 29, 3),
(474, 1, 15, 29, 3),
(475, 1, 16, 29, 3),
(476, 1, 17, 29, 3),
(477, 1, 18, 29, 3),
(478, 1, 19, 29, 3),
(479, 1, 20, 29, 3),
(480, 1, 1, 29, 3),
(481, 1, 2, 29, 3),
(482, 1, 3, 29, 3),
(483, 1, 4, 29, 3),
(484, 1, 5, 29, 3),
(485, 1, 6, 29, 3),
(486, 1, 7, 29, 3),
(487, 1, 8, 29, 3),
(488, 1, 9, 29, 3),
(489, 1, 10, 29, 3),
(490, 1, 11, 29, 3),
(491, 1, 12, 29, 3),
(492, 1, 13, 29, 3),
(493, 1, 14, 29, 3),
(494, 1, 15, 29, 3),
(495, 1, 16, 29, 3),
(496, 1, 17, 29, 3),
(497, 1, 18, 29, 3),
(498, 1, 19, 29, 3),
(499, 1, 20, 29, 3),
(500, 1, 1, 29, 3),
(501, 1, 2, 29, 3),
(502, 1, 3, 29, 3),
(503, 1, 4, 29, 3),
(504, 1, 5, 29, 3),
(505, 1, 6, 29, 3),
(506, 1, 7, 29, 3),
(507, 1, 8, 29, 3),
(508, 1, 9, 29, 3),
(509, 1, 10, 29, 3),
(510, 1, 11, 29, 3),
(511, 1, 12, 29, 3),
(512, 1, 13, 29, 3),
(513, 1, 14, 29, 3),
(514, 1, 15, 29, 3),
(515, 1, 16, 29, 3),
(516, 1, 17, 29, 3),
(517, 1, 18, 29, 3),
(518, 1, 19, 29, 3),
(519, 1, 20, 29, 3),
(520, 1, 1, 29, 3),
(521, 1, 2, 29, 3),
(522, 1, 3, 29, 3),
(523, 1, 4, 29, 3),
(524, 1, 5, 29, 3),
(525, 1, 6, 29, 3),
(526, 1, 7, 29, 3),
(527, 1, 8, 29, 3),
(528, 1, 9, 29, 3),
(529, 1, 10, 29, 3),
(530, 1, 11, 29, 3),
(531, 1, 12, 29, 3),
(532, 1, 13, 29, 3),
(533, 1, 14, 29, 3),
(534, 1, 15, 29, 3),
(535, 1, 16, 29, 3),
(536, 1, 17, 29, 3),
(537, 1, 18, 29, 3),
(538, 1, 19, 29, 3),
(539, 1, 20, 29, 3),
(540, 1, 1, 29, 3),
(541, 1, 2, 29, 3),
(542, 1, 3, 29, 3),
(543, 1, 4, 29, 3),
(544, 1, 5, 29, 3),
(545, 1, 6, 29, 3),
(546, 1, 7, 29, 3),
(547, 1, 8, 29, 3),
(548, 1, 9, 29, 3),
(549, 1, 10, 29, 3),
(550, 1, 11, 29, 3),
(551, 1, 12, 29, 3),
(552, 1, 13, 29, 3),
(553, 1, 14, 29, 3),
(554, 1, 15, 29, 3),
(555, 1, 16, 29, 3),
(556, 1, 17, 29, 3),
(557, 1, 18, 29, 3),
(558, 1, 19, 29, 3),
(559, 1, 20, 29, 3),
(560, 1, 1, 29, 3),
(561, 1, 2, 29, 3),
(562, 1, 3, 29, 3),
(563, 1, 4, 29, 3),
(564, 1, 5, 29, 3),
(565, 1, 6, 29, 3),
(566, 1, 7, 29, 3),
(567, 1, 8, 29, 3),
(568, 1, 9, 29, 3),
(569, 1, 10, 29, 3),
(570, 1, 11, 29, 3),
(571, 1, 12, 29, 3),
(572, 1, 13, 29, 3),
(573, 1, 14, 29, 3),
(574, 1, 15, 29, 3),
(575, 1, 16, 29, 3),
(576, 1, 17, 29, 3),
(577, 1, 18, 29, 3),
(578, 1, 19, 29, 3),
(579, 1, 20, 29, 3),
(580, 1, 1, 29, 3),
(581, 1, 2, 29, 3),
(582, 1, 3, 29, 3),
(583, 1, 4, 29, 3),
(584, 1, 5, 29, 3),
(585, 1, 6, 29, 3),
(586, 1, 7, 29, 3),
(587, 1, 8, 29, 3),
(588, 1, 9, 29, 3),
(589, 1, 10, 29, 3),
(590, 1, 11, 29, 3),
(591, 1, 12, 29, 3),
(592, 1, 13, 29, 3),
(593, 1, 14, 29, 3),
(594, 1, 15, 29, 3),
(595, 1, 16, 29, 3),
(596, 1, 17, 29, 3),
(597, 1, 18, 29, 3),
(598, 1, 19, 29, 3),
(599, 1, 20, 29, 3),
(600, 1, 1, 29, 3),
(601, 1, 2, 29, 3),
(602, 1, 3, 29, 3),
(603, 1, 4, 29, 3),
(604, 1, 5, 29, 3),
(605, 1, 6, 29, 3),
(606, 1, 7, 29, 3),
(607, 1, 8, 29, 3),
(608, 1, 9, 29, 3),
(609, 1, 10, 29, 3),
(610, 1, 11, 29, 3),
(611, 1, 12, 29, 3),
(612, 1, 13, 29, 3),
(613, 1, 14, 29, 3),
(614, 1, 15, 29, 3),
(615, 1, 16, 29, 3),
(616, 1, 17, 29, 3),
(617, 1, 18, 29, 3),
(618, 1, 19, 29, 3),
(619, 1, 20, 29, 3),
(620, 1, 1, 29, 3),
(621, 1, 2, 29, 3),
(622, 1, 3, 29, 3),
(623, 1, 4, 29, 3),
(624, 1, 5, 29, 3),
(625, 1, 6, 29, 3),
(626, 1, 7, 29, 3),
(627, 1, 8, 29, 3),
(628, 1, 9, 29, 3),
(629, 1, 10, 29, 3),
(630, 1, 11, 29, 3),
(631, 1, 12, 29, 3),
(632, 1, 13, 29, 3),
(633, 1, 14, 29, 3),
(634, 1, 15, 29, 3),
(635, 1, 16, 29, 3),
(636, 1, 17, 29, 3),
(637, 1, 18, 29, 3),
(638, 1, 19, 29, 3),
(639, 1, 20, 29, 3),
(640, 1, 1, 29, 3),
(641, 1, 2, 29, 3),
(642, 1, 3, 29, 3),
(643, 1, 4, 29, 3),
(644, 1, 5, 29, 3),
(645, 1, 6, 29, 3),
(646, 1, 7, 29, 3),
(647, 1, 8, 29, 3),
(648, 1, 9, 29, 3),
(649, 1, 10, 29, 3),
(650, 1, 11, 29, 3),
(651, 1, 12, 29, 3),
(652, 1, 13, 29, 3),
(653, 1, 14, 29, 3),
(654, 1, 15, 29, 3),
(655, 1, 16, 29, 3),
(656, 1, 17, 29, 3),
(657, 1, 18, 29, 3),
(658, 1, 19, 29, 3),
(659, 1, 20, 29, 3),
(660, 1, 1, 29, 3),
(661, 1, 2, 29, 3),
(662, 1, 3, 29, 3),
(663, 1, 4, 29, 3),
(664, 1, 5, 29, 3),
(665, 1, 6, 29, 3),
(666, 1, 7, 29, 3),
(667, 1, 8, 29, 3),
(668, 1, 9, 29, 3),
(669, 1, 10, 29, 3),
(670, 1, 11, 29, 3),
(671, 1, 12, 29, 3),
(672, 1, 13, 29, 3),
(673, 1, 14, 29, 3),
(674, 1, 15, 29, 3),
(675, 1, 16, 29, 3),
(676, 1, 17, 29, 3),
(677, 1, 18, 29, 3),
(678, 1, 19, 29, 3),
(679, 1, 20, 29, 3),
(680, 1, 1, 29, 3),
(681, 1, 2, 29, 3),
(682, 1, 3, 29, 3),
(683, 1, 4, 29, 3),
(684, 1, 5, 29, 3),
(685, 1, 6, 29, 3),
(686, 1, 7, 29, 3),
(687, 1, 8, 29, 3),
(688, 1, 9, 29, 3),
(689, 1, 10, 29, 3),
(690, 1, 11, 29, 3),
(691, 1, 12, 29, 3),
(692, 1, 13, 29, 3),
(693, 1, 14, 29, 3),
(694, 1, 15, 29, 3),
(695, 1, 16, 29, 3),
(696, 1, 17, 29, 3),
(697, 1, 18, 29, 3),
(698, 1, 19, 29, 3),
(699, 1, 20, 29, 3),
(700, 1, 1, 29, 3),
(701, 1, 2, 29, 3),
(702, 1, 3, 29, 3),
(703, 1, 4, 29, 3),
(704, 1, 5, 29, 3),
(705, 1, 6, 29, 3),
(706, 1, 7, 29, 3),
(707, 1, 8, 29, 3),
(708, 1, 9, 29, 3),
(709, 1, 10, 29, 3),
(710, 1, 11, 29, 3),
(711, 1, 12, 29, 3),
(712, 1, 13, 29, 3),
(713, 1, 14, 29, 3),
(714, 1, 15, 29, 3),
(715, 1, 16, 29, 3),
(716, 1, 17, 29, 3),
(717, 1, 18, 29, 3),
(718, 1, 19, 29, 3),
(719, 1, 20, 29, 3),
(720, 1, 1, 29, 3),
(721, 1, 2, 29, 3),
(722, 1, 3, 29, 3),
(723, 1, 4, 29, 3),
(724, 1, 5, 29, 3),
(725, 1, 6, 29, 3),
(726, 1, 7, 29, 3),
(727, 1, 8, 29, 3),
(728, 1, 9, 29, 3),
(729, 1, 10, 29, 3),
(730, 1, 11, 29, 3),
(731, 1, 12, 29, 3),
(732, 1, 13, 29, 3),
(733, 1, 14, 29, 3),
(734, 1, 15, 29, 3),
(735, 1, 16, 29, 3),
(736, 1, 17, 29, 3),
(737, 1, 18, 29, 3),
(738, 1, 19, 29, 3),
(739, 1, 20, 29, 3),
(740, 1, 1, 29, 3),
(741, 1, 2, 29, 3),
(742, 1, 3, 29, 3),
(743, 1, 4, 29, 3),
(744, 1, 5, 29, 3),
(745, 1, 6, 29, 3),
(746, 1, 7, 29, 3),
(747, 1, 8, 29, 3),
(748, 1, 9, 29, 3),
(749, 1, 10, 29, 3),
(750, 1, 11, 29, 3),
(751, 1, 12, 29, 3),
(752, 1, 13, 29, 3),
(753, 1, 14, 29, 3),
(754, 1, 15, 29, 3),
(755, 1, 16, 29, 3),
(756, 1, 17, 29, 3),
(757, 1, 18, 29, 3),
(758, 1, 19, 29, 3),
(759, 1, 20, 29, 3),
(760, 1, 1, 29, 3),
(761, 1, 2, 29, 3),
(762, 1, 3, 29, 3),
(763, 1, 4, 29, 3),
(764, 1, 5, 29, 3),
(765, 1, 6, 29, 3),
(766, 1, 7, 29, 3),
(767, 1, 8, 29, 3),
(768, 1, 9, 29, 3),
(769, 1, 10, 29, 3),
(770, 1, 11, 29, 3),
(771, 1, 12, 29, 3),
(772, 1, 13, 29, 3),
(773, 1, 14, 29, 3),
(774, 1, 15, 29, 3),
(775, 1, 16, 29, 3),
(776, 1, 17, 29, 3),
(777, 1, 18, 29, 3),
(778, 1, 19, 29, 3),
(779, 1, 20, 29, 3),
(780, 1, 1, 29, 3),
(781, 1, 2, 29, 3),
(782, 1, 3, 29, 3),
(783, 1, 4, 29, 3),
(784, 1, 5, 29, 3),
(785, 1, 6, 29, 3),
(786, 1, 7, 29, 3),
(787, 1, 8, 29, 3),
(788, 1, 9, 29, 3),
(789, 1, 10, 29, 3),
(790, 1, 11, 29, 3),
(791, 1, 12, 29, 3),
(792, 1, 13, 29, 3),
(793, 1, 14, 29, 3),
(794, 1, 15, 29, 3),
(795, 1, 16, 29, 3),
(796, 1, 17, 29, 3),
(797, 1, 18, 29, 3),
(798, 1, 19, 29, 3),
(799, 1, 20, 29, 3),
(800, 1, 1, 29, 3),
(801, 1, 2, 29, 3),
(802, 1, 3, 29, 3),
(803, 1, 4, 29, 3),
(804, 1, 5, 29, 3),
(805, 1, 6, 29, 3),
(806, 1, 7, 29, 3),
(807, 1, 8, 29, 3),
(808, 1, 9, 29, 3),
(809, 1, 10, 29, 3),
(810, 1, 11, 29, 3),
(811, 1, 12, 29, 3),
(812, 1, 13, 29, 3),
(813, 1, 14, 29, 3),
(814, 1, 15, 29, 3),
(815, 1, 16, 29, 3),
(816, 1, 17, 29, 3),
(817, 1, 18, 29, 3),
(818, 1, 19, 29, 3),
(819, 1, 20, 29, 3),
(820, 1, 1, 29, 3),
(821, 1, 2, 29, 3),
(822, 1, 3, 29, 3),
(823, 1, 4, 29, 3),
(824, 1, 5, 29, 3),
(825, 1, 6, 29, 3),
(826, 1, 7, 29, 3),
(827, 1, 8, 29, 3),
(828, 1, 9, 29, 3),
(829, 1, 10, 29, 3),
(830, 1, 11, 29, 3),
(831, 1, 12, 29, 3),
(832, 1, 13, 29, 3),
(833, 1, 14, 29, 3),
(834, 1, 15, 29, 3),
(835, 1, 16, 29, 3),
(836, 1, 17, 29, 3),
(837, 1, 18, 29, 3),
(838, 1, 19, 29, 3),
(839, 1, 20, 29, 3),
(840, 1, 1, 29, 3),
(841, 1, 2, 29, 3),
(842, 1, 3, 29, 3),
(843, 1, 4, 29, 3),
(844, 1, 5, 29, 3),
(845, 1, 6, 29, 3),
(846, 1, 7, 29, 3),
(847, 1, 8, 29, 3),
(848, 1, 9, 29, 3),
(849, 1, 10, 29, 3),
(850, 1, 11, 29, 3),
(851, 1, 12, 29, 3),
(852, 1, 13, 29, 3),
(853, 1, 14, 29, 3),
(854, 1, 15, 29, 3),
(855, 1, 16, 29, 3),
(856, 1, 17, 29, 3),
(857, 1, 18, 29, 3),
(858, 1, 19, 29, 3),
(859, 1, 20, 29, 3),
(860, 1, 1, 29, 3),
(861, 1, 2, 29, 3),
(862, 1, 3, 29, 3),
(863, 1, 4, 29, 3),
(864, 1, 5, 29, 3),
(865, 1, 6, 29, 3),
(866, 1, 7, 29, 3),
(867, 1, 8, 29, 3),
(868, 1, 9, 29, 3),
(869, 1, 10, 29, 3),
(870, 1, 11, 29, 3),
(871, 1, 12, 29, 3),
(872, 1, 13, 29, 3),
(873, 1, 14, 29, 3),
(874, 1, 15, 29, 3),
(875, 1, 16, 29, 3),
(876, 1, 17, 29, 3),
(877, 1, 18, 29, 3),
(878, 1, 19, 29, 3),
(879, 1, 20, 29, 3),
(880, 1, 1, 29, 3),
(881, 1, 2, 29, 3),
(882, 1, 3, 29, 3),
(883, 1, 4, 29, 3),
(884, 1, 5, 29, 3),
(885, 1, 6, 29, 3),
(886, 1, 7, 29, 3),
(887, 1, 8, 29, 3),
(888, 1, 9, 29, 3),
(889, 1, 10, 29, 3),
(890, 1, 11, 29, 3),
(891, 1, 12, 29, 3),
(892, 1, 13, 29, 3),
(893, 1, 14, 29, 3),
(894, 1, 15, 29, 3),
(895, 1, 16, 29, 3),
(896, 1, 17, 29, 3),
(897, 1, 18, 29, 3),
(898, 1, 19, 29, 3),
(899, 1, 20, 29, 3),
(900, 1, 1, 29, 3),
(901, 1, 2, 29, 3),
(902, 1, 3, 29, 3),
(903, 1, 4, 29, 3),
(904, 1, 5, 29, 3),
(905, 1, 6, 29, 3),
(906, 1, 7, 29, 3),
(907, 1, 8, 29, 3),
(908, 1, 9, 29, 3),
(909, 1, 10, 29, 3),
(910, 1, 11, 29, 3),
(911, 1, 12, 29, 3),
(912, 1, 13, 29, 3),
(913, 1, 14, 29, 3),
(914, 1, 15, 29, 3),
(915, 1, 16, 29, 3),
(916, 1, 17, 29, 3),
(917, 1, 18, 29, 3),
(918, 1, 19, 29, 3),
(919, 1, 20, 29, 3),
(920, 1, 1, 29, 3),
(921, 1, 2, 29, 3),
(922, 1, 3, 29, 3),
(923, 1, 4, 29, 3),
(924, 1, 5, 29, 3),
(925, 1, 6, 29, 3),
(926, 1, 7, 29, 3),
(927, 1, 8, 29, 3),
(928, 1, 9, 29, 3),
(929, 1, 10, 29, 3),
(930, 1, 11, 29, 3),
(931, 1, 12, 29, 3),
(932, 1, 13, 29, 3),
(933, 1, 14, 29, 3),
(934, 1, 15, 29, 3),
(935, 1, 16, 29, 3),
(936, 1, 17, 29, 3),
(937, 1, 18, 29, 3),
(938, 1, 19, 29, 3),
(939, 1, 20, 29, 3),
(940, 1, 1, 29, 3),
(941, 1, 2, 29, 3),
(942, 1, 3, 29, 3),
(943, 1, 4, 29, 3),
(944, 1, 5, 29, 3),
(945, 1, 6, 29, 3),
(946, 1, 7, 29, 3),
(947, 1, 8, 29, 3),
(948, 1, 9, 29, 3),
(949, 1, 10, 29, 3),
(950, 1, 11, 29, 3),
(951, 1, 12, 29, 3),
(952, 1, 13, 29, 3),
(953, 1, 14, 29, 3),
(954, 1, 15, 29, 3),
(955, 1, 16, 29, 3),
(956, 1, 17, 29, 3),
(957, 1, 18, 29, 3),
(958, 1, 19, 29, 3),
(959, 1, 20, 29, 3),
(960, 1, 1, 29, 3),
(961, 1, 2, 29, 3),
(962, 1, 3, 29, 3),
(963, 1, 4, 29, 3),
(964, 1, 5, 29, 3),
(965, 1, 6, 29, 3),
(966, 1, 7, 29, 3),
(967, 1, 8, 29, 3),
(968, 1, 9, 29, 3),
(969, 1, 10, 29, 3),
(970, 1, 11, 29, 3),
(971, 1, 12, 29, 3),
(972, 1, 13, 29, 3),
(973, 1, 14, 29, 3),
(974, 1, 15, 29, 3),
(975, 1, 16, 29, 3),
(976, 1, 17, 29, 3),
(977, 1, 18, 29, 3),
(978, 1, 19, 29, 3),
(979, 1, 20, 29, 3),
(980, 1, 1, 29, 3),
(981, 1, 2, 29, 3),
(982, 1, 3, 29, 3),
(983, 1, 4, 29, 3),
(984, 1, 5, 29, 3),
(985, 1, 6, 29, 3),
(986, 1, 7, 29, 3),
(987, 1, 8, 29, 3),
(988, 1, 9, 29, 3),
(989, 1, 10, 29, 3),
(990, 1, 11, 29, 3),
(991, 1, 12, 29, 3),
(992, 1, 13, 29, 3),
(993, 1, 14, 29, 3),
(994, 1, 15, 29, 3),
(995, 1, 16, 29, 3),
(996, 1, 17, 29, 3),
(997, 1, 18, 29, 3),
(998, 1, 19, 29, 3),
(999, 1, 20, 29, 3),
(1000, 1, 1, 29, 3),
(1001, 1, 2, 29, 3),
(1002, 1, 3, 29, 3),
(1003, 1, 4, 29, 3),
(1004, 1, 5, 29, 3),
(1005, 1, 6, 29, 3),
(1006, 1, 7, 29, 3),
(1007, 1, 8, 29, 3),
(1008, 1, 9, 29, 3),
(1009, 1, 10, 29, 3),
(1010, 1, 11, 29, 3),
(1011, 1, 12, 29, 3),
(1012, 1, 13, 29, 3),
(1013, 1, 14, 29, 3),
(1014, 1, 15, 29, 3),
(1015, 1, 16, 29, 3),
(1016, 1, 17, 29, 3),
(1017, 1, 18, 29, 3),
(1018, 1, 19, 29, 3),
(1019, 1, 20, 29, 3),
(1020, 1, 1, 29, 3),
(1021, 1, 2, 29, 3),
(1022, 1, 3, 29, 3),
(1023, 1, 4, 29, 3),
(1024, 1, 5, 29, 3),
(1025, 1, 6, 29, 3),
(1026, 1, 7, 29, 3),
(1027, 1, 8, 29, 3),
(1028, 1, 9, 29, 3),
(1029, 1, 10, 29, 3),
(1030, 1, 11, 29, 3),
(1031, 1, 12, 29, 3),
(1032, 1, 13, 29, 3),
(1033, 1, 14, 29, 3),
(1034, 1, 15, 29, 3),
(1035, 1, 16, 29, 3),
(1036, 1, 17, 29, 3),
(1037, 1, 18, 29, 3),
(1038, 1, 19, 29, 3),
(1039, 1, 20, 29, 3),
(1040, 1, 1, 29, 3),
(1041, 1, 2, 29, 3),
(1042, 1, 3, 29, 3),
(1043, 1, 4, 29, 3),
(1044, 1, 5, 29, 3),
(1045, 1, 6, 29, 3),
(1046, 1, 7, 29, 3),
(1047, 1, 8, 29, 3),
(1048, 1, 9, 29, 3),
(1049, 1, 10, 29, 3),
(1050, 1, 11, 29, 3),
(1051, 1, 12, 29, 3),
(1052, 1, 13, 29, 3),
(1053, 1, 14, 29, 3),
(1054, 1, 15, 29, 3),
(1055, 1, 16, 29, 3),
(1056, 1, 17, 29, 3),
(1057, 1, 18, 29, 3),
(1058, 1, 19, 29, 3),
(1059, 1, 20, 29, 3),
(1060, 1, 1, 29, 3),
(1061, 1, 2, 29, 3),
(1062, 1, 3, 29, 3),
(1063, 1, 4, 29, 3),
(1064, 1, 5, 29, 3),
(1065, 1, 6, 29, 3),
(1066, 1, 7, 29, 3),
(1067, 1, 8, 29, 3),
(1068, 1, 9, 29, 3),
(1069, 1, 10, 29, 3),
(1070, 1, 11, 29, 3),
(1071, 1, 12, 29, 3),
(1072, 1, 13, 29, 3),
(1073, 1, 14, 29, 3),
(1074, 1, 15, 29, 3),
(1075, 1, 16, 29, 3),
(1076, 1, 17, 29, 3),
(1077, 1, 18, 29, 3),
(1078, 1, 19, 29, 3),
(1079, 1, 20, 29, 3),
(1080, 1, 1, 29, 3),
(1081, 1, 2, 29, 3),
(1082, 1, 3, 29, 3),
(1083, 1, 4, 29, 3),
(1084, 1, 5, 29, 3),
(1085, 1, 6, 29, 3),
(1086, 1, 7, 29, 3),
(1087, 1, 8, 29, 3),
(1088, 1, 9, 29, 3),
(1089, 1, 10, 29, 3),
(1090, 1, 11, 29, 3),
(1091, 1, 12, 29, 3),
(1092, 1, 13, 29, 3),
(1093, 1, 14, 29, 3),
(1094, 1, 15, 29, 3),
(1095, 1, 16, 29, 3),
(1096, 1, 17, 29, 3),
(1097, 1, 18, 29, 3),
(1098, 1, 19, 29, 3),
(1099, 1, 20, 29, 3),
(1100, 1, 1, 29, 3),
(1101, 1, 2, 29, 3),
(1102, 1, 3, 29, 3),
(1103, 1, 4, 29, 3),
(1104, 1, 5, 29, 3),
(1105, 1, 6, 29, 3),
(1106, 1, 7, 29, 3),
(1107, 1, 8, 29, 3),
(1108, 1, 9, 29, 3),
(1109, 1, 10, 29, 3),
(1110, 1, 11, 29, 3),
(1111, 1, 12, 29, 3),
(1112, 1, 13, 29, 3),
(1113, 1, 14, 29, 3),
(1114, 1, 15, 29, 3),
(1115, 1, 16, 29, 3),
(1116, 1, 17, 29, 3),
(1117, 1, 18, 29, 3),
(1118, 1, 19, 29, 3),
(1119, 1, 20, 29, 3),
(1120, 1, 1, 29, 3),
(1121, 1, 2, 29, 3),
(1122, 1, 3, 29, 3),
(1123, 1, 4, 29, 3),
(1124, 1, 5, 29, 3),
(1125, 1, 6, 29, 3),
(1126, 1, 7, 29, 3),
(1127, 1, 8, 29, 3),
(1128, 1, 9, 29, 3),
(1129, 1, 10, 29, 3),
(1130, 1, 11, 29, 3),
(1131, 1, 12, 29, 3),
(1132, 1, 13, 29, 3),
(1133, 1, 14, 29, 3),
(1134, 1, 15, 29, 3),
(1135, 1, 16, 29, 3),
(1136, 1, 17, 29, 3),
(1137, 1, 18, 29, 3),
(1138, 1, 19, 29, 3),
(1139, 1, 20, 29, 3),
(1140, 1, 1, 29, 3),
(1141, 1, 2, 29, 3),
(1142, 1, 3, 29, 3),
(1143, 1, 4, 29, 3),
(1144, 1, 5, 29, 3),
(1145, 1, 6, 29, 3),
(1146, 1, 7, 29, 3),
(1147, 1, 8, 29, 3),
(1148, 1, 9, 29, 3),
(1149, 1, 10, 29, 3),
(1150, 1, 11, 29, 3),
(1151, 1, 12, 29, 3),
(1152, 1, 13, 29, 3),
(1153, 1, 14, 29, 3),
(1154, 1, 15, 29, 3),
(1155, 1, 16, 29, 3),
(1156, 1, 17, 29, 3),
(1157, 1, 18, 29, 3),
(1158, 1, 19, 29, 3),
(1159, 1, 20, 29, 3),
(1160, 1, 1, 33, 3),
(1161, 1, 2, 33, 3),
(1162, 1, 3, 33, 3),
(1163, 1, 4, 33, 3),
(1164, 1, 5, 33, 3),
(1165, 1, 6, 33, 3),
(1166, 1, 7, 33, 3),
(1167, 1, 8, 33, 3),
(1168, 1, 9, 33, 3),
(1169, 1, 10, 33, 3),
(1170, 1, 11, 33, 3),
(1171, 1, 12, 33, 3),
(1172, 1, 13, 33, 3),
(1173, 1, 14, 33, 3),
(1174, 1, 15, 33, 3),
(1175, 1, 16, 33, 3),
(1176, 1, 17, 33, 3),
(1177, 1, 18, 33, 3),
(1178, 1, 19, 33, 3),
(1179, 1, 20, 33, 3),
(1180, 1, 1, 35, 3),
(1181, 1, 2, 35, 3),
(1182, 1, 3, 35, 3),
(1183, 1, 4, 35, 3),
(1184, 1, 5, 35, 3),
(1185, 1, 6, 35, 3),
(1186, 1, 7, 35, 3),
(1187, 1, 8, 35, 3),
(1188, 1, 9, 35, 3),
(1189, 1, 10, 35, 3),
(1190, 1, 11, 35, 3),
(1191, 1, 12, 35, 3),
(1192, 1, 13, 35, 3),
(1193, 1, 14, 35, 3),
(1194, 1, 15, 35, 3),
(1195, 1, 16, 35, 3),
(1196, 1, 17, 35, 3),
(1197, 1, 18, 35, 3),
(1198, 1, 19, 35, 3),
(1199, 1, 20, 35, 3);

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
(75, '21075@supnum.mr', 'user'),
(76, '21099@supnum.mr', 'admin'),
(77, '21099@supnum.mr', 'admin'),
(78, '21098@supnum.mr', 'user'),
(79, '21098@supnum.mr', 'user'),
(80, '21098@supnum.mr', 'user');

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
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `academic_id` (`academic_id`),
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
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `axe`
--
ALTER TABLE `axe`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `departement`
--
ALTER TABLE `departement`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `description`
--
ALTER TABLE `description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `etudiants`
--
ALTER TABLE `etudiants`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `matieres`
--
ALTER TABLE `matieres`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1200;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
