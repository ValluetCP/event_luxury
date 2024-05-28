<?php
if (!empty($_SESSION)) {
    $user["role"] = $_SESSION["user_role"];
}
?>


<!-- ------------------ MODAL INSCRIPTION / CONNEXION ------------------ -->

<div id="modalInscription" class="modalContainer">
    <div class="modal_content">

        <a class="modal_close" href="#"><img class="img_croix_popup" src="http://localhost/event_luxury/views/asset/img/croix_close.svg" alt=""></a>
        <div class="modalTexte">
            <h2 class="modalTitre">Rendez-vous sur votre espace</h2>
            <hr class="modalTrait">
            <p>Pour participer à nos événements, vous devez être détenteur d'un compte. Veuillez vous connecter ou bien vous inscrire.</p>
        </div>
        <div class="ModalBtnGroup">
            <a href="http://localhost/event_luxury/views/connexion" id="btnHomeConnxion" class="modal_btn btn_modal_1_trait">Je me connecte</a>
            <a href="http://localhost/event_luxury/views/inscription" id="btnHomeInscription" class="modal_btn btn_modal_2_fond">Je m'inscris</a>
        </div>
    </div>
</div>


<!-- -------------------- ACCUEIL - sans connection -------------------- -->

<!-- <a href="http://localhost/event_luxury/views/home">Accueil</a> -->

<!-- --------------------------- ADMIN - rôle --------------------------- -->

<?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "admin") { ?>

    <nav class="navbar">

        <!-- BARRE DE NAVIGATION - début -->
        <div class="nav_logo">
            <a href=""><img id="scrollLogoClair" class="logo logo_vert_clair" src="http://localhost/event_luxury/views/asset/img/img_logo/logo_vert_clair.svg" alt="logo"></a>

            <a href=""><img id="scrollLogoFonce" class="logo logo_vert_fonce" src="http://localhost/event_luxury/views/asset/img/img_logo/logo_vert_fonce.svg" alt="logo"></a>
        </div>

        <div class="navigation">
            <!-- <div class="recherche">
                <input id="recherche" type="text" placeholder="RECHERCHER">
            </div> -->


            <div class="panier">
                <a id="hdr_panier_nav" href="http://localhost/event_luxury/views/panier_css">PANIER (<span class="quantite_panier"><?= $_SESSION["nombre"] ?? '0'; ?></span>)</a>
            </div>
        </div>

        <!-- Burger - animation -->
        <input type="checkbox" class="trigger" />
        <div class="burger">
            <div id="hdr_trait1" class="trait1"></div>
            <div id="hdr_trait2" class="trait2"></div>
        </div>
        <!-- BARRE DE NAVIGATION - fin -->


        <!-- ESPACE DE NAVIGATION - début -->
        <div class="menu_nav grid_menu">
            <div class="menu_vert">
                <div class="nav2_container">
                    <!-- PARTIE DROITE -->
                    <!-- LOGO - MENU DE NAVIGATION -->
                    <div class="logo_menu">
                        <a href=""><img class="logo logo_vert_clair" src="http://localhost/event_luxury/views/asset/img/img_logo/logo_vert_clair.svg" alt="logo"></a>
                    </div>
                    <!-- PROFIL CONNEXION  - (prénom & image profil rond) -->
                    <div class="profil_nav">

                        <!-- Nouvel Affichage photo -->
                        <div class="img_profil_nav">

                            <img class="img_profil" src="http://localhost/event_luxury/views/asset/img_event/<?= $_SESSION['user_img_profil']; ?>" alt="votre photo de profil" title="votre photo de profil">

                        </div>

                        <!-- Affichage prénom -->
                        <?php if (!empty($_SESSION) && $_SESSION['user_role'] == 'admin') { ?>

                            <p>Bonjour <?= ucfirst($_SESSION['user_pseudo']); ?> </p>

                        <?php } else { ?>
                            <p>Bonjour</p>
                        <?php } ?>

                    </div>

                    <!-- ESPACE NAVIGATION  - BOUTON MENU (admin & client) -->
                    <div class="nav2_menu">
                        <ul>
                            <li id="menu_profil"><a href="#" onclick="showList('listeProfil')" class="slide-line">Profil</a></li>
                            <li id="menu_admin"><a href="#" onclick="showList('listeAdmin')" class="slide-line activeMenuLink">Espace Admin</a></li>
                            <li id="menu_client"><a href="#" onclick="showList('listeClient')" class="slide-line">Espace Client</a></li>
                        </ul>
                    </div>

                    <!-- ESPACE NAVIGATION  - LES LIENS -->

                    <!-- MENU ESPACE PERSONNEL -->
                    <div class="listeProfil hidden list_sous_menu">
                        <ul class="filtre">

                            <!-- ESPACE PERSONNEL -->
                            <li><a href="http://localhost/event_luxury/views/profil.php?id=<?= $_SESSION["id_user"]; ?>" class="profil_info_link sous_menu_profil">Mes informations</a></li>

                            <!-- PANIER -->
                            <li><a href="http://localhost/event_luxury/views/panier_css.php" class="profil_panier_link sous_menu_profil">Mon panier</a></li>

                            <!-- FACTURE -->
                            <li><a href="http://localhost/event_luxury/views/facture.php" class="profil_facture_link sous_menu_profil">Factures</a></li>
                        </ul>
                    </div>

                    <!-- MENU ADMIN -->
                    <div class="listeAdmin list_sous_menu">
                        <ul class="filtre">

                            <!-- ADMIN - Accueil -->
                            <li><a href="http://localhost/event_luxury/views/admin/admin_accueil.php" class="admin_accueil_link sous_menu_admin linkActive">L'accueil</a></li>

                            <!-- ADMIN - Liste des catégories -->
                            <li><a href="http://localhost/event_luxury/views/admin/admin_list_categorie.php" class="admin_categorie_link sous_menu_admin">Les catégories</a></li>

                            <!-- ADMIN - La liste des évènements  -->
                            <li><a href="http://localhost/event_luxury/views/admin/admin_list_event.php" class="admin_event_link sous_menu_admin">Les événements</a></li>

                            <!-- ADMIN - Liste des utilisateurs -->
                            <li><a href="http://localhost/event_luxury/views/admin/admin_list_user.php" class="admin_user_link sous_menu_admin">Les utilisateurs</a></li>
                        </ul>
                    </div>

                    <!-- MENU CLIENT -->
                    <div class="listeClient hidden list_sous_menu">
                        <ul class="filtre">

                            <!-- CLIENT - Accueil -->
                            <li><a href="http://localhost/event_luxury/views/home_client" class="client_accueil_link sous_menu_client">L'accueil</a></li>

                            <!-- CLIENT - La liste des évènements -->
                            <li><a href="http://localhost/event_luxury/views/event_list" class="client_event_link sous_menu_client">Nos événements</a></li>

                            <!-- CLIENT - La liste des réservations -->
                            <li><a href="http://localhost/event_luxury/views/list_book" class="client_book_link sous_menu_client">Vos réservations</a></li>
                        </ul>
                    </div>

                    <!-- DECONNEXION  - LIENS -->
                    <div class="deconnexion">
                        <a href="http://localhost/event_luxury/views/logout">Déconnexion</a>
                    </div>
                </div>
            </div>

            <!-- PARTIE GAUCHE -->
            <div class="menu_fond">
            </div>
        </div>
        <!-- ESPACE DE NAVIGATION - fin -->
    </nav>

<?php } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "client") { ?>

    <nav class="nav_home_page">

        <!-- BARRE DE NAVIGATION - début -->
        <div class="nav_logo">
            <a href="http://localhost/event_luxury/views/accueil_client.php"><img id="scrollLogoClair" class="logo logo_vert_clair" src="http://localhost/event_luxury/views/asset/img/img_logo/logo_vert_clair.svg" alt="logo"></a>
        </div>

        <div class="navigation">
            <!-- <div class="recherche">
                <input id="recherche" type="text" placeholder="RECHERCHER">
            </div> -->


            <div class="panier">
                <a id="panier_nav" href="http://localhost/event_luxury/views/panier_css">PANIER (<span class="quantite_panier"><?= $_SESSION["nombre"] ?? '0'; ?></span>)</a>
            </div>
        </div>

        <!-- Burger - animation -->
        <input type="checkbox" class="trigger" />
        <div class="burger">
            <div id="e_trait1" class="trait1"></div>
            <div id="e_trait2" class="trait2"></div>
        </div>
        <!-- BARRE DE NAVIGATION - fin -->


        <!-- ESPACE DE NAVIGATION - début -->
        <div class="menu_nav grid_menu">
            <div class="menu_vert">
                <div class="nav2_container">
                    <!-- PARTIE DROITE -->
                    <!-- LOGO - MENU DE NAVIGATION -->
                    <div class="logo_menu">
                        <a href="http://localhost/event_luxury/views/accueil_client.php"><img class="logo logo_vert_clair" src="http://localhost/event_luxury/views/asset/img/img_logo/logo_vert_clair.svg" alt="logo"></a>
                    </div>
                    <!-- PROFIL CONNEXION  - (prénom & image profil rond) -->
                    <div class="profil_nav">

                        <!-- Nouvel Affichage photo -->
                        <div class="img_profil_nav">

                            <img class="img_profil" src="http://localhost/event_luxury/views/asset/img_event/<?= $_SESSION['user_img_profil']; ?>" alt="votre photo de profil" title="votre photo de profil">

                        </div>

                        <!-- Affichage prénom -->
                        <?php if (!empty($_SESSION) && $_SESSION['user_role'] == 'client') { ?>

                            <p>Bonjour <?= ucfirst($_SESSION['user_pseudo']); ?> </p>

                        <?php } else { ?>
                            <p>Bonjour</p>
                        <?php } ?>

                    </div>

                    <!-- ESPACE NAVIGATION  - BOUTON MENU (admin & client) -->
                    <div class="nav2_menu">
                        <ul>
                            <li id="menu_profil"><a href="#" onclick="showList('listeProfil')" class="slide-line">Profil</a></li>
                            <li id="menu_admin"><a href="#" onclick="showList('listeAdmin')" class="slide-line activeMenuLink">Espace Admin</a></li>
                            <li id="menu_client"><a href="#" onclick="showList('listeClient')" class="slide-line">Espace Client</a></li>
                        </ul>
                    </div>

                    <!-- ESPACE NAVIGATION  - LES LIENS -->

                    <!-- MENU ESPACE PERSONNEL -->
                    <div class="listeProfil hidden list_sous_menu">
                        <ul class="filtre">

                            <!-- ESPACE PERSONNEL -->
                            <li><a href="http://localhost/event_luxury/views/profil.php?id=<?= $_SESSION["id_user"]; ?>" class="profil_info_link sous_menu_profil">Mes informations</a></li>

                            <!-- PANIER -->
                            <li><a href="http://localhost/event_luxury/views/panier_css.php" class="profil_panier_link sous_menu_profil">Mon panier</a></li>

                            <!-- FACTURE -->
                            <li><a href="http://localhost/event_luxury/views/facture.php" class="profil_facture_link sous_menu_profil">Factures</a></li>
                        </ul>
                    </div>

                    <!-- MENU ADMIN -->
                    <div class="listeAdmin list_sous_menu">
                        <ul class="filtre">

                            <!-- ADMIN - Accueil -->
                            <li><a href="http://localhost/event_luxury/views/admin/admin_accueil.php" class="admin_accueil_link sous_menu_admin linkActive">L'accueil</a></li>

                            <!-- ADMIN - Liste des catégories -->
                            <li><a href="http://localhost/event_luxury/views/admin/admin_list_categorie.php" class="admin_categorie_link sous_menu_admin">Les catégories</a></li>

                            <!-- ADMIN - La liste des évènements  -->
                            <li><a href="http://localhost/event_luxury/views/admin/admin_list_event.php" class="admin_event_link sous_menu_admin">Les événements</a></li>

                            <!-- ADMIN - Liste des utilisateurs -->
                            <li><a href="http://localhost/event_luxury/views/admin/admin_list_user.php" class="admin_user_link sous_menu_admin">Les utilisateurs</a></li>
                        </ul>
                    </div>

                    <!-- MENU CLIENT -->
                    <div class="listeClient hidden list_sous_menu">
                        <ul class="filtre">

                            <!-- CLIENT - Accueil -->
                            <li><a href="http://localhost/event_luxury/views/home_client" class="client_accueil_link sous_menu_client">L'accueil</a></li>

                            <!-- CLIENT - La liste des évènements -->
                            <li><a href="http://localhost/event_luxury/views/event_list" class="client_event_link sous_menu_client">Nos événements</a></li>

                            <!-- CLIENT - La liste des réservations -->
                            <li><a href="http://localhost/event_luxury/views/list_book" class="client_book_link sous_menu_client">Vos réservations</a></li>
                        </ul>
                    </div>

                    <!-- DECONNEXION  - LIENS -->
                    <div class="deconnexion">
                        <a href="http://localhost/event_luxury/views/logout">Déconnexion</a>
                    </div>
                </div>
            </div>

            <!-- PARTIE GAUCHE -->
            <div class="menu_fond">
            </div>
        </div>
        <!-- ESPACE DE NAVIGATION - fin -->
    </nav>

<?php } else { ?>

    <nav class="nav_home_page">

        <!-- BARRE DE NAVIGATION - début -->
        <div class="nav_logo">
            <img class="logo logo_vert_clair" src="http://localhost/event_luxury/views/asset/img/img_logo/logo_vert_clair.svg" alt="logo">
            <!-- <img class="logo logo_vert_fonce" src="./img/img_logo/logo_vert_fonce.svg" alt=""> -->
        </div>

        <div class="navigation hp_navigation">


            <!-- Bonjour -->
            <?php if (!empty($_SESSION) && $_SESSION['user_role'] == 'admin') { ?>
                <h1>Bonjour admin<?= ucfirst($_SESSION['user_pseudo']); ?> </h1>
            <?php } elseif (!empty($_SESSION) && $_SESSION['user_role'] == 'client') { ?>
                <h1>Bonjour client<?= ucfirst($_SESSION['user_pseudo']); ?> </h1>
            <?php } else { ?>
                <!-- <h1>Bonjour</h1> -->
            <?php } ?>

            <div class="commande_navigation_header">


                <!-- S'incrire  -->
                <a href="http://localhost/event_luxury/views/inscription">
                    <p>Inscription</p>
                </a>

                <!-- Se connecter  -->
                <a href="http://localhost/event_luxury/views/connexion">
                    <p>Connexion</p>
                </a>

                <!-- Réservations  -->
                <a href="#modalInscription" class="btn_reservation">
                    <p>Réservation</p>
                </a>
            </div>
        </div>
    </nav>

<?php } ?>