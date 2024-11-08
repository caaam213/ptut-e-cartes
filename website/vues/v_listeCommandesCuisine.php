<?php require_once(CHEMIN_VUES.'header.php');?>
<link rel="stylesheet" href="<?= CHEMIN_CSS ?>style.css">
</head>

<body>
         
    <!-- Tout le contenu de la page est placé dans un div "container" afin de faciliter le responsive Bootstrap-->
    <div class="container pb-3">
        
        <!-- Si la page affiche des statistiques, le headerGestionCuisine les affichera, sinon aucune stastistique ne sera affichée -->
        <?php $affichageStatistique = 'oui' ?>
        <?php require_once(CHEMIN_VUES.'header_GestionCuisine.php'); ?>
       
        <!-- Titre page -->

        <div class="row justify-content-center col-12 mt-3 m-0">
            <p style="font-size: 1.4em;">Liste des commandes - Cuisine</p>
        </div>

        <div class="container row justify-content-md-between justify-content-center mt-md-5 mt-3 col-12 m-0 text-center">
            
            <div class="container mt-md-5 mt-3 col-12 col-lg-6 m-0">
                <p style="font-size: 1.4em;">Commandes en cours</p>
                
                <div class="row justify-content-between mt-3 col-12 m-0 blocProduit">

                    <div class="d-flex justify-content-between col-12 m-0 py-3">
                        <div class="partieGaucheCommande col text-left p-0">
                            <span class="d-block mb-2 font-weight-bold">Commandes N°14-03</span>
                            <span class="d-block mb-2 text-success">Plats (3)</span>
                            <ul class="m-0 list-unstyled">
                                <li>Tartiflette</li>
                                <li>Pâtes Carbonara</li>
                                <li>Pizza Marguarita</li>
                            </ul>
                        </div>

                        <div class="d-flex flex-column justify-content-between align-items-end partieDroiteCommande col text-right p-0">
                            <div class="partieTempsComande">
                                <span class="d-block text-secondary">Commandé à 12:56</span>
                                <span class="d-block text-danger">Temps d'attente</span>
                            </div>
                            <div class="partieBoutonsCommande w-65">
                                <span class="text-center font-weight-bold">Prix Total : 34 Eur</span>
                                <button type="button" data-toggle="modal" data-target="#comEndedModal" class="btn btn-success btn-sm btn-block">Commande terminée</button>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row justify-content-between mt-3 col-12 m-0 blocProduit">
                    <div class="d-flex justify-content-between col-12 m-0 py-3">
                        <div class="partieGaucheCommande col text-left p-0">
                            <span class="d-block mb-2 font-weight-bold">Commandes N°14-04</span>
                            <span class="d-block mb-2 text-success">Plats (1)</span>
                            <ul class="m-0 list-unstyled">
                                <li>Salade orientale</li>
                            </ul>
                        </div>

                        <div class="d-flex flex-column justify-content-between align-items-end partieDroiteCommande col text-right p-0">
                            <span class="text-secondary">Commandé à 13:04</span>
                            <div class="partieBoutonsCommande w-65">
                                <span class="text-center font-weight-bold">Prix Total : 14 Eur</span>
                                <button type="button" data-toggle="modal" data-target="#comEndedModal" class="btn btn-success btn-sm btn-block">Commande terminée</button>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row justify-content-between mt-3 col-12 m-0 blocProduit">
                    <div class="d-flex justify-content-between col-12 m-0 py-3">
                        <div class="partieGaucheCommande col text-left p-0">
                            <span class="d-block mb-2 font-weight-bold">Commandes N°14-05</span>
                            <span class="d-block mb-2 text-success">Plats (2)</span>
                            <ul class="m-0 list-unstyled">
                                <li>Omelette aux lardons</li>
                                <li>Kebab</li>
                            </ul>
                        </div>

                        <div class="d-flex flex-column justify-content-between align-items-end partieDroiteCommande col text-right p-0">
                            <span class="text-secondary">Commandé à 13:09</span>
                            <div class="partieBoutonsCommande w-65">
                                <span class="text-center font-weight-bold">Prix Total : 21 Eur</span>
                                <button type="button" data-toggle="modal" data-target="#comEndedModal" class="btn btn-success btn-sm btn-block">Commande terminée</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-between mt-3 col-12 m-0 blocProduit">

                    <div class="d-flex justify-content-between col-12 m-0 py-3">
                        <div class="partieGaucheCommande col text-left p-0">
                            <span class="d-block mb-2 font-weight-bold">Commandes N°14-06</span>
                            <span class="d-block mb-2 text-success">Plats (5)</span>
                            <ul class="m-0 list-unstyled">
                                <li>Tartiflette</li>
                                <li>Pâtes Carbonara</li>
                                <li>Pizza Marguarita</li>
                                <li>Salade</li>
                                <li>Poisson</li>
                            </ul>
                        </div>

                        <div class="d-flex flex-column justify-content-between align-items-end partieDroiteCommande col text-right p-0">
                            <span class="text-secondary">Commandé à 13:11</span>
                            <div class="partieBoutonsCommande w-65">
                                <span class="text-center font-weight-bold">Prix Total : 56 Eur</span>
                                <button type="button" data-toggle="modal" data-target="#comEndedModal" class="btn btn-success btn-sm btn-block">Commande terminée</button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="container mt-md-5 mt-3 col-12 col-lg-6 m-0">
                <p style="font-size: 1.4em;">Dernières commandes payées</p>

                <div class="row justify-content-between mt-3 col-12 m-0 blocProduit">

                    <div class="d-flex justify-content-between col-12 m-0 py-3">
                        <div class="partieGaucheCommande col text-left p-0">
                            <span class="d-block mb-2 font-weight-bold">Commandes N°14-03</span>
                            <span class="d-block mb-2 text-success">Plats (3)</span>
                            <ul class="m-0 list-unstyled">
                                <li>Tartiflette</li>
                                <li>Pâtes Carbonara</li>
                                <li>Pizza Marguarita</li>
                            </ul>
                        </div>
                        <span class="text-secondary">Validée à 12:56</span>
                    </div>

                </div>

                <div class="row justify-content-between mt-3 col-12 m-0 blocProduit">

                    <div class="d-flex justify-content-between col-12 m-0 py-3">
                        <div class="partieGaucheCommande col text-left p-0">
                            <span class="d-block mb-2 font-weight-bold">Commandes N°14-04</span>
                            <span class="d-block mb-2 text-success">Plats (1)</span>
                            <ul class="m-0 list-unstyled">
                                <li>Salade orientale</li>
                            </ul>
                        </div>
                        <span class="text-secondary">Validée à 13:04</span>
                    </div>

                </div>

            </div>

        </div>

        <!-- Bloc représentant la fenêtre modale de confirmation lors de la suppression d'un produit -->
        
        <div class="modal fade" id="comEndedModal" tabindex="-1" role="dialog" aria-labelledby="confirmationLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmationLabel">Commande terminée</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        Êtes-vous sûr de vouloir archiver cette commande en tant que commande terminée ?
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-danger">Valider</button>
                    </div>

                </div>
            </div>
        </div>
     
</body>
</html>