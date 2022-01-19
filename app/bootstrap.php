<?php 

session_start();

date_default_timezone_set('America/Bahia');

require __DIR__. '/../vendor/autoload.php';

require __DIR__. '/routes.php';

$app = new Slim\App([
  'settings' => [
      'displayErrorDetails' => true
  ]
]);

$container = $app->getContainer();

$container['hello'] = "Hello World";

$container['HomeController'] = function($container) {
  return new App\Controllers\HomeController($container);
};

$container["view"] = function($container) {
	$view= new Slim\Views\Twig(__DIR__ . '/../resources/views', [
      'cache' => false, 
  ]);

  $view->addExtension(new Slim\Views\TwigExtension(
    $container->router,
    $container->request->getUri()
  ));

  return $view;
};


