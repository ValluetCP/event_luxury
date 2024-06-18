<?php
include_once "./inc/header.php";
include_once "./inc/nav_blc/nav_blc_espace_profil.php";
?>
<main>
    <section class="container_404">
        <div class="bg_404" style="background-image: url(../asset/img/event_flamant.jpg);">
        </div>
    </section>
    <!-- ZONE TEXTE -->
    <div class="zone_txt_404">
        <h1 class="titre_404">404</h1>
        <p>Patience ! Cette page n'est pas encore accessible.</p>

        <!-- --------- BTN - PREVISUALISER LA LISTE ---------- -->
        <div class="container_btn404">
            <!-- btn - visualiser -->
            <a href="http://localhost/event_luxury/" class="btn_404">Retour à l'accueil</a>
        </div>

    </div>
</main>
<footer></footer>
    <!-- Changement attérir sur l'espace client de la nav -->
    <script src="./asset/js/espace_admin/nav_espace_profil_facture.js"></script>
    
    <!-- Changement d'état au scroll -->
    <script src="./asset/js/nav_scroll2.js"></script>

    <!-- Espace navigation -->
    <script src="./asset/js/espace_navigation.js"></script>

<!-- -------------- FOOTER -------------- -->
<?php
    include_once "./inc/footer.php";
?>