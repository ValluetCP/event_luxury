<?php
   
    // $listEvent = Event::findAllEvent();
    $currentDate = date('Y-m-d H:i:s'); // Date actuelle au format SQL (YYYY-MM-DD HH:MM:SS)

    $tab = [];
$tab['contenu'] = '';

// Obtenir le chemin absolu vers le dossier img
$img_path = "http://localhost/event-css/asset/img/";

$tab['contenu'] .= 
    '<div class="lb_event">

        <!-- image en backgound -->
        <div class="lb_imageEvent">
            <img src="./asset/img/event_flamant.jpg" alt="">
        </div>

        <!-- texte -->
        <div class="lb_eventContainer">
            <div class="lb_numeroEvent">01</div>
            <div class="lb_text">
            <div class="lb_titre">Pink Flamingo</div>
                <div class="lb_categoryDate">
                    <div class="lb_category">Atelier</div>
                    <div class="lb_date">29-05-2024</div>
                </div>
            </div>
        </div>
        <div class="lb_reservation">
            <a href="#modalInfoPerso" class="lb_billet">Télécharger le billet</a>
            <a href="" class="lb_consulter">Consulter</a>
        </div>
    </div>';

$tab['contenu'] .= '</table>';
echo json_encode($tab);

?>