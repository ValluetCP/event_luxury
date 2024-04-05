<?php
include_once "./inc/header.php";
include_once "./inc/navigation_vert.php";
require_once "../models/userModel.php";

if (isset($_GET['id_user_update'])) {
    // identifiant de l'emprunt
    $id = $_GET['id_user_update'];
    // appel de la methode returnBook
    $userProfil = User::getUserById($id);
}

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
<script src="./js/nav_scroll2.js"></script>
<script>
    function showList(listClassName) {
        var allLists = document.querySelectorAll('.nav2_container div:not(.nav2_menu,.deconnexion,.profil_nav,.img_profil_nav)');
        allLists.forEach(function(list) {
            list.classList.add('hidden');
        });

        // Afficher la liste correspondante
        var selectedList = document.querySelector('.' + listClassName);
        selectedList.classList.remove('hidden');
    }
</script>
</body>

</html>