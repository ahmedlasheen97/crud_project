<?php
define("DS",DIRECTORY_SEPARATOR);
define("ROOT",dirname(__DIR__));
define("APP",ROOT.DS.'app');
define("CONFIG",APP.DS.'config');
define("CONTROLLERS",APP.DS.'controllers');
define("CORE",APP.DS.'core');
define("MODELS",APP.DS.'models');
define("LIBS",APP.DS.'libs');
define("VIEWS",APP.DS.'views');

require_once (CONFIG."\\".'config.php');
require_once (CONFIG."\\".'helpers.php');

require_once("../vendor/autoload.php");
$app= new MVC\core\App();
//echo ROOT;
