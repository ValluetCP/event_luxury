<?php
include_once "../inc/header.php";

// -------------- SECURITE ACCES ADMIN -------------- //
if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "admin") {

    include_once "../inc/nav_bicolor_espace_admin.php";
?>



    <!-- ------------------------ PAGE FORMULAIRE USER ------------------------ -->
    <main class="site siteEvent">
        <!-- SECTION GAUCHE - IMAGE FIXE -->
        <section class="gauche gaucheEvent">
            <div class="gaucheImg gaucheImgEvent" style="background-image: url(../asset/img/event_horizontal_voiture.jpg);"></div>
        </section>

        <!-- SECTION DROITE - FICHE PRODUIT -->
        <section class="droite">

            <div class="navBlanche"></div>
            
            <div id="containerUserForm" class="containerGabaritForm containerDroit containerDroitEvent">

                <h1>Ajouter<br>un utilisateur</h1>

                <!-- FORMULAIRE - AJOUTER UN USER -->
                <form id="userForm" class="gabaritForm" action="../traitement/action.php" method="post" enctype="multipart/form-data">

                    <div class="gabarit_form">
                        <input type="text" placeholder="nom" name="nom">
                    </div>

                    <div class="gabarit_form">
                        <input type="text" placeholder="prenom" name="prenom">
                    </div>

                    <div class="gabarit_form">
                        <input type="text" placeholder="pseudo" name="pseudo">
                    </div>

                    <div class="gabarit_form">
                        <input type="email" placeholder="email" name="email">
                    </div>

                    <div class="gabarit_form">
                        <input type="password" placeholder="mot de passe" name="mdp">
                    </div>

                    <div class="gabarit_form">
                        <label id="img_profil">Télécharger une photo de profil :</label>
                        <input type="file" class="form-control" name="img_profil" class="file">
                    </div>

                    <!-- BOUTON DE VALIDATION RESERVATION -->
                    <div class="btn_flex">
                        <!-- <button type="button" class="reserve  btnEvent btnEvent-3">Réserver</button> -->
                        <button name="register" value="register" type="submit" class="btnEvent btnEvent-3">Ajouter un utilisateur</button>
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
    <script src="../asset/js/espace_admin/nav_espace_admin_user.js"></script>
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