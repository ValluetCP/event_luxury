<?php

include_once "../inc/header.php";
include_once "../inc/navigation.php";
// include_once "../inc/nav_admin_bicolor.php";
require_once "../../models/categorieModel.php";


// -------------- SECURITE ACCES ADMIN -------------- //
if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == "admin"){
    

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
    <script src="./js/nav_scroll2.js"></script>
    <script>
        function showList(listClassName) {
            var allLists = document.querySelectorAll('.nav2_container div:not(.nav2_menu,.deconnexion,.profil_nav,.img_profil_nav)');
            allLists.forEach(function(list) {
                list.classList.add('hidden');
            });

            // Afficher la liste correspondante
            var selectedList = document.querySelector('.' + listClassName);
            selectedList.classList.remove('hidden');
        }
    </script>


    <!-- -------------- SUITE SECURITE ACCES -------------- -->
    <?php } else { 
        require_once "../inc/securite_admin.php";
    } ?>

</body>

</html>