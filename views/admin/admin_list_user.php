<?php
include_once "../inc/header.php";

// -------------- SECURITE ACCES ADMIN -------------- //
if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "admin") {

    include_once "../inc/nav_blc/nav_blc_espace_admin.php";
    require_once "../../models/userModel.php";
    $userList = User::findAllUser();
?>



    <!-- ------------------------ PAGE LISTE USER ------------------------ -->

    <main id="siteListUser" class="siteList">

        <!-- ----- BOUTON CIRCULAIRE 2 - 'retour vers le haut'----- -->
        <?php
        include_once "../inc/bouton_retour_haut/bouton_retour_haut_admin.php";
        ?>

        <!-- ------------------------------- HAUT -------------------------------- -->
        <!-- SECTION DU HAUT - IMAGE FIXE -->
        <section class="haut">

            <!-- image -->
            <div id="ImgHauteListUser" class="ImgHaute" style="background-image: url(../asset/img/event_horizontal_yatch.jpg);">
            </div>

            <!-- texte -->
            <div class="titreListEvent">
                <h1>liste des utilisateurs</h1>
                <h2>ajouter, modifier, désactiver, supprimer</h2>

            </div>

            <!-- ----- BOUTON CIRCULAIRE 1 - 'scroll'----- -->
            <?php
            include_once "../inc/bouton_scroll/bouton_scroll_admin.php";
            ?>
        </section>


        <!-- ------------------------------- BAS -------------------------------- -->
        <!-- SECTION DU BAS - LISTE DES EVENTS -->
        <section class="bas">

            <!-- CONTAINER GLOBAL - liste des events -->
            <div id="container_listUser" class="container_list">

                <!-- ZONE FILTRE -->
                <div class="container_btnFiltre_listEvent">

                    <!-- btn Prochainement - btn historique -->
                    <!-- <div class="btnProchainHistorique">
                    <a href="" id="reinitialiser_resultat" class="prochainement_listEvent">client</a>
                    <a href="" id="historique_event" class="historique_listEvent">admin</a>
                </div> -->

                    <!-- FILTRE -->
                    <!-- <div class="filtreCategory">
                    <button type="submit" class="lb_filtre">Filtrer</button>
                    <div class="lb_selectFiltre">
                        <select name="lb_categoryFiltre" id="lb_categoryFiltre">
                            <option value="1">client / admin</option>
                            <option value="2">Divertissement</option>
                            <option value="3">Atelier</option>
                        </select>
                    </div>
                </div> -->
                </div>

                <!-- Div vide pour afficher le contenu -->
                <div id="resultat" class="overflow_listEvent">

                    <!-- TABLEAU - LISTE DES EVENTS -->
                    <table class="tableau_adminListEvent">
                        <thead class="thead_adminListEvent">
                            <tr>
                                <th></th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>email</th>
                                <th class="table_pseudo">pseudo</th>
                                <th colspan="3">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_adminListUser" class="tbody_adminList">

                            <!-- MODULE BOUCLE -->
                            <?php foreach ($userList as $user) { ?>
                                <tr class="table_module">

                                    <!-- image -->
                                    <td>
                                        <div class="table_img">
                                            <img src="http://localhost/event_luxury/views/asset/img_event/<?= $user['img_profil']; ?>" alt="profil <?= $user['prenom']; ?>">
                                        </div>
                                    </td>

                                    <!-- nom -->
                                    <td class="table_titre table_nom"><?= $user['nom']; ?></td>

                                    <!-- prénom -->
                                    <td class="table_category table_penom"><?= $user['prenom']; ?></td>

                                    <!-- email -->
                                    <td class="table_email"><?= $user['email']; ?></td>

                                    <!-- pseudo -->
                                    <td class="table_pseudo"><?= $user['pseudo']; ?></td>

                                    <!-- supprimer -->
                                    <td class="table_action"><a href="traitement/action.php?id_user_delete=<?= $user['id_utilisateur']; ?>">supprimer</a></td>

                                    <!-- bouton -->
                                    <td>
                                        <p class="table_btn">
                                            <a href="../profil_user2.php?id_user_update=<?= $user['id_utilisateur']; ?>" id="table_btnTxt">Consulter</a>
                                        </p>
                                    </td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>

            <!-- --------- BTN - AJOUTER UN EVENEMENT ---------- -->
            <div class="container_btnAjouter">

                <a href="./admin_add_user.php" class="btn_ajouter">
                    <p><i class="fa-light fa-plus"></i>Ajouter un utilisateur</p>
                </a>
            </div>


        </section>
    </main>


    <footer></footer>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>


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
    <script src="../asset/js/animation_scroll/scroll_admin_list.js"></script>

    <!-- Bouton 'retour vers le haut' -->
    <script src="../asset/js/bouton_retour_haut.js"></script>


    <!-- -------------- SUITE SECURITE ACCES -------------- -->
<?php } else {
    require_once "../inc/securite.php";
} ?>
</body>

</html>