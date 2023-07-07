<?php 

class TodoController {
  public $model;

  public function __construct() {
    $this->model = createModelInstance('tasks', 'TaskModel');
  }

  public function get($context) {
    $data = $this->model->getAll();
    return $data;
  }

  public function create($payload, $context) {
    $data = $this->model->createTask($payload["text"]);
    $payload["id"] = $data;
    return $payload;
  }

  public function update($payload, $context) {
    dd([
      $payload,
      $context
    ]);
    $data = $this->model->update($payload);
    return $data;
  }

  public function del($context) {
    $data = $this->model->deleteTask($context["param"]);
    return $data;
  }
}