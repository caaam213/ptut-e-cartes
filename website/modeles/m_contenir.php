<?php
    require_once(CHEMIN_MODELES.'modele.php');
    require_once(CHEMIN_CLASSES.'Ingredient.php');
    
class Contenir extends Modele
{
    private $_bd ;

    public function __construct($connexion)
    {
        $this->changer_bd($connexion) ;
    }

    public function changer_bd($valeur)
    {
        $this->_bd = $valeur ;
    }

    public function obtenir_bd()
    {
        return $this->_bd ;
    }

    public function ajouter_Ingredient_Produit($idProduit,$idIngredient)
    {
        $req = $this->queryRow('INSERT INTO contenir VALUES(?,?)',array($idProduit,$idIngredient)) ;
        
    }

    // Récupération de la liste des ingrédients d'un produit
    public function obtenirListeIngredientsProduit($idProduit)
    {
        $listeIngredients = [] ;

        $requete = "SELECT ingredient.idIngredient, ingredient.nomIngredient FROM ingredient, contenir WHERE contenir.idProduit = ? AND contenir.idIngredient = ingredient.idIngredient";
        $donnee = array($idProduit);

        $resultats = $this->queryAll($requete,$donnee);

        foreach($resultats as $unIngredient) 
        {
            $ingredient = new Ingredient($unIngredient["idIngredient"], $unIngredient["nomIngredient"]);
            $listeIngredients[] = $ingredient ;
        }
        return $listeIngredients ;
    }

    // Suppression liste des ingrédients d'un produit
    public function supprimerIngredients($idProduit)
    {
        $this->queryRow('DELETE FROM contenir WHERE idProduit=?',array($idProduit)) ;
    }


}
    


?>