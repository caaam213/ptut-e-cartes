<?php
require_once(CHEMIN_MODELES.'modele.php');
require_once(CHEMIN_CLASSES.'Ingredient.php');

class IngredientManager extends Modele 
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

    public function ajouter($nomIngredient)
    {
        $req = $this->queryRow('INSERT INTO ingredient(nomIngredient) VALUES(?)',array($nomIngredient)) ;
    }

    public function maj($nomIngredient, $idIngredient)
    {

        $req = $this->queryRow('UPDATE ingredient SET nomIngredient = (?) WHERE idIngredient = (?)',array($nomIngredient,$idIngredient));
    }

    public function supprimer($id)
    {
        $listeProduit = $this->queryAll('SELECT idProduit FROM contenir WHERE idIngredient=?',array($id));
        if(count($listeProduit)!=0)
        {
            foreach($listeProduit as $unProduit)
            {
                $produit = $unProduit['idProduit'];
                $this->queryRow('DELETE FROM Produit where idProduit=?',array($produit));
            }
        }
        
        $this->queryRow('DELETE FROM ingredient WHERE idIngredient=?',array($id)) ;
        
    }

    public function obtenir_un_ingredient($info)
    {
        
        $req = "select * from Ingredient where idIngredient=?";
        $donnee = $this->queryRow($req,array($info));
        $ingredient = new Ingredient($donnee["idIngredient"],$donnee["nomIngredient"]);
        return $ingredient;
        
    }

    public function obtenirListeIngredients()
    {
        
        $listeIngredients = [] ;
        $res = $this->queryAll("SELECT * from ingredient",null);
        foreach($res as $unIngredient) 
        {
            $ingredient = new Ingredient($unIngredient["idIngredient"], $unIngredient["nomIngredient"]);
            $listeIngredients[] = $ingredient ;
        }
        return $listeIngredients ;

    }

}
?>