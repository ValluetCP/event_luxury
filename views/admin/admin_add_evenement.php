<?php
include_once "../inc/header_admin.php";
include_once "../inc/nav_admin_bicolor.php";
?>



    <!-- ------------------------ PAGE FORMULAIRE EVENT ------------------------ -->
    <main class="site siteEvent">
        <!-- SECTION GAUCHE - IMAGE FIXE -->
        <section class="gauche gaucheEvent">
            <div class="gaucheImg gaucheImgEvent" style="background-image: url(../asset/img/event_horizontal_bateau.jpg);"></div>
        </section>

        <!-- SECTION DROITE - FICHE PRODUIT -->
        <section class="droite">
            <div id="containerEventForm" class="containerGabaritForm containerDroit containerDroitEvent">

                <h1>Ajouter<br>un événement</h1>

                <!-- FORMULAIRE - AJOUTER UN EVENT -->
                <form id="eventForm" class="gabaritForm" action="" method="post">
                    
                    <div class="gabarit_form">
                        <input type="text" name="titre" placeholder="titre">
                    </div>
                    
                    <div class="gabarit_form">
                        <input type="number" name="prix" placeholder="tarif">
                    </div>
                    
                    <div class="gabarit_form">
                        <input type="text" name="resume" placeholder="résumé">
                    </div>
                    
                    <div class="gabarit_form">
                        <input type="date" name="date_event" placeholder="date">
                    </div>
                    
                    <div class="gabarit_form">
                        <input type="number"  name="nbr_place" placeholder="nombre de place">
                    </div>
                    
                    <div class="gabarit_form">
                        <label>Categorie </label>
                        <select name="categorie" id="">
                            <option value="">Choisir une categorie</option>
                            <option value=""></option>
                        </select>
                    </div>

                    <div class="gabarit_form event_file">
                        <label id="image">Télécharger une nouvelle image</label>
                        <input type="file" class="form-control" name="image" class="file">
                    </div>

                    

                    <!-- BOUTON DE VALIDATION RESERVATION -->
                    <div class="btn_flex">
                        <!-- <button type="button" class="reserve  btnEvent btnEvent-3">Réserver</button> -->
                        <button onclick="window.location.href='#modalEvent'" type="button" class="btnEvent btnEvent-3">Ajouter un événement</button>
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
</body>

</html>