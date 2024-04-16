<?php
include_once "./inc/header.php";
include_once "./inc/navigation_vert.php";
include_once "./inc/functions.php";
// Inclure le fichier contenant la classe Book
require_once "../models/bookModel.php";
require_once "../models/eventModel.php"; // Ajoutez cette ligne pour inclure la classe Event
?>

<div class="containerPanier">

    <?php
    // Récupérer les événements dans le panier
    if (isset($_SESSION['reservation']) && !empty($_SESSION['reservation'])) {
        // Utiliser un tableau associatif pour éviter les doublons
        // $panierItems = array();
        // $totalMontant = 0;

        $prixTotal = 0;
        foreach ($_SESSION['reservation'] as $item) {
            // debug($item["events"]);die;
            // debug($item);die;
            // Récupérer les détails de l'événement en utilisant l'ID de l'événement
            $eventId = $item["events"]["id_evenement"];
            // $eventDetails = Event::findEventById($eventId);
                $prixTotalEvent = $item["events"]['prix'] * $item["quantite"];
                $prixTotal += $prixTotalEvent;
                ?>
            
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
</div>
<?php
    include_once "./inc/footer.php";
?>
