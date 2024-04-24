<?php
include_once "./inc/header.php";
include_once "./inc/navigation_vert.php";
require_once "../models/userModel.php";
// // $_SESSION["user_role"] = $user["role"];
// $user["role"] = $_SESSION["user_role"];
$userList = User::findAllUser();


// -------------- SECURITE ACCES CLIENT & ADMIN -------------- //
if ((isset($_SESSION['user_role']) && $_SESSION['user_role'] == "admin") ||
    (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "client")
) {
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
                    <img src="http://localhost/event_luxury/views/asset/img_event/<?= $_SESSION["user_img_profil"]; ?>" alt="photo profil utilisateur">
                </div>
                <div class="profilForm">
                    <h1>Informations personnelles</h1>
                    <p>profil utilisateur</p>
                    <!-- FORMULAIRE - PROFIL USER -->
                    <form id="userProfil" class="userForm" action="./traitement/action.php" method="post">
                        
                        <div class="user_form">
                            <label id="nom">Nom</label>
                            <input type="text"  name="nom" value="<?= $_SESSION["user_name"] ?>" disabled >
                        </div>
                        
                        <div class="user_form">
                            <label id="prenom">Prénom</label>
                            <input type="text"  name="prenom" value="<?= $_SESSION["user_firstName"] ?>" disabled>
                        </div>
                        
                        <div class="user_form">
                            <label id="pseudo">Pseudo</label>
                            <input type="text"  name="pseudo" value="<?= $_SESSION["user_pseudo"] ?>"  disabled>
                        </div>
                        
                        <div class="user_form">
                            <label id="email">Email</label>
                            <input type="email"  name="email" value="<?= $_SESSION["user_email"] ?>" disabled>
                        </div>
    
                        <!-- BOUTON DE VALIDATION RESERVATION -->
                        <div class="btn_flex btn_profil">
                            <!-- <button type="button" class="reserve  btnEvent btnEvent-3">Réserver</button> -->
                            <button onclick="window.location.href='./update_profil.php'" type="button" class="btnEvent btnEvent-3">modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <footer>

        </footer>
        <script src="./js/nav_scroll2.js"></script>
        <script>
            function showList(listClassName){
                var allLists = document.querySelectorAll('.nav2_container div:not(.nav2_menu,.deconnexion,.profil_nav,.img_profil_nav)');
                allLists.forEach(function(list) {
                    list.classList.add('hidden');
                });
        
                // Afficher la liste correspondante
                var selectedList = document.querySelector('.' + listClassName);
                selectedList.classList.remove('hidden');
            }
        </script>



        <!-- -------------- SUITE SECURITE ACCES -------------- -->
        <?php } else {
            require_once "./inc/securite.php";
        }
        ?>
    </body>
</html>