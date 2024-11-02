<?php require RUTA_APP . "/views/layout/admin/header.php"; ?>

<!-- Page Wrapper -->
<div id="wrapper">

    <?php require RUTA_APP . "/views/layout/admin/menu.php"; ?>

    <!-- Content Wrapper -->
    <div class="d-flex flex-column flex-grow-1">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">
                    <div class="topbar-divider d-none d-sm-block"></div>
                    <!-- User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nombre']; ?></span>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Perfil
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Cerrar Sesión
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Panel de Administración</h1>
                </div>

                <!-- Content Row -->
                <div class="row">
                    <!-- Últimas Órdenes de Compra -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Últimas Órdenes de Compra</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Proveedor</th>
                                                <th>Empleado</th>
                                                <th>Fecha</th>
                                                <th>Monto</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($data['ultimas_ordenes'])): ?>
                                                <?php foreach ($data['ultimas_ordenes'] as $orden): ?>
                                                    <tr>
                                                        <td><?php echo $orden->proveedor; ?></td>
                                                        <td><?php echo $orden->usuario; ?></td>
                                                        <td><?php echo date('d/m/Y', strtotime($orden->fecha_orden)); ?></td>
                                                        <td><?php echo '$' . number_format($orden->monto_total, 2); ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="4" class="text-center text-secondary">No hay órdenes de compra recientes</td>
                                                </tr>
                                            <?php endif; ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Últimos Proveedores Agregados -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-success">Últimos Proveedores Agregados</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Proveedor</th>
                                                <th>CUIT</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php foreach ($data['ultimos_proveedores'] as $proveedor): ?>
                                                <tr>
                                                    <td><?php echo $proveedor->razon_social; ?></td>
                                                    <td><?php echo $proveedor->cuit; ?></td>
                                                    <td><?php echo $proveedor->email; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Últimos Movimientos de Stock -->
                    <div class="col-xl-4 col-md-12 mb-4">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-info">Últimos Movimientos de Stock</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Producto</th>
                                                <th>Tipo</th>
                                                <th>Cantidad</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data['ultimos_movimientos'] as $movimiento): ?>
                                                <tr>
                                                    <td><?php echo $movimiento->nombre_producto; ?></td>
                                                    <td><?php echo ucfirst($movimiento->tipo_movimiento); ?></td>
                                                    <td><?php echo $movimiento->cantidad; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Botones -->
                <div class="row">
                    <div class="col-md-4">
                        <a href="<?php echo RUTA_URL; ?>/categoria/create" class="btn btn-primary btn-block">Agregar Nueva Categoría</a>
                    </div>
                    <div class="col-md-4">
                        <a href="<?php echo RUTA_URL; ?>/ProveedorController/create" class="btn btn-success btn-block">Agregar Nuevo Proveedor</a>
                    </div>
                    <div class="col-md-4">
                        <a href="<?php echo RUTA_URL; ?>/OrdenCompraController/create" class="btn btn-info btn-block">Crear Orden de Compra</a>
                    </div>
                </div>

            </div>


        </div>

        <?php require RUTA_APP . "/views/layout/admin/footer.php"; ?>
    </div>
</div>