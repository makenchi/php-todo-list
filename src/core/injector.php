<?php

function createControllerInstance($path, $className) {
  require_once $path.".controller.php";

  $method_map = [
    'GET' => 'get',
    'POST' => 'create',
    'PUT' => 'update',
    'DELETE' => 'del'
  ];

  $class = new $className();
  $method = $method_map[$_SERVER['REQUEST_METHOD']];

  if(!method_exists($class, $method)) {
    die("Method not available :(");
  }

  $res = $class->$method();
  if (is_string($res)) {
    return $res;
  } elseif (is_object($res) || is_array($res)) {
    header('Content-Type: application/json');
    return json_encode($res);
  }
}

function createModelInstance($path, $modelName) {
  
}
?>