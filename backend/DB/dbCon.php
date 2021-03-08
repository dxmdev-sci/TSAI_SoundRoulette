<?php
require_once("db.config.php");
class DB {
    public static $con;
    public function __construct($dsn,$user,$pass){
        self::$con = new PDO($dsn, $user, $pass);
        self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
new DB(dbConfig::$dsn, dbConfig::$user, dbConfig::$pass);