<?php
session_start();

if (isset($_SESSION['user_role']) && ($_SESSION['user_role'] == "admin" || $_SESSION['user_role'] == "client")) {
    // Redirection vers la page home_client
    header("Location: http://localhost/event_luxury/views/home_client");
    exit();
} else {
    include_once "./inc/header2.php";
    include_once "./inc/nav_blc/nav_blc_home.php";
}
?>
<header>
    <div class="containerAccueil">
        <div class="containerBgAccueil">
            <img id="imgBgAccueil" src="./asset/img/event_flamant.jpg" alt="événement Pink Flamingo">
        </div>
        <!-- Petit écran -->
        <div class="logoAccueil">
            <img src="./asset/img/img_logo/logo_big.svg" alt="logo the luxury event">
        </div>
        <!-- Grand écran -->
        <div class="contenuHeaderAccueil">
            <div class="positionAccueil">
                <div class="imgHeaderAccueil">
                    <img src="./asset/img/event_flamant.jpg" alt="événement Pink Flamingo">
                </div>
                <div class="animationFleur">
                    <div class="fleur">
                        <img id="fleurRotate" src="./asset/img/img_logo/fleurEtText.png" alt="fleur animation" class="rotate">
                        <div class="numero1">
                            <img src="./asset/img/img_logo/numero_1.svg" alt="fleur animation">
                        </div>
                    </div>
                </div>
                <div class="logoHeaderAccueil">
                    <img src="./asset/img/img_logo/logo_big.svg" alt="logo the luxury event">
                </div>
            </div>
        </div>
    </div>
</header>

<main>
    <!-- ----- BOUTON CIRCULAIRE - 'retour vers le haut'----- -->
    <?php
    include_once "./inc/bouton_retour_haut/bouton_retour_haut.php";
    ?>

    <!-- SECTION 1 -->
    <div class="sectionAccueilVide">
    </div>
    <section class="sectionAccueil1">
        <div class="partieAccueil1">
            <h1>NOTRE <br>CONCEPT</h1>
            <p>
                Plongez dans un monde d'expériences exclusives et inoubliables où chaque moment est une découverte. Assistez à des concerts privés, privatisez des lieux insolites et d'exception, et vivez des compétitions de haut vol en compagnie de vos athlètes préférés. Transformez-vous en star internationale ou en pilote de Formule 1 le temps d'une journée. Laissez-vous guider par des chefs étoilés qui dévoileront leurs secrets culinaires lors d'ateliers intimes. Savourez des brunchs aux meilleures tables et émerveillez-vous devant des shows culinaires spectaculaires. Offrez-vous des instants uniques où le luxe et l'exclusivité se marient pour créer des souvenirs inoubliables.
            </p>
            <div class="partieAccueil2">
                <h2 class="exergue">"Prêt pour <br>des expériences <br>exclusives et <br>inoubliables"</h2>
                <div class="imgSect2">
                    <img src="./asset/img_event/event_mer_vue_aerienne.jpg" alt="image événement">
                </div>
            </div>
        </div>
    </section>

    <?php if (isset($_SESSION['user_role']) && ($_SESSION['user_role'] == "admin" || $_SESSION['user_role'] == "client")) { ?>
        <!-- SECTION 2 - Vide -->
        <!-- FOOTER 1 -->
        <div class="footerCopyright">
            <p>&#169; Tous droits réservés à The Luxury Event</p>
            <p>Site réalisé par Cynthia PETITOT UI/UX Designer et Développeuse Web</p>
        </div>
    <?php } else { ?>
        <!-- SECTION 2 - Liste des événements -->
        <section class="sectionAccueil2">
            <!-- SECTION BANDE -->
            <section class="container_bande">
                <div class="list">
                    <div class="item">
                        <span class="item-txt">Découvrez nos prochains événements</span>
                        <span class="item-d">
                            <p class="item-dot dot-t">*</p>
                        </span>
                        <span class="item-txt">Découvrez nos prochains événements</span>
                        <span class="item-d">
                            <p class="item-dot dot-b">*</p>
                        </span>
                        <span class="item-txt">Découvrez nos prochains événements</span>
                        <span class="item-d">
                            <p class="item-dot dot-g">*</p>
                        </span>
                        <span class="item-txt">Découvrez nos prochains événements</span>
                        <span class="item-d">
                            <p class="item-dot dot-y">*</p>
                        </span>
                        <span class="item-txt">Découvrez nos prochains événements</span>
                        <span class="item-d">
                            <p class="item-dot dot-r">*</p>
                        </span>
                    </div>
                </div>
                <div class="list">
                    <div class="item">
                        <span class="item-txt">Découvrez nos prochains événements</span>
                        <span class="item-d">
                            <p class="item-dot dot-t">*</p>
                        </span>
                        <span class="item-txt">Découvrez nos prochains événements</span>
                        <span class="item-d">
                            <p class="item-dot dot-b">*</p>
                        </span>
                        <span class="item-txt">Découvrez nos prochains événements</span>
                        <span class="item-d">
                            <p class="item-dot dot-g">*</p>
                        </span>
                        <span class="item-txt">Découvrez nos prochains événements</span>
                        <span class="item-d">
                            <p class="item-dot dot-y">*</p>
                        </span>
                        <span class="item-txt">Découvrez nos prochains événements</span>
                        <span class="item-d">
                            <p class="item-dot dot-r">*</p>
                        </span>
                    </div>
                </div>
            </section>

            <!-- Texte qui défile -->
            <!-- <h3>Découvrez nos prochains événements  *  Déco</h3> -->
            <div class="sectionEventAccueil">
                <!-- <p class="disponible">disponible dès à présent</p> -->
                <div class="gridEventAccueil">
                    <!-- Module Boucle -->
                    <div class="eventAccueil">
                        <div class="imgEventAccueil">
                            <img src="./asset/img_event/event_miami.jpg" alt="image événement">
                        </div>
                        <div class="texteEventAccueil">
                            <p class="titreEventAccueil">
                                The french miami
                            </p>
                            <p class="catégorieEventAccueil">
                                Escapade
                            </p>
                        </div>
                        <a class="btnEventAccueil" href="#modalInscription">
                            <p>Voir l'événement</p>
                        </a>
                    </div>
                    <!-- Module 2 -->
                    <div class="eventAccueil">
                        <div class="imgEventAccueil">
                            <img src="./asset/img_event/event_flamant.jpg" alt="image événement">
                        </div>
                        <div class="texteEventAccueil">
                            <p class="titreEventAccueil">
                                Pink Flamingo
                            </p>
                            <p class="catégorieEventAccueil">
                                AUTHENTIQUE
                            </p>
                        </div>
                        <a class="btnEventAccueil" href="#modalInscription">
                            <p>Voir l'événement</p>
                        </a>
                    </div>
                    <!-- Module 3 -->
                    <div class="eventAccueil">
                        <div class="imgEventAccueil">
                            <img src="./asset/img_event/event_yatch.jpg" alt="image événement">
                        </div>
                        <div class="texteEventAccueil">
                            <p class="titreEventAccueil">
                                Un Jour, Une Vie
                            </p>
                            <p class="catégorieEventAccueil">
                                Luxe
                            </p>
                        </div>
                        <a class="btnEventAccueil" href="#modalInscription">
                            <p>Voir l'événement</p>
                        </a>
                    </div>
                </div>
                <!-- Flèche 'en voir plus' -->
                <!-- <div class="fleurFleche">
                        <img src="./asset/img/img_logo/fleur_fleche.svg" alt="en voir plus">
                    </div> -->
            </div>
            <div class="btnAfficheEvent">
                <a id="btnEventsAccueil" class="btnEventAccueil" href="#modalInscription">
                    <p>Afficher les événements</p>
                </a>
            </div>

            <!-- FOOTER 2 -->
            <div class="footerCopyright2">
                <p>&#169; Tous droits réservés The Luxury Event</p>
            </div>
        </section>
    <?php } ?>
</main>

<!-- -------------- BALISE SCRIPT -------------- -->
<!-- Changement attérir sur l'espace client de la nav -->
<script src="./asset/js/espace_client/nav_espace_client_accueil.js"></script>

<!-- CLIENT OU ADMIN -->
<?php if (isset($_SESSION['user_role']) && ($_SESSION['user_role'] == "admin" || $_SESSION['user_role'] == "client")) { ?>
    <!-- Changement d'état au scroll (l'ensemble des pages) -->
    <script src="./asset/js/nav_scroll2.js"></script>
<?php } else { ?>
    <!-- Changement d'état au scroll (page home)-->
    <script src="./asset/js/animation_scroll/scroll_home.js"></script>
<?php } ?>

<!-- Espace navigation -->
<script src="./asset/js/espace_navigation.js"></script>

<!-- Bouton 'retour vers le haut' -->
<script src="./asset/js/bouton_retour_haut.js"></script>

<!-- -------------- FOOTER -------------- -->
<?php
include_once "./inc/footer.php";
?>