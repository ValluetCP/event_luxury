<?php
include_once "./inc/header.php";
include_once "./inc/navigation.php";
?>

    

    <!-- ------------------------ PAGE INSCRIPTION ------------------------ -->
    <main class="site siteEvent">
        <!-- SECTION GAUCHE - IMAGE FIXE -->
        <section class="gauche gaucheEvent">
            <div class="gaucheImg gaucheImgEvent" style="background-image: url(../asset/img/event_horizontal_voiture.jpg);"></div>
        </section>

        <!-- SECTION DROITE - FICHE PRODUIT -->
        <section class="droite droiteInscription">

            <div class="navBlanche"></div>

            <div id="containerInscription" class="containerGabaritForm containerDroit containerDroitEvent">

                <h1>Inscription</h1>

                <!-- FORMULAIRE - AJOUTER UN USER -->
                <form id="userForm" class="gabaritForm" action="../traitement/action.php" method="post" enctype="multipart/form-data">
                    
                    <div class="gabarit_form">
                        <!-- msg erreur -->
                        <?php if (isset($_SESSION["error_message"]["nom"])) { ?>
                            <p><?= $_SESSION["error_message"]["nom"]; ?></p>
                        <?php }  ?>
                        <!-- champs -->
                        <!-- champs prénom -->
                        <input type="text"  placeholder="nom" name="nom" >
                    </div>
                    
                    <div class="gabarit_form">
                        <!-- msg erreur -->
                        <?php if (isset($_SESSION["error_message"]["prenom"])) { ?>
                            <p><?= $_SESSION["error_message"]["prenom"]; ?></p>
                        <?php }  ?>
                        <!-- champs -->
                        <input type="text"  placeholder="prenom" name="prenom" >
                    </div>
                    
                    <div class="gabarit_form">
                        <!-- msg erreur -->
                        <?php if (isset($_SESSION["error_message"]["pseudo"])) { ?>
                            <p><?= $_SESSION["error_message"]["pseudo"]; ?></p>
                        <?php }  ?>
                        <!-- champs -->
                        <input type="text"  placeholder="pseudo" name="pseudo" >
                    </div>
                    
                    <div class="gabarit_form">
                        <!-- msg erreur -->
                        <?php if (isset($_SESSION["error_message"]["email"])) { ?>
                            <p><?= $_SESSION["error_message"]["email"]; ?></p>
                        <?php }  ?>
                        <!-- champs -->
                        <input type="email"  placeholder="email" name="email" >
                    </div>
                    
                    <div class="gabarit_form">
                        <!-- msg erreur -->
                        <?php if (isset($_SESSION["error_message"]["mdp"])) { ?>
                            <p><?= $_SESSION["error_message"]["mdp"]; ?></p>
                        <?php }  ?>
                        <!-- champs -->
                        <input type="password"  placeholder="mot de passe" name="mdp" >
                    </div>

                    <div class="gabarit_form">
                        <!-- msg erreur -->
                        <?php if (isset($_SESSION["error_message"]["img_profil"])) { ?>
                            <p><?= $_SESSION["error_message"]["img_profil"]; ?></p>
                        <?php }  ?>
                        <!-- file -->
                        <label id="img_profil">Télécharger une photo de profil :</label>
                        <input type="file" class="form-control" name="img_profil" class="file">
                    </div>

                    <!-- BOUTON DE VALIDATION RESERVATION -->
                    <div class="btn_flex">
                        <!-- <button type="button" class="reserve  btnEvent btnEvent-3">Réserver</button> -->
                        <button name="register" value="register" type="submit" class="btnEvent btnEvent-3">Valider</button>
                    </div>
                </form>
<?php 
unset($_SESSION["error_message"]); 
?>
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