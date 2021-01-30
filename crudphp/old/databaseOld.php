<?php class Database { 
    private static $dbName = 'c33poussin' ; 
    private static $dbHost = 'localhost:3306' ; 
    private static $dbUsername = 'c33poussin'; 
    private static $dbUserPassword = 'sdv47zER'; 
    private static $cont = null; 
    
    public function __construct() { 
        die('Init function is not allowed'); 
    } 
    
    public static function connect() { 
        if ( null == self::$cont ) { 
            try { self::$cont = new PDO ( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword); 
            } 
            catch(PDOException $e) { 
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