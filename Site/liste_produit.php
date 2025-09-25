<?php

// Permet d'inclure la fonction de connexion à la base de donnée.
include "function/db_function.php";

$dbh = db_connect();

// Requête qui permet de récupérer toutes les informations présentes dans la table "produit".
$sql = "SELECT * FROM produit";

try {
    $sth = $dbh->prepare($sql);
    $sth->execute($params);
    $rows = $sth->fetchALL(PDO::FETCH_ASSOC);
} catch (PDOException $ex) {
    die ("ERREUR lors de la requête permettant d'afficher la liste des produits".$ex->getMesssage());
}

echo "<ul>";
foreach ($rows as $produits){
    echo "<li>".$produits["libPro"]."</li>";
    echo "<li>".$produits["prixPro"]."</li>";
}
echo "</ul>";

?>