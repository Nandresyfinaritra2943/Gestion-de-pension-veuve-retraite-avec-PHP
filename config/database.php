<?php
    class Database{
        private static $dbHost = "localhost";
        private static $dbUser = "root";
        private static $dbPwd = "";
        private static $dbName = "base";
        private static $connexion = null;

        public static function connect(){
            try{
                self::$connexion = new PDO("mysql:host=". self::$dbHost.";dbname=".self::$dbName, self::$dbUser, self::$dbPwd);
            }catch(PDOException $e){
                die($e->getMessage());
            }
            return self::$connexion;
        }

        public static function disconnect(){
            return self::$connexion = null;
        }
    }

?>