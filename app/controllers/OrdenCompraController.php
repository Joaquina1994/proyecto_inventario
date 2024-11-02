<?php
class OrdenCompraController extends BaseController {
    private $ordenCompraModel;

    public function __construct() {
        $this->ordenCompraModel = $this->model('OrdenCompraModel');
    }

    // Muestra todas las órdenes de compra
    public function index() {
        $ordenes = $this->ordenCompraModel->getAll();
        $this->view('pages/orden_compra/index', ['ordenes' => $ordenes]);
    }

    // Muestra la vista de creación de una orden de compra
    public function create() {
        $this->view('pages/orden_compra/create');
    }

    // Guarda una nueva orden de compra
    public function store() {
        // Validar los datos recibidos del formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id_proveedor' => trim($_POST['id_proveedor']),
                'id_usuario' => $_SESSION['id'],
                'fecha_orden' => trim($_POST['fecha_orden']),
                'monto_total' => trim($_POST['monto_total'])
            ];

            // Guardar la orden de compra y verificar el resultado
            if ($this->ordenCompraModel->save($data)) {
                header('Location: ' . RUTA_URL . '/orden_compra');
                exit;
            } else {
                die("Error al crear la orden de compra.");
            }
        } else {
            // Redirigir si no es una solicitud POST
            header('Location: ' . RUTA_URL . '/orden_compra/create');
            exit;
        }
    }

    // Elimina una orden de compra (requiere id como parámetro)
    public function delete($id) {
        if ($this->ordenCompraModel->delete($id)) {
            header('Location: ' . RUTA_URL . '/orden_compra');
            exit;
        } else {
            die("Error al eliminar la orden de compra.");
        }
    }
}
