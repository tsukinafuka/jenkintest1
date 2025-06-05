<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Adresse</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen relative">
    <div class="container mx-auto h-full flex">
        <!-- Section Formulaire centrée -->
        <div class="flex flex-col items-center justify-center flex-grow space-y-6">
            <!-- Titre du formulaire -->
            <h1 class="text-xl font-semibold mb-4">Modifier adresse</h1>
            <!-- Formulaire de modification d'adresse -->
            <div class="bg-white p-6 rounded-lg shadow-md w-80">
                <form class="space-y-5">
                    <!-- Adresse existante avec bouton de modification -->
                    <div class="flex justify-between items-center">
                        <label for="adresse" class="text-sm font-medium text-gray-700">Adresse :</label>
                        <span class="text-sm">12 Rue de l'horizon</span>
                        <button type="button" class="bg-black text-white py-1 px-2 rounded-md hover:bg-gray-800 transition">Modifier</button>
                    </div>
                    <!-- Ville existante avec bouton de modification -->
                    <div class="flex justify-between items-center">
                        <label for="ville" class="text-sm font-medium text-gray-700">Ville :</label>
                        <span class="text-sm">Lannion</span>
                        <button type="button" class="bg-black text-white py-1 px-2 rounded-md hover:bg-gray-800 transition">Modifier</button>
                    </div>
                    <!-- Code Postal existant avec bouton de modification -->
                    <div class="flex justify-between items-center">
                        <label for="code-postal" class="text-sm font-medium text-gray-700">Code Postal :</label>
                        <span class="text-sm">22300</span>
                        <button type="button" class="bg-black text-white py-1 px-2 rounded-md hover:bg-gray-800 transition">Modifier</button>
                    </div>
                    <!-- Checkbox pour enregistrer l'adresse -->
                    <div class="flex items-center">
                        <input id="save-address" type="checkbox" class="h-4 w-4 text-black focus:ring-black border-gray-300 rounded">
                        <label for="save-address" class="ml-2 text-sm text-gray-900">Enregistré l'adresse</label>
                    </div>
                    <!-- Bouton pour soumettre les modifications -->
                    <button type="submit" class="w-full bg-black text-white py-2 rounded-md hover:bg-gray-800 transition">Modifier adresse</button>
                </form>
            </div>
            <!-- Bouton Retour -->
            <button class="mt-3 bg-black text-white py-2 px-4 rounded-md hover:bg-gray-800 transition">Retour</button>
        </div>
    </div>
</body>
</html>
