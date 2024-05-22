<?php
include_once "./inc/header.php";
include_once "./inc/nav_vert_espace_profil.php";
require_once "../models/userModel.php";
// // $_SESSION["user_role"] = $user["role"];
// $user["role"] = $_SESSION["user_role"];


// -------------- SECURITE ACCES CLIENT & ADMIN -------------- //
if ((isset($_SESSION['user_role']) && $_SESSION['user_role'] == "admin") ||
    (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "client")
) {

?>
<!-- ---------------------------- MODAL INFO PERSO ----------------------------- -->
<div id="modalInfoPerso">
      <div class="modal_content">
          <a class="modal_close" href="#"><img class="img_croix_popup" src="./asset/img/croix_close.svg" alt=""></a>
          <!-- <a class="modal-closeInfoPerso" href="#"><i class="fa fa-times" aria-hidden="true"></i></a> -->
          <div class="modalTexte">
              <h2 class="modalTitre">Annulation</h2>
              <hr class="modalTrait">
              <p>En cliquant sur le bouton "quitter cette page", ces informations ne seront pas enregistrées et vos modifications ne seront pas prises en comptes.</p>
          </div>
          <div class="ModalBtnGroup">
              <a href="" id="iu_btnInfoPersoRevenir"class="modal_btn btn_modal_1_trait">Revenir sur la page</a>
              <a href="http://localhost/event_luxury/views/profil.php" id="iu_btnInfoPersoQuitter"class="modal_btn btn_modal_2_fond">Quitter cette page</a>
          </div>
      </div>
    </div>


<!-- -------------------- PAGE PROFIL USER - début -------------------- -->
<main class="profil_container">

<!-- <div class="filAriane">
    <a href="./admin/admin_list_user.php">Liste des utilisateurs ></a>
    <a href="">Profil utilisateur </a>
</div> -->
<p class="profilRole">rôle admin / client</p>
<hr>
<div class="profilUser">
    <div class="imgProfil">
        <img src="http://localhost/event_luxury/views/asset/img_event/<?= $_SESSION["user_img_profil"]; ?>" alt="photo profil utilisateur">
    </div>
    <div class="profilForm">
        <h1>Informations personnelles</h1>
        <p>profil utilisateur</p>
        <!-- FORMULAIRE - PROFIL USER -->
        <form id="userProfil" class="userForm" action="./traitement/action.php" method="post">
            
            <div class="user_form">
                <label id="nom">Nom</label>
                <input type="text"  name="nom" value="<?= $_SESSION["user_name"] ?>"> 
            </div>
            
            <div class="user_form">
                <label id="prenom">Prénom</label>
                <input type="text"  name="prenom" value="<?= $_SESSION["user_firstName"] ?>">
            </div>
            
            <div class="user_form">
                <label id="pseudo">Pseudo</label>
                <input type="text" name="pseudo" value="<?= $_SESSION["user_pseudo"] ?>">
            </div>
            
            <div class="user_form">
                <label id="email">Email</label>
                <input type="email" class="form-control"  name="email" value="<?= $_SESSION["user_email"] ?>">
            </div>

            <!-- BOUTON DE VALIDATION RESERVATION -->
            <div class="btn_flex btn_profil">

                <!-- Valider -->
                <button type="submit" name="update_user" class="btnEvent btnEvent-3">Valider</button>
                
                <!-- Annuler -->
                <button onclick="window.location.href='#modalInfoPerso'" type="button" name="add_panier" class="btnEvent btnEvent-3" id="add_reservation">Annuler</button>
            </div>
        </form>
    </div>
</div>
</main>
<footer>

</footer>

<!-- Changement attérir sur l'espace client de la nav -->
<script src="./asset/js/nav_espace_profil.js"></script>

<!-- Changement d'état au scroll -->
<!-- <script src="./asset/js/nav_scroll2.js"></script> -->

<!-- Espace navigation -->
<script src="./asset/js/espace_navigation.js"></script>

</script>



    <!-- -------------- SUITE SECURITE ACCES -------------- -->
    <?php } else {
        require_once "./inc/securite.php";
    }
    ?>

<!-- -------------- FOOTER -------------- -->
<?php
    include_once "./inc/footer.php";
?>