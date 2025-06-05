async function validateSession() {
    const token = localStorage.getItem('token');
    if (!token) {
        // Si le token est absent, rediriger vers la page de connexion
        alert('token invalide');
        console.log('token invalide');
        window.location.href = 'index.php';
        return false;
    }

    try {
        const response = await fetch('http://localhost:8080/api/auth/validateToken', {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${token}`
            }
        });

        if (response.ok) {
            // Le token est valide
            return true;
        } else {
            // Le token est invalide ou expiré
            //alert('token invalide');
            console.log('token invalide');
            window.location.href = './index.php';
            return false;
        }
    } catch (error) {
        console.error('Erreur réseau lors de la validation de session :', error);
        window.location.href = './index.php';
        return false;
    }
};

document.querySelector('#lienProfil').addEventListener('click', async function (e) {
    e.preventDefault(); // Empêche la navigation par défaut

    const isValid = await validateSession();
    if (isValid) {
        //console.log('TOKEN VALIDE');
        // Si la session est valide, redirige vers la page profil
        window.location.href = 'profilClient.php';
        
    }
});

async function logout() {
    const token = localStorage.getItem('token');
    if (!token) {
        alert('Aucun token trouvé, vous êtes peut-être déjà déconnecté.');
        window.location.href = 'index.php';
        return;
    }

    try {
        const response = await fetch('http://localhost:8080/api/auth/logout', {
            method: 'POST',
            headers: {
                'Authorization': `Bearer ${token}`,
                'Content-Type': 'application/json'
            }
        });

        if (response.ok) {
            // Déconnexion réussie
            //alert('Déconnexion réussie.');
            console.log('Déconnexion réussie.');
            localStorage.removeItem('token'); // Supprime le token du stockage local
            window.location.href = 'index.php'; // Redirige vers la page de connexion
        } else {
            // Échec de la déconnexion
            const errorText = await response.text();
            alert(`Erreur lors de la déconnexion : ${errorText}`);
            console.log(`Erreur lors de la déconnexion : ${errorText}`);
        }
    } catch (error) {
        console.error('Erreur réseau lors de la déconnexion :', error);
        alert('Erreur réseau lors de la déconnexion.');
    }
}

// Exemple : Utiliser le bouton de déconnexion
document.querySelector('#logout')?.addEventListener('click', async function () {
    await logout();
});
