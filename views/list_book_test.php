<?php
include_once "./inc/header.php";
include_once "./inc/navigation.php";
include_once "./inc/functions.php";
require_once "../models/eventModel.php";
require_once "../models/bookModel.php";
require_once "../models/userModel.php";
require_once "../models/categorieModel.php";

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



<!-- ------------------------------- MODAL BILLET -------------------------------- -->


    <!-- MODAL BILLET (structure générale)-->
    <div id="modalBillet">
        <div class="modalContentBillet">
            <div class="modalBilletBg" style="background-image: url(./asset/img/<?= $event['image'];?>);"></div>
        </div>
        <a class="modalCloseBillet" href="#"><img class="img_croix_popup2" src="./asset/img/croix_close.svg" alt=""></a>
        <a href="" id="lb_btnBillet" class="btn_billet_panier">Télécharger le billet</a>

        <!-- MODAL BILLET (modélisation)-->
        <div class="billet">
            <!-- <img src="./img/test_billet.png" alt=""> -->
            <div class="billet_partie_haute">
            <div class="imgEventBillet">
                <div class="bgEventBillet" style="background-image: url(./asset/img/<?= $event['image'];?>);"></div>
                <!-- <img src="./img/coco2.JPG" alt=""> -->
            </div>
            <div class="divDate">
                <div class="dateBillet"><?= date('d-m-y', strtotime($event['date_event'])); ?></div>
            </div>
            <h2 class="titreBillet"><?= $event['titre'];?></h2>
            <p class="categorieBillet"><?= $event['categorie_name'];?></p>
            <div class="placeBillet">
                <div class="txtPlaceBillet"><p>Nombre de <br> places réservées</p></div>
                <div class="nbPlaceBillet">01</div>
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
    </section>


    <!-- ------------------------------- BAS -------------------------------- -->
    <!-- SECTION DU BAS - LISTE DES EVENTS -->
    <section class="bas">
        
        
        <!-- CONTAINER GLOBAL - liste des events -->
        <div id="container_listBook" class="container_list">

            <!-- ZONE FILTRE -->
            <div class="container_btnFiltre_listEvent">

                <!-- btn Prochainement - btn historique -->
                <div class="btnProchainHistorique">
                    <a href="" id="reinitialiser_resultat" class="prochainement_listEvent">Prochainement</a>
                    <a href="" id="prochain_event" class="historique_listEvent">Historique</a>
                </div>
                
                <!-- <div class="filtreCategory">
                    <button type="submit" class="lb_filtre">Filtrer</button>
                    <div class="lb_selectFiltre">
                        <select name="lb_categoryFiltre" id="lb_categoryFiltre">
                            <option value="1">Toutes les catégories</option>
                            <option value="2">Divertissement</option>
                            <option value="3">Atelier</option>
                        </select>
                    </div>
                </div> -->
                
                <!-- FILTRE -->
                <!-- Ajoutez le formulaire de filtre ici -->
                <form method="get" action="" class="filtreCategory">
                    <button type="submit" class="lb_filtre">Filtrer</button>
                    <div class="lb_selectFiltre">
                        <select name="categorie" id="categorie">
                            <option value="">Toutes les catégories</option>
                            <?php foreach($categories as $key => $categorie){ ?>
                                <option value="<?= $key; ?>"><?= $categorie ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </form>
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
                } else{
                    $evenementsByCategory = $listEvent;
                }
            ?>


            <!-- Div vide pour afficher le contenu -->
            <div id="resultat" class="overflow_listEvent">
                
                <!-- MODULE 1 -->
                <!-- MODULE pour la boucle -->
                <div class="lb_event">

                    <!-- image en backgound -->
                    <div class="lb_imageEvent">
                        <img src="./asset/img/event_miami.jpg" alt="">
                    </div>

                    <!-- texte -->
                    <div class="lb_eventContainer">
                        <div class="lb_numeroEvent">01</div>
                        <div class="lb_text">
                        <div class="lb_titre">The french miami</div>
                            <div class="lb_categoryDate">
                                <div class="lb_category">Atelier</div>
                                <div class="lb_date">29-05-2024</div>
                            </div>
                        </div>
                    </div>
                    <div class="lb_reservation">
                        <a href="#modalBillet" class="lb_billet">Télécharger le billet</a>
                        <a href="" class="lb_consulter">Consulter</a>
                    </div>
                </div>

                <!-- MODULE BOUCLE -->
                <div class="lb_event">

                    <!-- image en backgound -->
                    <div class="lb_imageEvent">
                        <img src="./asset/img/event_flamant.jpg" alt="">
                    </div>

                    <!-- texte -->
                    <div class="lb_eventContainer">
                        <div class="lb_numeroEvent">03</div>
                        <div class="lb_text">
                        <div class="lb_titre">Pink Flamingo</div>
                        <div class="lb_categoryDate">
                            <div class="lb_category">Atelier</div>
                            <div class="lb_date">29-05-2024</div>
                        </div>
                        </div>
                    </div>
                    <div class="lb_reservation">
                        <a href="#modalInfoPerso" class="lb_billet">Télécharger le billet</a>
                        <a href="" class="lb_consulter">Consulter</a>
                    </div>
                </div>


                <?php foreach($evenementsByCategory as $event){
                // Comparer la date de l'événement avec la date actuelle, si la date est déjà passé ne l'afficher ici

                    if ($event['date_event'] >= $currentDate) { 
                    // Obtenir le nombre total de places réservées pour cet évènement
                    $totalPlacesReservees = Book::calculReservation($event['id_evenement']); ?>
                
                        <?php if(!empty($_SESSION['id_user'])){

                            if(in_array($event['id_evenement'], $userReservationIds) && $event['events_actif'] == 1){ ?>

                                <div class="lb_event">

                                    <!-- image en backgound -->
                                    <div class="lb_imageEvent">
                                        <img src="./asset/img/<?= $event['image'];?>" alt="">
                                    </div>

                                    <!-- texte -->
                                    <div class="lb_eventContainer">
                                        <div class="lb_numeroEvent"><?= $event['id_evenement']; ?></div>
                                        <div class="lb_text">
                                            <div class="lb_titre"><a href=""><?= $event['titre'];?></a></div>
                                            <div class="lb_categoryDate">
                                                <div class="lb_category"><?= $event['categorie_name'];?></div>
                                                <div class="lb_date"><?= date('d-m-Y', strtotime($event['date_event'])); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lb_reservation">

                                        <a onclick="window.location.href='#modalBillet?event=<?= $event['id_evenement']; ?>'" href="#modalBillet" class="lb_billet">Télécharger le billet</a>

                                        <a href="./book.php?event=<?= $event['id_evenement']; ?>" class="lb_consulter">Consulter</a>
                                    </div>
                                </div>

                            <?php } ?>

                        <?php } ?>
                
                    <?php }
                } ?>
     
            </div>

        </div>



    </section>
</main>


<footer></footer>

    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> -->

    <script src="./asset/js/nav_scroll2.js"></script>

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

        $(document).ready(function() {

            $('#prochain_event').on('click', function(event) {
                event.preventDefault()

                $.ajax({
                    url: "traitement/traitement_ajax2.php", 
                    type: "POST",
                    dataType: 'json', 
                    success: function(response) {
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




            $('.billet').on('click', function(event) {
                console.log()

                $.ajax({
                    url: "traitement/traitement_ajax6.php", 
                    type: "POST",
                    dataType: 'json', 
                    success: function(response) {
                        console.log(response);
                        $('#resultat').html(response.contenu);
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        console.log(xhr.status);
                        console.log(thrownError);
                    }
                });
            });

        });
    </script>
</body>
</html>