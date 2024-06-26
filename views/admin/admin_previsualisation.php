<?php
include_once "../inc/header.php";

// -------------- SECURITE ACCES ADMIN -------------- //
if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "admin") {

    include_once "../inc/nav_blc/nav_blc_espace_admin.php";
    include_once "../inc/functions.php";
    require_once "../../models/eventModel.php";
    require_once "../../models/bookModel.php";
    require_once "../../models/userModel.php";
    require_once "../../models/categorieModel.php";

    // -------------- CODE -------------- //
    $listEvent = Event::findAllEvent();
    $userReservation = User::userReservation($_SESSION['id_user']);

    // $userReservationIds = array_column($reservations, 'event_id');
    $userReservationIds = Book::userReservationIds($_SESSION['id_user']); // Utilisez la nouvelle méthode

    $currentDate = date('Y-m-d H:i:s'); // Date actuelle au format SQL (YYYY-MM-DD HH:MM:SS)

    foreach ($listEvent as $event) {
        // Récupération des valeurs de categorie_id et categorie_name
        $categories[$event["categorie_id"]] = $event["categorie_name"];
    }

?>



    <!-- ------------------- PAGE PREVISUALISATION (LISTE EVENT) - ADMIN ------------------- -->
    <main id="siteListEvent" class="siteList">
        <!-- ----- BOUTON CIRCULAIRE - 'retour vers le haut'----- -->
        <?php
        include_once "../inc/bouton_retour_haut/bouton_retour_haut_admin.php";
        ?>


        <!-- ------------------------------- HAUT -------------------------------- -->
        <!-- SECTION DU HAUT - IMAGE FIXE -->
        <section class="haut">
            <div id="ImgHauteListEvent" class="ImgHaute" style="background-image: url(../asset/img/event_horizontal_voiture.jpg);">
            </div>
            <div class="titreListEvent">
                <h1>tous nos événements</h1>
                <h2>sont à découvrir</h2>
            </div>
            <!-- ----- BOUTON CIRCULAIRE 1 - 'scroll'----- -->
            <?php
            include_once "../inc/bouton_scroll/bouton_scroll_admin.php";
            ?>

            <!-- FOOTER FIXE -->
        </section>


        <!-- ------------------------------- BAS -------------------------------- -->
        <!-- SECTION DU BAS - LISTE DES EVENTS -->
        <section class="bas">

            <!-- PREVISUALISATION -->
            <div class="containerPrevisualisation">
                <div class="txtPrevisualisation">
                    <!-- <p>Prévisualisation</p> -->
                    <!-- SECTION BANDE -->
                    <div class="container_bande">
                        <div class="list listPreview">
                            <div class="item">
                                <span class="item-txt">Prévisualisation</span>
                                <span class="item-d">
                                    <p class="item-dot dot-t">*</p>
                                </span>
                                <span class="item-txt">Prévisualisation</span>
                                <span class="item-d">
                                    <p class="item-dot dot-b">*</p>
                                </span>
                                <span class="item-txt">Prévisualisation</span>
                                <span class="item-d">
                                    <p class="item-dot dot-g">*</p>
                                </span>
                                <span class="item-txt">Prévisualisation</span>
                                <span class="item-d">
                                    <p class="item-dot dot-y">*</p>
                                </span>
                                <span class="item-txt">Prévisualisation</span>
                                <span class="item-d">
                                    <p class="item-dot dot-r">*</p>
                                </span>
                            </div>
                        </div>
                        <div class="list listPreview">
                            <div class="item">
                                <span class="item-txt">Prévisualisation</span>
                                <span class="item-d">
                                    <p class="item-dot dot-t">*</p>
                                </span>
                                <span class="item-txt">Prévisualisation</span>
                                <span class="item-d">
                                    <p class="item-dot dot-b">*</p>
                                </span>
                                <span class="item-txt">Prévisualisation</span>
                                <span class="item-d">
                                    <p class="item-dot dot-g">*</p>
                                </span>
                                <span class="item-txt">Prévisualisation</span>
                                <span class="item-d">
                                    <p class="item-dot dot-y">*</p>
                                </span>
                                <span class="item-txt">Prévisualisation</span>
                                <span class="item-d">
                                    <p class="item-dot dot-r">*</p>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CONTAINER GLOBAL - liste des events -->
            <div id="container_listEvent" class="container_list">

                <!-- ZONE FILTRE -->
                <div class="container_btnFiltre_listEvent">

                    <!-- btn Prochainement - btn historique -->
                    <div class="btnProchainHistorique">
                        <a href="" id="reinitialiser_resultat" class="prochainement_listEvent">Prochainement</a>
                        <a href="" id="historique_event" class="historique_listEvent">Historique</a>
                    </div>

                    <!-- FILTRE -->
                    <!-- Ajoutez le formulaire de filtre ici -->
                    <!-- <form method="get" action="" class="filtreCategory">
                        <button type="submit" class="lb_filtre">Filtrer</button>
                        <div class="lb_selectFiltre">
                            <select name="categorie" id="categorie">
                                <option value="">Toutes les catégories</option>
                                <?php foreach ($categories as $key => $categorie) { ?>
                                    <option value="<?= $key; ?>"><?= $categorie ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </form> -->
                </div>

                <!-- CODE : FILTRER PAR CATEGORIE -->
                <?php
                // Ajoutez ce bloc pour filtrer par catégorie
                $categorieFilter = isset($_GET['categorie']) ? $_GET['categorie'] : null;
                if ($categorieFilter) {
                    // $listEvent = Event::findEventsByCategory($categorieFilter);
                    $evenementsByCategory = array_filter($listEvent, function ($evenement) use ($categorieFilter) {
                        return $evenement['categorie_id'] === (int)$categorieFilter;
                    });
                } else {
                    $evenementsByCategory = $listEvent;
                }
                ?>

                <!-- Div vide pour afficher le contenu -->
                <div id="resultat" class="overflow_listEvent">

                    <!-- MODULE BOUCLE : CODE -->
                    <?php foreach ($evenementsByCategory as $event) {
                        // Comparer la date de l'événement avec la date actuelle, si la date est déjà passé ne l'afficher ici

                        if ($event['date_event'] >= $currentDate) {
                            // Obtenir le nombre total de places réservées pour cet évènement
                            $totalPlacesReservees = Book::calculReservation($event['id_evenement']);
                    ?>


                            <!-- MODULE BOUCLE -->
                            <div class="module_listEvent">

                                <!-- MODULE - partie gauche - image -->
                                <div class="img_listEvent"><img src="../asset/img/<?= $event['image']; ?>" alt="image <?= $event['titre']; ?>"></div>

                                <!-- MODULE - partie centrale - texte -->
                                <div class="center_txt_listEvent">
                                    <div class="txt_container_listEvent">
                                        <!-- numéro -->
                                        <div class="num_listEvent"><?= $event['id_evenement']; ?></div>
                                        <div class="txt_listEvent">
                                            <div class="titre_listEvent titre_previsualisation"><a href="./admin_evenement.php?event=<?= $event['id_evenement']; ?>"><?= $event['titre']; ?></a></div>
                                            <!-- date / category -->
                                            <div class="ss_titre_listEvent">
                                                <div class="category"><?= $event['categorie_name']; ?></div>
                                                <div class="date"><?= date('d-m-Y', strtotime($event['date_event'])); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- MODULE - partie droite - tarif & état -->
                                <div class="tarif_etat_listEvent">
                                    <div class="tarif_listEvent">Tarif: <?= $event['prix']; ?>€</div>

                                    <!-- Etat -->
                                    <!-- <div class="etat_listEvent">Réservé</div> -->

                                    <?php if (!empty($_SESSION['id_user'])) { ?>

                                        <!-- Complet -->
                                        <?php if ($totalPlacesReservees >= $event['nbr_place']) { ?>
                                            <div class="etat_listEvent">Complet</div>

                                            <!-- Annulation -->
                                        <?php } elseif ($event['events_actif'] == 0) { ?>
                                            <div class="etat_listEvent">Annulation</div>

                                            <!-- Rien -->
                                        <?php } else { ?>

                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>


                            <!-- Ajouter le nombre de particpant par évènement -->

                    <?php }
                    } ?>





                    <!-- <div class="degrade_listEvent"> -->
                </div>


                <!-- </div> -->
            </div>

            <!-- --------- BTN - QUITTER LA VISUALISATION ---------- -->
            <div class="container_btnAjouter">

                <!-- btn - ajouter -->
                <a href="./admin_list_event.php" id="quitter_previsualisation" class="btn_ajouter">
                    <p>Quitter la visualisation</p>
                </a>

                <!-- btn - visualiser -->
                <!-- <a href="./admin_add_evenement.php" class="btn_ajouter"><p>Visualiser la liste des évènements</p></a> -->
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
    <script src="../asset/js/animation_scroll/scroll_previsualisation.js"></script>

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
                    url: "../traitement/historique_previsualisation_list_event.php", // le fichier cible, celui qui fera le traitement (projet : mettre le chemin que l'on aurait mis dans la balise <a>)
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