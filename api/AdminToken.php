<!DOCTYPE html>
<html>
<head>
    <title>Générateur de Token</title>
</head>
<body>
    <h1>Générateur de Token</h1>
    <form id="tokenForm" method="post">
        <p>Entrez votre adresse e-mail :</p>
        <input type="email" name="email" id="email" placeholder="Adresse e-mail" required>
        <input type="submit" name="submit" value="Générer Token">
    </form>
    <p>Token généré :</p>
    <p id="tokenDisplay">
        <?php
        // Afficher le token généré après soumission du formulaire, si disponible
        if (isset($_SESSION['token'])) {
            echo $_SESSION['token'];
            unset($_SESSION['token']); // Effacer la variable de session après affichage
        }
        ?>
    </p>

    <script src="generateToken.js"></script>
</body>
</html>
