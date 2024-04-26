<?php

include_once "./inc/header.php";
// include_once "./inc/navigation.php";
include_once "./inc/navigation_bicolor.php";
?>

    <main class="site siteEvent">
        <!-- SECTION GAUCHE - IMAGE FIXE -->
        <section class="gauche gaucheEvent">
            <div class="gaucheImg gaucheImgEvent" style="background-image: url(../asset/img/event_horizontal_thai.jpg);"></div>
        </section>

        <!-- SECTION DROITE - FICHE PRODUIT -->
        <section class="droite droiteCommande">
            <div id="containerCommande" class="containerGabaritForm containerDroit containerDroitEvent">

                <h1>Connexion</h1>
                <!-- <h2>Nous ravie de vous retrouvez</h2> -->
                <?php if (isset($_SESSION["error_message"]['identifiant'])) { ?>
                    <p>
                        <?= $_SESSION["error_message"]['identifiant']; ?>
                    </p>
                <?php }
                    unset($_SESSION["error_message"]['identifiant']); 
                ?>
                <form action="./traitement/action.php" method="post">

                    <div id="form_connexion" class="gabarit_form">
                        <input type="text" placeholder="pseudo" name="pseudo" title="Saisissez votre pseudo" required>                        
                    </div>

                    <div id="form_connexion" class="gabarit_form">
                        <input type="password" name="password" placeholder="mot de passe" title="Saisissez votre mot de passe">
                    </div>

                    <!-- BOUTON DE VALIDATION CONNEXION -->
                    <div class="btn_flex">
                        <button type="submit" class="btnEvent btnEvent-3" name="login" value="login">Se connecter</button>
                    </div>
                </form>

            </div>

        </section>
    </main>
    <footer></footer>
 
    
    <!-- -------------- BALISE SCRIPT -------------- -->
    <!-- Espace navigation -->
    <script src="../asset/js/espace_navigation.js"></script>

    <!-- Changement d'état au scroll -->
    <script src="../asset/js/nav_scroll2.js"></script>

</body>

</html>