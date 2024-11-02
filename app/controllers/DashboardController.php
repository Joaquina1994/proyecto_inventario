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
        // Obtener la cantidad total de categorías y productos
        $totalCategorias = $this->categoriaModel->getAll();
        $totalProductos = $this->productoModel->getAll();

        // Obtener las últimas órdenes de compra (ejemplo: últimas 5)
        $ultimasOrdenes = $this->ordenCompraModel->getAll(5);

        // Obtener los últimos proveedores agregados (ejemplo: últimos 5)
        $ultimosProveedores = $this->proveedorModel->getAll(5);

        // Obtener los últimos movimientos de stock (ejemplo: últimos 5)
        $ultimosMovimientos = $this->movimientoStockModel->getAll(5);

        // Pasar los datos a la vista
        $data = [
            'total_categorias' => $totalCategorias,
            'total_productos' => $totalProductos,
            'ultimas_ordenes' => $ultimasOrdenes,
            'ultimos_proveedores' => $ultimosProveedores,
            'ultimos_movimientos' => $ultimosMovimientos
        ];

        $this->view('pages/dashboard/dashboard', $data);
    }
}
