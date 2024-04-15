  function validerFormulaire() {
        let action = document.getElementById("action").value;
        switch(action) {
            case "creationQuestionImage":
                return validerQuestionImage();
                break;
            case "creationQuestionQcm":
                return validerQuestionQcm();
                break;
            case "suppressionUtilisateur":
                return validerSuppressionUtilisateur();
                break;
            case "suppressionCommentaire":
                return validerSuppressionCommentaire();
                break;
            case "afficherMessage":
                break;
            case "afficherCommentaires":
                break;
            case "afficherUtlisateur":
                break;
            default:
                return false;
        }
    }
    function selectAction() {
        let actionSelectionnee = document.getElementById('action').value; 
        console.log("Action sélectionnée :", actionSelectionnee); 
        let ancreCorrespondante = document.getElementsByName(actionSelectionnee)[0]; 
        console.log("Ancre correspondante :", ancreCorrespondante); 
        if (ancreCorrespondante) {
            ancreCorrespondante.scrollIntoView({ behavior: 'smooth', block: 'start' }); 
        } else {
            console.error("Ancre non trouvée pour l'action sélectionnée");
        }
    }
    function validerQuestionImage() {
        let enonceImage = document.getElementById("enonceImage").value;
        let image1 = document.getElementById("image1").value;
        let image2 = document.getElementById("image2").value;
        let image3 = document.getElementById("image3").value;
        let radios = document.getElementsByName("choixImage");
    
        // Vérifier si tous les champs sont remplis pour la question d'image
        if (enonceImage === "" || image1 === "" || image2 === "" || image3 === "") {
            alert("Veuillez remplir tous les champs pour la question d'image.");
            return false;
        }
        
        // Vérifier si au moins un bouton radio est coché pour la question d'image
        let checked = false;
        for (let i = 0; i < radios.length; i++) {
            if (radios[i].checked) {
                checked = true;
                break;
            }
        }
        if (!checked) {
            alert("Veuillez sélectionner une image comme solution.");
            return false;
        }
    
        return true;
    }
    
    function validerQuestionQcm() {
        let enonceQcm = document.getElementById("enonceQcm").value;
        let label1 = document.getElementById("label1").value;
        let label2 = document.getElementById("label2").value;
        let label3 = document.getElementById("label3").value;
        let qcmRadios = document.getElementsByName("solutionQcm");
    
        // Vérifier si tous les champs sont remplis pour la question QCM
        if (enonceQcm === "" || label1 === "" || label2 === "" || label3 === "") {
            alert("Veuillez remplir tous les champs pour la question QCM.");
            return false;
        }
    
        // Vérifier si au moins un bouton radio est coché pour la question QCM
        let qcmChecked = false;
        for (let j = 0; j < qcmRadios.length; j++) {
            if (qcmRadios[j].checked) {
                qcmChecked = true;
                break;
            }
        }
        if (!qcmChecked) {
            alert("Veuillez sélectionner une réponse pour la question QCM.");
            return false;
        }
    
        return true;
    }
    
// Valider le formulaire pour la suppression d'utilisateur par son idUtilisateur
function validerSuppressionUtilisateur() {
    let idUtilisateur = document.getElementById("idUtilisateur").value;

    // Vérifier si l'idUtilisateur est vide
    if (idUtilisateur === "") {
        alert("Veuillez entrer l'ID de l'utilisateur à supprimer.");
        return false;
    }

    // Valider que l'idUtilisateur est un nombre
    if (isNaN(idUtilisateur)) {
        alert("L'ID de l'utilisateur doit être un nombre.");
        return false;
    }

    return true;
}

// Valider le formulaire pour la suppression de commentaire par son idCommentaire
function validerSuppressionCommentaire() {
    let idCommentaire = document.getElementById("idCommentaire").value;

    // Vérifier si l'idCommentaire est vide
    if (idCommentaire === "") {
        alert("Veuillez entrer l'ID du commentaire à supprimer.");
        return false;
    }

    // Valider que l'idCommentaire est un nombre
    if (isNaN(idCommentaire)) {
        alert("L'ID du commentaire doit être un nombre.");
        return false;
    }

    return true;
}

// Ajouter des écouteurs d'événements de soumission à toutes les fonctions de validation
document.querySelector('form').addEventListener('submit', function(event) {
    if (!validerQuestionImage()) {
        event.preventDefault();
    }
});

document.querySelector('form').addEventListener('submit', function(event) {
    if (!validerQuestionQcm()) {
        event.preventDefault();
    }
});
// Valider le formulaire pour la suppression d'utilisateur par son idUtilisateur
document.querySelector('form').addEventListener('submit', function(event) {
    if (!validerSuppressionUtilisateur()) {
        event.preventDefault();
    }
});

// Valider le formulaire pour la suppression de commentaire par son idCommentaire
document.querySelector('form').addEventListener('submit', function(event) {
    if (!validerSuppressionCommentaire()) {
        event.preventDefault();
    }
});






