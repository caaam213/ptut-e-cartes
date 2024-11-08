<?php require_once(CHEMIN_VUES.'header.php'); ?>

<link href="<?= CHEMIN_CSS ?>styleIndex.css" rel="stylesheet">
<link href="<?= CHEMIN_CSS ?>recherche_produit_view_style.css" rel="stylesheet">
</head>

<body>

    <!-- Menu de navigation -->
    <?php require_once(CHEMIN_VUES.'menu.php'); ?>
    
    <!-- haut de page -->
    <header class="text-center h-100 headerAccueil">

        <form action="index.php?page=rechercheProduits" method="post">
            <?php $page = 'Accueil' ?>
            <?php require_once(CHEMIN_VUES.'formulaireRecherche.php'); ?>
        </form>
        
    </header>

    <!-- Plats nouveaux -->
    <section id="plats-vedettes" class="text-center my-5">
        <div class="container my-5">
            <h2 class="pb-5 font-weight-bold">Les nouveautés</h2>

            <!-- Card-deck : Conteneur flexible contenant des cartes de largeur et hauteur égales -->

            
            <div class="card-deck">
                <?php
                    foreach($listePlatsNouveaux as $unPlat)
                    {
                    if($unPlat->obtenir_id_produit()!=null)
                    $lienImg = $unPlat->obtenir_image_produit() ;

                    if ($lienImg == null) {
                        $lienImg = "pasPhoto.jpg";
                    }
                    ?>
                        <div class="card border-0 col-12 d-flex align-items-start flex-sm-column">
                            <img src="<?= CHEMIN_IMAGES_PRODUITS.$lienImg ?>" alt="..." height="200" width="200"  class="mx-auto rounded border">
                            <div class="card-body mx-auto">
                                <h5 class="card-title"><?=$unPlat->obtenir_nom_produit()?> - <?=$unPlat->obtenir_prix_produit()?>€</h5>
                            </div>
                        </div>
                    
                    <?php
                    }
                ?>
                


            </div>
            
        </div>
    </section>

    <!-- Le plat du jour -->



    <section id="plat-du-jour" class="bg-success text-white py-3 my-5">

        <div class="container my-3">
            <h2 class="text-center font-weight-bold">Découvrez ce plat</h2>
            
            <div class="row py-4">

                
            <?php
                    
                    if($platDuJour->obtenir_id_produit()!=null)
                    $lienImg = $platDuJour->obtenir_image_produit() ;

                    if ($lienImg == null) {
                        $lienImg = "pasPhoto.jpg";
                    }
                    {?>
                        
                        <div class="col-8 row offset-2 col-md-6 offset-md-0">
                        <img src="<?= CHEMIN_IMAGES_PRODUITS.$lienImg ?>" max-height="400" alt="..." class="img-fluid rounded">
                        </div>
                        <div class="col-8 offset-2 mt-5 col-md-6 offset-md-0 mt-sm-0 pt-md-4 pt-lg-5">
                            <p class="text-justify font-weight-bold ml-auto ml-md-2 mx-sm-0 mt-sm-5 mt-2 mt-md-0"><?= $platDuJour->obtenir_nom_produit() ?>
                        </p>
                        <p class="ml-md-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus lacinia magna nec commodo ultricies. Ut tincidunt orci ut arcu bibendum, in bibendum mauris feugiat. Praesent ac neque et lorem malesuada volutpat. Cras id nunc in arcu efficitur iaculis in ut urna. Fusce vestibulum facilisis leo eu consequat. Nam congue quis leo ut condimentum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed convallis nisl eu pellentesque pulvinar. Donec aliquet massa eget ligula finibus elementum.</p>

                        <div class="row pt-md-3 pt-lg-5">
                            <div class="col-12">
                                <p class="font-weight-bold ml-md-2 ">Prix de ce magnifique plat : <?= $platDuJour->obtenir_prix_produit() ?>€</p>
                            </div>
                            <div class="col-12">
                                <a class=" btn-sm text-success" href="#" role="button"></a>
                            </div>
                        </div>

                        </div>
					<?php
                    }
                    
                ?>


                

            </div>
        </div>
    </section>

    <?php require_once(CHEMIN_VUES.'infos_contacts.php') ; ?>

    

    </br>
    </br>
    </br>
    
    <!-- Footer -->
    <?php require_once(CHEMIN_VUES.'piedPage.php'); ?>


</body>
</html>