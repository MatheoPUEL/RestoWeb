<?php
session_start();

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
    $CreateEmptyCommand = ("INSERT INTO `commande` (`idCommande`, `dateCommande`, `totalCommande`, `typeCommande`, `idEtat`, `idUtilisateur`) VALUES (NULL, DATE(), '0', '0', '1', ':idUtil');");
    $sthinsert = $dbh->prepare($sqlinsert);
    $sthinsert->execute(array(":idUtil" => $_SESSION['idUtilisateur'],));
    $messagev = "Inscription prise en compte !";
    echo $messagev;
} else {
    echo "Connectez vous";
}


function eachProduct() {

}
?>