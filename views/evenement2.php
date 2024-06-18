<?php
// Page - Affiche un évènement (côté CLIENT)

include_once "./inc/header.php";

// -------------- SECURITE ACCES CLIENT & ADMIN -------------- //
if ((isset($_SESSION['user_role']) && $_SESSION['user_role'] == "admin") ||
    (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "client")
) {

    // include_once "./inc/nav_bicolor/nav_bicolor_espace_client.php";
    include_once "./inc/nav_bicolor_espace_client.php";
    include_once "./inc/functions.php";
    require_once "../models/eventModel.php";
    require_once "../models/bookModel.php";
    require_once "../models/userModel.php";



    // -------------- CODE -------------- //

    // $listEvent = Event::findAllEvent();
    $userReservation = User::userReservation($_SESSION['id_user']);
    $eventId = $_GET['id_event'];
    $ficheEvent = Event::findEventById($eventId);
    $totalPlacesReservees = Book::calculReservation($eventId);
    $placesDisponibles = $ficheEvent['nbr_place'] - $totalPlacesReservees;
    $currentDate = date('Y-m-d H:i:s'); // Date actuelle au format SQL (YYYY-MM-DD HH:MM:SS)

    // Ajoutez cette ligne pour récupérer l'historique des réservations de l'utilisateur pour cet événement
    // $userPreviousReservations = Book::getUserPreviousReservations($_SESSION['id_user'], $eventId);
    $userPreviousReservations = Book::getUserReservationsForEvent($_SESSION['id_user'], $eventId);
    $userReservationIds = Book::userReservationIds($_SESSION['id_user']);  // Utilisez la nouvelle méthode

    // $placeList = Book::calculReservation($eventId);
    // var_dump($placeList);
    // ["SUM(place_reserve)"]=> NULL
    // var_dump($userReservation);
?>

    <!-- ---------------------------- MODAL PANIER ----------------------------- -->
    <!-- MODAL PANIER (structure générale)-->
    <div id="modalPanier">
        <div class="modalContentPanier">
            <div class="modalPanierContainer">
                <p class="modalPanierAjout">Produit ajouté au panier</p>
                <!-- DEBUT ITEM -->
                <div class="modalPanierContainerItems">
                    <div class="modalPanierimg">
                        <!-- image en bg -->
                        <img src="./asset/img/<?= $ficheEvent['image']; ?>" alt="image <?= $ficheEvent['titre']; ?>">
                    </div>
                    <div class="modalPaniertxt">
                        <h1 class="modalPaniertitre"><?= $ficheEvent['titre']; ?></h1>
                        <h2 class="modalPanierCategorie"><?= $ficheEvent['categorie_name']; ?></h2>
                        <p class="modalPanierQuantite">Quantité : <span class="quantite_panier"> <?= $_SESSION["nombre"] ?? ''; ?></span></p>
                    </div>
                </div>
                <!-- FIN ITEM -->
            </div>
        </div>
        <a class="modalClosePanier" href="#"><img class="img_croix_popup2" src="./asset/img/coix_verte.svg" alt="fermer"></a>
        <div class="modalPanierDegrade">
            <a href="http://localhost/event_luxury/views/panier_css.php" id="lb_btnPanier" class="btn_billet_panier">Voir panier</a>
        </div>
    </div>


    <!-- MODAL EVENT (Confirmation "Ajouter une réservation")-->
    <div id="modalEvent">
        <div class="modal_content">
            <a class="modal_close" href="#"><img class="img_croix_popup" src="../asset/img/croix_close.svg" alt="fermer"></a>
            <div class="modalTexte">
                <h2 class="modalTitre">Votre événement</h2>
                <hr class="modalTrait">
                <p>Une réservation a déjà été faite. Vous souhaitez :</p>
                <p>Effectuer une <a href="./historique.php?id_event=<?= $ficheEvent['id_evenement']; ?>"> annulation</a><br>
                    Consulter <a href="./historique.php?id_event=<?= $ficheEvent['id_evenement']; ?>"> l'historique</a></p>
            </div>
            <div class="btnEventGroup">
                <button onclick="window.location.href='#modalPanier'" type="submit" name="add_panier" class="modal_btn btn_modal_1_trait" id="add_reservation">Ajouter une autre réservation</button>

                <a href="" id="e_btnEventQuitter" class="modal_btn btn_modal_2_fond">Fermer</a>
            </div>
        </div>
    </div>

    <!-- ------------------ Page - évènement (côté CLIENT) ------------------- -->

    <main class="site siteEvent">

        <!-- --------------------------- HAUT ---------------------------- -->
        <!-- SECTION GAUCHE - IMAGE FIXE -->
        <section class="gauche gaucheEvent">
            <div class="gaucheImg gaucheImgEvent">
                <img src="./asset/img/<?= $ficheEvent['image']; ?>" alt="image <?= $ficheEvent['titre']; ?>">
            </div>
        </section>

        <!-- ----------------------------- BAS ------------------------------ -->
        <!-- SECTION DROITE - FICHE PRODUIT -->
        <section class="droite">

            <div class="navBlanche"></div>

            <div class="containerDroit containerDroitEvent">

                <!-- Fil d'ariane page événement -->
                <p class="retourListe">
                    <a href="./event_list.php">Retour à la liste des événements</a>
                </p>

                <!-- ------ ETAT DE L'EVENT ------ -->
                <!-- Etat de l'événement : réservé, complet, annuler, terminé -->

                <?php if (!empty($_SESSION['id_user']) && $ficheEvent['date_event'] >= $currentDate) { ?>

                    <!-- Réservé & Complet -->
                    <?php if (in_array($ficheEvent['id_evenement'], $userReservationIds) && $ficheEvent['events_actif'] == 1 && ($totalPlacesReservees >= $ficheEvent['nbr_place'])) { ?>
                        <div class="alert alert-success" role="alert">
                            Réservation confirmée. Pour toutes modifications de votre réservation merci de nous <a href="">contacter</a>!
                        </div>
                        <div class="alert alert-warning" role="alert">
                            Événement complet. <a href="">Me contacter si de la place se libère</a>
                        </div>

                        <!-- Réservé -->
                    <?php } elseif (in_array($ficheEvent['id_evenement'], $userReservationIds) && $ficheEvent['events_actif'] == 1) { ?>

                        <div class="bgEtat">
                            <div class="borderEtat">
                                <p>
                                    <span class="etat">Réservation confirmée - </span><span class="msgEtat">Pour toutes modifications merci de nous </span><a href="" class="etatContacter">contacter</a>
                                </p>
                            </div>
                        </div>

                        <!-- Complet -->
                    <?php } elseif ($totalPlacesReservees >= $ficheEvent['nbr_place']) { ?>

                        <div id="bgEtat_complet" class="bgEtat">
                            <div class="borderEtat">
                                <p>
                                    <span class="etat">Événement complet - </span><span class="msgEtat">S'il y a de nouveau des places disponibles - </span><a href="" class="etatContacter">me contacter</a>
                                </p>
                            </div>
                        </div>

                        <!-- Annulé -->
                    <?php } elseif ($ficheEvent['events_actif'] == 0) { ?>

                        <div id="bgEtat_annule" class="bgEtat">
                            <div class="borderEtat">
                                <p>
                                    <span class="etat">Événement annulé - </span><span class="msgEtat">S'il est de nouveau disponible </span><a href="" class="etatContacter"> - me contacter</a>
                                </p>
                            </div>
                        </div>

                    <?php } ?>

                    <!-- Terminé -->
                <?php } else { ?>

                    <div id="bgEtat_termine" class="bgEtat">
                        <div class="borderEtat">
                            <p>
                                <span class="etat">Événement terminé - </span><span class="msgEtat">S'il à lieu de nouveau - </span><a href="" class="etatContacter">me contacter</a>
                            </p>
                        </div>
                    </div>

                <?php } ?>


                <!-- ------------------------------- CONTENU -------------------------------- -->

                <h1><?= $ficheEvent['titre']; ?></h1>
                <h2 id="event_ss_titre"><?= $ficheEvent['categorie_name']; ?></h2>
                <div class="imgEvent">
                    <a href=""><img src="./asset/img/<?= $ficheEvent['image']; ?>" alt="agrandir l'image" title="agrandir l'image"></a>
                </div>
                <h4>Date</h4>
                <p class="dateEvent"><?= date('d-m-Y', strtotime($ficheEvent['date_event'])); ?></p>
                <h4>Résumé</h4>
                <p><?= $ficheEvent['resume']; ?></p>

                <!-- INFO - DETAIL NBR DE PLACE -->
                <!-- <p class="statePlace">
                    Nombre de place disponible : <span>23</span><br>
                    Nombre de place totale : 40 <br>
                    Nombre de place réservée : 15 <br>
                </p> -->
                <div class="placeDisponible">
                    Place disponible : <span><?= $placesDisponibles; ?></span>
                </div>



                <?php if (isset($_SESSION['user_role'])) {

                    if ($placesDisponibles !== 0) { ?>

                        <!-- FORMULAIRE RESERVATION -->
                        <form id="form_event">
                            <input type="hidden" name="id_event" value="<?= $ficheEvent['id_evenement']; ?>">

                            <!-- Si l'event n'est pas passé -->
                            <?php if ($ficheEvent['date_event'] >= $currentDate) { ?>


                                <!-- et n'est pas annulé -->
                                <?php if ($ficheEvent['events_actif'] == 1) { ?>

                                    <!-- CHOIX - NBR DE PLACE -->
                                    <div class="place_prix">
                                        <!-- bouton SELECT -->
                                        <div class="placeSelect">
                                            <div class='ui-dropdown'>
                                                <select id="place_reserve" name="place_reserve">
                                                    <?php $maxPlaces = min($placesDisponibles, 4);
                                                    for ($i = 1; $i <= $maxPlaces; $i++) { ?>
                                                        <option value="<?= $i; ?>"><?= $i; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="place">
                                                <p>Nombre de place</p>
                                            </div>
                                        </div>
                                        <!-- PRIX -->
                                        <div class="prix">
                                            <p>Prix : <?= $ficheEvent['prix']; ?>€ / <span>unité</span></p>
                                        </div>
                                    </div>


                                    <!-- BOUTON -->
                                    <?php if (!empty($_SESSION['id_user']) && $ficheEvent['date_event'] >= $currentDate) { ?>

                                        <?php if (in_array($ficheEvent['id_evenement'], $userReservationIds) && $ficheEvent['events_actif'] == 1) { ?>
                                            <!-- BOUTON DE VALIDATION RESERVATION -->
                                            <div class="btn_flex">
                                                <button onclick="window.location.href='#modalEvent'" type="submit" class="btnEvent btnEvent-3">Ajouter une réservation</button>
                                            </div>

                                        <?php } else { ?>

                                            <!-- BOUTON DE VALIDATION RESERVATION -->
                                            <div class="btn_flex">
                                                <button onclick="window.location.href='#modalPanier'" type="submit" name="add_panier" class="btnEvent btnEvent-3" value="reserver" id="add_reservation">Réserver</button>
                                            </div>
                                        <?php } ?>

                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                        </form>

                        <!-- }elseif($totalPlacesReservees == null){ -->
                <?php }
                } ?>

                <!-- -------------------------- CATEGORIE  -------------------------- -->
                <?php

                // Ajoutez ces lignes pour récupérer la catégorie de l'événement en cours
                $eventCategory = $ficheEvent['categorie_id'];

                // Ajoutez ces lignes pour trouver tous les événements associés à la catégorie
                $associatedEvents = Event::findEventsByCategory($eventCategory);

                ?>

                <!-- CATEGORIE - PROPOSITIONS -->
                <h3>Vous pourriez aimer . . .</h3>
                <div class="trioCategory">

                    <!-- BOUCLE -->
                    <?php foreach ($associatedEvents as $event) { ?>
                        <?php if ($event['id_evenement'] != $eventId) { ?>

                            <!-- MODULE BOUCLE -->
                            <article class="categoryUn">
                                <figure class="fig_1">
                                    <a href="./evenement2.php?id_event=<?= $event['id_evenement']; ?>">
                                        <div class="imgCategory"><img src="../asset/img/<?= $event['image']; ?>" alt="événement <?= $event['titre']; ?> "></div>
                                    </a>
                                </figure>
                                <div class="titreCategory">
                                    <?= $event['titre']; ?>
                                </div>
                                <div class="sousTitreCategory">
                                    <?= $ficheEvent['categorie_name']; ?>
                                </div>
                            </article>

                        <?php } ?>
                    <?php } ?>

                </div>
            </div>

        </section>
    </main>
    <footer></footer>

    <!-- Changement attérir sur l'espace client de la nav -->
    <script src="./asset/js/espace_client/nav_espace_client_event.js"></script>

    <!-- Changement d'état au scroll -->
    <script src="./asset/js/nav_scroll2.js"></script>

    <!-- Espace navigation -->
    <script src="./asset/js/espace_navigation.js"></script>

    <script>
        $(document).ready(function() {

            $("button[id='add_reservation']").on("click", (evtSubmit) => {
                // Annule le comportement par défaut de l'événement clique
                evtSubmit.preventDefault();
                var url_action = "./traitement/action.php";
                // récupère les données du formulaire avec l'ID form_event sous forme de chaîne de requête
                var event_fields = $("#form_event").serialize() + "&add_panier=reserver";

                // Récupère la valeur sélectionnée dans le dropdown
                var selectedQuantity = $("#place_reserve").val();

                // Met à jour le texte du modal avec la valeur sélectionnée
                $(".quantite_panier").text(selectedQuantity);

                $.ajax({
                    url: url_action,
                    data: event_fields,
                    type: 'post',
                    dataType: "json", //Le type de donnée attendu
                    success: (data) => {
                        console.log("nb produits dans mon deuxième cart = " + data);
                    },
                    error: (jqXHR, status, error) => {
                        console.log("ERREUR AJAX", status, error);
                    },
                });
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