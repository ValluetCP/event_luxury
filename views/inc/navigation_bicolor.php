<?php
if(!empty($_SESSION["user_role"])) {
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
            <a href="http://localhost/event_luxury/views/connexion" id="btnHomeConnxion"class="modal_btn btn_modal_1_trait">Je me connecte</a>
            <a href="http://localhost/event_luxury/views/inscription" id="btnHomeInscription"class="modal_btn btn_modal_2_fond">Je m'inscris</a>
        </div>
    </div>
</div>


<!-- --------------------------- ADMIN - rôle --------------------------- -->

<?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == "admin"){
    
    // ---- ESPACE ADMIN (espace navigation)---- //
    // include_once "../inc/espace_nav_admin.php"; 
    // include_once "http://localhost/event_luxury/views/inc/espace_nav_admin.php";
    include_once __DIR__ . "/espace_nav_admin.php";
      


// --------------------------- CLIENT - rôle --------------------------- //
    
} elseif(isset($_SESSION['user_role']) && $_SESSION['user_role'] == "client"){

    // ---- ESPACE CLIENT(espace navigation) ---- //
    include_once __DIR__ . "/espace_nav_client.php"; 

// --------------------------- ANONYME - sans connection --------------------------- //

} else { ?>

    <nav class="nav_home_page nav_home_page_noConnect">

        <!-- -------------------- ACCUEIL - sans connection -------------------- -->

        <!-- <a href="http://localhost/event_luxury/views/home">Accueil</a> -->


        <!-- BARRE DE NAVIGATION - début -->
        <div class="nav_logo">
            <img class="logo logo_vert_clair" src="http://localhost/event_luxury/views/asset/img/img_logo/logo_vert_clair.svg" alt="logo">
            <!-- <img class="logo logo_vert_fonce" src="./img/img_logo/logo_vert_fonce.svg" alt=""> -->
        </div>
        
        <div class="navigation hp_navigation">
            
            
            <!-- Bonjour -->
            <?php if(!empty($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') { ?>                 
                <h1>Bonjour admin<?= ucfirst($_SESSION['user_pseudo']); ?> </h1>
                <?php } elseif(!empty($_SESSION['user_role']) && $_SESSION['user_role'] == 'client') { ?>
                    <h1>Bonjour client<?= ucfirst($_SESSION['user_pseudo']); ?> </h1>
            <?php } else { ?>
                <!-- <h1>Bonjour</h1> -->
            <?php } ?>


            <!-- NAVIGATION -->
            <div id="commande_navigation_home" class="commande_navigation_header">

                <!-- S'incrire  -->
                <a class="inscriptionLink" href="http://localhost/event_luxury/views/inscription"><p>Inscription</p></a>
    
                <!-- Se connecter  -->
                <a class="connexionLink" href="http://localhost/event_luxury/views/connexion"><p>Connexion</p></a>
    
                <!-- Réservations  -->
                <a href="#modalInscription" class="btn_reservation"><p>Réservation</p></a>
            </div>
        </div>  

    </nav>

<?php } ?>
