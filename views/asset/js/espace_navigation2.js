// CODE JS : SCROLLBAR
function showList(listClassName) {
    var allLists = document.querySelectorAll('.nav2_container div:not(.nav2_menu,.deconnexion,.profil_nav,.img_profil_nav)');
    allLists.forEach(function(list) {
      list.classList.add('hidden');
    });

    // Supprimer la classe active de tous les liens de navigation
    var navLinks = document.querySelectorAll('.nav2_menu ul li a');
    navLinks.forEach(function(link) {
      link.classList.remove('active');
    });

    // Afficher la liste correspondante
    var selectedList = document.querySelector('.' + listClassName);
    selectedList.classList.remove('hidden');

    // Ajouter la classe active au lien de navigation cliqué
    var clickedLink = document.querySelector('a[href="#"][onclick="showList(\'' + listClassName + '\')"]');
    clickedLink.classList.add('active');

    // Vérifier si l'URL est http://localhost/event_luxury/views/list_book et ajouter la classe activeMenuLink si c'est le cas
    if (window.location.href === "http://localhost/event_luxury/views/list_book") {
        var targetLink = document.querySelector('.client_book_link[href="http://localhost/event_luxury/views/list_book"]');
        targetLink.classList.add('activeMenuLink');
    }
}

