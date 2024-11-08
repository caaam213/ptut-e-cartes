<?php
require_once(CHEMIN_MODELES.'modele.php');
require_once(CHEMIN_CLASSES.'Critere.php');
class CritereManager extends Modele 
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

    public function ajouter($nomCritere)
    {
        $req = $this->queryRow('INSERT INTO Critere(nomCritere) VALUES(?)',array($nomCritere)) ;
    }

    public function maj($nomCritere, $idCritere)
    {
        $req = $this->queryRow('UPDATE critere SET nomCritere = (?) WHERE idCritere = (?)',array($nomCritere,$idCritere));
    }

    public function supprimer($id)
    {
        $listeProduit = $this->queryAll('SELECT idProduit FROM avoir_critere WHERE idCritere=?',array($id));
        if(count($listeProduit)!=0)
        {
            foreach($listeProduit as $unProduit)
            {
                $produit = $unProduit['idProduit'];
                $this->queryRow('DELETE FROM Produit where idProduit=?',array($produit));
            }
        }
        $this->queryRow('DELETE FROM Critere WHERE idcritere=?',array($id)) ;
    }

    public function obtenir_un_critere($info)
    {
        
        $req = "select * from Critere where idCritere=?";
        $donnee = $this->queryRow($req,array($info));
        $critere = new Critere($donnee["idCritere"],$donnee["nomCritere"]);
        return $critere;
        
    }

    public function obtenirListeCriteres()
    {
        
        $listecriteres = [] ;
        $res = $this->queryAll("SELECT * from Critere",null);
        foreach($res as $unCritere) 
        {
            $critere = new Critere($unCritere["idCritere"], $unCritere["nomCritere"]);
            $listecriteres[] = $critere ;
        }
        return $listecriteres ;

    }

    



}
?>