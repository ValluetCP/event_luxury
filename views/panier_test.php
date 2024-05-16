<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./asset/css/style.css">
</head>
<body>

    <div class="containerPagePanier">
        
        <div class="containerPanier">

            <div class="contenuPanier">
                <div class="sousTitrePanier">
                    <p>PANIER (2)</p>
                </div>
    
                <!-- AFFICHAGE LISTE PRODUIT -->
                <div class="listeProduit">
    
                    <!-- MODULE BOUCLE -->
                    <div class="produitPanier">
    
                        <!-- IMAGE -->
                        <div class="imgProduitPanier">
                            <img src="./asset/img/event_flamant.jpg" alt="image événement">
                        </div>
                        <!-- Titre + Supression article -->
                        <div class="titreSupprimer">
                            <div class="titreProduitPanier">
                                <p>Salon de l'automobile</p>
                            </div>
                            <div class="suppressionProduit">
                            <img src="./asset/img/coix_verte.svg" alt="icone pour supprimer">
                            </div>
                        </div>
    
                        <!-- Catégorie -->
                        <p class="categorieProduit">Divertissement</p>
    
                        <!-- Quantité + Prix -->
                        <div class="quantitePrixPanier">
                            <div class="quantitePanier">
                                <p>Quantité : 2</p>
                            </div>
                            <div class="prixPanier">
                                <p>Prix : 75€</p>
                            </div>
                        </div>
                    </div>
                    <!-- MODULE BOUCLE -->
                    <div class="produitPanier">
    
                        <!-- IMAGE -->
                        <div class="imgProduitPanier">
                            <img src="./asset/img/event_flamant.jpg" alt="image événement">
                        </div>
                        <!-- Titre + Supression article -->
                        <div class="titreSupprimer">
                            <div class="titreProduitPanier">
                                <p>Salon de l'automobile</p>
                            </div>
                            <div class="suppressionProduit">
                                <img src="./asset/img/coix_verte.svg" alt="icone pour supprimer">
                            </div>
                        </div>
    
                        <!-- Catégorie -->
                        <p class="categorieProduit">Divertissement</p>
    
                        <!-- Quantité + Prix -->
                        <div class="quantitePrixPanier">
                            <div class="quantitePanier">
                                <p>Quantité : 2</p>
                            </div>
                            <div class="prixPanier">
                                <p>Prix : 75€</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="titrePanier">
                <img src="./asset/img/img_logo/" alt="">
            </div>
        </div>

        <!-- NAVIGATION PANIER -->
        <div class="navPanier">
    
            <!-- LIENS -->
            <div class="lienPanier">
                <ul>
                    <li><a href="">listes événements</a></li>
                    <li><a href="">mes réservations</a></li>
                </ul>
            </div>
            <!-- VALIDER LA COMMANDE -->
            <div class="validerPanier">
                <div class="totalPrix">
                    <p>TOTAL <span class="total">115 EUR</span><br><span class="tva">*TVA COMPRISE</span></p>
                </div>
                
                <button type="submit" class="validerBtn" onclick="window.location.href='./st_book.php'">Valider</button>
            </div>
        </div>

    </div>

</body>
</html>