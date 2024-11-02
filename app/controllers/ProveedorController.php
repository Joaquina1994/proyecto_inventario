<?php

class ProveedorController extends BaseController {
    private $proveedorModel;

    public function __construct() {
        $this->proveedorModel = $this->model('ProveedorModel');
    }

    
    public function index() {
        
        $proveedores = $this->proveedorModel->getAll();
        $this->view('pages/proveedor/index', ['proveedores' => $proveedores]);
    }

    public function create() {
        $this->view('pages/proveedor/create');
    }

    
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'razon_social' => trim($_POST['razon_social']),
                'cuit' => trim($_POST['cuit']),
                'direccion' => trim($_POST['direccion']),
                'telefono' => trim($_POST['telefono']),
                'email' => trim($_POST['email'])
            ];

            if ($this->proveedorModel->save($data)) {
                header('Location: ' . RUTA_URL . '/proveedor'); 
                exit;
            } else {
                die("Error al guardar el proveedor.");
            }
        } else {
            
            header('Location: ' . RUTA_URL . '/proveedor/create');
            exit;
        }
    }

    
    public function delete($id) {
        if ($this->proveedorModel->delete($id)) {
            header('Location: ' . RUTA_URL . '/proveedor'); 
            exit;
        } else {
            die("Error al eliminar el proveedor.");
        }
    }
}
