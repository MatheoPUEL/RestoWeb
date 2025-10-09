<?php
$title = "Notre carte";
session_start();

require_once('./function/db_function.php');

$dbh = db_connect();

$sql = "SELECT * FROM produit WHERE idType = 1";

try {
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $viandes = $sth->fetchALL(PDO::FETCH_ASSOC);
} catch (PDOException $ex) {
    die("Erreur lors de la requête sql de récupération des viandes" . $ex->getMessage());
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
            <h3 style="margin-bottom: 100px;">Découvrez tout nos produits.</h3>
            <div>
                <div style="position: relative;">
                    <button type="button" class="collapsible">Viande</button>
                    <div class="collapse-content">
                        <div class="card-product">
                            <div class="card-product-text">
                                <?php
                                foreach ($viandes as $viande) {
                                    echo "<p style='font-size: 25px;'>" . $viande["libProduit"] . "</p>";
                                    echo "<p>" . $viande["descriptionProduit"] . "</p>";
                                    echo "<p>" . $viande["prixHtProduit"] . "</p>";
                                    ?>
                                </div>
                                <div class="card-product-cta">
                                    <button>Ajouter au panier &nbsp;&nbsp;<i class="fa-solid fa-plus"></i></button>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <?php if (count($accompagnements) > 0) { ?>
                        <button type="button" class="collapsible">Accompagnements</button>
                        <div class="collapse-content">
                            <div class="card-product">
                                <div class="card-product-text">
                                    <?php
                                    foreach ($accompagnements as $accompagnement) {
                                        echo "<p style='font-size: 25px;'>" . $accompagnement["libProduit"] . "</p>";
                                        echo "<p>" . $accompagnement["descriptionProduit"] . "</p>";
                                        echo "<p>" . $accompagnement["prixHtProduit"] . "</p>";
                                        ?>
                                    </div>
                                    <div class="card-product-cta">
                                        <button>Ajouter au panier &nbsp;&nbsp;<i class="fa-solid fa-plus"></i></button>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>

                        <?php if (count($wagyus) > 0) { ?>
                            <button type="button" class="collapsible">Wagyu</button>
                            <div class="collapse-content">
                                <div class="card-product">
                                    <div class="card-product-text">
                                        <?php
                                        foreach ($wagyus as $wagyu) {
                                            echo "<p style='font-size: 25px;'>" . $wagyu["libProduit"] . "</p>";
                                            echo "<p>" . $wagyu["descriptionProduit"] . "</p>";
                                            echo "<p>" . $wagyu["prixHtProduit"] . "</p>";
                                            ?>
                                        </div>
                                        <div class="card-product-cta">
                                            <button>Ajouter au panier &nbsp;&nbsp;<i class="fa-solid fa-plus"></i></button>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>


                            <?php if (count($pinars) > 0) { ?>
                                <button type="button" class="collapsible">Pinar</button>
                                <div class="collapse-content">
                                    <div class="card-product">
                                        <div class="card-product-text">
                                            <?php
                                            foreach ($pinars as $pinar) {
                                                echo "<p style='font-size: 25px;'>" . $pinar["libProduit"] . "</p>";
                                                echo "<p>" . $pinar["descriptionProduit"] . "</p>";
                                                echo "<p>" . $pinar["prixHtProduit"] . "</p>";
                                                ?>
                                            </div>
                                            <div class="card-product-cta">
                                                <button>Ajouter au panier &nbsp;&nbsp;<i class="fa-solid fa-plus"></i></button>
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php } ?>

                                <?php if (count(value: $bieres) > 0) { ?>
                                    <button type="button" class="collapsible">Bières</button>
                                    <div class="collapse-content">
                                        <div class="card-product">
                                            <div class="card-product-text">
                                                <?php
                                                foreach ($bieres as $biere) {
                                                    echo "<p style='font-size: 25px;'>" . $biere["libProduit"] . "</p>";
                                                    echo "<p>" . $biere["descriptionProduit"] . "</p>";
                                                    echo "<p>" . $biere["prixHtProduit"] . "</p>";
                                                    ?>
                                                </div>
                                                <div class="card-product-cta">
                                                    <button>Ajouter au panier &nbsp;&nbsp;<i
                                                            class="fa-solid fa-plus"></i></button>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
    </section>

    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function () {
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