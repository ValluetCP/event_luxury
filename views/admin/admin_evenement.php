<?php
include_once "../inc/header.php";

// -------------- SECURITE ACCES ADMIN -------------- //
if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "admin") {

// include_once "../inc/navigation.php";
include_once "../inc/nav_bicolor_espace_admin.php";
include_once "../inc/functions.php";
require_once "../../models/eventModel.php";
require_once "../../models/bookModel.php";
require_once "../../models/userModel.php";


    // ---------------------------- CODE PAGE EVENT ----------------------------- //
    // $listEvent = Event::findAllEvent();
    $userReservation = User::userReservation($_GET['event']);
    $eventId = $_GET['event'];
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

    <!-- ---------------------------- PAGE EVENT - ADMIN ----------------------------- -->

    <main class="site siteEvent">
        <!-- ------------------------------- HAUT -------------------------------- -->
        <!-- SECTION GAUCHE - IMAGE FIXE -->
        <section class="gauche gaucheEvent">
            <div class="gaucheImg gaucheImgEvent">
                <img src="../asset/img/<?= $ficheEvent['image']; ?>" alt="">
            </div>
        </section>

        <!-- ------------------------------- BAS -------------------------------- -->
        <!-- SECTION DROITE - FICHE PRODUIT -->
        <section class="droite">

            <div class="navBlanche"></div>

            <div class="containerDroit containerDroitEvent">


                <!-- -------------------- ETAT DE L'EVENT ------ ---------------->
                <!-- Etat de l'événement : réservé, complet, annuler, terminé -->

                <?php if (!empty($_SESSION['id_user']) && $ficheEvent['date_event'] >= $currentDate) { ?>

                    <!-- Complet -->
                    <?php if ($totalPlacesReservees >= $ficheEvent['nbr_place']) { ?>

                        <div id="bgEtat_complet" class="bgEtat">
                            <div class="borderEtat">
                                <p>
                                    <span class="etat">Événement complet - </span><span class="msgEtat">Changer le nombre de places - </span><a href="" class="etatContacter">Modifier</a>

                                </p>
                            </div>
                        </div>

                        <!-- Annulé -->
                    <?php } elseif ($ficheEvent['events_actif'] == 0) { ?>

                        <div class="bgEtat">
                            <div class="borderEtat">
                                <p>
                                    <span class="etat">ANNULÉ - </span><span class="msgEtat">Changer son état en l'activant- </span><a href="" class="etatContacter">Modifier</a>
                                </p>
                            </div>
                        </div>

                    <?php } ?>

                    <!-- Terminé -->
                <?php } else { ?>

                    <div id="bgEtat_termine" class="bgEtat">
                        <div class="borderEtat">
                            <p>
                                <span class="etat">Événement terminé - </span><span class="msgEtat">Pour de nouveau l'activer, changer la date - </span><a href="./admin_add_evenement.php?id_event_update=<?= $ficheEvent['id_evenement']; ?>" class="etatContacter">Modifier</a>
                            </p>
                        </div>
                    </div>

                <?php } ?>



                <!-- Etat complet -->
                <!-- <div id="bgEtat_complet" class="bgEtat">
                    <div class="borderEtat">
                        <p>
                            <span class="etat">événement complet - </span><span class="msgEtat">Pour toutes modifications merci de nous </span><a href="" class="etatContacter">contacter</a>
                        </p>
                    </div>
                </div> -->
                <!-- Etat annulé -->
                <!-- <div id="bgEtat_annule" class="bgEtat">
                    <div class="borderEtat">
                        <p>
                            <span class="etat">événement complet - </span><span class="msgEtat">Pour toutes modifications merci de nous </span><a href="" class="etatContacter">contacter</a>
                        </p>
                    </div>
                </div> -->
                <!-- Etat terminé -->
                <!-- <div id="bgEtat_termine" class="bgEtat">
                    <div class="borderEtat">
                        <p>
                            <span class="etat">événement complet - </span><span class="msgEtat">Pour toutes modifications merci de nous </span><a href="" class="etatContacter">contacter</a>
                        </p>
                    </div>
                </div> -->
                <h1><?= $ficheEvent['titre']; ?></h1>
                <h2><?= $ficheEvent['categorie_name']; ?></h2>
                <div class="imgEvent">
                    <a href=""><img src="../asset/img/<?= $ficheEvent['image']; ?>" alt="" title="agrandir l'image"></a>
                </div>
                <h4>Date</h4>
                <p class="dateEvent"><?= date('d-m-Y', strtotime($ficheEvent['date_event'])); ?></p>
                <h4>Résumé</h4>
                <p><?= $ficheEvent['resume']; ?></p>

                <!-- INFO - DETAIL NBR DE PLACE -->
                <p class="statePlace">
                    Nombre de place totale : <?= $ficheEvent['nbr_place']; ?> <br>
                    Nombre de place réservée : <?= $totalPlacesReservees; ?> <br>
                </p>

                <!-- CHOIX - NBR DE PLACE -->
                <div class="place_prix">

                    <div class="placeDisponible">
                        Place disponible : <span><?= $placesDisponibles; ?></span>
                    </div>
                    <!-- PRIX -->
                    <div class="prix">
                        <p>Prix : <?= $ficheEvent['prix']; ?>€ / <span>unité</span></p>
                    </div>
                </div>


                <!-- BOUTON DE VALIDATION RESERVATION -->
                <div class="btn_flex">
                    <!-- <button type="button" class="reserve  btnEvent btnEvent-3">Réserver</button> -->
                    <button onclick="window.location.href='./admin_list_event.php'" type="button" class="btnEvent btnEvent-3">Retour à la liste des évènements</button>
                </div>



                <!-- -------------------------- CATEGORIE  -------------------------- -->
                <?php

                // Ajoutez ces lignes pour récupérer la catégorie de l'événement en cours
                $eventCategory = $ficheEvent['categorie_id'];

                // Ajoutez ces lignes pour trouver tous les événements associés à la catégorie
                $associatedEvents = Event::findEventsByCategory($eventCategory);

                ?>



                <!-- CATEGORIE - PROPOSITIONS -->
                <h3>Dans la même catégorie . . .</h3>
                <div class="trioCategory">

                    <!-- BOUCLE -->
                    <?php foreach ($associatedEvents as $event) { ?>
                        <?php if ($event['id_evenement'] != $eventId) { ?>

                            <!-- MODULE BOUCLE -->
                            <article class="categoryUn">
                                <figure class="fig_1">
                                    <a href="./admin_evenement.php?event=<?= $event['id_evenement']; ?>">
                                        <div class="imgCategory"><img src="../asset/img/<?= $event['image']; ?>" alt=""></div>
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
    <!-- -------------- BALISE SCRIPT -------------- -->
    <!-- Changement attérir sur l'espace client de la nav -->
    <script src="../asset/js/espace_admin/nav_espace_admin_event.js"></script>
    <!-- Espace navigation -->
    <script src="../asset/js/espace_navigation.js"></script>
    <!-- Changement d'état au scroll -->
    <script src="../asset/js/nav_scroll2.js"></script>


    <!-- -------------- SUITE SECURITE ACCES -------------- -->
<?php } else {
    require_once "../inc/securite.php";
} ?>
</body>

</html>