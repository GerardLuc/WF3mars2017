<?php

namespace App;

class Cnx{
    /**
    *
    * @var \PDO
    */
    const HOST = 'Localhost';
    const USER = 'ROOT';
    const PASSWORD = '';
    const DB_NAME = 'mvc';

    private static $instance;

    private function construc(){}

     /**
    *
    * @return \PDO
    */

    public static function getInstance(){
        if(is_null(self::$instance)){
            self::$instance = new PDO(
                'mysql:host=' . self::HOST.';dbname='.self::DB_NAME,self::USER, self::PASSWORD,[
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                    PDO::ATTR_ARRMODE => PDO::ERRMODE_EXEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,]
            );
        }
        return self::$instance;
    }

    /**
    *une methode bidon
    * @var \PDO
    */

    public function test($param1, $param2 = 5){
        return $param2
    }
}