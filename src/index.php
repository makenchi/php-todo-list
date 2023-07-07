<?php 
require('routes.php');
require('core/autoload.php');

$uri = $_SERVER['REQUEST_URI'];

$handler = isset($ROUTES[$uri]) ? $ROUTES[$uri] : $ROUTES['default'];

if(startsWith($handler, 'view')) {
  $viewName = explode('/', $handler)[1];

  include('views/'.$viewName.".php");
  exit();
} else if(startsWith($handler, 'controllers')) {
  $info = explode('@', $handler);
  $response = createControllerInstance($info[0], $info[1]);

  
  die($response);
}
?>