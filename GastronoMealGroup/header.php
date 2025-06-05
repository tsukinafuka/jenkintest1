<header>
    <!-- Barre de navigation pour la version mobile -->
    <nav id="headerMobile" class="tp">
        <!-- Logo de la navigation, avec un lien vers la page d'accueil -->
        <div class="imgLogoNav">
            <img src="images/G-meal-3.png" alt="logo" href="home.html"/>
        </div>

        <!-- Conteneur des liens de navigation et des boutons -->
        <div class="lienNav">

            <!-- Liens principaux vers le menu et la page de contact -->
            <div class="lien">
                <a href="index.php">Menu</a>
                <a href="contact.php">Contact</a>
            </div>

            <!-- Boutons de navigation : Connexion et Inscription -->
            <div class="buttonNav">
                <a href="login.php">
                    <button class="btnWhite buttonNavig">Connexion</button>
                </a>
                <a href="register.php">
                    <button class="btnBlack buttonNavig">Inscription</button>
                </a>
            </div>

            <!-- Icône pour ouvrir le menu mobile -->
            <div class="iconeMenuMobile" @click="showTheMenuMobile">
                <img src="images/icoMenu.png" alt="icone menu mobile" class="imgIconeMenuMobile">
            </div>

            <!-- Contenu du menu mobile (affichage conditionnel selon la classe active) -->
            <div class="contentMenuMobile" :class="{ active: isMenuMobileShow }" ref="menuMobileClosed">
                <div class="Menu1Mobile">
                    <!-- Boutons Connexion et Inscription pour la version mobile -->
                    <a href="login.php">
                        <button class="btnWhite buttonNavig">Connexion</button>
                    </a>
                    <a href="register.php">
                        <button class="btnBlack buttonNavig">Inscription</button>
                    </a>
                </div>
                <div class="Menu2Mobile">
                    <!-- Lien vers le menu principal -->
                    <a href="index.php">Menu</a>
                </div>
                <div class="Menu3Mobile">
                    <!-- Lien vers la page de contact -->
                    <a href="contact.php">Contact</a>
                </div>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14/dist/vue.js"></script>
    <script>
        new Vue({
            el: '#headerMobile', // Cible l'élément HTML avec l'id "headerMobile"
        
            data: {
                isMenuMobileShow: false, // État indiquant si le menu mobile est affiché ou non
            },

            methods: {
                // Méthode pour afficher le menu mobile en modifiant l'état
                showTheMenuMobile() {
                    this.isMenuMobileShow = true;
                },

                // Méthode pour gérer le clic en dehors du menu mobile et le fermer
                handleClickOutside(event) {
                    const menuMobileClosed = this.$refs.menuMobileClosed;
                    // Vérifie si l'utilisateur a cliqué en dehors du menu
                    if (!menuMobileClosed & !menuMobileClosed.contains(event.target)) {
                        this.isMenuMobileShow = false; // Ferme le menu
                        console.log('ferme'); // Log pour le débogage
                    }
                    console.log('ouvert'); // Log si le menu est ouvert
                },
            },

            mounted() {
                // Ajoute un écouteur d'événements pour détecter les clics hors du menu
                document.addEventListener('click', this.handleClickOutside);
            },

            beforeDestroy() {
                // Supprime l'écouteur d'événements avant la destruction du composant
                document.removeEventListener('click', this.handleClickOutside);
            },
        });
    </script>
</header>
