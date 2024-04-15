// Fonction pour mettre à jour le score de l'utilisateur et afficher le score
function mettreAJourScore(scoreToAdd) {
    // Récupérer le score actuel de l'utilisateur depuis le profil (assumant que vous avez un élément HTML avec l'ID 'score-utilisateur' pour afficher le score)
    let scoreUtilisateur = parseInt(document.getElementById('scoreUtilisateur').textContent);

    // Ajouter le score à ajouter au score actuel
    scoreUtilisateur += scoreToAdd;

    // Mettre à jour l'élément HTML affichant le score de l'utilisateur
    document.getElementById('scoreUtilisateur').textContent = scoreUtilisateur;

    // Enregistrer le score dans le stockage local (pour le conserver entre les sessions)
    localStorage.setItem('scoreUtilisateur', scoreUtilisateur);
}

// Ajouter un gestionnaire d'événements clic pour les images
document.querySelectorAll('.question img').forEach(image => {
    image.addEventListener('click', function () {
        const idQuestion = this.dataset.question; // Obtenir l'identifiant (unique) de la question
        const reponse = this.dataset.reponse; // Obtenir la réponse associée à l'image

        // Référence à l'image cliquée
        const imageCliquee = this; 

        // Vérifier si une réponse a déjà été sélectionnée pour cette question
        if (imageCliquee.parentElement.classList.contains('answered')) {
            // Si une réponse a déjà été sélectionnée, ne rien faire
            return;
        }

        // Encadrer l'image cliquée
        imageCliquee.style.border = '2px solid #007bff'; // Ajoute une bordure bleue autour de l'image cliquée

        // Ajouter la classe 'answered' au parent de l'image pour indiquer qu'une réponse a été sélectionnée
        imageCliquee.parentElement.classList.add('answered');

        // Désactiver les clics sur les autres images de la même question
        imageCliquee.parentElement.querySelectorAll('img').forEach(img => {
            if (img !== imageCliquee) {
                img.classList.add('disabled'); // Ajouter la classe 'disabled' aux images désactivées
            }
        });

        // Faire une requête Fetch pour vérifier la réponse
        fetch('?action=reponseImg', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                idQuestion: idQuestion,
                imageUrl: reponse,
            }),
        })
            .then(response => {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Réponse invalide du serveur');
                }
            })
            .then(data => {
                if (data) {
                    console.log(data);
                    console.log(idQuestion);

                    // Vérification de la réponse
                    const isCorrect = data.correct; // Récupérer si la réponse est correcte ou non

                    // Mettre à jour le score en fonction de la réponse
                    if (isCorrect) {
                        mettreAJourScore(1); // Ajouter 1 au score si la réponse est correcte

                        // Ajouter le symbole de vérification (V vert)
                        const symbolElement = document.createElement('div');
                        symbolElement.classList.add('symbol', 'correct');
                        symbolElement.textContent = ''; // Ajouter ici le symbole de vérification (V vert)
                        imageCliquee.parentElement.appendChild(symbolElement);

                        // Ajouter le message de réponse
                        const messageElement = document.createElement('div');
                        messageElement.classList.add('message');
                        messageElement.textContent = 'Bonne réponse'; // Message de bonne réponse
                        imageCliquee.parentElement.querySelector('.messageContainer').appendChild(messageElement);
                    } else {
                        // Ajouter ici la logique si la réponse est incorrecte

                        // Ajouter le symbole de croix (X rouge)
                        const symbolElement = document.createElement('div');
                        symbolElement.classList.add('symbol', 'incorrect');
                        symbolElement.textContent = ''; // Ajouter ici le symbole de croix (X rouge)
                        imageCliquee.parentElement.appendChild(symbolElement);

                        // Ajouter le message de réponse
                        const messageElement = document.createElement('div');
                        messageElement.classList.add('message');
                        messageElement.textContent = 'Mauvaise réponse'; // Message de mauvaise réponse
                        imageCliquee.parentElement.querySelector('.messageContainer').appendChild(messageElement);
                    }
                } else {
                    throw new Error('Réponse JSON vide');
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
            });
    });
});
