<?php
    require_once(CHEMIN_MODELES.'modele.php');

    class IdentificationModele extends Modele
    {
        private $_bd ;

        public function __construct($connexion)
        {
            $this->changer_bd($connexion) ;
        }

        public function changer_bd($valeur)
        {
            $this->_bd = $valeur ;
        }

        public function obtenir_bd()
        {
            return $this->_bd ;
        }

        public function recup_mdp_gestion()
        {
            $listeMdp = [];
            $query = "select * from mdp_gestion";
            $res = $this->queryAll($query);
            
            foreach($res as $unMdp)
            {
                $listeMdp[] = $unMdp['mdp'];
            }
            return $listeMdp;
        }

        public function recup_mdp_cuisine()
        {
            $listeMdp = [];
            $query = "select * from mdp_cuisine";
            $res = $this->queryAll($query);

            foreach($res as $unMdp)
            {
                $listeMdp[] = $unMdp['mdp'];
            }
            return $listeMdp;
        }
    }




?>