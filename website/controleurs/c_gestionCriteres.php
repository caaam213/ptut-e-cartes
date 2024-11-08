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
    $titre="Gestion des critères";
    require_once(CHEMIN_MODELES.'critereModele.php');
    $modeleObjet = new CritereManager(true);
    $listeCritere = $modeleObjet->obtenirListeCriteres();
    if(isset($_POST['critere_champ']))
    {
        $nomCritere = htmlspecialchars($_POST['critere_champ']);
        $nomCritere = ucfirst($nomCritere); 
        
        $identique = false;
        foreach($listeCritere as $unCritere)
        {
            if($nomCritere==$unCritere->obtenir_nom_Critere())
            {
                $identique = true;
            }
        }
        if($identique == false)
        {
            if($nomCritere!="")
            {
                $modeleObjet->ajouter($nomCritere);
                $alert="ajout";
            
            }
            
        }
        else
        {
            $alert="identique";
        }
        
    }
    if(isset($_GET['idsupp']))
    {
        $id = (int)htmlspecialchars($_GET['idsupp']);
        if($id!=null)
        {
            $modeleObjet->supprimer($id);
            $alert="supprime";
        }      
    }

    if(isset($_POST['NomModif']) && isset($_GET['idModif'])) {
        $idCritere2 = $_GET['idModif'];
        $nomCritere2 = $_POST['NomModif'];

        if($idCritere2!=null && $nomCritere2!=null)
        {
            $modeleObjet->maj($nomCritere2,$idCritere2);   
        }
    }

    $listeCritereFinale = $modeleObjet->obtenirListeCriteres();


    require_once(CHEMIN_VUES.'gestionCriteres.php');
?>