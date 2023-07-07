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

    return execute($query);
  }

  function execute($query){
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

  function insert($tableName, $data) {
    $columns = implode(", ", array_keys($data));
    $placeholders = implode(", ", array_fill(0, count($data), "?"));
    $sql = "INSERT INTO $tableName ($columns) VALUES ($placeholders)";

    $stmt = db()->prepare($sql);

    $bindTypes = "";
    $bindValues = [];
    foreach ($data as $value) {
        $bindTypes .= "s"; 
        $bindValues[] = $value;
    }

    $stmt->bind_param($bindTypes, ...$bindValues);
    $stmt->execute();
    $stmt->close();
    return db()->insert_id;
}   
?>