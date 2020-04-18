<?php 
namespace App;
use PDO;
class App {

    public static $pdo;

    public static function getPDO(): PDO
    {
        if(!self::$pdo){
            $dsn = 'mysql:dbname=PDOphp;host=127.0.0.1';
            $userdb = 'Jojo';
            $password = 'bonjour';
            self::$pdo = new PDO($dsn, $userdb, $password,[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
            ]);
        }
        return self::$pdo;
    }

    public static $auth;

    public static function getAuth(): Auth
    {
        if(!self::$auth){
            self::$auth = new Auth(self::getPDO(), '../public/login.php');
        }
        return self::$auth;
    }
}