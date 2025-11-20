-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 13 nov. 2025 à 09:07
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `appresto`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `idCommande` int(11) NOT NULL,
  `dateCommande` datetime NOT NULL,
  `totalCommande` decimal(15,2) NOT NULL,
  `typeCommande` varchar(50) NOT NULL,
  `idEtat` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

CREATE TABLE `etat` (
  `idEtat` int(11) NOT NULL,
  `libEtat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



--
-- Structure de la table `ligne_commande`
--

CREATE TABLE `ligne_commande` (
  `idCommande` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `qteCommandee` int(11) DEFAULT NULL,
  `prixHtLigneCommande` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déclencheurs `ligne_commande`
--
DELIMITER $$
CREATE TRIGGER `after_insert_commande` AFTER INSERT ON `ligne_commande` FOR EACH ROW BEGIN
    DECLARE v_prixCommande DECIMAL (5,2);
    DECLARE v_typeCommande VARCHAR(3);

    SELECT typeCommande INTO v_typeCommande FROM commande WHERE idCommande = NEW.idCommande;

    SELECT SUM(prixHtLigneCommande) into v_prixCommande FROM ligne_commande
    WHERE idCommande = NEW.idCommande;

IF v_typeCommande = "SP" THEN
    UPDATE commande SET totalCommande = v_prixCommande * 1.055 WHERE idCommande = NEW.idCommande;
ELSE
    UPDATE commande SET totalCommande = v_prixCommande * 1.10 WHERE idCommande = NEW.idCommande;
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_ligne_insert` BEFORE INSERT ON `ligne_commande` FOR EACH ROW BEGIN
    DECLARE v_prixTTC DECIMAL(16,2);
    SELECT SUM(prixHtLigneCommande) INTO v_prixTTC FROM `ligne_commande` WHERE idCommande = NEW.idCommande;
    SET v_prixTTC = v_prixTTC * 1.20;
    UPDATE commande SET totalCommande = v_prixTTC WHERE idCommande = NEW.idCommande;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_ligne_update` AFTER UPDATE ON `ligne_commande` FOR EACH ROW BEGIN
	DECLARE v_prixTotal DECIMAL(16,2);
    SELECT totalCommande INTO v_prixTotal FROM commande WHERE idCommande = NEW.idCommande;
   	SET v_prixTotal = (v_prixTotal - OLD.prixHtLigneCommande) + (NEW.prixHtLigneCommande * 1.20);
	UPDATE commande SET totalCommande = v_prixTotal WHERE idCommande = NEW.idCommande;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_update_ligne_commande` BEFORE UPDATE ON `ligne_commande` FOR EACH ROW BEGIN
 DECLARE v_prixHt DECIMAL(5,2) ;

 SELECT prixHtProduit into v_prixHt from produit
 WHERE idProduit = new.idProduit ;
 set new.prixHtLigneCommande = v_prixHt * new.qteCommandee ;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `idProduit` int(11) NOT NULL,
  `libProduit` varchar(50) NOT NULL,
  `descriptionProduit` text DEFAULT NULL,
  `prixHtProduit` decimal(15,2) NOT NULL,
  `idType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `idType` int(11) NOT NULL,
  `libType` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `loginUtilisateur` varchar(50) NOT NULL,
  `emailUtilisateur` varchar(50) NOT NULL,
  `mdpUtilisateur` text DEFAULT NULL,
  `nomUtil` varchar(50) NOT NULL,
  `prenomUtil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idCommande`),
  ADD KEY `idEtat` (`idEtat`),
  ADD KEY `idUtilisateur` (`idUtilisateur`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

ALTER TABLE `commande` CHANGE `idCommande` `idCommande` INT(11) NOT NULL AUTO_INCREMENT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
