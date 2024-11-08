<?php

?>

<!-- Div contenant les boutons du haut de page : déconnexion et paramètres --> 

<div class="row justify-content-lg-between justify-content-center align-items-center mt-md-5 mt-3 col-12 m-0 mb-3">


    <a href="index.php?deconnexion=true" name="deco" class="btn classicButton deleteButton col-lg-3 text-center m-lg-0 my-2 h-25" role="button">Déconnexion</a>

    <?php 
        if(isset($affichageStatistique) &&  $affichageStatistique == 'oui') 
        {
    ?>
            <div class="border border-dark rounded p-3 col-11 col-lg-4">

                <div class="d-flex justify-content-between">
                    <span class="d-block font-weight-bold">Statistiques de la journée</span>
                    <span class="d-block text-secondary">12/12/19</span>
                </div>

                <span class="d-block text-secondary">Commandes effectuées : 14</span>
                <span class="d-block text-secondary">2% de commandes tardives</span>

            </div>
    <?php
        }
    ?>       

</div>
    
<!-- Div contenant le logo, le nom du restaurant et "l'heure" --> 
<div class="row justify-content-center col-12 m-md-0 mt-4">

    <div class="d-flex align-items-center justify-content-start flex-column">

        <img src="<?= CHEMIN_LOGO ?>" class="d-block">

        <p class="font-weight-bold p-0 m-0 text-center" style="font-size: 2.5em;">Nom du restaurant</p>

    </div>

</div>

