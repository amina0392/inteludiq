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

// Ajouter un gestionnaire d'événements clic pour les radios
document.querySelectorAll('.question input[type="radio"]').forEach(radio => {
    radio.addEventListener('click', function () {
        const idQuestion = radio.name.replace('question_', ''); // Obtenir l'identifiant (unique) de la question
        const reponse = radio.value; // Obtenir la réponse sélectionnée par l'utilisateur

        // Faire une requête Fetch pour vérifier la réponse
        fetch('?action=reponseLabel', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                idQuestion: idQuestion,
                label: reponse,
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
                    // Vérification de la réponse
                    const isCorrect = data.correct; // Récupérer si la réponse est correcte ou non

                    // Mettre à jour le score en fonction de la réponse
                    if (isCorrect) {
                        mettreAJourScore(1); // Ajouter 1 au score si la réponse est correcte
                    } else {
                        // Ajouter ici la logique si la réponse est incorrecte
                    }

                    // Créer un élément <div> pour afficher le symbole
                    const symbolElement = document.createElement('div');
                    symbolElement.classList.add('symbol');

                    // Ajouter la classe CSS correspondant au résultat
                    if (isCorrect) {
                        symbolElement.classList.add('correct');
                        symbolElement.textContent = ''; // Symbole de vérification (V vert)
                    } else {
                        symbolElement.classList.add('incorrect');
                        symbolElement.textContent = ''; // Symbole de croix (X rouge)
                    }

                    // Insérer le symbole dans la classe message-container
                    const messageContainer = radio.closest('.question').querySelector('.messageContainer');
                    messageContainer.appendChild(symbolElement);

                    // Afficher le message de réponse
                    const messageElement = document.createElement('div');
                    messageElement.classList.add('message');
                    messageElement.textContent = data.message; // Utiliser le message de réponse renvoyé par le serveur

                    // Ajouter le message au parent de la question
                    messageContainer.appendChild(messageElement);

                    // Désactiver les autres radios de la même question
                    document.querySelectorAll(`input[name="question_${idQuestion}"]:not(:checked)`).forEach(otherRadio => {
                        otherRadio.disabled = true;
                    });
                } else {
                    throw new Error('Réponse JSON vide');
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
            });
    });
});
