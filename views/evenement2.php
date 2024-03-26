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

    <!-- ---------------------------- MODAL BILLET ----------------------------- -->
    <!-- MODAL PANIER (structure générale)-->
    <div id="modalPanier">
        <div class="modalContentPanier">
            <div class="modalPanierContainer">
                <p class="modalPanierAjout">Produit ajouté au panier</p>
                <!-- DEBUT ITEM -->
                <div class="modalPanierContainerItems">
                    <div class="modalPanierimg">
                        <!-- image en bg -->
                        <img src="./asset/img/<?= $ficheEvent['image']; ?>" alt="">
                    </div>
                    <div class="modalPaniertxt">
                        <h1 class="modalPaniertitre"><?= $ficheEvent['titre']; ?></h1>
                        <h2 class="modalPanierCategorie"><?= $ficheEvent['categorie_name']; ?></h2>
                        <p class="modalPanierQuantite">Quantité :<span> 1</span></p>
                    </div>
                </div>
                <!-- FIN ITEM -->
            </div>
        </div>
        <a class="modalClosePanier" href="#"><img class="img_croix_popup2" src="./asset/img/coix_verte.svg" alt=""></a>
        <div class="modalPanierDegrade">
            <a href="" id="lb_btnPanier" class="btn_billet_panier">Voir panier</a>
        </div>
    </div>


    <!-- MODAL EVENT (Confirmation "Ajouter une réservation")-->
    <div id="modalEvent">
        <div class="modal_content">
            <a class="modal_close" href="#"><img class="img_croix_popup" src="../asset/img/croix_close.svg" alt=""></a>
            <div class="modalTexte">
                <h2 class="modalTitre">Votre événement</h2>
                <hr class="modalTrait">
                <p>Une réservation a déjà été faite. Vous souhaitez :</p>
                <p>Effectuer une <a href=""> annulation</a><br>
                Consulter <a href=""> l'historique</a></p>
            </div>
            <div class="btnEventGroup">
                <a href="#modalPanier" id="e_btnEventReservation"class="modal_btn btn_modal_1_trait">Ajouter une autre réservation</a>
                <a href="" id="e_btnEventQuitter"class="modal_btn btn_modal_2_fond">Fermer</a>
            </div>
        </div>
    </div>
    
    <main class="site siteEvent">
        <!-- ------------------------------- HAUT -------------------------------- -->
        <!-- SECTION GAUCHE - IMAGE FIXE -->
        <section class="gauche gaucheEvent">
            <div class="gaucheImg gaucheImgEvent">
                <img src="./asset/img/<?= $ficheEvent['image']; ?>" alt="">
            </div>
        </section>
        
        <!-- ------------------------------- BAS -------------------------------- -->
        <!-- SECTION DROITE - FICHE PRODUIT -->
        <section class="droite">
            <div class="containerDroit containerDroitEvent">

                <!-- ------ ETAT DE L'EVENT ------ -->
                <!-- Etat de l'événement : réservé, complet, annuler, terminé -->

                <?php if(!empty($_SESSION['id_user']) && $ficheEvent['date_event'] >= $currentDate){ ?>

                    <!-- Réservé & Complet -->
                    <?php if(in_array($ficheEvent['id_evenement'], $userReservationIds) && $ficheEvent['events_actif'] == 1 && ($totalPlacesReservees >= $ficheEvent['nbr_place'])){ ?>
                        <div class="alert alert-success" role="alert">
                            Réservation confirmée. Pour toutes modifications de votre réservation merci de nous <a href="">contacter</a>!
                        </div>
                        <div class="alert alert-warning" role="alert">
                            Événement complet. <a href="">Me contacter si de la place se libère</a>
                        </div>

                    <!-- Réservé -->  
                    <?php } elseif(in_array($ficheEvent['id_evenement'], $userReservationIds) && $ficheEvent['events_actif'] == 1){ ?>
                        
                        <div class="bgEtat">
                            <div class="borderEtat">
                                <p>
                                    <span class="etat">Réservation confirmée - </span><span class="msgEtat">Pour toutes modifications merci de nous </span><a href="" class="etatContacter">contacter</a>
                                </p>
                            </div>
                        </div>

                    <!-- Complet -->
                    <?php } elseif($totalPlacesReservees >= $ficheEvent['nbr_place']) { ?>
                        
                        <div id="bgEtat_complet" class="bgEtat">
                            <div class="borderEtat">
                                <p>
                                    <span class="etat">événement complet - </span><span class="msgEtat">Pour toutes modifications merci de nous </span><a href="" class="etatContacter">contacter</a>
                                </p>
                            </div>
                        </div>

                    <!-- Annulé -->
                    <?php } elseif($ficheEvent['events_actif'] == 0){?>
                        
                        <div id="bgEtat_annule" class="bgEtat">
                            <div class="borderEtat">
                                <p>
                                    <span class="etat">événement annulé - </span><span class="msgEtat">Pour toutes modifications merci de nous </span><a href="" class="etatContacter">contacter</a>
                                </p>
                            </div>
                        </div>
                        
                    <?php } ?>

                <!-- Terminé -->
                <?php }else{ ?>
                    
                    <div id="bgEtat_termine" class="bgEtat">
                        <div class="borderEtat">
                            <p>
                                <span class="etat">événement terminé - </span><span class="msgEtat">Pour toutes modifications merci de nous </span><a href="" class="etatContacter">contacter</a>
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
                    <a href=""><img src="./asset/img/<?= $ficheEvent['image']; ?>" alt="" title="agrandir l'image"></a>
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
                    Place disponible : <span><?= $placesDisponibles; ?></span><br>
                </div>



                <?php if(isset($_SESSION['user_role'])){
            
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
                                                <select name="place_reserve">
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
                                    <?php if(!empty($_SESSION['id_user']) && $ficheEvent['date_event'] >= $currentDate){ ?>

                                        <?php if(in_array($ficheEvent['id_evenement'], $userReservationIds) && $ficheEvent['events_actif'] == 1){ ?>
                                            <!-- BOUTON DE VALIDATION RESERVATION -->
                                            <div class="btn_flex">
                                                <button onclick="window.location.href='#modalEvent'" type="submit" class="btnEvent btnEvent-3">Ajouter une réservation</button>
                                            </div>
                                        
                                        <?php } else { ?>

                                            <!-- BOUTON DE VALIDATION RESERVATION -->
                                            <div class="btn_flex">
                                                <button onclick="window.location.href='#modalPanier'" type="submit" name="add_panier" class="btnEvent btnEvent-3" value="reserver">Réserver</button>
                                            </div>
                                        <?php } ?>

                                    <?php } ?> 
                                <?php } ?>
                            <?php } ?>
                        </form>
                        
                    <!-- }elseif($totalPlacesReservees == null){ -->
                    <?php }
                } ?> 



                <h3>Vous pourriez aimer . . .</h3>
                <div class="trioCategory">
                    <article class="categoryUn">
                        <figure class="fig_1">
                            <a href="">
                                <div class="imgCategory"><img src="./asset/img/event_poisson.jpg" alt=""></div>
                            </a>
                        </figure>
                        <div class="titreCategory">
                            Asseyez-vous à la grande table
                        </div>
                        <div class="sousTitreCategory">
                            DIVERTISSEMENT
                        </div>
                    </article>
                    <article class="categoryDeux">
                        <figure class="fig_1">
                            <a href="">
                                <div class="imgCategory"><img src="./asset/img/event_bocal.jpg" alt=""></div>
                            </a>
                        </figure>
                        <div class="titreCategory">
                            Calamar gourmand
                        </div>
                        <div class="sousTitreCategory">
                            DIVERTISSEMENT
                        </div>
                    </article>
                    <article class="categoryTrois">
                        <figure class="fig_1">
                            <a href="">
                                <div class="imgCategory"><img src="./asset/img/event_salon_automobile.jpg" alt=""></div>
                            </a>
                        </figure>
                        <div class="titreCategory">
                            Salon de l'automobile
                        </div>
                        <div class="sousTitreCategory">
                            DIVERTISSEMENT
                        </div>
                    </article>
                    
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


        $(document).ready(function() {


            $("#add_reservation").on("click", (evtSubmit) => {
                evtSubmit.preventDefault();
                var submitVal = $(this).attr("");
                var url_action = "./traitement/action.php";
                var event_fields = $("#form_event").serialize()+ "&add_panier=reserver";
                
                $.ajax({
                url: url_action,
                data: event_fields,
                type:'post',
                dataType: "json",
                success: (data) => {
                    $("#nombre").html(data);
                    console.log("nb produits dans mon deuxième cart = " + data);
                },
                error: (jqXHR, status, error) => {
                    console.log("ERREUR AJAX", status, error);
                },
                });
            });

        });

    </script>
</body>
</html>