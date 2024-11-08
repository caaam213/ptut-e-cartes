
<?php
	require_once(CHEMIN_MODELES.'identification.php');

	$identificationMod = new IdentificationModele(true);
	$listeMdpGestion = $identificationMod->recup_mdp_gestion();
	$listeMdpCuisine = $identificationMod->recup_mdp_cuisine(); 

	if(isset($_COOKIE['type']))
	{
		if($_COOKIE['type']=="gestion")
		{
			header('Location: index.php?page=gestionRestaurant');
		}
		else
		{
			header('Location: index.php?page=listeCommandesCuisine');
		}
	}

	if(isset($_POST['ok']))
	{
		//je lui donne une valeur
		$motdepasseAdmin = htmlspecialchars($_POST['mdp']);

		//si le mdp entré est celui de l'admin
		foreach($listeMdpGestion as $unMdp) {
			//je crée une session
			if(password_verify($motdepasseAdmin,$unMdp))
			{
				$_SESSION['type'] = 'gestion';
				setcookie("type",$_SESSION['type'],time()+3600);
				header('Location: index.php?page=gestionRestaurant');
			}
			
		}

		foreach($listeMdpCuisine as $unMdp){
			if(password_verify($motdepasseAdmin,$unMdp))
			{
				$_SESSION['type'] = 'cuisine';
				setcookie("type",$_SESSION['type'],time()+3600);
				header('Location: index.php?page=listeCommandesCuisine');
			}
			
		}

		if (!isset($_COOKIE['type']))
		{
			$erreur = 'Le mot de passe entré ne correspond à aucun espace !' ;
		}
	}


require_once(CHEMIN_VUES.$page.".php");
