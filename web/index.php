<?php
require '../vendor/autoload.php';


//use App\controllers\HomeController;

$url = $_SERVER['REQUEST_URI'];

$controller = [];

if($url == '/')
{
    $controller = ["App\controllers\HomeController" , "index"];

}elseif($url == '/about')
{
    $controller = ["App\controllers\HomeController", "about"];
}

if(empty($controller))
{
    dd('404|Error');
}else
    {
        call_user_func($controller);
    }