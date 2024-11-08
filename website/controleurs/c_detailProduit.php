<?php

require_once(CHEMIN_MODELES.'produitModele.php');
require_once(CHEMIN_MODELES.'ingredientModele.php');
require_once(CHEMIN_MODELES.'critereModele.php');
$modele_ingredient = new IngredientManager(true);
$modele_critere = new CritereManager(true);
$modele_produit = new ProduitManager(true);

$titre = 'Detail du plat';
require_once(CHEMIN_MODELES.'produitModele.php');

if(isset($_GET['id']))
{
    $idProduit =(int)htmlspecialchars($_GET['id']);

    $recuperationDuProduit = new ProduitManager(true);
    $produit = $recuperationDuProduit->obtenirProduit($idProduit);

    if($produit->obtenir_id_produit() == '')
    {
        header("location:index.php?page=rechercheProduits"); 
    }

}

require_once(CHEMIN_VUES.$page.".php");