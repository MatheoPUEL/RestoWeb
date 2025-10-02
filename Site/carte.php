<?php
$title = "Notre carte";
session_start();
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
                        <p style="font-size: 25px;">Filet de bœuf Rossini</p>
                        <p>Filet de bœuf Charolais, escalope de foie gras poêlée, réduction de truffe noire</p>
                    </div>
                    <div class="card-product-cta">
                        <button>Ajouter au panier &nbsp;&nbsp;<i class="fa-solid fa-plus"></i></button>
                    </div>
                </div>

                <div class="card-product">
                    <div class="card-product-text">
                        <p style="font-size: 25px; display: flex; flex-direction: row;">Carré d'agneau en croûte d'herbes </p>
                        <p>Agneau fermier, croûte de persillade, jus réduit au romarin</p>
                    </div>
                    <div class="card-product-cta">
                        <button>Ajouter au panier &nbsp;&nbsp;<i class="fa-solid fa-plus"></i></button>
                    </div>
                </div>
            </div>

            <button type="button" class="collapsible">Accompagnement</button>
            <div class="collapse-content">
                <div class="card-product">
                    <div class="card-product-text">
                        <p style="font-size: 25px;">Purée de pommes de terre à la truffe</p>
                        <p>Pommes de terre Ratte, crème d’Isigny, éclats de truffe noire</p>
                    </div>
                    <div class="card-product-cta">
                        <button>Ajouter au panier</button>
                    </div>
                </div>

                <div class="card-product">
                    <div class="card-product-text">
                        <p style="font-size: 25px;">Jardin de légumes oubliés</p>
                        <p>Panais, topinambour, betterave chioggia, huile de noisette</p>
                    </div>
                    <div class="card-product-cta">
                        <button>Ajouter au panier</button>
                    </div>
                </div>
            </div>

            <button type="button" class="collapsible">Wagyu</button>
            <div class="collapse-content">
                <div class="card-product">
                    <div class="card-product-text">
                        <p style="font-size: 25px;">Tataki de Wagyu A5 </p>
                        <p>Fines tranches de Wagyu japonais, marinées au yuzu et soja, sésame torréfié</p>
                    </div>
                    <div class="card-product-cta">
                        <button>Ajouter au panier</button>
                    </div>
                </div>

                <div class="card-product">
                    <div class="card-product-text">
                        <p style="font-size: 25px;">Wagyu rôti, purée de céleri truffée</p>
                        <p>Épaule de Wagyu cuite à basse température, jus corsé, purée de céleri-rave à la truffe noire</p>
                    </div>
                    <div class="card-product-cta">
                        <button>Ajouter au panier</button>
                    </div>
                </div>
            </div>


            <button type="button" class="collapsible">Pinar</button>
            <div class="collapse-content">
                <div class="card-product">
                    <div class="card-product-text">
                        <p style="font-size: 25px;">Château Pinar Grand Cru – 2018</p>
                        <p>Vin rouge de Bordeaux, cépages Merlot & Cabernet Sauvignon, notes de fruits noirs et épices</p>
                    </div>
                    <div class="card-product-cta">
                        <button>Ajouter au panier</button>
                    </div>
                </div>

                <div class="card-product">
                    <div class="card-product-text">
                        <p style="font-size: 25px;">Pinar Blanc – Cuvée Prestige 2020</p>
                        <p>Assemblage de Sauvignon blanc et Sémillon, arômes floraux et finale minérale</p>
                    </div>
                    <div class="card-product-cta">
                        <button>Ajouter au panier</button>
                    </div>
                </div>
            </div>

            <button type="button" class="collapsible">Bière</button>
            <div class="collapse-content">
                <div class="card-product">
                    <div class="card-product-text">
                        <p style="font-size: 25px;">Bière blonde artisanale au safran</p>
                        <p>Brassée localement, infusée au safran d'Iran, notes florales et épicées</p>
                    </div>
                    <div class="card-product-cta">
                        <button>Ajouter au panier</button>
                    </div>
                </div>

                <div class="card-product">
                    <div class="card-product-text">
                        <p style="font-size: 25px;">Triple fermentation - Brune d’Abbaye</p>
                        <p>Bière forte, malt caramélisé, finale longue et complexe</p>
                    </div>
                    <div class="card-product-cta">
                        <button>Ajouter au panier</button>
                    </div>
                </div>
            </div>

            </div>
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