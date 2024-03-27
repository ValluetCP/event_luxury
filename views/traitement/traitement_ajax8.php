<?php
    require_once "../../models/eventModel.php";
    $listEvent = Event::findAllEvent();
    $currentDate = date('Y-m-d H:i:s'); // Date actuelle au format SQL (YYYY-MM-DD HH:MM:SS)

    $tab = [];
    $tab['contenu'] = '';
    
    foreach ($listEvent as $event) {
        // Correction ici : comparer avec $nom au lieu de $tabs
        if ($event['date_event'] <= $currentDate) {

            if(!empty($_SESSION['id_user'])){

                if(in_array($event['id_evenement'], $userReservationIds) && $event['events_actif'] == 1){ 
           
                    $tab['contenu'] .= '<tr>';
                    
                    $tab['contenu'] .= '</tr>';
                    
                    $tab['contenu'] .= 

                    '<!-- MODULE BOUCLE -->
                    <div class="module_listEvent">

                        <!-- MODULE - partie gauche - image -->
                        <div class="img_listEvent">
                            <img src="./asset/img/'. $event['image'].'" alt="">
                        </div>

                        <!-- MODULE - partie centrale - texte -->
                        <div class="center_txt_listEvent">
                            <div class="txt_container_listEvent">
                            
                                <!-- numéro -->
                                <div class="num_listEvent">03</div>
                                <div class="txt_listEvent">
                                    <div class="titre_listEvent"><a href="./evenement.php?event='.$event['id_evenement'].'">'.$event['titre'].'</a></div>

                                    <!-- date / category -->
                                    <div class="ss_titre_listEvent">
                                        <div class="category">'. $event['categorie_name'].'</div>
                                        <div class="date">'. date('d-m-Y', strtotime($event['date_event'])).'</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
                }
            }
        }



        
        
    }
    
    echo json_encode($tab);
?>