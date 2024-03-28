<?php
include_once "./inc/header.php";
include_once "./inc/navigation.php";
?>
    <header>
        <div class="hp_bg">
            <div class="hp_bg_img" style="background-image: url(./asset/img/header2.JPG);">
            </div>
        </div>
        <div class="logo_header">
            <img src="./asset/img/img_logo/logo_big.svg" alt="" class="logo_header_big">
        </div>
        <div class="hp_header_img1">
            <img src="./asset/img/calamar.JPG" alt="">
        </div>
        <div class="hp_header_img2">
            <img src="./asset/img/crabe_header2.JPG" alt="">
        </div>
        <div class="hp_header_img3">
            <img src="./asset/img/pasteque_header2.JPG" alt="">
        </div>
    </header>

    <main>
        <!-- SECTION "retrouvez tous nos événements" -->
        <!-- TITRE -->
        <h1 class="hp_titre">
            <p class="hp_titre1">Retrouvez</p>
            <p class="hp_titre2">tous nos<br>événements</p>
        </h1>

        <!-- Liste des événements -->
        <div id="hp_container" class="lb_container">
            <!-- EMMET -->
            <!-- lb pour désigner la page 'liste reservation' -->
    
            <!-- .lb_event>.lb_imageEvent>img^.lb_eventContainer>.lb_numeroEvent+.lb_text>lb_titre+lb_category+lb_date+lb_prix^^.lb_etat -->

            <div class="lb_event">
              <!-- image en backgound -->
              <div class="le_imageEvent"></div>
    
              <!-- texte -->
              <div class="lb_eventContainer">
                <div class="lb_numeroEvent">01</div>
                <div class="lb_text">
                  <div class="lb_titre le_titre">Calamar gourmand</div>
                  <div class="lb_categoryDate">
                    <div class="lb_category">Atelier</div>
                    <div class="lb_date">29-05-2024</div>
                  </div>
                </div>
              </div>
              <div class="le_tarif_etat">
                <p class="le_tarif">Tarif: 75€</p>
                <p class="le_etat">Complet</p>
              </div>
            </div>
            <div class="lb_event">
              <!-- image en backgound -->
              <div class="le_imageEvent"></div>
    
              <!-- texte -->
              <div class="lb_eventContainer">
                <div class="lb_numeroEvent">01</div>
                <div class="lb_text">
                  <div class="lb_titre le_titre">Coconut milk</div>
                  <div class="lb_categoryDate">
                    <div class="lb_category">Atelier</div>
                    <div class="lb_date">29-05-2024</div>
                  </div>
                </div>
              </div>
              <div class="le_tarif_etat">
                <p class="le_tarif">Tarif: 75€</p>
                <p class="le_etat">Complet</p>
              </div>
            </div>
          </div>

    </main>
    <script src="./asset/js/nav_scroll.js"></script>
    <!-- <script src="./asset/js/espace_navigation.js"></script> -->
</body>
</html>