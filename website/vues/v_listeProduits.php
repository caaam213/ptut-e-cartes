<?php require_once(CHEMIN_VUES.'header.php');?>
<link rel="stylesheet" href="<?= CHEMIN_CSS ?>style.css">
</head>

<script>
  function sendsuppr_prod(id)
  {
    let lien = 'index.php?page=listeProduits&id='
    let lienfinal = lien + id ;
    document.getElementById("suppr_button_modale").setAttribute("href", lienfinal) ;
  }
</script>

<body>
         
  <!-- Tout le contenu de la page est placé dans un div "container" afin de faciliter le responsive Bootstrap-->
  <div class="container">

    <?php $affichageStatistique = 'non' ?>
    <?php require_once(CHEMIN_VUES.'header_GestionCuisine.php'); ?>

      <!-- Div contenant les boutons de création de nouveaux produits et de nouvelles boissons --> 
      <div class="row justify-content-center col-12 m-0">
        <button onclick="window.location.href='index.php?page=ajoutProduits'" class="btn classicButton  mr-0 col-lg-5 col-11 my-3">Créer un nouveau produit ⊕ </button>
      </div>
      
      <!-- Titre page -->
      <div class="row justify-content-center col-12 mt-3 m-0">
        <p style="font-size: 1.4em;">Liste des produits</p>
      </div>

      <div  id="lol" class="mt-2 mb-4 row col-12 justify-content-center">
          <a href="index.php?page=gestionRestaurant" class="btn classicButton blueButton col-4 text-center m-lg-0 my-2">
                ← Retour à l'interface de gestion
          </a>
		  </div>


      <!-- AFFICHAGE DES PRODUITS -->
    
      <?php

        if($listeProduits!=null)
        {

        

        foreach($listeProduits as $produit)
        {
          $lienImg = $produit->obtenir_image_produit() ;
          $lienImg2 = $produit->obtenir_image_produit2() ;
          $lienImg3 = $produit->obtenir_image_produit3() ;
        ?>
        <!-- Bloc représentant un produit -->
        <div class="container row justify-content-center blocProduit m-0 py-3 my-3">
            
            <!-- Première ligne pour le nom et la date de création -->
          <div class="row justify-content-between align-items-center col-11 m-0 p-0">
              <p style="font-size: 1.5em; font-weight: 450"><?= $produit->obtenir_nom_produit()?></p>
              <p style="font-size: 1.1em; color: gray;">Ajouté le : <?= $produit->obtenir_date_modif_produit() ; ?></p>
            </div>
            
            <!-- Deuxième ligne pour sous-divisée et trois, pour 1: les ingrédients, 2: les informations, et 3: le prix. (Divisée en trois pour pouvoir être placée les unes au dessus des autres en mode téléphone) -->
            <div class="row col-11 justify-content-around">
                <!-- Ingrédients -->
              <div class="col-md-4 col-11 m-md-0 mt-3 text-center">
                  <div class="d-flex flex-row justify-content-center align-items-start">
                      <img src="<?= CHEMIN_ICONES ?>food.png" class="d-block" style="width: 30px; height: 30px;">
                      <p class="titreBlocProduit ml-1">Ingrédients</p>
                      
                  </div>
                  <ul class="d-flex flex-column flex-justify-content-center align-items-start">
                      <?php 
                          $listeIngredients = $modele_produit->obtenirListeIngredient($produit->obtenir_id_produit());
                          if($listeIngredients!=null)
                          {
                              foreach($listeIngredients as $unIngredient)
                              {
                                  
                              ?>  
                                <?php echo '<li class="ml-5">'.$modele_ingredient->obtenir_un_ingredient($unIngredient)->obtenir_nom_ingredient().'</li>';?>
    
                              <?php  
                              }
                              
                          }
                          
                        ?>
                          
                      
                      
                      
                  </ul>

              </div>
                <!-- Informations -->
              <div class="col-md-4 col-11 m-md-0 mt-3 text-center">
                  <div class="d-flex flex-row justify-content-center align-items-start">
                      <img src="<?= CHEMIN_ICONES ?>critere.png" class="d-block" style="width: 30px; height: 30px;">
                      <p class="titreBlocProduit ml-1">Informations</p>
                  </div>

                  <ul class="d-flex flex-column flex-justify-content-center align-items-start">
                      <?php 
                          $listeCriteres = $modele_produit->obtenirListeCriteres($produit->obtenir_id_produit());
                          if($listeCriteres!=null)
                          {
                              foreach($listeCriteres as $unCritere)
                              {
                                  
                              ?>  
                                <?php echo '<li class="ml-5">'.$modele_critere->obtenir_un_critere($unCritere)->obtenir_nom_critere().'</li>';?>

                              <?php  
                              }
                              
                          }
                          else
                          {?>
                              <ul><li>Aucun critère précisé</li><li style="display:none;"></li></ul>
                          <?php
                          }
                          ?>
                      
                      
                      
                  </ul>

              </div>  
                <!-- Prix -->
              <div class="col-md-4 col-11 m-md-0 mt-3 text-center">
                  <div class="d-flex flex-row justify-content-center align-items-start">
                      <img src="<?= CHEMIN_ICONES ?>price.png" class="d-block" style="width: 30px; height: 30px;">
                      <p class="titreBlocProduit ml-1">Prix</p>
                  </div>
                  <p><?= $produit->obtenir_prix_produit() ; ?>€</p>
              </div> 
            </div>
            
            <!-- Troisième ligne pour le bouton afficher les photos -->
            <div class="row justify-content-center align-items-center col-11 m-0 p-0 my-2">
                <div class="d-flex flex-row justify-content-center align-items-center">
                      <img src="<?= CHEMIN_ICONES ?>photos.png" class="d-block mr-1" style="width: 30px; height: 30px;">
                      <a class=""style="color: #25b03a; font-weight: 450; text-decoration: underline; font-size: 1.2em;" data-toggle="modal" data-target="#photosModal">Afficher les photos</a>
                  </div>
            </div>
            <?php
            if ($lienImg == null && $lienImg2 == null && $lienImg3 == null) {
             ?>
            <div>
                <p> Il n'y a pas de photos pour ce produit</p>
            </div>
            <?php 
              }
              elseif ($lienImg != null && $lienImg2 == null && $lienImg3 == null ) {
            ?>
            <img class="mr-5 mt-3 mb-5" src="<?=CHEMIN_IMAGES_PRODUITS.$lienImg ?>" width="200px">
            <?php    
              }
              elseif ($lienImg != null && $lienImg2 != null && $lienImg3 == null ) {
                ?>
                <img class="mr-5 mt-3 mb-5" src="<?=CHEMIN_IMAGES_PRODUITS.$lienImg ?>" width="200px">
                <img class="mr-5 mt-3 mb-5" src="<?=CHEMIN_IMAGES_PRODUITS.$lienImg2 ?>" width="200px">
              <?php
              }
              elseif ($lienImg != null && $lienImg2 != null && $lienImg3 != null ) {
              ?>
                <img class="mr-5 mt-3 mb-5" src="<?=CHEMIN_IMAGES_PRODUITS.$lienImg ?>" width="200px">
                <img class="mr-5 mt-3 mb-5" src="<?=CHEMIN_IMAGES_PRODUITS.$lienImg2 ?>" width="200px">
                <img class="mr-5 mt-3 mb-5" src="<?=CHEMIN_IMAGES_PRODUITS.$lienImg3 ?>" width="200px">
              <?php
              }
             ?>
            
            
            <!-- Quatrième ligne pour les boutons modifier et supprimer -->
            <div class="row justify-content-md-end justify-content-center align-items-center col-11 m-0 p-0 mt-2">
              <button onclick="sendsuppr_prod(<?= $produit->obtenir_id_produit(); ?>)"class="btn produitButton produitDeleteButton mr-3" data-toggle="modal" data-target="#confirmationModal">Supprimer</button>
              <button onclick="window.location.href='index.php?page=modificationProduits&id=<?= $produit->obtenir_id_produit(); ?>'" class="btn produitButton">Modifier</button>
            </div>
        </div>
        <!-- Fin du bloc produit -->
        <?php
        }
        }
        else
        {
          ?>
          <div class="alert alert-secondary mt-2 w-50 mx-auto row py-2" role="alert">
            <span class="text-center col-12">Pas d'ingrédients dans la liste</span>
          </div>
        <?php
        }
        ?>
        
    </div>
    
    

    <!-- Bloc représentant la fenêtre modale pour les photos : à compléter lorsque la fonctionnalité des photos sera en place -->
      <div class="modal fade" id="photosModal" tabindex="-1" role="dialog" aria-labelledby="photosLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="photosLabel">Photos - Nom du plat</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              AFFICHAGE DES PHOTOS POUR LE PLAT SELECTIONNÉ
                <img src="images/Images/logo.png">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            </div>
          </div>
        </div>
      </div>
    
    <!-- Bloc représentant la fenêtre modale de confirmation lors de la suppression d'un produit -->
  <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmationLabel">Suppression du produit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Êtes-vous sûr de vouloir supprimer ce produit ? Cette action est irréversible.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
          <a id="suppr_button_modale" href=""><button type="button" class="btn btn-danger">Supprimer</button></a>
        </div>
      </div>
    </div>
  </div>
  
</body>
</html>