<?php
class OrdenCompra {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAll() {
        $this->db->query("SELECT * FROM orden_compra WHERE deleted_at IS NULL");
        $result = $this->db->registers();
        return $result ?: []; // Retorna un array vacío si no hay registros
    }
    
    

    public function save($data) {
        $this->db->query("INSERT INTO orden_compra 
                          (id_proveedor, id_usuario, fecha_orden, monto_total, created_at) 
                          VALUES (:id_proveedor, :id_usuario, :fecha_orden, :monto_total, CURRENT_TIMESTAMP)");
        $this->db->bind('id_proveedor', $data['id_proveedor']);
        $this->db->bind('id_usuario', $data['id_usuario']);
        $this->db->bind('fecha_orden', $data['fecha_orden']);
        $this->db->bind('monto_total', $data['monto_total']);
        return $this->db->execute();
    }

    public function delete($id) {
        $this->db->query("UPDATE orden_compra SET deleted_at = CURRENT_TIMESTAMP WHERE id_orden = :id");
        $this->db->bind('id', $id);
        return $this->db->execute();
    }
}
?>
