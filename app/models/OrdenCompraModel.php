<?php

class OrdenCompraModel {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Obtiene todas las órdenes de compra con información del proveedor y del usuario
    public function getAll() {
        $this->db->query("SELECT o.id_orden, o.fecha_orden, o.monto_total, 
                                 p.razon_social AS proveedor, 
                                 u.nombre AS usuario
                          FROM orden_compra o
                          JOIN proveedor p ON o.id_proveedor = p.id_proveedor
                          JOIN usuario u ON o.id_usuario = u.id_usuario
                          WHERE o.deleted_at IS NULL
                          ORDER BY o.fecha_orden DESC");

        $result = $this->db->registers();
        return $result ?: []; // Retorna un array vacío si no hay registros
    }

    public function getUltimasOrdenes($limite = 5) {
        $this->db->query("SELECT o.id_orden, o.fecha_orden, o.monto_total, 
                                 p.razon_social AS proveedor, 
                                 u.nombre AS usuario
                          FROM orden_compra o
                          JOIN proveedor p ON o.id_proveedor = p.id_proveedor
                          JOIN usuario u ON o.id_usuario = u.id_usuario
                          WHERE o.deleted_at IS NULL
                          ORDER BY o.fecha_orden DESC
                          LIMIT :limite");
        $this->db->bind('limite', $limite);
        
        return $this->db->registers() ?: []; // Retorna un array vacío si no hay registros
    }
    

    // Guarda una nueva orden de compra
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

    // Elimina una orden de compra, usando marca de tiempo en el campo deleted_at
    public function delete($id) {
        $this->db->query("UPDATE orden_compra SET deleted_at = CURRENT_TIMESTAMP WHERE id_orden = :id");
        $this->db->bind('id', $id);
        return $this->db->execute();
    }
}
