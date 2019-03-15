<?php

if(!session_status())
{
    session_start();
}
require __DIR__ . '/vendor/autoload.php';

use App\QueryBuilder;
use App\Auth;

$db = new QueryBuilder();

$user = new Auth($db);

$url = $_SERVER['REQUEST_URI'];
var_dump($db);

if($url == '/')
{
    require_once 'index.php';

}elseif ($url == '/views/users/index.php')
{
    require_once 'views/users/index.php';

}elseif ($url == '/views/tasks/index.php')
{
    require_once 'views/tasks/index.php';

}else{ require_once  'views/404.php';}