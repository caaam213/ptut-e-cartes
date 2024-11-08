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
$titre = 'Modification d\'un plat';
require_once(CHEMIN_MODELES.'ingredientModele.php');
require_once(CHEMIN_MODELES.'critereModele.php');
require_once(CHEMIN_MODELES.'produitModele.php');

$modeleCritere = new Avoir_critere(true);
$modeleContenir = new Contenir(true);
$modeleObjet = new IngredientManager(true);
$listeIngredients = $modeleObjet->obtenirListeIngredients();

$modeleObjet2 = new CritereManager(true);
$listeCritere = $modeleObjet2->obtenirListeCriteres();

$modificationProduit = new ProduitManager(true);

$img1 = null;
$img2 = null;
$img3 = null;
$ajoutOk=1;
$afficherMessage = false;

if(isset($_GET['id']))
{
    // RECUPERATION DES DONNEES 

    $idProduit =(int)htmlspecialchars($_GET['id']);

    $recuperationDuProduit = new ProduitManager(true);
    $produit = $recuperationDuProduit->obtenirProduit($idProduit);

    if($produit->obtenir_id_produit() == '')
    {
        header("location:index.php?page=listeProduits"); 
    }

    // Récupération de la liste des ingrédients du produit
    $listeIngredientsProduit = $modeleContenir->obtenirListeIngredientsProduit($idProduit);

    // Récupération de la liste des critères du produit
    $listeCriteresProduit = $modeleCritere->obtenirListeCriteresProduit($idProduit);


    
    // MODIFICATION DES DONNEES

    if(isset($_POST['valider']))
    {
        $afficherMessage = true;
    }

    if(isset($_POST['_nom_produit']) && isset($_POST['tabIngredients']) && isset($_POST['tabCriteres']))
    {
        $nomProduit = htmlspecialchars($_POST['_nom_produit']);
        $prixProduit = htmlspecialchars($_POST['_prix_produit']);
        $typePlat =  htmlspecialchars($_POST['_type_plat_produit']); 
        $allergene = htmlspecialchars($_POST['_allergene_produit']);

        
        $tabIngredients = $_POST['tabIngredients'];
        $tabCriteres = $_POST['tabCriteres'];
        
        //Supprimer ancienne liste des ingrédients
        $modeleContenir->supprimerIngredients($idProduit);

        // Supprimer ancienne liste des critères 
        $modeleCritere->supprimerCriteres($idProduit); 

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
            if($ajoutOk==1)
            {
                $modificationProduit->modifierProduitAvecImages($idProduit, $nomProduit, $img1, $img2, $img3, $prixProduit, $typePlat, $allergene);
                $modificationProduit->modifierIngredientsCriteres($produit, $tabIngredients,$tabCriteres);
                header("location:index.php?page=listeProduits");
            }
        }
        else
        {
            $modificationProduit->modifierProduitSansImages($idProduit, $nomProduit, $prixProduit, $typePlat, $allergene);  
            $modificationProduit->modifierIngredientsCriteres($produit, $tabIngredients,$tabCriteres);
            header("location:index.php?page=listeProduits");
        }

    }

    if(!isset($_POST['tabCriteres']) && $afficherMessage==true)
    {
        
            $ajoutOk=0;
            ?>
        <script type="text/javascript">
            alert("Veuillez ajouter au moins un critère");
        </script> 
        <?php
          
    }

    if(!isset($_POST['tabIngredients']) && $afficherMessage==true)
    {
        
        
            $ajoutOk=0;
            ?>
        <script type="text/javascript">
            alert("Veuillez ajouter au moins un ingrédient");
        </script> 
        <?php
        
    }
    

        

     
        

    }
    



require_once(CHEMIN_VUES.$page.'.php');
?>