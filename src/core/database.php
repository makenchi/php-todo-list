<?php
  $instance = null;

  function createConnection() {
    $connectionString = 'mysqli://admin:api-pass@db:3306/crud-example';
    $conn = new mysqli($connectionString);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
  }


  function db() {
    if($instance == null) {
      $instance = createConnection();
    }

    return $instance;
  }
?>