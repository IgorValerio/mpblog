<?php 

$app->get('/', function($request, $response) {
  return $response->write('Hello, World from response Param! ' . $request->getParam('name')
  );
});