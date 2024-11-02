<?php
class Categoria {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAll() {
        $this->db->query("SELECT * FROM categoria WHERE deleted_at IS NULL");
        return $this->db->registers();
    }

    public function save($data) {
        $this->db->query("INSERT INTO categoria (nombre_categoria, created_at) 
                          VALUES (:nombre_categoria, CURRENT_TIMESTAMP)");
        $this->db->bind('nombre_categoria', $data['nombre_categoria']);
        return $this->db->execute();
    }

    public function delete($id) {
        $this->db->query("UPDATE categoria SET deleted_at = CURRENT_TIMESTAMP WHERE id_categoria = :id");
        $this->db->bind('id', $id);
        return $this->db->execute();
    }
}
?>

