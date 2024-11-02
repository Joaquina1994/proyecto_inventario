<?php
class Producto {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAll() {
        $this->db->query("SELECT * FROM producto WHERE deleted_at IS NULL");
        return $this->db->registers();
    }

    public function save($data) {
        $this->db->query("INSERT INTO producto 
                          (id_proveedor, id_categoria, codigo_producto, nombre_producto, cantidad, created_at) 
                          VALUES (:id_proveedor, :id_categoria, :codigo_producto, :nombre_producto, :cantidad, CURRENT_TIMESTAMP)");
        $this->db->bind('id_proveedor', $data['id_proveedor']);
        $this->db->bind('id_categoria', $data['id_categoria']);
        $this->db->bind('codigo_producto', $data['codigo_producto']);
        $this->db->bind('nombre_producto', $data['nombre_producto']);
        $this->db->bind('cantidad', $data['cantidad']);
        return $this->db->execute();
    }

    public function delete($id) {
        $this->db->query("UPDATE producto SET deleted_at = CURRENT_TIMESTAMP WHERE id_producto = :id");
        $this->db->bind('id', $id);
        return $this->db->execute();
    }
}
?>
