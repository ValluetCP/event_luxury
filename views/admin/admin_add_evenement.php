<?php
include_once "../inc/header.php";

// -------------- SECURITE ACCES ADMIN -------------- //
if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "admin") {

    include_once "../inc/nav_bicolor_espace_admin.php";
    require_once "../../models/categorieModel.php";
    require_once "../../models/eventModel.php";
    require_once "../../models/bookModel.php";

    // -------------- CODE PAGE -------------- //
    $listCategorie = Categorie::findAllCategorie();

    // modifier un event
    if (isset($_GET['id_event_update'])) {
        // identifiant de l'emprunt
        $id = $_GET['id_event_update'];
        // appel de la methode returnBook
        $event = Event::findEventById($id);

        // récupérer le nombre total de places réservées
        $totalPlacesReservees = Book::calculReservation($id);
        // calculer le nombre de places disponibles
        $placesDisponibles = $event['nbr_place'] - $totalPlacesReservees;
    } else {
        // Si c'est un nouvel événement, initialiser les valeurs
        $totalPlacesReservees = 0;
        $placesDisponibles = 0;
    }


?>



    <!-- ------------------------ PAGE AJOUTER/MODIFIER UN EVENT ------------------------ -->

    <main class="site siteEvent">
        <!-- SECTION GAUCHE - IMAGE FIXE -->
        <section class="gauche gaucheEvent">
            <div class="gaucheImg gaucheImgEvent" style="background-image: url(<?php
                if (!empty($event) && !empty($event['image'])) {
                    echo '../asset/img_event/' . $event['image'];
                } else {
                    echo '../asset/img/event_horizontal_bateau.jpg';
                }
            ?>);">
            </div>
        </section>

        <!-- SECTION DROITE - FICHE PRODUIT -->
        <section class="droite">

            <div class="navBlanche"></div>
            
            <div id="containerEventForm" class="containerGabaritForm containerDroit containerDroitEvent">

                <h1><?= !empty($event) ? "Modifier<br>un événement" : "Ajouter<br>un événement" ?></h1>

                <!-- FORMULAIRE - AJOUTER UN EVENT -->
                <form id="eventForm" class="gabaritForm" action="../traitement/action.php" method="post" enctype="multipart/form-data">

                    <!-- titre -->
                    <div class="gabarit_form">
                        <input type="text" name="titre" placeholder="titre" title="titre" value="<?= !empty($event) ? $event["titre"] : "" ?>">
                    </div>

                    <!-- tarif -->
                    <div class="gabarit_form">
                        <input type="number" name="prix" placeholder="tarif" title="tarif" value="<?= !empty($event) ? $event["prix"] : "" ?>">
                    </div>

                    <!-- résumé -->
                    <div class="gabarit_form">
                        <input type="text" name="resume" placeholder="résumé" title="résumé" value="<?= !empty($event) ? $event["resume"] : "" ?>">
                    </div>

                    <!-- date -->
                    <div class="gabarit_form">
                        <input type="date" name="date_event" placeholder="date" title="date" value="<?= !empty($event) ? $event["date_event"] : "" ?>">
                    </div>

                    <!-- nombre de place -->
                    <div class="gabarit_form">
                        <input type="number" name="nbr_place" placeholder="nombre de place" title="nombre de place" value="<?= !empty($event) ? $event["nbr_place"] : "" ?>">
                    </div>

                    <!-- catégorie choix -->
                    <div class="gabarit_form">
                        <label>Categorie </label>

                        <!-- Table catégories (clé étrangère) - récupérer les infos -->
                        <select name="categorie">

                            <!-- si ce n'est pas vide - champs déjà renseigné-->
                            <?php if (!empty($event)) { ?>
                                <option value=""><?= $event["categorie_name"]; ?></option>

                                <!-- Sinon sélectionner catégories -->
                            <?php } else { ?>
                                <option value="">Choisir une categorie</option>
                                <?php foreach ($listCategorie as $categorie) { ?>
                                    <option value="<?= $categorie['id_categorie']; ?>"><?= $categorie['categorie_name']; ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>

                    <!-- Afficher l'image actuelle -->
                    <div class="form-group mb-3">
                        <label class="m-2" id="image">Image actuelle :</label>

                        <!-- Afficher l'image actuelle -->
                        <?php if (!empty($event['image'])) : ?>
                            <img src="../asset/img_event/<?= $event['image'] ?>" alt="Image actuelle" class="current-image">

                            <!-- Sinon msg : aucune image -->
                        <?php else : ?>
                            <span>Aucune image</span>
                        <?php endif; ?>
                    </div>

                    <!-- une nouvelle image -->
                    <div class="gabarit_form event_file">
                        <label id="image">Télécharger une nouvelle image</label>
                        <input type="file" class="form-control" name="image" class="file">
                    </div>



                    <!-- INPUT HIDDEN -->

                    <!-- Pour les id se référer à la bdd -->
                    <input type="hidden" class="form-control" name="id_evenement" value="<?= !empty($event) ? $event["id_evenement"] : "" ?>">

                    <input type="hidden" class="form-control" name="categorie_id" value="<?= !empty($event) ? $event["categorie_id"] : "" ?>">


                    <!-- BOUTON - VALIDER / SAUVEGARDER -->
                    <div class="btn_flex">
                        <button type="submit" class="btnEvent btnEvent-3" name="<?= !empty($event) ? "update_event" : "add_event" ?>" value="add_event"><?= !empty($event) ? "Sauvegarder" : "Ajouter un événement" ?></button>
                    </div>
                </form>

            </div>

        </section>
    </main>
    <footer></footer>

    <!-- BALISE SCRIPT -->
    <!-- Souris -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>
    <script src="../asset/js/app.js"></script>
    <script src="../asset/js/cercle.js"></script>
    <!-- Changement attérir sur l'espace client de la nav -->
    <script src="../asset/js/espace_admin/nav_espace_admin_event.js"></script>
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