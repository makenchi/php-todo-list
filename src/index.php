<?php 
require('routes.php');
require('core/autoload.php');

$uri = $_SERVER['REQUEST_URI'];

$route_key = arrayStartsWith($ROUTES,$uri);
$handler = $route_key == false ? $ROUTES['default'] : $ROUTES[$route_key];

if(startsWith($handler, 'view')) {
  $viewName = explode('/', $handler)[1];

  include('views/'.$viewName.".php");
  exit();
} else if(startsWith($handler, 'controllers')) {
  $param = explode("$route_key/",$uri)[1];

  $info = explode('@', $handler);
  $response = createControllerInstance($info[0], $info[1], [
    "param" => $param
  ]);
  
  die($response);
}
?>