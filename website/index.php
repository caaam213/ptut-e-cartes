<?php

// Initialisation des paramètres du site
require_once('./configuration/configuration.php');

//Lancement de la session 
session_start(); 

if(isset($_GET['?dec']) && $_GET['?dec'] == 'o?/k')
{
	$_SESSION['login'] = false ; 
}

//vérification de la page demandée 
if(isset($_GET['page']))
{
  $page = htmlspecialchars($_GET['page']);
  if(!is_file(CHEMIN_CONTROLEURS.$_GET['page'].".php"))
  { 
    $page = '404'; //page demandée inexistante
  }
}
else
    $page='accueil'; //page d'accueil du site - http://.../index.php

//appel du controller
require_once(CHEMIN_CONTROLEURS.$page.'.php'); 

?>
