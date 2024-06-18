<?php

include_once "../inc/header.php";

// -------------- SECURITE ACCES ADMIN -------------- //
if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "admin") {

    include_once "../inc/nav_blc/nav_blc_espace_admin.php";
    require_once "../../models/categorieModel.php";
    $listCategorie = Categorie::findAllCategorie();

?>


    <!-- ---------------------- PAGE LISTE CATEGORIE ---------------------- -->
    <main id="siteListEvent" class="siteList">

        <!-- ----- BOUTON CIRCULAIRE 2 - 'retour vers le haut'----- -->
        <?php
        include_once "../inc/bouton_retour_haut/bouton_retour_haut_admin.php";
        ?>

        <!-- ------------------------------- HAUT -------------------------------- -->
        <!-- SECTION DU HAUT - IMAGE FIXE -->
        <section class="haut">
            <div id="ImgHauteListEvent" class="ImgHaute" style="background-image: url(../asset/img/event_horizontal_thai.JPG);">
            </div>
            <div class="titreListEvent">
                <h1>liste des catégories</h1>
                <h2>ajouter, modifier, désactiver</h2>

            </div>

            <!-- ----- BOUTON CIRCULAIRE 1 - 'scroll'----- -->
            <?php
            include_once "../inc/bouton_scroll/bouton_scroll_admin.php";
            ?>

        </section>


        <!-- ------------------------------- BAS -------------------------------- -->
        <!-- SECTION DU BAS - LISTE DES EVENTS -->
        <section class="bas">


            <!-- CONTAINER GLOBAL - liste des events -->
            <div id="container_adminCategory" class="container_list">

                <!-- Div vide pour afficher le contenu -->
                <div id="resultat" class="overflow_listEvent">

                    <!-- TABLEAU - LISTE DES EVENTS -->
                    <table class="tableau_adminListEvent">
                        <thead class="thead_adminListEvent">
                            <tr>
                                <th>Id</th>
                                <th>Catégorie</th>
                                <th>Nombre d'événements</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_adminListEvent" class="tbody_adminList">

                            <!-- MODULE BOUCLE -->
                            <?php foreach ($listCategorie as $categorie) { ?>
                                <tr class="table_module">

                                    <!-- Identifiant -->
                                    <td class="table_quatite"><?= $categorie['id_categorie']; ?></td>

                                    <!-- titre -->
                                    <td class="table_titre"><?= $categorie['categorie_name']; ?></td>

                                    <!-- nombre d'event associés -->
                                    <td class="table_quatite">4</td>

                                    <!-- supprimer -->
                                    <td class="table_action"><a href="traitement/action.php?id_categorie_delete=<?= $categorie['id_categorie']; ?>">supprimer</a></td>

                                    <!-- modifier -->
                                    <td>
                                        <p class="table_btn">
                                            <a href="./admin_add_categorie.php?id_categorie_update=<?= $categorie['id_categorie']; ?>" id="table_btnTxt">modifier</a>
                                        </p>
                                    </td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- --------- BTN - AJOUTER UN EVENEMENT ---------- -->
            <div class="container_btnAjouter">

                <a href="./admin_add_categorie.php" class="btn_ajouter">
                    <p><i class="fa-light fa-plus"></i>Ajouter une catégorie</p>
                </a>
            </div>

        </section>
    </main>


    <footer></footer>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <!-- BALISE SCRIPT -->
    <!-- Souris -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>
    <script src="../asset/js/app.js"></script>
    <script src="../asset/js/cercle.js"></script>
    <!-- Changement attérir sur l'espace client de la nav -->
    <script src="../asset/js/espace_admin/nav_espace_admin_categorie.js"></script>
    <!-- Espace navigation -->
    <script src="../asset/js/espace_navigation.js"></script>

    <!-- Changement d'état au scroll -->
    <script src="../asset/js/animation_scroll/scroll_admin_list.js"></script>
    <!-- <script src="../asset/js/animation_scroll/scroll_admin_list.js"></script> -->

    <!-- Bouton 'retour vers le haut' -->
    <script src="../asset/js/bouton_retour_haut.js"></script>


    <!-- -------------- SUITE SECURITE ACCES -------------- -->
<?php } else {
    require_once "../inc/securite.php";
} ?>


<!-- -------------- FOOTER -------------- -->
<?php
include_once "../inc/footer.php";
?>