document.addEventListener("DOMContentLoaded", function() {
    // Sélectionner le lien et l'élément <li>
    var reservationLink = document.querySelector('a.profil_panier_link.sous_menu_profil');
    var menuProfilLink = document.querySelector('#menu_profil a.slide-line');

    // Ajouter la classe linkActive au lien
    if (reservationLink) {
        reservationLink.classList.add('linkActive');
    }

    // Ajouter la classe activeMenuLink au lien à l'intérieur de #menu_client
    if (menuProfilLink) {
        menuProfilLink.classList.add('activeMenuLink');
        }
});