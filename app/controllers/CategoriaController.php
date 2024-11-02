<?php
class CategoriaController extends BaseController {
    private $categoriaModel;

    public function __construct() {
        $this->categoriaModel = $this->model('Categoria');
    }

    // Muestra todas las categorías
    public function index() {
        $categorias = $this->categoriaModel->getAll();
        $this->view('pages/categoria/index', ['categorias' => $categorias]);
    }

    // Muestra la vista de creación de categoría
    public function create() {
        $this->view('pages/categoria/create');
    }

    // Guarda una nueva categoría
    public function store() {
        $data = [
            'nombre_categoria' => $_POST['nombre_categoria']
        ];
        
        if ($this->categoriaModel->save($data)) {
            header('Location: /categoria');
        } else {
            die("Error al crear la categoría.");
        }
    }

    // Elimina una categoría
    public function delete($id) {
        if ($this->categoriaModel->delete($id)) {
            header('Location: /categoria');
        } else {
            die("Error al eliminar la categoría.");
        }
    }
}
