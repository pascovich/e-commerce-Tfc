-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 01 août 2023 à 20:46
-- Version du serveur :  10.4.6-MariaDB
-- Version de PHP :  7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cotation_enseignant`
--

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `affectation_view`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `affectation_view` (
`id` int(11)
,`date_passassion_cours` datetime
,`date_attribution` timestamp
,`id_promotion` int(11)
,`id_option` int(11)
,`motif` varchar(50)
,`prom` varchar(101)
,`promotion` varchar(50)
,`annee` varchar(50)
,`enseignant` varchar(50)
,`cours` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure de la table `annee`
--

CREATE TABLE `annee` (
  `id` int(11) NOT NULL,
  `designation` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `annee`
--

INSERT INTO `annee` (`id`, `designation`) VALUES
(1, '2020-2021');

-- --------------------------------------------------------

--
-- Structure de la table `attribution_cours`
--

CREATE TABLE `attribution_cours` (
  `id` int(11) NOT NULL,
  `date_passassion_cours` datetime DEFAULT NULL,
  `date_attribution` timestamp NULL DEFAULT current_timestamp(),
  `motif` varchar(50) DEFAULT NULL,
  `id_promotion` int(11) DEFAULT NULL,
  `id_annee` int(11) DEFAULT NULL,
  `id_enseignant` int(11) DEFAULT NULL,
  `id_cours` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `attribution_cours`
--

INSERT INTO `attribution_cours` (`id`, `date_passassion_cours`, `date_attribution`, `motif`, `id_promotion`, `id_annee`, `id_enseignant`, `id_cours`) VALUES
(1, '2023-08-03 00:00:00', '2023-07-29 14:15:34', 'dispense courss', 1, 1, 2, 1),
(2, '2023-08-05 00:00:00', '2023-07-30 10:47:42', 'dispense cours', 2, 1, 1, 2),
(3, '2023-08-04 00:00:00', '2023-07-30 13:12:15', 'dispense courss', 1, 1, 2, 3),
(4, '2023-08-03 00:00:00', '2023-07-30 15:21:24', 'dispense courss', 1, 1, 2, 4);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `auth_etudiant_view`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `auth_etudiant_view` (
`id` int(11)
,`motif` text
,`date_inscription` timestamp
,`prom` varchar(100)
,`options` varchar(50)
,`noms` varchar(50)
,`sexe` varchar(50)
,`etat_civil` varchar(50)
,`adresse` varchar(50)
,`telephone` varchar(50)
,`email` varchar(50)
,`photo` varchar(50)
,`matricule` varchar(50)
,`annee` varchar(50)
,`id_promotion` int(11)
,`id_etudiant` int(11)
,`id_annee` int(11)
,`id_options` int(11)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `compte_cotation_view`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `compte_cotation_view` (
`id_inscription` int(11)
,`id` int(11)
,`id_option` int(11)
,`id_promotion` int(11)
,`maxs` float
,`application` varchar(50)
,`date_cotation` timestamp
,`peda` float
,`habillement` float
,`regularite` float
,`pratique` float
,`connaissance` float
,`expression` float
,`utilite` float
,`explication` float
,`attente` float
,`cote` double
,`date_passassion_cours` datetime
,`prom` varchar(101)
,`promotion` varchar(50)
,`annee` varchar(50)
,`enseignant` varchar(50)
,`cours` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure de la table `cotation`
--

CREATE TABLE `cotation` (
  `id` int(11) NOT NULL,
  `motif` varchar(50) DEFAULT NULL,
  `id_inscription` int(11) DEFAULT NULL,
  `id_attribution_cours` int(11) DEFAULT NULL,
  `maxs` float DEFAULT 100,
  `application` varchar(50) DEFAULT NULL,
  `date_cotation` timestamp NULL DEFAULT current_timestamp(),
  `peda` float DEFAULT NULL,
  `habillement` float DEFAULT NULL,
  `regularite` float DEFAULT NULL,
  `pratique` float DEFAULT NULL,
  `connaissance` float DEFAULT NULL,
  `autres` float DEFAULT NULL,
  `expression` float DEFAULT NULL,
  `utilite` float DEFAULT NULL,
  `explication` float DEFAULT NULL,
  `attente` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cotation`
--

INSERT INTO `cotation` (`id`, `motif`, `id_inscription`, `id_attribution_cours`, `maxs`, `application`, `date_cotation`, `peda`, `habillement`, `regularite`, `pratique`, `connaissance`, `autres`, `expression`, `utilite`, `explication`, `attente`) VALUES
(1, NULL, 1, 1, 100, NULL, '2023-07-30 12:28:11', 9, 5, 6, 3, 4, 4, 5, 4, 5, 8),
(2, NULL, 1, 3, 100, NULL, '2023-07-30 14:28:31', 6, 6, 5, 9, 9, 4, 6, 5, 8, 3),
(3, NULL, 2, 3, 100, NULL, '2023-07-30 18:53:48', 5, 6, 8, 6, 6, 8, 3, 4, 5, 7);

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id` int(11) NOT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `cigle` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id`, `designation`, `cigle`) VALUES
(1, 'Administration reseau', 'Admin. R'),
(2, 'Architecture des ordinateur', 'Arch.ordi'),
(3, 'expression francaise', 'EOE'),
(4, 'Anglais', 'EN');

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE `enseignant` (
  `id` int(11) NOT NULL,
  `noms` varchar(50) DEFAULT NULL,
  `sexe` varchar(50) DEFAULT NULL,
  `etat_civil` varchar(50) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `titre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `enseignant`
--

INSERT INTO `enseignant` (`id`, `noms`, `sexe`, `etat_civil`, `adresse`, `telephone`, `email`, `photo`, `titre`) VALUES
(1, 'maleani kaluzi', 'feminin', 'Marie', 'kalemie', '0970267037', 'kaluziblaise2@gmail.com', '492811083.jpg', 'Assistant2'),
(2, 'kashisho kaluzi', 'm', 'Celibataire', 'goma', '0820167609', 'kakulepas@gmail.com', '1653276449.jpg', 'Assistant1');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` int(11) NOT NULL,
  `noms` varchar(50) DEFAULT NULL,
  `sexe` varchar(50) DEFAULT NULL,
  `etat_civil` varchar(50) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `matricule` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `noms`, `sexe`, `etat_civil`, `adresse`, `telephone`, `email`, `photo`, `matricule`) VALUES
(1, 'bahati balolage', 'm', 'Marie', 'carmelg', '0970267037', 'kaluziblaise2@gmail.com', '629001883.jpg', 'bvy6u'),
(2, 'piscas migushi', 'feminin', 'Celibataire', 'himbi 2', '0820167609', 'richardkingombe5@gmail.com', '1771193303.jpg', '2Nc3R');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `id` int(11) NOT NULL,
  `date_inscription` timestamp NULL DEFAULT current_timestamp(),
  `motif` text DEFAULT NULL,
  `id_promotion` int(11) DEFAULT NULL,
  `id_etudiant` int(11) DEFAULT NULL,
  `id_annee` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`id`, `date_inscription`, `motif`, `id_promotion`, `id_etudiant`, `id_annee`) VALUES
(1, '2023-07-30 07:11:19', 'inscription simplee', 1, 1, 1),
(2, '2023-07-30 14:33:44', 'inscription normal', 1, 2, 1);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `inscription_view`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `inscription_view` (
`id` int(11)
,`date_inscription` timestamp
,`motif` text
,`annee` varchar(50)
,`noms` varchar(50)
,`prom` varchar(101)
);

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `cigle` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `options`
--

INSERT INTO `options` (`id`, `designation`, `cigle`) VALUES
(1, 'Informatique de gestion', 'IG'),
(2, 'Gestion de developpement', 'GD');

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE `promotion` (
  `id` int(11) NOT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `id_options` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `promotion`
--

INSERT INTO `promotion` (`id`, `designation`, `id_options`) VALUES
(1, 'G1', 2),
(2, 'G1', 1);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `promotion_option_view`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `promotion_option_view` (
`id` int(11)
,`designation` varchar(50)
,`options` varchar(50)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `report_cours_cotation`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `report_cours_cotation` (
`id_promotion` int(11)
,`cours` varchar(50)
,`prom` varchar(101)
,`annee` varchar(50)
,`enseignant` varchar(50)
,`date_passassion_cours` datetime
,`application` double
,`peda` double
,`habillement` double
,`regularite` double
,`pratique` double
,`connaissance` double
,`expression` double
,`utilite` double
,`explication` double
,`attente` double
,`cote_total` double
,`maxs` double
,`percent` double
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `tri_cotation`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `tri_cotation` (
`id_inscription` int(11)
,`id` int(11)
,`id_annee` int(11)
,`id_option` int(11)
,`id_promotion` int(11)
,`maxs` float
,`application` varchar(50)
,`date_cotation` timestamp
,`peda` float
,`habillement` float
,`regularite` float
,`pratique` float
,`connaissance` float
,`expression` float
,`utilite` float
,`explication` float
,`attente` float
,`cote` double
,`date_passassion_cours` datetime
,`prom` varchar(101)
,`promotion` varchar(50)
,`annee` varchar(50)
,`enseignant` varchar(50)
,`cours` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pwd` varchar(50) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `pwd`, `photo`) VALUES
(1, 'admin', 'admin@gmail.com', '123456', '1281805619.jpg');

-- --------------------------------------------------------

--
-- Structure de la vue `affectation_view`
--
DROP TABLE IF EXISTS `affectation_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `affectation_view`  AS  select `attribution_cours`.`id` AS `id`,`attribution_cours`.`date_passassion_cours` AS `date_passassion_cours`,`attribution_cours`.`date_attribution` AS `date_attribution`,`attribution_cours`.`id_promotion` AS `id_promotion`,`options`.`id` AS `id_option`,`attribution_cours`.`motif` AS `motif`,concat(`promotion`.`designation`,' ',`options`.`designation`) AS `prom`,`promotion`.`designation` AS `promotion`,`annee`.`designation` AS `annee`,`enseignant`.`noms` AS `enseignant`,`cours`.`designation` AS `cours` from (((((`attribution_cours` join `promotion` on(`attribution_cours`.`id_promotion` = `promotion`.`id`)) join `annee` on(`attribution_cours`.`id_annee` = `annee`.`id`)) join `enseignant` on(`attribution_cours`.`id_enseignant` = `enseignant`.`id`)) join `cours` on(`attribution_cours`.`id_cours` = `cours`.`id`)) join `options` on(`promotion`.`id_options` = `options`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `auth_etudiant_view`
--
DROP TABLE IF EXISTS `auth_etudiant_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `auth_etudiant_view`  AS  select `inscription`.`id` AS `id`,`inscription`.`motif` AS `motif`,`inscription`.`date_inscription` AS `date_inscription`,concat(`promotion`.`designation`,`options`.`designation`) AS `prom`,`options`.`designation` AS `options`,`etudiant`.`noms` AS `noms`,`etudiant`.`sexe` AS `sexe`,`etudiant`.`etat_civil` AS `etat_civil`,`etudiant`.`adresse` AS `adresse`,`etudiant`.`telephone` AS `telephone`,`etudiant`.`email` AS `email`,`etudiant`.`photo` AS `photo`,`etudiant`.`matricule` AS `matricule`,`annee`.`designation` AS `annee`,`inscription`.`id_promotion` AS `id_promotion`,`inscription`.`id_etudiant` AS `id_etudiant`,`inscription`.`id_annee` AS `id_annee`,`options`.`id` AS `id_options` from ((((`inscription` join `promotion` on(`inscription`.`id_promotion` = `promotion`.`id`)) join `etudiant` on(`inscription`.`id_etudiant` = `etudiant`.`id`)) join `annee` on(`inscription`.`id_annee` = `annee`.`id`)) join `options` on(`promotion`.`id_options` = `options`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `compte_cotation_view`
--
DROP TABLE IF EXISTS `compte_cotation_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `compte_cotation_view`  AS  select `cotation`.`id_inscription` AS `id_inscription`,`affectation_view`.`id` AS `id`,`affectation_view`.`id_option` AS `id_option`,`affectation_view`.`id_promotion` AS `id_promotion`,`cotation`.`maxs` AS `maxs`,`cotation`.`application` AS `application`,`cotation`.`date_cotation` AS `date_cotation`,`cotation`.`peda` AS `peda`,`cotation`.`habillement` AS `habillement`,`cotation`.`regularite` AS `regularite`,`cotation`.`pratique` AS `pratique`,`cotation`.`connaissance` AS `connaissance`,`cotation`.`expression` AS `expression`,`cotation`.`utilite` AS `utilite`,`cotation`.`explication` AS `explication`,`cotation`.`attente` AS `attente`,`cotation`.`peda` + `cotation`.`habillement` + `cotation`.`regularite` + `cotation`.`pratique` + `cotation`.`connaissance` + `cotation`.`expression` + `cotation`.`utilite` + `cotation`.`explication` + `cotation`.`attente` AS `cote`,`affectation_view`.`date_passassion_cours` AS `date_passassion_cours`,`affectation_view`.`prom` AS `prom`,`affectation_view`.`promotion` AS `promotion`,`affectation_view`.`annee` AS `annee`,`affectation_view`.`enseignant` AS `enseignant`,`affectation_view`.`cours` AS `cours` from (`affectation_view` left join `cotation` on(`cotation`.`id_attribution_cours` = `affectation_view`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `inscription_view`
--
DROP TABLE IF EXISTS `inscription_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `inscription_view`  AS  select `inscription`.`id` AS `id`,`inscription`.`date_inscription` AS `date_inscription`,`inscription`.`motif` AS `motif`,`annee`.`designation` AS `annee`,`etudiant`.`noms` AS `noms`,concat(`promotion_option_view`.`designation`,'-',`promotion_option_view`.`options`) AS `prom` from (((`inscription` join `promotion_option_view` on(`inscription`.`id_promotion` = `promotion_option_view`.`id`)) join `etudiant` on(`inscription`.`id_etudiant` = `etudiant`.`id`)) join `annee` on(`inscription`.`id_annee` = `annee`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `promotion_option_view`
--
DROP TABLE IF EXISTS `promotion_option_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `promotion_option_view`  AS  select `promotion`.`id` AS `id`,`promotion`.`designation` AS `designation`,`options`.`designation` AS `options` from (`promotion` join `options` on(`promotion`.`id_options` = `options`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `report_cours_cotation`
--
DROP TABLE IF EXISTS `report_cours_cotation`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `report_cours_cotation`  AS  select `tri_cotation`.`id_promotion` AS `id_promotion`,`tri_cotation`.`cours` AS `cours`,`tri_cotation`.`prom` AS `prom`,`tri_cotation`.`annee` AS `annee`,`tri_cotation`.`enseignant` AS `enseignant`,`tri_cotation`.`date_passassion_cours` AS `date_passassion_cours`,sum(`tri_cotation`.`application`) / count(`tri_cotation`.`id`) AS `application`,sum(`tri_cotation`.`peda`) / count(`tri_cotation`.`id`) AS `peda`,sum(`tri_cotation`.`habillement`) / count(`tri_cotation`.`id`) AS `habillement`,sum(`tri_cotation`.`regularite`) / count(`tri_cotation`.`id`) AS `regularite`,sum(`tri_cotation`.`pratique`) / count(`tri_cotation`.`id`) AS `pratique`,sum(`tri_cotation`.`connaissance`) / count(`tri_cotation`.`id`) AS `connaissance`,sum(`tri_cotation`.`expression`) / count(`tri_cotation`.`id`) AS `expression`,sum(`tri_cotation`.`utilite`) / count(`tri_cotation`.`id`) AS `utilite`,sum(`tri_cotation`.`explication`) / count(`tri_cotation`.`id`) AS `explication`,sum(`tri_cotation`.`attente`) / count(`tri_cotation`.`id`) AS `attente`,sum(`tri_cotation`.`cote`) AS `cote_total`,sum(`tri_cotation`.`maxs`) AS `maxs`,sum(`tri_cotation`.`cote`) * 100 / sum(`tri_cotation`.`maxs`) AS `percent` from `tri_cotation` group by `tri_cotation`.`prom`,`tri_cotation`.`cours`,`tri_cotation`.`annee` ;

-- --------------------------------------------------------

--
-- Structure de la vue `tri_cotation`
--
DROP TABLE IF EXISTS `tri_cotation`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tri_cotation`  AS  select `cotation`.`id_inscription` AS `id_inscription`,`affectation_view`.`id` AS `id`,`attribution_cours`.`id_annee` AS `id_annee`,`affectation_view`.`id_option` AS `id_option`,`affectation_view`.`id_promotion` AS `id_promotion`,`cotation`.`maxs` AS `maxs`,`cotation`.`application` AS `application`,`cotation`.`date_cotation` AS `date_cotation`,`cotation`.`peda` AS `peda`,`cotation`.`habillement` AS `habillement`,`cotation`.`regularite` AS `regularite`,`cotation`.`pratique` AS `pratique`,`cotation`.`connaissance` AS `connaissance`,`cotation`.`expression` AS `expression`,`cotation`.`utilite` AS `utilite`,`cotation`.`explication` AS `explication`,`cotation`.`attente` AS `attente`,`cotation`.`peda` + `cotation`.`habillement` + `cotation`.`regularite` + `cotation`.`pratique` + `cotation`.`connaissance` + `cotation`.`expression` + `cotation`.`utilite` + `cotation`.`explication` + `cotation`.`attente` AS `cote`,`affectation_view`.`date_passassion_cours` AS `date_passassion_cours`,`affectation_view`.`prom` AS `prom`,`affectation_view`.`promotion` AS `promotion`,`affectation_view`.`annee` AS `annee`,`affectation_view`.`enseignant` AS `enseignant`,`affectation_view`.`cours` AS `cours` from ((`cotation` join `affectation_view` on(`cotation`.`id_attribution_cours` = `affectation_view`.`id`)) join `attribution_cours` on(`cotation`.`id_attribution_cours` = `attribution_cours`.`id`)) ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annee`
--
ALTER TABLE `annee`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `attribution_cours`
--
ALTER TABLE `attribution_cours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_att_pro` (`id_promotion`),
  ADD KEY `fk_att_ann` (`id_annee`),
  ADD KEY `fk_att_cours` (`id_cours`),
  ADD KEY `fk_att_ens` (`id_enseignant`);

--
-- Index pour la table `cotation`
--
ALTER TABLE `cotation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cote_ins` (`id_inscription`),
  ADD KEY `fk_cote_att` (`id_attribution_cours`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ins_et` (`id_etudiant`),
  ADD KEY `fk_ins_pro` (`id_promotion`),
  ADD KEY `fk_ins_ann` (`id_annee`);

--
-- Index pour la table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pro_opt` (`id_options`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annee`
--
ALTER TABLE `annee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `attribution_cours`
--
ALTER TABLE `attribution_cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `cotation`
--
ALTER TABLE `cotation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `enseignant`
--
ALTER TABLE `enseignant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `attribution_cours`
--
ALTER TABLE `attribution_cours`
  ADD CONSTRAINT `fk_att_ann` FOREIGN KEY (`id_annee`) REFERENCES `annee` (`id`),
  ADD CONSTRAINT `fk_att_cours` FOREIGN KEY (`id_cours`) REFERENCES `cours` (`id`),
  ADD CONSTRAINT `fk_att_ens` FOREIGN KEY (`id_enseignant`) REFERENCES `enseignant` (`id`),
  ADD CONSTRAINT `fk_att_pro` FOREIGN KEY (`id_promotion`) REFERENCES `promotion` (`id`);

--
-- Contraintes pour la table `cotation`
--
ALTER TABLE `cotation`
  ADD CONSTRAINT `fk_cote_att` FOREIGN KEY (`id_attribution_cours`) REFERENCES `attribution_cours` (`id`),
  ADD CONSTRAINT `fk_cote_ins` FOREIGN KEY (`id_inscription`) REFERENCES `inscription` (`id`);

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `fk_ins_ann` FOREIGN KEY (`id_annee`) REFERENCES `annee` (`id`),
  ADD CONSTRAINT `fk_ins_et` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id`),
  ADD CONSTRAINT `fk_ins_pro` FOREIGN KEY (`id_promotion`) REFERENCES `promotion` (`id`);

--
-- Contraintes pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD CONSTRAINT `pro_opt` FOREIGN KEY (`id_options`) REFERENCES `options` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
