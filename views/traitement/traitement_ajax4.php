<?php
   
    // $listEvent = Event::findAllEvent();
    $currentDate = date('Y-m-d H:i:s'); // Date actuelle au format SQL (YYYY-MM-DD HH:MM:SS)

    $tab = [];
$tab['contenu'] = '';

// Obtenir le chemin absolu vers le dossier img

$tab['contenu'] .= 
    '<!-- TABLEAU - LISTE DES EVENTS -->
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


            <!-- MODULE 1 -->
            <tr class="table_module">
                <td>
                    <div class="table_img">
                        <img src="../asset/img/user_emma.jpg" alt="">
                    </div>
                </td>
                <td class="table_titre table_nom">lopez</td>
                <td class="table_category table_penom">emma</td>
                <td class="table_email">emma@mail.com</td>
                <td class="table_pseudo">emma1</td>
                <td class="table_action"><a href="">modifier</a></td>
                <td class="table_action"><a href="">supprimer</a></td>
                <!-- bouton -->
                <td>
                    <p class="table_btn">
                        <a href="" id="table_btnTxt">Consulter</a>
                    </p>
                </td>
            </tr>


        </tbody>
    </table>';

$tab['contenu'] .= '</table>';
echo json_encode($tab);

?>