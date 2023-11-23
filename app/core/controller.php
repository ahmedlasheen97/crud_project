<?php

namespace MVC\core;

 class controller{

    public static function view($path,$parm=[]){
        extract($parm);
        require_once(VIEWS."\\".$path.".php");

    }
}