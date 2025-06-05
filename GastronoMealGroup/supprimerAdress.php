<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changer Adresse</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen relative">
    <!-- Page d'arrière-plan avec interaction désactivée -->
    <div class="container mx-auto h-full flex opacity-50 pointer-events-none">
        <!-- Section Formulaire centrée -->
        <div class="flex flex-col items-center justify-center flex-grow">
            <!-- Titre du formulaire -->
            <h1 class="text-xl font-semibold mb-4">Changer adresse</h1>
            <!-- Formulaire de modification d'adresse -->
            <div class="bg-white p-4 rounded-lg shadow-md w-72">
                <form class="space-y-3">
                    <!-- Champ Adresse -->
                    <div>
                        <label for="adresse" class="block text-sm font-medium text-gray-700">Adresse</label>
                        <input type="text" id="adresse" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" placeholder="Rue de l'exemple, 123">
                    </div>
                    <!-- Champ Ville -->
                    <div>
                        <label for="ville" class="block text-sm font-medium text-gray-700">Ville</label>
                        <input type="text" id="ville" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" placeholder="Ville">
                    </div>
                    <!-- Champ Code Postal -->
                    <div>
                        <label for="code-postal" class="block text-sm font-medium text-gray-700">Code Postal</label>
                        <input type="text" id="code-postal" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" placeholder="Code Postal">
                    </div>
                    <!-- Checkbox pour enregistrer l'adresse -->
                    <div class="flex items-center">
                        <input id="save-address" type="checkbox" class="h-4 w-4 text-black focus:ring-black border-gray-300 rounded">
                        <label for="save-address" class="ml-2 text-sm text-gray-900">Enregistrer l'adresse</label>
                    </div>
                    <!-- Bouton pour soumettre une nouvelle adresse -->
                    <button type="submit" class="w-full bg-black text-white py-2 rounded-md hover:bg-gray-800 transition">Nouvelle adresse</button>
                </form>
            </div>
            <!-- Bouton Retour -->
            <button class="mt-3 bg-black text-white py-2 px-4 rounded-md hover:bg-gray-800 transition">Retour</button>
        </div>

        <!-- Section Liste des Adresses alignée complètement à droite -->
        <div class="bg-white p-4 rounded-lg shadow-md w-80 h-auto absolute top-8 right-8">
            <!-- Titre de la section des adresses enregistrées -->
            <h2 class="text-xl font-semibold mb-3">Adresse</h2>
            <hr class="border-gray-300 my-4">
            <div class="space-y-4">
                <!-- Carte d'adresse 1 -->
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <!-- Icône étoile -->
                        <img src="images/etoile.png" alt="Étoile" class="w-4 h-4 mr-2">
                        <div>
                            <!-- Détails de l'adresse -->
                            <span class="block text-sm font-medium">Rue de l'exemple, 123</span>
                            <span class="block text-xs text-gray-500">Ville Exemple</span>
                            <span class="block text-xs text-gray-500">75000</span>
                        </div>
                    </div>
                    <!-- Boutons Modifier et Supprimer -->
                    <div class="flex gap-1">
                        <button class="bg-white text-black py-1 px-2 rounded-md border border-black hover:bg-gray-100 transition">Modifier</button>
                        <button class="bg-black text-white py-1 px-2 rounded-md hover:bg-gray-800 transition">Supprimer</button>
                    </div>
                </div>
                <hr class="border-gray-300 my-4">
                <!-- Carte d'adresse 2 -->
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <!-- Icône étoile jaune -->
                        <img src="images/etoileJaune.png" alt="Étoile Jaune" class="w-4 h-4 mr-2">
                        <div>
                            <!-- Détails de l'adresse -->
                            <span class="block text-sm font-medium">Avenue de l'exemple, 456</span>
                            <span class="block text-xs text-gray-500">Ville Exemple 2</span>
                            <span class="block text-xs text-gray-500">12345</span>
                        </div>
                    </div>
                    <!-- Boutons Modifier et Supprimer -->
                    <div class="flex gap-1">
                        <button class="bg-white text-black py-1 px-2 rounded-md border border-black hover:bg-gray-100 transition">Modifier</button>
                        <button class="bg-black text-white py-1 px-2 rounded-md hover:bg-gray-800 transition">Supprimer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Confirmation de Suppression -->
    <div class="bg-white p-6 rounded-lg shadow-md w-96 flex flex-col items-center space-y-4 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
        <!-- Icône d'information et texte de confirmation -->
        <div class="flex items-center space-x-2">
            <span class="text-2xl">ℹ️</span>
            <h1 class="text-xl font-semibold">Supprimer</h1>
        </div>
        <!-- Boutons Retour et Supprimer -->
        <div class="flex gap-4">
            <button class="bg-gray-300 text-black py-2 px-4 rounded-md hover:bg-gray-400 transition">Retour</button>
            <button class="bg-black text-white py-2 px-4 rounded-md hover:bg-gray-800 transition">Supprimer</button>
        </div>
    </div>
</body>
</html>
