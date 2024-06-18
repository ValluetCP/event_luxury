<?php

include_once "../inc/header.php";

// -------------- SECURITE ACCES ADMIN -------------- //
if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "admin") {

    include_once "../inc/nav_bicolor_espace_admin.php";
    require_once "../../models/categorieModel.php";



    // -------------- CODE PAGE -------------- //
    if (isset($_GET['id_categorie_update'])) {
        // identifiant de l'emprunt
        $id = $_GET['id_categorie_update'];
        // appel de la methode returnBook
        $categorie = Categorie::findCategorieById($id);
    }

?>


    <!-- ---------------- PAGE AJOUTER/MODIFIER UNE CATEGORIE - ADMIN ----------------- -->

    <main class="site siteEvent">
        <!-- SECTION GAUCHE - IMAGE FIXE -->
        <section class="gauche gaucheEvent">
            <div class="gaucheImg gaucheImgEvent" style="background-image: url(../asset/img/event_horizontal_thai.jpg);"></div>
        </section>

        <!-- SECTION DROITE - FICHE PRODUIT -->
        <section class="droite">

            <div class="navBlanche"></div>
            
            <div id="containerCategory" class="containerGabaritForm containerDroit containerDroitEvent">

                <!-- <h1>Ajouter<br>une catégorie</h1> -->
                <h1><?= !empty($categorie) ? "Modifier<br>une catégorie" : "Ajouter<br>une catégorie" ?></h1>

                <!-- FORMULAIRE - AJOUTER UNE CATEGORIE -->
                <form id="categorieForm" class="gabaritForm" action="../traitement/action.php" method="post">

                    <div id="categorie_form" class="categorie_form gabarit_form">
                        <!-- <label for="">nom de la nouvelle catégorie</label><br> -->
                        <input type="text" placeholder="nom de la nouvelle catégorie" name="categorie_name" value="<?= !empty($categorie) ? $categorie["categorie_name"] : "" ?>">
                    </div>

                    <!-- Pour les id se référer à la bdd -->
                    <input type="hidden" class="form-control text-uppercase" name="id_categorie" value="<?= !empty($categorie) ? $categorie["id_categorie"] : "" ?>">

                    <!-- BOUTON DE VALIDATION CATEGORY -->
                    <div class="btn_flex">
                        <button onclick="window.location.href='#modalEvent'" type="submit" class="btnEvent btnEvent-3" name="<?= !empty($categorie) ? "update_categorie" : "add_categorie" ?>" value="add_categorie">Valider</button>
                    </div>
                </form>
            </div>

        </section>
    </main>
    <footer></footer>

    <!-- -------------- BALISE SCRIPT -------------- -->
    <!-- Souris -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>
    <script src="../asset/js/app.js"></script>
    <script src="../asset/js/cercle.js"></script>
    <!-- Changement attérir sur l'espace client de la nav -->
    <script src="../asset/js/espace_admin/nav_espace_admin_categorie.js"></script>
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