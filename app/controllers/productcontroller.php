<?php

namespace MVC\controllers;
use  MVC\models\product;
use  MVC\core\controller;

class productcontroller extends product{

    private $conn;

    public function index(){
        $title="product page";
        $dp=new product();
       
        $data=$dp->getAllProducts();
        controller::view('product\index',['title'=>$title,'products'=> $data]);
     }

     public function add(){
        $title="add page";
       
        controller::view('product\add',['title'=>$title]);
     }
     public function store(){
      
        if(isset($_POST['submit'])){

        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $qty = $_POST['quantity'];

        $data = [
            'name'=>$name,
            'description'=>$description, 
            'price'=>$price,
            'quantity'=>$qty
        ];
        
        $dp=new product();
        if($dp->insertProduct($data)){

        $data['success'] = "Data Added Successfully";

        controller::view('product\add',$data);
        }
       
    }else{

        controller::view('product\add');
    }
    }

    public function edit($id){

        $dp=new product();
        $row= $dp->getProduct($id);

          //var_dump($data);
          //return $this->view('product\edit',$data);
         controller::view('product\edit',['row'=>$row]);
        
       
    }
    public function update($id){
      
        if(isset($_POST['submit'])){

        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $qty = $_POST['quantity'];

        $data = [
            'name'=>$name,
            'description'=>$description, 
            'price'=>$price,
            'quantity'=>$qty
        ];
        
        $dp=new product();
        if($dp->updateProduct($id,$data)){


        controller::view('product\edit',['success'=>"Data updated Successfully",'row'=>$dp->getProduct($id)]);
        }
       
    }else{

        controller::view('product\edit');
    }
    }

    public function delete($id){
        $dp=new product();

        if($dp->deleteProduct($id))
        {
        $data['success'] = "Product Have Been Deleted";
        controller::view('product\delete',$data);
        }

    }

}