<?php
require_once('../classes/panier.classes.php');
session_start();
require_once('db_function.php');
$dbh = db_connect();

if ( isset($_SESSION['panier']) && isset($_SESSION['emailUtilisateur']) && isset($_SESSION['idUtilisateur'])) {

    $CreateCommande = "INSERT INTO commande (dateCommande, totalCommande, typeCommande, idEtat, idUtilisateur)
                       VALUES (NOW(), :totalCommande, :typeCommande, :idEtat, :idUtilisateur)";
    $stmt = $dbh->prepare($CreateCommande);

    $total = 0;
    foreach ($_SESSION['panier'] as $produit) {
        $total += $produit->prix * $produit->quantite; 
    }

    $stmt->execute([
        ':totalCommande' => $total,
        ':typeCommande' => 0,
        ':idEtat' => 1,
        ':idUtilisateur' => $_SESSION['idUtilisateur']
    ]);

    $idCommande = $dbh->lastInsertId();

    $InsertLigne = "INSERT INTO ligne_commande (idCommande, idProduit, qteCommandee, prixHtLigneCommande)
                    VALUES (:idCommande, :idProduit, :quantite, :prix)";
    $stmtLigne = $dbh->prepare($InsertLigne);

    foreach ($_SESSION['panier'] as $produit) {
        $stmtLigne->execute([
            ':idCommande' => $idCommande,
            ':idProduit' => $produit->id,
            ':quantite' => $produit->quantite,
            ':prix' => $produit->prix
        ]);
    }
    $_SESSION['panier'] = null;
    echo $_SESSION['panier'];
    echo "Commande et lignes enregistrées avec succès.";

} else {
    echo "Veuillez vous connecter.";
}
?>
