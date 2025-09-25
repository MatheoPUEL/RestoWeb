<?php 
include("Bdd/bdd_co.php");   
session_start();  
$pdo = db_connect();   
$message = ""; 

if (isset($_POST["login"]) && isset($_POST["password"])){     
    $login = $_POST["login"];     
    $password = $_POST["password"];     
    $sql = "SELECT * FROM utilisateur WHERE LoginUtilisateur = :utilisateur";          
    
    try {         
        $stmt = $pdo->prepare($sql);          
        $stmt->execute([":utilisateur" => $login]);          
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);     
    } catch (PDOException $ex){         
        die("ERREUR lors de la requête: " . $ex->getMessage());     
    }              
    
    // Vérifier si l'utilisateur existe et vérifier le mot de passe
    if($userData && $login == $userData["loginUtilisateur"] && $password = $userData['mdpUtilisateur']){         
        $_SESSION['loginUtilisateur'] = $userData['loginUtilisateur'];          
        header('Location: index.html');
        exit(); // Important : arrêter l'exécution du script après la redirection
    } else {         
        $message = 'Identifiant ou mot de passe incorrect';     
    }   
}   
?> 

<!DOCTYPE html> 
<html lang="fr"> 
<head>     
    <meta charset="UTF-8">     
    <meta name="viewport" content="width=device-width, initial-scale=1.0">     
    <link rel="stylesheet" href="css/main.css">     
    <title>AppResto - Connexion</title> 
</head> 
<body>     
    <form action="connexion.php" method="post">     
        <h1>Connexion</h1>
        
        <?php if(!empty($message)): ?>
            <div class="error-message" style="color: red; margin-bottom: 10px;">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>
        
        <div>              
            <label for="login">Login ou email</label>              
            <input type="text" name="login" id="login" required>         
        </div>     
        <br>          
        <div>             
            <label for="password">Mot de passe</label>             
            <input type="password" name="password" id="password" required>         
        </div>     
        <br>         
        <div>              
            <input type="submit" name="connexion" value="Connexion">          
        </div>  
    </form> 
</body> 
</html>