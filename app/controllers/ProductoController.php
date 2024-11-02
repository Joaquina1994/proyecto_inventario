<?php
class ProductoController extends BaseController {
    private $productoModel;

    public function __construct() {
        $this->productoModel = $this->model('Producto');
    }

    // Muestra todos los productos
    public function index() {
        $productos = $this->productoModel->getAll();
        $this->view('pages/producto/index', ['productos' => $productos]);
    }

    // Muestra la vista de creación de producto
    public function create() {
        $this->view('pages/producto/create');
    }

    // Guarda un nuevo producto
    public function store() {
        $data = [
            'id_proveedor' => $_POST['id_proveedor'],
            'id_categoria' => $_POST['id_categoria'],
            'codigo_producto' => $_POST['codigo_producto'],
            'nombre_producto' => $_POST['nombre_producto'],
            'cantidad' => $_POST['cantidad']
        ];

        if ($this->productoModel->save($data)) {
            header('Location: /producto');
        } else {
            die("Error al crear el producto.");
        }
    }

    // Elimina un producto
    public function delete($id) {
        if ($this->productoModel->delete($id)) {
            header('Location: /producto');
        } else {
            die("Error al eliminar el producto.");
        }
    }
}
