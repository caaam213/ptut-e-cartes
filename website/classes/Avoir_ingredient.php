<?php

class avoir_ingredient
{
    private $id_produit;
    private $tab_ingredients;
    
    public function __construct($idp, $tab)
    {
        $this->id_produit = $idp;
        $this->tab_ingredients = $tab;
    }
    
    public function changerIdProduit($idp)
    {
        $this->id_produit = $idp;
    }
    
    public function changerListeIngredients($tab)
    {
        $this->tab_ingredients = $tab;
    }
    
    public function obtenirListeIngredients()
    {
        return $this->tab_ingredients;
    }
    
    public function obtenirIdProduit()
    {
        return $this->id_produit;
    }
}

?>