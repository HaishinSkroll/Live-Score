<?php
    // Générer un token
    $heure_actuelle = date('Hi');
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomPart = '';

    // Générer 12 caractères aléatoires
    for ($i = 0; $i < 12; $i++) {
        $randomPart .= $characters[rand(0, $charactersLength - 1)];
    }

    // Concaténer l'heure avec les caractères aléatoires
    $token = $heure_actuelle . $randomPart;

    $sql = 'mysql';
    $host = 'localhost';
    $bdd = 'Live_Score';
    $login = 'root';
    $mdp = '';
    
    try {
        $cnx = new PDO("$sql:host=$host;dbname=$bdd", $login, $mdp);
    }
    catch (PDOException $e) {
        echo 'Erreur connexion : '. $e->getMessage();
    }

    try {
          // Préparez et exécutez la requête SQL d'insertion avec l'adresse e-mail et le token
        $ins = $cnx->prepare("INSERT INTO Live_Score.user (mail, cle) VALUES(?, ?)");
        $ins->execute(["jonas.pustay@outlook.fr", $token]);

        // Affichez un message de succès
        echo "Adresse e-mail insérée avec succès dans la base de données : $email";

        // Fermez la connexion à la base de données
        $cnx = null;
    } catch (PDOException $e) {
        echo "Erreur lors de l'insertion dans la base de données : " . $e->getMessage();
    }
    // Récupérer l'adresse e-mail depuis la requête GET
$mail = isset($_GET['email']) ? $_GET['email'] : '';

// Vérifier si l'adresse e-mail est vide
if (!empty($mail)) {
    // Envoyer un e-mail avec le token
    $subject = "Votre token généré";
    $message = "Voici votre token généré : " . $token;
    $headers = "From: VotreAdresseEmail@domaine.com";

    if (mail($mail, $subject, $message, $headers)) {
        echo 'Token généré et envoyé par e-mail à ' . $mail;
    } else {
        echo 'Erreur lors de l\'envoi de l\'e-mail.';
    }
} else {
    echo 'L\'adresse e-mail est vide. Veuillez saisir une adresse e-mail.';
}
?>
