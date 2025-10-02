<?php
session_start();
require_once('./function/db_function.php');
$dbh = db_connect();
class Produit {
    public $lib;
    public $quantite = 0;
    public $prix = 0;

    public $prix_ttc = 0;

    function setPrixTtc($quantite) {
        $this->prix_ttc = ($this->prix * $quantite) * 0.20;
    }
}

if (isset($_SESSION['emailUtilisateur'])) {
    $CreateEmptyCommand = ("INSERT INTO `commande` (`idCommande`, `dateCommande`, `totalCommande`, `typeCommande`, `idEtat`, `idUtilisateur`) VALUES (NULL, CURDATE(), '0', '0', '1', :idUtil);");
    $Initer = $dbh->prepare($CreateEmptyCommand);
    $Initer->execute([":idUtil" => $_SESSION['idUtilisateur']]);
    echo "Commande init";
} else {
    echo "Connectez vous";
}


function eachProduct() {
    
}
?>