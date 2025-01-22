<?php
require_once __DIR__ . '/../models/Todo.php';

class TodoController {
    private $todo;

    public function __construct() {
        $this->todo = new Todo();
    }

    public function index() {
        $todos = $this->todo->getAll();
        include __DIR__ . '/../views/list.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $task = $_POST['task'];
            if ($task) {
                $this->todo->create($task);
                 $this->sendJsonResponse(['success' => true, 'message' => 'Task berhasil ditambahkan']);
                exit;
            }
        }
        include __DIR__ . '/../views/form.php';
    }

    public function edit($id) {
        $todo = $this->todo->getById($id);
        if (!$todo) {
             $this->sendJsonResponse(['success' => false, 'message' => 'Task tidak ditemukan']);
            exit;
        }

         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $task = $_POST['task'];
            $completed = isset($_POST['completed']) ? 1 : 0;
            if ($task) {
                $this->todo->update($id, $task, $completed);
                $this->sendJsonResponse(['success' => true, 'message' => 'Task berhasil diupdate']);
                exit;
            }
        }

        include __DIR__ . '/../views/form.php';
    }

     public function updateStatus(){
         if($_SERVER['REQUEST_METHOD'] === 'POST'){
             $id = $_POST['id'];
             $completed = $_POST['completed'];

             $task = $this->todo->getById($id);
                if (!$task) {
                     $this->sendJsonResponse(['success' => false, 'message' => 'Task tidak ditemukan']);
                    exit;
                }

              $this->todo->update($id, $task['task'], $completed);
             $this->sendJsonResponse(['success' => true, 'message' => 'Status task berhasil di update']);
         }
     }


    public function delete($id) {
        $this->todo->delete($id);
         $this->sendJsonResponse(['success' => true, 'message' => 'Task berhasil dihapus']);
        exit;
    }

     private function sendJsonResponse($data){
        header('Content-Type: application/json');
        echo json_encode($data);
     }
}

?>