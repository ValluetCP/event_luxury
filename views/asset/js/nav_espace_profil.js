document.addEventListener("DOMContentLoaded", function() {
    // Sélectionner le lien et l'élément <li>
    var reservationLink = document.querySelector('a.profil_info_link.sous_menu_profil');
    var menuClientLink = document.querySelector('#menu_profil a.slide-line');

    // Ajouter la classe linkActive au lien
    if (reservationLink) {
        reservationLink.classList.add('linkActive');
    }

    // Ajouter la classe activeMenuLink au lien à l'intérieur de #menu_client
    if (menuClientLink) {
        menuClientLink.classList.add('activeMenuLink');
        }
});