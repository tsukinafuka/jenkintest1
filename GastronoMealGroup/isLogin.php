<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GastronoMeal</title>
    <!-- Description de la page -->
    <meta name="description" content="A brief description of your page.">
    <!-- Lien vers le fichier CSS principal -->
    <link rel="stylesheet" href="css/styles.css?v=6.2">
    <!-- Favicon -->
    <link rel="icon" href="GastronoMealGroup/images/G-meal-2.ico">
    <!-- Lien vers un autre fichier CSS spécifique pour le header -->
    <link rel="stylesheet" href="css/header2.css?v=1.5"/>
    <!-- Feuille de style et script pour la bibliothèque Leaflet (cartographie interactive) -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <script src="https://cdn.jsdelivr.net/npm/jwt-decode/build/jwt-decode.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>

</head>
<body>

    <!-- Inclusion du fichier de header via PHP -->
    <?php require_once("header2.php"); ?>
    <!-- Conteneur principal -->
    <div id="app" class="containerPrincipal">
        <!-- Section pour l'accueil -->
        <div id="container-bonjour" class="container_1">
        <p id="okAdress"></p>
        <h1 id="prenomElement"></h1>
        
            <div style="display:flex; width:80%; justify-content:center; align-items:center; text-align:center">
                <h3>Entrez votre adresse pour commencer à commander !</h3>
            </div>
            <!-- Bouton pour ouvrir le popover d'adresse -->
            <button popovertarget="my-popover" class="foundRetaurantBtn">Entrez une adresse</button>  

            <!-- Popover pour saisir une adresse -->
            <div id="my-popover" popover>
                <div class="popoverAdresse">
                    <!-- PART 1 /ville -->
                    <div :class="{ close: hideOptiPopover }" class="optiPopover">
                        <!-- Bouton pour fermer le popover -->
                        <a href="isLogin.php" class="close_btn">&times;</a>
                        <h4>Entrez votre adresse</h4>
                        <!-- Champs pour entrer les détails de l'adresse -->
                        <label>Ville</label>

                        <input id="villeID" type="text" @input="searchVille" placeholder="Ex : Lille, Paris, Lyon...">

                        <label>Code Postal</label>
                        <input type="text">
                        <!--<label>Numéro, rue, autres</label>
                        <input type="text">-->
                        <!-- Boutons pour valider ou annuler -->
                        <div class="buttonPopover">
                            <a href="#">
                                <button @click="valideCity" class="btnWhite buttonNavig">Valider</button>
                            </a>
                            <a href="isLogin.php">
                                <button class="btnBlack buttonNavig">Annuler</button>
                            </a>
                        </div> 
                        <div class="list-city">
                            <ul v-if="suggestions.length">
                            <li v-for="ville in suggestions" :key="ville.idVille" @click="sendCity(ville)">
                            {{ ville.name }} ({{ ville.codePostal }})
                            </li>
                            </ul>
                        </div>
                    </div>
                    <!-- PART 2 /ville -->
                    <div :class="{ active: showOptiPopover2 }" class="optiPopover2">
                        <!-- Bouton pour fermer le popover -->
                        <a href="isLogin.php" class="close_btn">&times;</a>
                        <h4>Entrez votre adresse</h4>
                        <!-- Champs pour entrer les détails de l'adresse -->
                        <label>numéro de rue</label>
                        <input id="numDeRue" type="text" placeholder="Ex : 0, 11, 22...">

                        <label>nom de rue</label>
                        <input id="nomDeRue" type="text" placeholder="Ex :rue de ..., impasse de l'essai...">

                        <label style="color:grey;">details</label>
                        <input id="details" type="text" placeholder="facultatif">
                        
                        <div class="buttonPopover">
                            <a href="#">
                                <button @click="valideRue" class="btnWhite buttonNavig">Valider</button>
                            </a>
                            <a href="isLogin.php">
                                <button class="btnBlack buttonNavig">Annuler</button>
                            </a>
                        </div> 
                    </div>   
                </div> 
            </div> 
        </div>

        <!-- Section pour trouver un restaurant -->
        <div class="container_2">
            <div class="superpoImage">
                <!-- Saisie d'adresse pour trouver un restaurant -->
                <div class="foundAdress">
                    <img src="images/localisateur.png" alt="icone localisation" class="iconeLocal" width="20px" height="20px">
                    <label for="addLivraison"></label>
                    <input type="text" id="addLiv" name="addLivraison" placeholder="Saisissez l'adresse de livraison.">
                </div>
                <!-- Dropdown pour choisir l'heure de livraison -->
                <div class="whenLivraison">
                    <div class="btn-group" role="group">
                        <button @click="toggleMenu" type="button" class="btn-dropdown" :class="{ close: isButtonHide }">
                            {{ buttonText }}
                            <img src="images/chevron-bas.png" alt="chevron bas" width="20px" height="20px">
                        </button>
                        <!-- Menu déroulant -->
                        <ul :class="{ active: isDropdownVisible }" class="dropdown-menu" ref="dropdownMenu">
                            <li>
                                <a @click.prevent="setDeliveryOption('Livrer maintenant')" class="dropdown-item" href="#">Livrer maintenant</a>
                            </li>
                            <li>
                                <a @click.prevent="setDeliveryOption('Livrer plus tard')" class="dropdown-item" href="#">Livrer plus tard</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Bouton pour lancer la recherche de restaurant -->
                <a href="restaurant.php"><button class="foundRetaurantBtn">Trouver un restaurant</button></a>
            </div>
        </div>
        <!-- Conteneur vide pour future expansion -->
        <div class="container3">
            <div id="search-bar-adresse" class="search-bar-adresse">
                <label></label>
                <input id="villeID2" type="text" @input="searchVille" placeholder="Ex : Lille, Paris, Lyon...">
            </div>
            <div class="content-1-off" id="cityID2">
                <ul v-if="suggestions.length">
                <li v-for="ville in suggestions" :key="ville.idVille" @click="sendCity2(ville)">
                {{ ville.name }} ({{ ville.codePostal }})
                </li>
                </ul>
                </div>
            <div id="map">
                <!-- La carte sera générée par le script "scripts.js" -->
            </div>
            <script src="./js/scripts.js"></script>
        </div>
    </div>

    <!-- Inclusion du fichier de footer via PHP -->
    <?php require_once('footer.php'); ?>
    
    <!-- Ajout de Vue.js -->
    <script src="./js/validateToken.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14/dist/vue.js"></script>
    <script src="./js/user.js"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                isDropdownVisible: false, // Indique si le menu déroulant est affiché
                isButtonHide: false, // Gère l'état du bouton
                buttonText: ('Livrer maintenant'), // Texte par défaut du bouton
                isLoggedIn: true,
                suggestions: [], // Pour stocker les villes proposées
                valueSendCity: '', // Stock le nom de la ville selectionnée
                valueSendPostal: '', // Stock le code postal de la ville selectionnée
                valueSendAdresse: '', // Stock le numero de rue (input)
                valueSendRue: '', // Stock l'adresse (nom de rue) (input)
                valueSendDetail: '', // Sotck les details (input)
                hideOptiPopover: false,
                showOptiPopover2: false,
                valueSendId: '',
                valueSendIdUser: '',
                validateAdresse: false,
            },
            methods: {
                async searchVille(event) {
                    const value = event.target.value;
                    console.log("Saisie utilisateur :", value);

                    if (value.length >= 2) {
                        const ecouteCity2 = document.getElementById('cityID2');
                        ecouteCity2.className = "list-city2";
                        try {
                            console.log("Appel API déclenché");

                            const response = await fetch(`http://localhost:8080/api/ville/search?q=${encodeURIComponent(value)}`, {
                                method: 'GET',
                                headers: {
                                    'Authorization': `Bearer ${localStorage.getItem('token')}`
                                }
                            });

                            console.log("Réponse brute :", response);

                            if (response.ok) {
                                const data = await response.json();
                                console.log('Suggestions reçues :', data);
                                this.suggestions = data;

                            } else {
                                console.error('Erreur HTTP :', response.status);
                            }
                        } catch (error) {
                            console.error('Erreur fetch :', error);
                        }
                    }
                },
                async saveAdress() {
                    console.log('lancement saveAdress()..');
                    try {
                        const response = await fetch(`http://localhost:8080/api/adresse`, { // voir pour le endpoint /!\
                            method: 'POST',
                            headers: {
                                'Authorization': `Bearer ${localStorage.getItem('token')}`,
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                "adresse": this.valueSendAdresse,
                                "detail": this.valueSendDetail,
                                "rue": this.valueSendRue,
                                "ville": {
                                    "idVille": this.valueSendId
                                }
                            })
                        });
                        
                        if (response.ok) {
                            const data = await response.json();
                            console.log('Réponse JSON :', data);
                            this.validateAdresse = true;
                            if (this.validateAdresse = true) {
                                window.location.href = 'profilClient.php';
                            }
                        } else {
                            const err = await response.text();
                            console.error('Erreur HTTP : ', response.status, err);
                        }

                    } catch (error) {
                        console.error('Erreur fetch :');
                    }
                },
                sendCity(ville) {
                    console.log('Ville sélectionnée :', ville);
                    document.querySelectorAll("#villeID").value = ville.name;
                    this.valueSendCity = ville;
                    this.valueSendId = ville.idVille;
                    const cpInput = document.querySelector('input[type="text"]:nth-of-type(2)');
                    cpInput.value = ville.codePostal;
                    this.valueSendPostal = ville.codePostal;
                    console.log('nom ville : ', this.valueSendCity.name);
                    console.log('code postal ville: ', this.valueSendPostal);
                    console.log('id de la ville : ', this.valueSendId);

                    this.suggestions = 0;
                },
                sendCity2(ville) {
                    console.log('fonction ville 2 : ok');
                    const cpInput2 = document.getElementById('villeID2');
                    cpInput2.value = ville.name;
                    const ecouteCity2 = document.getElementById('cityID2');
                        ecouteCity2.className = "content-1-off";

                },
                modifyDefaultAdress(){ // Quand on rentre dans input
                //if ( une lettre est ajouter ) {
                    // lancer le GET /api/ville/search?q=nom_de_la_ville ou début etc... "autocompletion"

                },
                // Change l'option sélectionnée dans le dropdown
                setDeliveryOption(option) {
                    this.buttonText = option; // Change le texte du bouton
                    this.isDropdownVisible = false; // Ferme le menu
                },
                // Bascule l'affichage du menu déroulant
                toggleMenu() {
                    this.isDropdownVisible = !this.isDropdownVisible;
                    this.isButtonHide = this.isDropdownVisible;
                },
                // Gère le clic en dehors du dropdown
                handleClickOutside(event) {
                    const button = event.target.closest('.btn-dropdown');
                    if (!button) { // Si le clic est en dehors du bouton dropdown
                        this.isDropdownVisible = false;
                        this.isButtonHide = false;
                    }
                },
                valideCity() {
                    console.log('click');
                    if ((this.valueSendPostal.length === 0) || (this.valueSendCity.lenght === 0)) {
                        console.log('erreur il manque une info');
                    }
                    else {
                        this.hideOptiPopover = true;
                        this.showOptiPopover2 = true;
                    }
                },
                valideRue() {
                    console.log('click');

                    this.valueSendRue = document.getElementById('nomDeRue').value;
                    this.valueSendAdresse = document.getElementById('numDeRue').value;
                    this.valueSendDetail = document.getElementById('details').value;

                    if (!this.valueSendDetail || this.valueSendDetail.length === 0) {
                        this.valueSendDetail = '';
                    }

                    console.log(this.valueSendAdresse);
                    console.log(this.valueSendRue);
                    console.log(this.valueSendDetail);

                    const confirmation = confirm(
                        `Vous confirmez que ces informations sont correctes :

                📍 Vous êtes au : ${this.valueSendAdresse} ${this.valueSendRue}
                Ville : ${this.valueSendCity.name} - ${this.valueSendPostal}
                Détails : ${this.valueSendDetail}`
                    );

                    if (confirmation) {
                        console.log("✅ Adresse validée !");
                        // ➤ requête POST ou rediriger
                        this.saveAdress();
                        
                    } else {
                        console.log("❌ Annulé par l'utilisateur.");
                    }
                },

            },
            mounted() {
                this.checkLoginStatus();
                const token = localStorage.getItem('token');
                if (token) {
                    const decoded = jwt_decode(token);
                    this.valueSendIdUser = decoded.sub; 
                    // ou decoded.id selon ton token
                    console.log("User ID trouvé dans le token :", this.valueSendIdUser);
                }
                // Ajoute un gestionnaire d'événements pour détecter les clics externes
                document.addEventListener('click', this.handleClickOutside);
                
            },
            beforeDestroy() {
                // Supprime le gestionnaire d'événements pour éviter les fuites de mémoire
                document.removeEventListener('click', this.handleClickOutside);
            },
        });
    </script>
</body>
</html>
