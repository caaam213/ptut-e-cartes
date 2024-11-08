<?php
if(!isset($_COOKIE["type"]))
{
    header('Location: index.php?page=identification');
}
else
{
    if($_COOKIE["type"]!="gestion")
    {
        header('Location: index.php?page=mauvaisEspace');
    }
}
    $titre = 'Liste Produits';
    require_once(CHEMIN_MODELES.'produitModele.php');
    require_once(CHEMIN_MODELES.'ingredientModele.php');
    require_once(CHEMIN_MODELES.'critereModele.php');
    $modele_produit = new ProduitManager(true);
    $modele_ingredient = new IngredientManager(true);
    $modele_critere = new CritereManager(true);

    if(isset($_GET['id']) && $_GET['id'] != "")
    {
        $modele_produit->supprimerProduit($_GET['id']);
    }
    $listeProduits = $modele_produit->obtenirListeProduits();
    
    require_once(CHEMIN_VUES.'listeProduits.php');

