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
  $method_request = $_SERVER['REQUEST_METHOD'];
  $method = $method_map[$method_request];

  if(!method_exists($class, $method)) {
    die("Method not available :(");
  }

  $res;
  if($method_request == "POST" || $method_request == "PUT"){
    $json = file_get_contents('php://input');    
    $data = json_decode($json,true);
    $res = $class->$method($data);
  }
  else{
    $res = $class->$method();
  }

  if (is_string($res)) {
    return $res;
  } elseif (is_object($res) || is_array($res)) {
    header('Content-Type: application/json');
    return json_encode($res);
  }
}

function createModelInstance($path, $modelName) {
  require_once "models/".$path.".model.php";
  $class = new $modelName($path);
  return $class;
}
?>