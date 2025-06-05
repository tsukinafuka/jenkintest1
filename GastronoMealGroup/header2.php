<header>
    <!-- Barre de navigation (version mobile, variante 2) -->
    <nav id="headerMobile2" class="tp2">
        <!-- Logo de la navigation, avec un lien vers la page d'accueil -->
        <div class="imgLogoNav2">
            <img src="images/G-meal-3.png" alt="logo" href="home.html"/>
        </div>

        <!-- Conteneur des liens de navigation et des boutons -->
        <div class="lienNav2">

            <!-- Liens principaux : Menu, Contact et Messagerie -->
            <div class="lien2">
                <a href="islogin.php">Menu</a>
                <a href="contact.php">Contact</a>
                <a href="messagerie.php">Messagerie</a>
            </div>
            <script src="./js/validateToken.js"></script>
            <!-- Bouton de déconnexion -->
            <div class="buttonNav2">
                <a href="#" id="logout"><button class="btnBlack2 buttonNavig2">Déconnexion</button></a>
            </div>

            <!-- Avatar utilisateur avec lien vers le profil client -->
            <div class="userAvatar2">    
                <a href="#" id="lienProfil">
                    <img src="images/Pf-3.png" alt="Avatar utilisateur">
                </a>
            </div>

            <!-- Icône pour ouvrir le menu mobile -->
            <div class="iconeMenuMobile" @click="showTheMenuMobile">
                <img src="images/icoMenu.png" alt="icone menu mobile" class="imgIconeMenuMobile">
            </div>

            <!-- Contenu du menu mobile (affichage conditionnel selon l'état "isMenuMobileShow") -->
            <div class="contentMenuMobile" :class="{ active: isMenuMobileShow }" ref="menuMobileClosed">
                <div class="Menu1Mobile">
                    <!-- Bouton de déconnexion pour la version mobile -->
                    <a href="#" id="logout">
                        <button class="btnBlack2 buttonNavig2">Déconnexion</button>
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
                <div class="Menu4Mobile">
                    <!-- Lien vers la messagerie -->
                    <a href="messagerie.php">Messagerie</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Intégration de Vue.js via CDN -->
    
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14/dist/vue.js"></script>
    <script>
        new Vue({
            el: '#headerMobile2', // Cible l'élément HTML avec l'id "headerMobile2"
        
            data: {
                isMenuMobileShow: false, // État indiquant si le menu mobile est affiché ou non
            },

            methods: {
                
                // Méthode pour afficher le menu mobile
                showTheMenuMobile() {
                    this.isMenuMobileShow = true;
                },

                // Méthode pour gérer le clic à l'extérieur et fermer le menu mobile
                handleClickOutside(event) {
                    const menuMobileClosed = this.$refs.menuMobileClosed;
                    // Vérifie si l'utilisateur clique en dehors du menu
                    if (!menuMobileClosed & !menuMobileClosed.contains(event.target)) {
                        this.isMenuMobileShow = false; // Ferme le menu mobile
                        //console.log('ferme'); // Log pour débogage
                    }
                    //console.log('ouvert'); // Log si le menu reste ouvert
                },
            },

            mounted() {
                // Ajoute un écouteur pour détecter les clics hors du menu
                document.addEventListener('click', this.handleClickOutside);
            },

            beforeDestroy() {
                // Supprime l'écouteur d'événements lors de la destruction du composant
                document.removeEventListener('click', this.handleClickOutside);
            },
        });
    </script>
</header>
