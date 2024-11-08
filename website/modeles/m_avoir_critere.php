<?php
    require_once(CHEMIN_MODELES.'modele.php');
    require_once(CHEMIN_CLASSES.'Critere.php');

class Avoir_critere extends Modele
{
    private $_bd ;

    public function __construct($connection)
    {
        $this->changer_bd($connection) ;
    }

    public function changer_bd($value)
    {
        $this->_bd = $value ;
    }

    public function obtenir_bd()
    {
        return $this->_bd ;
    }

    public function ajouter_critere($idProduit,$idCritere)
    {
        $req = $this->queryRow('INSERT INTO avoir_critere VALUES(?,?)',array($idProduit,$idCritere)) ;
        
    }

    // Récupération de la liste des critères d'un produit
    public function obtenirListeCriteresProduit($idProduit)
    {
        $listeCriteres = [] ;

        $requete = "SELECT critere.idCritere, critere.nomCritere FROM critere, avoir_critere WHERE avoir_critere.idProduit = ? AND avoir_critere.idCritere = critere.idCritere";
        $donnee = array($idProduit);

        $resultats = $this->queryAll($requete,$donnee);

        foreach($resultats as $unCritere) 
        {
            $critere = new Critere($unCritere["idCritere"], $unCritere["nomCritere"]);
            $listeCriteres[] = $critere ;
        }
        return $listeCriteres ;
    }

    // Suppression liste des critères d'un produit
    public function supprimerCriteres($idProduit)
    {
        $this->queryRow('DELETE FROM avoir_critere WHERE idProduit=?',array($idProduit)) ;
    }

}
    
    
    


?>