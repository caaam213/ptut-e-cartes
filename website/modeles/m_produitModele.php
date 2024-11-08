<?php  
require_once(CHEMIN_MODELES.'avoir_critere.php');
require_once(CHEMIN_MODELES.'contenir.php');
require_once(CHEMIN_MODELES.'critereModele.php');
require_once(CHEMIN_MODELES.'modele.php');
require_once(CHEMIN_CLASSES.'Produit.php');
require_once(CHEMIN_CLASSES.'PlatDuJour.php');

class ProduitManager extends Modele
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
    public function recupIdProduit($nom)
    {
        $req = $this->queryRow('SELECT idProduit from Produit where nomProduit=?',array($nom));
        return $req['idProduit'];
        
    }

    public function modifierIngredientsCriteres(Produit $produit, $tabIngredient,$tabCritere)
    {
        $id= $this->recupIdProduit($produit->obtenir_nom_Produit());
 
        $contenir = new Contenir(true);
        $avoir_criteres = new Avoir_critere(true);
        
        foreach($tabIngredient as $idIngredient)
        {
            $contenir->ajouter_Ingredient_Produit($id,$idIngredient);
        }
        
        foreach($tabCritere as $idCritere)
        {
            $avoir_criteres->ajouter_critere($id,$idCritere);
        }
    }

    public function ajouterProduit(Produit $produit, $tabIngredient,$tabCritere)
    {
        $sql = 'INSERT INTO Produit(NomProduit, Image1, Image2, Image3, DateModif, Prix, Allergene, TypePlat,dateEtHeure) VALUES(?,?,?,?,?,?,?,?,?)' ;
        $array = array(
            $produit->obtenir_nom_produit(),
            $produit->obtenir_image_produit(),
            $produit->obtenir_image_produit2(),
            $produit->obtenir_image_produit3(),
            date ("d-m-Y"),
            $produit->obtenir_prix_produit(),
            $produit->obtenir_allergene_produit(),
            $produit->obtenir_type_plat_produit(),
            date("d-m-Y h:i:s")
        ) ;
        $req = $this->queryRow($sql, $array) ;
        
        $id= $this->recupIdProduit($produit->obtenir_nom_Produit());
        $produit->obtenir_id_produit($id);
        $produit->obtenir_date_modif_produit(date ("d-m-Y"));
        $contenir = new Contenir(true);
        $avoir_criteres = new Avoir_critere(true);
        
        foreach($tabIngredient as $idIngredient)
        {
            $contenir->ajouter_Ingredient_Produit($id,$idIngredient);
        }
        
        foreach($tabCritere as $idCritere)
        {
            $avoir_criteres->ajouter_critere($id,$idCritere);
        }
        
    }

    public function supprimerProduit($id)
    {
        $this->queryRow('DELETE FROM produit WHERE idProduit=?', array($id)) ;
    }

    // modifier produit avec images 
    public function modifierProduitAvecImages($id, $nom, $img1,$img2,$img3, $prix, $type, $allergene)
    {
        $req = "UPDATE Produit SET NomProduit = :nom, Image1 = :image1, Image2 = :image2, Image3 = :image3, Prix = :prix, Allergene = :allergene,dateModif = :dateM, dateEtHeure = :dateH, TypePlat = :typeP WHERE idProduit = :idP"; 
        $donnees = array(
                    'nom' => $nom,
                    'image1' => $img1,
                    'image2' => $img2,
                    'image3' => $img3,
                    'prix' => $prix,
                    'allergene' => $allergene,
                    'typeP' => $type,
                    'dateM' => date("d-m-Y"),
                    'dateH' => date("d-m-Y h:i:s"),
                    'idP' => $id
                );
        
        $resultat = $this->queryRow($req, $donnees);
    }

    //modifier produits sans images
    public function modifierProduitSansImages($id, $nom, $prix, $type, $allergene)
    {
        $req = "UPDATE Produit SET NomProduit = :nom, Prix = :prix, Allergene = :allergene, TypePlat = :typeP,dateModif = :dateM, dateEtHeure = :dateH WHERE idProduit = :idP"; 
        $donnees = array(
                    'nom' => $nom,
                    'prix' => $prix,
                    'allergene' => $allergene,
                    'typeP' => $type,
                    'dateM' => date("d-m-Y"),
                    'dateH' => date("d-m-Y h:i:s"),
                    'idP' => $id
                );
        
        $resultat = $this->queryRow($req, $donnees);
    }

    public function obtenirProduit($info)
    {
        $requete = "SELECT * FROM Produit WHERE idProduit = ?";
       
        $donnee = array($info);

        $resultat = $this->queryRow($requete, $donnee);

        $produit = new Produit(
                        $resultat['idProduit'],
                        $resultat['NomProduit'],
                        $resultat['Image1'],
                        $resultat['Image2'],
                        $resultat['Image3'],
                        $resultat['DateModif'],
                        $resultat['Prix'],
                        $resultat['Allergene'],
                        $resultat['TypePlat']
                    );

        return $produit;

    }
   
    public function obtenirListeProduits()
    {
        
        $listeProduits = [] ;
        $produits = $this->queryAll("SELECT * from Produit",null);

        if($produits==null)
        {
            return null;
        }

        foreach($produits as $resultat) 
        {
            $produit = new Produit(
                            $resultat['idProduit'],
                            $resultat['NomProduit'],
                            $resultat['Image1'],
                            $resultat['Image2'],
                            $resultat['Image3'],
                            $resultat['DateModif'],
                            $resultat['Prix'],
                            $resultat['Allergene'],
                            $resultat['TypePlat']
                        );

            $listeProduits[] = $produit;
        }
        return $listeProduits;

    }

    public function obtenirListeProduitsPrix($prixMin, $prixMax)
    {
        $listeProduits = [] ;
        $requete = "SELECT * from Produit WHERE Prix BETWEEN ? AND ?";
        $donnees = array($prixMin, $prixMax);

        $produits = $this->queryAll($requete, $donnees);

        foreach($produits as $resultat) 
        {
            $produit = new Produit(
                            $resultat['idProduit'],
                            $resultat['NomProduit'],
                            $resultat['Image1'],
                            $resultat['Image2'],
                            $resultat['Image3'],
                            $resultat['DateModif'],
                            $resultat['Prix'],
                            $resultat['Allergene'],
                            $resultat['TypePlat'],
                        );

            $listeProduits[] = $produit;
        }
        return $listeProduits;

    }
    
    public function obtenirListeNoms($nom)
    {
        $listeTousProduits = $this->obtenirListeProduits();
        
        $listeProduits = [];
        
        foreach($listeTousProduits as $unProduit)
        {
            $regex = '#'.$unProduit->obtenir_nom_produit().'+.*#i';
            if(preg_match($regex,$nom))
            {
                $listeProduits[] = $unProduit;
            }
        }
        return $listeProduits;
    }

    public function obtenirListeIngredient($idProduit)
    {
        $listeIngredients = [];
        $req = "select idIngredient from Contenir where idProduit=?";
        $produits = $this->queryAll($req,array($idProduit));
        foreach($produits as $resultat) 
        {
            $produit = $resultat['idIngredient'];

            $listeProduits[] = $produit;
        }
        return $listeProduits;

    }

    public function obtenirListeCriteres($idProduit)
    {
        $listeIngredients = [];
        $req = "select idCritere from avoir_critere where idProduit=?";
        $produits = $this->queryAll($req,array($idProduit));
        foreach($produits as $resultat) 
        {
            $produit = $resultat['idCritere'];

            $listeProduits[] = $produit;
        }
        return $listeProduits;

    }


    public function obtenirListeProduitsAvecIngredients($listeingredients, $listeproduits = null)
    {
        $listeproduitsfinale = [] ;
        $sql = 'SELECT *
        FROM Produit AS P, Contenir AS C
        WHERE P.idProduit = C.idProduit ' ;
        if(!empty($listeingredients))
        {
            $sql = $sql.'AND (' ;
            $i = 0 ;
            foreach($listeingredients as $ingredient)
            {
                $sql = $sql." C.idIngredient = ".$ingredient." OR " ;
                $i++ ;
            } 
            $sql = substr($sql, 0, -3) ;
            $sql = $sql.') ' ;
        }
        else
        {
            $i = null ;
        }
        $sql = $sql.'GROUP BY P.idProduit
                HAVING COUNT(P.idProduit) = ? ' ;
        $resultat = $this->queryAll($sql, array($i)) ;
        foreach($resultat as $produit)
        {
            $unproduit = new Produit(
                            $produit['idProduit'],
                            $produit['NomProduit'],
                            $produit['Image1'],
                            $produit['Image2'],
                            $produit['Image3'],
                            $produit['DateModif'],
                            $produit['Prix'],
                            $produit['Allergene'],
                            $produit['TypePlat'],
                        );
            $listeproduitsfinale[] = $unproduit ;
        }
        return $listeproduitsfinale ;
    }

    // Version pour les critères : même principe que la méthode de filtrage pour les ingrédients.

    public function obtenirListeProduitsAvecCriteres($listecriteres, $listeproduits = null)
    {
        $listeproduitsfinale = [] ;
        $sql = 'SELECT *
        FROM Produit AS P, Avoir_critere AS A
        WHERE P.idProduit = A.idProduit ' ;
        if(!empty($listecriteres))
        {
            $sql = $sql.'AND (' ;
            $i = 0 ;
            foreach($listecriteres as $critere)
            {
                $sql = $sql." A.idCritere = ".$critere." OR " ;
                $i++ ;
            } 
            $sql = substr($sql, 0, -3) ;
            $sql = $sql.') ' ;
        }
        else
        {
            $i = null ;
        }
        $sql = $sql.'GROUP BY P.idProduit
                HAVING COUNT(P.idProduit) = ? ' ;
        $resultat = $this->queryAll($sql, array($i)) ;
        foreach($resultat as $produit)
        {
            $unproduit = new Produit(
                            $produit['idProduit'],
                            $produit['NomProduit'],
                            $produit['Image1'],
                            $produit['Image2'],
                            $produit['Image3'],
                            $produit['DateModif'],
                            $produit['Prix'],
                            $produit['Allergene'],
                            $produit['TypePlat'],
                        );
            $listeproduitsfinale[] = $unproduit ;
        }
        return $listeproduitsfinale;
    }
    
    public function obtenirPrixMax()
    {
        $req = 'select max(Prix) from Produit';
        $prixMax = $this->queryRow($req);
        return $prixMax;
    }
    
    public function trierParNom()
    {
        $listeProduits = [] ;
        $produits = $this->queryAll("SELECT * from Produit order by nomProduit",null);

        foreach($produits as $resultat) 
        {
            $produit = new Produit(
                            $resultat['idProduit'],
                            $resultat['NomProduit'],
                            $resultat['Image1'],
                            $resultat['Image2'],
                            $resultat['Image3'],
                            $resultat['DateModif'],
                            $resultat['Prix'],
                            $resultat['Allergene'],
                            $resultat['TypePlat']
                        );

            $listeProduits[] = $produit;
        }
        return $listeProduits;
    }
    
    public function trierParPrix()
    {
        $listeProduits = [] ;
        $produits = $this->queryAll("SELECT * from Produit order by prix",null);

        foreach($produits as $resultat) 
        {
            $produit = new Produit(
                            $resultat['idProduit'],
                            $resultat['NomProduit'],
                            $resultat['Image1'],
                            $resultat['Image2'],
                            $resultat['Image3'],
                            $resultat['DateModif'],
                            $resultat['Prix'],
                            $resultat['Allergene'],
                            $resultat['TypePlat']
                        );

            $listeProduits[] = $produit;
        }
        return $listeProduits;
    }
    
    public function trierParDate()
    {
        $listeProduits = [] ;
        $produits = $this->queryAll("SELECT * from Produit order by dateModif",null);

        if($produits==null)
        {
            return null;
        }
        foreach($produits as $resultat) 
        {
            $produit = new Produit(
                            $resultat['idProduit'],
                            $resultat['NomProduit'],
                            $resultat['Image1'],
                            $resultat['Image2'],
                            $resultat['Image3'],
                            $resultat['DateModif'],
                            $resultat['Prix'],
                            $resultat['Allergene'],
                            $resultat['TypePlat']
                        );

            $listeProduits[] = $produit;
        }
        return $listeProduits;
    }

    public function obtenirPlatJour()
    {
        $listeProduits = [] ;
        $produits = $this->queryAll("SELECT * from Produit order by dateEtHeure",null);

        if($produits==null)
        {
            return null;
        }

        foreach($produits as $resultat) 
        {
            $produit = new Produit(
                            $resultat['idProduit'],
                            $resultat['NomProduit'],
                            $resultat['Image1'],
                            $resultat['Image2'],
                            $resultat['Image3'],
                            $resultat['DateModif'],
                            $resultat['Prix'],
                            $resultat['Allergene'],
                            $resultat['TypePlat']
                        );
            echo '<script>console.log("nom : '.$produit->obtenir_nom_produit().'")</script>';

            $listeProduits[] = $produit;
        }

        $nbProduits = sizeof($listeProduits);
        $nbRandom = rand (0, $nbProduits-1);
        echo '<script>console.log("nbproduits : '.$nbProduits.'")</script>';
        echo '<script>console.log("random : '.$nbRandom.'")</script>';
        $unProd = $listeProduits[$nbRandom];
        echo '<script>console.log("hey")</script>';


        echo '<script>console.log("nom final : '.$unProd->obtenir_nom_produit().'")</script>';
        return $unProd;
	}

    public function obtenirProduitsNouveautes()
    {
        $listeProduits = [] ;
        $produits = $this->queryAll("SELECT * from Produit order by dateEtHeure DESC LIMIT 3",null);

        if($produits==null)
        {
            return null;
        }

        foreach($produits as $resultat) 
        {
            $produit = new Produit(
                            $resultat['idProduit'],
                            $resultat['NomProduit'],
                            $resultat['Image1'],
                            $resultat['Image2'],
                            $resultat['Image3'],
                            $resultat['DateModif'],
                            $resultat['Prix'],
                            $resultat['Allergene'],
                            $resultat['TypePlat']
                        );
            $listeProduits[] = $produit;
        }
        return $listeProduits;
    }

    public function supprimerAnciensProduits() //Supprimer pour éviter de gâcher de la mémoire
    {
        $date=date ("d-m-Y");
        $req= $this->queryRow("DELETE FROM platdujour where dateJour<?",array($date));
	}


    
}
?>