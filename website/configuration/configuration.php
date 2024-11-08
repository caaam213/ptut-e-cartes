<?php
 
	const DEBUG = true; // production : false; dev : true

	// Accès base de données
	const BD_HOTE = 'localhost';
	const BD_NOMBD = 'ptut_e_cartes_bd';
	const BD_UTILISATEUR = 'root';
	const BD_MDP = '';

	// Langue du site
	const LANG ='FR-fr';

	// Paramètres du site : nom de l'auteur ou des auteurs
	define('AUTEUR',array('Mohamed BENALIA', 'Amîn DAHMANI', 'Camélia MERAOUI', 'Nashila AMOD', 'Baptiste FAURE')); 

	//dossiers racines du site
	define('CHEMIN_CONTROLEURS','./controleurs/c_');
	define('CHEMIN_CLASSES','./classes/');
	define('CHEMIN_RESSOURCES','./ressources/');
	define('CHEMIN_LIB','./librairie/');
	define('CHEMIN_MODELES','./modeles/m_');
	define('CHEMIN_VUES','./vues/v_');
	define('CHEMIN_TEXTES','./langages/');

	//sous dossiers
	define('CHEMIN_CSS', CHEMIN_RESSOURCES.'css/');
	define('CHEMIN_ILLUSTRATIONS', CHEMIN_RESSOURCES.'illustrations/');
	define('CHEMIN_SCRIPTS', CHEMIN_RESSOURCES.'scripts/');

	//sous dossiers pour les illustrations
	define('CHEMIN_ICONES', CHEMIN_ILLUSTRATIONS.'icones/');
    define('CHEMIN_IMAGES', CHEMIN_ILLUSTRATIONS.'images/');
    define('CHEMIN_IMAGES_PRODUITS', CHEMIN_IMAGES.'produits/');
    define('CHEMIN_LOGO',CHEMIN_IMAGES.'logo.png');

?>

    