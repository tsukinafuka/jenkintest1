<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/header2.Css"/>
  <link rel="stylesheet" href="css/styles.css"/>
  <title>Tableau de bord avec Vue.js et Chart.js</title>
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Vue.js -->
  <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100">

<?php
require_once("header2.php");
?>

<div id="app" class="min-h-screen p-6 bg-gray-100" v-cloak>
  <div class="flex">
    <!-- Barre latérale gauche -->
    <aside class="w-1/5 bg-white p-4 shadow-lg rounded-lg mr-6">
      <h3 class="text-lg font-semibold mb-4">Sur l'année :</h3>
      <div class="flex flex-wrap gap-2 mb-4">
        <span class="px-3 py-1 bg-gray-200 text-gray-700 rounded-full">3 mois</span>
        <span class="px-3 py-1 bg-gray-200 text-gray-700 rounded-full">6 mois</span>
        <span class="px-3 py-1 bg-gray-200 text-gray-700 rounded-full">9 mois</span>
      </div>

      <!-- Cases à cocher -->
      <ul class="space-y-2">
        <li><label class="flex items-center"><input type="checkbox" class="mr-2" checked> Panier Moyen <span class="text-sm text-gray-500 ml-2">cumul commande</span></label></li>
        <li><label class="flex items-center"><input type="checkbox" class="mr-2" checked> Nouveau Restaurants <span class="text-sm text-gray-500 ml-2">Nombres restaurants</span></label></li>
        <li><label class="flex items-center"><input type="checkbox" class="mr-2" checked> CA <span class="text-sm text-gray-500 ml-2">Chiffre d'affaire en €</span></label></li>
      </ul>

      <!-- Sections Clients -->
      <h4 class="mt-4 mb-2 font-semibold">Clients</h4>
      <ul class="space-y-2">
        <li><label class="flex items-center"><input type="checkbox" class="mr-2" checked> Nouveaux clients</label></li>
        <li><label class="flex items-center"><input type="checkbox" class="mr-2"> Clients supprimés</label></li>
        <li><label class="flex items-center"><input type="checkbox" class="mr-2"> Clients par restaurants</label></li>
      </ul>

      <!-- Sections Commandes -->
      <h4 class="mt-4 mb-2 font-semibold">Commandes</h4>
      <ul class="space-y-2">
        <li><label class="flex items-center"><input type="checkbox" class="mr-2" checked> Nouvelles commandes</label></li>
        <li><label class="flex items-center"><input type="checkbox" class="mr-2"> Nombre commandes</label></li>
        <li><label class="flex items-center"><input type="checkbox" class="mr-2"> Commandes annulées</label></li>
      </ul>
    </aside>

    <!-- Contenu principal -->
    <div class="w-4/5 flex flex-col">
      <!-- Statistiques principales sur une ligne en haut -->
      <div class="flex justify-between mb-6">
        <div class="bg-purple-100 p-4 rounded-lg shadow text-center w-1/5">
          <h4 class="text-xl font-bold">12 376 clients</h4>
          <p class="text-green-600">+35%</p>
        </div>
        <div class="bg-green-100 p-4 rounded-lg shadow text-center w-1/5">
          <h4 class="text-xl font-bold">48 934 commandes</h4>
          <p class="text-green-600">+70%</p>
        </div>
        <div class="bg-yellow-100 p-4 rounded-lg shadow text-center w-1/5">
          <h4 class="text-xl font-bold">Nouveau Restaurants</h4>
          <p class="text-green-600">+7%</p>
        </div>
        <div class="bg-gray-100 p-4 rounded-lg shadow text-center w-1/5">
          <h4 class="text-xl font-bold">Panier moyen</h4>
          <p class="text-green-600">+23%</p>
        </div>
      </div>

      <!-- Contenu divisé : Graphique à gauche, Sélecteur de date et CA à droite -->
      <div class="flex space-x-6">
        <!-- Graphique à gauche -->
        <div class="w-3/4 bg-white p-6 rounded-lg shadow-lg">
          <canvas id="chartClientsCommandes"></canvas>
        </div>

        <!-- Section Sélecteur de Date et CA à droite dans un bloc -->
        <div class="w-1/4 bg-white p-6 shadow-lg rounded-lg">
          <div class="bg-purple-100 p-6 rounded-lg shadow mb-6">
            <label for="date" class="block text-lg font-semibold mb-2">Select date</label>
            <h4 class="text-xl font-bold mb-4">Enter date</h4>
            <input type="text" id="date" placeholder="mm/dd/yyyy" class="border border-gray-300 p-2 rounded-lg w-full">
            <div class="flex justify-between text-sm mt-4">
              <button class="text-gray-500">Cancel</button>
              <button class="text-gray-500">OK</button>
            </div>
          </div>

          <div class="bg-gray-100 p-4 rounded-lg shadow">
            <h4 class="text-lg font-bold">CA du jour :</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Script Vue.js -->
<script>
  new Vue({
    el: '#app',
    mounted() {
      this.renderChart();
    },
    methods: {
      renderChart() {
        const ctx = document.getElementById('chartClientsCommandes').getContext('2d');
        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ['3 Mois', '6 Mois', '9 Mois', '1 an'],  // Labels des périodes
            datasets: [
              {
                label: 'Clients',
                data: [12, 19, 3, 5],  // Données pour les clients
                backgroundColor: 'rgba(153, 102, 255, 0.2)',  // Couleur des barres
                borderColor: 'rgba(153, 102, 255, 1)',  // Couleur des bordures
                borderWidth: 1
              },
              {
                label: 'Commandes',
                data: [15, 29, 8, 12],  // Données pour les commandes
                backgroundColor: 'rgba(75, 192, 192, 0.2)',  // Couleur des barres
                borderColor: 'rgba(75, 192, 192, 1)',  // Couleur des bordures
                borderWidth: 1
              }
            ]
          },
          options: {
            responsive: true,
            scales: {
              y: {
                beginAtZero: true  // Commence à 0 pour l'axe Y
              }
            }
          }
        });
      }
    }
  });
</script>
<?php
  require_once("footer.php");
?>
</body>
</html>
