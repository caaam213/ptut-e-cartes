<?php
class Produit
{
    private $_id_produit;
    private $_nom_produit ;
    private $_image_produit ;
    private $_image_produit2 ;
    private $_image_produit3 ;
    private $_date_modif_produit;
    private $_prix_produit ;
    private $_allergene_produit ;
    private $_type_plat_produit ;
    private $_date_et_heure;

    public function __construct($id=null,$nom=null, $img1=null, $img2=null, $img3=null, $dateModif=null, $prix=null, $allergene=null, $type=null, $dh=null)
    {
        $this->_id_produit = $id;
        $this->_nom_produit = $nom;
        $this->_image_produit = $img1;
        $this->_image_produit2 = $img2;
        $this->_image_produit3 = $img3;
        $this->_date_modif_produit = $dateModif;
        $this->_prix_produit = $prix;
        $this->_allergene_produit = $allergene;
        $this->_type_plat_produit = $type;
        $this->_date_et_heure = $dh;

    }
    
    public function changer_id_produit($valeur)
    {
        $this->_id_produit = $valeur;
    }

    public function changer_nom_produit($valeur) 
    {
        $this->_nom_produit = $valeur ;
    }

    public function changer_image_produit($valeur) 
    {
        $this->_image_produit = $valeur ;
    }

    public function changer_image_produit2($valeur) 
    {
        $this->_image_produit2 = $valeur ;
    }

    public function changer_image_produit3($valeur) 
    {
        $this->_image_produit3 = $valeur ;
    }

    public function changer_date_modif_produit($valeur) 
    {
        $this->_date_modif_produit = $valeur ;
    }

    public function changer_prix_produit($valeur) 
    {
        $this->_prix_produit = $valeur ;
    }

    public function changer_allergene_produit($valeur) 
    {
        $this->_allergene_produit = $valeur ;
    }

    public function changer_type_plat_produit($valeur) 
    {
        $this->_type_plat_produit = $valeur ;
    }

    public function changer_date_et_heure($valeur) 
    {
        $this->_date_et_heure = $valeur ;
    }

    public function obtenir_id_produit()
    {
        return $this->_id_produit;
    }
    
    public function obtenir_nom_produit() 
    {
        return $this->_nom_produit ;
    } 

    public function obtenir_image_produit() 
    {
        return $this->_image_produit ;
    } 

    public function obtenir_image_produit2() 
    {
        return $this->_image_produit2 ;
    } 

    public function obtenir_image_produit3() 
    {
        return $this->_image_produit3 ;
    } 
    
    public function obtenir_date_modif_produit() 
    {
        return $this->_date_modif_produit ;
    } 

    public function obtenir_prix_produit() 
    {
        return $this->_prix_produit ;
    } 

    public function obtenir_allergene_produit() 
    {
        return $this->_allergene_produit ;
    } 

    public function obtenir_type_plat_produit() 
    {
        return $this->_type_plat_produit ;
    }

    public function obtenir_date_et_heure() 
    {
        return $this->_date_et_heure ;
    }
    
}
