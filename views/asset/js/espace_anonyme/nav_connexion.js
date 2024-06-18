document.addEventListener("DOMContentLoaded", function() {
    // Sélectionner le lien et l'élément <li>
    var connexionLink = document.querySelector('a.connexionLink');

    // Ajouter la classe activeMenuLink au lien à l'intérieur de #menu_client
    if (connexionLink) {
        connexionLink.classList.add('.activeHome');
        }
});