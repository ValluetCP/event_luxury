<?php
include_once "./inc/header.php";
include_once "./inc/navigation_vert.php";
include_once "./inc/functions.php";
// Inclure le fichier contenant la classe Book
require_once "../models/bookModel.php";
require_once "../models/eventModel.php"; // Ajoutez cette ligne pour inclure la classe Event

// -------------- SECURITE ACCES CLIENT & ADMIN -------------- //
if ((isset($_SESSION['user_role']) && $_SESSION['user_role'] == "admin") ||
    (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "client")
) {

?>

    <div class="containerPagePanier">
        
        <div class="containerPanier">

            <div class="contenuPanier">
                <div class="sousTitrePanier">
                    <p>PANIER (2)</p>
                </div>
    
                <!-- AFFICHAGE LISTE PRODUIT -->
                <div class="listeProduit">

                <?php
                // Récupérer les événements dans le panier
                if (isset($_SESSION['reservation']) && !empty($_SESSION['reservation'])) {
                    // Utiliser un tableau associatif pour éviter les doublons
                    // $panierItems = array();
                    // $totalMontant = 0;

                    $prixTotal = 0;
                    foreach ($_SESSION['reservation'] as $item) {
                        // Récupérer les détails de l'événement en utilisant l'ID de l'événement
                        $eventId = $item["events"]["id_evenement"];
                        // $eventDetails = Event::findEventById($eventId);
                            $prixTotalEvent = $item["events"]['prix'] * $item["quantite"];
                            $prixTotal += $prixTotalEvent;
                            ?>

                                <!-- MODULE BOUCLE -->
                                <div class="produitPanier">
                
                                    <!-- IMAGE -->
                                    <div class="imgProduitPanier">
                                        <img src="./asset/img/event_flamant.jpg" alt="image événement">
                                    </div>
                                    <!-- Titre + Supression article -->
                                    <div class="titreSupprimer">
                                        <div class="titreProduitPanier">
                                            <p><?= $item["events"]['titre']; ?></p>
                                        </div>
                                        <div class="suppressionProduit">
                                        <img src="./asset/img/coix_verte.svg" alt="icone pour supprimer">
                                        </div>
                                    </div>

                                    <!-- Catégorie -->
                                    <p class="categorieProduit"><?= $item["events"]['categorie_name']; ?></p>

                                    <!-- Quantité + Prix -->
                                    <div class="quantitePrixPanier">
                                        <div class="quantitePanier">
                                            <p>Quantité : <?= $item["quantite"]; ?></p>
                                        </div>
                                        <div class="prixPanier">
                                            <p>Prix : <?= $prixTotalEvent; ?>€</p>
                                        </div>
                                    </div>
                                </div>

                        
                            <a href="./evenement2.php?id_event=<?= $item["events"]['id_evenement']; ?>">
                                <div>
                                    <p>Titre de l'événement :<?= $item["events"]['titre']; ?></p>
                                    <p>Catégorie :<?= $item["events"]['categorie_name']; ?></p>
                                    <p>Prix unitaire :<?= $item["events"]['prix']; ?></p>
                                    <p>Quantité :<?= $item["quantite"]; ?></p>
                                    <!-- Ajoutez un lien "supprimer" avec l'identifiant de l'article dans l'URL -->
                                    <p>Prix total :<?= $prixTotalEvent; ?></p><br><br>
                                </div>
                            </a>

                            <form action="./traitement/action.php" method="post">
                    
                                    <input type="hidden" name="id_evenement" value="<?= $item["events"]['id_evenement'];?>">
                                    <input type="submit" name="supprimer" value="supprimer">
                            </form>
                            <?php 
                    } 
                    
                    
                    // Afficher le montant total en bas de la page
                    echo "Montant total : " . $prixTotal. "<br>";
                    ?>
                    <form action="./traitement/action.php">
                        <button name="valider_commande" class="btn btn-outline-warning mt-3 mb-5" value="valide commande">Valider la commande</button>
                    </form>


                    <div class="nav_panier">
                        
                    </div>

                    <!-- Changement d'état au scroll -->
                    <!-- <script src="./asset/js/nav_scroll2.js"></script> -->

                    <!-- Espace navigation -->
                    <script src="./asset/js/espace_navigation2.js"></script>
                <?php } else {
                    echo "panier vide";
                } ?>
    
                    <!-- MODULE BOUCLE -->
                    <div class="produitPanier">
    
                        <!-- IMAGE -->
                        <div class="imgProduitPanier">
                            <img src="./asset/img/event_flamant.jpg" alt="image événement">
                        </div>
                        <!-- Titre + Supression article -->
                        <div class="titreSupprimer">
                            <div class="titreProduitPanier">
                                <p>Salon de l'automobile</p>
                            </div>
                            <div class="suppressionProduit">
                            <img src="./asset/img/coix_verte.svg" alt="icone pour supprimer">
                            </div>
                        </div>
    
                        <!-- Catégorie -->
                        <p class="categorieProduit">Divertissement</p>
    
                        <!-- Quantité + Prix -->
                        <div class="quantitePrixPanier">
                            <div class="quantitePanier">
                                <p>Quantité : 2</p>
                            </div>
                            <div class="prixPanier">
                                <p>Prix : 75€</p>
                            </div>
                        </div>
                    </div>
                    <!-- MODULE BOUCLE -->
                    <div class="produitPanier">
    
                        <!-- IMAGE -->
                        <div class="imgProduitPanier">
                            <img src="./asset/img/event_flamant.jpg" alt="image événement">
                        </div>
                        <!-- Titre + Supression article -->
                        <div class="titreSupprimer">
                            <div class="titreProduitPanier">
                                <p>Salon de l'automobile</p>
                            </div>
                            <div class="suppressionProduit">
                                <img src="./asset/img/coix_verte.svg" alt="icone pour supprimer">
                            </div>
                        </div>
    
                        <!-- Catégorie -->
                        <p class="categorieProduit">Divertissement</p>
    
                        <!-- Quantité + Prix -->
                        <div class="quantitePrixPanier">
                            <div class="quantitePanier">
                                <p>Quantité : 2</p>
                            </div>
                            <div class="prixPanier">
                                <p>Prix : 75€</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="titrePanier">
                <img src="./asset/img/img_logo/" alt="">
            </div>
        </div>

        <!-- NAVIGATION PANIER -->
        <div class="navPanier">
    
            <!-- LIENS -->
            <div class="lienPanier">
                <ul>
                    <li><a href="">listes événements</a></li>
                    <li><a href="">mes réservations</a></li>
                </ul>
            </div>
            <!-- VALIDER LA COMMANDE -->
            <div class="validerPanier">
                <div class="totalPrix">
                    <p>TOTAL <span class="total">115 EUR</span><br><span class="tva">*TVA COMPRISE</span></p>
                </div>
                
                <button type="submit" class="validerBtn" onclick="window.location.href='./st_book.php'">Valider</button>
            </div>
        </div>

    </div>



<!-- -------------- SUITE SECURITE ACCES -------------- -->
<?php } else {
    require_once "./inc/securite.php";
}
?>

<!-- -------------- FOOTER -------------- -->
<?php
    include_once "./inc/footer.php";
?>
