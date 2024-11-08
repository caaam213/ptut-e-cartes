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
$titre = 'Gestion du restaurant';
$affichageStatistique = 'non';
require_once(CHEMIN_VUES.'gestionRestaurant.php');