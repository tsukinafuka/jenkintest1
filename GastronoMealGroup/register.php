<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GastronoMeal</title>
    <meta name="description" content="A brief description of your page.">
    <link rel="stylesheet" href="css/styles.css?v=3.7">
    <link rel="icon" href="GastronoMealGroup/images/G-meal-2.ico">
    <style>
        .content_register { 
            overflow: hidden;
            width: 100%;
            position: relative;
            align-items: center;
        }
        .content_register input {
            display: flex;
            width: auto;
            background-color: white;
            color:black;
        }

        .slider {
            display: flex;
            transition: transform 0.5s ease;
            width: 100%;
            align-items: center;
        }

        .page {
            width: 100%;
            max-width: 100%;
            flex-shrink: 0;
            padding: 100px;
            box-sizing: border-box;
            align-items: center !important;
        }
        .page button {
            display: flex;
            align-items: center !important;
            justify-content: center;
            width: 100%;

        }
        .page form {
            align-items: center;
            justify-content: center;
        }
        .form-register{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .user-type-selection {
            align-items: center;
            justify-content: center;
            display: flex;
            flex-direction: row;
            
        }
    
        .user-type-selection button {
            padding: 10px 20px;
            border-radius: 50px;
            margin: 5px;
            cursor: pointer;
            border: none;
            background-color: blue;
            transition: 0.3s;
            text-align: center;
        }

        .user-type-selection button.selected {
            background-color: grey !important;
            color: white;
            box-shadow: 0 0 5px rgba(0,0,0,0.2);
        }

        button:disabled {
            background-color: #ccc !important;
            cursor: not-allowed !important;
        }
        #button_register button{
            border: none;
            width: 100px;
            height: 100px;
            border-radius: 50px;
            background-color: none;
            color: white;
            text-align: center !important;
        }
        #button_register button {
            background-color: #FF7828;
        }
        #button_register button:hover {
            background-color: grey;
        }
        .btn-suivant {
            display:flex;
            width: 150px !important;
            border:none;
            border-radius: 5px;
            padding: 8px;
            cursor: pointer;
        }
        .btn-suivant:enabled {
            background-color: black;
            color: white;
        }
        .btnNotifPC {
            width: 50px !important;
            height: auto;
        }
        
    </style>
</head>
<body>

<?php require_once('header.php'); ?>

<div id="app">
    <div class="content_register">
        <a href="index.php" class="close_btn">&times;</a>
        <div class="slider" :style="{ transform: 'translateX(' + (-currentPage * 100) + '%)' }">

            <div class="page">
                <h2>Vous êtes ?</h2>
                <div class="user-type-selection" id="button_register">
                    <button @click="typeUtilisateur='livreur'" :class="{selected: typeUtilisateur=='livreur'}" id="livreur-btn">Livreur</button>
                    <button @click="typeUtilisateur='restaurant'" :class="{selected: typeUtilisateur=='restaurant'}" id="restaurant-btn">Restaurant</button>
                    <button @click="typeUtilisateur='client'" :class="{selected: typeUtilisateur=='client'}" id="client-btn">Client</button>
                </div>
                <br>
                <p></p>
                <br>
                <button @click="nextPage" :disabled="!typeUtilisateur" class="btn-suivant">Suivant</button>
            </div>

            <div class="page">
                <h2>Email et mot de passe</h2>
                <form class="form-register">
                    <input type="email" v-model="email" pattern=".+@gmail\.com" placeholder="Votre email">
                    <input @input="searchMdp" type="password" :type="isPasswordVisible ? 'password' : 'text'" v-model="motDePasse" placeholder="Mot de passe">
                    <img :src="isPasswordVisible ? 'images/oeil.png' : 'images/oeil-2.png'" @click="togglePasswordVisibility" class="eye-open">
                    <input @input="searchMdp" type="password" :type="isPasswordVisible ? 'password' : 'text'" v-model="confirmMotDePasse" placeholder="Confirmer mot de passe">
                    <p style="color:red;" id="mdpErreur"></p>
                    <p style="color:grey;">
                    Votre mote de passe doit contenir au moins:
                    </p> 
                    <p id="p-mdp8" style="color:grey;">
                        8 caractères
                    </p> 
                    <p id="p-mdpM" style="color:grey;">
                        une majuscule
                    </p>
                    <p id="p-mdpm" style="color:grey;"> 
                        une minuscule et 
                    </p>
                    <p id="p-mdp0" style="color:grey;">
                        un chiffre.
                    </p>
                </form>
                <button @click="prevPage" class="btn-suivant">Précédent</button>
                <br>
                <p></p>
                <br>
                <button @click="nextPage" :disabled="!email || !motDePasse || (motDePasse !== confirmMotDePasse)" class="btn-suivant">Suivant</button>
            </div>

            <div class="page">
                <h2>Vos informations personnelles</h2>
                <form class="form-register">
                    <input type="text" v-model="nom" placeholder="Nom">
                    <input type="text" v-model="prenom" placeholder="Prénom">
                    <input type="tel" v-model="telephone" placeholder="Téléphone">
                    <div class="registerCGU">
                        <input class="btnNotifPC" type="checkbox" id="toggle" v-model="conditionsAccepted">
                        <label class="toggle" for="toggle">Lu et accepté <a href="#">Termes et Conditions</a></label>
                    </div>
                </form>
                <button @click="prevPage" class="btn-suivant">Précédent</button>
                <br>
                <p></p>
                <br>
                <button @click="showConfirmEmail" :disabled="!nom || !prenom || !telephone || !conditionsAccepted" class="btn-suivant">S'inscrire</button>
            </div>

        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/vue@2.7.14/dist/vue.js"></script>
<script src="./js/user.js"></script>
<script>
new Vue({
    el: '#app',
    data: {
        currentPage: 0,
        typeUtilisateur: '',
        email: '',
        motDePasse: '',
        confirmMotDePasse: '',
        nom: '',
        prenom: '',
        telephone: '',
        conditionsAccepted: false,
        isPasswordVisible: true,
        mdpValueUser: '',
    },
    methods: {
        togglePasswordVisibility() {
            this.isPasswordVisible = !this.isPasswordVisible;
        },
        async showConfirmEmail() {
            console.log('click function /register');

            const createdUser = await createUser({
                nom: this.nom,
                prenom: this.prenom,
                telephone: this.telephone,
                typeUtilisateur: this.typeUtilisateur,
                email: this.email,
                motDePasse: this.motDePasse
            });

            if (createdUser) {
                window.location.href = 'login.php';
            } else {
                alert("Erreur lors de la création de l'utilisateur.");
            }
        },
        nextPage() {
            //if ((this.motDePasse.length || this.confirmMotDePasse.length) < 8) {
            //    alert('Le mot de passe doit contenir au moins 8 caractères.');
            //}
            if (this.currentPage < 2) {
                this.currentPage++;
            }
            if (this.currentPage == 2) {
                const erreurEl = document.getElementById('mdpErreur');
                if (this.motDePasse.length < 8) {
                    erreurEl.textContent = 'Le mot de passe doit contenir au moins 8 caractères.';
                    erreurEl.style.display = 'block';
                    this.motDePasse = '';
                    this.confirmMotDePasse = '';
                    this.currentPage--;
                }
            }
        },
        prevPage() {
            if (this.currentPage > 0) {
                this.currentPage--;
            }
        },
        // securMdp() {
        //     for (let i = 0; i < this.motDePasse.length; i++) {
        //         if (this.motDePasse[i] === this.motDePasse[i].toUpperCase()) {
        //             console.log(this.motDePasse[i]);
        //             this.logValue = true;
        //         }
        //         if (this.motDePasse[i] === this.motDePasse[i].toLowerCase()) {
        //             console.log(this.motDePasse[i]);
        //             this.logValue = true;
        //         }
        //         if (this.motDePasse[i] === this.motDePasse[i].match(/[0-9]/)) {
        //             console.log(this.motDePasse[i]);
        //             this.logValue = true;
        //         }
        //     }
        // },
        searchMdp(event) {
                    
                    const pMdpm = document.getElementById('p-mdpm');
                    const pMdp8 = document.getElementById('p-mdp8');
                    const pMdpM = document.getElementById('p-mdpM');
                    const pMdp0 = document.getElementById('p-mdp0');
                    const value = event.target.value;
                    console.log("Saisie utilisateur :", value);
                    const regexm = new RegExp('(?=.*[a-z])');
                    const regexM = new RegExp('(?=.*[A-Z])');
                    const regex8 = new RegExp('.{8,}');
                    const regex0 = new RegExp('(?=.*[0-9])');
                    if (regexm.test(value)) {
                        pMdpm.style.color = '#28a745';
    
                    } else {
                        pMdpm.style.color = 'red';
                        
                    }
                    if (regexM.test(value)) {
                        pMdpM.style.color = 'rgb(19, 147, 45)';
                        
                    } else {
                        pMdpM.style.color = 'red';
                        
                    }
                    if (regex8.test(value)) {
                        pMdp8.style.color = 'rgb(19, 147, 45)';
                        
                    } else {
                        pMdp8.style.color = 'red';
                        
                    }
                    if (regex0.test(value)) {
                        pMdp0.style.color = 'rgb(19, 147, 45)';
                        
                    } else {
                        pMdp0.style.color = 'red';
                        
                    }
                
        },

    }
});
</script>

</body>
</html>