<?php
    require_once "../../models/eventModel.php";
    $listEvent = Event::findAllEvent();
    $currentDate = date('Y-m-d H:i:s'); // Date actuelle au format SQL (YYYY-MM-DD HH:MM:SS)

    $tab = [];
    $tab['contenu'] = '';
    $tab['contenu'] .= 
    
    '<!-- Div vide pour afficher le contenu -->
    <div id="resultat" class="overflow_listEvent"> 

        <!-- TABLEAU - LISTE DES EVENTS -->
        <table class="tableau_adminListEvent">
            <thead class="thead_adminListEvent">
                <tr>
                    <th class="table_img_none"></th>
                    <th>Titre</th>
                    <th class="table_category_none">Catégorie</th>
                    <th class="table_date">Date</th>
                    <th colspan="4">Action</th>
                </tr>
            </thead>
            <tbody id="tbody_adminListEvent" class="tbody_adminList">';


            foreach ($listEvent as $event) {
                // Correction ici : comparer avec $nom au lieu de $tabs
                if ($event['date_event'] <= $currentDate) {
                
                    $tab['contenu'] .= 
                    '<tr class="table_module">
                        <!-- Image -->
                        <td class="table_img_none">
                            <div class="table_img">
                                <img src="../asset/img/'.$event['image'].'" alt="">
                            </div>
                        </td>
                        
                        <!-- Nom -->
                        <td class="table_titre">'.$event['titre'].'</td>

                        <!-- Catégorie -->
                        <td class="table_category table_category_none">'. $event['categorie_name'].'</td>

                        <!-- Date -->
                        <td class="table_date">'. date('d-m-Y', strtotime($event['date_event'])).'</td>
                        
                        <!-- Action -->';
                        if ($event['events_actif'] == 1){

                            $tab['contenu'] .= 
                            '<!-- Visualiser / Consulter -->
                            <td class="table_action"><a href="./admin_evenement.php?event='. $event['id_evenement'].'">Consulter</a></td>

                            <!-- Annuler -->
                            <td class="table_action"><a href="../traitement/action.php?id_event_desactive='. $event['id_evenement'].'">Annuler</a></td>
                            
                            <!-- Supprimer -->
                            <td><a href="../traitement/action.php?id_event_delete='. $event['id_evenement'].'">Supprimer</a></td>

                            <!-- bouton - Modifier -->
                            <td>
                                <p class="table_btn">
                                    <a href="./admin_add_evenement.php?id_event_update='. $event['id_evenement'].'" id="table_btnTxt">Modifier</a>
                                </p>
                            </td>

                            <td></td>

                        <!-- Message - Evénement annulé -->';
                        }elseif($event['events_actif'] == 0){

                            $tab['contenu'] .= 
                            '<!-- bouton - Activer l\'événement -->
                            <td colspan="3">
                                <a href="../traitement/action.php?id_event_active='. $event['id_evenement'].'">Activer l\'évènement</a>
                            </td>

                            <!-- message état -->
                            <td>annulation</td>';
                        }
                    
                    $tab['contenu'] .= '</tr>';
                }
                
            }
    $tab['contenu'] .= '</table>';
    echo json_encode($tab);
?>