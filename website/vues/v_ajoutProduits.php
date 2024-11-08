
    <?php require_once(CHEMIN_VUES.'header.php'); ?>
    <link rel="stylesheet" href="<?= CHEMIN_CSS ?>style1.css">

</head>
<body>
	<?php require_once(CHEMIN_VUES.'header.php'); ?>
	<link rel="stylesheet" href="<?= CHEMIN_CSS ?>styleModif.css">
	<link rel="stylesheet" href="<?= CHEMIN_CSS ?>style.css">


    <!-- SEMANTIC UI -->
	<link rel="stylesheet" href="ressources/semantic/semantic.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="ressources/semantic/semantic.js"></script>


	<div class="container pb-3">
	
		<?php $affichageStatistique = 'non' ?>
        <?php require_once(CHEMIN_VUES.'header_GestionCuisine.php'); ?>
       
        <!-- Titre page -->

        <div class="row justify-content-center col-12 mt-3 m-0">
            <p style="font-size: 1.4em;">Ajout d'un produit - Cuisine</p>
		</div>
		<div  id="lol" class="mt-2 row col-12 justify-content-center">
			<a href="index.php?page=listeProduits" class="btn classicButton deleteButton col-5 text-center m-lg-0 my-2">
				Retour à la liste des produits 
			</a>
		</div>
	</div>
	

	<!--Division avec les modifs -->
	<form class="container" id="formulaire" action="index.php?page=ajoutProduits" method="post" enctype="multipart/form-data">
	<div class="saisie blocProduit justify-content-around container w-100 mt-5 mx-auto  p-4 row bg-white mb-5">

    		<div class="ingredients row justify-content-center col-lg-5 col-md-6 col-sm-10">
    			<div class="form-group text-center col-12">
    				<label class="mt-3" for="_nom_produit">Nom du produit*</label>
    				<input class="form-control border border-dark" type="text" id="_nom_produit" name="_nom_produit" placeholder="Entrer le nom du produit" required>
    				<label class="mt-3" for="tabIngredients[]">Ingredients</label>
								
				    <!-- Ingrédients -->
					<div class="row">
				        <select class="ui search dropdown fluid ingredient shadow" multiple="" id="ingredientDropdown" name="tabIngredients[]">
							<option value="">Séléctionnez les ingrédients</option>
				            <?php 
								foreach($listeIngredients as $unIngredient) 
								{
								    $nom = $unIngredient->obtenir_nom_ingredient();
									$id = $unIngredient->obtenir_id_ingredient();
									echo '<option value='.$id.'>'.$nom.'</option>';
								}
										?>
							</select>
					</div>
								
				    
                    
    				<!-- Critère -->
                    <label class="mt-4 col-12" for="_criteres_produit">Critères</label>
				        <div class="row">
				            <select class="ui search dropdown fluid critere shadow" multiple="" id="criteresDropdown" name="tabCriteres[]">
								<option value="">Séléctionnez les critères</option>
								<?php 
								    foreach($listeCritere as $unCritere) 
								    {
								        $nom = $unCritere->obtenir_nom_critere();
										$id = $unCritere->obtenir_id_critere();
										echo '<option value='.$id.'>'.$nom.'</option>';
									}
								?>
				            </select>
				        </div>
                    
    				<label class="mt-3 col-12" for="_allergene_produit">Allergenes :</label>
    				<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="_allergene_produit" id="present" value="1">
					  <label class="form-check-label" for="present">Présent</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="_allergene_produit" id="non_present" value="0" checked>
					  <label class="form-check-label" for="non_present">Non Présent</label>
					</div>
    			</div>
    		</div>

    	

    		<div class="prix row justify-content-center col-lg-5 col-md-6 col-sm-10">
    			<div class="form-group text-center col-12">
    				<label class="mt-3" for="_prix_produit">Prix*</label>
    				<input class="form-control border border-dark" type="number" step="0.01" id="_prix_produit" name="_prix_produit" min="0" placeholder="Entrer le prix" required>
    				<div class="form-group">
					    <label class="mt-3" for="_type_plat_produit">Type de Plat</label>
					    <select class="form-control border border-dark" id="_type_plat_produit" name="_type_plat_produit">
					      <option value="Entrée">Entrée</option>
					      <option value="Plat">Plat</option>
					      <option value="Dessert">Dessert</option>
					    </select>
					</div>
					<div>
						<label class="mt-1" for="images">Images</label>
						<input style="width : 100%;  margin : auto;" class="row" type="file" name="file[]" multiple />
					</div>	
				</div>
			</div>
			<div class="row col-12 justify-content-center">
				<p class="row">*Champs obligatoires</p>
			</div>
	
			<div class="mt-4 row col-12 justify-content-center">
				<button type="submit" id="valider" class="btn classicButton col-5 text-center m-lg-0 my-2" data-toggle="modal" onclick='return btnClick();' >Valider</button>
			</div>
		</div>
	</form>
	

	
    
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Message de confirmation</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        L'ajout du produit a été réalisé avec succès !
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Fermer</button>
	      </div>
	    </div>
	  </div>
	</div>
    
    
    <script type="text/javascript">
        
        $("#valider").click(function(event)
        {
            if(document.getElementById("formulaire").checkValidity())
            {
                $("#exampleModal").modal();
            }
            else
            {
                
            }
        });
        
		var tabCriteres = [];
		var tabIngredients = [];
        // Active la liste des ingrédients
		$('.ui.dropdown.ingredient')
  		.dropdown({
			  onChange: function(value, text, $selectedItem) {
				tabIngredients = value;

					
    			}
		  });

		  // Active la liste des critères
		$('.ui.dropdown.critere')
  		.dropdown({
			  onChange: function(value, text, $selectedItem) {
				tabCriteres = value;

					
    			}
		});
		
		// Vérifie le nombre d'images insérées et qu'on a sélectionné au moins 1 ingrédient et 1 critère
		function btnClick() { 
			var $fileUpload = $("input[type='file']");
        	if (parseInt($fileUpload.get(0).files.length)>3){
         		alert("Vous ne pouvez qu'ajouter 3 photos !");
				return false;
       	 	}

			if(tabIngredients.length==0)
			{
				alert("Veuillez sélectionner au moins 1 ingredient");
			}

			if(tabCriteres.length==0)
			{
				alert("Veuillez sélectionner au moins 1 critère");
			}
			
		}		 

    </script>
</body>
</html>

