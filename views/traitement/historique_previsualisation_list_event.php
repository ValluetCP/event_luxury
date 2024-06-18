<?php
    require_once "../../models/eventModel.php";
    $listEvent = Event::findAllEvent();
    $currentDate = date('Y-m-d H:i:s'); // Date actuelle au format SQL (YYYY-MM-DD HH:MM:SS)

    $tab = [];
    $tab['contenu'] = '';
    $tab['contenu'] .= '<table style="width: 100%; border-collapse: collapse; margin-top: 35px; border: 1px solid black;" border="1">';
    foreach ($listEvent as $event) {
        // Correction ici : comparer avec $nom au lieu de $tabs
        if ($event['date_event'] <= $currentDate) {
           
            $tab['contenu'] .= '<tr>';
            
            $tab['contenu'] .= '</tr>';
            
            $tab['contenu'] .= 
            '<!-- MODULE BOUCLE -->
            <div class="module_listEvent" onclick="window.location.href=\'./evenement2.php?id_event='.$event['id_evenement'].'\'">

                <!-- MODULE - partie gauche - image -->
                <div class="img_listEvent">
                    <img src="../asset/img/'. $event['image'].'" alt="">
                </div>

                <!-- MODULE - partie centrale - texte -->
                <div class="center_txt_listEvent">
                    <div class="txt_container_listEvent">
                    
                        <!-- numéro -->
                        <div class="num_listEvent">'. $event['id_evenement'].'</div>
                        <div class="txt_listEvent">
                            <div class="titre_listEvent">'.$event['titre'].'</div>

                            <!-- date / category -->
                            <div class="ss_titre_listEvent">
                                <div class="category">'. $event['categorie_name'].'</div>
                                <div class="date">'. date('d-m-Y', strtotime($event['date_event'])).'</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- MODULE - partie droite - tarif & état -->
                <div class="tarif_etat_listEvent">
                    <div class="tarif_listEvent">Tarif: '. $event['prix'].'€</div>

                    <!-- Etat -->';
                    if(!empty($_SESSION['id_user'])){

                        
                        if(in_array($event['id_evenement'], $userReservationIds) && $event['events_actif'] == 1 && ($totalPlacesReservees >= $event['nbr_place'])){

                            $tab['contenu'] .=
                            '<div class="etat_listEvent">Réservé & Complet</div>

                        <!-- Réservé -->';
                        } elseif(in_array($event['id_evenement'], $userReservationIds) && $event['events_actif'] == 1){

                            $tab['contenu'] .=
                            '<div class="etat_listEvent">Réservé</div>

                        <!-- Complet -->';   
                        } elseif($totalPlacesReservees >= $event['nbr_place']) {

                            $tab['contenu'] .=
                            '<div class="etat_listEvent">Complet</div>

                        <!-- Annulation -->';
                        } elseif($event['events_actif'] == 0){

                            $tab['contenu'] .=
                            '<div class="etat_listEvent">Annulation</div>

                        <!-- Rien -->';
                        }else{
                            
                        } 
                    }
                '</div>

            </div>';



        }



        
        
    }
    $tab['contenu'] .= '</table>';
    echo json_encode($tab);
?>