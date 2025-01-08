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
                header('Location: index.php');
                exit;
            }
        }
        include __DIR__ . '/../views/form.php';
    }


    public function edit($id) {
        $todo = $this->todo->getById($id);
        if (!$todo) {
            echo "Data tidak ditemukan";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $task = $_POST['task'];
            $completed = isset($_POST['completed']) ? 1 : 0;
            if ($task) {
                $this->todo->update($id, $task, $completed);
                header('Location: index.php');
                exit;
            }
        }
        include __DIR__ . '/../views/form.php';
    }


    public function delete($id) {
        $this->todo->delete($id);
        header('Location: index.php');
        exit;
    }
}

?>