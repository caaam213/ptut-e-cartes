<?php

?>

<!-- Navbar -->
<nav class="navbar navbar-expand-md navbar-light bg-light fixed-top" id="main-nav">
    <div class="container">

        <a href="index.php" class="navbar-brand text-success font-weight-bold">
            <img src="<?= CHEMIN_LOGO ?>" width="35" height="35" class="d-inline-block align-top img-fluid" alt="">
            Golden Tulip Restaurant
        </a>
        

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mr-1">
                    <a href="#top" class="nav-link">Carte</a>
                </li>
                <li class="nav-item mr-1">
                    <a href="#emplacement" class="nav-link">Informations & Contact</a>
                </li>
                
            </ul>
        </div>

        <a href="index.php?page=identification" class="btn btn-success btn-sm ml-md-5 px-3" role="button">Espace Restaurant</a>
            
    </div>
</nav>