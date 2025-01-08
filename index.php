<?php
require_once __DIR__ . '/controllers/TodoController.php';

$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

$controller = new TodoController();

switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'edit':
        $controller->edit($id);
        break;
    case 'delete':
        $controller->delete($id);
        break;
    default:
        $controller->index();
        break;
}
?>