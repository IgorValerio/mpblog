<?php

session_start();

date_default_timezone_set('America/Bahia');

require __DIR__ . '/../vendor/autoload.php';

$app = new Slim\App([
    'settings'=> [
        'displayErrorDetails' => true
    ]
]);

$container = $app->getContainer();

$container['view'] = function($container){
    $view = new Slim\Views\Twig(__DIR__ . '/../resources/views',[
      'cache' => false,
    ]);

// requer dois parametros TwigExtension($router, $uri)

    $view->addExtension(new Slim\Views\TwigExtension(
      $container->router,
      $container->request->getUri()
    ));

    return $view;

};

// tirei para debugar a aplicação

//$container['hello'] = "Hello, World!";

$container['HomeController'] = function($container){
  return new App\Controllers\HomeController($container);
};

$container['AuthController'] = function($container){
  return new App\Controllers\AuthController($container);
};

require __DIR__ . '/routes.php';


