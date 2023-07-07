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
  $param = explode("$route_key/",$uri);
  $param = isset($param[1]) ? $param[1] : null;
  
  $info = explode('@', $handler);
  $response = createControllerInstance($info[0], $info[1], [
    "param" => $param
  ]);

  
  die($response);
}
?>