# Frontend - Application de gestion des commandes pour restaurants

Ce projet est une application web développée dans le cadre de notre projet de groupe durant le BTS SIO. L'objectif principal est de gérer efficacement les commandes, livraisons et réservations de plats ou menus pour les restaurants. L'interface utilisateur est réalisée avec les technologies HTML, CSS, JavaScript, Vue.js et TailwindCSS (en CDN). Le backend, développé en Java avec Spring Boot, est actuellement en cours de développement.

## 🚀 Pré-requis

- **Langages:** HTML / CSS / JavaScript (niveau intermédiaire requis)
- **Framework Frontend:** Vue.js et TailwindCSS (via CDN)
- **Backend:** Java avec Spring Boot
- **API:** REST
- **Base de données:** MariaDB (import nécessaire via le backend)

## 📁 Structure du projet

```
.
├── README.md
├── changerAdress.php
├── composer.json
├── composer.lock
├── contact.php
├── creationCommande.php
├── css
│   ├── header2.css
│   └── styles.css
├── documents
├── erreurCommande.php
├── etatCommande.php
├── footer.php
├── formulaire.php
├── gestionRestaurant.php
├── header.php
├── header2.php
├── home.php
├── images
│   └── [images du projet]
├── index.php
├── isLogin.php
├── js
│   ├── scripts.js
│   ├── user.js
│   └── validateToken.js
├── login.php
├── messagerie.php
├── modifierAdress.php
├── ouCommande.php
├── profilClient.php
├── register.php
├── restaurantAjout.php
├── supprimerAdress.php
├── tableaudebord.php
└── vendor
    └── [fichiers Composer]
```

## 🎨 Règles Design

- **CSS global :** Soyez prudents avec `styles.css` car il s'applique à l'ensemble du site.
- **Police d'écriture à utiliser :**
```css
font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
```
- **Palette de couleurs :**
  - Orange : `#FF7828`
  - Blanc : `#FFFFFF`
  - Noir : `#000000`

## ⚙️ Règles Fonctionnalités

- **Gestion du cache navigateur :**
  - Pensez à versionner vos fichiers CSS via le paramètre de requête :
  ```html
  <link rel="stylesheet" href="page.css?v=1.0">
  ```
  - Mettre à jour le numéro de version (`v=1.0` vers `v=1.1`) à chaque modification.

- **Live Reload et Proxy :**
  - Installation de `browser-sync` (globalement recommandé) :
  ```shell
  npm install -g browser-sync
  ```
  - Commande pour démarrer un proxy et le live-reload :
  ```shell
  browser-sync start --proxy "localhost:8000" --files "**/*.php, **/*.css, **/*.js"
  ```

## 📌 Méthodes utiles

Exemple de récupération d'un utilisateur avec JavaScript et Fetch API :

```javascript
async function getUserById(id) {
    try {
        const response = await fetch(`http://localhost:8080/api/user/${id}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${localStorage.getItem('token')}`
            }
        });

        if (response.ok) {
            const user = await response.json();
            console.log(user);
            return user;
        } else {
            console.error(`Erreur lors de la récupération de l'utilisateur ${id}:`, response.status);
        }
    } catch (error) {
        console.error('Erreur réseau:', error);
    }
}
```

## 📌 Import de composants

- Header et Footer communs sont disponibles via :
  - `header.php` ou `header2.php`
  - `footer.php`

- La carte interactive (Leaflet) est déjà disponible en JS.

## 📜 Commentaires et Notes

- **ALEX :**
  - Disponibilité des headers et footers partagés.
  - Integration de Leaflet (cartes interactives) prête à l'emploi.

### ⚠️ Attention

Veillez à maintenir une cohérence globale du projet en respectant scrupuleusement les règles définies ci-dessus.

---