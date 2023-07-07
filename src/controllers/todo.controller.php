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

    $id = $context['param'];
    if(isset($payload['id'])) unset($payload['id']);

    $data = $this->model->update($context['param'], $payload);
    return $data;
  }

  public function del($context) {
    $data = $this->model->del($context['param']);
    return $data;
  }
}