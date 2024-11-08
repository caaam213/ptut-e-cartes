<?php
class Critere
{
    private $_id_critere ;
    private $_nom_critere ;

    public function __construct($id,$nom)
    {
        $this->_id_critere = $id  ;
        $this->_nom_critere = $nom  ;
    }

    public function changer_id_critere($valeur) 
    {
        $this->_id_critere = $valeur ;
    }

    public function changer_nom_critere($valeur) 
    {
        $this->_nom_critere = $valeur ;
    }

    

    public function obtenir_id_critere() 
    {
        return $this->_id_critere ;
    }  
    
    public function obtenir_nom_critere() 
    {
        return $this->_nom_critere ;
    } 

    
}
?>