async function createUser(userData) {
    try {
        const response = await fetch('http://localhost:8080/api/auth/register', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(userData) // utilise directement l'objet passé en paramètre
        });

        if (response.ok) {
            const createdUser = await response.json();
            console.log('Utilisateur créé:', createdUser);
            return createdUser;
        } else {
            console.error('Erreur lors de la création de l\'utilisateur:', response.status);
            const errorMsg = await response.text();
            console.error('Message erreur:', errorMsg);
        }
    } catch (error) {
        console.error('Erreur réseau:', error);
    }
}




// Exemple de données utilisateur à envoyer
//const newUser = {
//    nom: "Dupont",
//    prenom: "Jean",
//    telephone: "0102030405",
//    typeUtilisateur: "client",
//    email: "jean.dupont@example.com"
//};
