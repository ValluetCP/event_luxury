<?php
include_once "./inc/header.php";
include_once "./inc/navigation_blanc.php";
// include_once "./inc/navigation_header.php";
?>

<header>
    <div class="containerAccueil">
        <div class="containerBgAccueil">
            <img src="./asset/img/event_flamant.jpg" alt="événement Pink Flamingo">
        </div>
        <div class="contenuHeaderAccueil">
            <div class="positionAccueil">
                <div class="imgHeaderAccueil">
                    <img src="./asset/img/event_flamant.jpg" alt="événement Pink Flamingo">
                </div>
                <div class="logoHeaderAccueil">
                    <img src="./asset/img/img_logo/logo_big.svg" alt="">
                </div>
            </div>
        </div>
    </div>
</header>
<main>
</main>

<!-- -------------- BALISE SCRIPT -------------- -->
<!-- Changement attérir sur l'espace client de la nav -->
<script src="./asset/js/nav_espace_client_event.js"></script>

<!-- Changement d'état au scroll -->
<script src="./asset/js/nav_scroll2.js"></script>

<!-- Espace navigation -->
<script src="./asset/js/espace_navigation.js"></script>

<!-- -------------- FOOTER -------------- -->
<?php
    include_once "./inc/footer.php";
?>