<?php

class TaskModel {
  public $db;

  public function __construct() {
    $this->db = db();
  }

  public function getAll() {
    return paginate(1, 20, 'tasks');
  }

  public function createTask($text){

    return insert('tasks', [
      'text' => $text
    ]);        
  }
}

?>