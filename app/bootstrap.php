<?php 

session_start();

date_default_timezone_set('America/Bahia');

require __DIR__. '/../vendor/autoload.php';

$app = new Slim\App();

$app->get('/', function($request, $response) {
  return 'Hello World!';
});