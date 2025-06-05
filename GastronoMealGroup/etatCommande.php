<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>États de la Commande</title>
    <link rel="stylesheet" href="css/header2.css"/>
    <link rel="stylesheet" href="css/styles.css"/>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white h-screen flex flex-col items-center p-8 space-y-8">
<?php
        include_once("header2.php");
    ?>
    <!-- Header avec le titre et le sous-titre -->
    <div class="w-full text-center mb-8">
        <h1 class="text-5xl font-bold">États de la commande</h1>
        <p class="text-lg text-gray-500 mt-2">Mac donald</p>
    </div>

    <!-- Section de suivi de commande -->
    <div class="grid grid-cols-3 gap-8 w-full max-w-5xl">
        <!-- Carte Créée -->
        <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center space-y-4">
            <div class="w-20 h-20 bg-gray-300 rounded-md flex items-center justify-center">
                <img src="#" alt="" class="opacity-50">
            </div>
            <span class="text-lg font-medium">Créée</span>
        </div>
        <!-- Carte En route -->
        <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center space-y-4">
            <div class="w-20 h-20 bg-gray-300 rounded-md flex items-center justify-center">
                <img src="#" alt="" class="opacity-50">
            </div>
            <span class="text-lg font-medium">En route</span>
        </div>
        <!-- Carte En attente de récupération -->
        <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center space-y-4">
            <div class="w-20 h-20 bg-gray-300 rounded-md flex items-center justify-center">
                <img src="#" alt="" class="opacity-50">
            </div>
            <span class="text-lg font-medium text-center">En attente de récupération</span>
        </div>
    </div>

    <!-- Section Statut Récupérée -->
    <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-5xl flex flex-col items-center space-y-4 mt-8">
        <div class="w-20 h-20 bg-gray-300 rounded-md flex items-center justify-center">
            <img src="#" alt="" class="opacity-50">
        </div>
        <span class="text-lg font-medium">Récupérée</span>
    </div>

    <!-- Section Évaluation -->
    <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-sm flex flex-col items-center space-y-4 mt-8">
        <!-- Étoiles d'évaluation -->
        <div class="flex space-x-1">
            <!-- Étoiles vides (emplacement réservé) -->
            <p class="text-gray-400">tp</p>
            <p class="text-gray-400">tp</p>
            <p class="text-gray-400">tp</p>
            <p class="text-gray-400">tp</p>
            <p class="text-gray-400">tp</p>
        </div>
        <!-- Détails de l'évaluation -->
        <div class="text-center">
            <h2 class="text-lg font-medium">Une petite note</h2>
            <p class="text-sm text-gray-500">Corps de l'avis</p>
        </div>
        <!-- Information sur l'évaluateur -->
        <div class="flex items-center space-x-2">
            <img src="#" alt="" class="w-6 h-6 rounded-full">
            <div class="text-sm text-gray-500">
                <p>Nom de l'évaluateur</p>
                <p>Date</p>
            </div>
        </div>
    </div>

    <!-- Barre de navigation en bas avec deux boutons -->
    <div class="w-full bg-white text-black text-center py-3 flex mt-8">
        <button href="creationCommande.php" class="w-1/2 text-sm bg-white text-black py-2 px-4 hover:bg-gray-100 transition">Liste des commandes</button>
        <button class="w-1/2 text-sm bg-black text-white py-2 px-4 hover:bg-gray-700 transition">Où se trouve mon plat</button>
    </div>
    <?php
        include_once("footer.php");
    ?>
</body>
</html>
