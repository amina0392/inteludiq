function validerFormulaireContact() {
    // Récupérer les valeurs des champs
    let nom = document.getElementById("nomContact").value.trim();
    let email = document.getElementById("emailContact").value.trim();
    let message = document.getElementById("messageContact").value.trim();
    let rgpd = document.getElementById("rgpdContact").checked;

    // Récupérer les éléments pour afficher les messages d'erreur
    let nomErreur = document.getElementById("nomErreur");
    let emailErreur = document.getElementById("emailContactErreur");
    let messageErreur = document.getElementById("messageErreur");
    let rgpdErreur = document.getElementById("rgpdContainerErreur");

    // Réinitialiser les messages d'erreur
    nomErreur.innerText = "";
    emailErreur.innerText = "";
    messageErreur.innerText = "";
    rgpdErreur.innerText = "";

    // Vérifier si les champs sont vides
    if (nom === '') {
        nomErreur.innerText = "Veuillez entrer votre nom.";
        return false;
    }

    if (email === '') {
        emailErreur.innerText = "Veuillez entrer votre email.";
        return false;
    } else if (!validerEmail(email)) {
        emailErreur.innerText = "Veuillez entrer une adresse email valide.";
        return false;
    }

    if (message === '') {
        messageErreur.innerText = "Veuillez entrer votre message.";
        return false;
    } else if (message.length > 500) {
        messageErreur.innerText = "Votre message ne doit pas dépasser 500 caractères.";
        return false;
    }

    if (!rgpd) {
        rgpdErreur.innerText = "Veuillez accepter la politique de confidentialité.";
        return false;
    }

    // Soumettre le formulaire
    return true;
}

function validerEmail(email) {
    let re = /\S+@\S+\.\S+/;
    return re.test(email);
}
