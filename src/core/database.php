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

  function paginate($page, $pageSize, $tableName) {
    $offset = ($page - 1) * $pageSize;
    $query = "SELECT * FROM $tableName LIMIT $pageSize OFFSET $offset";

    $result = db()->query($query);

    if (!$result) {
        die("Query failed: " . $conn->error);
    }

    $rows = [];
    while ($row = $result->fetch_assoc()) {
      $rows[] = $row;
    }

    return $rows;
  }
?>