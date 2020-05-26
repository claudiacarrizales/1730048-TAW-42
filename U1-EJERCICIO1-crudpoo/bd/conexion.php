<?php
class Database
{
  //informacioin para la conexion de la base de datos al rpigrama en modo local
    private static $dbName = 'ejercicio' ;
    private static $dbHost = 'localhost' ;
    private static $dbUsername = 'admin';
    private static $dbUserPassword = '5e6847ce9a2862a305e2d820e3eae97858d20168bc6d4b9f';
     
    private static $cont  = null;
     
    public function __construct() {
        die('Init function is not allowed');
    }
     
    public static function connect()
    {
       if ( null == self::$cont )
       {     
        try
        {
          self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword); 
        }
        catch(PDOException $e)
        {
          die($e->getMessage()); 
        }
       }
       return self::$cont;
    }
     
    public static function disconnect()
    {
        self::$cont = null;
    }
}
?>