<?php
    require_once(CHEMIN_VUES.'header.php');
    $nb_criteres = 0;
?>

<link href="<?= CHEMIN_CSS ?>style.css" rel="stylesheet">

<script>
    function apparait_disparait(id)
    {
        let idfirst = id + "grandeDiv" ;
        let idsecond = id + "grandeDivInput" ;
        document.getElementById(idfirst).setAttribute("style", "display : none ;") ;
        document.getElementById(idsecond).setAttribute("style", "display : block ;") ;
    }

    function sendsuppr_critere(id)
    {
        let lien = 'index.php?page=gestionCriteres&idsupp='
        let lienfinal = lien + id ;
        document.getElementById("suppr_button_modale").setAttribute("href", lienfinal) ;
    }
</script>

<html>
    <body class="bg-light">
        <div class="container">
            
            <div class="row justify-content-md-between justify-content-center mt-md-5 mt-3 col-12 m-0">
                <button name="deco" class="btn classicButton deleteButton col-md-3 col-11 text-center m-md-0 my-2" onclick="window.location.href = 'index.php?deconnexion=true';">Déconnexion</button>
            </div>

            <!-- Div contenant le logo, le nom du restaurant et "l'heure" -->
            <div class="row justify-content-center col-12 m-md-0 mt-4">
                <div class="d-flex align-items-center justify-content-start flex-column">
                    <?php echo '<img src="'.CHEMIN_LOGO.'" class="d-block"> ';?>
                    <p class="font-weight-bold p-0 m-0 text-center" style="font-size: 2.5em;">Golden Tulip Restaurant</p>
                </div>
            </div>

            <p class="text-center mt-3 h4 text-wrap">Gestion des Critères</p>

            <div  id="lol" class="mt-3 row col-12 justify-content-center">
                <a href="index.php?page=gestionRestaurant" class="btn classicButton blueButton col-4 text-center m-lg-0 my-2">
                     ← Retour à l'interface de gestion
                </a>
		    </div>

            <!-- div qui contient le formulaire d'ingredient-->
            <form method="post" action="index.php?page=gestionCriteres" class="saisie container w-75 mt-5 mx-auto bg-white rounded shadow p-4 col-12 row">
                <p class="text-success h4 text-center col-12">Nom du critère</p>
                <div class="espacement col-lg-2"></div>
                <input type="text" class="p-1 mt-4 rounded col-12 col-lg-8 mx-auto" id="nomIngredient" placeholder="Entrez un nom" name='critere_champ' required/>
                <div class="espacement col-0 col-lg-2"></div>
                <input type="submit" class="btn btn-success col-10 col-md-3 col-lg-3 mt-4 mx-auto mx-md-11" value="Ajouter"/>
            </form>

            <?php
                if(isset($alert))
                {
                    if($alert=="ajout")
                    {?>
                        <div class="alert alert-success mt-2 w-50 mx-auto row py-2" role="alert">
                            <span class="text-center col-12">Critère ajouté</span>
                        </div>
                    <?php
                    }
                    else if($alert=="identique")
                    {
                    ?>
                        <div class="alert alert-warning mt-2 w-50 mx-auto row py-2" role="alert">
                            <span class="text-center col-12">Critère déjà existant</span>
                        </div>
                    <?php
                    }
                    else if($alert=="supprime")
                    {
                    ?>
                        <div class="alert alert-danger mt-2 w-50 mx-auto row py-2" role="alert">
                            <span class="text-center col-12">Critère supprimé</span>
                        </div>
                    <?php
                    }
                }
                


            ?>

            
            <!--Affichage de la liste des Criteres-->
            <p class="h5 text-center mt-3">Liste des Criteres</p>

            <div class="container p-0 mx-auto" style="width : 82%;">
                <?php
                    foreach($listeCritereFinale as $unCritere)
                    {
                        $nb_criteres++;
                        if($nb_criteres%2!=0)
                        {
                ?>
                            <div class="mx-auto row bg-white rounded-lg shadow col-md-5 mt-4 p-3">
                                <form class="d-flex justify-content-between w-100"action="<?= 'index.php?page=gestionCriteres&idModif='.$unCritere->obtenir_id_critere() ?>" method="POST">
                                    <div id="flex1" class="col-6 m-0 p-0">
                                    <p id="<?= $unCritere->obtenir_id_critere()."grandeDiv" ?>" class="criteres m-0" ondblclick="apparait_disparait(<?= $unCritere->obtenir_id_critere() ?>)" style="display : block ;"><?= $unCritere->obtenir_nom_critere() ?></p>
                                    <input class="bg-white rounded shadow criteres m-0" id="<?= $unCritere->obtenir_id_critere()."grandeDivInput" ?>" style="display : none ;" name="NomModif" value="<?= $unCritere->obtenir_nom_critere() ?>">
                                    </div>
                                    <div id="flex2" class="col-6 m-0 p-0 d-flex flex-row justify-content-end">
                                    <button type="submit" class="btn btn-link m-0 p-0" style="width:30px;height: 30px;"><img class="icon" src="<?= CHEMIN_ICONES.'valider.png' ?>" width="25" height="25"/>
                                    </button>
                                    <button type="button" onclick="sendsuppr_critere(<?= $unCritere->obtenir_id_critere(); ?>)" class="btn btn-link m-0 p-0" style="width:30px;height: 30px;" data-toggle="modal" data-target="#confirmationModal"><img class="icon" src="<?= CHEMIN_ICONES.'delete.png' ?>" width="25" height="25"/>
                                    </button>    
                                    </div>            
                                </form>
                            </div>
                   
<?php
                       }
                       else
                       {
?>
                   <div class="mx-auto row bg-white rounded-lg shadow col-md-5 mt-4 p-3">
                                <form class="d-flex justify-content-between w-100"action="<?= 'index.php?page=gestionCriteres&idModif='.$unCritere->obtenir_id_critere() ?>" method="POST">
                                    <div id="flex1" class="col-6 m-0 p-0">
                                    <p id="<?= $unCritere->obtenir_id_critere()."grandeDiv" ?>" class="criteres m-0" ondblclick="apparait_disparait(<?= $unCritere->obtenir_id_critere() ?>)" style="display : block ;"><?= $unCritere->obtenir_nom_critere() ?></p>
                                    <input class="bg-white rounded shadow criteres m-0" id="<?= $unCritere->obtenir_id_critere()."grandeDivInput" ?>" style="display : none ;" name="NomModif" value="<?= $unCritere->obtenir_nom_critere() ?>">
                                    </div>
                                    <div id="flex2" class="col-6 m-0 p-0 d-flex flex-row justify-content-end">
                                    <button type="submit" class="btn btn-link m-0 p-0" style="width:30px;height: 30px;"><img class="icon" src="<?= CHEMIN_ICONES.'valider.png' ?>" width="25" height="25"/>
                                    </button>
                                    <button type="button" onclick="sendsuppr_critere(<?= $unCritere->obtenir_id_critere(); ?>)" class="btn btn-link m-0 p-0" style="width:30px;height: 30px;" data-toggle="modal" data-target="#confirmationModal"><img class="icon" src="<?= CHEMIN_ICONES.'delete.png' ?>" width="25" height="25"/>
                                    </button>   
                                    </div>            
                                </form>
                            </div>

<?php
                       }
                    }
?>
            </div>

            <!-- Bloc représentant la fenêtre modale de confirmation lors de la suppression d'un critère -->
              <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="confirmationLabel">Suppression du critère</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Êtes-vous sûr de vouloir supprimer ce critère ? Cette action est irréversible.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                      <a id="suppr_button_modale" href=""><button type="button" class="btn btn-danger">Supprimer</button></a>
                    </div>
                  </div>
                </div>
              </div>
        <!--Empêcher d'entrer un ingrédient vide-->
        <script type="text/javascript">     
            $("button").click(function(event)
            {
                if(document.getElementById("formulaire").checkValidity())
                {
                    event.preventDefault();
                    $("#exampleModal").modal();

                }
                else
                {

                }
            });
        </script>





    </body>
</html>

