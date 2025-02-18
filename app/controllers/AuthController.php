<?php
class AuthController {
    private $modeloUsuario;

    public function __construct() {
        $this->modeloUsuario = new Usuario();
    }

    public function mostrarLogin() {
        if (isset($_SESSION['usuario_id'])) {
            header('Location: index.php?ruta=dashboard');
            exit;
        }
        require_once __DIR__ . '/../views/login.php';
    }

    public function iniciarSesion() {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'] ?? '';

        $usuario = $this->modeloUsuario->buscarPorEmail($email);

        if ($usuario && password_verify($password, $usuario['password_hash'])) {
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nombre'] = $usuario['nombre'];
            $_SESSION['usuario_rol'] = $usuario['rol'];
            header('Location: index.php?ruta=dashboard');
            exit;
        }

        $error = "Credenciales invalidas o cuenta inactiva";
        require_once __DIR__ . '/../views/login.php';
    }

    public function cerrarSesion() {
        session_destroy();
        header('Location: index.php?ruta=login');
        exit;
    }
}
