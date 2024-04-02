<?php

include_once "../inc/header.php";
include_once "../inc/navigation_header.php";
require_once "../../models/categorieModel.php";
$listCategorie = Categorie::findAllCategorie();
?>

    
    <!-- ---------------------- PAGE LISTE CATEGORIE ---------------------- -->
    <main id="siteListEvent" class="siteList">
        
        
        <!-- ------------------------------- HAUT -------------------------------- -->
        <!-- SECTION DU HAUT - IMAGE FIXE -->
        <section class="haut">
            <div id="ImgHauteListEvent" class="ImgHaute" style="background-image: url(../asset/img/event_horizontal_thai.JPG);">
            </div>
            <div class="titreListEvent">
                <h1>liste des catégories</h1>
                <h2>ajouter, modifier, désactiver</h2>
                
                <!-- <p>
                    Plongez dans un monde d'expériences exclusives et inoubliables où chaque moment est une découverte. Assistez à des concerts privés, privatisez des lieux insolites et d'exception, et vivez des compétitions de haut vol en compagnie de vos athlètes préférés. Transformez-vous en star internationale ou en pilote de Formule 1 le temps d'une journée. Laissez-vous guider par des chefs étoilés qui dévoileront leurs secrets culinaires lors d'ateliers intimes. Savourez des brunchs aux meilleures tables et émerveillez-vous devant des shows culinaires spectaculaires. Offrez-vous des instants uniques où le luxe et l'exclusivité se marient pour créer des souvenirs inoubliables.
                </p> -->
                
                <!-- catégorie : divertissement, atelier, gastronomie, représentation, loisir -->
            </div>
            
        </section>


    <!-- ------------------------------- BAS -------------------------------- -->
    <!-- SECTION DU BAS - LISTE DES EVENTS -->
    <section class="bas">
        
        
        <!-- CONTAINER GLOBAL - liste des events -->
        <div id="container_adminCategory" class="container_list">

            <!-- Div vide pour afficher le contenu -->
            <div id="resultat" class="overflow_listEvent"> 

                <!-- TABLEAU - LISTE DES EVENTS -->
                <table class="tableau_adminListEvent">
                    <thead class="thead_adminListEvent">
                        <tr>
                            <th>Id</th>
                            <th>Catégorie</th>
                            <th>Nombre d'événements</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbody_adminListEvent" class="tbody_adminList">
                        
                        <!-- MODULE BOUCLE -->
                        <?php foreach($listCategorie as $categorie){ ?>
                            <tr class="table_module">

                                <!-- Identifiant -->
                                <td class="table_quatite"><?= $categorie['id_categorie']; ?></td>

                                <!-- titre -->
                                <td class="table_titre"><?= $categorie['categorie_name']; ?></td>

                                <!-- nombre d'event associés -->
                                <td class="table_quatite">4</td>

                                <!-- supprimer -->
                                <td class="table_action"><a href="traitement/action.php?id_categorie_delete=<?= $categorie['id_categorie']; ?>">supprimer</a></td>

                                <!-- modifier -->
                                <td>
                                    <p class="table_btn">
                                        <a href="./admin_add_categorie.php?id_categorie_update=<?= $categorie['id_categorie']; ?>" id="table_btnTxt">modifier</a>
                                    </p>
                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- --------- BTN - AJOUTER UN EVENEMENT ---------- -->
        <div class="container_btnAjouter">
            
            <a href="./admin_add_categorie.php" class="btn_ajouter"><p><i class="fa-light fa-plus"></i>Ajouter une catégorie</p></a>
        </div>

    </section>
</main>


<footer></footer>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <!-- BALISE SCRIPT -->
    <!-- Espace navigation -->
    <script src="../asset/js/espace_navigation2.js"></script>
    <!-- Changement d'état au scroll -->
    <script src="../asset/js/nav_scroll2.js"></script>

    <script>

        // CODE JS : SCROLLBAR
        function showList(listClassName){
            var allLists = document.querySelectorAll('.nav2_container div:not(.nav2_menu,.deconnexion,.profil_nav,.img_profil_nav)');
            allLists.forEach(function(list) {
                list.classList.add('hidden');
            });
    
            // Afficher la liste correspondante
            var selectedList = document.querySelector('.' + listClassName);
            selectedList.classList.remove('hidden');
        }



        // CODE JS : BTN AJAX (PROCHAINEMENT & HISTORIQUE)

        // Stocker le contenu initial de la div resultat
        var contenuInitial = $('#resultat').html();

        // Dès que la page sera complètement chargée, que le DOM (Document Objet Modèle) sera entièrement généré
        $(document).ready(function() {

            // a) utiliser la fonction on('change') de jquery afin de sélectionner un nom dans la liste déroulante : $('#personne').on('change', function()
            $('#prochain_event').on('click', function(event) {
                event.preventDefault()

                // c) Sérialiser le contenu des champs du formulaire (dans cet exemple il y a un seul champ), à l'aide de la fonction serialize() de jQuery

                // d) utiliser la méthode ajax de jquery pour l'affichage de la réponse
                $.ajax({
                    url: "../traitement/traitement_ajax3.php", // le fichier cible, celui qui fera le traitement (projet : mettre le chemin que l'on aurait mis dans la balise <a>)
                    type: "POST", // la méthode utilisée (projet : ne rien mettre, par défaut on sera sur la method GET)
                    // les paramètres à fournir ex : ...id=4&nom=anonyme...(projet : on ne met rien) 
                    dataType: 'json', // le format des données attendues en tableau JSON pour être interprété et éxécuté par AJAX (projet : 'json') 
                    success: function(response) {
                        // la fonction qui doit s'exécuter lors de la réussite de la communication ajax 
                        console.log(response);
                        $('#resultat').html(response.contenu);
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        console.log(xhr.status);
                        console.log(thrownError);
                    }
                });
            });

            // Réinitialiser la div resultat à son contenu initial
            $('#reinitialiser_resultat').on('click', function(event) {
                event.preventDefault();
                $('#resultat').html(contenuInitial);
            });


        });
    </script>
</body>
</html>