<?php
if(!empty($_SESSION)) {
    $user["role"] = $_SESSION["user_role"];
}
?>



<!-- -------------------- ACCUEIL - sans connection -------------------- -->

<!-- <a href="http://localhost/event_luxury/views/home">Accueil</a> -->

<!-- --------------------------- ADMIN - rôle --------------------------- -->

<?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == "admin"){ ?>

    <nav class="nav_home_page">

        <!-- BARRE DE NAVIGATION - début -->
        <div class="nav_logo">
            <a href=""><img id="scrollLogoClair" class="logo logo_vert_clair" src="http://localhost/event_luxury/views/asset/img/img_logo/logo_vert_clair.svg" alt="logo"></a>
        </div>

        <div class="navigation">
            <!-- <div class="recherche">
                <input id="recherche" type="text" placeholder="RECHERCHER">
            </div> -->


            <div class="panier">
                <a href="http://localhost/event_luxury/views/panier_0">PANIER (<span class="quantite_panier"><?= $_SESSION["nombre"] ?? ''; ?></span>)</a>
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
                        <a href=""><img class="logo logo_vert_clair" src="http://localhost/event_luxury/views/asset/img/img_logo/logo_vert_clair.svg" alt="logo"></a>
                    </div>
                    <!-- PROFIL CONNEXION  - (prénom & image profil rond) -->
                    <div class="profil_nav">

                        <!-- Affichage photo -->
                        <div class="img_profil_nav">

                        <?php if(!empty($_SESSION) && $_SESSION['user_role'] == 'admin') { ?>                 
                            <a href="">
                                <img class="img_profil" src="../asset/img/coco2.JPG" alt="">
                            </a>
                            <!-- <a href="">
                                <img class="img_profil" src="../asset/img/<?= $_SESSION['user_img_profil']; ?>" alt="">
                            </a> -->
                        <?php } elseif(!empty($_SESSION) && $_SESSION['user_role'] == 'client') { ?>
                            <a href="">
                                <img class="img_profil" src="../asset/img/calamar.JPG" alt="">
                            </a>
                        <?php } else { ?>
                            <a href="">
                                <img class="img_profil" src="../asset/img/calamar.JPG" alt="">
                            </a>
                        <?php } ?>
                        </div>

                        <!-- Affichage prénom -->
                        <?php if(!empty($_SESSION) && $_SESSION['user_role'] == 'admin') { ?>                 
                            <p>Bonjour <?= ucfirst($_SESSION['user_pseudo']); ?> </p>
                        <?php } elseif(!empty($_SESSION) && $_SESSION['user_role'] == 'client') { ?>
                            <p>Bonjour <?= ucfirst($_SESSION['user_pseudo']); ?> </p>
                        <?php } else { ?>
                            <p>Bonjour</p>
                        <?php } ?>
                        <!-- <p>Bonjour Clara,</p> -->
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
                            <li><a href="http://localhost/event_luxury/views/info_user.php?id=<?= $_SESSION["id_user"]; ?>" class="profil_info_link sous_menu_profil">Informations personnelles</a></li>

                            <!-- FACTURE -->
                            <li><a href="" class="profil_facture_link sous_menu_profil">Factures</a></li>
                        </ul>
                    </div>

                    <!-- MENU ADMIN -->
                    <div class="listeAdmin list_sous_menu">
                        <ul class="filtre">

                            <!-- ADMIN - Accueil -->
                            <li><a href="http://localhost/event_luxury/views/admin/admin_accueil.php" class="admin_accueil_link sous_menu_admin linkActive">Accueil</a></li>

                            <!-- ADMIN - Liste des catégories -->
                            <li><a href="http://localhost/event_luxury/views/admin/admin_list_categorie.php" class="admin_categorie_link sous_menu_admin">Catégories</a></li>

                            <!-- ADMIN - La liste des évènements  -->
                            <li><a href="http://localhost/event_luxury/views/admin/admin_list_event.php" class="admin_event_link sous_menu_admin">événements</a></li>

                            <!-- ADMIN - Liste des utilisateurs -->
                            <li><a href="http://localhost/event_luxury/views/admin/admin_list_user.php" class="admin_user_link sous_menu_admin">utilisateurs</a></li>
                        </ul>
                    </div>

                    <!-- MENU CLIENT -->
                    <div class="listeClient hidden list_sous_menu">
                        <ul class="filtre">

                            <!-- CLIENT - Accueil -->
                            <li><a href="http://localhost/event_luxury/views/home" class="client_accueil_link sous_menu_client">Accueil</a></li>

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

<?php } elseif(isset($_SESSION['user_role']) && $_SESSION['user_role'] == "client"){ ?>

    <nav class="nav_home_page">

        <!-- BARRE DE NAVIGATION - début -->
        <div class="nav_logo">
            <a href=""><img id="scrollLogoClair" class="logo logo_vert_clair" src="http://localhost/event_luxury/views/asset/img/img_logo/logo_vert_clair.svg" alt="logo"></a>
        </div>

        <div class="navigation">
            <!-- <div class="recherche">
                <input id="recherche" type="text" placeholder="RECHERCHER">
            </div> -->


            <div class="panier">
                <a href="http://localhost/event_luxury/views/panier_0">PANIER (<span class="quantite_panier"><?= $_SESSION["nombre"] ?? ''; ?></span>)</a>
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
                        <a href=""><img class="logo logo_vert_clair" src="http://localhost/event_luxury/views/asset/img/img_logo/logo_vert_clair.svg" alt="logo"></a>
                    </div>
                    <!-- PROFIL CONNEXION  - (prénom & image profil rond) -->
                    <div class="profil_nav">

                        <!-- Affichage photo -->
                        <div class="img_profil_nav">

                        <?php if(!empty($_SESSION) && $_SESSION['user_role'] == 'admin') { ?>                 
                            <a href="">
                                <img class="img_profil" src="http://localhost/event_luxury/views/asset/img/coco2.JPG" alt="">
                            </a>
                            <!-- <a href="">
                                <img class="img_profil" src="../asset/img/<?= $_SESSION['user_img_profil']; ?>" alt="">
                            </a> -->
                        <?php } elseif(!empty($_SESSION) && $_SESSION['user_role'] == 'client') { ?>
                            <a href="">
                                <img class="img_profil" src="http://localhost/event_luxury/views/asset/img/calamar.JPG" alt="">
                            </a>
                        <?php } else { ?>
                            <a href="">
                                <img class="img_profil" src="http://localhost/event_luxury/views/asset/img/calamar.JPG" alt="">
                            </a>
                        <?php } ?>
                        </div>

                        <!-- Affichage prénom -->
                        <?php if(!empty($_SESSION) && $_SESSION['user_role'] == 'admin') { ?>                 
                            <p>Bonjour <?= ucfirst($_SESSION['user_pseudo']); ?> </p>
                        <?php } elseif(!empty($_SESSION) && $_SESSION['user_role'] == 'client') { ?>
                            <p>Bonjour <?= ucfirst($_SESSION['user_pseudo']); ?> </p>
                        <?php } else { ?>
                            <p>Bonjour</p>
                        <?php } ?>
                        <!-- <p>Bonjour Clara,</p> -->
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
                            <li><a href="http://localhost/event_luxury/views/info_user.php?id=<?= $_SESSION["id_user"]; ?>" class="profil_info_link sous_menu_profil">Informations personnelles</a></li>

                            <!-- FACTURE -->
                            <li><a href="" class="profil_facture_link sous_menu_profil">Factures</a></li>
                        </ul>
                    </div>

                    <!-- MENU ADMIN -->
                    <div class="listeAdmin list_sous_menu">
                        <ul class="filtre">

                            <!-- ADMIN - Accueil -->
                            <li><a href="http://localhost/event_luxury/views/admin/admin_accueil.php" class="admin_accueil_link sous_menu_admin linkActive">Accueil</a></li>

                            <!-- ADMIN - Liste des catégories -->
                            <li><a href="http://localhost/event_luxury/views/admin/admin_list_categorie.php" class="admin_categorie_link sous_menu_admin">Catégories</a></li>

                            <!-- ADMIN - La liste des évènements  -->
                            <li><a href="http://localhost/event_luxury/views/admin/admin_list_event.php" class="admin_event_link sous_menu_admin">événements</a></li>

                            <!-- ADMIN - Liste des utilisateurs -->
                            <li><a href="http://localhost/event_luxury/views/admin/admin_list_user.php" class="admin_user_link sous_menu_admin">utilisateurs</a></li>
                        </ul>
                    </div>

                    <!-- MENU CLIENT -->
                    <div class="listeClient hidden list_sous_menu">
                        <ul class="filtre">

                            <!-- CLIENT - Accueil -->
                            <li><a href="http://localhost/event_luxury/views/accueil_client" class="client_accueil_link sous_menu_client">Accueil</a></li>

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

            <!-- S'incrire  -->
            <a href="http://localhost/event_luxury/views/inscription">Inscription</a>

            <!-- Se connecter  -->
            <a href="http://localhost/event_luxury/views/connexion">Connexion</a>

            <!-- Réservations  -->
            <a href="http://localhost/event_luxury/views/connexion" data-bs-toggle="modal" data-bs-target="#exampleModal">Réservations</a>

        </div>

    </nav>

<?php } ?>
