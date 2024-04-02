<?php

include_once "./inc/header.php";
include_once "./inc/navigation.php";
// include_once "../inc/nav_admin_bicolor.php";
require_once "../models/bookModel.php";



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
</body>

</html>