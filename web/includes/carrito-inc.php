<?php
    
require "../model/Connection.php";
require "../model/Carrito.php";

session_start();
if (isset ($_GET['id'])){

    $id = $_GET['id'];

    if (!isset ($_SESSION['user'])){
        header("Location: ../view/productosExistencias.php?id=$id&error='noLogged'");
        // " No es posible comprar sin estar identificado";
        exit();
    }

// Si hay una compra abierta, recupera el número de carrito

    $carrito = new Carrito (); // podria aparecer un ICONO
    if (isset($_SESSION['carrito'])) {
        $carrito->setCarritoId($_SESSION['carrito']);
    } else {
        $numCarrito= $carrito->crearCarrito();
        $_SESSION['carrito'] = $numCarrito;
    };

// recuper precio del producto    
    require "../model/producto.php";
    $producto = new producto($id);
    $producto->leer();
    $precio= $producto->getPrecioUnitario();
        
    if (!$precio) {
            echo " se ha producido un error."; exit();}
    
    $carrito->setPrecioUnitario = $precio;
    $carrito->setCantidad = 1;
    $carrito->setProductoId = $id;
    $carrito->añadirAlCarrito();
    $producto->actualizarExistencias();

    
    // vuelve a comprar
    echo "<script>  alert('Datos guardados correctamente');
                document.location='../view/listadoProductos.php';
    </script>";
        
    exit();
}
?>