<?php
    require_once(CHEMIN_VUES."header_stylecss.php");
?>
    <link rel="stylesheet" href="<?= CHEMIN_CSS ?>styleModif.css">
    <link rel="stylesheet" href="<?= CHEMIN_CSS ?>style.css">
<body> 

    <div class="container">
        <div class="row justify-content-md-between justify-content-center mt-md-5 mt-3 col-12 m-0">
            <button class="btn classicButton deleteButton col-md-3 col-11 text-center m-md-0 my-2"  onclick="window.location.href = 'index.php';">Retour</button>
        </div>  
    </div>
    

    <div class="container mt-5">
        <div class="row justify-content-center">
		    <?='<img class="logo" src="'.CHEMIN_LOGO.'">'?>
        </div>
        
        <div class="row justify-content-center text-center">
            <h1 class="font-weight-bold text-center"> Golden Tulip Restaurant</h1>
        </div>

        <div class="row justify-content-center">
            <p class="font-weight-bold">Accès à l'interface de gestion administrateur</p>
        </div>
    
<?php

        if (isset($erreur))  {
?>
        <div class="blocProduit rounded-pill text-center col-6 mx-auto pb-1 pt-3">
            <p style=" color : red ;"><?= $erreur?></p>
        </div>

<?php
    }
?>
        <div class="container mt-2">
            <form action="" method="POST">
                <div class="row justify-content-center blocProduit col-10 col-sm-10 col-md-8 col-lg-6 mx-auto">
                    <p class="font-weight-bold col-12 text-center pt-2">Entrer votre mot de passe</p>
                    <input class="form-control text-center col-10 border border-dark" type="password" name="mdp" id="name" placeholder="Mot de passe">
                    <div class="col-12">
                        <p> </p>
                    </div>
                    <button type="submit" name="ok" class="btn btn-success col-5 mb-4">Connexion</button>
                </div>
            </form>
            
            
            
        </div>        
    </div>
    
</body>
</html>