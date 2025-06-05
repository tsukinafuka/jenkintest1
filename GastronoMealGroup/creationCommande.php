<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commandes avec réduction</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/header2.css">
</head>
<body>
    <?php require_once("header2.php"); ?>

    <!-- Notifications commandes -->
    <div id="notification-container"></div>

    <!-- Section réduction -->
    <div id="reduction-section" style="margin: 20px 0;">
        <input type="text" id="reduction-code-input" placeholder="Code réduction" />
        <button id="apply-reduction-btn">Appliquer la réduction</button>
        <p id="reduction-result" style="color:red"></p>
    </div>

    <!-- Exemple du reste de ta page, tu peux garder ce que tu veux... -->
    <div class="registrePlat">
        <div>
            <h1>prix</h1>
        </div>
        <div class="typePlat">
            <img class="imgCreat" src="images/tpBurger.jpg" alt="menu"/>
            <div class="txtcreation"></div>
        </div>
    </div>
    <!-- ... -->

    <?php require_once("footer.php"); ?>

    <script>
    // Liste globale des réductions disponibles
    let reductionsDisponibles = [];
    let commandeSelectionnee = null; // ID de la commande sélectionnée

    // Charger la liste des réductions
    async function fetchReductions() {
        const res = await fetch('http://localhost:8080/api/reduction');
        if (!res.ok) return [];
        return await res.json();
    }

    // Charger la liste des commandes et afficher les boutons
    async function loadNotification() {
        const res = await fetch(`http://localhost:8080/api/commandes`);
        if (!res.ok) throw new Error(res.statusText);
        const notifs = await res.json();

        const container = document.getElementById("notification-container");
        container.innerHTML = '';

        notifs.forEach(element => {
            const badge = element.statusLecture
                ? ''
                : `<div class="absolute top-4 right-4">
                        <span class="block w-3 h-3 bg-red-500 rounded-full"></span>
                    </div>`;
            const notificationHTML = `
                <div class="bg-white p-6 rounded-lg shadow-md flex items-start space-x-4 relative" style="margin-bottom: 10px;">
                    <div class="w-20 h-20 bg-gray-300 rounded-md flex items-center justify-center">
                        <img src="#" alt="" class="opacity-50">
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold">${element.prixTotal}</h2>
                        <button class="mt-4 bg-white text-black py-1 px-4 rounded-md border border-black hover:bg-gray-100 transition suivre-commande-btn" data-id="${element.id_commande}">Suivre la commande</button>
                    </div>
                    ${badge}
                </div>
            `;
            container.insertAdjacentHTML("beforeend", notificationHTML);
        });

        // Ajoute le listener sur chaque bouton "Suivre la commande"
        document.querySelectorAll('.suivre-commande-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                commandeSelectionnee = this.getAttribute('data-id');
                document.getElementById('reduction-result').style.color = "black";
                document.getElementById('reduction-result').innerText = "Commande sélectionnée : " + commandeSelectionnee;
            });
        });
    }

    // Gère l'application de la réduction à la commande sélectionnée
    async function appliquerReduction() {
        const code = document.getElementById("reduction-code-input").value.trim();
        const result = document.getElementById('reduction-result');

        if (!commandeSelectionnee) {
            result.style.color = "red";
            result.innerText = "Sélectionne d'abord une commande !";
            return;
        }

        // Vérifie si le code existe dans la liste
        const reductionTrouvee = reductionsDisponibles.find(
            red => (red.nom || red.code) === code
        );

        if (!reductionTrouvee) {
            result.style.color = "red";
            result.innerText = "Code réduction inconnu !";
            return;
        }

        // Envoie la mise à jour à l'API
        try {
            // Adapte l'URL et la structure du body selon ton API
            const updateRes = await fetch(`http://localhost:8080/api/commandes/${commandeSelectionnee}/reduction`, {
                method: 'PUT',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id_reduction: reductionTrouvee.id_reduction })
            });
            if (!updateRes.ok) throw new Error("Erreur API !");
            result.style.color = "green";
            result.innerText = "Réduction appliquée à la commande !";
        } catch (err) {
            result.style.color = "red";
            result.innerText = "Échec de la mise à jour : " + err.message;
        }
    }

    // Initialise tout au chargement de la page
    document.addEventListener("DOMContentLoaded", async () => {
        // Charge commandes et réductions
        await loadNotification();
        reductionsDisponibles = await fetchReductions();

        // Branche le bouton de réduction
        document.getElementById("apply-reduction-btn").addEventListener("click", appliquerReduction);
    });
    </script>
</body>
</html>
