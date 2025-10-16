<?php
$title = "Notre carte";

require_once('./function/db_function.php');
require_once('./classes/panier.classes.php');
session_start();

$dbh = db_connect();

$sql = "SELECT * FROM produit WHERE idType = 1";

try {
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $viandes = $sth->fetchALL(PDO::FETCH_ASSOC);
} catch (PDOException $ex) {
    die("Erreur lors de la requête sql de récupération des viandes" . $ex->getMessage());
}

$sql = "SELECT * FROM produit WHERE idType = 1";

try {
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $viande = $sth->fetchALL(PDO::FETCH_ASSOC);
} catch (PDOException $ex) {
    die("Erreur lors de la requête sql de récupération des accompagnements" . $ex->getMessage());
}

$sql = "SELECT * FROM produit WHERE idType = 2";

try {
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $accompagnements = $sth->fetchALL(PDO::FETCH_ASSOC);
} catch (PDOException $ex) {
    die("Erreur lors de la requête sql de récupération des accompagnements" . $ex->getMessage());
}

$sql = "SELECT * FROM produit WHERE idType = 3";

try {
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $wagyus = $sth->fetchALL(PDO::FETCH_ASSOC);
} catch (PDOException $ex) {
    die("Erreur lors de la requête sql de récuération des Wagyus" . $ex->getMessage());
}

$sql = "SELECT * FROM produit WHERE idType = 4";

try {
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $pinars = $sth->fetchALL(PDO::FETCH_ASSOC);
} catch (PDOException $ex) {
    die("Erreur lors de la requête sql de récuération des pinar" . $ex->getMessage());
}

$sql = "SELECT * FROM produit WHERE idType = 5";

try {
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $bieres = $sth->fetchALL(PDO::FETCH_ASSOC);
} catch (PDOException $ex) {
    die("Erreur lors de la requête sql de récuération des bières" . $ex->getMessage());
}

$sql = "SELECT * FROM produit WHERE idType = 6";

try {
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $dessert = $sth->fetchALL(PDO::FETCH_ASSOC);
} catch (PDOException $ex) {
    die("Erreur lors de la requête sql de récuération des bières" . $ex->getMessage());
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php require_once('./inc/head.inc.php') ?>
</head>

<body>
    <?php require_once('./inc/nav.inc.php') ?>

    <section class="content-2">
        <div class="notre-carte">
            <h1 id="notre-carte">Notre carte</h1>
            <h3 style="margin-bottom: 100px;">Découvrez tous nos produits.</h3>
            <div style="display: flex; flex-direction: row; gap: 25px;">
                <div style="position: relative; width: 70%;">

                    <!-- Viande -->
                    <?php if (count($viande) > 0): ?>
                        <button type="button" class="collapsible">Entrée</button>
                        <div class="collapse-content">
                            <?php foreach ($viandes as $viande): ?>
                                <div class="card-product">
                                    <div class="card-product-text">
                                        <p style="font-size: 25px;"><?= $viande["libProduit"] ?></p>
                                        <p><?= $viande["descriptionProduit"] ?></p>
                                        <p><?= $viande["prixHtProduit"] ?> €</p>
                                    </div>
                                    <div class="card-product-cta">
                                        <a href="./function/addPanier.php?idpro=<?= urlencode($viande["idProduit"]) ?>">
                                            Ajouter au panier &nbsp;&nbsp;<i class="fa-solid fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Accompagnements -->
                    <?php if (count($accompagnements) > 0): ?>
                        <button type="button" class="collapsible">Plat principal</button>
                        <div class="collapse-content">
                            <?php foreach ($accompagnements as $accompagnement): ?>
                                <div class="card-product">
                                    <div class="card-product-text">
                                        <p style="font-size: 25px;"><?= $accompagnement["libProduit"] ?></p>
                                        <p><?= $accompagnement["descriptionProduit"] ?></p>
                                        <p><?= $accompagnement["prixHtProduit"] ?> €</p>
                                    </div>
                                    <div class="card-product-cta">
                                        <a href="./function/addPanier.php?idpro=<?= urlencode($accompagnement["idProduit"]) ?>">
                                            Ajouter au panier &nbsp;&nbsp;<i class="fa-solid fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Wagyu -->
                    <?php if (count($wagyus) > 0): ?>
                        <button type="button" class="collapsible">Dessert</button>
                        <div class="collapse-content">
                            <?php foreach ($wagyus as $wagyu): ?>
                                <div class="card-product">
                                    <div class="card-product-text">
                                        <p style="font-size: 25px;"><?= $wagyu["libProduit"] ?></p>
                                        <p><?= $wagyu["descriptionProduit"] ?></p>
                                        <p><?= $wagyu["prixHtProduit"] ?> €</p>
                                    </div>
                                    <div class="card-product-cta">
                                        <a href="./function/addPanier.php?idpro=<?= urlencode($wagyu["idProduit"]) ?>">
                                            Ajouter au panier &nbsp;&nbsp;<i class="fa-solid fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Pinar -->
                    <?php if (count($pinars) > 0): ?>
                        <button type="button" class="collapsible">Boisson</button>
                        <div class="collapse-content">
                            <?php foreach ($pinars as $pinar): ?>
                                <div class="card-product">
                                    <div class="card-product-text">
                                        <p style="font-size: 25px;"><?= $pinar["libProduit"] ?></p>
                                        <p><?= $pinar["descriptionProduit"] ?></p>
                                        <p><?= $pinar["prixHtProduit"] ?> €</p>
                                    </div>
                                    <div class="card-product-cta">
                                        <a href="./function/addPanier.php?idpro=<?= urlencode($pinar["idProduit"]) ?>">
                                            Ajouter au panier &nbsp;&nbsp;<i class="fa-solid fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Bières -->
                    <?php if (count($bieres) > 0): ?>
                        <button type="button" class="collapsible">Dessert</button>
                        <div class="collapse-content">
                            <?php foreach ($bieres as $biere): ?>
                                <div class="card-product">
                                    <div class="card-product-text">
                                        <p style="font-size: 25px;"><?= $biere["libProduit"] ?></p>
                                        <p><?= $biere["descriptionProduit"] ?></p>
                                        <p><?= $biere["prixHtProduit"] ?> €</p>
                                    </div>
                                    <div class="card-product-cta">
                                        <a href="./function/addPanier.php?idpro=<?= urlencode($biere["idProduit"]) ?>">
                                            Ajouter au panier &nbsp;&nbsp;<i class="fa-solid fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (count($dessert) > 0): ?>
                        <button type="button" class="collapsible">Dessert</button>
                        <div class="collapse-content">
                            <?php foreach ($dessert as $dessert): ?>
                                <div class="card-product">
                                    <div class="card-product-text">
                                        <p style="font-size: 25px;"><?= $dessert["libProduit"] ?></p>
                                        <p><?= $dessert["descriptionProduit"] ?></p>
                                        <p><?= $dessert["prixHtProduit"] ?> €</p>
                                    </div>
                                    <div class="card-product-cta">
                                        <a href="./function/addPanier.php?idpro=<?= urlencode($dessert["idProduit"]) ?>">
                                            Ajouter au panier &nbsp;&nbsp;<i class="fa-solid fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>


                <form action="paiement.php" method="POST" style="width: 25%; padding: 15px;">
                    <h3>Votre panier:</h3>
                    <?php
                    if (isset($_SESSION['panier'])) {
                        $items = (array) $_SESSION['panier'];
                    ?>
                        <ul style="text-align: left;">
                            <?php
                            for ($i = 0; $i < count($items); $i++) {
                            ?>
                                <li>x<?= $items[$i]->quantite ?> - <?= $items[$i]->lib ?> - <a
                                        href="./function/removeItemPanier.php?idpro=<?= $items[$i]->id ?>"><i
                                            style="color: white;" class="fa-solid fa-trash"></i></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    <?php

                    } else {
                        echo '<p>Votre panier est vide</p>';
                    }
                    ?>
                    <div style="display: flex; justify-content: center; align-items: center;">
                        <input type="radio" id="contactChoice1" name="choix" value="0" checked />
                        <label for="contactChoice1">Sur place</label>

                        <input type="radio" id="contactChoice2" name="choix" value="1" />
                        <label for="contactChoice2">Emporter</label>
                    </div>
                    <button type="submit" class="btn-paiment" id="complete-payment">Passer au paiement</button>
                </form>
            </div>

        </div>
    </section>


    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none";
                } else {
                    content.style.display = "block";
                }
            });
        }
    </script>
</body>

</html>