<?php
class Cliente {
    private $db;

    public function __construct() {
        $this->db = Database::obtenerConexion();
    }

    public function listarTodos($filtroEstado = null) {
        $sql = "SELECT c.*, u.nombre AS agente_nombre FROM clientes c JOIN usuarios u ON c.creado_por = u.id";
        $params = [];

        if ($filtroEstado) {
            $sql .= " WHERE c.estado = :estado";
            $params[':estado'] = $filtroEstado;
        }
        $sql .= " ORDER BY c.actualizado_en DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    public function obtenerPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM clientes WHERE id = :id LIMIT 1");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function crear($datos) {
        $sql = "INSERT INTO clientes (nombre, empresa, telefono, email, estado, valor_estimado, creado_por) 
                VALUES (:nombre, :empresa, :telefono, :email, :estado, :valor, :creado_por)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':nombre'     => $datos['nombre'],
            ':empresa'    => $datos['empresa'],
            ':telefono'   => $datos['telefono'],
            ':email'      => $datos['email'],
            ':estado'     => $datos['estado'],
            ':valor'      => $datos['valor'],
            ':creado_por' => $datos['creado_por']
        ]);
    }

    public function actualizar($id, $datos) {
        $sql = "UPDATE clientes SET nombre = :nombre, empresa = :empresa, telefono = :telefono, 
                email = :email, estado = :estado, valor_estimado = :valor WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id'       => $id,
            ':nombre'   => $datos['nombre'],
            ':empresa'  => $datos['empresa'],
            ':telefono' => $datos['telefono'],
            ':email'    => $datos['email'],
            ':estado'   => $datos['estado'],
            ':valor'    => $datos['valor']
        ]);
    }

    public function eliminar($id) {
        $stmt = $this->db->prepare("DELETE FROM clientes WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}
