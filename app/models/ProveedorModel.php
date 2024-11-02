<?php
class Proveedor {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAll() {
        $this->db->query("SELECT * FROM proveedor WHERE deleted_at IS NULL");
        return $this->db->registers();
    }

    public function save($data) {
        $this->db->query("INSERT INTO proveedor 
                          (razon_social, cuit, direccion, telefono, email, created_at) 
                          VALUES (:razon_social, :cuit, :direccion, :telefono, :email, CURRENT_TIMESTAMP)");
        $this->db->bind('razon_social', $data['razon_social']);
        $this->db->bind('cuit', $data['cuit']);
        $this->db->bind('direccion', $data['direccion']);
        $this->db->bind('telefono', $data['telefono']);
        $this->db->bind('email', $data['email']);
        return $this->db->execute();
    }

    public function delete($id) {
        $this->db->query("UPDATE proveedor SET deleted_at = CURRENT_TIMESTAMP WHERE id_proveedor = :id");
        $this->db->bind('id', $id);
        return $this->db->execute();
    }
}
?>
