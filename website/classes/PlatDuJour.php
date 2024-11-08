<?php
	
	class PlatDuJour
	{
		private $date_du_jour;
		private $idProduit;
	

		public function __construct($date,$id)
		{
			$this->date_du_jour=$date;
			$this->idProduit = $id;
		}

		public function changer_date_du_jour($date)
		{
			$this->date_du_jour = $date;
		}

		public function changer_id_produit($id)
		{
			$this->idProduit=$id;
		}

		public function obtenir_date_du_jour()
		{
			return $this->date_du_jour;
		}
	
		public function obtenir_id_produit()
		{
			return $this->idProduit;
		}
	}
?>