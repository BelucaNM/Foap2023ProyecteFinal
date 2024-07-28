
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bienvenida</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<?php
/*session_start();

if(!isset($_SESSION['user'])){
    echo " la session no ha sido iniciada";
    header("Location: ../index.php");
    exit();
}

$user = $_SESSION['user'];*/

if (($_SERVER['REQUEST_METHOD'] == 'GET') && isset($_GET['error'])) { // Validaciones

    if ( $_GET['error'] == 'Printed') {
        echo '<div class="alert alert-success" role="alert">Se ha generado el listado en DIR Prints.pdf.</div>';
    };
    if ( $_GET['error'] == 'FailedStmt') {
        echo '<div class="alert alert-success" role="alert">No se ha podido hacer la actualizacion.</div>';
    };
    
};

$title="Bienvenid@ a nuestra tienda Outlet";
$soy = "bienvenida";
include "../includes/header.php"; 

?>
<main>


<section id="gruposProducto" class="section">
        <h2>Productos</h2> <!-- carrusel -->
        <div class="cards-container">
                <div class="card">
                    <img src="../img/imagenCamarasANA200px.jpg" alt="ImagenCamarasANA" class="card-img">
                    <div class="card-body">
                        <h3 class="card-title">Cámaras Analógicas</h3>
                        <p class="card-text">Contenido de ejemplo para el grupo de  productos camaras. Esto es una vista previa.</p>
                        <a href="#">Leer más</a>
                        <a href="listadoProductos.php?cat=1" class="btn btn-primary">Ver Lista Productos</a>
                    </div>
                </div>
                <div class="card">
                    <img src="../img/imagenCamarasDIG200px.jpg" alt="ImagenCamarasDIG" class="card-img">
                    <div class="card-body">
                        <h3 class="card-title">Cámaras Digitales</h3>
                        <p class="card-text">Contenido de ejemplo para el grupo de productos de Cámaras Digitales. Esto es una vista previa.</p>
                        <a href="#">Leer más</a>
                        <a href="listadoProductos.php?cat=2" class="btn btn-primary">Ver Lista Productos</a>
                    </div>
                </div>
                <div class="card">
                    <img src="../img/imagenObjetivosMAN200px.jpg" alt="ImagenObjetivosMAN" class="card-img">
                    <div class="card-body">
                        <h3 class="card-title">Objetivos Manuales</h3>
                        <p class="card-text">Contenido de ejemplo para el grupo de objetivos manuales. Esto es una vista previa.</p>
                        <a href="#">Leer más</a>
                        <a href="listadoProductos.php?cat=3" class="btn btn-primary">Ver Lista Productos</a>
                    </div>
                </div>
                <div class="card">
                    <img src="../img/imagenObjetivosAUT200px.jpg" alt="ImagenObjetivosAUT" class="card-img">
                    <div class="card-body">
                        <h3 class="card-title">Objetivos automáticos</h3>
                        <p class="card-text">Contenido de ejemplo para el grupo de objetivos automáticos. Esto es una vista previa.</p>
                        <a href="#">Leer más</a>
                        <a href="listadoProductos.php?cat=4" class="btn btn-primary">Ver Lista Productos</a>
                    </div>
                </div>
                <div class="card">
                    <img src="../img/imagenFiltros200px.jpg" alt="ImagenFiltros" class="card-img">
                    <div class="card-body">
                        <h3 class="card-title">Filtros</h3>
                        <p class="card-text">Contenido de ejemplo para el grupo de Filtros. Esto es una vista previa.</p>
                        <a href="#">Leer más</a>
                        <a href="listadoProductos.php?cat=5" class="btn btn-primary">Ver Lista Productos</a>
                    </div>
                </div>
                <div class="card">
                    <img src="../img/imagenSoportes200px.jpg" alt="ImagenSoportes" class="card-img">
                    <div class="card-body">
                        <h3 class="card-title">Tripodes y Soportes</h3>
                        <p class="card-text">Contenido de ejemplo para el grupo de Soportes. Esto es una vista previa.</p>
                        <a href="#">Leer más</a>
                        <a href="listadoProductos.php?cat=6" class="btn btn-primary">Ver Lista Productos</a>
                    </div>
                </div>
                <div class="card">
                    <img src="../img/imagenAdaptadores200px.jpg" alt="ImagenAdaptadores" class="card-img">
                    <div class="card-body">
                        <h3 class="card-title">Adaptadores</h3>
                        <p class="card-text">Contenido de ejemplo para el grupo de Adaptadores. Esto es una vista previa.</p>
                        <a href="#">Leer más</a>
                        <a href="listadoProductos.php?cat=7" class="btn btn-primary">Ver Lista Productos</a>
                    </div>
                </div>
                <div class="card">
                    <img src="../img/imagenBaterias200px.jpg" alt="ImagenBaterias" class="card-img">
                    <div class="card-body">
                        <h3 class="card-title">Baterias</h3>
                        <p class="card-text">Contenido de ejemplo para el grupo de productos de Baterias. Esto es una vista previa.</p>
                        <a href="#">Leer más</a>
                        <a href="listadoProductos.php?cat=8" class="btn btn-primary">Ver Lista Productos</a>
                    </div>
                </div>
                <div class="card">
                    <img src="../img/imagenCables200px.jpg" alt="ImagenCables" class="card-img">
                    <div class="card-body">
                        <h3 class="card-title">Cables</h3>
                        <p class="card-text">Contenido de ejemplo para el grupo de Cables. Esto es una vista previa.</p>
                        <a href="#">Leer más</a>
                        <a href="listadoProductos.php?cat=9" class="btn btn-primary">Ver Lista Productos</a>
                    </div>
                </div>
                <div class="card">
                    <img src="../img/imagenBolsas200px.jpg" alt="ImagenBolsas" class="card-img">
                    <div class="card-body">
                        <h3 class="card-title">Bolsas y Fundas</h3>
                        <p class="card-text">Contenido de ejemplo para el grupo de bolsas y fundas. Esto es una vista previa.</p>
                        <a href="#">Leer más</a>
                        <a href="listadoProductos.php?cat=10" class="btn btn-primary">Ver Lista Productos</a>
                    </div>
                </div>
                <div class="card">
                    <img src="../img/imagenAccesorios200px.jpg" alt="ImagenAccesorios" class="card-img">
                    <div class="card-body">
                        <h3 class="card-title">Accesorios</h3>
                        <p class="card-text">Contenido de ejemplo para el grupo de Accesorios. Esto es una vista previa.</p>
                        <a href="#">Leer más</a>
                        <a href="listadoProductos.php?cat=11" class="btn btn-primary">Ver Lista Productos</a>
                    </div>
        </div>
    </section>

    <section id="FAQS" class="section">
            <h2>FAQS</h2>
            <p>Aquí van tres divs, para explicar cuanto tarda en llegar un pedido, la politica de devoluciones, o el medio de pago.</p>
            <div class="cards-container">
                <div class="caja">

                    <div class="card-body">
                        <h3 class="card-title">Cuanto tarda en llegar un pedido</h3>
                        <p class="card-text">Aqui se explicará como se hacen los envios. Esto es una vista previa.</p>
                        <a href="#">Leer más</a>
                    </div>
                </div>
                <div class="caja">

                    <div class="card-body">
                        <h3 class="card-title">Política de devoluciones</h3>
                        <p class="card-text">Aqui se explicará la política de devoluciones. Esto es una vista previa.</p>
                        <a href="#">Leer más</a>
                    </div>
                </div>
                <div class="caja">

                    <div class="card-body">
                        <h3 class="card-title">Medios de Pago</h3>
                        <p class="card-text">Aqui se explicará cómo hacer el pago. Esto es una vista previa.</p>
                        <a href="#">Leer más</a>
                    </div>
                </div>
    </section>

    <section id="contacto" class="section">
            <h2>Contacto</h2>
            <p>Aqui se  agregará un enlace de email y un enlace para chat.</p>
    </section>
    </main>
</body>
</html>