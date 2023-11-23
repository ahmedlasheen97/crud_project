<?php
namespace MVC\controllers;
use MVC\core\controller;

class Homecontroller extends controller{

    public function index(){
       $title="crud mvc";
        $this->view('home',['title'=>$title]);
    }

}