<link rel="stylesheet" href="./css/main.css">
<link rel="stylesheet" href="./css/paiement.css">

<?php
    require_once('./inc/nav.inc.php')
?>

<div class="paiement-container">
  <h1>Paiement</h1>

  <form action="#" method="post" >
    <section>
      <label for="cc-number">Numéro de carte</label>
      <input id="cc-number" name="cc-number" autocomplete="cc-number" pattern="[\d ]{10,30}" required>
    </section>

    <section>
      <label for="cc-name">Titulaire de la carte</label>
      <input id="cc-name" name="cc-name" autocomplete="cc-name" pattern="[\p{L} \-\.]+" required>
    </section>

    <section id="cc-exp-csc">
      <div>
        <label for="cc-exp">Date d'expiration</label>
        <input id="cc-exp" name="cc-exp" autocomplete="cc-exp" placeholder="MM/YY" maxlength="5" required>
      </div>
      <div>
        <label for="cc-csc">CVV</label>
        <input id="cc-csc" name="cc-csc" autocomplete="cc-csc" maxlength="3" required>
      </div>
    </section>

    <a id="complete-payment" href="">Payer ma commande</a>
  </form>
</div>