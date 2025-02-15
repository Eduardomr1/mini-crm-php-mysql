<?php
session_start();

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/models/Usuario.php';
require_once __DIR__ . '/../app/models/Cliente.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/controllers/ClienteController.php';

$ruta = isset($_GET['ruta']) ? trim($_GET['ruta'], '/') : 'dashboard';

switch ($ruta) {
    case 'login':
        $auth = new AuthController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth->iniciarSesion();
        } else {
            $auth->mostrarLogin();
        }
        break;

    case 'logout':
        $auth = new AuthController();
        $auth->cerrarSesion();
        break;

    case 'clientes':
    case 'dashboard':
        $controller = new ClienteController();
        $controller->index();
        break;

    case 'clientes/crear':
        $controller = new ClienteController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->guardar();
        } else {
            $controller->formulario();
        }
        break;

    case 'clientes/editar':
        $controller = new ClienteController();
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->actualizar($id);
        } else {
            $controller->formulario($id);
        }
        break;

    case 'clientes/eliminar':
        $controller = new ClienteController();
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $controller->eliminar($id);
        break;

    default:
        http_response_code(404);
        echo "404 - Pagina no encontrada";
        break;
}
