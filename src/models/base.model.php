<?php

class BaseModel {
  public $db;

  public function __construct() {
    $this->db = db();
  }


  public function paginate($page, $pageSize, $tableName) {
    $offset = ($page - 1) * $pageSize;
    $query = "SELECT * FROM $tableName LIMIT $pageSize OFFSET $offset";

    return $this->execute($query);
  }

  function execute($query){
    $result = $this->db->query($query);

    if (!$result) {
        die("Query failed: " . $conn->error);
    }

    $rows = [];
    while ($row = $result->fetch_assoc()) {
      $rows[] = $row;
    }

    return $rows;    
  }



  public function updateTable($tableName, $data, $id) {
    $sql = "UPDATE $tableName SET ";
    $updates = [];
    $types = "";
    $values = [];
    foreach ($data as $column => $value) {
        $updates[] = "$column = ?";
        $types .= "s"; // Assuming all values are strings
        $values[] = $value;
    }

    $sql .= implode(", ", $updates);
    $sql .= " WHERE id=?";

    $types .= "s";
    $values[] = $id;
    
    $stmt = $this->db->prepare($sql);
    $stmt->bind_param($types, ...$values);

    $res = $stmt->execute();
    $stmt->close();
  }

  public function insert($tableName, $data) {
    $columns = implode(", ", array_keys($data));
    $placeholders = implode(", ", array_fill(0, count($data), "?"));
    $sql = "INSERT INTO $tableName ($columns) VALUES ($placeholders)";

    $stmt = $this->db->prepare($sql);

    $bindTypes = "";
    $bindValues = [];
    foreach ($data as $value) {
        $bindTypes .= "s"; 
        $bindValues[] = $value;
    }

    $stmt->bind_param($bindTypes, ...$bindValues);
    $stmt->execute();
    $stmt->close();
    return $this->db->insert_id;
  }  
  
  function remove($tableName, $id) {
    $sql = "DELETE FROM $tableName WHERE id = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bind_param("i", $id);

    $stmt->execute();
    $stmt->close();
  }
}