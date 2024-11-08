<?php
if(!isset($_COOKIE["type"]))
{
    header('Location: index.php?page=identification');
}
else
{
    if($_COOKIE["type"]!="gestion")
    {
        header('Location: index.php?page=mauvaisEspace');
    }
}
    $titre="Gestion des ingrédients";
    require_once(CHEMIN_MODELES.'ingredientModele.php');
    $modeleObjet = new IngredientManager(true);
    $listeIngredients = $modeleObjet->obtenirListeIngredients();

    if(isset($_GET['deconnexion']))
    {
        header('Location: index.php');
        setcookie("type","",time()-3600);
    }


    if(isset($_POST['ingredients_champ']))
    {
        $nom_ingredient = htmlspecialchars($_POST['ingredients_champ']);
        $nom_ingredient = ucfirst($nom_ingredient); 
        
        $identique = false;
        foreach($listeIngredients as $unIngredient)
        {
            if($nom_ingredient==$unIngredient->obtenir_nom_ingredient())
            {
                $identique = true;
            }
        }
        if($identique == false)
        {
            if($nom_ingredient!="")
            {
                
                $modeleObjet->ajouter($nom_ingredient);
                $alert = "ajout";
                
                
            
            }
            
        }
        else
        {
            $alert = "identique";
        }
        
    }
    if(isset($_GET['idsupp']))
    {
        $id = (int)htmlspecialchars($_GET['idsupp']);
        if($id!=null)
        {
            $modeleObjet->supprimer($id);
            $alert = "supprime";
        }
        
    }

    /*
    if (isset($_GET['nomModif']) && isset($_GET['idModif'])) {
        echo "merde";
        $id = (int)htmlspecialchars($_GET['nomModif']);
        $nom = htmlspecialchars($_GET['idModif']);
        $identique = false;
        foreach($listeIngredients as $unIngredient)
        {
            if($nom==$unIngredient->obtenir_nom_ingredient())
            {
                $identique = true;
            }
        }
        if($identique == false)
        {
            
            
        }
    }
    */
    if(isset($_POST['NomModif']) && isset($_GET['idModif'])) {
        $idIngredient2 = $_GET['idModif'];
        $nomIngredient2 = $_POST['NomModif'];

        if($idIngredient2!=null && $nomIngredient2!=null)
        {
            $modeleObjet->maj($nomIngredient2,$idIngredient2);   
        }

    }

    $listeIngredientsFinale = $modeleObjet->obtenirListeIngredients();

    require_once(CHEMIN_VUES.'gestionIngrédients.php');
?>