<?php 

class TodoController {
  public $model;

  public function __construct() {
    $this->model = createModelInstance('tasks', 'TaskModel');
  }

  public function get() {
    $data = $this->model->getAll();
    return $data;
  }

  public function create($payload) {
    $data = $this->model->createTask($payload["text"]);
    $payload["id"] = $data;
    return $payload;
  }

  public function update() {
    $data = $this->model->update($payload);
    return $data;
  }

  public function del() {
    $data = $this->model->delete($payload);
    return $data;
  }
}