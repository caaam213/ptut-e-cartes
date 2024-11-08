
<?php require_once(CHEMIN_VUES.'header.php'); ?>
<link rel="stylesheet" href="<?= CHEMIN_CSS ?>gestion_restaurant.css">


</head>
     <body>
         <!-- Tout le contenu de la page est placé dans un div "container" afin de faciliter le responsive Bootstrap-->
         <div class="container">
             
            <?php require_once(CHEMIN_VUES.'header_GestionCuisine.php'); ?> 
             
             <!-- Quatre premières options : modifier les prix, afficher les statistiques, éditer les produits et afficher les commandes -->
             <div class="row justify-content-md-between justify-content-around mt-5 m-0">
                 <a href="#" class="col" onclick="window.location.href = 'index.php?page=gestionIngrédients';" >
                     <div class="d-flex align-items-center flex-column">
                        <div class="blocBouton d-flex justify-content-center align-items-center" data-toggle="tooltip" data-placement="top" title="Ajoutez, modifiez ou supprimez des ingrédients">
                            <?php echo '<img src="'.CHEMIN_ICONES.'ing.png" class="d-block" style="width: 65px; height: 65px;"> ';?>
                         </div>
                         <p class="text-center mt-2" style="font-size: 1.2em; font-weight: 400 !important; color: black;">Éditer les ingrédients</p>
                    </div>
                </a>
                <a href="#" class="col" onclick="window.location.href = 'index.php?page=gestionCriteres';">
                     <div class="d-flex align-items-center flex-column">
                        <div class="blocBouton d-flex justify-content-center align-items-center" data-toggle="tooltip" data-placement="top" title="Ajoutez, modifiez ou supprimez des critères">
                        <?php echo '<img src="'.CHEMIN_ICONES.'stat.png" class="d-block" style="width: 65px; height: 65px;"> ';?>
                         </div>
                         <p class="text-center mt-2" style="font-size: 1.2em; font-weight: 400 !important; color: black;">Éditer les critères</p>
                    </div>
                </a>
                 <a href="index.php?page=listeProduits" class="col">
                     <div class="d-flex align-items-center flex-column">
                        <div class="blocBouton d-flex justify-content-center align-items-center" data-toggle="tooltip" data-placement="top" title="Gérez tous les produits de votre carte">
                        <?php echo '<img src="'.CHEMIN_ICONES.'meal.png" class="d-block" style="width: 65px; height: 65px;"> ';?>
                         </div>
                         <p class="text-center mt-2" style="font-size: 1.2em; font-weight: 400 !important; color: black;">Éditer les produits</p>
                    </div>
                </a>
                 <a href="#"  class="col" onclick="window.location.href = 'index.php?page=accueil';">
                     <div class="d-flex align-items-center flex-column">
                        <div class="blocBouton d-flex justify-content-center align-items-center" data-toggle="tooltip" data-placement="top" title="Afficher la carte du restaurant pour vos clients">
                        <?php echo '<img src="'.CHEMIN_ICONES.'cart.png" class="d-block" style="width: 65px; height: 65px;"> ';?>
                         </div>
                         <p class="text-center mt-2" style="font-size: 1.2em; font-weight: 400 !important; color: black;">Afficher la carte</p>
                    </div>
                </a>
             </div>

         </div>
     </body>
     <script>
     // Active les tooltips
     $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
     </script>
</html>
