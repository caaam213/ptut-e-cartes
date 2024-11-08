
<div class="container h-100 mt-5 pt-5 w-100 p-4 recherche_div mx-auto row">
    <!-- SEMANTIC UI -->
	<link rel="stylesheet" href="ressources/semantic/semantic.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="ressources/semantic/semantic.js"></script>

    <?php 
        if ($page == 'Accueil')
        { 
    ?>
            <h1 class="text-white text-center mb-5 mb-sm-3 mt-5 col-12 font-weight-bold" id="recherche-titre">Découvrez notre carte</h1>
    <?php 
        } 
        else 
        { 
    ?>
            <h1 class="text-white text-center mb-5 mb-sm-3 mt-5 col-12 font-weight-bold" id="recherche-titre">Rechercher un plat</h1>
    <?php
        }
    ?>
    
    
    <!--Div contenant la recherche du plat-->                   
    <div class="w-100 mt-4 mt-md-5 border rounded shadow bg-light">
            
        <div class="pt-4 col-lg-5 col-md-7 col-12 input-group mb-3 mx-auto">
            <input name="nomPlat" type="text" style="border: 1px solid black;" class="form-control shadow" placeholder="Nom du plat" aria-label="Nom du plat" aria-describedby="button-addon2">
        </div>
        
    </div>
    
    <!--div contenant les recherches plus précises-->
    <div class="col-12 row border rounded shadow bg-light justify-content mx-auto mt-2">
        
        <div class="row col-12 m-0 p-0">
            <div class="col-lg-4 col-xs-10 col-12 mt-2 mx-auto" id="prix">
                
                    <label class="titre" for="">Prix</label>
            
                    <br/>
                    
                    <label for="prixmin">Entre</label>

                    <select class="border rounded shadow ml-md-1 ui compact selection dropdown prixmin" name="prixmin" id="prixmin">
                        <option <?php if($prixMin == 0){echo 'selected="selected"';}?> value="0">0</option>
                        <option <?php if($prixMin == 5){echo 'selected="selected"';}?> value="5">5</option>
                        <option <?php if($prixMin == 10){echo 'selected="selected"';}?> value="10">10</option>
                        <option <?php if($prixMin == 20){echo 'selected="selected"';}?> value="20">20</option>
                        <option <?php if($prixMin == 30){echo 'selected="selected"';}?> value="30">30</option>
                        <option <?php if($prixMin == 40){echo 'selected="selected"';}?> value="40">40</option>
                        <option <?php if($prixMin == 50){echo 'selected="selected"';}?> value="50">50</option>
                        <option <?php if($prixMin == 50){echo 'selected="selected"';}?> value="50">60</option>
                    </select>

                    <label for="prixmax">€ et </label>

                    <select class="border rounded shadow ui compact selection dropdown prixmax" name="prixmax" id="prixmax">
                        <option value="10">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                        <option value="60">60</option>
                        <option value="70">70</option>
                        <option <?php if($prixMax == 999999){echo 'selected="selected"';}?> value="999999">max</option>
                    </select>

                    <label>€</label>
                
            </div>

            <!-- Critère -->
            <div class="col-lg-4 col-xs-10 col-12 mt-2 mx-auto">
            <label class="titre" for="criteresDropdown">Critères</label>
                <select class="ui search dropdown fluid critere shadow" multiple="" id="criteresDropdown" name="tabCriteres[]">
                    <option value="">Séléctionnez les critères</option>
                    <?php 
                        foreach($listeCriteres as $unCritere) 
                        {
                            $nom = $unCritere->obtenir_nom_critere();
                            $id = $unCritere->obtenir_id_critere();
                            echo '<option value='.$id.'>'.$nom.'</option>';
                        }
                    ?>
                </select>
            </div>

            <!-- Ingrédients -->
            <div class="col-lg-4 col-xs-10 col-12 mt-2 mx-auto">
                <label class="titre" for="ingredientDropdown">Ingrédients</label>
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
            
            <div class="col-0 col-lg-9"></div>
            
            <div class="col-12 col-md-4 col-lg-2 mt-2">
                <label class="titre" for="tri">Tri</label>
                <br/>

                <select id="tri" class="border rounded shadow mb-3 ui selection dropdown tri" name="tri">
                    <option value="nom">Nom</option>
                    <option value="prix">Prix</option>
                    <option value="nouveaute">Nouveauté</option>
                    
                </select> 
            
            </div>        
        
        </div>
    </div>

    <!--Bouton rechercher en bas du formulaire-->
    <div class="pb-5 mt-3 mx-auto">    
        <button class="ui vertical animated button bg-success" style="color: white; font-size: 1.2em;" type="submit" tabindex="0">
            <div class="hidden content"><i class="search icon"></i></div>
            <div class="visible content">
                Rechercher
            </div>
        </button>       
    </div>

    

<script type="text/javascript">
 
 // Active la liste des ingrédients
 $('.ui.dropdown.ingredient')
   .dropdown({
       onChange: function(value, text, $selectedItem) {
         console.log(value);

             
         }
   });

   // Active la liste des critères
 $('.ui.dropdown.critere')
   .dropdown({
       onChange: function(value, text, $selectedItem) {
         console.log(value);

             
         }
   });

    // Active les dropdowns es prix
    $('.ui.dropdown.prixmin')
        .dropdown();

    $('.ui.dropdown.prixmax')
        .dropdown();
    
    $('.ui.dropdown.tri')
        .dropdown();
    
    document.getElementById("prixmax").addEventListener("change",function()
    {
        var prixMax = document.getElementById("prixmax").value;

        var select = document.getElementById("prixmin");
        var length = select.options.length;
        for (i = length-1; i >= 0; i--) {
        select.options[i] = null;
        }


        var option = document.createElement("option");
        option.text = 0;
        select.add(option);

        if(prixMax==5)
        {
            var option = document.createElement("option");
            option.text = 5;
            select.add(option);
        }

        if(prixMax<=70)
        {
            for(var i = 10;i<prixMax;i+=10)
            {
                var option = document.createElement("option");
                option.text = i;
                select.add(option);
            }
        }
        else
        {
            var option = document.createElement("option");
            option.text = 0;
            select.add(option);

            var option = document.createElement("option");
            option.text = 5;
            select.add(option);

            for(var i = 10;i<prixMax;i+=60)
            {
                var option = document.createElement("option");
                option.text = i;
                select.add(option);
            }
        }
        

        
    })

    document.getElementById("prixmin").addEventListener("change",function()
    {
        var prixMin = document.getElementById("prixmin").value;

        console.log(document.getElementById("prixmin").value);

        var select = document.getElementById("prixmax");

        //Supprime toute la combo box
        if(prixMin!=0)
        {
            var length = select.options.length;
            for (i = length-1; i >= 0; i--) {
            select.options[i] = null;
            }
        }

        prixMin = parseInt(prixMin, 10);

        if(prixMin!=0)
        {
            if(prixMin==5)
            {
                prixMin+=5;
            }
            else
            {
                prixMin+=10;
            }
            for(var i = prixMin;i<=70;i+=10)
            {
                var option = document.createElement("option");
                option.text = i;
                select.add(option);
            }
        }

        var option = document.createElement("option");
        option.text = "max";
        option.value = 99999;
        select.add(option);

        
        


        
    })

    
</script>

