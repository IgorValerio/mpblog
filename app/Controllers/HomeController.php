<?php 

namespace App\Controllers;

class HomeController extends Controller
{
  public function index($request, $response)
  {
    return $response->write('<h1>hello</h1> <br /> <p> Exemplo de String </p>');
  }
}