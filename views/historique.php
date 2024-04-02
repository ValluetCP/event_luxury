<?php
// Page - Affiche un évènement (côté CLIENT)
// session_start();
include_once "./inc/header.php";
include_once "./inc/navigation.php";
include_once "./inc/functions.php";
require_once "../models/eventModel.php";
require_once "../models/bookModel.php";
require_once "../models/userModel.php";


// $listEvent = Event::findAllEvent();
$userReservation = User::userReservation($_GET['id_event']);
$eventId = $_GET['id_event'];
$ficheEvent = Event::findEventById($eventId);
$bookList = Book::findAllBookByIdUser();
$totalPlacesReservees = Book::calculReservation($eventId);
$placesDisponibles = $ficheEvent['nbr_place'] - $totalPlacesReservees;
$currentDate = date('Y-m-d H:i:s'); // Date actuelle au format SQL (YYYY-MM-DD HH:MM:SS)
// Book::cancelBook($userId, $eventId);

// $placeList = Book::calculReservation($eventId);
// var_dump($placeList);
// ["SUM(place_reserve)"]=> NULL
// var_dump($userReservation);
?>

    <main class="site">
        <!-- SECTION GAUCHE - IMAGE FIXE -->
        <section class="gauche">
            <div class="gaucheImg" style="background-image: url(./asset/img/<?= $ficheEvent['image']; ?>);"></div>
        </section>

        <!-- SECTION DROITE - FICHE PRODUIT -->
        <section class="droite droiteHistorique">
            <div id="b_containerDroit" class="containerDroit">
                <div class="b_container container_historique">

                    <h1><?= ucfirst($ficheEvent['titre']); ?></h1>
                    <h2><?= $ficheEvent['categorie_name']; ?></h2>
                    <!-- <h5 class="b_historique">
                        Historique
                    </h5> -->
                    <table class="b_tableau">
                        <tr class="b_tableau_titre">
                            <th>Date & heure de réservation</th>
                            <th>Nombre de place</th>
                            <th>Action</th>
                        </tr>


                        <?php 
                        $userPreviousReservations = Book::getUserPreviousReservations($_SESSION['id_user'], $ficheEvent['id_evenement']);
                        foreach($userPreviousReservations as $reservation){ 
                            // Comparer la date de l'événement avec la date actuelle
                            if ($userPreviousReservations) { ?>
                                <?php if($reservation['reservation_actif'] == 1){ ?>

                                    <tr class="b_tableau_contenu">
                                        
                                        <!-- date & heure de réservation -->
                                        <td>
                                            <?= date('d-m-Y H:i:s', strtotime($reservation['date_reservation'])); ?>
                                        </td>

                                        <!-- nombre de place réservées -->
                                        <td>
                                            <?= $reservation['place_reserve']; ?>
                                        </td>

                                        <!-- Annuler la réservation de l'évènement -->
                                        <td class="b_annuler">
                                            <a class="lien" href="traitement/action.php?id_book_desactive=<?= $reservation['id_reservation']; ?>">Annuler</a>
                                        </td>
                                    </tr>

                                <?php } else if($reservation['reservation_actif'] == 0){ ?>
                                    <tr class="event-passe b_tableau_contenu">

                                        <!-- date & heure de réservation -->
                                        <td class="date-event">
                                            <?= date('d-m-Y H:i:s', strtotime($reservation['date_reservation'])); ?>
                                        </td>
                                        
                                        <!-- nombre de place réservées -->
                                        <td>
                                            
                                        </td>
                                        
                                        <!-- Réservation déjà annulé -->
                                        <td class="event-passe">annulé</td>
                                    </tr>
                                <?php } ?>
                            <?php }
                        } ?>
                    </table>
    
                    <!-- MENU ACCORDEON -->
                    <div class="contenuEvent">
    
                        <dl id="accordeon">
                            <dt id="b_resume">Descriptif</dt>
                            <dd>
                                <p><?= $ficheEvent['resume']; ?></p>
                            </dd>
                            
                            <dt>Détail place</dt>
                            <dd>
                                <p class="statePlace">
                                    Nombre de place disponible : <span><?= $placesDisponibles; ?></span><br>
                                    Nombre de place totale : <?= $ficheEvent['nbr_place']; ?> <br>
                                    Nombre de place réservée : <?= $totalPlacesReservees; ?> <br>
                                </p>
                            </dd>
                            
                            <dt id="b_tarif">Tarif</dt>
                            <dd>
                                <p>Prix : <?= $ficheEvent['prix']; ?>€</p>
                            </dd>
                        </dl>
                    </div>
                    <div class="b_facture">
                        <a href="http://localhost/event_luxury/views/list_book.php" class="b_btn_facture">Retour à la liste des réservations</a>
                    </div>
    
                    <p class="b_defaut">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore 
                    </p>
                </div>
            </div>

        </section>
    </main>
    <footer></footer>
    <script src="./asset/js/nav_scroll2.js"></script>
    <script>
        function showList(listClassName){
            var allLists = document.querySelectorAll('.nav2_container div:not(.nav2_menu,.deconnexion,.profil_nav,.img_profil_nav)');
            allLists.forEach(function(list) {
                list.classList.add('hidden');
            });
    
            // Afficher la liste correspondante
            var selectedList = document.querySelector('.' + listClassName);
            selectedList.classList.remove('hidden');
        }
    </script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="./asset/js/site.js"></script>
</body>
</html>