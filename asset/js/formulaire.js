// Fonction pour valider le formulaire de connexion
function validerFormulaireConnexion() {
    // Récupérer les valeurs des champs
    let email = document.getElementById("emailConnexion").value.trim();
    let motDePasse = document.getElementById("motDePasseConnexion").value.trim();

    // Récupérer les éléments pour afficher les messages d'erreur
    let emailErreur = document.getElementById("emailErreurCon");
    let motDePasseErreur = document.getElementById("motDePasseErreurCon");

    // Vérifier si les champs sont vides
    if (email === "" || motDePasse === "") {
        emailErreur.innerText = "Veuillez remplir tous les champs.";
        motDePasseErreur.innerText = "";
        return false;
    }

    // Vérifier la validité de l'email avec une expression régulière
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        emailErreur.innerText = "Veuillez entrer une adresse e-mail valide.";
        return false;
    }

    // Réinitialiser les messages d'erreur
    emailErreur.innerText = "";
    motDePasseErreur.innerText = "";

    // Soumettre le formulaire
    return true;
}

// Fonction pour valider le formulaire d'inscription
function validerFormulaireInscription() {
    // Récupérer les valeurs des champs
    let email = document.getElementById("emailInscription").value.trim();
    let motDePasse = document.getElementById("motDePasseInscription").value.trim();
    let confirmMotDePasse = document.getElementById("confirmMotDePasse").value.trim();
    let pseudo = document.getElementById("pseudo").value.trim();
    let age = parseInt(document.getElementById("age").value.trim());
    let rgpdCheckbox = document.getElementById("rgpdInscription");

    // Récupérer les éléments pour afficher les messages d'erreur
    let emailErreur = document.getElementById("emailErreurIns");
    let motDePasseErreur = document.getElementById("motDePasseErreurIns");
    let confirmMotDePasseErreur = document.getElementById("confirmMotDePasseErreur");
    let pseudoErreur = document.getElementById("pseudoErreur");
    let ageErreur = document.getElementById("ageErreur");

    // Vérifier si les champs sont vides
    if (email === "" || motDePasse === "" || confirmMotDePasse === "" || pseudo === "" || age === "") {
        emailErreur.innerText = "Veuillez remplir tous les champs.";
        motDePasseErreur.innerText = "";
        confirmMotDePasseErreur.innerText = "";
        pseudoErreur.innerText = "";
        ageErreur.innerText = "";
        return false;
    }

    // Vérifier la validité de l'email avec une expression régulière
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        emailErreur.innerText = "Veuillez entrer une adresse e-mail valide.";
        return false;
    } else {
        emailErreur.innerText = ""; // Réinitialiser le message d'erreur
    }

    // Vérifier la longueur du mot de passe
    if (motDePasse.length < 14 || motDePasse.length > 60) {
        motDePasseErreur.innerText = "Le mot de passe doit être compris entre 14 et 60 caractères.";
        return false;
    } else {
        motDePasseErreur.innerText = ""; // Réinitialiser le message d'erreur
    }

    // Vérifier la longueur du pseudo
    if (pseudo.length > 50) {
        pseudoErreur.innerText = "Le pseudo ne doit pas dépasser 50 caractères.";
        return false;
    } else {
        pseudoErreur.innerText = ""; // Réinitialiser le message d'erreur
    }

    // Vérifier la validité de l'âge
    if (age < 3 || age > 120 || isNaN(age)) {
        ageErreur.innerText = "L'âge doit être un nombre compris entre 3 et 120.";
        return false;
    } else {
        ageErreur.innerText = ""; // Réinitialiser le message d'erreur
    }

    // Vérifier si la case RGPD est cochée
    if (!rgpdCheckbox.checked) {
        ageErreur.innerText = "Veuillez accepter les mentions légales et la politique de confidentialité.";
        return false;
    } else {
        ageErreur.innerText = ""; // Réinitialiser le message d'erreur
    }

    // Si toutes les vérifications sont passées, réinitialiser tous les messages d'erreur
    emailErreur.innerText = "";
    motDePasseErreur.innerText = "";
    confirmMotDePasseErreur.innerText = "";
    pseudoErreur.innerText = "";
    ageErreur.innerText = "";

    // Soumettre le formulaire
    return true;
}
