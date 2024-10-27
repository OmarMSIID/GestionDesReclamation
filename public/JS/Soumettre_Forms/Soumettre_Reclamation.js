function validateForm() {
    // Ajout de la validation personnalisée si nécessaire
    const nom_utilisateur = document.getElementById("nom_utilisateur").value;
    const email = document.getElementById("email").value;
    const sujet = document.getElementById("sujet").value;
    const description = document.getElementById("description").value;

    if (!nom_utilisateur || !email || !sujet || !description) {
        alert("Tous les champs sont obligatoires, sauf la sélection d'une photo.");
        return false;
    }
    return true;
}