<?php
    require_once "../../models/eventModel.php";
    require_once "../../models/bookModel.php";
    require_once "../../models/userModel.php";


    $userReservation = User::userReservation($_GET['event']);
    $eventId = $_GET['event'];
    $ficheEvent = Event::findEventById($eventId);
    $bookList = Book::findAllBookByIdUser();
    $totalPlacesReservees = Book::calculReservation($eventId);
    $placesDisponibles = $ficheEvent['nbr_place'] - $totalPlacesReservees;
    $currentDate = date('Y-m-d H:i:s'); // Date actuelle au format SQL (YYYY-MM-DD HH:MM:SS)

    $tab = [];
    $tab['contenu'] = '';
    $tab['contenu'] .= 
    '
    <div id="modalBillet">
    <div class="modalContentBillet">
        <div class="modalBilletBg" style="background-image: url(./asset/img/event_miami.jpg);"></div>
    </div>
    <a class="modalCloseBillet" href="#"><img class="img_croix_popup2" src="./asset/img/croix_close.svg" alt=""></a>
    <a href="" id="lb_btnBillet" class="btn_billet_panier">Télécharger le billet</a>

    <!-- MODAL BILLET (modélisation)-->

    // HAUT MODAL
    <div class="billet">
        <div class="billet_partie_haute">
            <div class="imgEventBillet">
                <div class="bgEventBillet" style="background-image: url(./asset/img/'.$ficheEvent['image'].');"></div>
            </div>
            <div class="divDate">
                <div class="dateBillet">'. date('d-m-Y', strtotime($ficheEvent['date_event'])).'</div>
            </div>
            <h2 class="titreBillet">'.$ficheEvent['titre'].'</h2>
            <p class="categorieBillet">'. $ficheEvent['categorie_name'].'</p>
            <div class="placeBillet">
                <div class="txtPlaceBillet"><p>Nombre de <br> places réservées</p></div>
                <div class="nbPlaceBillet">'.$totalPlacesReservees.'</div>
            </div>
            <div class="txtBillet">
                Merci de vous présenter à l\'événement 30 minutes avant le commencement et de vous munir de votre billet de réservation.
            </div>
        </div>

        // BAS MODAL
        <div class="billet_partie_basse">
            <img class="imgCodeBarre" src="./asset/img/code_barre.png" alt="">
        </div>

</div>
</div>';


    
    echo json_encode($tab);
?>