<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <div class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-text mx-3"><?php echo $_SESSION['nombre']; ?></div>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?php echo RUTA_URL; ?>/DashboardController">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Panel de Administración</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">Gestión de Inventario</div>

    <!-- Nav Item - Nueva Categoría -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo RUTA_URL; ?>/categoria/create">
            <i class="fas fa-plus-circle"></i>
            <span>Nueva Categoría</span>
        </a>
    </li>

    <!-- Nav Item - Nuevo Proveedor -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo RUTA_URL; ?>/ProveedorController/create">
            <i class="fas fa-plus-circle"></i>
            <span>Nuevo Proveedor</span>
        </a>
    </li>

    <!-- Nav Item - Nueva Orden de Compra -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo RUTA_URL; ?>/OrdenCompraController/create">
            <i class="fas fa-plus-circle"></i>
            <span>Nueva Orden Compra</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Listados Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseListados" aria-expanded="true" aria-controls="collapseListados">
            <i class="fas fa-fw fa-list"></i>
            <span>Listados</span>
        </a>
        <div id="collapseListados" class="collapse" aria-labelledby="headingListados" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Secciones</h6>
                <a class="collapse-item" href="<?php echo RUTA_URL; ?>/categoria">
                    <i class="fas fa-tags"></i> Categorías
                </a>
                <a class="collapse-item" href="<?php echo RUTA_URL; ?>/producto">
                    <i class="fas fa-box"></i> Productos
                </a>
                <a class="collapse-item" href="<?php echo RUTA_URL; ?>/ProveedorController/index">
                    <i class="fas fa-box"></i> Proveedores
                </a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Ordenes de Compra -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo RUTA_URL; ?>/OrdenCompraController/index">
            <i class="fas fa-shopping-cart"></i>
            <span>Ordenes de Compras</span>
        </a>
    </li>

    <!-- Nav Item - Movimientos de Stock -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo RUTA_URL; ?>/movimiento_stock">
            <i class="fas fa-warehouse"></i>
            <span>Movimientos de Stock</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

</ul>
<!-- End of Sidebar -->
