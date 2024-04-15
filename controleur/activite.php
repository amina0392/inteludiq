<?php
function telechargerFichier($fichier) {
    // Vérifie si le fichier a été correctement téléchargé
    if ($fichier['error'] !== UPLOAD_ERR_OK) {
        // Gère les erreurs de téléchargement
        return false;
    }

    // Vérifie si le fichier est une image
    $type = exif_imagetype($fichier['tmp_name']);
    $allowedTypes = array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG);
    if (!in_array($type, $allowedTypes)) {
        // Gère les erreurs si le fichier n'est pas une image
        return false;
    }

    // Définie le chemin complet de destination
    $cheminDestination = 'asset/images/base/' . basename($fichier['name']);

    // Déplace le fichier téléchargé vers le dossier de destination
    if (move_uploaded_file($fichier['tmp_name'], $cheminDestination)) {
        return $cheminDestination; // Retourner le chemin complet du fichier téléchargé
    } else {
        // Gère les erreurs de déplacement du fichier
        return false;
    }
}

