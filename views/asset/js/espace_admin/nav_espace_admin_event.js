document.addEventListener("DOMContentLoaded", function() {
    // Sélectionner le lien et l'élément <li>
    var reservationLink = document.querySelector('a.admin_event_link.sous_menu_admin');
    var menuAdminLink = document.querySelector('#menu_admin a.slide-line');

    // Ajouter la classe linkActive au lien
    if (reservationLink) {
        reservationLink.classList.add('linkActive');
    }

    // Ajouter la classe activeMenuLink au lien à l'intérieur de #menu_client
    if (menuAdminLink) {
        menuAdminLink.classList.add('activeMenuLink');
        }
});