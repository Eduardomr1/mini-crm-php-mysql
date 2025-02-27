<?php
class ClienteController {
    private $modelo;

    public function __construct() {
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: index.php?ruta=login');
            exit;
        }
        $this->modelo = new Cliente();
    }

    public function index() {
        $estado = isset($_GET['estado']) ? $_GET['estado'] : null;
        $clientes = $this->modelo->listarTodos($estado);
        require_once __DIR__ . '/../views/dashboard.php';
    }

    public function formulario($id = 0) {
        $cliente = null;
        if ($id > 0) {
            $cliente = $this->modelo->obtenerPorId($id);
        }
        require_once __DIR__ . '/../views/formulario_cliente.php';
    }

    public function guardar() {
        $datos = [
            'nombre'     => trim($_POST['nombre'] ?? ''),
            'empresa'    => trim($_POST['empresa'] ?? ''),
            'telefono'   => trim($_POST['telefono'] ?? ''),
            'email'      => trim($_POST['email'] ?? ''),
            'estado'     => $_POST['estado'] ?? 'nuevo',
            'valor'      => (float)($_POST['valor'] ?? 0),
            'creado_por' => $_SESSION['usuario_id']
        ];
        $this->modelo->crear($datos);
        header('Location: index.php?ruta=dashboard');
        exit;
    }

    public function actualizar($id) {
        $datos = [
            'nombre'     => trim($_POST['nombre'] ?? ''),
            'empresa'    => trim($_POST['empresa'] ?? ''),
            'telefono'   => trim($_POST['telefono'] ?? ''),
            'email'      => trim($_POST['email'] ?? ''),
            'estado'     => $_POST['estado'] ?? 'nuevo',
            'valor'      => (float)($_POST['valor'] ?? 0)
        ];
        $this->modelo->actualizar($id, $datos);
        header('Location: index.php?ruta=dashboard');
        exit;
    }

    public function eliminar($id) {
        $this->modelo->eliminar($id);
        header('Location: index.php?ruta=dashboard');
        exit;
    }
}
