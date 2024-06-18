<?php

include_once "./inc/header.php";

// -------------- SECURITE ACCES CLIENT & ADMIN -------------- //
if ((isset($_SESSION['user_role']) && $_SESSION['user_role'] == "admin") ||
    (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "client")
) {

    include_once "./inc/nav_bicolor_espace_client.php";
    require_once "../models/bookModel.php";

    // -------------- CODE -------------- //

    if (isset($_GET['id_categorie_update'])) {
        // identifiant de l'emprunt
        $id = $_GET['id_categorie_update'];
        // appel de la methode returnBook
        $categorie = Categorie::findCategorieById($id);
    }

?>

    <main class="site siteEvent">
        <!-- SECTION GAUCHE - IMAGE FIXE -->
        <section class="gauche gaucheEvent">
            <div class="gaucheImg gaucheImgEvent" style="background-image: url(../asset/img/event_horizontal_thai.jpg);"></div>
        </section>

        <!-- SECTION DROITE - FICHE PRODUIT -->
        <section class="droite droiteCommande">
            <div id="containerCommande" class="containerGabaritForm containerDroit containerDroitEvent">

                <h1>Félicitation !</h1>
                <h2>Votre commande a bien été enregistrée.</h2>
                <p>Vous pouvez désormais récupérer votre billet dans la liste des réservations qui se trouve dans votre espace client. Un mail de confirmation vous a également été envoyé. Pour toutes modifications, merci de vos rapprocher de notre service client.</p>

                <!-- BOUTON DE VALIDATION CATEGORY -->
                <div class="btn_flex">
                    <button onclick="window.location.href='./list_book.php'" type="submit" class="btnEvent btnEvent-3">Consulter vos réservations</button>
                </div>
            </div>

        </section>
    </main>
    <footer></footer>
    <script src="./js/nav_scroll2.js"></script>

    <!-- -------------- BALISE SCRIPT -------------- -->
    <!-- Espace navigation -->
    <script src="../asset/js/espace_navigation.js"></script>

    <!-- Changement d'état au scroll -->
    <script src="../asset/js/nav_scroll2.js"></script>


    <!-- -------------- SUITE SECURITE ACCES -------------- -->
<?php } else {
    require_once "./inc/securite.php";
} ?>

<?php
// -------------- FOOTER --------------  
include_once "./inc/footer.php";
?>