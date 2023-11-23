<?php

namespace MVC\models;
use MVC\core\model;

class product extends model{

    private $table="products";
    private $conn;

    public function __construct(){

        
        $this->conn = new model();
    }

    public function getAllProducts(){

        return  $this->conn->connect()->rows("SELECT * FROM products");
    }


    public function insertProduct($data){

        
        return $this->conn->connect()->insert('products', $data);
    }

    public function getproduct($id){

        //return $this->conn->connect()->getById('products', $id);
        return $this->conn->connect()->row("SELECT * FROM products WHERE id = ?", [$id]);

    }
    public function updateproduct($id,$data){
       
        $where=['id' =>$id];
        
         return  $this->conn->connect()->update('products', $data, $where);
    }
    public function deleteproduct($id){

        //$this->conn->connect()->$where=['id' => $id];

        return $this->conn->connect()->deleteById('products', $id);
    }
}