<?php
require_once(CHEMIN_MODELES.'ingredientModele.php');
require_once(CHEMIN_MODELES.'critereModele.php');
require_once(CHEMIN_MODELES.'produitModele.php');

if(isset($_POST['tri'])) //Tri de la recherche
{
    $trier = htmlspecialchars($_POST['tri']);
    
    if($trier=='nom')
    {
        $listeProduits = $modele_produit->trierParNom();
    }
    else if($trier=="nouveaute")
    {
        $listeProduits = $modele_produit->trierParDate();
    }
    else if($trier=='prix')
    {
        $listeProduits = $modele_produit->trierParPrix();
    }
}
else
{
    $listeProduits = $modele_produit->trierParNom(); //Trier par nom par défaut
}


$modeleObjet = new IngredientManager(true);
$listeIngredients = $modeleObjet->obtenirListeIngredients();

$modeleObjet2 = new CritereManager(true);
$listeCriteres = $modeleObjet2->obtenirListeCriteres();

$listeProduitsOu = []; //Liste des produits suggerés
$rien = false; //Variable qui va servir pour afficher le dialogue des suggestions
    
//Recherche par prix   
if(isset($_POST['prixmin']) || isset($_POST['prixmax']))
{
        $prixMin = htmlspecialchars($_POST['prixmin']);
        $prixMax = htmlspecialchars($_POST['prixmax']);
        
        // On récupère tous les plats dont les prix sont situés entre prixMin et prixMax
        $listeProduitsPrix = $modele_produit->obtenirListeProduitsPrix($prixMin, $prixMax) ;
        $listeProduitsOu = $modele_produit->obtenirListeProduitsPrix($prixMin, $prixMax) ;
        
        if($listeProduits!=null)
        {
            foreach ($listeProduits as $unProduit)
            {
                if(!in_array($unProduit,$listeProduitsPrix))
                {
                    unset($listeProduits[array_search($unProduit, $listeProduits)]);
                }
            }
        }
        
        
        foreach($listeProduitsOu as $unProduit)
        {
            if($listeProduitsOu!=null)
            {
                if(!in_array($unProduit,$listeProduitsOu))
                {
                    $listeProduitsOu[] = $unProduit;
                }
            }
            else
            {
                $listeProduitsOu[] =$unProduit;
            }
            
        }

        if($_POST['prixmin']>$_POST['prixmax'])
        {
            $ajoutImpossible = true;
        }
}
else
{
    $prixMin = 0;
    $prixMax = 999999;
    // Récupération de tous les plats
}



//Recherche par nom
if(isset($_POST['nomPlat']))
{
    if($_POST['nomPlat']!="")
    {
        $nom = htmlspecialchars($_POST['nomPlat']);
        $nom = ucfirst($nom);
        $listeProduitsNom= $modele_produit->obtenirListeNoms($nom);
        
        if($listeProduits!=null)
        {
            foreach ($listeProduits as $unProduit)
            {
                if(!in_array($unProduit,$listeProduitsNom))
                {
                    unset($listeProduits[array_search($unProduit, $listeProduits)]);
                }
            }
        }
        
        
        foreach($listeProduitsOu as $unProduit)
        {
            if($listeProduitsOu!=null)
            {
                if(!in_array($unProduit,$listeProduitsOu))
                {
                    $listeProduitsOu[] = $unProduit;
                }
            }
            else
            {
                $listeProduitsOu[] = $unProduit;
            }
        }
    }
    
    

    
}

//Recherche par ingredients
if(isset($_POST['tabIngredients']))
{
    $tabIngredients = $_POST['tabIngredients'];
    $listeProduitsIngredients = $modele_produit->obtenirListeProduitsAvecIngredients($tabIngredients);
    if($listeProduits!=null)
    {
    
        foreach ($listeProduits as $unProduit)
        {
            if(!in_array($unProduit,$listeProduitsIngredients))
            {
                unset($listeProduits[array_search($unProduit, $listeProduits)]);
            }
        }
    }
    
    foreach($listeProduitsOu as $unProduit)
    {
        if($listeProduitsOu!=null)
        {
            if(!in_array($unProduit,$listeProduitsOu))
            {
                $listeProduitsOu[] = $unProduit;
            }
        }
        else
        {
            $listeProduitsOu[] = $unProduit;
        }

    }
    
        
}


//Recherche par critères
if(isset($_POST['tabCriteres']))
{
    $tabCriteres = $_POST['tabCriteres'];
    $listeProduitsCriteres = $modele_produit->obtenirListeProduitsAvecCriteres($tabCriteres);
    
    if($listeProduits!=null)
    {
    
        foreach ($listeProduits as $unProduit)
        {
            if(!in_array($unProduit,$listeProduitsCriteres))
            {
                unset($listeProduits[array_search($unProduit, $listeProduits)]);
            }
        }
    }
    
    foreach($listeProduitsOu as $unProduit)
    {
        if($listeProduitsOu!=null)
        {
            if(!in_array($unProduit,$listeProduitsOu))
            {
                $listeProduitsOu[] = $unProduit;
            }
        }
        else
        {
            $listeProduitsOu[] = $unProduit;
        }

  
        
    }
    
    
    
}


//Suggestions au cas où la recherche ne donne rien
if($listeProduits==null)
{
    
    if($listeProduitsOu==null)
    {
        $listeProduitsOu = $modele_produit->obtenirListeProduits();
    }
    shuffle($listeProduitsOu);
    
    if(isset($listeProduitsNom))
    {
        if(count($listeProduitsNom)!=0)
        {
            $listeProduits = $listeProduitsNom; //Plus pertinent si la personne saisi un nom de plat 
        }
        else
        {
            if(count($listeProduitsOu)>3) //Permet de suggérer que 3 plats
            {
                for($i=0;$i<3;$i++)
                {
                    $listeProduits[] = $listeProduitsOu[$i];
                }
            }
            else
            {
                $listeProduits = $listeProduitsOu;
            }
        }
    }
    
    else
    {
        if(count($listeProduitsOu)>3) //Permet de suggérer que 3 plats
        {
            for($i=0;$i<3;$i++)
            {
                $listeProduits[] = $listeProduitsOu[$i];
            }
        }
        else
        {
            $listeProduits = $listeProduitsOu;
        }
    }
    
    
    
    
    $rien = true;
}


