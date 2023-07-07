<?php

function dd($args) {
  die(var_dump($args));
}

function startsWith($string, $piece) {
  return strpos($string, $piece) === 0;
}

function text($str) {
  echo $str;
}

function model($str) {
  
}
