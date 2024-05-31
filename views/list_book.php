<?php
include_once "./inc/header.php";

// -------------- SECURITE ACCES CLIENT & ADMIN -------------- //
if ((isset($_SESSION['user_role']) && $_SESSION['user_role'] == "admin") ||
    (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "client")
) {

    include_once "./inc/nav_blc_espace_client.php";
    include_once "./inc/functions.php";
    require_once "../models/eventModel.php";
    require_once "../models/bookModel.php";
    require_once "../models/userModel.php";
    require_once "../models/categorieModel.php";


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

    // Utilisation de array_unique pour obtenir les valeurs uniques
    // $categoriesUniques = array_unique($categories);
?>



    <!-- ----------------------------- MODAL BILLET ------------------------------ -->


    <!-- MODAL BILLET (structure générale)-->
    <div id="modalBillet">
        <div class="modalContentBillet">
            <div class="modalBilletBg" style="background-image: url(./asset/img/event_flamant.jpg);"></div>
        </div>
        <a class="modalCloseBillet" href="#"><img class="img_croix_popup2" src="./asset/img/croix_close.svg" alt=""></a>
        <a href="" id="lb_btnBillet" class="btn_billet_panier">Télécharger le billet</a>

        <!-- MODAL BILLET (modélisation)-->
        <div class="billet">
            <!-- <img src="./img/test_billet.png" alt=""> -->
            <div class="billet_partie_haute">
                <div class="imgEventBillet">
                    <div class="bgEventBillet" style="background-image: url(./asset/img/event_flamant.jpg);"></div>
                    <!-- <img src="./img/coco2.JPG" alt=""> -->
                </div>
                <div class="divDate">
                    <div class="dateBillet"><?= date('d-m-y', strtotime($event['date_event'])); ?></div>
                </div>
                <h2 class="titreBillet">Pink flamingo</h2>
                <p class="categorieBillet"><?= $event['categorie_name']; ?></p>
                <div class="placeBillet">
                    <div class="txtPlaceBillet">
                        <p>Nombre de <br> places réservées</p>
                    </div>
                    <div class="nbPlaceBillet">04</div>
                </div>
                <div class="txtBillet">
                    Merci de vous présenter à l'événement 30 minutes avant le commencement et de vous munir de votre billet de réservation.
                </div>
            </div>
            <div class="billet_partie_basse">
                <img class="imgCodeBarre" src="./asset/img/code_barre.png" alt="">
            </div>

        </div>
    </div>


    <main id="siteListBook" class="siteList">

        <!-- ----- BOUTON CIRCULAIRE - 'retour vers le haut'----- -->
        <?php
            include_once "./inc/bouton_retour_haut/bouton_retour_haut.php";
        ?>

        <!-- ------------------------------- HAUT -------------------------------- -->
        <!-- SECTION DU HAUT - IMAGE FIXE -->
        <section class="haut">

            <div id="ImgHauteListBook" class="ImgHaute" style="background-image: url(./asset/img/event_flamant.jpg);">
            </div>

            <div class="titreListEvent">
                <h1>vos réservations</h1>
                <h2>sont disponibles</h2>

                <!-- <p>
                Plongez dans un monde d'expériences exclusives et inoubliables où chaque moment est une découverte. Assistez à des concerts privés, privatisez des lieux insolites et d'exception, et vivez des compétitions de haut vol en compagnie de vos athlètes préférés. Transformez-vous en star internationale ou en pilote de Formule 1 le temps d'une journée. Laissez-vous guider par des chefs étoilés qui dévoileront leurs secrets culinaires lors d'ateliers intimes. Savourez des brunchs aux meilleures tables et émerveillez-vous devant des shows culinaires spectaculaires. Offrez-vous des instants uniques où le luxe et l'exclusivité se marient pour créer des souvenirs inoubliables.
            </p> -->

                <!-- catégorie : divertissement, atelier, gastronomie, représentation, loisir -->
            </div>
            <!-- FOOTER FIXE -->
            <?php
                include_once "./inc/footer_fixe/footer_fixe.php";
            ?>
        </section>


        <!-- ------------------------------- BAS -------------------------------- -->
        <!-- SECTION DU BAS - LISTE DES EVENTS -->
        <section id="bas_listBook" class="bas">


            <!-- CONTAINER GLOBAL - liste des events -->
            <div id="container_listBook" class="container_list">

                <!-- ZONE FILTRE -->
                <div class="container_btnFiltre_listEvent">

                    <!-- btn Prochainement - btn historique -->
                    <!-- <div class="btnProchainHistorique">
                        <a href="" id="reinitialiser_resultat" class="prochainement_listEvent">Prochainement</a>
                        <a href="" id="prochain_event" class="historique_listEvent">Historique</a>
                    </div> -->

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


                    <!-- MODULE BOUCLE -->
                    <?php foreach ($evenementsByCategory as $event) {
                        // Comparer la date de l'événement avec la date actuelle, si la date est déjà passé ne l'afficher ici

                        if ($event['date_event'] >= $currentDate) {
                            // Obtenir le nombre total de places réservées pour cet évènement
                            $totalPlacesReservees = Book::calculReservation($event['id_evenement']); ?>

                            <?php if (!empty($_SESSION['id_user'])) {

                                if (in_array($event['id_evenement'], $userReservationIds) && $event['events_actif'] == 1) { ?>

                                    <div class="lb_event">

                                        <!-- image en backgound -->
                                        <div class="lb_imageEvent">
                                            <img src="./asset/img/<?= $event['image']; ?>" alt="">
                                        </div>

                                        <!-- texte -->
                                        <div class="lb_eventContainer">
                                            <div class="lb_numeroEvent"><?= $event['id_evenement']; ?></div>
                                            <div class="lb_text">
                                                <div class="lb_titre"><?= $event['titre']; ?></div>
                                                <div class="lb_categoryDate">
                                                    <div class="lb_category"><?= $event['categorie_name']; ?></div>
                                                    <div class="lb_date"><?= date('d-m-Y', strtotime($event['date_event'])); ?></div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- BOUTONS -->
                                        <div class="lb_reservation">

                                            <!-- Afficher le billet -->
                                            <a href="./billet.php?id_event=<?= $event['id_evenement']; ?>" class="lb_billet">Télécharger le billet</a>
                                            <!-- <a href="#modalBillet" class="lb_billet">Télécharger le billet</a> -->

                                            <!-- Consulter l'historique -->
                                            <a href="./historique.php?id_event=<?= $event['id_evenement']; ?>" class="lb_consulter">Consulter</a>
                                        </div>
                                    </div>

                                <?php } ?>

                            <?php } ?>

                        <?php } ?>


                    <?php } ?>
                </div>

            </div>



        </section>
    </main>


    <footer></footer>

    <!-- Changement attérir sur l'espace client de la nav -->
    <script src="./asset/js/nav_espace_client_reservation.js"></script>

    <!-- Changement d'état au scroll -->
    <script src="./asset/js/nav_scroll3.js"></script>

    <!-- Espace navigation -->
    <script src="./asset/js/espace_navigation.js"></script>


    <script>
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
                    // traitement/traitement_ajax2.php
                    url: "traitement/traitement_ajax8.php", // le fichier cible, celui qui fera le traitement (projet : mettre le chemin que l'on aurait mis dans la balise <a>)
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
    require_once "./inc/securite.php";
}
?>

<!-- -------------- FOOTER -------------- -->
<?php
    include_once "./inc/footer.php";
?>