<?php

function dd($args) {
  die(var_dump($args));
}

function startsWith($haystack, $needle) {
  return strncmp($haystack, $needle, strlen($needle)) === 0;
}

function arrayStartsWith($array, $needle) {
  foreach ($array as $string => $v) {    
    if (startsWith($needle, $string)) {
      return $string;
    }
  }
  return false;
}

function fetch($field, $controller) {
  $info = explode('@', $controller);
  $response = createControllerInstance("controllers/$info[0]", $info[1], [
    'headless' => true
  ]);

  $res = [
    $field => $response
  ];

  return $res;
}

function text($str) {
  echo $str;
}
