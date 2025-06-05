<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>GastronoMeal</title>
    <!-- Configuration pour un affichage responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A brief description of your page.">
    <!-- Lien vers les fichiers CSS -->
    <link rel="stylesheet" href="css/styles.css?v=5.5">
    <!-- Feuille de style et script pour la bibliothèque Leaflet (cartographie interactive) -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <!-- POST DEV POUR PROD <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14/dist/vue.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>

    <!-- Favicon de la page -->
    <link rel="icon" href="../G-meal-2.ico" type="image/x-icon">
</head>
<body>
    <!-- Inclusion du header avec PHP -->
    <?php require_once("header.php"); ?>
    <div id="app" class="containerPrincipal">
        <!-- Container 2 : Formulaire pour trouver un restaurant -->
        <div class="container_2">
            <div class="superpoImage">
                <!-- Section pour saisir l'adresse de livraison -->
                <div class="foundAdress">
                    <img src="images/localisateur.png" alt="icone localisation" class="iconeLocal" width="20px" height="20px">
                    <label for="addLivraison"></label>
                    <input type="text" id="addLiv" name="addLivraison" placeholder="Saisissez l'adresse de livraison.">
                </div>

                <!-- Section pour choisir le moment de la livraison -->
                <div class="whenLivraison">
                    <div class="btn-group" role="group">
                        <!-- Bouton dropdown pour choisir le moment -->
                        <button @click="toggleMenu" type="button" class="btn-dropdown" :class="{ close: isButtonHide }">   
                            <img src="images/temps.png" alt="time liv" width="35px" height="35px"> {{ buttonText }}
                            <img src="images/chevron-bas.png" alt="chevron bas" width="20px" height="20px">
                        </button>
                        <!-- Liste déroulante (affichée selon "isDropdownVisible") -->
                        <ul :class="{ active: isDropdownVisible }" class="dropdown-menu" ref="dropdownMenu">
                            <li><a @click.prevent="setDeliveryOption('Livrer maintenant')" class="dropdown-item" href="#">Livrer maintenant</a></li>
                            <li><a @click.prevent="setDeliveryOption('Livrer plus tard')" class="dropdown-item" href="#">Livrer plus tard</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Bouton pour rechercher un restaurant -->
                <button class="foundRetaurantBtn">Trouver un restaurant</button>
            </div>
        </div>
    </div>

    <!-- Container 1 : Section promotionnelle pour différents services -->
    <div class="container_1">
        <div class="LivFoodPro">
            <!-- Section pour proposer un restaurant -->
            <div class="foodpro">
                <img src="images/foodpro.png" alt="foodpro">
                <h3>Envie de partager votre talent ?</h3>
                <a href="#">Ajouter votre restaurant</a>
            </div>
            <!-- Section pour proposer des plats à réserver -->
            <div class="platliv">
                <img src="images/platliv.png" alt="platliv">   
                <h3>Laissez les réserver chez vous</h3>
                <a href="#"></a>
            </div>
            <!-- Section pour devenir livreur -->
            <div class="livreur">
                <img src="images/livreur.png" alt="livreur">
                <h3>Devenir livreur chez G-Meal</h3>
                <a href="#">Devenez livreur-partenaire</a>
            </div>
        </div> 
    </div>

    <!-- Container 3 : Carte interactive et tableau de résultats -->
    <div class="container3">
        <div id="map">
            <!-- La carte sera générée par le script "scripts.js" -->
        </div>
        <script src="./js/scripts.js"></script>
        <!-- Section pour afficher des informations sur les restaurants -->
        <div class="foundCity">
            <!-- Affiche des informations sur le restaurant sélectionné -->
            <div v-if="selectedRestaurant === King Kebab">
                {{ restaurant.name }}
            </div>
            <table>
                <tbody>
                    <th>{{ texte }}</th>
                    <tr> 
                        <td></td>
                    </tr>
                    <tr>        
                        <td>Numero</td>
                    </tr>
                    <tr>
                        <td>adresse</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Inclusion du footer avec PHP -->
    <?php require_once('footer.php'); ?>

    <!-- Ajout de Vue.js -->
    <!-- Lien en commentaire pour la version de production -->
    <script>
        new Vue({
            el: '#app', // Cible l'élément contenant l'id "app"

            data: {
                isDropdownVisible: false, // Indique si le menu déroulant est visible
                isButtonHide: false, // Indique si le bouton est en état "fermé"
                buttonText: ('Livrer maintenant'), // Texte du bouton dropdown
            },

            methods: {
                // Méthode pour définir l'option de livraison
                setDeliveryOption(option) {
                    this.buttonText = option; // Change le texte du bouton
                    this.isDropdownVisible = false; // Cache le menu déroulant
                },

                // Méthode pour afficher/masquer le menu déroulant
                toggleMenu() {
                    this.isDropdownVisible = !this.isDropdownVisible;
                    this.isButtonHide = this.isDropdownVisible;
                },

                // Méthode pour gérer le clic en dehors du menu
                handleClickOutside(event) {
                    const button = event.target.closest('.btn-dropdown');
                    const dropdownMenu = this.$refs.dropdownMenu;
                    if (!button) { // Si l'utilisateur clique en dehors du menu
                        this.isDropdownVisible = false;
                        this.isButtonHide = false;
                    }
                },
            },

            mounted() {
                // Ajoute un écouteur d'événements pour détecter les clics
                document.addEventListener('click', this.handleClickOutside);
            },

            beforeDestroy() {
                // Supprime l'écouteur d'événements lorsque le composant est détruit
                document.removeEventListener('click', this.handleClickOutside);
            }
        });
    </script>
</body>
</html>
