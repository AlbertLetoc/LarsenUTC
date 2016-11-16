<?php
// implémentation du singleton sur PDO avec instanciation d'un unique objet de connexion en UTF-8
class SPDO extends PDO
{
   /**
   * Instance de la classe SPDO
   *
   * @var SPDO
   * @access private
   * @static
   */ 
  private static $instance = null;


   /**
   * Constante: hôte de la bdd
   *
   * @var string
   */
  const DEFAULT_SQL_HOST = 'localhost';
  
  /**
   * Constante: nom de la bdd
   *
   * @var string
   */
  const DEFAULT_SQL_DTB = 'larsendev';

  /**
   * Constante: nom d'utilisateur de la bdd
   *
   * @var string
   */
  const DEFAULT_SQL_USER = 'root';
 
  /**
   * Constante: pass de la bdd
   *
   * @var string
   */
  const DEFAULT_SQL_PASS = '';
 
  
 
  /**
   * Constructeur
   *
   * @param void
   * @return void
   * @see PDO::__construct()
   * @access public
   */
  public function __construct()
  {
    parent::__construct('mysql:host='.self::DEFAULT_SQL_HOST.';dbname='.self::DEFAULT_SQL_DTB ,self::DEFAULT_SQL_USER ,self::DEFAULT_SQL_PASS); // appel du construction de la classe mere (PDO)
    $this->exec("SET NAMES 'UTF8'"); 
    $this->exec("SET CHARACTER SET 'utf8'"); 
    //$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // mode debug: activation des warnings
    //$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); // mode debug: activation des exceptions
  }

 
   /**
    * Crée et retourne l'objet SPDO
    *
    * @access public
    * @static
    * @param void
    * @return SPDO $instance
    */
  public static function getSPDO()
  {  
    if(is_null(self::$instance))
    {
      self::$instance = new SPDO();
    }
    return self::$instance;
  }
}


function secured_OUT_string($string){
  $string = htmlentities(nl2br($string), ENT_HTML5);
  $string = strip_tags($string, '<p><a><img><u><a><b><em>');

  return $string;
}