<?php
include_once "./inc/header.php";
include_once "./inc/nav_vert_espace_admin.php";
require_once "../models/userModel.php";

if (isset($_GET['id_user_update'])) {
    // identifiant de l'emprunt
    $id = $_GET['id_user_update'];
    // appel de la methode returnBook
    $userProfil = User::getUserById($id);
}


// -------------- SECURITE ACCES CLIENT & ADMIN -------------- //
if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "admin") {

?>


<!-- -------------------- PAGE PROFIL USER - début -------------------- -->
<main class="profil_container">

    <p class="profilRole">rôle admin / client</p>
    <hr>
    <div class="profilUser">
        <div class="imgProfil">
            <img src="http://localhost/event_luxury/views/asset/img_event/<?= $userProfil["img_profil"]; ?>" alt="photo profil utilisateur">
        </div>
        <div class="profilForm">
            <h1>Informations personnelles</h1>
            <p>profil utilisateur</p>
            
            <!-- FORMULAIRE - PROFIL USER -->
            <form id="userProfil" class="userForm" action="./traitement/action.php" method="post">

                <div class="user_form">
                    <label id="nom">Nom</label>
                    <input type="text" name="nom" value="<?= !empty($userProfil) ? $userProfil["nom"] : "" ?>" disabled>
                </div>

                <div class="user_form">
                    <label id="prenom">Prénom</label>
                    <input type="text" name="prenom" value="<?= !empty($userProfil) ? $userProfil["prenom"] : "" ?>" disabled>
                </div>

                <div class="user_form">
                    <label id="pseudo">Pseudo</label>
                    <input type="text" name="pseudo" value="<?= $userProfil["pseudo"] ?>" disabled>
                </div>

                <div class="user_form">
                    <label id="email">Email</label>
                    <input type="email" name="email" value="<?= !empty($userProfil) ? $userProfil["email"] : "" ?>" disabled>
                </div>

                <!-- BOUTON DE VALIDATION RESERVATION -->
                <div class="btn_flex btn_profil">
                    
                    <!-- Retour à la liste -->
                    <button onclick="window.location.href='./admin/admin_list_user.php'" type="button" class="btnEvent btnEvent-3" >Retour à la liste</button>

                </div>
            </form>
        </div>
    </div>
</main>
<footer>

</footer>
<!-- -------------- BALISE SCRIPT -------------- -->
    <!-- Changement attérir sur l'espace client de la nav -->
    <script src="../asset/js/espace_admin/nav_espace_admin_user.js"></script>
    <!-- Espace navigation -->
    <script src="../asset/js/espace_navigation.js"></script>

    <!-- Changement d'état au scroll -->
    <script src="../asset/js/nav_scroll2.js"></script>

<!-- -------------- SUITE SECURITE ACCES -------------- -->
<?php } else {
    require_once "./inc/securite.php";
}
?>

</body>

</html>