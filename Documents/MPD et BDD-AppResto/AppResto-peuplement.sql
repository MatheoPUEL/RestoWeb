--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `libProduit`, `descriptionProduit`, `prixHtProduit`, `idType`) VALUES
(1, 'Carpaccio de Saint-Jacques', 'Fines tranches de Saint-Jacques marinées aux agrumes et caviar', 24.50, 1),
(2, 'Foie Gras Poêlé', 'Foie gras de canard poêlé, chutney de figues et brioche toastée', 26.00, 1),
(3, 'Tartare de Bar Royal', 'Tartare de bar sauvage, huile d’olive millésimée et citron vert', 23.00, 1),
(4, 'Caviar Impérial', 'Caviar d’esturgeon servi avec blinis maison et crème aigre', 48.00, 1),
(5, 'Velouté de Topinambour', 'Crème de topinambour, éclats de châtaigne et truffe noire', 21.00, 1),
(6, 'Homard Bleu Rôti', 'Homard breton rôti au beurre clarifié, émulsion citronnée', 58.00, 2),
(7, 'Filet de Bœuf Rossini', 'Filet de bœuf maturé, foie gras, sauce périgourdine', 52.00, 2),
(8, 'Risotto à la Truffe Noire', 'Riz Carnaroli crémeux, truffe noire fraîche', 45.00, 2),
(9, 'Saint-Pierre au Champagne', 'Saint-Pierre poché avec sauce champagne et asperges blanches', 49.00, 2),
(10, 'Pigeon Royal', 'Pigeon fermier rôti, jus corsé et légumes anciens', 47.00, 2),
(11, 'Soufflé au Grand Marnier', 'Soufflé aérien au Grand Marnier, zeste confit', 18.00, 3),
(12, 'Dôme Chocolat & Or', 'Mousse chocolat grand cru, feuille d’or comestible', 22.00, 3),
(13, 'Tartelette Citron Yuzu', 'Crème de citron yuzu, meringue légère', 17.00, 3),
(14, 'Millefeuille Vanille Bourbon', 'Feuilletage croustillant et vanille Bourbon', 19.00, 3),
(15, 'Assiette de Fruits Exotiques', 'Mangue, fruit du dragon, passion et sorbet', 18.50, 3),
(16, 'Champagne Brut Prestige', 'Flûte de champagne brut grand cru', 19.00, 4),
(17, 'Chardonnay Millésimé', 'Verre de chardonnay français haut de gamme', 14.00, 4),
(18, 'Cocktail Signature Maison', 'Création du chef barman, ingrédients premium', 16.00, 4),
(19, 'Eau Minérale Artésienne', 'Eau plate naturelle premium', 6.00, 4),
(20, 'Thé Sencha Impérial', 'Thé vert japonais de haute qualité', 8.50, 4),
(21, 'Brie de Meaux Truffé', 'Brie crémeux garni de truffe noire', 15.00, 5),
(22, 'Comté 36 Mois', 'Comté affiné 36 mois, noix et raisins secs', 14.50, 5),
(23, 'Roquefort Carles', 'Roquefort artisanal au lait cru', 13.50, 5),
(24, 'Chèvre Cendré Fermier', 'Fromage de chèvre fermier affiné', 12.00, 5),
(25, 'Assiette de Fromages Affinés', 'Sélection de 4 fromages d’exception', 19.00, 5),
(26, 'Purée de Pomme de Terre Truffée', 'Purée onctueuse à la truffe fraîche', 11.00, 6),
(27, 'Légumes Anciens Rôtis', 'Carottes, panais et betteraves glacés', 10.00, 6),
(28, 'Gratin Dauphinois Premium', 'Crème entière, ail et muscade', 12.00, 6),
(29, 'Asperges Vertes Sautées', 'Asperges poêlées au beurre noisette', 13.00, 6),
(30, 'Risotto Parfumé aux Herbes', 'Risotto crémeux aux herbes fraîches', 14.00, 6);

-- --------------------------------------------------------

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`idType`, `libType`) VALUES
(1, 'Entrée'),
(2, 'Plat Principal'),
(3, 'Dessert'),
(4, 'Boisson'),
(5, 'Fromage'),
(6, 'Accompagnement');

-- --------------------------------------------------------


--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `loginUtilisateur`, `emailUtilisateur`, `mdpUtilisateur`, `nomUtil`, `prenomUtil`) VALUES
(1, 'user1', 'user1@restoweb.com', '$2y$10$lph/oeEykBIN6twxrvK7f.9M1C6f6M37OH/J8E8oQoazaJ4Dt8TNm', '', 'user1'),
(2, 'user2', 'user2@restoweb.com', '$2y$10$hFfugL60x474.JtjSfOIoepjxJ/IPFET.rFQoAoriXIzOa7Fkzo/q', '', 'user2');


--
-- Déchargement des données de la table `etat`
--

INSERT INTO `etat` (`idEtat`, `libEtat`) VALUES
(1, 'Commandé '),
(2, 'Commencé');

-- --------------------------------------------------------
