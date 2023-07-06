<?php 
require('routes.php');
require('core/functions.php');

$uri = $_SERVER['REQUEST_URI'];

$handler = isset($ROUTES[$uri]) ? $ROUTES[$uri] : $ROUTES['default'];

if(startsWith($handler, 'view')) {
  $viewName = explode('/', $handler)[1];

  include('views/'.$viewName.".php");
  exit();
} else if(startsWith($handler, 'controllers')) {
  $info = explode('@', $handler);
  require_once $info[0].".controller.php";

  $method_map = [
    'GET' => 'get',
    'POST' => 'create',
    'PUT' => 'update',
    'DELETE' => 'del'
  ];

  $class = new $info[1]();
  $method = $method_map[$_SERVER['REQUEST_METHOD']];

  if(!method_exists($class, $method)) {
    die("Method not available :(");
  }

  die($class->$method());
}
?>