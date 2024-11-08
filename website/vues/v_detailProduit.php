<?php require_once(CHEMIN_VUES.'header.php'); ?>
<link href="<?= CHEMIN_CSS ?>style2.css" rel="stylesheet">
<link href="<?= CHEMIN_CSS ?>style.css" rel="stylesheet">
</head>

<body class="p-0 m-0" style="display: flex !important;flex-direction: column !important;min-height: 100vh !important;">
<main style="flex: 1 !important">
 
    <!-- Menu de navigation -->
    <div class="pb-5">
        <?php require_once(CHEMIN_VUES.'menu.php'); ?>
    </div>
    
    <div class="container">

        <?php 
            $lienImg = $produit->obtenir_image_produit() ; 
            $lienImg2 = $produit->obtenir_image_produit2() ; 
            $lienImg3 = $produit->obtenir_image_produit3() ; 
        ?>

        <!-- Div contenant le nom du produit --> 
        <div class="row justify-content-center col-12 m-md-0 pt-5">
            <p class="font-weight-bold p-0 m-0 text-center mt-3" style="font-size: 2.3em;"><?=$produit->obtenir_nom_produit(); ?></p>
        </div>

        <div  id="lol" class="my-4 row col-12 justify-content-center mx-auto">
            <div href="#" class="btn classicButton blueButton col-8 col-md-4 text-center m-lg-0 my-2" onclick="window.location.href = 'index.php?page=accueil'">
                    ← Retour à l'accueil
            </div>
        </div>

        <?php
            if ($lienImg == null && $lienImg2 == null && $lienImg3 == null) {
             ?>
            <div>
                <p class="text-center mt-5 mb-5" style="font-size: 1.3em;"> Il n'y a pas de photos pour ce produit</p>
            </div>
            <?php 
              }
              elseif ($lienImg != null && $lienImg2 == null && $lienImg3 == null ) {
            ?>
                <div class="row justify-content-center col-xl-9 col-lg-10 col-12 mt-4 m-0 mx-auto">
                    <img src="<?= CHEMIN_IMAGES_PRODUITS.$lienImg?>" class="d-block row col-12 p-0 imageProduit mb-3 m-0" style="height: auto; max-height: 420px; border-radius: 12px; object-fit: cover;">
                </div>
            <?php    
              }
              elseif ($lienImg != null && $lienImg2 != null && $lienImg3 == null ) {
                ?>
                    <div class="row justify-content-center col-xl-9 col-lg-10 col-12 mt-4 m-0 mx-auto">
                        <img src="<?= CHEMIN_IMAGES_PRODUITS.$lienImg?>" class="d-block row col-12 p-0 imageProduit mb-3 m-0" style="height: auto; max-height: 420px; border-radius: 12px; object-fit: cover;">
                
                        <div class="row d-flex justify-content-around align-items-center col-12 p-0">
                            <img src="<?=CHEMIN_IMAGES_PRODUITS.$lienImg2 ?>" class="d-block mx-1 imageProduit p-0" style="height: auto; width: 23%; border-radius: 12px; object-fit: cover;" >
                        </div>
                    </div>
              <?php
              }
              elseif ($lienImg != null && $lienImg2 != null && $lienImg3 != null ) {
              ?>
                <div class="row justify-content-center col-xl-9 col-lg-10 col-12 mt-4 m-0 mx-auto">
                    <img src="<?= CHEMIN_IMAGES_PRODUITS.$lienImg?>" class="d-block row col-12 p-0 imageProduit mb-3 m-0" style="height: auto; max-height: 420px; border-radius: 12px; object-fit: cover;">
            
                    <div class="row d-flex justify-content-around align-items-center col-12 p-0">
                        <img src="<?=CHEMIN_IMAGES_PRODUITS.$lienImg2 ?>" class="d-block mx-1 imageProduit p-0" style="height: auto; width: 23%; border-radius: 12px; object-fit: cover;" >
                        <img src="<?= CHEMIN_IMAGES_PRODUITS.$lienImg3 ?>" class="d-block mx-1 imageProduit p-0" style="height: auto; width: 23%; border-radius: 12px; object-fit: cover;" >
                    </div>
                </div>
              <?php
              }
             ?>

        <!-- Bloc représentant un produit -->
        <div class="row justify-content-center blocProduit m-0 py-3 mt-3 mb-5 mx-auto col-xl-9 col-lg-10 col-12">
            <!-- Première ligne pour sous-divisée en trois, pour 1: les ingrédients, 2: les informations, et 3: le prix. (Divisée en trois pour pouvoir être placée les unes au dessus des autres en mode téléphone) -->
            <div class="row col-11 justify-content-around">

                <!-- Ingrédients -->
                <div class="col-md-4 col-11 m-md-0 mt-3 text-center">
                    <div class="d-flex flex-row justify-content-center align-items-start">
                        <img src="<?=CHEMIN_ICONES ?>food.png" class="d-block" style="width: 30px; height: 30px;">
                        <p class="titreBlocProduit ml-1">Ingrédients</p>
                    </div>
                    

                    <ul class="d-flex flex-column flex-justify-content-center align-items-start">
                      <?php 
                          $listeIngredients = $modele_produit->obtenirListeIngredient($idProduit);
                          foreach($listeIngredients as $unIngredient)
                          {
                              
                          ?>  
                            <?php echo '<li class="ml-3">'.$modele_ingredient->obtenir_un_ingredient($unIngredient)->obtenir_nom_ingredient().'</li>';?>

                          <?php  
                          }
                          ?>    
                  </ul>
                </div>

                

                <!-- Informations -->
                <div class="col-md-4 col-11 m-md-0 mt-3 text-center">
                    <div class="d-flex flex-row justify-content-center align-items-start">
                        <img src="<?=CHEMIN_ICONES ?>critere.png" class="d-block" style="width: 30px; height: 30px;">
                        <p class="titreBlocProduit ml-1">Informations</p>
                    </div>
                    

                    <ul class="d-flex flex-column flex-justify-content-center align-items-start">
                      <?php 
                          $listeCriteres = $modele_produit->obtenirListeCriteres($produit->obtenir_id_produit());
                          foreach($listeCriteres as $unCritere)
                          {
                              
                          ?>  
                            <?php echo '<li class="ml-3">'.$modele_critere->obtenir_un_critere($unCritere)->obtenir_nom_critere().'</li>';?>

                          <?php  
                          }
                          ?>
                      
                      
                      
                  </ul>
                </div>  

                <!-- Prix -->
                <div class="col-md-4 col-11 m-md-0 mt-3 text-center">
                    <div class="d-flex flex-row justify-content-center align-items-start">
                        <img src="<?=CHEMIN_ICONES ?>price.png" class="d-block" style="width: 30px; height: 30px;">
                        <p class="titreBlocProduit ml-1">Prix</p>
                    </div>
                    <p><?= $produit->obtenir_prix_produit(); ?>€</p>
                </div> 

                <!-- Allergènes -->
                <?php 
                    if($produit->obtenir_allergene_produit() == 1)
                    {
                ?>
                        <div class=" m-md-0 mt-3 text-center">
                            <p class="text-danger">Ce plat comporte des allergènes !</p>
                        </div> 

                <?php
                    }
                ?>

            </div>
            
        </div>

    </div>
    
    <br>
    <br>


    <!-- Footer -->
    <div>
        <?php require_once(CHEMIN_VUES.'piedPage.php'); ?>
    </div>

</body>
</html>
