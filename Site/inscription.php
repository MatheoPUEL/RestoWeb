<?php
    //connexion à la base de données:
    include "./function/db_function.php";
    $dbh = db_connect();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>

    <h1>Inscription </h1>

    <form action="inscription.php" method="POST">
        <label for="login">Nom</label>
        <input type="text" id="login" name="login">
        <label for="login">Prénom</label>
        <input type="text" id="prenom" name="prenom">
        <label for="email">Email</label>
        <input type="text" id="email" name="email">
        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password">
        <label for="password">Répétez votre mot de passe</label>
        <input type="password" id="repeatpassword" name="repeatpassword">
        <input type="submit" id=""submit name="submit">
    </form>

    <?php 

        $sql = ("INSERT INTO utilisateur(loginUtilisateur,prenomUtil,emailUtilisateur,mdpUtilisateur) VALUES (:login,:prenom,:email,:password)");
        $login = ""; 
        $prenom = "";
        $email = "";
        $password = "";
        $repeatpassword = "";

        //si toutes les variables sont remplies on continue
        if(isset($_POST["login"]) && isset($_POST["prenom"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["repeatpassword"])){
            $login = htmlspecialchars(trim($_POST["login"]));
            $prenom = htmlspecialchars(trim($_POST["prenom"]));
            $email = htmlspecialchars(trim($_POST["email"]));
            $password = htmlspecialchars(trim($_POST["password"]));
            $repeatpassword = htmlspecialchars(trim($_POST["repeatpassword"]));

            if(strlen($password)>=8){
                if($password==$repeatpassword){
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $password = substr($password, 0, 40);

                    try{
                        $sth = $dbh->prepare($sql);
                        $sth->execute(array(":login" => $login ,":prenom" => $prenom, ":email" => $email, ":password" => $password,));
                        $messagev = "Inscription prise en compte !";
                        echo $messagev;
                    } catch(PDOException){
                        $messager_mdp = "Erreur lors de l'inscription, veuillez réessayer plus tard : ";
                        echo $messager_mdp;
                    }
                } else {
                    $messager_mdp = "Les mots de passe ne correspondent pas";
                    echo $messager_mdp;
                }
            } else {
                $messager_str = "Le mot de passe doit être supérieur à 8 caractères";
                echo $messager_str;
            }
            
        }
    ?>
</body>
</html>