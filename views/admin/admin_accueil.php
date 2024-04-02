<?php
include_once "../inc/header.php";
include_once "../inc/navigation_header.php";
?>

<main>
    <section class="hpa_container">

        <!-- EFFET-1 -->
        <article class="hpa_article">
            <figure class="effet-1">
                <img src="../asset/img/voiture_fond_vert.jpg" alt="">
                <figcaption class="hpa_figcaption">
                    <h3>Liste des<br><span>catégories</span></h3>
                    <p>Consulter, modifier, désactiver, supprimer</p>
                    <h4><a href="">ajouter une catégorie</a></h4>
                </figcaption>
                <a href="./admin_list_categorie.php"></a>
                <!-- balise a : technique pour rendre toute la balise figure cliquable. en css on va lui donner 100% la taille de son parent figure -->
            </figure>
        </article>

        <article class="hpa_article">
            <figure class="effet-1">
                <img src="../asset/img/bocal_fond_vert.jpg" alt="">
                <figcaption class="hpa_figcaption">
                    <h3>Liste des<br><span>événements</h3>
                    <p>Consulter, modifier, annuler, supprimer</p>
                    <h4><a href="">ajouter un événement</a></h4>
                </figcaption>
                <a href="./admin_list_event.php"></a>
            </figure>
        </article>

        <article class="hpa_article">
            <figure class="effet-1">
                <img src="../asset/img/poisson_fond_vert.jpg" alt="">
                <figcaption class="hpa_figcaption">
                    <h3>Liste des<br><span>utilisateurs</span></h3>
                    <p>Consulter, modifier, désactiver, supprimer</p>
                    <h4><a href="">ajouter un utilisateur</a></h4>
                </figcaption>
                <a href="./admin_list_user.php"></a>
            </figure>
        </article>

        <!-- EFFET-1 -->

    </section>

</main>

<!-- BALISE SCRIPT -->
<!-- Espace navigation -->
<script src="../asset/js/espace_navigation2.js"></script>
<!-- Changement d'état au scroll -->
<script src="../asset/js/nav_scroll2.js"></script>

<?php
include_once "../inc/footer.php";
?>