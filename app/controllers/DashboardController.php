<?php

class DashboardController extends BaseController {
    private $ordenCompraModel;
    private $proveedorModel;
    private $movimientoStockModel;
    private $categoriaModel;
    private $productoModel;

    public function __construct() {
        // Instanciar los modelos necesarios
        $this->ordenCompraModel = $this->model('OrdenCompraModel');
        $this->proveedorModel = $this->model('ProveedorModel');
        $this->movimientoStockModel = $this->model('MovimientoStockModel');
        $this->categoriaModel = $this->model('CategoriaModel');
        $this->productoModel = $this->model('ProductoModel');
    }

    public function index() {
        // Obtiene las últimas órdenes de compra
        $ultimasOrdenes = $this->ordenCompraModel->getUltimasOrdenes(5);
    
        // Pasa las órdenes de compra a la vista
        $data = [
            'ultimas_ordenes' => $ultimasOrdenes
        ];
    
        

        $this->view('pages/dashboard/dashboard', $data);
    }
}
