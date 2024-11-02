<?php
class OrdenCompraController extends BaseController {
    private $ordenCompraModel;

    public function __construct() {
        $this->ordenCompraModel = $this->model('OrdenCompra');
    }

    // Muestra todas las órdenes de compra
    public function index() {
        $ordenes = $this->ordenCompraModel->getAll();
        $this->view('pages/orden_compra/index', ['ordenes' => $ordenes]);
    }

    // Muestra la vista de creación de una orden de compra
    public function create() {
        $this->view('views/pages/orden_compra/create');
    }

    // Guarda una nueva orden de compra
    public function store() {
        $data = [
            'id_proveedor' => $_POST['id_proveedor'],
            'id_usuario' => $_SESSION['id'],
            'fecha_orden' => $_POST['fecha_orden'],
            'monto_total' => $_POST['monto_total']
        ];

        if ($this->ordenCompraModel->save($data)) {
            header('Location: /orden_compra');
        } else {
            die("Error al crear la orden de compra.");
        }
    }
}
