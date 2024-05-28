document.addEventListener("DOMContentLoaded", function() {
    // Sélectionner le lien et l'élément <li>
    var connexionLink = document.querySelector('a.connexionLink');

    // Ajouter la classe linkActive au lien
    if (connexionLink) {
        connexionLink.classList.add('homeActive');
    }
});