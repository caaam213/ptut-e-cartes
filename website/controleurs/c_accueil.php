<?php
if(isset($_GET['deconnexion']))
{
    setcookie("type","",time()-36000);
    header('Location: index.php');
    
}
$titre = 'Accueil';
require_once(CHEMIN_MODELES.'produitModele.php');

$modele_produit = new ProduitManager(true) ;
$modele_produit->supprimerAnciensProduits();

$listePlatsNouveaux = $modele_produit->obtenirProduitsNouveautes();
$platDuJour = $modele_produit->obtenirPlatJour();

if($listePlatsNouveaux==null)
{
    header('Location: index.php?page=identification');
}


require_once(CHEMIN_CONTROLEURS.'formulaireRecherche.php');

require_once(CHEMIN_VUES.$page.".php");

