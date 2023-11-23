<?php


namespace MVC\core;
use Dcblogdev\PdoWrapper\Database;

class model{

    protected $dp;

    public function connect(){

        $options = [
            //required
            'username' => 'root',
            'database' => 'crud_mvc',
            //optional
            'password' => '',
            'type' => 'mysql',
            'charset' => 'utf8',
            'host' => 'localhost',
            'port' => '3306'
        ];
        
        $db = new Database($options);
        return $db;
    }

}