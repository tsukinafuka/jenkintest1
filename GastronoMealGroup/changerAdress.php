<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changer Adresse</title>
    <link rel="stylesheet" href="css/header2.css?v=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 h-screen relative">
<?php
        include_once("header.php");
    ?>
    <div class="container mx-auto h-full flex">
        <div class="flex flex-col items-center justify-center flex-grow">
            <h1 class="text-xl font-semibold mb-4">Changer adresse</h1>
            <div class="bg-white p-4 rounded-lg shadow-md w-72">
                <form class="space-y-3">
                    <div>
                        <label for="adresse" class="block text-sm font-medium text-gray-700">Adresse</label>
                        <input type="text" id="adresse" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" placeholder="Rue de l'exemple, 123">
                    </div>
                    <div>
                        <label for="ville" class="block text-sm font-medium text-gray-700">Ville</label>
                        <input type="text" id="ville" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" placeholder="Ville">
                    </div>
                    <div>
                        <label for="code-postal" class="block text-sm font-medium text-gray-700">Code Postal</label>
                        <input type="text" id="code-postal" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" placeholder="Code Postal">
                    </div>
                    <div class="flex items-center">
                        <input id="save-address" type="checkbox" class="h-4 w-4 text-black focus:ring-black border-gray-300 rounded">
                        <label for="save-address" class="ml-2 text-sm text-gray-900">Enregistrer l'adresse</label>
                    </div>
                    <button type="submit" class="w-full bg-black text-white py-2 rounded-md hover:bg-gray-800 transition">Nouvelle adresse</button>
                </form>
            </div>
            <button class="mt-3 bg-black text-white py-2 px-4 rounded-md hover:bg-gray-800 transition">Retour</button>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md w-80 h-auto relative top-8 left-20">
            <h2 class="text-xl font-semibold mb-3">Adresse</h2>
            <hr class="border-gray-300 my-4">
            <div class="space-y-4">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <img src="images/etoile.png" alt="Étoile" class="w-4 h-4 mr-2">
                        <div>
                            <span class="block text-sm font-medium">Rue de l'exemple, 123</span>
                            <span class="block text-xs text-gray-500">Ville Exemple</span>
                            <span class="block text-xs text-gray-500">75000</span>
                        </div>
                    </div>
                    <div class="flex gap-1">
                        <button class="bg-white text-black py-1 px-2 rounded-md border border-black hover:bg-gray-100 transition">Modifier</button>
                        <button class="bg-black text-white py-1 px-2 rounded-md hover:bg-gray-800 transition">Supprimer</button>
                    </div>
                </div>
                <hr class="border-gray-300 my-4">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <img src="images/etoileJaune.png" alt="Étoile Jaune" class="w-4 h-4 mr-2">
                        <div>
                            <span class="block text-sm font-medium">Avenue de l'exemple, 456</span>
                            <span class="block text-xs text-gray-500">Ville Exemple 2</span>
                            <span class="block text-xs text-gray-500">12345</span>
                        </div>
                    </div>
                    <div class="flex gap-1">
                        <button class="bg-white text-black py-1 px-2 rounded-md border border-black hover:bg-gray-100 transition">Modifier</button>
                        <button class="bg-black text-white py-1 px-2 rounded-md hover:bg-gray-800 transition">Supprimer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        include_once("footer.php");
    ?>
</body>
</html>
