<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GastronoMeal</title>
    <meta name="description" content="GastronoMeal - Connectez-vous pour accéder à vos commandes et vos options de livraison.">
    <link rel="stylesheet" href="css/styles.css?v=2.4">
    <link rel="icon" href="GastronoMealGroup/images/G-meal-2.ico">
</head>
<body>
    <?php require_once("header.php") ?>
<!-- Container principal + formulaire --> 
    <div id="app" class="containerPrincipal">
      <div class="content_full">  
        <div class="content_login" :class="{ close: !isContentLoginVisible }">
        <a href="index.php" class="close_btn">&times;</a>
            <h2>Connectez-vous</h2><br>
           <!-- <p>Entrez votre adresse mail</p>
            <form>
                <label for="mail"></label>
                <input type="text" id="mail" name="mail">
            </form>
            <form>
                <p>Entrez votre mot de passe</p>
                <div class="passwordAndEye">
                    <label for="mot_de_passe"></label>
                    <input :type="isPasswordVisible ? 'password' : 'text' " id="passwd" name="passwd"><br>
                    <img :src="isPasswordVisible ? 'images/oeil.png' : 'images/oeil-2.png' " @click="togglePasswordVisibility" alt="Afficher les mot de passe" class="eye-open" id="togglePassword">
                </div>
                <a href="#" @click.prevent="showForgotPassword"><p>mot de passe oublié ?</p></a>
            </form>
            
        <a href="isLogin.php"><button>Connexion</button></a> -->
        <!-- ########################################################################## -->
        <form @submit.prevent="login">
            <p>Entrez votre adresse mail</p>
            <label for="mail"></label>
            <input type="email" id="email" name="email" placeholder="email" required v-model="email">

            <p>Entrez votre mot de passe</p>
            <div class="passwordAndEye">
                <label for="mot_de_passe"></label>
                <input :type="isPasswordVisible ? 'password' : 'text'" id="motDePasse" name="motDePasse" type="password" placeholder="mot de passe" required v-model="motDePasse">
                <img :src="isPasswordVisible ? 'images/oeil.png' : 'images/oeil-2.png'" @click="togglePasswordVisibility" alt="Afficher le mot de passe" class="eye-open" id="togglePassword">
            </div>

            <button type="submit" :disabled="isLoading">Connexion</button>
            <p v-if="isLoading">Connexion en cours...</p>
            <p v-if="loginError" class="error">{{ loginError }}</p>
        </form>
        <!-- ########################################################################## -->
        </div>
       <div class="modal" :class="{ show: isForgotPasswordVisible }">
            <div class="modal_content">
                <div style="text-align:center">
                <h2>Rénitialiser le mot de passe</h2>
                </div>
                <input class="inputEmailAjust" type="email" placeholder="Entrez votre email"><br>
                <button class="btnWhite ButtonNav">Envoyer</button>
                <button class="btnBlack ButtonNav" @click="closeForgotPassword">Fermer</button>
            </div>
        </div>
    </div>

    

    <!-- Inclusion de Vue.js -->
    <script src="./js/validateToken.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14/dist/vue.js"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                isForgotPasswordVisible: false,
                isContentLoginVisible: true,
                isPasswordVisible: true,
                //items: [], // LIE AU FETCH
                isLoading: false,
                loginError: null,
                isLoggedIn: false,
                email: '',
               // password: '',
                motDePasse: '',
                
            },
            methods:{
                
                togglePasswordVisibility(){
                    this.isPasswordVisible = !this.isPasswordVisible;
                },
                // Affiche le modal pour la réinitialisation du mot de passe
                showForgotPassword() {
                    this.isForgotPasswordVisible = true;
                    this.isContentLoginVisible = false;
                },
                // Ferme le modal et revient au formulaire de connexion
                closeForgotPassword() {
                    this.isForgotPasswordVisible = false;
                    this.isContentLoginVisible = true;
                },
                async login() {
                    this.isLoading = true;
                    this.loginError = null;
                    //console.log('Données envoyées:', { email: this.email, motDePasse: this.motDePasse });
                    try {
                        const response = await fetch('http://localhost:8080/api/auth/login', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify({ email: this.email, motDePasse: this.motDePasse })
                        });
                        //console.log('Réponse reçue:', response);
                        if (!response.ok) {
                            // Si le serveur renvoie un code d'erreur, on affiche un message
                            if (response.status === 401) {
                                this.loginError = 'Email ou mot de passe incorrect.';
                            } else {
                                this.loginError = `Erreur du serveur : ${response.statusText}`;
                            }
                        } else {
                            const data = await response.json();
                            //console.log('Réponse JSON:', data);
                            // Traitement en cas de succès
                            
                            localStorage.setItem('token', data.token);
                            
                            this.isLoggedIn = true;
                            window.location.href = 'isLogin.php'; 
                        }
                    } catch (error) {
                        // Gestion des erreurs réseau
                        this.loginError = 'Impossible de se connecter. Vérifiez votre connexion.';
                        console.error('Erreur réseau :', error);
                    } finally {
                        this.isLoading = false;
                    }
                },
                checkLoginStatus() {
                    // Vérifier si le token est présent
                    const token = localStorage.getItem('token');
                    if (token) {
                        this.isLoggedIn = true; // Peut être complété avec une vérification côté serveur
                    } else {
                        this.isLoggedIn = false;
                    }
                }
            },
            mounted() {
                // Vérifier le statut de connexion dès que l'application est chargée
                this.checkLoginStatus();
                // Vérifier si le token est dans le localStorage dès que l'application est chargée
                const token = localStorage.getItem('token');
                if (token) {
                    this.isLoggedIn = true;
                    console.log("Utilisateur déjà connecté avec token:", token);
                } else {
                    this.isLoggedIn = false;
                }
            }
        });
    </script>
</body>
</html>
