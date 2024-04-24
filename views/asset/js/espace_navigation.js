function showList(listClassName){
    var allLists = document.querySelectorAll('.nav2_container div:not(.nav2_menu,.deconnexion,.logo_menu,.logo,.profil_nav,.img_profil_nav)');
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
}

$('.filtre li a').click(function(e){
    //e.preventDefault(); // Pour éviter le comportement par défaut du lien
    $('.filtre li a').removeClass('linkActive'); // Supprimer la classe linkActive de tous les liens
    $(this).addClass('linkActive'); // Ajouter la classe linkActive au lien cliqué
});

// Gérer le clic sur un lien du sous-menu "PROFIL"
$('.sous_menu_profil').click(function(e) {
    // e.preventDefault();

    $('.nav2_menu ul li a').removeClass('activeMenuLink'); // Supprimer la classe "activeMenuLink" sur tous les liens
    
    $('.nav2_menu ul #menu_profil').find('a').addClass('activeMenuLink'); // Ajouter la classe "activeMenuLink" sur le lien "a" cliqué 
    
    $('.nav2_menu ul #menu_profil').find('a').removeClass('active'); // Supprimer la classe "active" sur tous les liens de la navigation 

});

// Gérer le clic sur un lien du sous-menu "ADMIN"
$('.sous_menu_admin').click(function(e) {
    // e.preventDefault();

    $('.nav2_menu ul li a').removeClass('activeMenuLink'); // Supprimer la classe "activeMenuLink" sur tous les liens
    
    $('.nav2_menu ul #menu_admin').find('a').addClass('activeMenuLink'); // Ajouter la classe "activeMenuLink" sur le lien "a" cliqué 
    
    $('.nav2_menu ul #menu_admin').find('a').removeClass('active'); // Supprimer la classe "active" sur tous les liens de la navigation 
});

// Gérer le clic sur un lien du sous-menu "CLIENT"
$('.sous_menu_client').click(function(e) {
    // e.preventDefault();

    $('.nav2_menu ul li a').removeClass('activeMenuLink'); // Supprimer la classe "activeMenuLink" sur tous les liens
    
    $('.nav2_menu ul #menu_client').find('a').addClass('activeMenuLink'); // Ajouter la classe "activeMenuLink" sur le lien "a" cliqué 
    
    $('.nav2_menu ul #menu_client').find('a').removeClass('active'); // Supprimer la classe "active" sur tous les liens de la navigation 
});
