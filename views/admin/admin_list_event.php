<?php
include_once "../inc/header.php";
include_once "../inc/navigation.php";
require_once "../../models/eventModel.php";

$listEvent = Event::findAllEvent();
$currentDate = date('Y-m-d H:i:s'); // Date actuelle au format SQL (YYYY-MM-DD HH:MM:SS)
?>




<!-- ------------------------ PAGE LISTE EVENT ------------------------ -->

<main id="siteListEvent" class="siteList">
    
    <!-- ------------------------------- HAUT -------------------------------- -->
    <!-- SECTION DU HAUT - IMAGE FIXE -->
    <section class="haut">
        <div id="ImgHauteListEvent" class="ImgHaute" style="background-image: url(../asset/img/event_horizontal_bateau.jpg);">
        </div>
        <div class="titreListEvent">
            <h1>liste des événements</h1>
            <h2>ajouter, modifier, désactiver, supprimer</h2>
        </div>
        
    </section>


    <!-- ------------------------------- BAS -------------------------------- -->
    <!-- SECTION DU BAS - LISTE DES EVENTS -->
    <section class="bas">
        
        <!-- CONTAINER GLOBAL - liste des events -->
        <div id="container_adminListEvent" class="container_list">

            <!-- ZONE FILTRE -->
            <div class="container_btnFiltre_listEvent">

                <!-- BOUTON (btn Prochainement - btn historique) -->
                <div id="btn_adminListEvent" class="btnProchainHistorique">
                    <a href="" id="reinitialiser_resultat" class="prochainement_listEvent">Prochainement</a>
                    <a href="" id="prochain_event" class="historique_listEvent">Historique</a>
                </div>
                
                <!-- FILTRE -->
                <div class="filtreCategory">
                    <button type="submit" class="lb_filtre">Filtrer</button>
                    <div class="lb_selectFiltre">
                      <select name="lb_categoryFiltre" id="lb_categoryFiltre">
                        <option value="1">Toutes les catégories</option>
                        <option value="2">Divertissement</option>
                        <option value="3">Atelier</option>
                        <option value="4">Gastronomie</option>
                        <option value="5">Evasion</option>
                      </select>
                    </div>
                </div>
                
            </div>

            <!-- Div vide pour afficher le contenu -->
            <div id="resultat" class="overflow_listEvent"> 

                <!-- TABLEAU - LISTE DES EVENTS -->
                <table class="tableau_adminListEvent">
                    <thead class="thead_adminListEvent">
                        <tr>
                            <th class="table_img_none"></th>
                            <th>Titre</th>
                            <th class="table_category_none">Catégorie</th>
                            <th class="table_date">Date</th>
                            <th colspan="4">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbody_adminListEvent" class="tbody_adminList">
    
                        <!-- MODULE 1 -->
                        <tr class="table_module">
                            <td class="table_img_none">
                                <div class="table_img">
                                    <img src="../asset/img/event_flamant.jpg" alt="">
                                </div>
                            </td>
                            <td class="table_titre">Pink flamingo</td>
                            <td class="table_category table_category_none">Découverte</td>
                            <td class="table_date">29.05.24</td>
                            <td class="table_action"><a href="">consulter</a></td>
                            <td class="table_action"><a href="">annuler</a></td>
                            <td class="table_action"><a href="">supprimer</a></td>
                            <!-- bouton -->
                            <td>
                                <p class="table_btn">
                                    <a href="" id="table_btnTxt">modifier</a>
                                </p>
                            </td>
                        </tr>
    
                        <!-- MODULE 2 -->
                        <tr>
                            <td class="table_img_none">
                                <div class="table_img">
                                    <img src="../asset/img/event_tennis.jpg" alt="">
                                </div>
                            </td>
                            <td class="table_titre">Comme un pro</td>
                            <td class="table_category table_category_none">Divertissement</td>
                            <td class="table_date">29.05.24</td>
                            <td class="table_action"><a href="">consulter</a></td>
                            <td class="table_action"><a href="">annuler</a></td>
                            <td class="table_action"><a href="">supprimer</a></td>
                            <!-- bouton -->
                            <td>
                                <p class="table_btn">
                                    <a href="" id="table_btnTxt">modifier</a>
                                </p>
                            </td>
                        </tr>
    
                        <!-- MODULE BOUCLE -->
                        <tr class="table_module">
                            <td class="table_img_none">
                                <div class="table_img">
                                    <img src="../asset/img/event_tennis.jpg" alt="">
                                </div>
                            </td>
                            <td class="table_titre">Comme un pro</td>
                            <td class="table_category table_category_none">Divertissement</td>
                            <td class="table_date">29.05.24</td>
                            <td class="table_action"><a href="">consulter</a></td>
                            <td class="table_action"><a href="">annuler</a></td>
                            <td class="table_action"><a href="">supprimer</a></td>
                            <!-- bouton -->
                            <td>
                                <p class="table_btn">
                                    <a href="" id="table_btnTxt">modifier</a>
                                </p>
                            </td>
                        </tr>

                        <?php 
                        foreach($listEvent as $event){ 
                            // Comparer la date de l'événement avec la date actuelle
                            if ($event['date_event'] >= $currentDate) { ?>
                                <tr class="table_module">
                                    <!-- Image -->
                                    <td class="table_img_none">
                                        <div class="table_img">
                                            <img src="../asset/img/<?=$event['image']; ?>" alt="">
                                        </div>
                                    </td>

                                    <!-- Nom -->
                                    <td class="table_titre"><?= $event['titre']; ?></td>

                                    <!-- Catégorie -->
                                    <td class="table_category table_category_none"><?= $event['categorie_name']; ?></td>

                                    <!-- Date -->
                                    <td class="table_date"><?= $event['date_event']; ?></td>
                                    
                                    <!-- Action -->
                                    <?php if ($event['events_actif'] == 1){ ?>

                                        <!-- Visualiser / Consulter -->
                                        <td class="table_action"><a href="./event.php?event=<?= $event['id_evenement']; ?>">Consulter</a></td>

                                        <!-- Annuler -->
                                        <td class="table_action"><a href="traitement/action.php?id_event_desactive=<?= $event['id_evenement']; ?>">Annuler</a></td>
                                        
                                        <!-- Supprimer -->
                                        <td><a href="traitement/action.php?id_event_delete=<?= $event['id_evenement']; ?>">Supprimer</a></td>

                                        <!-- bouton - Modifier -->
                                        <td>
                                            <p class="table_btn">
                                            <a href="./add_event.php?id_event_update=<?= $event['id_evenement']; ?>" id="table_btnTxt">Modifier</a>
                                            </p>
                                        </td>

                                        <td></td>

                                    <!-- Message - Evénement annulé -->
                                    <?php }elseif($event['events_actif'] == 0){ ?>

                                        <!-- bouton - Activer l'événement -->
                                        <td colspan="4"><a href="traitement/action.php?id_event_active=<?= $event['id_evenement']; ?>">Activer l'évènement</a></td>

                                        <!-- message état -->
                                        <td>annulation</td>
                                    <?php } ?>
                                </tr>
                            <?php }
                        }   
                    ?>
                    </tbody>
                </table>
            </div>

        </div>

        <!-- --------- BTN - AJOUTER UN EVENEMENT ---------- -->
        <div class="container_btnAjouter">
            
            <!-- btn - ajouter -->
            <a href="./admin_add_evenement.php" class="btn_ajouter"><p><i class="fa-light fa-plus"></i>Ajouter un événement</p></a>

            <!-- btn - visualiser -->
            <!-- <a href="./admin_add_evenement.php" class="btn_ajouter"><p>Visualiser la liste des évènements</p></a> -->
        </div>

    </section>
</main>


<footer></footer>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <script src="./js/nav_scroll2.js"></script>

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