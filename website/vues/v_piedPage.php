<?php

?>

<!-- Footer -->
</main>
<footer class="bg-success text-white m-0 w-100" style="">
    <div class="container pt-3">

        <div class="row">

            <div class="col-sm-5 offset-1">
                <p>Retrouvez-nous sur les réseaux sociaux</p>

                <div class="d-flex">
                    <div class="pr-2">
                        <a href="http://facebook.com">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </div>

                    <div class="pr-2">
                        <a href="http://twitter.com">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>

                    <div class="pr-2">
                        <a href="http://instagram.com">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                    
                </div>
                
            </div>

            <div class="col-sm-5">
                <p class="text-right">Contactez-nous</p>
                <div class="boutonMail btn btn-light btn-sm text-success float-right" onclick="mail();">Envoyer un mail</div>
            </div>

        </div>
    </div>

    <div class="footer-copyright text-center font-weight-bold mt-3 mt-sm-1"> Golden Tulip Restaurant &copy 2020</div>
        
</footer>

<script>
    function mail() {
        $('.ui.modal')
            .modal({
                blurring: true
            })
            .modal('show')
        ;
    }

</script>


<!-- Modal mail -->

<div class="ui tiny modal" style="position: relative; height: 220px;">
  <i class="close icon"></i>
  <div class="header">
    Envoyez-nous un message
  </div>
  <div class="content">
  Le client peut envoyer un message au restaurant. Par souci de simplicité nous n'avons pas développé cette fonctionnalité, mais dans le cas d'un client réel, un formulaire s'afficherait pour envoyer un message.
</div>
  <div class="actions">
    <div class="ui cancel button">Annuler</div>
    <div class="ui ok button green">Envoyer</div>
  </div>
</div>
