<?php require RUTA_APP .'/views/layout/landing/header.php';?>
<header>
    <nav class="navbar bg-body-secondary">
        <div class="container-fluid justify-content-end">
            <a class="btn btn-outline-primary me-2" type="button" href="<?php echo RUTA_URL; ?>/AuthController/login">Ingresar</a>

        </div>
    </nav>
</header>
<section class="container mt-3 mb-3">
    <h2 class="text-center text-white">Bienvenidos</h2>
    <div class="row">
        <div class="col-md-3">
            <p class="text-white">Nuestro sistema te ayudará a organizarte.</p>
            <h3 class="text-white">Decile adiós al <em>pulpo manotas</em></h3>
        </div>
        <div class="col-md-9">
            <img class="" src="<?php echo RUTA_URL;?>/img/tareas_landing.jpg" alt="">
        </div>
    </div>

</section>

<?php require RUTA_APP .'/views/layout/landing/footer.php';?>