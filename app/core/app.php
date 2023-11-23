<?php
    

namespace MVC\core;
class app
{
    
    protected $controller="Homecontroller";
    protected $method="index";
    protected $params=[];
    public function __construct()
    {
        
        $this->prepareurl();
        $this->render();
        
    }
    /*
    *
    * extract controller,method and parameters
    * @return void
    */
    private function prepareurl(){

    if(!empty($_SERVER['REQUEST_URI'])){
       
        $url = $_SERVER['REQUEST_URI'];
        $url = trim($url,'/');
        $url   = explode('/',$url);

        //define the controller

        $this->controller=isset($url[0])?ucwords($url[0])."controller":"Homecontroller";

        //define the method

        $this->method=isset($url[1])?$url[1]:"index";

        unset($url[0],$url[1]);
        
        $this->params=!empty($url)?array_values($url):[];
       
    }
    }
    private function render(){
        
        $controller='MVC\controllers\\'.$this->controller;
        if(class_exists($controller)){
            $controller = new $controller;
            
            if(method_exists($controller,$this->method)){
                
                call_user_func_array([$controller,$this->method],$this->params);
               
            }else{

                echo "method not exists";

            }
          
        }else{

            echo " this controller ".$this->controller." not exists ";
        }
    }
    


}
