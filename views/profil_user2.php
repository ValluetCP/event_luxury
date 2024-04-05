<?php
include_once "./inc/header.php";
include_once "./inc/navigation.php";
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

    <!-- <div class="filAriane">
                <a href="./admin/admin_list_user.php">Liste des utilisateurs > </a>
                <a href="">Profil utilisateur </a>
            </div> -->
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
                    <input type="text" name="nom" value="<?= !empty($userProfil) ? $userProfil["nom"] : "" ?>">
                </div>

                <div class="user_form">
                    <label id="prenom">Prénom</label>
                    <input type="text" name="prenom" value="<?= !empty($userProfil) ? $userProfil["prenom"] : "" ?>">
                </div>

                <div class="user_form">
                    <label id="pseudo">Pseudo</label>
                    <input type="text" name="pseudo" value="<?= $userProfil["pseudo"] ?>">
                </div>

                <div class="user_form">
                    <label id="email">Email</label>
                    <input type="email" name="email" value="<?= !empty($userProfil) ? $userProfil["email"] : "" ?>">
                </div>

                <!-- BOUTON DE VALIDATION RESERVATION -->
                <div class="btn_flex btn_profil">
                    <!-- <button type="button" class="reserve  btnEvent btnEvent-3">Réserver</button> -->
                    <button onclick="window.location.href='./update_profil.php'" type="button" class="btnEvent btnEvent-3">modifier</button>
                </div>
            </form>
        </div>
    </div>
    <div class="profilHistorique">
        <h2>Liste des réservations</h2>
        <p class="ss_titre_historique">En cours & passée</p>
        <table class="table_profil">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Catégorie</th>
                    <th>Nombre de place</th>
                    <th>Date de réservation</th>
                    <th>Date de l'événement</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="table_titre">calamard gourmand</td>
                    <td class="table_category">gastronomie</td>
                    <td>2</td>
                    <td>18-09-2023</td>
                    <td>20-09-2023</td>
                </tr>
                <tr>
                    <td class="table_titre">pink flamingo</td>
                    <td class="table_category">atelier</td>
                    <td>3</td>
                    <td>18-09-2023</td>
                    <td>20-09-2023</td>
                </tr>
            </tbody>
        </table>
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