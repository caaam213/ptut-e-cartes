<?php require_once(CHEMIN_VUES.'header.php'); ?>

<link href="<?= CHEMIN_CSS ?>styleIndex.css" rel="stylesheet">
<link href="<?= CHEMIN_CSS ?>recherche_produit_view_style.css" rel="stylesheet">
<link href="<?= CHEMIN_CSS ?>style.css" rel="stylesheet">
</head>

<?php
    
    $nb_trouve = count($listeProduits);  //Compter le nombre de résultats
    $nb_division = 1;
    $divisionPar3=$nb_trouve%3;
    
?>
    
    <body style="display: flex !important;flex-direction: column !important;min-height: 100vh !important;">
    <main style="flex: 1 !important">
        <div class="p-0 m-0">

            <!-- Menu de navigation -->
            <?php require_once(CHEMIN_VUES.'menu.php'); ?>

            <header class="text-center h-100 headerAccueil">

              <form action="index.php?page=rechercheProduits" method="post">
                <?php require_once(CHEMIN_VUES.'formulaireRecherche.php'); ?>
              </form>
              

            </header>
   
            <div  id="lol" class="my-4 row col-8 justify-content-center mx-auto">
                <a href="index.php?page=accueil" class="btn classicButton blueButton col-4 text-center m-lg-0 my-2">
                     ← Retour à l'accueil
                </a>
		        </div>

            <div class="container"> 
                <?php 

                  if(isset($ajoutImpossible))
                  {
                    ?>
                    <div class="alert alert-danger mt-5">Le prix minimum ne doit pas être au dessus du prix maximum</div>
                    <a class="btn btn-success" href="index.php">Retour</a>
                  <?php
                  
                }
                else
                {
                    if($rien==false)
                    {?>
                        <div style="background-color: lightgray" class="mt-4 border rounded mx-auto row p-2">
                            <p class="font-italic mx-auto">Nombre de résultats de votre recherche : <?= count($listeProduits); ?></p>

                            <div class="col-12"></div>


                        </div>
                    <?php
                    }
                    else
                    {?>
                         <h1>Aucun résultat ne correspond à votre recherche...des suggestions ?</h1>
                            
                    <?php
                    }
                    ?>
                
                
            <div class="container">
                
                        
                        <!--alignement de 3-->
                        <?php 
                            foreach($listeProduits as $produit)
                            {

                              $lienImg = $produit->obtenir_image_produit() ;

                              if ($lienImg == null) {
                                $lienImg = "pasPhoto.jpg";
                              }
                              
                                if((($nb_trouve>=2)||($divisionPar3==0)))
                                {
                                    if($nb_division==1)
                                    {
                                    ?>
                                        <div class="d-lg-flex justify-content-between"> <!--Début uniquement-->
                                            <div class="card mt-5 mx-auto mx-lg-0 border shadow" style="width: 18rem;">
                                              <img src="images/Images/test.jpeg" class="card-img-top" alt="">
                                              <div class="card-body">
                                                <h5 class="card-title text-center"><?=$produit->obtenir_nom_produit()?></h5>
                                                <img class="ml-2 mt-3 mb-5 img-fluid rounded" src="<?=CHEMIN_IMAGES_PRODUITS.$lienImg ?>" width="200" height="200">
                                                <p class="card-text text-center">
                                                  <?=$produit->obtenir_prix_produit()?>€</p>
                                                <div class="card-body row ">
                                                    <a href="index.php?page=detailProduit&id=<?=$produit->obtenir_id_produit() ?>" style="color:cadetblue" class="btn btn-link col-12 ">Voir détails</a>
                                                    <div class="col-6"></div>
                                                    

                                                </div>
                                              </div>

                                            </div>

                                    <?php
                                        
                                        $nb_division++;
                                        
                                    }
                                    else if($nb_division==2) 
                                    {
                                        ?>
                                        <div class="card mt-5 mx-auto mx-lg-0 border shadow" style="width: 18rem;">
                                          <img src="images/Images/test.jpeg" class="card-img-top" alt="">
                                          <div class="card-body">
                                            <h5 class="card-title text-center "><?=$produit->obtenir_nom_produit()?></h5>
                                              <img class="ml-2 mt-3 mb-5 img-fluid rounded" src="<?=CHEMIN_IMAGES_PRODUITS.$lienImg ?>" width="200" height="200">
                                                <p class="card-text text-center">
                                                  <?=$produit->obtenir_prix_produit()?>€</p>
                                                <div class="card-body row ">
                                                    <a href="index.php?page=detailProduit&id=<?=$produit->obtenir_id_produit() ?>" style="color:cadetblue" class="btn btn-link col-12 ">Voir détails</a>
                                                    <div class="col-6"></div>
                                                    

                                            </div>
                                          </div>

                                        </div>

                                    <?php 
                                        $nb_division++;
                                    }
                                    else
                                    {
                                        ?>
                                        <div class="card mt-5 mx-auto mx-lg-0 border shadow" style="width: 18rem;">
                                          <img src="images/Images/test.jpeg" class="card-img-top" alt="">
                                          <div class="card-body">
                                            <h5 class="card-title text-center"><?=$produit->obtenir_nom_produit()?></h5>
                                            <img class="ml-2 mt-3 mb-5 img-fluid rounded" src="<?=CHEMIN_IMAGES_PRODUITS.$lienImg ?>" width="200" height="200">
                                                <p class="card-text text-center">
                                                  <?=$produit->obtenir_prix_produit()?>€</p>
                                                <div class="card-body row ">
                                                    <a href="index.php?page=detailProduit&id=<?=$produit->obtenir_id_produit() ?>" style="color:cadetblue" class="btn btn-link col-12 ">Voir détails</a>
                                                    <div class="col-6"></div>
                                                    
                                                    

                                            </div>
                                          </div>

                                        </div>



                                    </div> <!--Division de fin-->

                                    <?php
                                        $nb_division = 1;

                                    }
                                        
                                        

                            
                                }
                                else
                                {
                                    if($nb_trouve==2)
                                    {
                                        $nb_division = 1;
                                        ?>
                                        <div class="d-lg-flex justify-content-between"> <!--Début-->
                                            <div class="card mt-5 mx-auto mx-lg-0 border shadow" style="width: 18rem;">
                                              <img src="images/Images/test.jpeg" class="card-img-top" alt="">
                                              <div class="card-body">
                                                <h5 class="card-title text-center"><?=$produit->obtenir_nom_produit()?></h5>
                                                <img class="ml-2 mt-3 mb-5 img-fluid rounded" src="<?=CHEMIN_IMAGES_PRODUITS.$lienImg ?>" width="200" height="200">
                                                <p class="card-text text-center">
                                                  <?=$produit->obtenir_prix_produit()?>€</p>
                                                <div class="card-body row ">
                                                    <a href="index.php?page=detailProduit&id=<?=$produit->obtenir_id_produit() ?>" style="color:cadetblue" class="btn btn-link col-12 ">Voir détails</a>
                                                    <div class="col-6"></div>
                                                    
                                                    

                                                </div>
                                              </div>

                                            </div>
                                        <?php
                                        $nb_division++;
                                    }
                                    else if($nb_trouve==1)
                                    {
                                        if($nb_division==2)
                                        {
                                            ?>
                                            <div class="card mt-5 mx-auto mx-lg-0 border shadow" style="width: 18rem;">
                                              <img src="images/Images/test.jpeg" class="card-img-top" alt="">
                                              <div class="card-body">
                                                <h5 class="card-title text-center"><?=$produit->obtenir_nom_produit()?></h5>
                                                <img class="ml-2 mt-3 mb-5 img-fluid rounded" src="<?=CHEMIN_IMAGES_PRODUITS.$lienImg ?>" width="200" height="200">
                                                <p class="card-text text-center">
                                                  <?=$produit->obtenir_prix_produit()?>€</p>
                                                <div class="card-body row ">
                                                    <a href="index.php?page=detailProduit&id=<?=$produit->obtenir_id_produit() ?>" style="color:cadetblue" class="btn btn-link col-12 ">Voir détails</a>
                                                    <div class="col-6"></div>
                                                    

                                                </div>
                                              </div>

                                            </div>
                                            
                                            <!--A ne pas modifier-->
                                            <div class="card mt-5 mx-auto mx-lg-0 border shadow" style="width: 18rem;visibility: hidden;">
                              
                                          <div class="card-body">
                                              <h5 class="card-title text-center">Carte invisible à ne pas utiliser</h5>

                                            </div>
                                          </div>
                                            </div><!--Division de fin-->
            
                                    <?php
                                        }
                                        else
                                        {?>
                                            
                                            <div class="d-lg-flex justify-content-between"> <!--Début-->
                                                <div class="card mt-5 mx-auto mx-lg-0 border shadow" style="width: 18rem;">
                                                  <img src="images/Images/test.jpeg" class="card-img-top" alt="">
                                                  <div class="card-body">
                                                    <h5 class="card-title text-center"><?=$produit->obtenir_nom_produit()?></h5>
                                                    <img class="ml-2 mt-3 mb-5 img-fluid rounded" src="<?=CHEMIN_IMAGES_PRODUITS.$lienImg ?>" width="200" height="200">
                                                <p class="card-text text-center">
                                                  <?=$produit->obtenir_prix_produit()?>€</p>
                                                <div class="card-body row ">
                                                    <a href="index.php?page=detailProduit&id=<?=$produit->obtenir_id_produit() ?>" style="color:cadetblue" class="btn btn-link col-12 ">Voir détails</a>
                                                    <div class="col-6"></div>
                                                    

                                                    </div>
                                                  </div>

                                                </div>
                                            </div> <!--Division de fin-->
                                        <?php
                                            
                                        }
                                    }
                                }
                              $nb_trouve--;      
                            }
                            
                          }
                        ?>   
                        
                    </div>
      
                </div>   
                <div class="mt-5"></div>
                <?php require_once(CHEMIN_VUES.'piedPage.php'); ?>
      
    </div>


        
        
    </body>
    
     
</html>


