<?php

include_once "../inc/header.php";

// -------------- SECURITE ACCES ADMIN -------------- //
if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "admin") {

    include_once "../inc/nav_blc/nav_blc_espace_admin.php";
    require_once "../../models/eventModel.php";

    $listEvent = Event::findAllEvent();
    $currentDate = date('Y-m-d H:i:s'); // Date actuelle au format SQL (YYYY-MM-DD HH:MM:SS)


?>


    <!-- ------------------------ PAGE LISTE EVENT ------------------------ -->

    <main id="siteListEvent" class="siteList">

        <!-- ----- BOUTON CIRCULAIRE 2 - 'retour vers le haut'----- -->
        <?php
        include_once "../inc/bouton_retour_haut/bouton_retour_haut_admin.php";
        ?>

        <!-- ------------------------------- HAUT -------------------------------- -->
        <!-- SECTION DU HAUT - IMAGE FIXE -->
        <section class="haut">
            <div id="ImgHauteListEvent" class="ImgHaute" style="background-image: url(../asset/img/event_horizontal_bateau.jpg);">
            </div>
            <div class="titreListEvent">
                <h1>liste des événements</h1>
                <h2>ajouter, modifier, désactiver, supprimer</h2>
            </div>
            <!-- ----- BOUTON CIRCULAIRE 1 - 'scroll'----- -->
            <?php
            include_once "../inc/bouton_scroll/bouton_scroll_admin.php";
            ?>

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
                        <a href="" id="historique_event" class="historique_listEvent">Historique</a>
                    </div>

                </div>

                <!-- Div vide pour afficher le contenu -->
                <div id="resultat" class="overflow_listEvent">

                    <!-- TABLEAU - LISTE DES EVENTS -->
                    <table class="tableau_adminListEvent">
                        <thead class="thead_adminListEvent">
                            <tr>
                                <th class="table_img_none">Image</th>
                                <th>Titre</th>
                                <th class="table_category_none">Catégorie</th>
                                <th class="table_date">Date</th>
                                <th colspan="4">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_adminListEvent" class="tbody_adminList">

                            <?php
                            foreach ($listEvent as $event) {
                                // Comparer la date de l'événement avec la date actuelle
                                if ($event['date_event'] >= $currentDate) { ?>
                                    <tr class="table_module">
                                        <!-- Image -->
                                        <td class="table_img_none">
                                            <div class="table_img">
                                                <img src="../asset/img/<?= $event['image']; ?>" alt="Image <?= $event['titre']; ?>" title="Image <?= $event['titre']; ?>">
                                            </div>
                                        </td>

                                        <!-- Nom -->
                                        <td class="table_titre"><?= $event['titre']; ?></td>

                                        <!-- Catégorie -->
                                        <td class="table_category table_category_none"><?= $event['categorie_name']; ?></td>

                                        <!-- Date -->
                                        <td class="table_date"><?= date('d-m-Y', strtotime($event['date_event'])); ?></td>

                                        <!-- Action -->
                                        <?php if ($event['events_actif'] == 1) { ?>

                                            <!-- Visualiser / Consulter -->
                                            <td class="table_action"><a href="./admin_evenement.php?event=<?= $event['id_evenement']; ?>">Consulter</a></td>

                                            <!-- Annuler -->
                                            <td class="table_action"><a href="../traitement/action.php?id_event_desactive=<?= $event['id_evenement']; ?>">Annuler</a></td>

                                            <!-- Supprimer -->
                                            <td class="table_action"><a href="../traitement/action.php?id_event_delete=<?= $event['id_evenement']; ?>">Supprimer</a></td>

                                            <!-- bouton - Modifier -->
                                            <td>
                                                <p class="table_btn">
                                                    <a href="./admin_add_evenement.php?id_event_update=<?= $event['id_evenement']; ?>" id="table_btnTxt">Modifier</a>
                                                </p>
                                            </td>

                                            <td></td>

                                            <!-- Message - Evénement annulé -->
                                        <?php } elseif ($event['events_actif'] == 0) { ?>

                                            <!-- message état -->
                                            <td colspan="2" class="annulation_listEvent">Annulation</td>

                                            <!-- Visualiser / Consulter -->
                                            <td class="table_action"><a href="./admin_evenement.php?event=<?= $event['id_evenement']; ?>">Consulter</a></td>

                                            <!-- bouton - Activer l'événement -->
                                            <td>
                                                <p class="table_btn">
                                                    <a href="../traitement/action.php?id_event_active=<?= $event['id_evenement']; ?>" id="table_btnTxt_activer">Activer</a>
                                                </p>
                                            </td>
                                        <?php } ?>
                                    </tr>
                            <?php }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- --------- BTN - PREVISUALISER LA LISTE ---------- -->
                <div class="container_btnPrevisualiser">
                    <!-- btn - visualiser -->
                    <a href="./admin_previsualisation.php" class="btn_previsualiser">Prévisualiser la liste</a>
                </div>

            </div>

            <!-- --------- BTN - AJOUTER UN EVENEMENT ---------- -->
            <div class="container_btnAjouter">
                <!-- btn - ajouter -->
                <a href="./admin_add_evenement.php" class="btn_ajouter">
                    <p><i class="fa-light fa-plus"></i>Ajouter un événement</p>
                </a>
            </div>

        </section>
    </main>


    <footer></footer>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>


    <!-- -------------- BALISE SCRIPT -------------- -->
    <!-- Souris -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>
    <script src="../asset/js/app.js"></script>
    <script src="../asset/js/cercle.js"></script>
    <!-- Changement attérir sur l'espace client de la nav -->
    <script src="../asset/js/espace_admin/nav_espace_admin_event.js"></script>
    <!-- Espace navigation -->
    <script src="../asset/js/espace_navigation.js"></script>
    <!-- Changement d'état au scroll -->
    <script src="../asset/js/animation_scroll/scroll_admin_list.js"></script>
    <!-- Bouton 'retour vers le haut' -->
    <script src="../asset/js/bouton_retour_haut.js"></script>


    <script>
        // CODE JS : BTN AJAX (PROCHAINEMENT & HISTORIQUE)

        // Stocker le contenu initial de la div resultat
        var contenuInitial = $('#resultat').html();

        // Dès que la page sera complètement chargée, que le DOM (Document Objet Modèle) sera entièrement généré
        $(document).ready(function() {

            // a) utiliser la fonction on('change') de jquery afin de sélectionner un nom dans la liste déroulante : $('#personne').on('change', function()
            $('#historique_event').on('click', function(event) {
                event.preventDefault()

                // c) Sérialiser le contenu des champs du formulaire (dans cet exemple il y a un seul champ), à l'aide de la fonction serialize() de jQuery

                // d) utiliser la méthode ajax de jquery pour l'affichage de la réponse
                $.ajax({
                    url: "../traitement/historique_admin_list_event.php", // le fichier cible, celui qui fera le traitement (projet : mettre le chemin que l'on aurait mis dans la balise <a>)
                    type: "POST", // la méthode utilisée (projet : ne rien mettre, par défaut on sera sur la method GET)
                    // les paramètres à fournir ex : ...id=4&nom=anonyme...(projet : on ne met rien) 
                    dataType: 'json', // le format des données attendues en tableau JSON pour être interprété et éxécuté par AJAX (projet : 'json') 
                    success: function(response) {
                        // la fonction qui doit s'exécuter lors de la réussite de la communication ajax 
                        console.log(response);
                        $('#resultat').html(response.contenu);
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
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


    <!-- -------------- SUITE SECURITE ACCES -------------- -->
<?php } else {
    require_once "../inc/securite.php";
} ?>
</body>

</html>