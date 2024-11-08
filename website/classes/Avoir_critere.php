<?php

class avoir_critere
{
    private $id_produit;
    private $tab_criteres;
    
    public function __construct($idp, $tab)
    {
        $this->id_produit = $idp;
        $this->tab_criteres = $tab;
    }
    
    public function changerIdProduit($idp)
    {
        $this->id_produit = $idp;
    }
    
    public function changerListeCriteres($tab)
    {
        $this->tab_criteres = $tab;
    }
    
    public function obtenirListeCriteres()
    {
        return $this->tab_criteres;
    }
    
    public function obtenirIdProduit()
    {
        return $this->id_produit;
    }
}
?>