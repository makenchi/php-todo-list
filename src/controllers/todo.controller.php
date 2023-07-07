<?php 

class TodoController {
  public $model;

  public function __construct() {
    $this->model = createModelInstance('tasks', 'TaskModel');
  }

  public function get() {
    $data = $this->model->getAll();

    return [ 
      'items' => [
        "Hello from the todo.controller.php get method",
        "Hello from the todo.controller.php get method",
        "Hello from the todo.controller.php get method",
      ]
    ];

    $data = $this->model->getAll();
    return $data;
  }

  public function create($payload) {
    $data = $this->model->create($payload);
    return $data;
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