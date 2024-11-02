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
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <ul class="navbar-nav ml-auto">
                    <div class="topbar-divider d-none d-sm-block"></div>
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nombre']; ?></span>
                        </a>
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
                    <h1 class="h3 mb-0 text-gray-800">Nueva Orden de Compra</h1>
                </div>

                <!-- Formulario para crear una nueva orden de compra -->
                <div class="container">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Ingrese los datos de la nueva orden</h1>
                                        </div>

                                        <form class="user" action="<?php echo RUTA_URL; ?>/OrdenCompraController/store" method="POST">
                                            <!-- Seleccionar Proveedor -->
                                            <div class="form-group">
                                                <label for="id_proveedor">Proveedor</label>
                                                <select name="id_proveedor" class="form-control" required>
                                                    <option value="">Seleccione un proveedor</option>
                                                    <?php foreach ($data['proveedores'] as $proveedor): ?>
                                                        <option value="<?php echo $proveedor->id_proveedor; ?>">
                                                            <?php echo $proveedor->razon_social; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <!-- Fecha de la Orden -->
                                            <div class="form-group">
                                                <label for="fecha_orden">Fecha de la Orden</label>
                                                <input type="date" name="fecha_orden" class="form-control" required>
                                            </div>

                                            <!-- Monto Total -->
                                            <div class="form-group">
                                                <label for="monto_total">Monto Total</label>
                                                <input type="number" name="monto_total" class="form-control" step="0.01" min="0" placeholder="Ingrese el monto total" required>
                                            </div>

                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                Guardar Orden de Compra
                                            </button>
                                        </form>

                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="<?php echo RUTA_URL; ?>/OrdenCompraController/index">Volver al listado de órdenes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin del formulario -->

            </div>
            <!-- /.container-fluid -->
        </div>

        <?php require RUTA_APP . "/views/layout/admin/footer.php"; ?>
    </div>
</div>
