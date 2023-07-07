<?php
require 'base.model.php';

class TaskModel extends BaseModel {
  public function getAll() {
    return $this->paginate(1, 20, 'tasks');
  }

  public function createTask($text){
    return $this->insert('tasks', [
      'text' => $text
    ]);        
  }

  public function update($id, $payload){
    return $this->updateTable('tasks', $payload, $id);     
  }

  public function del($id) {
    return $this->remove('tasks', $id);
  }
}

?>