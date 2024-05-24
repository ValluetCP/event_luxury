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
                <div class="animationFleur">
                    <div class="fleur">
                        <img src="./asset/img/img_logo/fleur_texte.svg" alt="fleur animation">
                        <!-- <div class="txtRond">
                            <img src="./asset/img/img_logo/texte_rond.svg" alt="fleur animation">
                            <div class="numero1">
                                <img src="./asset/img/img_logo/numero_1.svg" alt="fleur animation">
                            </div>
                        </div> -->
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

    <!-- SECTION 2 - Liste des événements -->
    <section class="sectionAccueil2">
         <!-- Texte qui défile -->
        <h3>Découvrez nos prochains événements  *  Déco</h3>
        <div class="sectionEventAccueil">
            <p class="disponible">disponible dès à présent</p>
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
                            Loisir
                        </p>
                    </div>
                    <a class="btnEventAccueil" href="">
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
                            The french miami
                        </p>
                        <p class="catégorieEventAccueil">
                            Découverte
                        </p>
                    </div>
                    <a class="btnEventAccueil" href="">
                        <p>Voir l'événement</p>
                    </a>
                </div>
                <!-- Module 3 -->
                <div class="eventAccueil">
                    <div class="imgEventAccueil">
                        <img src="./asset/img_event/event_bateau.jpg" alt="image événement">
                    </div>
                    <div class="texteEventAccueil">
                        <p class="titreEventAccueil">
                            The french miami
                        </p>
                        <p class="catégorieEventAccueil">
                            Loisir
                        </p>
                    </div>
                    <a class="btnEventAccueil" href="">
                        <p>Voir l'événement</p>
                    </a>
                </div>
            </div>
            <!-- Flèche 'en voir plus' -->
            <!-- <div class="fleurFleche">
                <img src="./asset/img/img_logo/fleur_fleche.svg" alt="en voir plus">
            </div> -->
        </div>
    </section>


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