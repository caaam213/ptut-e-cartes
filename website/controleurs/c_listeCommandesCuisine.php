<?php
if(!isset($_COOKIE["type"]))
{
    header('Location: index.php?page=identification');
}
else
{
    if($_COOKIE["type"]!="cuisine")
    {
        header('Location: index.php?page=mauvaisEspace');
    }
}
$titre = 'Liste Commandes - Cuisine';
require_once(CHEMIN_VUES.$page.'.php');