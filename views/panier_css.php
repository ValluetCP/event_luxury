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
                    <p>PANIER (<span class="quantite_panier"><?= $_SESSION["nombre"] ?? '0'; ?></span>)</p>
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
                                    <div class="imgProduitPanier" onclick="window.location.href='./evenement2.php?id_event=<?= $item['events']['id_evenement']; ?>'">
                                        <!-- VOIR DETAIL -->
                                        <div class="detailProduit">
                                            <p>Voir détail</p>
                                        </div>

                                        <img src="./asset/img/<?= $item["events"]['image']; ?>" alt="image événement">
                                    </div>
                                    <!-- Titre + Supression article -->
                                    <div class="titreSupprimer">
                                        <div class="titreProduitPanier">
                                            <p><?= $item["events"]['titre']; ?></p>
                                        </div>
                                        
                                        <form action="./traitement/action.php" method="post" class="btnSuppressionProduit">
                                            <input type="hidden" name="id_evenement" value="<?= $item["events"]['id_evenement'];?>">
                                            <input type="submit" name="supprimer" value="sup">
                                            <div class="suppressionProduit">
                                                <img src="./asset/img/coix_verte.svg" alt="icone pour supprimer">
                                            </div>
                                        </form>
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

                            <?php 
                    } 
                    
                    ?>
                    <!-- <form action="./traitement/action.php">
                        <button name="valider_commande" class="btn btn-outline-warning mt-3 mb-5" value="valide commande">Valider la commande</button>
                    </form> -->


                    <div class="nav_panier">
                        
                    </div>

                    <!-- Changement d'état au scroll -->
                    <!-- <script src="./asset/js/nav_scroll2.js"></script> -->

                    <!-- Espace navigation -->
                    <script src="./asset/js/espace_navigation2.js"></script>
                <?php } else {
                    echo "panier vide";
                } ?>
    
            </div>
            <div class="titrePanier">
                <img src="./asset/img/img_logo/mon_panier.png" alt="mon panier">
            </div>
        </div>

        <!-- NAVIGATION PANIER -->
        <div class="navPanier">
    
            <!-- LIENS -->
            <!-- <div class="lienPanier">
                <ul>
                    <li><a href="">listes événements</a></li>
                    <li><a href="">mes réservations</a></li>
                </ul>
            </div> -->
            <!-- VALIDER LA COMMANDE -->
            <div class="validerPanier">
                <div class="totalPrix">
                    <p>TOTAL <span class="total"><?= $prixTotal; ?> EUR</span><br><span class="tva">*TVA COMPRISE</span></p>
                </div>

                <form action="./traitement/action.php" id="btnValider">
                    <button name="valider_commande" class="validerBtn" value="valide commande">Valider</button>
                </form>

                
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
