<?php


use League\Plates\Engine;
use DI\ContainerBuilder;
use Aura\SqlQuery\QueryFactory;
use FastRoute\Dispatcher;
//use DI\Container;

$containerBuilder = new ContainerBuilder();

$containerBuilder->addDefinitions([

    Engine::class => function()
    {
        return new Engine('../app/views');
    },
    QueryFactory::class =>function()
    {
        return new QueryFactory('mysql');
    },
    PDO::class => function()
    {
        return new PDO("mysql:host=192.168.10.10; dbname=php.test", "homestead", "secret" );
    }

]);

$container = $containerBuilder->build();

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/tasks', ["App\controllers\HomeController", "index"]);
    // {id} must be a number (\d+)
   // $r->addRoute('GET', '/user/{id:\d+}', 'get_user_handler');
    // The /{title} suffix is optional
    //$r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler');
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case Dispatcher::NOT_FOUND:
        echo '404 Not Found';
        break;
    case Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        echo '405 Method Not Allowed';
        break;
    case Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
    //var_dump($handler);
       $container->call($handler, $vars);
        break;
}