<?php
class Usuario {
    private $db;

    public function __construct() {
        $this->db = Database::obtenerConexion();
    }

    public function buscarPorEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE email = :email AND activo = 1 LIMIT 1");
        $stmt->execute([':email' => $email]);
        return $stmt->fetch();
    }

    public function registrar($nombre, $email, $password, $rol = 'agente') {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->db->prepare("INSERT INTO usuarios (nombre, email, password_hash, rol) VALUES (:nombre, :email, :hash, :rol)");
        return $stmt->execute([
            ':nombre' => $nombre,
            ':email'  => $email,
            ':hash'   => $hash,
            ':rol'    => $rol
        ]);
    }
}
