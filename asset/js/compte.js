function validerFormulaireModification() {
    let nouvelEmail = document.getElementById("nouveauEmail").value.trim();
    let nouveauMotDePasse = document.getElementById("nouveauMotDePasse").value.trim();
    let nouveauPseudo = document.getElementById("nouveauPseudo").value.trim();
    let nouvelAge = document.getElementById("nouvelAge").value.trim();

    let regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    let longueurMotDePasse = nouveauMotDePasse.length;
    let longueurPseudo = nouveauPseudo.length;

    // Validation de l'email si non vide
    if (nouvelEmail !== "") {
        if (!regexEmail.test(nouvelEmail)) {
            document.getElementById("emailErreurProfil").innerHTML = "Format d'email invalide.";
            return false;
        } else {
            document.getElementById("emailErreurProfil").innerHTML = "";
        }
    }

    // Validation du mot de passe si non vide
    if (nouveauMotDePasse !== "") {
        if (longueurMotDePasse < 14 || longueurMotDePasse > 60) {
            document.getElementById("mdpErreurProfil").innerHTML = "Le mot de passe doit avoir entre 14 et 60 caractères.";
            return false;
        } else {
            document.getElementById("mdpErreurProfil").innerHTML = "";
        }
    }

    // Validation du pseudo si non vide
    if (nouveauPseudo !== "") {
        if (longueurPseudo > 50) {
            document.getElementById("pseudoErreurProfil").innerHTML = "Le pseudo ne doit pas dépasser 50 caractères.";
            return false;
        } else {
            document.getElementById("pseudoErreurProfil").innerHTML = "";
        }
    }

    // Validation de l'âge si non vide
    if (nouvelAge !== "") {
        if (isNaN(nouvelAge) || nouvelAge < 3 || nouvelAge > 120) {
            document.getElementById("ageErreurProfil").innerHTML = "L'âge doit être un nombre entre 3 et 120.";
            return false;
        } else {
            document.getElementById("ageErreurProfil").innerHTML = "";
        }
    }

    // Le formulaire est valide
    return true;
}
