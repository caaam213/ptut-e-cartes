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
$titre = 'Ajout de produits';
require_once(CHEMIN_MODELES.'ingredientModele.php');
require_once(CHEMIN_MODELES.'critereModele.php');
require_once(CHEMIN_MODELES.'produitModele.php');
$modeleObjet = new IngredientManager(true);
$listeIngredients = $modeleObjet->obtenirListeIngredients();
$modeleObjet2 = new CritereManager(true);
$listeCritere = $modeleObjet2->obtenirListeCriteres();

$img1 = null;
$img2 = null;
$img3 = null;
$ajoutOk = 1; // Variable indiquant si on peut ajouter un produit ou non

if(!isset($_COOKIE['type']))
{
    header('Location: index.php?page=identification');
}
else
{
    if($_COOKIE['type']!="gestion")
    {
        header('Location: index.php?page=mauvaisEspace');
    }
}

$produit_modele = new ProduitManager(true);

if(isset($_POST['_nom_produit']))
{
    $nomProduit = ucfirst(htmlspecialchars($_POST['_nom_produit']));
    
    $allergene_produit = htmlspecialchars($_POST['_allergene_produit']);
    $prix = $_POST['_prix_produit'];
    $type_plat = htmlspecialchars($_POST['_type_plat_produit']);

    if(isset($_POST['tabIngredients']))
    {
        $tabIngredients = $_POST['tabIngredients'];
    }
    else
    {
        $ajoutOk=0;
    }

    if (isset($_POST['tabCriteres']))
    {
        $tabCriteres = $_POST['tabCriteres'];
    }
    else
    {
        $ajoutOk=0;
    }




    // S'il y a des fichiers, on traite les images
    if($_FILES["file"]["name"][0] != '') 
    {
        // Compter le nombre total de fichiers téléchargés
        $nbFichiers = count($_FILES['file']['name']);

        // Boucle sur tous les fichiers
        for($i=0;$i<$nbFichiers;$i++)
        {

            // On vérifie que le fichier s'est bien téléchargé, sinon erreur

            if($_FILES['file']['error'][$i] == 0)
            {
                $nomFichier = $_FILES['file']['name'][$i];

                // On vérifie que l'extension est correct, sinon erreur
                $ext=pathinfo($nomFichier,PATHINFO_EXTENSION);
                if(in_array($ext, array('jpg', 'jpeg', 'png')))
                {
                    if ($i == 0) {
                     $img1 = $nomFichier ; 
                    }
                    elseif ($i == 1) {
                        $img2 = $nomFichier ; 
                    }
                    elseif ($i == 2) {
                        $img3 = $nomFichier ; 
                    }
      
                    // Télécharger des fichiers et stocker dans la base de données
                    move_uploaded_file($_FILES["file"]["tmp_name"][$i],CHEMIN_IMAGES_PRODUITS.$nomFichier);
                }
                else
                {
                    $ajoutOk=0;
?>
                    <script type="text/javascript">
                        alert("Vous ne pouvez insérer que images de type jpg, jpeg ou png");
                    </script>
<?php
                } 

            }
            else
            {
                $ajoutOk=0;
?>
                <script type="text/javascript">
                    alert("Erreur : Fichiers trop volumineux");
                </script> 
<?php            
            }
        }
        
    }

    if($ajoutOk==1)
    {

        $produit = new Produit(null,$nomProduit,$img1,$img2,$img3,null,$prix,$allergene_produit,$type_plat);
        $produit_modele->ajouterProduit($produit, $tabIngredients,$tabCriteres);
        header("location:index.php?page=listeProduits"); 
    }
   

}

require_once(CHEMIN_VUES.'ajoutProduits.php');

?>