<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suivi de Commande Gratuit</title>
    <link rel="stylesheet" href="css/header2.css?v=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map {
            width: 100%;
            height: 600px;
        }
    </style>
</head>

<body class="bg-white h-screen flex flex-col items-center p-8 space-y-8">
    <?php
        require_once("header.php");
    ?>

    <!-- Section de la carte -->
    <div id="map" class="w-full max-w-5xl mb-4 rounded-lg shadow-md"></div>

    <!-- Barre de navigation en bas avec deux boutons -->
    <div class="w-full bg-white text-black text-center py-3 flex mt-8">
        <button class="w-1/2 text-sm bg-white text-black py-2 px-4 hover:bg-gray-100 transition">Liste des commandes</button>
        <button class="w-1/2 text-sm bg-black text-white py-2 px-4 hover:bg-gray-700 transition">État de la commande</button>
    </div>

    <!-- Script de Leaflet -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        // Initialisation de la carte centrée sur Pleumeur-Bodou
        var map = L.map('map').setView([48.7833, -3.5167], 13); // Coordonnées de Pleumeur-Bodou

        // Ajouter les tuiles OpenStreetMap à la carte
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Ajouter un marqueur sur la carte (pour la voiture/scooter)
        var marker = L.marker([48.7833, -3.5167]).addTo(map)
            .bindPopup('Votre commande est en route.')
            .openPopup();

        // Fonction pour simuler le déplacement du scooter/voiture
        function moveMarker() {
            var newLat = 48.7833 + (Math.random() - 0.5) * 0.01;
            var newLng = -3.5167 + (Math.random() - 0.5) * 0.01;
            marker.setLatLng([newLat, newLng])
                .setPopupContent("Position actuelle du livreur.");
        }

        // Déplacer le marqueur toutes les 2 secondes
        setInterval(moveMarker, 2000);
    </script>
    <?php
        include_once("footer.php");
    ?>
</body>

</html>
