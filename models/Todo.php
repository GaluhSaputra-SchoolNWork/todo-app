<?php
require_once __DIR__ . '/../config/database.php';

class Todo {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->conn;
    }

    public function getAll() {
        $query = "SELECT * FROM todos ORDER BY created_at DESC";
        $result = $this->db->query($query);
        $todos = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $todos[] = $row;
            }
        }
        return $todos;
    }

    public function getById($id) {
        $query = "SELECT * FROM todos WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function create($task) {
        $query = "INSERT INTO todos (task) VALUES (?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $task);
        return $stmt->execute();
    }

    public function update($id, $task, $completed) {
        $query = "UPDATE todos SET task = ?, completed = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sii", $task, $completed, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM todos WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}

?>