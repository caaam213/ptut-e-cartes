<?php
    $titre = 'Recherche Plat';
    require_once(CHEMIN_MODELES.'produitModele.php');

    $modele_produit = new ProduitManager(true) ;

    require_once(CHEMIN_CONTROLEURS.'formulaireRecherche.php');
    
    require_once(CHEMIN_VUES.'rechercheProduits.php');



