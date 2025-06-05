<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Déclaration du jeu de caractères utilisé (UTF-8) -->
    <meta charset="UTF-8">
    <!-- Configuration de la mise à l'échelle pour les appareils mobiles -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Titre affiché dans l'onglet du navigateur -->
    <title>GastronoMeal</title>
    <!-- Lien vers la feuille de styles CSS avec un paramètre versionné pour éviter le cache -->
    <link rel="stylesheet" href="css/styles.css?v=2.0">
    <!-- Favicon du site (icône affichée dans l'onglet du navigateur) -->
    <link rel="icon" href="GastronoMealGroup/images/G-meal-2.ico">
</head>

<!-- Popup -->
<!-- Conteneur principal de la fenêtre popup, avec une classe par défaut "popup-hidden" pour la masquer -->
<div id="popup" class="popup-hidden">
    <div class="popup-content">
        <!-- Bouton de fermeture de la popup, redirigeant vers la page "index.php" -->
        <a href="index.php" class="close_btn">&times;</a>
        <!-- Message d'accueil affiché dans la popup -->
        <h2>Bienvenue</h2>
        <!-- Texte invitant l'utilisateur à se connecter ou à s'inscrire -->
        <p>Souhaitez-vous vous connecter ou vous inscrire ?</p>
        <!-- Bouton pour rediriger l'utilisateur vers la page de connexion -->
        <a href="login.php">
            <button class="popup-btn" id="loginBtn">Se connecter</button>
        </a>
        <!-- Bouton pour rediriger l'utilisateur vers la page d'inscription -->
        <a href="register.php">
            <button class="popup-btn" id="signupBtn">S'inscrire</button>
        </a>
    </div>
</div>
</html>
