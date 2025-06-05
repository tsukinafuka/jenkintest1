<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GastronoMeal</title>
    <meta name="description" content="A brief description of your page.">
    <link rel="stylesheet" href="css/styles.css?v=5.5">
    <link rel="icon" href="GastronoMealGroup/images/G-meal-2.ico">
    <link rel="stylesheet" href="css/header2.css?v=1.6"/>
    <script src="https://cdn.jsdelivr.net/npm/jwt-decode/build/jwt-decode.min.js"></script>

</head>
<body>
    <?php require_once("header2.php"); ?>
    <div id="app" class="containerPrincipal">
        <div class="container_1_profilClient">
            <div class="containerProfil">
                
                <!-- Section Adresse -->
                <!--<div class="containerAdresse">
                    <h3><img src="images/information.png" alt="icone informations">&nbsp;&nbsp;Votre adresse</h3>
                    <p>{{ textStreet }}</p>
                    <button class="btnAdresse" @click="modifyTextStreet">Modifier</button>
                </div>-->
                <!--     NEW TASK      -->
                <div class="containerAdresseTravail">
                    <h3><img src="images/information.png" alt="infos icone">&nbsp;&nbsp; Vos informations personnelles</h3>
                    <div id="userInfo"></div>
                    <button class="btnAdresse" @click="modifyTextStreet">Modifier</button>
                </div>
                <div class="containerAdresseDomicile">
                    <h3><img src="images/information.png" alt="infos icone">&nbsp;&nbsp; Votre adresse par défaut</h3>
                    <div id="userInfo2"></div>
                    <button class="btnAdresse" @click="modifyTextStreet">Modifier</button>
                </div>
                <!-- NEW TASK -->
            
                <!-- Section Notifications -->
                <div class="notifProfilClientButton"> 
                    <div class="notifProfilClient">
                        <h4>Notifications</h4>
                        <p>Souhaitez-vous recevoir des notifications ?</p>
                    </div>
                    <div class="buttonNotifProfilClient">
                        <input @click="sendNotif" type="checkbox" id="checkNotif" class="btnNotifPC" checked />
                    </div>
                </div>

                <!-- Modal pour modifier adresse et téléphone -->
                <div class="showModificationsProfil" :class="{ active: showProfilClient }">
                    <!-- Modifier téléphone -->
                    <div class="numberPhonePF" :class="{ active: istextButtonModifyNum }">
                        <h3>Entrez votre numéro de téléphone</h3>
                        <input v-model="textNum" @keyup.enter="updateNum" type="text" name="inputNumberPhone">
                        <button @click.prevent="hideModifierAvecNewText" class="btnWhite buttonNavig">Entrer</button>
                        <button @click.prevent="hideModifier" class="btnBlack buttonNavig">Annuler</button>
                    </div>
                    <!-- Modifier adresse -->
                    <div class="streetPF" :class="{ active: istextButtonModifyStreet }">
                        <h3>Entrez votre adresse</h3>
                        <input v-model="textStreet" @keyup.enter="updateStreet" type="text" name="inputStreet">
                        <button @click.prevent="hideModifierAvecNewText" class="btnWhite buttonNavig">Entrer</button>
                        <button @click.prevent="hideModifier" class="btnBlack buttonNavig">Annuler</button>
                    </div>
                </div>

            </div>

            <!-- Section Mes Achats et Préférences -->
            <div class="HabitudeClient">  
                <a @click="showMesAchats" href="#" class="mesAchats" :class="{ active: isMesAchatsVisible }"><h3>Mes achats</h3></a>
                <a @click="showMesPrefs" href="#" class="mesPref" :class="{ active: isMesPrefVisible }"><h3>Mes préférences</h3></a>
            </div>

            <!-- Liste des Achats -->
            <div class="deroulerAchatPrefs">
                <div :class="{ active: isMesAchatsVisible }" class="mesAchatsDiv">
                    <div class="mesAchats1">
                        <img class="imgMesAchats" src="#" alt="Restaurant 1" width="100" height="auto">
                        <div class="textMesAchats">
                            <h3>Nom restaurant</h3>
                            <p>- nb article - 0.00eur</p>
                            <button class="buttonMesachats">Voir</button>
                        </div>  
                    </div>
                </div>
            </div>

            <!-- Liste des Préférences -->
                <div :class="{ active: isMesPrefVisible }" class="mesPrefDiv">
                    <div class="mesPref1">
                        <img class="imgMesPref" src="#" alt="Restaurant 1" width="100" height="auto">
                        <div class="textMesPref">
                            <h3>Nom restaurant</h3>
                            <p>- nb article - 0.00eur</p>
                        </div>  
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php require_once('footer.php'); ?>
    <script src="./js/user.js"></script>
    <script src="./js/validateToken.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14/dist/vue.js"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                isMesAchatsVisible: false,
                isMesPrefVisible: false,
                textStreet: 'Votre adresse postale',
                istextButtonModifyStreet: false,
                showProfilClient: false,
                isLoggedIn: true,
                isEditingNumber: false,
                nbCommandes: 0,
                textVille: '',
                textCp: '',
                textRue: '',
                notifications: [],
                checkStatus: false,

            },
            mounted() {
                this.getNotification();
            },
            methods: {
                async getNotification() {
                    console.log('launch getNotification');
                    try {
                        const response = await fetch('http://localhost:8080/api/notification', {
                            method: 'GET',
                            headers: {
                                'Content-Type': 'application/json',
                                'Authorization': `Bearer ${localStorage.getItem('token')}`
                            }
                        });

                        const notification = await response.json();
                        this.notifications = notification;
                        console.log(' -S- Notifications récupérée:', notifications);
                        console.log('Notification récupérée:', notification);

                        const checkNotif = document.getElementById('checkNotif');

                        if (notification && notification.activeNotif !== undefined) {
                            checkNotif.checked = notification.activeNotif;
                        }

                        return notification;
                    } catch (error) {
                        console.error('Erreur réseau:', error);
                        return null;
                    }
                },

                async setNotification(active) {
                    console.log('launch setNotification');

                    const user = jwt_decode(localStorage.getItem('token')); // si tu stockes l'ID là
                    const isChecked = document.getElementById('checkNotif').checked; // true ou false
                    const notifPayload = {
                        message: active ? 'Activation des notifications' : 'Désactivation des notifications',
                        dateEnvoi: new Date(),
                        statusLecture: false,
                        userId: this.notifications.userId,
                        activeNotif: isChecked
                    };
                    console.log('notifPayload:', notifPayload);
                    try {
                        const response = await fetch('http://localhost:8080/api/notification', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Authorization': `Bearer ${localStorage.getItem('token')}`
                            },
                            body: JSON.stringify(notifPayload)
                        });

                        const result = await response.json();
                        console.log('Notification enregistrée :', result);
                        return result;
                    } catch (error) {
                        console.error('Erreur réseau:', error);
                        return null;
                    }
                },
                async sendNotif() {
                    console.log('sendNotif');
                    const isChecked = document.getElementById('checkNotif').checked;
                    console.log('checkNotif:', isChecked);
                    await this.setNotification(isChecked);
                },

                updateStreet() {
                    // Action de mise à jour de l'adresse
                    event.preventDefault();
                },
                hideModifierAvecNewText() {
                    this.istextButtonModifyNum = false;
                    this.istextButtonModifyStreet = false;
                    this.showProfilClient = false;
                },
                hideModifier() {
                    this.textStreet = 'Votre adresse postale';
                    this.istextButtonModifyNum = false;
                    this.istextButtonModifyStreet = false;
                    this.showProfilClient = false;
                },
                modifyTextStreet() {
                    this.istextButtonModifyStreet = true;
                    this.istextButtonModifyNum = false;
                    this.showProfilClient = true;
                },
                showMesAchats() {
                    console.log('achat click');
                    console.log('button Achat :', commandes);
                    this.isMesPrefVisible = false;
                    this.isMesAchatsVisible = true;
                    if (commandes > 0) {
                        this.isMesAchatsVisible = true;
                        this.isMesPrefVisible = false;
                    }
                    if (commandes === 0) {
                        this.isMesAchatsVisible = false;
                        this.isMesPrefVisible = false;
                    }
                },
                showMesPrefs() {
                    console.log('pref click');
                    console.log('button Pref', commandes);
                    this.isMesAchatsVisible = false;
                    this.isMesPrefVisible = true;
                    if (commandes > 0) {
                        this.isMesPrefVisible = true;
                        this.isMesAchatsVisible = false;
                    }
                    if (commandes === 0) {
                        this.isMesPrefVisible = false;
                        this.isMesAchatsVisible = false;
                    }
                },
            },
        });
    </script>
</body>
</html>
