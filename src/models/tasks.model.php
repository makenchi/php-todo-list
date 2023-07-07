<?php

class TaskModel {
  public $db;

  public function __construct() {
    $this->db = db();
  }

  public function getAll() {
    dd(paginate(1, 20, 'tasks'));
  }

  public function createTask($text){

    return insert('tasks', [
      'text' => $text
    ]);        
  }
}

?>