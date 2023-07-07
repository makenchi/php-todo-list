<?php
  $instance = null;

  function createConnection() {
    $dbHost = getenv('DB_HOST');
    $dbUser = getenv('DB_USER');
    $dbPass = getenv('DB_PASS');
    $dbName = getenv('DB_NAME');

    $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName, 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
  }

  function db() {
    global $instance;
    if($instance == null) {
      $instance = createConnection();
    }

    return $instance;
  }
?>