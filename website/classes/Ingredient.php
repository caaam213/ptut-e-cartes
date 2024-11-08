<?php
class Ingredient
{
    private $_id_ingredient ;
    private $_nom_ingredient ;

    public function __construct($id,$nom)
    {
        $this->_id_ingredient = $id;
        $this->_nom_ingredient = $nom;
    }


    public function changer_id_ingredient($valeur) 
    {
        $this->_id_ingredient = $valeur ;
    }

    public function changer_nom_ingredient($valeur) 
    {
        $this->_nom_ingredient = $valeur ;
    }

    public function obtenir_id_ingredient() 
    {
        return $this->_id_ingredient ;
    }  
    
    public function obtenir_nom_ingredient() 
    {
        return $this->_nom_ingredient ;
    } 

    
}
?>