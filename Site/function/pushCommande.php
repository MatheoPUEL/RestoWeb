<?php
session_start();
require_once('db_function.php');
$dbh = db_connect();
if (isset($_SESSION['emailUtilisateur']) && isset($_SESSION['idUtilisateur'])) {

    $CreateEmptyCommand = "INSERT INTO commande (dateCommande, totalCommande, typeCommande, idEtat, idUtilisateur)
VALUES (NOW(), :totalCommande, :typeCommande, :idEtat, :idUtilisateur)";

    $Initer = $dbh->prepare($CreateEmptyCommand);

    $Initer->execute([
        ':totalCommande' => 0,
        ':typeCommande' => 0,
        ':idEtat' => 1, 
        ':idUtilisateur' => $_SESSION['idUtilisateur']
    ]);

    echo "Commande initialisée avec succès.";

} else {
    echo "Connectez-vous pour passer une commande.";
}

function eachProduct() {
    
}
?>
