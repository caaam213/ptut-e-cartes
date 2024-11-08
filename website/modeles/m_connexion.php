<?php
// Implémente le pattern Singleton
class Connexion 
{
  private $_bdd = null;
  private static $_instance = null;

  //appelée par new
  private function __construct ()
  {
	$this->_bdd = new PDO('mysql:host='.BD_HOTE.';port=3308; dbname='.BD_NOMBD.'; charset=utf8', BD_UTILISATEUR, BD_MDP);
	$this->_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  public static function getInstance()
  {
    if(is_null(self::$_instance))
      self::$_instance = new Connexion();
    return self::$_instance;
  }

  public function getBdd()
  {
    return $this->_bdd;
  }

}
