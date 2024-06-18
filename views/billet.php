<?php
// Page - Affiche un évènement (côté CLIENT)
// session_start();
include_once "./inc/header.php";
include_once "./inc/nav_blc/nav_blc_espace_client.php";
include_once "./inc/functions.php";
require_once "../models/eventModel.php";
require_once "../models/bookModel.php";
require_once "../models/userModel.php";
require_once "../models/categorieModel.php";

// -------------- SECURITE ACCES CLIENT & ADMIN -------------- //
if ((isset($_SESSION['user_role']) && $_SESSION['user_role'] == "admin") ||
    (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "client")
) {


    // -------------- CODE -------------- //
    // $listEvent = Event::findAllEvent();
    $userReservation = User::userReservation($_GET['id_event']);
    $eventId = $_GET['id_event'];
    $ficheEvent = Event::findEventById($eventId);
    $bookList = Book::findAllBookByIdUser();
    $totalPlacesReservees = Book::calculReservation($eventId);
    $placesDisponibles = $ficheEvent['nbr_place'] - $totalPlacesReservees;
    $currentDate = date('Y-m-d H:i:s'); // Date actuelle au format SQL (YYYY-MM-DD HH:MM:SS)
?>

    <!-- ------------------- PAGE BILLETERIE - début ------------------- -->
    <main class="siteBillet">

        <!-- SECTION GAUCHE - TELECHARGEMENT -->
        <section class="gaucheBillet">
            <div class="containerGaucheBillet">
                <!-- Fil d'ariane page événement -->
                <p class="retourListe">
                    <a href="./list_book.php">Retour à la liste des réservations</a>
                </p>
                <h1>Billetterie <br><span class="capitalize">événement</span></h1>
                <button type="button" class="telechargementBillet">
                    télécharger le billet
                </button>
            </div>
        </section>

        <!-- SECTION DROITE - IMAGE FIXE -->
        <section class="droitBillet">
            <div class="droitImgBillet" style="background-image: url(./asset/img/<?= $ficheEvent['image']; ?>);">
            </div>

            <!-- MODAL BILLET (modélisation)-->
            <div class="billet">
                <div class="billet_partie_haute">
                    <div class="imgEventBillet">
                        <div class="bgEventBillet" style="background-image: url(./asset/img/<?= $ficheEvent['image']; ?>);"></div>
                    </div>
                    <div class="divDate">
                        <div class="dateBillet"><?= date('d-m-y', strtotime($ficheEvent['date_event'])); ?></div>
                    </div>
                    <h2 class="titreBillet"><?= $ficheEvent['titre']; ?></h2>
                    <p class="categorieBillet"><?= $ficheEvent['categorie_name']; ?></p>
                    <div class="placeBillet">
                        <div class="txtPlaceBillet">
                            <p>Nombre de <br> places réservées</p>
                        </div>
                        <div class="nbPlaceBillet"><?= $totalPlacesReservees; ?></div>
                    </div>
                    <div class="txtBillet">
                        Merci de vous présenter à l'événement 30 minutes avant le commencement et de vous munir de votre billet de réservation.
                    </div>
                </div>
                <div class="billet_partie_basse">
                    <img class="imgCodeBarre" src="./asset/img/code_barre.png" alt="code barre">
                </div>
            </div>
            <!-- <div class="droitImg droitImgBillet" style="background-image: url(./asset/img/event_flamant.jpg);"></div> -->
        </section>

    </main>

    <!-- -------------- BALISE SCRIPT -------------- -->
    <!-- Changement attérir sur l'espace client de la nav -->
    <script src="./asset/js/espace_client/nav_espace_client_reservation.js"></script>

    <!-- Changement d'état au scroll -->
    <script src="./asset/js/nav_scroll2.js"></script>

    <!-- Espace navigation -->
    <script src="./asset/js/espace_navigation.js"></script>

    <!-- -------------- SUITE SECURITE ACCES -------------- -->
<?php } else {
    require_once "./inc/securite.php";
} ?>

<?php
include_once "./inc/footer.php";
?>